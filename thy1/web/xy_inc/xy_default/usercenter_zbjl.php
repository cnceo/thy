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
<link rel="stylesheet" type="text/css" href="/skin/js/jquery.datetimepicker.css"/>
<script type="text/javascript">
$(function(){
	$('.chazhao').click(function(){
		$(this).closest('form').submit();
	});
	$('.bottompage a[href]').live('click', function(){
		$('.biao-cont').load($(this).attr('href'));
		return false;
	});
});
function searchCoinLog(err, data){
	if(err){
		alert(err);
	}else{
		$('.biao-cont').html(data);
	}
}
</script>
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
                        <li><a href="/index.php/index/usercenter_mmgl">密码管理</a></li>
                        <li><a class="active" href="/index.php/index/usercenter_zbjl">账变记录</a></li>
                    </ul>
                </div>
                <div class="dh_con">
                    <div class="dh_nr">
                            <div class="ser_list">
                            <form action="/index.php/report/coinlog_new/<?= $this->type ?>" dataType="html" target="ajax" call="searchCoinLog">
                                <ul>
                                    <li>
	   <select name="liqType" class="text5 form_control">
            <option value="">所有帐变类型</option>
            <option value="1">账户充值</option>
            <option value="2">游戏返点</option>
            <option value="6">奖金派送</option>
            <option value="7">撤单返款</option>
            <option value="106">账户提现</option>
            <option value="8">提现失败</option>
            <option value="107">提现成功</option>
            <option value="9">系统充值</option>
            <option value="51">活动礼金</option>
            <option value="53">消费佣金</option>
            <option value="101">投注扣款</option>
            <option value="102">追号扣款</option>
        </select>
                                    </li>
                                    <li>
                                    <input type="text" name="fromTime_1" value="<?= $this->iff($_REQUEST['fromTime'], $_REQUEST['fromTime'], date('Y-m-d H:i', $GLOBALS['fromTime'])) ?>" id="datetimepicker" class="text7 datepicker" />至<input type="text" name="toTime_1" value="<?= $this->iff($_REQUEST['toTime'], $_REQUEST['toTime'], date('Y-m-d H:i', $GLOBALS['toTime'])) ?>" id="datetimepicker4" class="text7 datepicker" />
                                    </li>
                                    <li><input type="submit" value="查 询" class="an chazhao ser_btn" style="color: #fff;background: #e2604a;border-radius: 2px;vertical-align: middle;height: 28px;display: inline-block;text-align: center;line-height: 28px;padding: 0 20px;color: #fff;"></li>
                                </ul>
                            </form>
                            </div>

<div class="biao-cont">
        <?php
$this->display('report/coin-log_new.php');
?>
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
<script src="/skin/js/jquery.datetimepicker.js"></script>
<script>

$('#datetimepicker10').datetimepicker({
	step:5,
	inline:true
});
$('#datetimepicker_mask').datetimepicker({
	mask:'9999/19/39 29:59'
});
$('#datetimepicker').datetimepicker();
$('#datetimepicker4').datetimepicker();
//$('#datetimepicker').datetimepicker({value:'2014/04/25 03:00',step:10});
//$('#datetimepicker4').datetimepicker({value:'2014/04/26 03:00',step:10});
$('#datetimepicker1').datetimepicker({
	datepicker:false,
	format:'H:i',
	step:5
});
$('#datetimepicker2').datetimepicker({
	yearOffset:222,
	lang:'ch',
	timepicker:false,
	format:'d/m/Y',
	formatDate:'Y/m/d',
	minDate:'-1970/01/02', // yesterday is minimum date
	maxDate:'+1970/01/02' // and tommorow is maximum date calendar
});
$('#datetimepicker3').datetimepicker({
	inline:true
});

$('#open').click(function(){
	$('#datetimepicker4').datetimepicker('show');
});
$('#close').click(function(){
	$('#datetimepicker4').datetimepicker('hide');
});
$('#reset').click(function(){
	$('#datetimepicker4').datetimepicker('reset');
});
$('#datetimepicker5').datetimepicker({
	datepicker:false,
	allowTimes:['12:00','13:00','15:00','17:00','17:05','17:20','19:00','20:00']
});
$('#datetimepicker6').datetimepicker();
$('#destroy').click(function(){
	if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){
		$('#datetimepicker6').datetimepicker('destroy');
		this.value = 'create';
	}else{
		$('#datetimepicker6').datetimepicker();
		this.value = 'destroy';
	}
});
var logic = function( currentDateTime ){
	if( currentDateTime.getDay()==6 ){
		this.setOptions({
			minTime:'11:00'
		});
	}else
		this.setOptions({
			minTime:'8:00'
		});
};
$('#datetimepicker7').datetimepicker({
	onChangeDateTime:logic,
	onShow:logic
});
$('#datetimepicker8').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date')
			.toggleClass('xdsoft_disabled');
	},
	minDate:'-1970/01/2',
	maxDate:'+1970/01/2',
	timepicker:false
});
$('#datetimepicker9').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date.xdsoft_weekend')
			.addClass('xdsoft_disabled');
	},
	weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
	timepicker:false
});
</script>
</body>
</html>
