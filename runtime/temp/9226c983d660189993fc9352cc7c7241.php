<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/www/wwwroot/cs.wmtao.xyz/public/../application/mobile/view/index/index.html";i:1711981694;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/favicon.ico" />
    <title>在线客服</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <script> ROOT_URL = '<?php echo $basename; ?>'; </script>
    <link href="/assets/libs/layer/admin/layui.css?v=AI_KF" rel="stylesheet">
    <script src="/assets/libs/push/pusher.min.js?v=AI_KF" type="text/javascript"></script>
    <script type="text/javascript" src="/assets/js/utils.js"></script>
    <script type="text/javascript" src="/assets/libs/jquery/jquery.min.js?v=AI_KF"></script>
    <script src="/assets/libs/layui/layui.js?v=AI_KF" type="text/javascript"></script>
    <script src="/assets/libs/jquery/jquery.cookie.js?v=AI_KF" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/mobile/mobile.css">
    <script src="/assets/libs/jquery/jquery.form.min.js?v=AI_KF" type="text/javascript"></script>
    <link href="/assets/libs/layer/skin/layer.css?v=AI_KF" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="/static/component/pear/css/pear.css" />
    <link rel="stylesheet" href="/static/cdn/element-ui/2.15.1/theme-chalk/fonts/element-icons.woff"/>
    <link rel="stylesheet" href="/static/css/common.css?v=20230312" />
    <link rel="stylesheet" href="/static/css/icon/iconfont.css?v=fgjlgfda"/>
    <script src="/assets/libs/layer/layer.js" type="text/javascript"></script>
    <script type="text/javascript" src="/assets/libs/webrtc/recorder.wav.min.js?v=AI_KF}"></script>
    <script type="text/javascript" src="//api.map.baidu.com/api?type=webgl&v=1.0&ak=<?php echo $baidu_map_key; ?>"></script>
    <script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=<?php echo $baidu_map_key; ?>"></script>
    <link href="/static/css/app.ccaa54a563bd7edef54a4a5dbd192ae7.css" rel="stylesheet">
    <script src="/assets/js/howler.min.js"></script>
    
    <script>
      var langCancel = '<?php echo $lang["cancel"]; ?>';
        var langSubmit = '<?php echo $lang["submit"]; ?>';
        let imageSrc = '/assets/images';
     var sound = new Howl({
          src: ['/upload/voice/warning.mp3']
        });
      function listenForDragAndDropUploads (){
        var oDiv = document.getElementById('msg-input');
        console.log(oDiv)
        var outTextarea = document.getElementById('text_in');
        oDiv.addEventListener("dragenter", function(e){
          e.stopPropagation();
          e.preventDefault();
        }, false);

        oDiv.addEventListener("dragover", function(e){
          e.stopPropagation();
          e.preventDefault();
        }, false);

        oDiv.addEventListener("drop", function(e){
          e.stopPropagation();
          e.preventDefault();

          var dt = e.dataTransfer;
          var files = dt.files;
          console.log(files)
          uploadFiles(files);
        }, false);

      }
      function uploadFiles (files){
        if (files.length<1)return;
        let formData = new FormData();
        for(let i=0;i<files.length;i++){
          formData.append("folder[]",files[i])
        }
        formData.append("visiter_id",visiter_id)
        formData.append("business_id",business_id)
        formData.append("avatar",pic)
        formData.append("record",record)
        formData.append("service_id",service_id)
        $.ajax({
          url:ROOT_URL+'/admin/event/uploadfile',
          type: 'post',
          contentType: false,
          processData: false,
          // data:{visiter_id:visiter_id,business_id: business_id, avatar: pic,record: record,service_id:service_id},
          data:formData,
          success: function (res) {

            if(res.code == 0){
              var myDate = new Date();
              var time =  myDate.getHours()+":"+myDate.getMinutes();
              var str = '';
              time = myDate.getFullYear() + "-" + (myDate.getMonth() + 1) + "-" + myDate.getDate() + " " + myDate.getHours() + ":" + myDate.getMinutes() + ":" + myDate.getSeconds();

              str += '<li class="chatmsg" style="display: unset">';
              str += '<div class="" style="position: absolute;top: 26px;right: 2px;"></div>';
              str += `<div class='outer-right'style="flex-direction: column;align-items: end" ><span style="text-align: right">${time}</span><div class='customer'>`;

              str += "<pre>";
              let i = 0;
              res.data.forEach(function(item){
                let sarr = files[i++].name.split('\\');
                let name = sarr[sarr.length - 1];
                if(item.url.indexOf('.mp4')>= 0){
                  str += "<video src='" + item.url + "' controls='controls' style='width: 100%'>ERROR</video>";
                }else{
                  str += "<div style='display: flex;flex-direction: column;align-items: center;justify-content: center;    color: #000; '><a href='" + item.url + "' style='display: inline-block;min-width: 70px;text-decoration: none;' download='" + name + "'><i class='layui-icon' style='font-size: 60px;'>&#xe61e;</i><br></a><span>" + name + "</span></div>";
                }
              });
              str += "</pre></div>";

              str += "</div>";
              str += "</li>";

              $(".conversation").append(str);
              var div = document.getElementById("wrap");
              div.scrollTop = div.scrollHeight;
              setTimeout(function(){
                $('.chatmsg').css({
                  height: 'auto'
                });
              },0)
              var msg = "<div><a href='" + res.data + "' style='display: inline-block;text-align: center;min-width: 70px;text-decoration: none;' download='" + name + "'><i class='layui-icon' style='font-size: 60px;'>&#xe61e;</i><br>" + name + "</a></div>";
              var se = $('#services').text();
              if(se){
                var sid =$.cookie('services');
              }


            }else{
              layer.msg(res.msg,{icon:2});
            }

          }
        });

      }
        var mediaStreamTrack;
        var au_state = 'off'
        var visiter = '<?php echo $visiter; ?>';
        var business_id = '<?php echo $business_id; ?>';
        var record = '<?php echo $from_url; ?>';
        record.replace("%23", "#");
        record.replace("%26", "&");
        var pic = '<?php echo $avatar; ?>';
        var channel = '<?php echo $channel; ?>';
        var visiter_id = '<?php echo $visiter_id; ?>';
        var alias_visiter_name = '<?php echo $alias_visiter_name; ?>';
        var special = '<?php echo $special; ?>';
        var cid = '<?php echo $groupid; ?>';
        var url = '<?php echo $url; ?>';
        if (pic == "") {
            pic = "/assets/images/index/avatar-red2s.png";
        }
        var service_id = special;
        var exporturl="/mobile/index/export?visiter_id=<?php echo $visiter_id; ?>&service_id=<?php echo $special; ?>&business_id=<?php echo $business_id; ?>";
        function a() {
            var e = document.getElementById("chat-message-audio-source").src
                , b = document.getElementById("chat-message-audio");
            b.src = "";
            var p = b.play();
            p && p.then(function () { }).catch(function (e) { });
            b.src = e;
            $(document).unbind("click", a);
        }
        $(document).on("click", a);
        var wolive_connect = function () {
            var pusher = new Pusher('<?php echo $app_key; ?>',
                {
                     encrypted: <?php echo $value; ?>,
                    enabledTransports: ['ws'],
                    wsHost: '<?php echo $whost; ?>',
                <?php echo $port; ?>: <?php echo $wport; ?>,
                authEndpoint: '/auth.php',
                disableStats: true
            });

        var channels = pusher.subscribe("cu" + channel);
        channels.bind('my-chexiao', function (data) {
            $("#xiaox_" + data.message.cid).remove();
        });
        channels.bind('read_client', function (data) {

          //开始监听
          $('#text_in').bind('input',()=>{
            let content = $("#text_in").val();
            $.ajax({
              url:ROOT_URL+"/admin/event/chat",
              type: "post",
              data: {visiter_id:visiter_id,content: content,business_id: business_id, avatar: pic,record: record,service_id:service_id,type:'input'},
              dataType:'json',
              success:function(res){
              }
            });

          });
        });
        channels.bind('close_read_client', function (data) {
          $('#text_in').unbind('input');
          //停止监听
        });
        channels.bind('input-event', function (data) {
            $("#isinput").show();
            setTimeout(function () {
                $("#isinput").hide();
            }, 3000)
        });
        channels.bind('check-event', function (data) {
            $.each(data.message, function (index, value) {
                $("#cid" + value).html("已读")
            });
        });
        //接收消息
        channels.bind('my-event', function (data) {
            if (data.message.nick_name === undefined) {
                data.message.nick_name = $("#services").text();
            }
            let date = new Date(data.message.timestamp*1000);
            window.parent.postMessage({ type: 'sendNews', data: data.message }, '*');
             data.message.time = formattingTime(date)
          var msg = getOuterLeft(data.message);

            $(".chatmsg_notice").remove();
            $(".chatmsg_no").remove();
            $(".conversation").append(msg);
            var div = document.getElementById("wrap");
            div.scrollTop = div.scrollHeight;
            $("img[src*='upload/images']").parent().parent('.customer').css({
                padding: '0', borderRadius: '0', maxHeight: '100px'
            });
            $("img[src*='upload/images']").parent().parent('.service').css({
                padding: '0', borderRadius: '0', maxHeight: '100px'
            });
            setTimeout(function () {
                $('.chatmsg').css({
                    height: 'auto'
                });
            }, 0)
            if (au_state !== 'off') {
              if (data.message.rule!=undefined&&data.message.rule=='robot'){
                sound.play()
              }else{
                document.getElementById("chat-message-audio").play();
              }
            }
        });
        channels.bind('push-comment', function (data) {
            var html = '<div style="margin-bottom: 20px;">' + data.message.title + '</div>';
            $.each(data.message.comments, function (index, value) {
                html += ' <div class=\'evaluate-item evaluate-score\' data-score="0">\n' +
                    '                <span class="evaluate-title">' + value + '</span>\n' +
                    '                <input type="hidden" name="' + value + '"/>\n' +
                    '                <img class="star" data-id="1" src="/assets/images/index/star.png" alt="">\n' +
                    '                <img class="star" data-id="2" src="/assets/images/index/star.png" alt="">\n' +
                    '                <img class="star" data-id="3" src="/assets/images/index/star.png" alt="">\n' +
                    '                <img class="star" data-id="4" src="/assets/images/index/star.png" alt="">\n' +
                    '                <img class="star" data-id="5" src="/assets/images/index/star.png" alt="">\n' +
                    '            </div>';
            });

            if (data.message.word_switch == 'open') {
                html += '<div class=\'evaluate-item\' style="height: 80px;line-height: 1;margin-top: 10px;align-items: flex-start">\n' +
                    '                <span style="display: inline-block;margin-right: 12px;white-space: nowrap">' + data.message.word_title + '</span>\n' +
                    '                <textarea class="about-text" name="" id="" cols="30" rows="4"></textarea>\n' +
                    '            </div>';
            }

            html += ' <div class="evaluate-btn">\n' +
                '                <button class="reset"><?php echo $lang["cancel"]; ?></button>\n' +
                '                <button class="submit"><?php echo $lang["submit"]; ?></button>\n' +
                '            </div>';
            $('.bg .dialog-body').html(html);
            $('.bg').show();

        });

        channels.bind('first_word', function (data) {
            var msg = '';
            msg += '<li class="chatmsg_no"><div style="position: absolute;left:0;">';
            msg += '<img class="my-circle  se_pic" src="' + data.message.avatar + '" width="46px" height="46px"></div>';
            msg += "<div class='outer-left'><div class='service'>";
            msg += "<pre>" + data.message.content + "</pre>";
            msg += "</div></div>";
            msg += "</li>";

            $(".conversation").append(msg);

        });

        channels.bind('cu_notice', function (data) {
            $("#img_head").attr("src", data.message.avatar);
            $("#services").text(data.message.nick_name);
            $(".chatmsg_notice").remove();
            $.cookie("services", data.message.service_id);
            service_id = data.message.service_id;
            getquestion(business_id);
            getdata();
        });

        channels.bind('getswitch', function (data) {
            $("#img_head").attr("src", data.message.avatar);
            $("#services").text(data.message.nick_name);
            $("#services").attr("data", data.message.service_id);
            service_id = data.message.service_id;
            $("#log").html('');
            layer.msg('<?php echo $lang["transfer_service"]; ?>' + data.message.nick_name);
        });

        function getlisten(chas) {
            var channels = pusher.subscribe("se" + chas);

            //通知游客 客服离线
            channels.bind('logout', function (data) {
                $("#status").text('<?php echo $lang["off_line"]; ?>');
            });
            //表示客服在线
            channels.bind("geton", function (data) {
                $("#status").text('');
            });
        }

        getlisten(service_id);

        pusher.connection.bind('state_change', function (states) {
            if (states.current == 'unavailable' || states.current == "disconnected" || states.current == "failed") {
                $.cookie("cid", "");
                pusher.unsubscribe("se" + service_id);
                pusher.unsubscribe("cu" + channel);
                if (typeof pusher.isdisconnect == 'undefined') {
                    pusher.isdisconnect = true;
                    pusher.disconnect();
                    delete pusher;
                    window.setTimeout(function () {
                        wolive_connect();
                    }, 1000);
                }
            }
        });

        pusher.connection.bind('connected', function () {
            $.cookie("cid", "");
        });
        }
    </script>
    
    <style type="text/css">
            .musk {
    position: fixed;
    top: 0;
    left: 0;
    display: none;
    z-index: 999;
    background-color: #333;
    opacity: 0.8;
    width: 100%;
    height: 100%;
}
.map_box {
    position: fixed;
    display: none;
    z-index: 99999;
    width: 80%;
    height: 70%;
    background-color: #fff;
    left: 10%;
    top: 10%;
    border-radius: 10px;
    text-align: center;
       }
        #close_icon {
            position: absolute;
            right: 10px;
            top: 2px;
            cursor: pointer;
       }

        .input-but {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            width: 30px;
            height: 30px;

       }

        .my-circle {
            border-radius: 30px;
       }

        .size {

            height: 25px;
            line-height: 30px;
            border: none;
        }

        .noredcustomer {
            display: inline-block;
            word-break: break-all;
            word-wrap: break-word;
            color: #aca7a7;
            box-sizing: border-box;
            width: 10%;
            font-size: 10px;
            padding-top: 21px;
        }

        .fileinput {
            width: 30px;
            height: 30px;
            position: absolute;
            top: -44px;
            right: 0px;
            opacity: 0;
            filter: alpha(opacity=0);
            cursor: pointer;
        }

        .chatmsg_no {
            position: relative;
            margin-bottom: 80px;
        }

        .chatmsg_question {
            position: relative;
            margin-bottom: 228px;
        }

        .chatmsg .my-circle {
            position: absolute;
            left :0;
            width: 35px;
            height: 35px;
            border-radius: 50%;
        }

        .foot_msg {
            width: 100%;
            height: 100%;
            overflow: auto;
            position: relative;
             background: #fff;

        }

        .foot_msg_20 {
            width: 100%;
            height: 100%;
            overflow: auto;
            position: relative;
            background-color: #ffffff;

        }

        .msg-toolbar {

            height: 44px;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 50px;
            top: 50px;
            display: flex;

        }

        .msg-toolbar a {
            float: left;
            width: 40%;
            margin: 0;
            text-align: center;
        }

        .msg-toolbar a img {
            margin-top: 10.5px;
            height: 23px;
            width: 25px;
        }

        .tool_box {
            width: 100%;
            height: auto;
            position: absolute;
            bottom: 65%;
            top: -115px;
            display: none;
            background-color: #fff;
        }

        .wl_faces_main ul {
            margin: 5px 5px;
            overflow: hidden;
            width: 100%;
        }

        .wl_faces_main ul li {
            float: left;
            height: 30px;
            width: 26px;
            text-align: center;

        }

        .wl_faces_main ul li img {
            width: 22px;
            height: 22px;
            padding: 0;
        }
.hotQuestion{
    width: 100%;
    white-space: nowrap;
    overflow-x: auto;
    padding: 10px 5px;
    background-color: #f6f8f9;
}
.hotQuestion a{
    display: inline-block;
    margin-left: 2px;
    border-radius: 12px;
    cursor: pointer;
    font-size: 12px;
    padding: 5px 12px;
    background: #fff;
    border: 1px solid #d0d1d2;
    color: #555;
}

.hotQuestion::-webkit-scrollbar
{
    height: 4px;
    width: 0px;
    background-color: #F5F5F5;
}
/*定义滚动条轨道 内阴影+圆角*/
.hotQuestion::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}
/*定义滑块 内阴影+圆角*/
.hotQuestion::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #bdbdbd;
}
/*滑块效果*/
.hotQuestion::-webkit-scrollbar-thumb:hover
{
    -webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
    background: rgba(0,0,0,0.4);
}
        .customer {
            background-color: #<?php echo $theme; ?>;
            display: inline-block;
            padding: 12px;
            float: right;
            word-break: break-all;
            word-wrap: break-word;
            color: #ffffff;
            border-radius: 8px;
            border-top-right-radius: 0;
            box-sizing: border-box;
        }

        .outer-left:before,
        .outer-left>i {
            height: 0;
            border: 0;
        }

        .outer-right:before,
        .outer-right>i {
            height: 0;
            border: 0;
        }

        .service {
            background-color: #f6f8f9;
            display: inline-block;
            /*margin-left: 10px;*/
            padding: 12px;
            float: left;
            word-break: break-all;
            word-wrap: break-word;
            color: #333;
            border-radius: 5px;
          border: 1px solid #e0dede;
            position: relative;
            left: 0;
            max-width: 80%;
        }
        .service2 {
            background-color: #f6f8f9;
            display: inline-block;
            /*margin-left: 10px;*/
            padding: 12px;
            float: left;
            word-break: break-all;
            word-wrap: break-word;
            color: #333;
            border-radius: 2px;
          border: 1px solid #e0dede;
            position: relative;
            left: 0;
            max-width: 80%;
        }
        .content {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow-y: auto;
            margin: 0;
        }

        .bg,
        .offline,
        .lang-bg,
        .msg-bg {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, .4);
            z-index: 998;
            display: none;
        }

        .dialog1 {
            width: 84%;
            border-radius: 5px;
            background-color: #fff;
            margin: 10% auto 0;
            position: relative;
            padding-bottom: 65px;
        }

        .dialog {
            width: 70%;
            padding: 20px 25px;
            border-radius: 5px;
            background-color: #fff;
            margin: 10% auto 0;
            position: relative;
            padding-bottom: 65px;
        }

        .bg .title,
        .lang-bg .title {
            font-size: 15px;
            text-align: center;
            color: #555555;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .msg-bg .title {
            font-size: 19px;
            text-align: center;
            color: #fafafa;
            font-weight: 600;
            margin-bottom: 15px;
            background: #5fb878;
            padding: 13px;
            border-radius: 6px 6px 6px 6px;
            "

        }

        .lang-choose span {
            display: inline-block;
            padding: 5px 10px;
            background: #f0f2f7;
            color: #555555;
            font-size: 14px;
            margin-right: 5px;
            margin-bottom: 15px;
            cursor: pointer;
            width: 103px;
            text-align: center;
        }

        .lang-choose span:hover {
            background: #<?php echo $theme; ?>;
            color: #ffffff;
        }

        .lang-close,
        .msg-close {
            position: absolute;
            right: 8px;
            top: 8px;
            cursor: pointer;
        }

        .evaluate-item {
            height: 26px;
            display: flex;
            align-items: center;
        }

        .evaluate-item img {
            height: 16px;
            width: 16px;
            cursor: pointer;
            margin-left: 14px;
        }

        .evaluate-item img:first-of-type {
            margin-left: 14px;
        }

        .evaluate-text {
            display: none;
            border: 1px solid #4AACFF;
            color: #4AACFF;
            height: auto;
            font-size: 13px;
            border-radius: 5px;
            margin-left: 12px;
            padding: 0 5px;
        }

        .about-text {
            border: 1px solid #E5E3E9;
            border-radius: 10px;
            width: 68%;
            padding: 5px 10px;
        }

        .evaluate-btn {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .dialog .evaluate-btn {
            position: absolute;
            width: 100%;
            bottom: 0;
            left: 0;
            height: 45px;
            line-height: 45px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .dialog .evaluate-btn button {
            width: 50%;
            border: 0;
            font-size: 15px;
        }

        .dialog .evaluate-btn button.reset {
            border-bottom-left-radius: 5px;
            background-color: #F5F5F5;
            color: #555555;
        }


        .dialog .evaluate-btn button.submit {
            border-bottom-right-radius: 5px;
            background-color: #1E9FFF;
            color: #fff;
        }

        .evaluate-title {
            min-width: 85px;
            text-align: left;
        }

        .offline-item {
            margin-bottom: 15px;
        }

        .offline-title {
            text-align: left;
            margin-bottom: 10px;
        }

        .offline-item input {
            height: 40px;
            border-radius: 20px;
            padding: 0 5%;
            border: 1px solid #E8E6EB;
            width: 90%;
        }

        .keyword {
            position: absolute;
            top: 0;
            left: 0;
            max-width: 92%;
            height: 45px;
            white-space: nowrap;
            z-index: 90;
            display: none;
            overflow-y: auto;
            border-bottom: 1px solid #fff;
            background-color: #fff;
        }
        .keyword-toggle{
            position: absolute;
            top: 0;
            right: 0;
            width: 10%;
            font-size: 23px;
            height: 45px;
            line-height: 40px;
            text-align: center;
            z-index: 99;
            background-color: #fff;
        }
        .keyword #question_key_list {
            margin-top: 8px;
            margin-left: 10px;
        }

        .keyword .swiper-slide {
            display: inline-block;
            width: auto;
            height: 24px;
            line-height: 24px;
            padding: 0 10px;
            border-radius: 12px;
            border: 1px solid #<?php echo $theme; ?>;
            color:#<?php echo $theme; ?>;
            font-size: 12px;
            margin-right: 10px;
            background-color: #fff;
            cursor: pointer;
        }

        .fanhui {
            color: #fff !important;
            line-height: 45px;
        }

        .lang-flag {
            width: 16px;
            display: inline-block;
            margin-right: 3px;
            margin-top: -2px;
        }
        #toolbar-box{
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            background-color: #f9f9f9;
            padding-left: 2%;
        }
        .toolbar-box{

            background-color: #f1f5f8;
        }
        .tool-item .tool-icon{
            width: 50px;
            height: 50px;
            line-height: 40px;
            background-color: #fff;
            padding: 5px;
            box-sizing: border-box;
            text-align: center;
            border-radius: 5px;
            margin: 5px;
            border: 1px solid #ececec;
        }
        .tool-item{
            width: 20%;
        }
        .tool-item .tool-txt{
            width: 50px;
            font-size: 12px;
            text-align: center;
            margin:0 5px;
        }
        .LeftToRight{
            animation: LeftToRight 0.5s linear forwards;
        }
        .RightToLeft{
            animation: RightToLeft 0.5s linear forwards;
        }
        @media screen and (max-width:375px){
            .lang-choose span{
                padding: 5px 5px;
            }
        }
        @keyframes LeftToRight {
            0% {
                left: 0%;
                width: 90%;
            }

            50% {
                left: 50%;
                width: 40%;
            }

            100% {
                left: 90%;
                width: 0%;
            }
        }
        @keyframes RightToLeft {
            0% {
                left: 90%;
                width: 0%;
            }

            50% {
                left: 50%;
                width: 40%;
            }

            100% {
                left: 0%;
                width: 90%;
            }
        }
        .layui-img-icon{
                width: 25px;
            }
    </style>
</head>

<!--客户功能-->
<body>
<audio id="chat-message-audio" >
    <source id="chat-message-audio-source" src="/upload/voice/default.mp3" type="audio/mpeg" />
</audio>
    <div id="container">
        <div class="bg">
            <div class="dialog">
                <div class="title"><?php echo $lang["evaluate_service"]; ?></div>
                <div class="dialog-body">
                    <div style="margin-bottom: 20px;">请对我的服务进行评价，满意请打5星哦~</div>
                    <div class='evaluate-item evaluate-score' data-score="0">
                        <span class="evaluate-title">服务态度态度</span>
                        <img class="star" data-id="1" src="/assets/images/index/star.png" alt="">
                        <img class="star" data-id="2" src="/assets/images/index/star.png" alt="">
                        <img class="star" data-id="3" src="/assets/images/index/star.png" alt="">
                        <img class="star" data-id="4" src="/assets/images/index/star.png" alt="">
                        <img class="star" data-id="5" src="/assets/images/index/star.png" alt="">
                    </div>
                    <div class='evaluate-item'
                        style="height: 80px;line-height: 1;margin-top: 10px;align-items: flex-start">
                        <span style="display: inline-block;margin-right: 12px;white-space: nowrap">意见意见建议</span>
                        <textarea class="about-text" name="" id="" cols="30" rows="4"></textarea>
                    </div>
                    <div class="evaluate-btn">
                        <button class="reset">取消</button>
                        <button class="submit">提交</button>
                    </div>
                </div>
            </div>
        </div>
        
<!--翻译功能-->
        <div class="lang-bg">
            <div class="dialog" style="padding-bottom:20px">
                <div class="title"><?php echo $lang['choose_lang']; ?></div>
                <img src="/assets/images/index/closer.gif" class="lang-close">
                <div class="dialog-body lang-choose">
                    <span data-lang="cn"><img src="/assets/images/flag/cn.png" class="lang-flag" />中文简体</span>
                    <span data-lang="tc"><img src="/assets/images/flag/tc.png" class="lang-flag" />中文繁體</span>
                    <span data-lang="en"><img src="/assets/images/flag/en.png" class="lang-flag" />English</span>
                    <span data-lang="vi"><img src="/assets/images/flag/vi.png" class="lang-flag" />Việt Nam</span>
                    <span data-lang="th"><img src="/assets/images/flag/th.png" class="lang-flag" />ประเทศไทย</span>
                    <span data-lang="rus"><img src="/assets/images/flag/rus.png" class="lang-flag" />Россия</span>
                    <span data-lang="id"><img src="/assets/images/flag/id.png" class="lang-flag" />Indonesia</span>
                    <span data-lang="jp"><img src="/assets/images/flag/jp.png" class="lang-flag" />にほん</span>
                    <span data-lang="kr"><img src="/assets/images/flag/kr.png" class="lang-flag" />대한민국</span>
                    <span data-lang="es"><img src="/assets/images/flag/es.png" class="lang-flag" />España</span>
                    <span data-lang="fra"><img src="/assets/images/flag/fra.png" class="lang-flag" />Français</span>
                    <span data-lang="it"><img src="/assets/images/flag/it.png" class="lang-flag" />Italian</span>
                    <span data-lang="de"><img src="/assets/images/flag/de.png" class="lang-flag" />Deutsch</span>
                    <span data-lang="pt"><img src="/assets/images/flag/pt.png" class="lang-flag" />Português</span>
                    <span data-lang="ara"><img src="/assets/images/flag/ara.png" class="lang-flag" />عربي</span>
                    <span data-lang="dan"><img src="/assets/images/flag/dan.png" class="lang-flag" />Dansk</span>
                    <span data-lang="el"><img src="/assets/images/flag/el.png" class="lang-flag" />Ελληνικά</span>
                    <span data-lang="nl"><img src="/assets/images/flag/nl.png" class="lang-flag" />Nederlands</span>
                    <span data-lang="pl"><img src="/assets/images/flag/pl.png" class="lang-flag" />Polskie</span>
                    <span data-lang="fin"><img src="/assets/images/flag/fin.png" class="lang-flag" />Suomi</span>
                </div>
            </div>
        </div>
        
        <!--留言提交-->
        <div class="msg-bg" id="msg-bg-3">
            <div class="dialog1" style="padding-bottom: 20px;border-radius: 6px 6px 6px 6px;">
                <div class="title"><?php echo $lang['leave_a_message']; ?></div>
                <img src="/assets/images/index/close.png" class="msg-close" style="    width: 25px;">
                <div class="dialog-body lang-choose">
                    <div style="     margin-bottom: 20px; padding: 5px 15px;color: #ff9a00;font-size: 16px;">您好，如果您有什么疑问请在此处留言，我们会尽快与您联系。</div>
                    <div class="layui-form-item layui-inline" style="margin-left: -42px;">
                        <label class="layui-form-label">联系人</label>
                        <div class="layui-input-inline">
                            <input type="text" id="name" placeholder="请输入您的称呼" class="layui-input"
                                style=" width: 223px;">
                        </div>
                    </div>
                    <div class="layui-form-item layui-inline" style="margin-left: -31px;">
                        <label class="layui-form-label">联系方式</label>
                        <div class="layui-input-inline">
                            <input type="text" id="contact" placeholder="请输入手机号/微信/QQ" class="layui-input"
                                style=" width: 211px;">
                        </div>
                    </div>
                    <div class="layui-form-item layui-inline" style="margin-left: -29px;">
                        <label class="layui-form-label">留言内容</label>
                        <div class="layui-input-inline">
                            <textarea id="content" name="code" class="layui-input"
                                style="height: 140px;width: 208px;"></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-inline" style="text-align: center;margin-left: 82px;">
                        <button class="pear-btn pear-btn-md pear-btn-primary" id="config">
                            <i class="layui-icon layui-icon-ok"></i>
                            立即提交
                        </button>
                        <button id="reset" class="pear-btn pear-btn-md">
                            <i class="layui-icon layui-icon-refresh"></i>
                            重置
                        </button>
                    </div>
                </div>
            </div>
        </div>

       <!--广告功能-->
        <div class="msg-bg" id="msg-bg-4">
            <div class="dialog1" style="padding-bottom: 20px">
                <div class="title">提示:</div>
                <img src="/assets/images/index/close.png" class="msg-close" style="    width: 25px;">
                <fieldset class="layui-elem-field">
                    <legend>广告位：</legend>
                    <div class="layui-field-box">
                        <!-- <img id="lunbo_img" src="" style="width: 100%"> -->
                    </div>
                </fieldset>
                <fieldset class="layui-elem-field">
                    <legend>LOGO展示:</legend>
                    <div class="layui-field-box">
                        <!-- <img src="" style="width: 100%" /> -->
                    </div>
                </fieldset>
                <fieldset class="layui-elem-field">
                    <legend>关于我们：</legend>
                    <div class="layui-field-box">
                        <!-- <p> </p> -->
                    </div>
                </fieldset>
            </div>
        </div>
        
        <script>
            var index = 1;
            function lunbo() {
                index++;
                //判断index是否大于3
                if (index > 3) {
                    index = 1;
                }
                //获取img对象
                var img = document.getElementById("lunbo_img");
                if (index == 1) {
                    img.src = "";
                }
                if (index == 2) {
                    img.src = "";
                }
                if (index == 3) {
                    img.src = "";
                }
                //img.src = "./pic/img"+index+".jpeg";
            }

   //     setInterval(lunbo,2000);

        </script>
        <script>
            $('.lang-close').click(function () {
                $('.lang-bg').hide();
            });
            $('.lang-choose span').click(function () {
                $.ajax({
                    url: "/index/index/set_lang",
                    type: "post",
                    data: { lang: $(this).data("lang"), visiter: visiter_id },
                    dataType: 'json',
                    success: function (res) {
                        window.location.reload();
                    }
                });
            });
            $('.msg-close').click(function () {
                $('#msg-bg-3').hide();
                $('#msg-bg-4').hide();
            });
            $('#reset').click(function () {
                $('#content').val("");
                $('#name').val("");
                $('#contact').val("");
            });
            $('#config').click(function () {
                var content = $('#content').val();
                var name = $('#name').val();
                var contact = $('#contact').val();
                var services = $('#contact').val();
                if (name == '') {
                    layer.msg("请输入您的称呼", { icon: 2 });
                    return false;
                }
                if (contact == '') {
                    layer.msg("请输入手机号/微信/QQ", { icon: 2 });
                    return false;
                }
                if (content == '') {
                    layer.msg("请填写留言内容", { icon: 2 });
                    return false;
                }
                $.ajax({
                    url: "/index/index/set_msg",
                    type: "post",
                    data: { content: content, name: name, contact: contact, services: business_id },
                    dataType: 'json',
                    success: function (res) {
                        if (res.code == 0) {
                            layer.msg(res.msg, { icon: 2 });
                        } else {
                            layer.msg(res.msg, { icon: 1 });
                            setTimeout(function () {
                                $('.msg-bg').hide();
                            }, 2000)
                        }
                    }
                });
            });
        </script>

        <div class="offline" <?php if($reststate==true): ?>style="display: block;" <?php endif; ?>>
            <div class="dialog">
                <div class="dialog-body">
                    <div style="margin-bottom: 20px;"><?php echo $restsetting['reply']; ?></div>
                    <?php if($restsetting['name_state'] == 'open'): ?>
                    <div class='offline-item'>
                        <div class="offline-title"><?php echo $lang["name"]; ?></div>
                        <input placeholder='<?php echo $lang["please_enter_name"]; ?>' id="offline_name" type="text">
                    </div>
                    <?php endif; if($restsetting['tel_state'] == 'open'): ?>
                    <div class='offline-item'>
                        <div class="offline-title"><?php echo $lang["contact"]; ?></div>
                        <input placeholder='<?php echo $lang["please_enter_contact"]; ?>' id="offline_mobile" type="number"
                            onkeypress='return( /[\d]/.test(String.fromCharCode(event.keyCode)))'>
                    </div>
                    <?php endif; if(($restsetting['name_state'] == 'open') || ( $restsetting['tel_state'] == 'open')): ?>
                    <div class="evaluate-btn">
                        <button class="reset"><?php echo $lang["cancel"]; ?></button>
                        <button class="submit"><?php echo $lang["submit"]; ?></button>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="header" style="width: 100%;height: 65px;position: relative;background-color: #<?php echo $theme; ?>">
            <div class="infoBar" style="position: absolute;width: 100%;height: 100%">
                <a href="javascript:history.back(-1)" style="color: #fff!important; "><i class="layui-icon"
                        style="position: absolute;left:5px;font-size: 20px;z-index: 999;top: 10px;"></i></a>&nbsp;&nbsp;
                <img id="img_head" src="/assets/images/index/ai_service.png"
                    style="width: 40px;height: 40px;border-radius: 50%;position: absolute;left: 32px;top: 14px;">
                 <div style="display: flex;flex-direction: column;position: absolute;left: 80px;top: 50%;align-items: flex-start;transform: translate(0,-50%)">

                     <span id='services' style="font-size: 16px;line-height: 1"><?php echo $lang['ai_service']; ?></span>
                     <?php if($buttonSwitch['top_text_state'] =='open'): ?>
                     <span  style="line-height: 1;font-size: 12px;margin-top: 5px"><?php echo $buttonSwitch['top_text']; ?></span>
                     <?php endif; ?>
                 </div>
                <span id='isinput' style="position: absolute;
    left: 145px;
    top: 22px;
    color: rgb(224, 224, 224);
     display: none;
    font-size: 12px;">正在输入……</span>
    
    <?php if($buttonSwitch['tel_state'] =='open'): ?>
             <a onclick="location.href='tel:<?php echo $buttonSwitch['tel_text']; ?>'" style="top: 3.5px;margin-top: 8px;cursor: pointer; position: absolute; right:92px; cursor: pointer;font-size: 14px;color: #fff;">
   <i class="el-icon-phone-outline" style="font-size: 22px;cursor: pointer;"></i></a >
    <?php endif; ?>
       
                <a onclick="hint()" id="clickbf"
                    style="margin-top: 7px;cursor: pointer;    position: absolute;    right: 58px;    top: 2px;  cursor: pointer;font-size: 22px;color: #ffffff;">
                    <i class="layui-icon state-mp3" style="font-size: 24px;cursor: pointer;">&#xe645;</i>
                </a><br>
                
     <a onclick="window.close()" style="margin-top: -36px;cursor: pointer; position: absolute; right: 30px; cursor: pointer;font-size: 18px;color: #fff; "><i class="layui-icon layui-icon-logout" style="font-size: 21px; cursor: pointer;"></i></a >
     
            </div>
        </div>
      <div class="content" id="wrap" style="background-color: #fff;">
            <div style="height: 65px;width: 100%;"></div>
            <ul  id="log" class="conversation" style="
    margin-bottom: 115px !important; margin-left: 10px"></ul>
            <div style="height: 94px;width: 100%;"></div>
        </div>

     <div class="foot_all" style="position:fixed;bottom:0;width: 100%;padding:0;z-index: 997">
    <div style="position: relative; border-top: 0.5px solid #d9dbde;">
      <!--  <div class="keyword">
            <div class="swiper-wrapper" >
            </div>
        </div>
    <div class="keyword-toggle">
            <i class="layui-icon layui-icon-next" id="closeKeyword" style="font-size:14px;color:#<?php echo $theme; ?>;"></i>
            <i class="layui-icon layui-icon-prev" id="showKeyword" style="font-size:14px;display: none;color:rgb(195, 196, 198);"></i>
        </div>-->
        <div class="hotQuestion" id="question_key_list"> </div>
    </div>
    <div class="tool_box">
        <div class="wl_faces_content">
            <div class="wl_faces_main">

            </div>
        </div>
    </div>
               <img id="exampleImage" src="/upload/images/1/1680153468.png" style="display: none;">
                  <img id="exampleImage1" src="/upload/images/1/1680153468.png" style="display: none;">

    <div class="foot_msg"  id="foot_msg_one"   >
        
        <!-- 输入框 -->
   <div class="footer" style="display:flex;">
            <div class="iconBtns visitorIconBox">
                <div class="el-tooltip iconfont icon-xiaolian  visitorIconBtns visitorFaceBtn" aria-describedby="el-tooltip-1829" onclick="faceon()" tabindex="0"></div>

              <?php if($buttonSwitch['voice_state'] == 'open'): ?>
            <div class="el-icon-microphone  visitorIconBtns visitorFaceBtn" style="font-size: 25px;" aria-describedby="el-tooltip-1829"onclick="recOpen()" tabindex="0"></div>
              <?php endif; if($buttonSwitch['photo_state'] == 'open'): ?>
                <div class="el-icon-picture  visitorIconBtns visitorFaceBtn" style="font-size: 25px;position: relative;" aria-describedby="el-tooltip-1829"  tabindex="0" id="images1">
                 
                </div>
              <?php endif; ?>
              
             <div class="el-icon-plus btn-showtool" style="font-size: 24px;" aria-describedby="el-tooltip-7589" tabindex="0" ></div>
                 <div class="el-icon-close btn-hidetool"  aria-describedby="el-tooltip-7589" tabindex="0" style="display: none; font-size: 25px;"></div>
                </div>

            <?php if($buttonSwitch['phone_state'] =='open'): ?>
              <input type="text"  placeholder="留下电话来电回访" class="el-input__inner"  id= "phone1" style="width: 150px;height:29px !important; margin-left: 16px; margin-right: 3px;  margin-top: 5px;">
    <button type="button" class="el-button el-button--success is-circle border-radius: 50%;
    padding: 12px;" style="transform: scale(0.7);  background-color: #<?php echo $theme; ?>; border-color: #<?php echo $theme; ?>;" onclick="config_one()">
    <i class="el-icon-position" style="transform: scale(1);"></i></button>
       <?php endif; ?>

        </div>
        <div class="visitorEditor" id="msg-input"><div class="visitorEditorArea el-textarea"><textarea autocomplete="off" placeholder="# 请输入内容..." id="text_in" maxlength="1000" rows="6" class="el-textarea__inner" style="resize: none; min-height: 100px; height: 73px;"></textarea></div> <button  type="button" class="el-button visitorEditorBtn el-button--primary el-button--mini " style="background-color: #<?php echo $theme; ?>; border-color: #<?php echo $theme; ?>;" onclick="send()"><span><?php echo $lang['send']; ?> (s)</span></button></div>
    </div>
    
        <!-- 工具栏 -->
         <div class="toolbar-box" style="display: none;">

           <div class="chatExtend">
     	      <?php if($buttonSwitch['voice_state'] == 'open'): ?>
          	<div class="iconExtendBtn" onclick="recOpen()">
          	    <div  href="javascript:" style="padding: 6px 0;">
            <img class="layui-img-icon" alt="" src="/assets/images/icon/yy.png">
        </form>
		</div><div>语音</div>
	</div>
          <?php endif; if($buttonSwitch['photo_state'] == 'open'): ?>
<div id="uploadImg" class="iconExtendBtn">
    <div id="images" href="javascript:" style="padding: 6px 0;">
        <form id="picture" enctype="multipart/form-data">
            <img class="layui-img-icon" alt="" src="/assets/images/icon/tp.png">

            <div class="layui-box input-but size" style="width: 0 !important;">

                <input type="file" id="uploadInput" name="upload" class="fileinput" style="display: none;" onchange="put()" />
            </div>
        </form>
    </div>
    <div>图片</div>
</div>
<?php endif; if($buttonSwitch['mp4_state'] == 'open'): ?>
             <div id="uploadMp4" class="iconExtendBtn">
               <div id="mp4" href="javascript:" style="padding: 6px 0;">
                 <form id="mp4Form" enctype="multipart/form-data">
                   <img class="layui-img-icon" alt="" src="/assets/images/icon/sp.png">
                   <div class="layui-box input-but size" style="width: 0 !important;">
                     <input type="file" accept="video/*" id="mp4Input" name="mp4" class="fileinput" style="display: none;" onchange="mp4Put()" />
                   </div>
                 </form>
               </div>
               <div>视频</div>
             </div>
             <?php endif; if($buttonSwitch['file_state'] == 'open'): ?>
<div id="uploadFile" class="iconExtendBtn">
    <a id="files" href="javascript:" style="padding: 6px 0;">
        <form id="file" enctype="multipart/form-data">
            <img class="layui-img-icon" alt="" src="/assets/images/icon/wj.png">
            <div class="layui-box input-but size" style="width: 0 !important;">
                <input type="file" id="fileInput" name="folder" class="fileinput" style="display: none;" onchange="putfile()" />
            </div>
        </form>
    </a>
    <div>文件</div>
</div>
<?php endif; if($buttonSwitch['location_state'] == 'open'): ?>
	<div class="iconExtendBtn" onclick="get_location()">
<div id="images" href="javascript:" style="padding: 6px 0;">
    <form id="file" enctype="multipart/form-data">
                    <div class="tool-icon" >
                        <img class="layui-img-icon" alt="" src="/assets/images/icon/wz.png">

                    </div></form>
                    <div class="tool-txt" style="margin-bottom: -6px; margin-top: 5px;">位置</div>
	</div></div>
 <?php endif; if($buttonSwitch['labour_state'] == 'open'): ?>
	<div class="iconExtendBtn" onclick="zhuanrengong(<?php echo $business_id; ?>)">
    <img class="layui-img-icon" alt="" src="/assets/images/icon/zrg.png">
		<div style="margin-bottom: -6px; margin-top: 5px;">转人工</div>
	</div>
   <?php endif; if($buttonSwitch['leave_message_state'] == 'open'): ?>
	<div class="iconExtendBtn" onclick="msg()">
	     <img class="layui-img-icon" alt="" src="/assets/images/icon/ly.png">
		<div style="margin-bottom: -6px; margin-top: 5px;">留言</div>
	</div>
             <?php endif; if($buttonSwitch['message_log_state'] == 'open'): ?>
    <div class="iconExtendBtn" >
<a style="padding: 6px 10;color:#9fa19f;" target="_blank" href="" id="exportchat" alt="下载聊天记录">
		<img class="layui-img-icon" alt="" src="/assets/images/icon/xx.png">
		<div style="margin-bottom: -6px; margin-top: 5px;">消息记录</div></a>
	</div>
 <?php endif; if($buttonSwitch['translators_state'] == 'open'): ?>
	<div class="iconExtendBtn" id="lang">
		<div class="elIcon iconfont icon-duoyuyan"></div>
		<div style="margin-bottom: -6px; margin-top: 5px;">翻译</div>
	</div>
<?php endif; if($buttonSwitch['wx_state'] == 'open'): ?>
<div class="iconExtendBtn" onclick="tc('<?php echo $buttonSwitch['wx_url']; ?>')">
		    <img class="layui-img-icon" alt="" src="/assets/images/icon/wx2.png">
		<div style="margin-bottom: -6px;margin-top: 5px;">微信</div>
	</div>
<?php endif; if($buttonSwitch['qq_state'] == 'open'): ?>
	<div class="iconExtendBtn" onclick="tc('<?php echo $buttonSwitch['qq_url']; ?>')">
		    <img class="layui-img-icon" alt="" src="/assets/images/icon/qq2.png">
		<div style="margin-bottom: -6px;margin-top: 5px;">企鹅</div>
	</div>
<?php endif; if($buttonSwitch['link_state'] == 'open'): ?>
	<div class="iconExtendBtn" onclick=""><a href="<?php echo $buttonSwitch['link_url']; ?>" class="btn btn-common" target="_blank">
		    <img class="layui-img-icon" alt="" src="/assets/images/icon/herf.png">
		<div style="margin-bottom: -6px;margin-top: 5px;color:#9fa19f"><?php echo $buttonSwitch['link_text']; ?></div></a>
	</div>
<?php endif; ?>
	<div class="iconExtendBtn" onclick="openComment()">
		    <img class="layui-img-icon" alt="" src="/assets/images/icon/pj.png">
		<div style="margin-bottom: -6px;margin-top: 5px;">评价</div>
	</div>
	<div class="clear"></div>
	<div class="footContact">
      <?php if($buttonSwitch['bottom_text_state'] == 'open'): ?>
        <a ><?php echo $buttonSwitch['bottom_text']; ?></a>
      <?php endif; ?>
	</div>
</div>
</div>
       
        <div style="text-align: center;display: none;margin-top: 5px;" class="tel-box">

            <div class="input-with-select el-input el-input--mini el-input-group el-input-group--append " style="width: 150px; float: center;">
            <input type="text"  placeholder="请留下电话，我们客服联系您" class="el-input__inner"  id= "phone1" style="width: 220px;">
            <!----><div class="el-input-group__append" >
                &nbsp;
                <button type="button" class="el-button el-button--default el-button--mini"  onclick="config_one()" style="background-color: #5fb878; color: rgb(239, 235, 235);">
                <i class="el-icon-phone"></i></button>
                </div>
            </div>
        </div>

    </div>
    </div>
                    <div class="tool-txt">电话</div>
                </div>
                <div class="tool-item" id="clickbf" onclick="zhuanrengong(<?php echo $business_id; ?>)">
                    <div class="tool-icon" >
                        <img class="layui-img-icon" alt="" src="/assets/images/icon/zrg.png">

    </div>

    		<!--定位弹窗-->
		<div class="musk"></div>
		<div class="map_box" style="">
			<div style="display:flex">
				<input id="where" name="where" type="text" class="layui-input" style="width: 60%;border: 1px solid #ccc;line-height: 32px;height:32px;margin-left: 5%;margin-top:1.5rem" placeholder="请输入地址">
				<input type="button" value="搜索位置" id="sear" class="layui-btn layui-btn-normal send-btn" style="line-height:32px;height:32px;margin-left:5%;margin-top:1.5rem;background-color: #1E9FFF;font-size: 14px; width: 90px;" />
			</div>
			<div id="allmap" style="width:90%;height:70%;margin-left:5%;margin-top:1rem"></div>
			<input type="button" value="确认发送" id="showPosition" class="layui-btn layui-btn-normal send-btn" style="line-height:32px;height:32px;margin-top:1rem;background-color: #1E9FFF;font-size: 14px; width: 90px;" />
			<input type="button" value="取消发送" onClick="$('.musk').hide();$('.map_box').hide()" class="layui-btn layui-btn-normal layui-btn-danger" style="line-height:32px;height:32px;margin-top:1rem" />
		</div>
		<input type="hidden" id="lat" value="" />
		<input type="hidden" id="lng" value="" />
		
     <!--定位弹窗-->
    <script>
        $("#exportchat").attr("href",exporturl); //绑定导出记录url
        $('#closeKeyword').click(function (){
            $(this).hide()
            $('#showKeyword').show()
            $('.keyword').addClass('LeftToRight')
            $('.keyword').removeClass('RightToLeft')
        })
        $('#showKeyword').click(function (){
            $(this).hide()
            $('#closeKeyword').show()
            $('.keyword').removeClass('LeftToRight')
            $('.keyword').addClass('RightToLeft')
        })
        function phone() {
            $("#foot_msg_one").attr("style", "display:none;");//隐藏div
            //  $(".keyword").attr("style","display:none;");//隐藏div
            $(".foot_msg_20").attr("style", "display:black;");//隐藏div
            $(".foot_msg_20").attr("style", "top: 8px;");//隐藏div
        }
        function phone_one() {
            $("#foot_msg_one").attr("style", "display:black;");//隐藏div
            //   $(".keyword").attr("style","display:black;");//隐藏div
            $("#foot_msg_two").attr("style", "display:none;");//隐藏div
        }
        $('#lang').click(function () {
            $('.lang-bg').show();
        });

        function msg() {
            $('#msg-bg-3').show();
        }
        function IsPC() {
            var userAgentInfo = navigator.userAgent;
            var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod");
            var flag = true;
            for (var v = 0; v < Agents.length; v++) {
                if (userAgentInfo.indexOf(Agents[v]) > 0) { flag = false; break; }
            }
            return flag;
        }

        function msg_2() {

            if (IsPC()) {
                //openWin('/index/index/home?visiter_id=&visiter_name=&avatar=&business_id=1&groupid=0&special=1&width=100', 1000, 800)
                blzx.closeMinChatWindow('wolive-talk')
                window.open("/index/index/home?visiter_id=&visiter_name=&avatar=&business_id=1&groupid=0&special=1&width=100", "_blank", "height=800,width=950,top=50,left=200,status=yes,toolbar=no,menubar=no,resizable=yes,scrollbars=no,location=no,titlebar=no");
            } else {
                $('#msg-bg-4').show();
            }


        }

        function openWin(u, w, h) {
            var l = (screen.width - w) / 2;
            var t = (screen.height - h) / 2;
            var s = 'width=' + w + ', height=' + h + ', top=' + t + ', left=' + l;
            s += ', toolbar=no, scrollbars=no, menubar=no, location=no, resizable=no';
            open(u, 'oWin', s);
        }

        function config_one() {
            if ($('#phone1').val() == '' || DataLength($('#phone1').val()) < 11 || DataLength($('#phone1').val()) > 11) {
                layer.msg("请输入11位手机号", { icon: 2 });
                return false;
            }

            $.ajax({
                url: "/index/index/set_phone",
                type: "post",
                data: { content: '客户留言', name: $('#phone1').val(), contact: '暂无留言', services: business_id },
                dataType: 'json',
                success: function (res) {
                    if (res.code != 0) {
                        layer.msg(res.msg, { icon: 2 });
                    } else {
                        layer.msg(res.msg, { icon: 1 });
                        setTimeout(function () {
                            $('.offline').hide();
                        }, 2000)
                    }
                }
            });
        }

        function DataLength(fData) {
            var intLength = 0
            for (var i = 0; i < fData.length; i++) {
                if ((fData.charCodeAt(i) < 0) || (fData.charCodeAt(i) > 255))
                    intLength = intLength + 2
                else
                    intLength = intLength + 1
            }
            return intLength
        }
        listenForDragAndDropUploads()
    </script>
    <script>
       document.addEventListener('DOMContentLoaded', function () {
        // 获取上传按钮的 DOM 元素
        var imagesButton = document.getElementById('images');

        // 获取 input 元素
        var uploadInput = document.getElementById('uploadInput');

        // 监听点击事件
        imagesButton.addEventListener('click', function () {
            // 模拟点击 input 元素来触发文件选择对话框
            uploadInput.click();
        });
    });
           document.addEventListener('DOMContentLoaded', function () {
        // 获取上传按钮的 DOM 元素
        var imagesButton = document.getElementById('images1');

        // 获取 input 元素
        var uploadInput = document.getElementById('uploadInput');

        // 监听点击事件
        imagesButton.addEventListener('click', function () {
            // 模拟点击 input 元素来触发文件选择对话框
            uploadInput.click();
        });
    });
        document.addEventListener('DOMContentLoaded', function () {
        // 获取文件上传按钮的 DOM 元素
        var fileButton = document.getElementById('files');

        // 获取 input 元素
        var fileInput = document.getElementById('fileInput');

        // 监听点击事件
        fileButton.addEventListener('click', function () {
            // 模拟点击 input 元素来触发文件选择对话框
            fileInput.click();
        });
        var mp4Button = document.getElementById("uploadMp4")
        var mp4Input = document.getElementById("mp4Input")
          mp4Button.addEventListener('click', function () {
            // 模拟点击 input 元素来触发文件选择对话框
            mp4Input.click();
          });
    });
        var please_select_images = "<?php echo $lang['please_select_images']; ?>";
        var not_supported = "<?php echo $lang['not_supported']; ?>";
        var no_data = "<?php echo $lang['no_data']; ?>";
        var tip_waiting = "<?php echo $lang['tip_waiting']; ?>";
        var tip = "<?php echo $lang['tip']; ?>";
        var is_transfer_service = "<?php echo $lang['is_transfer_service']; ?>";
        var yes = "<?php echo $lang['yes']; ?>";
        var no = "<?php echo $lang['no']; ?>";
        var transferring = "<?php echo $lang['transferring']; ?>";
        var guess_ask = "<?php echo $lang['guess_ask']; ?>";
        var please_enter_message = "<?php echo $lang['please_enter_message']; ?>";

    </script>
    <script type="text/javascript" src="/assets/js/moblie/mochat.js?t=2"></script>
    <script>
    function tc(imageUrl){
   // 使用Layer打开图片弹窗
        layer.open({
     offest:'auto',
      type: 1,
      title: false,
      closeBtn: 1,
      area: 'auto',
      shadeClose: true,
      content: '<img style="width: 200px;height: 200px" src="' + imageUrl + '">',
    });


    };

           function tc1(){

        var imageUrl = document.getElementById("exampleImage1").src;

      // 使用Layer打开图片弹窗
var layerIndex = layer.open({
    type: 1,
    title: false,
    closeBtn: 1,
    area: 'auto',
    shadeClose: true,
    content: '<img src="' + imageUrl + '">'
});

// 获取弹窗的宽度和高度
var layerWidth = $('.layui-layer-content').width();
var layerHeight = $('.layui-layer-content').height();

// 计算居中的位置
var winWidth = $(window).width();
var winHeight = $(window).height();
var left = (winWidth - layerWidth) / 2;
var top = (winHeight - layerHeight) / 2;

// 设置弹窗的位置
layer.style(layerIndex, {
    left: left + 'px',
    top: top + 'px'
});

// 获取 layui-layer 元素
var layerElement = document.querySelector(".layui-layer");

if (layerElement) {
    // 修改 left 样式
    layerElement.style.left = "38%"; // 将 left 设置为 50px，根据您的需求修改值
} else {
    console.log("找不到 layui-layer 元素");
}

    };
        function showtool(){
            $('.toolbar-box').show()
            $('#log').css('padding-bottom','230px')
        }
        function hidetool(){
            $('.toolbar-box').hide()
            $('.tel-box').hide()
            $('#log').css('padding-bottom','50px')
        }
            $('.btn-showtool').click(function(){
                $(this).hide()
                showtool()
                $('.btn-hidetool').show()
            })
            $('.btn-hidetool').click(function(){
                $(this).hide()
                hidetool()
                $('.btn-showtool').show()
            })
            let telShow =false;
            function config_phone(){
                if(!telShow){
                    $('.tel-box').show()
                }else{
                    $('.tel-box').hide()
                }
                telShow=!telShow;
            }
            $('input#text_in').on('input',function(){
                let val = $(this).val();
                $('.btn-showtool').show()
                $('.btn-hidetool').hide()
                hidetool()
                if(val==''){
                    $('.btn-send').hide()
                    $('.face-btn').show()

                }else{
                    $('.face-btn').hide()
                    $('.btn-send').show()

                }
            })

        function isWeiXin() {
            var ua = window.navigator.userAgent.toLowerCase();
            if (ua.match(/MicroMessenger/i) == 'micromessenger') {
                return true;
            } else {
                return false;
            }
        }
        if (isWeiXin()) {
            $('.fanhui').hide();
        }
        var hint = function () {
            if (au_state === "on") {
                $('.state-mp3').html('&#xe685;');
                layer.msg('<?php echo $lang["close_wav"]; ?>', {
                    end: function () {
                        au_state = 'off';
                    }
                });
            } else {
                $('.state-mp3').html('&#xe645;');
                layer.msg('<?php echo $lang["open_wav"]; ?>', {
                    end: function () {
                        au_state = 'on';
                    }
                });
            }
        }
        //定位开始
    var lat;
    var lng;
    var map = new BMap.Map("allmap");
    function get_location() {
       // e.preventDefault();
        // navigator.geolocation.getCurrentPosition(showPosition,showError);
        $('.musk').show();
        $('.map_box').show();

        var point = new BMap.Point(116.331398,39.897445);
        map.enableScrollWheelZoom();
        map.centerAndZoom(point,12);
        var geoc = new BMap.Geocoder();
         map.addEventListener("click", function (e) {    //给地图添加点击事件
                map.clearOverlays();
                console.log(e);
                var lng = e.point.lng;
                var lat = e.point.lat;
                //创建标注位置
                var pt = new BMap.Point(lng, lat);
                var myIcon = new BMap.Icon("/static/biaozhu.png", new BMap.Size(25, 35));
                var marker2 = new BMap.Marker(pt, {icon: myIcon});  // 创建标注
                map.addOverlay(marker2);              // 将标注添加到地图中
                $('#lat').val(e.point.lat)
                $('#lng').val(e.point.lng)
                console.log(1111)
                geoc.getLocation(pt, function (rs) {
                    var addComp = rs.address;
                    loctionCity = rs.addressComponents.city;
                    console.log(loctionCity)

                    console.log(rs)
                });
            });
        var geolocation = new BMap.Geolocation();
        geolocation.getCurrentPosition(function(r){
            if(this.getStatus() == BMAP_STATUS_SUCCESS){
                var mk = new BMap.Marker(r.point);
                map.addOverlay(mk);
                map.panTo(r.point);
                lat = r.point.lat;
                lng = r.point.lng
                $('#lat').val(r.point.lat)
                $('#lng').val(r.point.lng)
                console.log(2222)
            }else{
                alert('failed'+this.getStatus());
            }
        },{enableHighAccuracy: true})
    }

    $("body").on('click', '#sear', function (e) {
        var local = new BMap.LocalSearch(map, {
            renderOptions: {map: map}
        });
        local.search(document.getElementById('where').value );
    });

    $("body").on('click', '#showPosition', function (e) {
        e.preventDefault();
        $('.musk').hide();
        $('.map_box').hide();
        var lag =$('#lng').val()
        var lat = $('#lat').val()
       showPosition(lat,lag)
    });

		// function get_location() {
		//     navigator.geolocation.getCurrentPosition(showPosition,showError);
		// }

		function showPosition(lat,lag){
            layer.msg('定位中..');
            var myGeo = new BMapGL.Geocoder();
                            var myAddress="";
                            // 根据坐标得到地址描述
                            myGeo.getLocation(new BMapGL.Point(lag, lat), function(result){
                                if (result){
                                    myAddress= result.address;
                                //alert(result.address);

                                    var myDate = new Date();
                                    var time =  myDate.getHours()+":"+myDate.getMinutes();
                                    var locationmessage='<a href="http://api.map.baidu.com/geocoder?location='+lat+','+lag+'&output=html&src=webapp.baidu.openAPIdemo" style="display: block;" target="_blank"><p style="margin-bottom: 10px">'+myAddress+'</p><img src="'+ROOT_URL+'/upload/map.png"></a>';

                                    $.ajax({
                                        url:ROOT_URL+"/admin/event/chat",
                                        type: "post",
                                        data: {service_id:service_id, visiter_id:visiter_id,content: locationmessage,business_id: business_id, avatar: pic},
                                        dataType:'json',
                                        success:function(res){
                                          time = myDate.getFullYear() + "-" + (myDate.getMonth() + 1) + "-" + myDate.getDate() + " " + myDate.getHours() + ":" + myDate.getMinutes() + ":" + myDate.getSeconds();
                                          if(res.code != 0){
                                                layer.msg(res.msg,{icon:2});
                                            } else {
                                              console.log(time)
                                            //http://api.map.baidu.com/geocoder?location="+lat+","+lag+"&output=html&src=webapp.baidu.openAPIdemo'
                                                var str = '';
                                                str += '<li class="chatmsg" style="display: unset">';
                                                str += '<div style="position: absolute;top: 26px;right: 2px;"></div>';
                                              str += `<div class='outer-right'style="flex-direction: column;align-items: end" ><span style="text-align: right">${time}</span><div class='customer'>`;
                                              str += "<pre>";

                                                str += locationmessage;
                                                str += "</pre>";
                                                str += "</div></div>";
                                                str += "</li>";
                                                $(".conversation").append(str);
                                                var div = document.getElementById("wrap");
                                                div.scrollTop = div.scrollHeight;
                                            }
                                        }
                                    });
                                }else{
                                    showError("获取定位地址失败");
                                }
                            });

		}

		function showError(error){
		    layer.msg("定位失败");
		}

		//定位结束
        $(document).one('click', function () {
            if (au_state === "off") {
                $('.state-mp3').html('&#xe645;');
                au_state = 'on';
            }
        });
        $(document).on('click', '.reset', function () {
            $('.bg').hide();
            $('.offline').hide();
        })

        $(document).on('click', '.offline .submit', function () {
            let name = $('#offline_name').val();
            let mobile = $('#offline_mobile').val();
            $.ajax({
                url: ROOT_URL + "/admin/event/info",
                type: "post",
                data: { visiter_id: visiter_id, business_id: business_id, name: name, tel: mobile },
                dataType: 'json',
                success: function (res) {
                    if (res.code != 0) {
                        layer.msg(res.msg, { icon: 2 });
                    } else {
                        layer.msg(res.msg, { icon: 1 });
                        setTimeout(function () {
                            $('.offline').hide();
                        }, 2000)
                    }
                }
            });
        });

        $(document).on('click', '.bg .submit', function () {
            let comment = '';
            if ($('.about-text').val()) {
                comment = $('.about-text').val();
            }
            let scores = [];
            $(".evaluate-score").each(function (item) {
                let title = $(this).find('.evaluate-title').text();
                let score = $(this).attr('data-score');
                scores[item] = { 'title': title, 'score': score };
            });

            $.ajax({
                url: ROOT_URL + "/admin/event/comment",
                type: "post",
                data: { service_id: service_id, visiter_id: visiter_id, comment: comment, business_id: business_id, scores: JSON.stringify(scores) },
                dataType: 'json',
                success: function (res) {
                    if (res.code != 0) {
                        layer.msg(res.msg, { icon: 2 });
                    } else {
                        layer.msg(res.msg, { icon: 1 });
                        setTimeout(function () {
                            $('.bg').hide();
                        }, 2000)
                    }
                }
            });
        });

        $(document).on('click', '.star', function (row) {
            let light = '/assets/images/index/star-light.png';
            let dark = '/assets/images/index/star-dark.png';
            let star = '/assets/images/index/star.png';
            let index = row.target.dataset.id;
            $(this).parent().find('.star').attr('src', star);
            switch (index) {
                case '1':
                    $(this).attr('src', dark);
                    $(this).parent('.evaluate-item').attr('data-score', 1)
                    break;
                case '2':
                    $(this).attr('src', dark);
                    $(this).prev('.star').attr('src', dark)
                    $(this).parent('.evaluate-item').attr('data-score', 2)
                    break;
                case '3':
                    $(this).attr('src', light);
                    $(this).prevAll('.star').attr('src', light);
                    $(this).parent('.evaluate-item').attr('data-score', 3)
                    break;
                case '4':
                    $(this).attr('src', light);
                    $(this).prevAll('.star').attr('src', light)
                    $(this).parent('.evaluate-item').attr('data-score', 4)
                    break;
                case '5':
                    $(this).parent().find('.star').attr('src', light);
                    $(this).parent('.evaluate-item').attr('data-score', 5)
                    break;
            }
        });


        var rec,recBlob;
    var recOpen=function(){
        rec=null;
        recBlob=null;
        rec=Recorder({
            type:"wav",sampleRate:16000,bitRate:16
            ,onProcess:function(buffers,powerLevel,bufferDuration,bufferSampleRate){

            }
        });

        console.log("正在打开录音，请求麦克风权限...");

        rec.open(function(){
            console.log("已打开录音，可以点击开始了");
            recStart();
        },function(msg,isUserNotAllow){
            console.log((isUserNotAllow?"UserNotAllow，":"")+"无法录音:"+msg);
            layer.msg("语音发送失败")
        });
    };

    /**关闭录音，释放资源**/

    //毫秒转换秒
    function getFormatDuration(second){
        if(second>1000){
            let result = parseInt(second/1000);
            let h =  Math.floor(result / 3600) ;
            let m = Math.floor((result / 60 % 60)) ;
            let s = Math.floor((result % 60));

            if (h>0) {
                return h+":"+m+":"+s+'"';
            } else if(m>0) {
                return m+"分:"+s+'"';
            }else{

                return s+'"';
            }

        }else{
            let result = second/1000;
            return result.toFixed(2)+'"';
        }

    }


    function recClose(){
        if(rec){
            rec.close();
            console.log("已关闭");
        }else{
            console.log("未打开录音");
        }
    }

    /**开始录音**/
    function recStart(){
        if(rec&&Recorder.IsOpen()){
            recBlob=null;
            rec.start();
            layui.use(['jquery', 'layer'], function () {
                var layer = layui.layer;
                layer.msg("请说话...", {
                    icon: 16
                    , shade: 0.01
                    , skin: 'layui-layer-lan'
                    , time: 0
                    , btn: ["发送", "取消"]
                    , yes: function (index, layero) {
                        //按钮【按钮一】的回调
                        rec.stop(function(blob,duration){
                            console.log(blob,(window.URL||webkitURL).createObjectURL(blob),"时长:"+duration+"ms");
                            recBlob=blob;

                            var fd = new FormData();
                            var wavName = encodeURIComponent('audio_recording_' + new Date().getTime() + '.wav');
                            recBlob.name = wavName
                            console.log(recBlob)
                            fd.append('wavName', wavName);
                            fd.append('file', recBlob);
                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    jsonObject = JSON.parse(xhr.responseText);
                                    voicemessage = '<div style="display: flex;"><div style="cursor:pointer;text-align:center;" onclick="getstate(this)" data="play"><audio src="'+jsonObject.data.src+'"></audio><i class="layui-icon" style="font-size:25px;">&#xe6dc;</i></div><i class="layui-icon layui-icon-rss" style="font-size:12px;"></i>'+ getFormatDuration(duration) +'</div>';

                                    //voicemessage = '<div style="cursor:pointer;text-align:center;" onclick="getstate(this)" data="play"><audio src="'+jsonObject.data.src+'"></audio><i class="layui-icon" style="font-size:25px;">&#xe6dc;</i><i class="layui-icon layui-icon-rss" style="font-size:12px;"></i>'+ getFormatDuration(duration) +'</div>';
                                    var sid = $('#channel').text();
                                    var sdata = $.cookie('cu_com');
                                    if (sdata) {
                                        var json = $.parseJSON(sdata);
                                        var img = json.avater;

                                    }
                                  var str = getOuterRight({pic:pic,content:voicemessage,time:formattingTime(new Date())})

                                    $(".conversation").append(str);
                                    $("#text_in").empty();

                                    var div = document.getElementById("wrap");
                                    div.scrollTop = div.scrollHeight;
                                    setTimeout(function(){
                                        $('.chatmsg').css({
                                            height: 'auto'
                                        });
                                    },0);
                                    $.ajax({
                                        url:ROOT_URL+"/admin/event/chat",
                                        type: "post",
                                        data: {service_id:service_id, visiter_id:visiter_id,content: voicemessage,business_id: business_id, avatar: pic,record: record},
                                        dataType:'json',
                                        success:function(res){
                                            if(res.code != 0){
                                                layer.msg(res.msg,{icon:2});
                                            }
                                        }
                                    });
                                }
                            };
                            xhr.open('POST', '/admin/event/uploadVoice');
                            xhr.send(fd);
                        });
                        recClose();
                        layer.close(index);
                    }
                    , btn2: function (index, layero) {
                        recClose();
                        layer.close(index);
                    }
                });

            });
            console.log("已开始录音...");
        }else{
            layer.msg("语音发送失败")
        }
    }

        $(document).on('touchend', '.content', function () {
            $("#text_in").blur();
            $('.tool_box').css({
                display: 'none'
            });
        });


        var getstate = function (obj) {
            var c = obj.children[0];

            var state = $(obj).attr('data');

            if (state == 'play') {
                c.play();
                $(obj).attr('data', 'pause');
                $(obj).find('i').html("&#xe651;");

            } else if (state == 'pause') {
                c.pause();
                $(obj).attr('data', 'play');
                $(obj).find('i').html("&#xe652;");
            }
            c.addEventListener('ended', function () {
                $(obj).attr('data', 'play');
                $(obj).find('i').html("&#xe652;");

            }, false);
        }

        document.getElementById("wrap").onscroll = function () {
            var t = document.getElementById("wrap").scrollTop;
            if (t == 0) {
                if ($.cookie("cid") != "") {
                    getdata(false);
                }
            }
        }

        var text = document.getElementById('text_in');
        // 获取焦点，拉到底部
        text.onfocus = function () {
            $(".tool_box").hide();
            let height = +document.documentElement.clientHeight;
            setTimeout(function () {
                $('html ,body').animate({ scrollTop: height }, 0);
            }, 200)
        }
        // 失去焦点，拉到顶部
        text.onblur = function () {
            setTimeout(function () {
                $('html ,body').animate({ scrollTop: 0 }, 0);
            }, 0)
        }

    </script>
</body>
</html>