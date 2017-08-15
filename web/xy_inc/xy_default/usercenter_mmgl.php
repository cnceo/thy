<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="IE=EmulateIE8" http-equiv="X-UA-Compatible" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name=”renderer” content=”webkit” />
<?php
$row1 = $this->getRows("select * from {$this->prename}content where enable=1 and nodeId=1");
$row2 = $this->getRows("select * from {$this->prename}message_receiver where to_uid={$this->user['uid']}");
?>
<title><?= $this->settings['webName'] ?></title>
<link href="/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="/css/style.css" rel="stylesheet" type="text/css"/>
<link href="/css/jquery.spinner.css" rel="stylesheet" type="text/css" />
<link href="/css/nav.css" type="text/css" rel="stylesheet">
<link href="/css/add.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="/skin/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript">
    $(function(){
        $(".subNav").click(function(){
            $(this).toggleClass("currentDd").siblings(".subNav").removeClass("currentDd")
            $(this).toggleClass("currentDt").siblings(".subNav").removeClass("currentDt")
            // 修改数字控制速度， slideUp(500)控制卷起速度
            $(this).next(".navContent").slideToggle(500).siblings(".navContent").slideUp(500);
        })
    })
</script>
<script type="text/javascript" src="/skin/js/jquery.SuperSlide.2.1.1.js"></script>
<script>var TIP=true;</script>
<script type="text/javascript" src="/skin/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/skin/js/Array.ext.js"></script>
<script type="text/javascript" src="/skin/js/onload.js"></script>
<script type="text/javascript" src="/skin/js/function.js"></script>
<script type="text/javascript" src="/skin/js/jquery.simplemodal.src.js"></script>
<link type="text/css" rel="stylesheet" href="/skin/js/jqueryui/jquery-ui-1.8.23.custom.css" />
<script type="text/javascript" src="/skin/js/jqueryui/jquery-ui-1.8.23.custom.min.js"></script>
<script type="text/javascript">window.onerror=function(){return true;}</script>
<link type="text/css" rel="stylesheet" href="/skin/jqueryui/jquery-ui-1.8.23.custom.css" />
<script type="text/javascript" src="/skin/jqueryui/jquery-ui-1.8.23.custom.min.js"></script>
<script type="text/javascript">window.onerror=function(){return true;}</script>
<script type="text/javascript">
$(document).ready(function(){
////{{{系统提示 setInterval
	if(typeof(TIP)!='undefined' && TIP){
	setTimeout(function(){ //提款
		$.getJSON('/index.php/Tip/getTKTip', function(tip){
			if(tip){
				if(!tip.flag) return;
				playVoice('/skin/sound/backcash.wav', 'backcash-voice');
				$("<div>").append(tip.message).dialog({
						position:['right','bottom'],
						minHeight:40,
						title:'系统提示',
						buttons:''
					});
			}
		})
	}, 3000);
	setTimeout(function(){ //充值
		$.getJSON('/index.php/Tip/getCZTip', function(tip){
			if(tip){
				if(!tip.flag) return;
				playVoice('/skin/sound/cash.wav', 'cash-voice');
				$("<div>").append(tip.message).dialog({
						position:['right','bottom'],
						minHeight:40,
						title:'系统提示',
						buttons:''
					});
			}
		})
	}, 2000);
	//}}}
	}
});
</script>
<script type="text/javascript" src="/skin/js/game.js?v5.0"></script>
</head>
<body style="background:url('/images/bg.png') center no-repeat; ">
<?php
$this->display('index/inc_user_dh.php');
?>
    <div class="content">
        <div class="right_con">
                <div class="user_message userInfo_new"><?php
$this->display('index/inc_user_new.php');
?></div>

                <?php
$this->display('index/inc_play_new.php');
?>

        </div>
<?php
if ($this->controller == 'Index') {
    $wjControl = "myIndex";
} else if ($this->controller == 'Main') {
    $wjControl = "myMain";
} else if ($this->controller == 'Record') {
    $wjControl = "myRecord";
} else if ($this->controller == 'Report') {
    $wjControl = "myReport";
} else if ($this->controller == 'Team') {
    $wjControl = "myTeam";
} else if ($this->controller == 'Score') {
    $wjControl = "myScore";
} else {
    $wjControl = "myAcount";
}
?>	
        <div class="left">
            <div class="dh">
                <div class="dh_tit">
                    <!--<h2><i class="ico_dh"></i>功能导航</h2>-->
                    <ul>
                        <li><a href="/index.php/index/usercenter_znx">站内信</a></li>
                        <li><a href="/index.php/index/usercenter">个人资料</a></li>
                        <li><a class="active" href="/index.php/index/usercenter_mmgl">密码管理</a></li>
                        <li><a href="/index.php/index/usercenter_zbjl">账变记录</a></li>
                    </ul>
                </div>
                <div class="dh_con">
                    <div class="dh_nr">
                        <div class="cz_con">
                            <form action="/index.php/safe/setPasswd" method="post" target="ajax" onajax="safeBeforSetPwd" call="safeSetPwd">
                            <div class="cz_tit">
                                <h3>登录密码管理</h3>
                            </div>
                            <div class="cz_message2">
                                  <div class="cz_table">
                                      <table>
                                          <tr>
                                              <td class="td_left">原始密码</td>
                                              <td><input type="password" name="oldpassword" class="text4 input-text" /></td>
                                          </tr>
                                          <tr>
                                              <td class="td_left">新密码</td>
                                              <td><input type="password" name="newpassword" class="text4 input-text" /></td>

                                          </tr>
                                          <tr>
                                              <td class="td_left">确认密码</td>
                                              <td><input type="password"  class="text4 confirm input-text" /></td>
                                          </tr>
                                          <tr>
                                              <td></td>
                                              <td><div class="group_btn2">
                                              <input id="setpass" class="an" type="submit" value="修改密码" style="color: #ffffff;font-size: 13px;font-family: '微软雅黑';width: 92px;height: 31px;background: url(/skin/images/button.jpg) no-repeat center center;border: 0;margin: 0 5px;cursor: pointer;" >
<input type="reset" id="resetpass" class="an" value="重置" onClick="this.form.reset()" style="color: #ffffff;font-size: 13px;
font-family: '微软雅黑';width: 92px;height: 31px;background: url(/skin/images/button.jpg) no-repeat center center;border: 0;margin: 0 5px;
cursor: pointer;" />
</div></td>
                                          </tr>

                                      </table>
                                  </div>
                            </div>
                            
                            </form>
                        </div>
                        <div class="block45"></div>
                        <div class="cz_con">
                        <form action="/index.php/safe/setCoinPwd2" method="post" target="ajax" onajax="safeBeforSetCoinPwd2" call="safeSetPwd">
                            <div class="cz_tit">
                                <h3>资金密码管理</h3>
                            </div>
                            <div class="cz_message2">
                                <div class="cz_table">
                                    <table>
                                        <tr>
                                            <td class="td_left">原始密码</td>
                                            <td><input type="password"  name="oldpassword" class="text4 input-text" /><span style="margin-left:10px; color:#CCC">默认为：123456</span></td>
                                        </tr>
                                        <tr>
                                            <td class="td_left">新密码</td>
                                            <td><input type="password" name="newpassword" class="text4 input-text" /></td>

                                        </tr>
                                        <tr>
                                            <td class="td_left">确认密码</td>
                                            <td><input type="password" class="text4 confirm input-text" /></td>
                                        </tr>
                                          <tr>
                                              <td></td>
                                              <td><div class="group_btn2">
                                              <input id="setcoinP2" class="an" type="submit" value="修改密码" style="color: #ffffff;font-size: 13px;font-family: '微软雅黑';width: 92px;height: 31px;background: url(/skin/images/button.jpg) no-repeat center center;border: 0;margin: 0 5px;cursor: pointer;" >
<input type="reset" id="resetcoinP2" class="an" value="重置" onClick="this.form.reset()" style="color: #ffffff;font-size: 13px;
font-family: '微软雅黑';width: 92px;height: 31px;background: url(/skin/images/button.jpg) no-repeat center center;border: 0;margin: 0 5px;
cursor: pointer;" />
</div></td>
                                          </tr>

                                    </table>

                                </div>
                            </div>
                        </form>    
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>









<div id="wanjinDialog"></div>

<script type="text/javascript">
var game={
	check1:<?= json_encode($check1) ?>,
	check2:<?= json_encode($check2) ?>,
	type:<?= json_encode($this->type) ?>,
	played:<?= json_encode($this->played) ?>,
	groupId:<?= json_encode($this->groupId) ?>
},
user="<?= $this->user['username'] ?>",
aflag=<?= json_encode($this->user['admin'] == 1) ?>;
</script>

</body>
</html>
