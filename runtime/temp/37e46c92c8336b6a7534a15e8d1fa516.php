<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/www/wwwroot/kkk.wmkf.xyz/public/../application/mobile/view/admin/talk.html";i:1701087106;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/favicon.ico" />
    <title>与客服对话中...</title>
    <script>
    ROOT_URL = "<?php echo !empty($baseroot)?$baseroot:''; ?>";
    </script>
  <script type="text/javascript" src="/assets/js/utils.js"></script>
    <script type="text/javascript" src="/assets/libs/jquery/jquery.min.js?v=AI_KF"></script>
    <script src="/assets/libs/layui/layui.js?v=AI_KF" type="text/javascript"></script>
    <script src="/assets/libs/jquery/jquery.cookie.js?v=AI_KF" type="text/javascript"></script>
    <link href="/assets/libs/layui/css/layui.css?v=AI_KF" rel="stylesheet">
    <script src="/assets/libs/push/pusher.min.js?v=AI_KF" type="text/javascript"></script>
    <script src="/assets/libs/layer/layer.js?v=AI_KF" type="text/javascript"></script>
    <script src="/assets/libs/jquery/jquery.form.min.js?v=AI_KF" type="text/javascript"></script>
    <script src="/assets/libs/vue/vue.js?v=AI_KF" type="text/javascript"></script>
    <script type="text/javascript" src="//api.map.baidu.com/api?type=webgl&v=1.0&ak=<?php echo $baidu_map_key; ?>"></script>
<script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=<?php echo $baidu_map_key; ?>"></script>
  <script type="text/javascript" src="/assets/libs/webrtc/recorder.wav.min.js?v=AI_KF}"></script>
    <style>
        [v-cloak]{
            display: none;
        }
        * {
            -webkit-overflow-scrolling: touch;
        }

        html, body, button, input, textarea, pre {
            font-family: "Helvetica Neue", Helvetica, "Microsoft Yahei", Arial, sans-serif
        }
.musk {
    position: fixed;
    top: 0;
    left: 0;
    display: none;
    z-index: 999;
    background-color: #000;
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
        
        .foot_msg {
            width: 100%;
            height: 100%;
            overflow: auto;
            position: relative;
        }

        .msg-toolbar {
            padding: 0 5%;
            height: 44px;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 0 auto;
            background-color: #F2F5F7;
            display: flex;
        }

        .msg-toolbar a {
            flex-grow:  1;
            text-align: center;
        }

        .msg-toolbar a img {
            margin-top: 10.5px;
            height: 23px;
            width: 23px;
        }

        .input-but {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            width: 30px;
            height: 30px;

        }

        .my-circle {
            border-radius: 10px;
        }

        .fileinput {
            width: 30px;
            height: 30px;
            position: absolute;
            top: 0px;
            right: 0px;
            opacity: 0;
            filter: alpha(opacity=0);
            cursor: pointer;
        }

        .edit-ipt {
            border: 2px solid #ddd;
            width: 78%;
            outline: none;
            text-indent: 10px;
            border-radius: 6px;
            /*margin-left: 2px;*/
            background-color: #fff;
            padding-top: 6px;
            font-weight: normal;
            font-size: 16px;
            overflow-y: auto;
            height: auto;
            min-height: 32px;
            overflow-x: hidden;
            word-break: break-all;
            font-style: normal;
        }

        .outer-right {
            float: right;
            width: 80%;
            font-size: 14px;
        }

        .outer-left {
            max-width: 90%;
            float: left;
            position: relative;
            left: 38px;
            font-size: 14px;
        }

        .outer-iframe-left {
            float: left;
            position: relative;
            clear: both;
            padding-top: 5px;
        }

        .service {
          margin-left: 10px;
            background-color: #f7f7f7;
            display: flex;
            padding: 12px;
            word-break: break-all;
            word-wrap: break-word;
            color: #333;
            border-radius: 8px;
            border-top-right-radius: 0;
            max-width: 100%;
            box-sizing: border-box;
        }
        .noredcustomer {
            display: inline-block;
            float: right;
            word-break: break-all;
            word-wrap: break-word;
            color: #aca7a7;
            box-sizing: border-box;
            width: 10%;
            font-size: 10px;
            padding-top: 21px;
        }
        .customer {
            background-color: #0583f8;
            display: inline-block;
            margin-left: 10px;
            padding: 12px;
            float: left;
            word-break: break-all;
            word-wrap: break-word;
            color: #fff;
            border-radius: 8px;
            border-top-left-radius: 0;
            position: relative;
            left: 0px;
            max-width: 80%;
        }

        .chatmsg {
            margin-bottom: 35px;
            position: relative;
            height: 250px;
        }
        .outer-right > .msg_body{
          display: flex;
          flex-direction: column;
          align-items: flex-end;
        }

        .chatmsg_notice {
            position: relative;
        }

        .chatmsg img {
            max-width: 100%;
            max-height: 100px;
            cursor: pointer;
        }

        .wolive_img img {
            width: 100%;
            max-height: none;
        }

        .chatmsg:after, .chatmsg p {
            content: "";
            display: table;
            width: 100%;
            clear: both;
        }

        .wolive_price {
            color: red;
            margin: 10px 0;
        }

        .service-name {
            float: left;
            display: block;
            position: relative;
            font-size: 12px;
            color: #8D8D8D;
        }

        .showtime {
            color: #D2D2D2;
            position: relative;
            margin-bottom: 10px;
            font-size: 12px;
            text-align: center;
            height: 15px;
            padding-top: 10px;
        }

        .content {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            overflow-y: auto;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .newmsg {
            position: absolute;
            left: 33px;
            top: 13px;
            display: inline-block;
            line-height: 18px;
            color: #0C0C0C;
            text-align: center;
            width: 20px;
            height: 20px;
            border: 1px solid #ddd;
            border-radius: 20px;
            background: #ddd;
        }

        .hide {
            display: none;
        }

        .tool_box {
            width: 100%;
            height: auto;
            position: absolute;
            bottom: 94px;
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
            padding: 0px;
        }
        
        .chatmsg .my-circle {
            position: absolute;
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        #text_all {
            width: 100%;
            padding-right: 20%;
            height: 50px;
            float: left;
            border: 0;
            padding-left: 12px;
            color: #555555;
            font-size: 14px;
        }

        #text_all+.send-btn {
            position: absolute;
            right:12px;
            top:9px;
            width:60px;
            height: 32px;
            line-height: 32px;
            padding: 0;
            text-align: center;
        }
        .wolive_product {
            display: block;
            height: 100%;
            position: relative;
            min-width: 170px;
        }
        .wolive_img {
            width: 100%;
        }
        .wolive_head {
            padding-top: 10px;
        }

        .bg {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            z-index: 10;
            background-color: rgba(0, 0, 0, 0.3)
        }

        .group {
            width: 300px;
            position: absolute;
            left:50%;
            top:50%;
            transform: translate(-50%, -60%);
            margin: auto;
            background-color: #fff;
            border-radius: 5px;
        }

        .group-title {
            line-height: 50px;
            height: 50px;
            text-align: center;
            font-weight: bold;
        }

        .group-list {
            margin-bottom: 5px;
        }

        .group-item {
            padding: 0 20px;
            height: 50px;
            line-height: 50px;
            border-top: 1px solid #DDDDDD;
        }

        .group-item:first-of-type {
            border-top: 0;
        }

        .group-btn {
            width: 300px;
            height: 45px;
            position: relative;
        }

        .group-cancel,.group-submit {
            width: 150px;
            height: 45px;
            line-height: 45px;
            text-align: center;
            font-size: 14px;
            position: absolute;
            bottom: 0;
        }

        .group-cancel {
            color: #555555;
            background-color: #F5F5F5;
            border-bottom-left-radius: 5px;
            left: 0;
        }

        .group-submit {
            background-color: #2E9FFF;
            color: #fff;
            border-bottom-right-radius: 5px;
            right: 0;
        }

        .group-item input[type='checkbox'] {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            margin-right: 2px;
            background-color: #fff;
            background: url("/assets/images/mobile/select.png") no-repeat center;
            background-size: 16px 16px;
            font-size: 12px;
            display: inline-block;
            position: relative;
            top: 4px;
            -webkit-appearance:none;
            outline: none;
        }

        .group-item input[type=checkbox]:checked{
            background: url("/assets/images/mobile/select-active.png") no-repeat center;
            background-size: 16px 16px;
        }

        .group-num {
            color: #999999;
            margin-left: 5px;
        }

        .group-name {
            margin-left: 5px;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }

        .footer{
            border-top: 1px solid #ebeff0;
        }

        .user-name {
            display: inline-block;
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .push-evaluation {
            width: 100px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            border-radius: 15px;
            background-color: #F5FAFF;
            color: #50ACFF;
            margin: 0 auto 15px;
        }
        .revoke-text{cursor: pointer;color: #cecccc;border: unset;background:unset}
        .trans{
            cursor: pointer;
            color: #dfdede;
            background: #a2a2a2;
            padding: 2px 10px;
            border-radius: 2500px;
            margin-left: 5px;
            font-size: 8px;
        }
        .trans-data {
            margin-top: 10px;
            border-top: 1px dashed #a2a2a2;
            padding-top: 10px;
        }
    </style>
    <script>
      var translators_state = '<?php echo $buttonSwitch['translators_state']; ?>';
        var config = {
            'app_key': '<?php echo $app_key; ?>',
            'web_host': '<?php echo $whost; ?>',
            'web_port': '<?php echo $wport; ?>',
            'value': '<?php echo $value; ?>',
            'business_id': '<?php echo $user["business_id"]; ?>',
            'service_id': '<?php echo $user["service_id"]; ?>',
            'voice_state': '<?php echo $voice; ?>',
            'voice_address': '<?php echo $voice_address; ?>'
        };
        var exporturl='/mobile/index/export?visiter_id=<?php echo $data['visiter_id']; ?>&service_id=<?php echo $user["service_id"]; ?>&business_id=<?php echo $user["business_id"]; ?>';
        var pic = '<?php echo $avatar; ?>';
        var imghead = '<?php echo $img; ?>';
        var num = 0;
        //标记已看消息
        function getwatch(cha) {
            $.ajax({
                url:ROOT_URL+"/admin/set/getwatch",
                type: "post",
                data: {visiter_id: cha}
            });
        }

        // new pusher 链接websocket
        var wolive_connect = function () {
            if (config.value == 'true') {
                var pusher = new Pusher(config.app_key, {
                    encrypted: true
                    , enabledTransports: ['wss']
                    , wsHost: config.web_host
                    , wssPort: config.web_port
                    , authEndpoint: '/auth.php'
                    , disableStats: true
                });
            } else {
                var pusher = new Pusher(config.app_key, {
                    encrypted: false
                    , enabledTransports: ['ws']
                    , wsHost: config.web_host
                    , wsPort: config.web_port
                    , authEndpoint: '/auth.php'
                    , disableStats: true
                });
            }

            var value = "<?php echo $user['service_id']; ?>";
            var channel = pusher.subscribe("kefu" + value);
            // 发送一个推送
            channel.bind("callbackpusher",function(data){
                $.post("<?php echo url('admin/set/callback','',true,true); ?>",data,function(res){

                })
            });
//接收消息
            channel.bind("cu-event", function (data) {

                $.ajax({
                    url: ROOT_URL + "/weixin/chat/checkchats",
                    type: "post",
                    data: { visiter_id: data.message.visiter_id, content: "正在输入"}
                });
                if("<?php echo $voice; ?>" == 'open'){
                    document.getElementById("chat-message-audio").play();
                }
                var showtime = '';
                if (data.message.visiter_id == "<?php echo $data['visiter_id']; ?>") {
                    var msg = '';
                    if(data.message.content.indexOf('<img')>= 0||data.message.content.indexOf('<a')>= 0||!isNaN(data.message.content)||data.message.content.indexOf('<video')>= 0){
                        msg +=  data.message.content ;
                      
                    }else{
                         if(data.message.content_trans =='' && translators_state=='open'){
                           msg += data.message.content + "<p class='trans-data'>译文："+data.message.content_trans+"</p>";
                        }else if(translators_state=='open'){
                           msg += data.message.content + "<span class='trans' data-cid='"+data.message.cid+"'>翻 译</span>";
                        }else{
                            msg = data.message.content;
                        }
                    }
                    data.message.content = msg;
                  data.message.nick_name = '';
                  data.message.time = formattingTime(new Date(data.message.timestamp*1000));
                    msg = getOuterLeft(data.message)
                    $('.conversation').append(msg);
                    getwatch(data.message.visiter_id);
                } else {
                    num++;
                    if (num > 0) {
                        $(".newmsg").removeClass('hide');
                    } else {
                        $(".newmsg").addClass('hide');
                    }
                    $(".newmsg").text(num);
                }
                var div = document.getElementById("wrap");
                div.scrollTop = div.scrollHeight;
                
                $("img[src*='upload/images']").parent().parent('.customer').css({
                    padding: '0',borderRadius: '0',maxHeight:'100px'
                });
                $("img[src*='upload/images']").parent().parent('.service').css({
                    padding: '0',borderRadius: '0',maxHeight:'100px'
                });

                setTimeout(function(){
                    $('.chatmsg').css({
                        height: 'auto'
                    });
                },0)
            });

            channel.bind('logout', function () {
                $("#status").text('[离线]');
            });

            channel.bind('geton', function () {
                $("#status").text('');
            });


            pusher.connection.bind('state_change', function (states) {
                // states = {previous: 'oldState', current: 'newState'}
                if (states.current == 'unavailable' || states.current == "disconnected" || states.current == "failed") {

                    pusher.unsubscribe("kefu" + value);
                    pusher.unsubscribe("all" + all);
                    $.cookie("hid", '');
                    wolive_connect();
                }

            });

            pusher.connection.bind('connected', function () {
                $(".chatmsg").remove();
                $.cookie('hid', '');
                getdata();
            });
        }
    </script>
</head>

<body>
<audio id="chat-message-audio">
    <source id="chat-message-audio-source" src="<?php echo $voice_address; ?>" type="audio/mpeg" />
</audio>
    <header style="width: 100%;height: 50px;background: #0583f8;color: #fff;position:fixed;line-height: 50px;z-index: 99">
        <span class="newmsg hide"></span>
        <i class="layui-icon" style="position: absolute;left:10px;font-size: 20px;z-index: 999" onclick="back()">&#xe603;</i>
        <span id="customer"
          style="position:absolute;left:0;font-size: 14px;width: 100%;display: flex;justify-content: center;"><span class="user-name"><?php echo $data['visiter_name']; ?></span><span
        id="status"></span></span>
        <img onclick="openGroup()" style="position:absolute;right:15px;width: 18px;height: 18px;top: 16px;" src="/assets/images/mobile/more.png" alt="">
</header>
        <section class="content" id="wrap" style="background-color: #ffffff">
            <div style="height: 55px;width: 100%;"></div>
            <ul class="conversation" id="log">
            </ul>
            <div id="bottom" style="height: 94px;width: 100%;"></div>
        </section>
        <footer style="position:fixed;bottom:0px;width: 100%;height: 94px;padding:0">
            <div class="tool_box">
                <div class="wl_faces_content">
                    <div class="wl_faces_main">
                    </div>
                </div>
            </div>
            <div class="foot_msg">
                <div class="footer">
                    <input type="text" id="text_all" placeholder="发消息..." class="layui-input" />
                    <button class="layui-btn layui-btn-normal send-btn" onclick="send()">发送
                    </button>
                </div>
                <div class="msg-toolbar">
                    <a id="face_icon" href="javascript:" onclick="faceon()"><img src="/assets/images/admin/B/smile.png" alt=""></a>
                        <a onclick="recOpen()" title="发送语音"><i class="layui-icon" style="font-size: 25px;cursor: pointer;color:#9c9c9c;line-height: 45px;display: inline-block;">&#xe6dc;</i></a>
                    <a id="images" href="javascript:">
                        <form id="picture" enctype="multipart/form-data">
                            <div class="layui-box input-but size">
                                <img src="/assets/images/admin/B/photo.png" alt="">
                                <input type="file" name="upload" class="fileinput" onchange="put()"/>
                            </div>
                        </form>
                    </a>
                    <a id="files" href="javascript:">
                        <form id="file" enctype="multipart/form-data">
                            <div class="layui-box input-but size">
                                <img src="/assets/images/admin/B/file.png" alt="">
                                <input type="file" name="folder" class="fileinput" onchange="putfile()"/>
                            </div>
                        </form>
                    </a>
                        <a onclick="get_location()"><img src="/assets/images/admin/B/a_location.png" alt="位置" title="发送定位"></a>
                              <a  target="_blank" href="" id="exportchat" alt="下载聊天记录">
                        <i  class="layui-icon layui-icon-download-circle" style="font-size: 25px;line-height: 45px;cursor: pointer;color: #9c9c9c"></i>
                    </a>
                    <!-- 推送评价 -->
                    <a id="evaluate" href="javascript:" onclick="toEvaluate()"><img src="/assets/images/mobile/get-evaluate.png" alt=""></a>
                    <a id="trans" href="javascript:" onclick="toTrans()"><img src="/assets/images/admin/B/fanyi.png" alt=""></a>
                </div>
            </div>
        </footer>
        <input type="hidden" id="lang" value="<?php echo $data['lang']; ?>"/>
        <div id='group' class="bg" v-if="openGroup" v-cloak>
            <div class="group">
                <div class="group-title">编辑分组</div>
      
                <div class="group-list">
                    <div class="group-item" v-for='item in list'>
                        <input class='checkbox' v-model="item.choose" :value="item.id" name='group' type='checkbox'>
                        <span class="group-name">{{item.group_name}}<span class="group-num">({{item.count}})</span></span>
                    </div>
                </div>
                <div class="group-btn">
                    <div @click="openGroup = false" class="group-cancel">取消</div>
                    <div @click="edit" class="group-submit">确定</div>
                </div>
            </div>
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
<script type="application/javascript">
    var se = '<?php echo $se['nick_name']; ?>';
    var visiter_id = '<?php echo $data['visiter_id']; ?>';
    var img = '<?php echo $data['avatar']; ?>';
    var pic = '<?php echo $data['avatar']; ?>';
    var  nickname='<?php echo $data['visiter_name']; ?>';
</script>
<script type="text/javascript" src="/assets/js/admin/mchat.js?v=AI_KF"></script>
<script >
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
                            var sid = "<?php echo $data['visiter_id']; ?>";
                            var pic = "<?php echo $data['avatar']; ?>";
                            var unstr=(new Date()).valueOf()+randomChar(5)+sid;

                            var sdata = $.cookie('cu_com');

                            if (sdata) {
                                var json = $.parseJSON(sdata);
                                var img = json.avater;

                            }
                            
                            var myDate = new Date();
                            var time =  myDate.getHours()+":"+myDate.getMinutes();
                            var locationmessage='<a href="http://api.map.baidu.com/geocoder?location='+lat+','+lag+'&output=html&src=webapp.baidu.openAPIdemo" style="display: block;" target="_blank"><p style="margin-bottom: 10px">'+myAddress+'</p><img src="/upload/map.png"></a>';
                            
                            $.ajax({
                                url:"/admin/set/chats",
                                type: "post",
                                data: {visiter_id:sid,content:  locationmessage, avatar: img,unstr:unstr},
                                dataType:'json',
                                success:function(res){
                                    if(res.code != 0){
                                        layer.msg(res.msg,{icon:2});
                                    } else {
                                   
                                        var str = '';
                                    
                                        str += locationmessage + "<button onclick=revoke('" + unstr + "',2); class='revoke-text'>撤销</button>";
                                        str = getOuterRight({content:str,pic:pic,time:formattingTime(myDate)})
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
    // var lat = position.coords.latitude; //纬度
    // var lag = position.coords.longitude; //经度
    //经纬度转换 GPS转百度地图坐标
    // var ggPoint = new BMapGL.Point(lag,lat);
    // //坐标转换回调
    // translateCallback = function (data){
    //     if(data.status === 0) {
          
    //         lat=data.points[0].lat;
    //         lag=data.points[0].lng;
    //         console.log(lat+"|"+lag);
    //                //BAIDU 地图地址逆解析
    //                 // var map = new BMapGL.Map("container");      
    //                 // map.centerAndZoom(new BMapGL.Point(116.404, 39.915), 11);      
    //                 // 创建地理编码实例      
                 
          

    //     }
    // }

    // //坐标转换开始
    // var convertor = new BMapGL.Convertor();
    // var pointArr = [];
    // pointArr.push(ggPoint);
    // convertor.translate(pointArr, COORDINATES_WGS84, COORDINATES_BD09, translateCallback);	 
}

function showError(error){
    layer.msg("定位失败");
}

//定位结束
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
            layer.msg((isUserNotAllow?"UserNotAllow，":"")+"无法录音:"+msg)
        });
    };

    /**关闭录音，释放资源**/
    function recClose(){
        if(rec){
            rec.close();
            console.log("已关闭");
        }else{
            console.log("未打开录音");
        }
    }

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
                            fd.append('wavName', wavName);
                            fd.append('file', recBlob);
                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    jsonObject = JSON.parse(xhr.responseText);

                                    voicemessage = '<div style="display: flex;"><div style="cursor:pointer;text-align:center;" onclick="getstate(this)" data="play"><audio src="'+jsonObject.data.src+'"></audio><i class="layui-icon" style="font-size:25px;">&#xe6dc;</i></div><i class="layui-icon layui-icon-rss" style="font-size:12px;"></i>'+ getFormatDuration(duration) +'</div>';

                                    var sid = "<?php echo $data['visiter_id']; ?>";
                                    var pic = "<?php echo $data['avatar']; ?>";
                                    var unstr=(new Date()).valueOf()+randomChar(5)+sid;

                                    var sdata = $.cookie('cu_com');

                                    if (sdata) {
                                        var json = $.parseJSON(sdata);
                                        var img = json.avater;

                                    }

                                    var myDate = new Date();
                                    var str = '';
                                    str +=  voicemessage + "<button onclick=revoke('" + unstr + "',2); class='revoke-text'>撤销</button>";
                                    str = getOuterRight({content:str,pic:pic,time:formattingTime(myDate)});
                                    $(".conversation").append(str);
                                    $("#text_in").empty();

                                    var div = document.getElementById("wrap");
                                    div.scrollTop = div.scrollHeight;
                                    $(".chatmsg").css({
                                        height: 'auto'
                                    });
                                    $.ajax({
                                        url:"/admin/set/chats",
                                        type: "post",
                                        data: {visiter_id:sid,content:  voicemessage, avatar: img,unstr:unstr}
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
            layer.msg("发送语音失败")
        }
    }
    $(function() {
          $("#exportchat").attr("href",exporturl); //绑定导出记录url
        $("#text_all").bind('input propertychange', function() {

        })
    })
</script>
</body>

</html>