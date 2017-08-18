<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- 让360双核浏览器用webkit内核渲染页面-->
    <meta name="renderer" content="webkit">
<title><?=$this->iff($args[0], $args[0] . '－'). $this->settings['webName']?></title>

<script type="text/javascript" src="/skin/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="/skin/js/onload.js?v=wj5.0"></script>
<script type="text/javascript" src="/skin/js/reglogin.js?v=wj5.0"></script>
<script type="text/javascript">window.onerror=function(){return true;}</script>

    <link href="/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/css/jquery.spinner.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div class="login_bg">

    <div class="top top_logo">
        <div class="top_content">
            <div class="logo"><img src="/images/logo_login.png" width="270" height="74" alt=""/></div>
            <div class="user_info">
                <ul>
                    <li><a href="<?=$this->settings['kefuGG']?>" target="_blank"><i class="ico_user"></i>在线客服</a></li>
                    <li><a href="#"><i class="ico_qq"></i>QQ客服</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content_login">
    <form action="/index.php/user/logined" method="post" onajax="userBeforeLogin" enter="true" call="userLogin" target="ajax">
        <div class="login_bg2">
            <div class="login_msg">
               <div class="form_login">
                   <div class="login_input user_input ">
                       <i></i><input type="text" name="username" id="username" value="<?php echo $_COOKIE['username'];?>" />
                   </div>
                   <div class="login_input pwd_input ">
                       <i></i><input type="password" name="password" id="password" value="" />
                   </div>
                   <div class="forget_pwd">
                       <label><?php if($_COOKIE['remember'] == 1){?><input type="checkbox" name="remember" value="1" checked><?php }else{($_COOKIE['remember'] == "")?><input type="checkbox" name="remember" value="1"><?php }?><a href="#">记住账户</a>  | <a href="/passforget.html">忘记密码</a> | <a href="/index.php/user/r">注册</a></label>
                       <input name="vcode" type="hidden" id="vcode" value=""/>
                   </div>
                   <div class="login_btn"><a href="#" onclick="$(this).closest('form').submit();return false;" id="acc"><img src="/images/login_btn.png" alt="" width="236" height="38"/></a></div>
               </div>
            </div>
        </div>
    </form>
    </div>
<div class="footer">
    <div class="ft_con">
        <a href="/caipiao/index.html">牛彩首页</a> |
        <a href="/caipiao/news.html">彩界咨询</a> |
        <a href="/caipiao/youyi.html">牛彩游艺</a> |
        <a href="/caipiao/youhui.html">优惠活动</a> |
        <a href="/caipiao/jiameng.html">代理加盟</a> |
        <a href="/caipiao/about.html">关于我们</a> |
        客服QQ：1844388123 |  版权所有    牛彩娱乐--USA.2016</div>
</div>
</div>

<script type="text/javascript" src="/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="/js/jquery.spinner.js"></script>
<script type="text/javascript">
    $('.spinnerExample').spinner({});
</script>
<script type="text/javascript">
    function adjustHeight(){
        var h = $(window).height();
        $(".content_login").css("height",h-74-65);
    }
    $(document).ready( function() {
                adjustHeight();
            }
    )
    $(window).resize(function(){
        adjustHeight();
    });

</script>
<script type="text/javascript" language=JavaScript charset="UTF-8">
      document.onkeydown=function(event){
            var e = event || window.event || arguments.callee.caller.arguments[0];          
             if(e && e.keyCode==13){ // enter 键
                document.getElementById('acc').click();
            }
        }; 
</script>

</body>
</html>
