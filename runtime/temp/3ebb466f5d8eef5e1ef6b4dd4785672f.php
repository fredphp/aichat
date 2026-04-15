<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/www/wwwroot/cs.wmtao.xyz/public/../application/service/view/login/reg.html";i:1701046656;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo (isset($business['business_name']) && ($business['business_name'] !== '')?$business['business_name']:"在线客服系统"); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/static/component/layui/css/layui.css" media="all">
      <!--<meta name="viewport" content="width=device-width, initial-scale=0, maximum-scale=0, user-scalable=yes,shrink-to-fit=no">-->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <style>
  *{
      box-sizing: border-box;
  }
    body{
      height: 100%;
      width: 100%;
    }
    .main-body {
      background:url('/assets/images/admin/loginBg.png') center bottom no-repeat;
      background-color: #ff6e26;
      width: 100%;
      background-size:cover;
      height: 100vh;
      position: relative;
    }
    .main-body .signFlowHomePage-content{
          -webkit-box-flex: 1;
          -ms-flex: 1;
          flex: 1;
          display: -webkit-box;
          display: -ms-flexbox;
          display: flex;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
          -ms-flex-direction: column;
          flex-direction: column;
          -webkit-box-align: center;
          -ms-flex-align: center;
          align-items: center;
          -webkit-box-pack: center;
          -ms-flex-pack: center;
          justify-content: center;
          border-radius: 2px;
          min-height: 700px;
          height: calc(100% - 140px);
          box-sizing: border-box;
    }
      .main-body .signFlowHomePage-content .login{
             width: 440px;
        margin: 0 auto;
        text-align: center;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 10px 36px rgba(233, 21, 6, 0.2);
      }
    .main-body .signFlowHomePage-content .login .login_body_main{
            display: block;
    padding: 0px 45px;
    width: 100%;
    position: relative;
    padding-bottom: 65px;
       
     
    }
    .main-body .signFlowHomePage-content .login .login_body_main .topLogoAndTitle{
        padding-top: 30px;
    }
    .main-body .signFlowHomePage-content .login_body_main  .topLogoAndTitle .loginLogo {
        width: 186px;
        overflow: hidden;
        margin: 0 auto;
    }
    .main-body .signFlowHomePage-content .login .login_body_main  .topLogoAndTitle .loginTitle {
        text-align: center;
      margin-top: 14px;
      font-size: 14px;
      color: #333333;
      font-weight: normal;
    }
     .main-body .signFlowHomePage-content .login .login_body_main > form {
            margin-top: 10px;
    position: relative;
    }
     .main-body .signFlowHomePage-content .login .login_body_main > form >.item {
         line-height: 24px;
          display: block;
  font-weight: normal;
  border-bottom: 1px solid #ccc;
  position: relative;
  padding-top: 30px;
  -webkit-transition: all .4s;
  -moz-transition: all .4s;
  -ms-transition: all .4s;
  -o-transition: all .4s;
  transition: all .4s;
     }
     .main-body .signFlowHomePage-content .login .login_body_main > form >.item input {
          border: none;
  width: 100%;
  font-size: 12px;
  color: #333;
     }
     .main-body .signFlowHomePage-content .login .login_body_main > form >.item > .view_code{
         position: absolute;
  bottom: -1px;
  right: 0px;
  width: 212px;
  height: 50px;
  background: #fff;
  padding-left: 46px;
  padding-right: 40px;
     }
     .main-body .signFlowHomePage-content .login .login_body_main > form >.item > .view_code >img{
             cursor: pointer;
    display: block;
    width: 100%;
    height: 100%;
     }
     .main-body .signFlowHomePage-content .login .login_body_main > form > .loginBtn{
         margin-top: 30px;
         height: 80px;
     }
     .main-body .signFlowHomePage-content .login .login_body_main > form > .loginBtn > button{
         border:unset;
          display: block;
  width: 100%;
  height: 44px;
  line-height: 44px;
  color: #fff;
  background: #5fb878;
  border-radius: 4px;
  margin: 0 auto;
  font-size: 14px;
  text-align: center;
  text-decoration: none;
  -webkit-transition: all .3s;
  -moz-transition: all .3s;
  transition: all .3s;
     }
     .main-body .signFlowHomePage-content .login .login_body_main > form > .loginBtn  >a{
          border:unset;
          display: block;
  width: 100%;
  height: 44px;
  line-height: 44px;
  color: #fff;
  background: #1e9fff;
  border-radius: 4px;
  margin: 0 auto;
  font-size: 14px;
  text-align: center;
  text-decoration: none;
  -webkit-transition: all .3s;
  -moz-transition: all .3s;
  transition: all .3s;
     }
      .main-body .signFlowHomePage-content .login .login_body_main .chooseLoginAndRegister{
           display: flex;
    flex-direction: column;
    justify-content: center;
          width: 100%;
  height: 65px;
  font-size: 14px;
  color: #999;
  text-align: center;
  background: #f5f5f5;
  text-decoration: none;
  position: absolute;
  bottom: 0px;
  left: 0px;
      }
        .main-body .signFlowHomePage-content .login .login_body_main .chooseLoginAndRegister >span >a{
             -webkit-transition: all .3s;
  -moz-transition: all .3s;
  transition: all .3s;
  color: #ff6d01;
  margin-left: 4px;
  text-decoration: underline;
        }
  
    /*@media screen and (max-width:520px) {*/
    /*    .login_body_main{*/
    /*        width: 90% !important;*/
    /*    }*/
    /*  .login_body_main .login_body_left {display: none !important}*/
    /*  .login_body_main .login_body_left_right {width:100% !important;border-radius:20px !important;}*/
    /*}*/
  </style>
</head>
<body>
<div class="main-body">
    <div class="signFlowHomePage-content">
     <div class="login">
            <div class="login_body_main">
        <div class="topLogoAndTitle">
            <div class="loginLogo"><img src="/assets/images/admin/newLogo.png" alt="应用公园"></div>
            <h2 class="loginTitle">注册客服平台<span>&amp;全渠道客户一站式管理</span></h2>
        </div>
        <form class="layui-form login-bottom">

            <div class="item">
              <span class="icon icon-2"></span>
              <input type="text" name="username" lay-verify="required" placeholder="请输入登录账号"
                     maxlength="24"/>
            </div>

            <div class="item">
              <span class="icon icon-3"></span>
              <input type="password" name="password" lay-verify="required" placeholder="请输入密码"
                     maxlength="20">
              <span class="bind-password icon icon-4"></span>
            </div>

            <div id="validatePanel" class="item" >
              <input type="text" name="captcha" placeholder="请输入验证码" maxlength="4">
              <div class="view_code">
                    <img id="refreshCaptcha" class="validateImg" src="<?php echo url('captcha'); ?>"
                   onclick="this.src='<?php echo url('captcha'); ?>?_r='+Math.random();" title="不清楚? 点击换一个">
              </div>
            
            </div>
             <div class="loginBtn">
                <button lay-submit="" lay-filter="login">立即注册</button>
              <!--<a href="/service/login/reg"><p class="login-btn">免费注册</p></a>-->
            </div>
            <div class="loginBtn" style="margin-top:0">
                <a  href="/service">客服登录</a>
              <!--<a href="/service/login/reg"><p class="login-btn">免费注册</p></a>-->
            </div>


        </form>
        <div class="chooseLoginAndRegister">
            <div> ©版权所有 <?php echo date('Y'); ?> <a href="/">在线客服系统</a></div>
        </div>
      </div>
    </div>
   
    

  </div>
</div>


<script src="/static/component/layui/layui.js" charset="utf-8"></script>
<script>
    layui.use(['form','jquery'], function () {
        var $ = layui.jquery,
            form = layui.form,
            layer = layui.layer;

        form.on('submit(login)', function(data) {
            if (data.field.username == '') {
                layer.msg('用户名不能为空');
                return false;
            }
            if (data.field.password == '') {
                layer.msg('密码不能为空');
                return false;
            }
            if (data.field.captcha == '') {
                layer.msg('验证码不能为空');
                return false;
            }
            layer.load();
            $.ajax({
                type: "POST",
                url: "reg_check",
                data: data.field,
                success: function (res) {
                    layer.closeAll('loading');
                    if (res.code==1){
                        layer.msg(res.msg,{icon:1,time:1000},function () {
                            location.href = res.url;
                        })
                    } else {
                        layer.msg(res.msg,{icon:2,time:1000},function () {
                            initCode();
                        })
                    }
                }
            });
            return false;
        });

        function initCode() {
            $('#refreshCaptcha').attr("src","<?php echo url('captcha'); ?>?r=" + Math.random());
        }

        // 登录过期的时候，跳出ifram框架
        if (top.location != self.location) top.location = self.location;

        $('.bind-password').on('click', function () {
            if ($(this).hasClass('icon-5')) {
                $(this).removeClass('icon-5');
                $("input[name='password']").attr('type', 'password');
            } else {
                $(this).addClass('icon-5');
                $("input[name='password']").attr('type', 'text');
            }
        });
    });
</script>
</body>
</html>