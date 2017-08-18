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
                        <li><a class="active" href="/index.php/index/usercenter">个人资料</a></li>
                        <li><a href="/index.php/index/usercenter_mmgl">密码管理</a></li>
                        <li><a href="/index.php/index/usercenter_zbjl">账变记录</a></li>
                    </ul>
                </div>
                <div class="dh_con">
                    <div class="dh_nr">
                        <div class="cz_con">
                            <div class="cz_tit">
                                <h3>个人基本信息</h3>
                            </div>
                            <div class="cz_message2">
                                  <div class="cz_table2">
                                      <table>
                                          <tr>
                                              <td>账户</td>
                                              <td><span class="color2"><?= htmlspecialchars($this->user['username']) ?></span></td>
                                              <td>会员类型</td>
                                              <td><span class="color2"><?= $this->iff($this->user['type'], '代理', '会员') ?></span></td>
                                          </tr>
                                          <tr>
                                              <td>等级</td>
                                              <td><span class="color2">VIP<?= htmlspecialchars($this->user['grade']) ?></span></td>
                                              <td>可用资金</td>
                                              <td><span class="color2"><?= htmlspecialchars($this->user['coin']) ?> 元</span></td>
                                          </tr>
                                          <tr>
                                              <td>积分</td>
                                              <td><span class="color2"><?= htmlspecialchars($this->user['score']) ?></span></td>
                                              <td>上级代理</td>
                                              <td><span class="color2"><?= $this->iff($parent = $this->getValue("select username from {$this->prename}members where uid=?", $this->user['parentId']), htmlspecialchars($parent), '无') ?></span></td>
                                          </tr>
                                          <tr>
                                              <td>返点</td>
                                              <td><span class="color2"><?= htmlspecialchars($this->user['fanDian']) ?>%</span></td>
                                              <td>最后登录</td>
                                              <td><span class="color2"><?= htmlspecialchars($this->user['updateTime']) ?></span></td>
                                          </tr>
                                      </table>
                                  </div>
                            </div>
                        </div>
                        <div class="block45"></div>
 	<form action="/index.php/safe/setCBAccount" method="post" target="ajax" onajax="safeBeforSetCBA" call="safeSetCBA">
	<?php
if ($this->user['coinPassword']) {
?>
                        <div class="cz_con">
                            <div class="cz_tit">
                                <h3>个人银行信息</h3>
                            </div>
                            <div class="cz_message">
                                <div class="cz_table">
                                
                                    <table>
                                        <tr>
                                            <td class="td_left">银行类型</td>
                                            <td>

<?php
    $myBank = $this->getRow("select * from {$this->prename}member_bank where uid=?", $this->user['uid']);
    $banks  = $this->getRows("select * from {$this->prename}bank_list where isDelete=0 order by sort");
    $flag   = ($myBank['editEnable'] != 1) && ($myBank);
?>
<select name="bankId" class="text5 select-text" <?= $this->iff($flag, 'disabled') ?>>
<?php
    foreach ($banks as $bank) {
?>
<option value="<?= $bank['id'] ?>" <?= $this->iff($myBank['bankId'] == $bank['id'], 'selected') ?>><?= $bank['name'] ?></option>
<?php
    }
?>
</select>

                                            </td>
                                            <td class="td_left">银行账户</td>
                                            <td><input type="text" name="account" class="text4 input-text" value="<?= preg_replace('/^.*(\w{4})$/', '***\1', htmlspecialchars($myBank['account'])) ?>" <?= $this->iff($flag, 'readonly') ?> /></td>
                                        </tr>
                                        <tr>
                                            <td class="td_left">银行户名</td>
                                            <td><input type="text" name="username" class="text4 input-text"  value="<?= $this->iff($myBank['username'], mb_substr(htmlspecialchars($myBank['username']), 0, 1, 'utf-8') . '**') ?>" <?= $this->iff($flag, 'readonly') ?> /></td>
                                            <td class="td_left">开户行</td>
                                            <td><input type="text"  name="countname" class="text4 input-text" value="<?= preg_replace('/^(\w{4}).*(\w{4})$/', '\1***\2', htmlspecialchars($myBank['countname'])) ?>" <?= $this->iff($flag, 'readonly') ?>/></td>
                                        </tr>
                                        <tr>
                                            <td class="td_left">资金密码</td>
                                            <td><input type="password" name="coinPassword" class="text4 input-text" <?= $this->iff($flag, 'readonly') ?> /></td>
                                        </tr>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="group_btn">
                        <input id="setbank" class="an" type="submit" <?= $this->iff($flag, 'disabled') ?> value="设置银行" style="padding: 5px 10px;color: #fff;background: #cc4730;border-radius: 2px;display: inline-block;margin: 0 8px;width: 75px;" />
                        <input type="reset" id="reset" class="an" value="重置" onClick="this.form.reset()" style="padding: 5px 20px;color: #fff;background: #cc4730;border-radius: 2px;display: inline-block;margin: 0 8px;width: 75px;" />
                        </div>
    </form>
<?php
} else {
?>
                        <div class="cz_con">
                            <div class="cz_tit">
                                <h3>个人银行信息</h3>
                            </div>
                            <div class="tips">
                                <dl>
                                    <dt>温馨提示：</dt>
                                    <dd>设置银行信息要用资金密码，您尚未设置资金密码！&nbsp;&nbsp;<a href="/index.php/index/usercenter_cz_sz">设置资金密码&gt;&gt;</a></dd>
                                </dl>
                            </div>
                        </div>
<?php
}
?>
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
