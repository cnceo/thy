<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="IE=EmulateIE8" http-equiv="X-UA-Compatible" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name=”renderer” content=”webkit” />
<?php
if ($this->type) {
    $row = $this->getRow("select enable,title from {$this->prename}type where id={$this->type}");
    if (!$row['enable']) {
        echo $row['title'] . '已经关闭';
        exit;
    }
} else {
    $this->type    = 1;
    $this->groupId = 2;
    $this->played  = 10;
}
if ($_COOKIE['mode']) {
    $mode = $_COOKIE['mode'];
} else {
    $mode = 2.00;
}

$row1 = $this->getRows("select * from {$this->prename}content where enable=1 and nodeId=1");
$row2 = $this->getRows("select * from {$this->prename}message_receiver where to_uid={$this->user['uid']}");
?>
<title><?= $this->settings['webName'] ?></title>
<link href="/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="/css/style.css" rel="stylesheet" type="text/css"/>
<link href="/css/nav.css" type="text/css" rel="stylesheet">
<link href="/css/add.css" type="text/css" rel="stylesheet"/>
<link href="/css/jquery.spinner.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="/skin/js/jqueryui/jquery-ui-1.8.23.custom.css" />
<link type="text/css" rel="stylesheet" href="/skin/jqueryui/jquery-ui-1.8.23.custom.css" />
<link type="text/css" rel="stylesheet" href="/skin1/css/hklhc.css" />
<script type="text/javascript" src="/skin/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="/skin/js/jquery.SuperSlide.2.1.1.js"></script>
<script>var TIP=true;</script>
<script type="text/javascript" src="/skin/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/skin/js/Array.ext.js"></script>
<script type="text/javascript" src="/skin/js/onload.js"></script>
<script type="text/javascript" src="/skin/js/function.js"></script>
<script type="text/javascript" src="/skin/js/jquery.simplemodal.src.js"></script>
<script type="text/javascript" src="/skin/js/jqueryui/jquery-ui-1.8.23.custom.min.js"></script>
<script type="text/javascript">window.onerror=function(){return true;}</script>
<script type="text/javascript" src="/skin/jqueryui/jquery-ui-1.8.23.custom.min.js"></script>
<script type="text/javascript" src="/skin/js/game.js?v5.0"></script>
<script type="text/javascript" src="/skin1/js/hklhc.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	setInterval(function(){$.getJSON('/uplhcno.php', function(tip){})}, 5000);
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
<script>
function changeab(){
	if($('#changeab').html()=='关闭'){
		$('#changeab').html('打开');
		$('#abshow').hide();
	}else{
		$('#changeab').html('关闭');	
		$('#abshow').show();
	}
}
</script>

</head>
<body style="background:url('/images/bg.png') center no-repeat; ">
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
<!--导航栏-->
<?php $this->display('index/inc_user_dh.php');?>

<!--用户信息及彩种-->
  <div class="content">
<?php $this->display('index/inc_user_game.php');?>

<!--奖期-->
  <div class="left">
  <div class="block_three">
<?php
$this->display('index/inc_data_current_new.php');
?>
  </div>

<!--玩法-->
  <div class="tz_change">
<?php $this->display('game_line.php');?>
</div>
<!--玩法选择-->
<div class="tz_change">
  <div class="tz_work" id="playList">
  <div class="tz_xz">
<?php
$sql= "select groupName from {$this->prename}played_group where id=?";
$groupName = $this->getValue($sql, $this->groupId);

$sql= "select id, name, playedTpl, enable  from {$this->prename}played where enable=1 and groupId=? order by sort";
$playeds = $this->getRows($sql, $this->groupId);
if (!$playeds) {
    echo '<td colspan="7" align="center">暂无玩法</td>';
    return;
}
if (!$this->played)
    $this->played = $playeds[0]['id'];
?>
<?php
if ($playeds)
    foreach ($playeds as $played) {
        if ($this->played == $played['id'])
            $tpl = $played['playedTpl'];
        if ($played['enable']) {
?>
	<a data_id="<?= $played['id'] ?>" href="#" tourl="/index.php/index/played_new/<?= $this->type ?>/<?= $played['id'] ?>" <?= ($played['id'] == $this->played) ? ' class="tag"' : '' ?> style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?= $played['name'] ?></a>
	<?php
        }
    }
?>
                    </div>

<!--玩法end投注标签开始-->
<style>
.game_eg {position: absolute;z-index: 9999;text-align: left;width: 260px;padding: 10px;background: #3a90b2;line-height: 20px;color: #FFFFFF;color: #fff;border-radius: 8px;}
</style>

<div class="tz_info" id="game-helptips">
<?php
$sql= "select simpleInfo, info, example  from {$this->prename}played where id=?";
$playeds = $this->getRows($sql, $this->played);
?>
<p class="wjhelps">说明：<?= $playeds[0]["simpleInfo"] ?><a href="#"><em action="lt_example" class="ico_sl showeg"></em></a><a href="#"><i action="lt_help" class="ico_ques showeg"></i></a></p>
<div id="lt_example" class="game_eg" style="display:none;"><?= $playeds[0]["example"] ?></div>
<div id="lt_help" class="game_eg" style="display:none;"><?= $playeds[0]["info"] ?></div>
<div class="line2">
                    </div>
                  </div>

<!--选号-->
<div class="ball_list">
<div class="num-table" id="num-select">
<?php
if (!$played['enable']) {
    echo '<td colspan="7" align="center">暂无玩法</td>';
    return;
}
$this->display("index/game-played/$tpl.php");
?>
                       </div>
                    </div>
                </div>

<!--奖金-->
<div class="tz_work">
<div class="ball_write">
<div class="write_bg">
<div class="jiangjin" id="game-dom">
<div class="fandian-k fl" style="margin-left:10px;">
      <input type="button" class="min" value="" step="-0.1"/>
      <input type="button" class="max" value="" step="0.1"/>
      <strong>奖金/返点：</strong>


      <div id="slider-range-min" class="tiao slider fandian-box" value="<?= $this->ifs($_COOKIE['fanDian'], 0) ?>" data-bet-count="<?= $this->settings['betMaxCount'] ?>" data-bet-zj-amount="<?= $this->settings['betMaxZjAmount'] ?>" max="<?= $this->user['fanDian'] ?>" game-fan-dian="<?= $this->settings['fanDianMax'] ?>" fan-dian="<?= $this->user['fanDian'] ?>" game-fan-dian-bdw="<?= $this->settings['fanDianBdwMax'] ?>" fan-dian-bdw="<?= $this->user['fanDianBdw'] ?>" min="0" step="1" slideCallBack="gameSetFanDian"></div>

      <span id="fandian-value" class="fdmoney" style=" color: #000 !important;"><?= $maxPl ?>/0%</span>
  </div>


  <div class="fl">
      <strong class="mo">模式：</strong>
                  <?php
if ($this->settings['yuanmosi'] == 1) {
?>
                  <b value="2.000" data-max-fan-dian="<?= $this->settings['betModeMaxFanDian0'] ?>" class="danwei dwon">元</b><?php
}
?>
                  <?php
if ($this->settings['jiaomosi'] == 1) {
?>
                  <b value="0.200" data-max-fan-dian="<?= $this->settings['betModeMaxFanDian1'] ?>" class="danwei">角</b><?php
}
?>
                  <?php
if ($this->settings['fenmosi'] == 1) {
?>
                  <b value="0.020" data-max-fan-dian="<?= $this->settings['betModeMaxFanDian2'] ?>" class="danwei">分</b><?php
}
?>
                  <?php
if ($this->settings['limosi'] == 1) {
?>
                  <b value="0.002" data-max-fan-dian="<?= $this->settings['betModeMaxFanDian2'] ?>" class="danwei">厘</b><?php
}
?>
              </div>
              <div class="fl">
<strong class="bei">倍数：</strong><img src="/skin/images/jian.jpg" class="surbeishu" /><input id="beishu" value="<?= $this->ifs($_COOKIE['beishu'], 1) ?>" class="bei1"/><img src="/skin/images/jia.jpg" class="addbeishu" />
  </div>
  <div class="fr">
<strong class="ge"></strong><span class="tian_def" onclick="gameActionAddCode()">添 加</span><span class="tian_def" onclick="gameActionRemoveCode()">清 空 号 码</span>
  </div>
<div class="clear"></div>
<div class="prompt" id="game-tip-dom" style="display:none;"><!--提示：必须选满三位数再投注！--></div>
</div>

<!--已选号码-->
<div class="touzhu-cont" >
  <table width="100%" cellpadding="0" cellspacing="0">
  </table>
</div>

<!--确认投注-->
<div class="touzhu-bottom">
<div class="tz-tongji">&nbsp;&nbsp;&nbsp;&nbsp;总投注数：<span id="all-count">0</span>注&nbsp;&nbsp;&nbsp;&nbsp;购买金额：<span id="all-amount">0.00</span>元      </div>
<div class="tz-buytype"><label class="zhui" style="float: left;height: 30px;width: 120px;cursor: pointer;background: url(/images/btn_add.png) no-repeat bottom center;text-indent: -9999px; margin-left:10px;"><input type="checkbox" name="zhuiHao" value="1" /></label>
  </div>
<div class="tz-true-btn"><span class="tou" id="btnPostBet" style="float: left;height: 30px;width: 120px;cursor: pointer;background: url(/images/btn_buy.png) no-repeat bottom center;text-indent: -9999px; margin-left:10px;">确定投注</span>
  </div>
     <div class="clear"></div>
                    </div>
                    </div>
                   </div>
                </div>
            </div>
<!--首页游戏记录开始-->
<?php $this->display('/index/inc_game_order_history_index.php');?>

<div class="clear"></div>

<div id="wanjinDialog"></div>
<!--end 2016/3/9-->
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
function showx(x){
	if(x==82){$('.ball_write').hide();}else{$('.ball_write').show();}
}
window.onscroll=function(){
   var h =document.documentElement.scrollTop;
   if (document.documentElement && document.documentElement.scrollTop) {
   } else if (document.body){
	h = document.body.scrollTop;
   }
   h=h+200;
   document.getElementById('autoCompare').style.top=h+'px';
}
</script>
</body>
</html>
