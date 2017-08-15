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
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script type="text/javascript" src="/skin/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/skin/js/Array.ext.js"></script>
<script type="text/javascript" src="/skin/js/onload.js"></script>
<script type="text/javascript" src="/skin/js/function.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1" />
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
<body >
<?php
$this->display('index/inc_user_dh.php');
?>
    <div class="content">
        <div class="right_con">
              

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
        <div class="left" style="width:100%">
            <!--<div class="dh">
                <div class="dh_tit">
                    <h2><i class="ico_dh"></i>功能导航</h2>
                    <ul>
                        <li><a class="active" href="#">理财类</a></li>
                    </ul>
                </div>-->
                <div class="dh_con">
                    <div class="dh_nr">
                        <iframe src="/index.php/score/dodbqb" style="width:100%;; min-height:680px; border:none; " scrolling="no"></iframe>
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
