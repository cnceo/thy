 <?php
$lastNo = $this->getGameLastNo($this->type);
$kjHao  = $this->getValue("select data from {$this->prename}data where type={$this->type} and number='{$lastNo['actionNo']}'");
if ($kjHao)
    $kjHao = explode(',', $kjHao);

$actionNo   = $this->getGameNo($this->type);
$types      = $this->getTypes();
//print_r($types);
$kjdTime    = $types[$this->type]['data_ftime'];
$diffTime   = strtotime($actionNo['actionTime']) - $this->time - $kjdTime;
$kjDiffTime = strtotime($lastNo['actionTime']) - $this->time;
?>
                <ul id="kaijiang"  style="width:100%" type="<?= $this->type ?>" ctype="<?= $types[$this->type]['type'] ?>">
                    <li class="one" style="100%;margin:0 15%">
                        <div class="block12">
                            <a href="/zst/index.php?typeid=<?= $this->type ?>" target="_blank"><h3>第<span class="thisno"><?= $actionNo['actionNo'] ?></span>期 <?php
if ($this->type == 1 || $this->type == 3 || $this->type == 36 || $this->type == 35 || $this->type == 12 || $this->type == 14 || $this->type == 26 || $this->type == 5) {
?><span class="green">号码分布</span><span class="red">-遗漏分析</span><em class="wjtips" style="display:none;">正在销售中</em><?php
}
?></h3></a>
                            <dl class="time_num">
                                <dt><img src="/images/ico_clock.jpg" width="50" height="50"></dt>
                                <dd><span id="sur-times">00:00:00</span></dd>
                            </dl>
                        </div>
                    </li>
<style>
#voice{display:block;width:27px; height:26px; float:right;cursor:pointer; margin-right:4px; margin-top:4px;  -webkit-border-radius: 6px;    border-radius: 6px;}
.voice-on{background:url(/skin/images/labak.jpg) no-repeat; }
.voice-off{background:url(/skin/images/labag.jpg) no-repeat;}
</style>

                    <li class="two" style="width:100%; margin: 0px">
                        <div class="block13 wjkjData"style="
    width: 100%;
" >
                            <h3><?= $types[$this->type]['title'] ?> 第<span class="last_issues"><?= $lastNo['actionNo'] ?></span>期 <span id="kjsay" style="display:none;">开奖倒计时：<em class="kjtips">00:00</em></span>    <!--<span id="voice" class="voice-on" title="声音开启，点击关闭" onclick="voiceKJ()"> </span>--></h3>
                            
                
				<?php
if ($types[$this->type]['type'] == 40) { //快乐十分
?>
				<div class="num_right_new kj-hao"  ctype="pk10">
                <em class="num_red_b_new ball_0444"> <?= $kjHao[777] ?> </em>
                <em class="num_red_b_new ball_01"> <?= $kjHao[0] ?> </em>
                <em class="num_red_b_new ball_02"> <?= $kjHao[1] ?> </em>
                <em class="num_red_b_new ball_03"> <?= $kjHao[2] ?> </em>
                <em class="num_red_b_new ball_04"> <?= $kjHao[3] ?> </em>
                <em class="num_red_b_new ball_01"> <?= $kjHao[4] ?> </em>
                <em class="num_red_b_new ball_02"> <?= $kjHao[5] ?> </em>
                <em class="num_red_b_new ball_03"> <?= $kjHao[6] ?> </em>
                <em class="num_red_b_new ball_04"> <?= $kjHao[7] ?> </em>
                </div>
                <?php
} else if ($types[$this->type]['type'] == 4) { //快乐十分
?>
				<div class="num_right_new kj-hao"  ctype="kl10">
				<!--<em class="num_red_b_new ball_0444"> <?= $kjHao[777] ?> </em>-->
                <em class="num_red_b_new ball_01"> <?= $kjHao[0] ?> </em>
                <em class="num_red_b_new ball_02"> <?= $kjHao[1] ?> </em>
                <em class="num_red_b_new ball_03"> <?= $kjHao[2] ?> </em>
                <em class="num_red_b_new ball_04"> <?= $kjHao[3] ?> </em>
                <em class="num_red_b_new ball_01"> <?= $kjHao[4] ?> </em>
                <em class="num_red_b_new ball_02"> <?= $kjHao[5] ?> </em>
                <em class="num_red_b_new ball_03"> <?= $kjHao[6] ?> </em>
                <em class="num_red_b_new ball_04"> <?= $kjHao[7] ?> </em>
                </div>
                <?php
} else if ($types[$this->type]['type'] == 6) { //PK10
?>
				<div class="num_right_pk10 kj-hao" ctype="pk10">
                <em class="num_red_b_pk10 ball_01"> <?= $kjHao[0] ?> </em>
                <em class="num_red_b_pk10 ball_02"> <?= $kjHao[1] ?> </em>
                <em class="num_red_b_pk10 ball_03"> <?= $kjHao[2] ?> </em>
                <em class="num_red_b_pk10 ball_04"> <?= $kjHao[3] ?> </em>
                <em class="num_red_b_pk10 ball_01"> <?= $kjHao[4] ?> </em>
                <em class="num_red_b_pk10 ball_02"> <?= $kjHao[5] ?> </em>
                <em class="num_red_b_pk10 ball_03"> <?= $kjHao[6] ?> </em>
                <em class="num_red_b_pk10 ball_04"> <?= $kjHao[7] ?> </em>
                <em class="num_red_b_pk10 ball_01"> <?= $kjHao[8] ?> </em>
                <em class="num_red_b_pk10 ball_02"> <?= $kjHao[9] ?> </em>
                </div>
				<?php
} else if ($types[$this->type]['type'] == 8) { //快8
    
    /*$kjHaoS=explode("|",$kjHao[19]);
    $kjHao[19]=$kjHaoS[0];
    $feipan=$kjHaoS[1];*/
?>
                <div class="num_right_kl kj-hao" ctype="g1" cnum="80">
                <em id="span_lot_0" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[0] ?> </em>
                <em id="span_lot_1" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[1] ?> </em>
                <em id="span_lot_2" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[2] ?> </em>
                <em id="span_lot_3" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[3] ?> </em>
                <em id="span_lot_4" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[4] ?> </em>
                <em id="span_lot_5" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[5] ?> </em>
                <em id="span_lot_6" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[6] ?> </em>
                <em id="span_lot_7" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[7] ?> </em>
                <em id="span_lot_8" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[8] ?> </em>
                <em id="span_lot_9" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[9] ?> </em>
                <em id="span_lot_10" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[10] ?> </em>
                <em id="span_lot_11" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[11] ?> </em>
                <em id="span_lot_12" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[12] ?> </em>
                <em id="span_lot_13" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[13] ?> </em>
                <em id="span_lot_14" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[14] ?> </em>
                <em id="span_lot_15" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[15] ?> </em>
                <em id="span_lot_16" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[16] ?> </em>
                <em id="span_lot_17" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[17] ?> </em>
                <em id="span_lot_18" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[18] ?> </em>
                <em id="span_lot_19" class="num_red_b_kl gr_s gr_s020"> <?= $kjHao[19] ?> </em>
                </div>
                <?php
} else if ($types[$this->type]['type'] == 9) { //快3
?>
              	<div class="num_right_k3 kj-hao" ctype="k3">
                    <em class="num_red_b_k3  ball_0"><?= intval($kjHao[0]) ?> </em>
                    <em class="num_red_b_k3  ball_1"><?= intval($kjHao[1]) ?> </em>
                    <em class="num_red_b_k3  ball_2"><?= intval($kjHao[2]) ?> </em>
                </div>
                <?php
} else if ($types[$this->type]['type'] == 10) { //lhc
?>
              	<div class="num_right_lhc kj-hao"  ctype="lhc">
				    <em class="num_red_b_lhc ball_0"> <?= $kjHao[0] ?> </em>
                    <em class="num_red_b_lhc ball_1"> <?= $kjHao[1] ?> </em>
                    <em class="num_red_b_lhc ball_2"> <?= $kjHao[2] ?> </em>
                    <em class="num_red_b_lhc ball_3"> <?= $kjHao[3] ?> </em>
				    <em class="num_red_b_lhc ball_4"> <?= $kjHao[4] ?> </em>
                    <em class="num_red_b_lhc ball_5"> <?= $kjHao[5] ?> </em>
					<em class="num_red_b_lhc ball_6"> <?= $kjHao[6] ?> </em>
                </div>
                <?php
} else if ($types[$this->type]['type'] == 3) { //3D
?>
              	<div class="num_right_3d  kj-hao" ctype="3d">
                    <em class="num_red_b ball_0"><?= intval($kjHao[0]) ?> </em>
                    <em class="num_red_b ball_1"><?= intval($kjHao[1]) ?> </em>
                    <em class="num_red_b ball_2"><?= intval($kjHao[2]) ?> </em>
                </div>
                <?php
} else if ($types[$this->type]['type'] == 2) { //11选5
?>
              	<div class="num_right  kj-hao" ctype="11x5">
                    <em class="num_red_b ball_0"><?= intval($kjHao[0]) ?> </em>
                    <em class="num_red_b ball_1"><?= intval($kjHao[1]) ?> </em>
                    <em class="num_red_b ball_2"><?= intval($kjHao[2]) ?> </em>
                    <em class="num_red_b ball_3"><?= intval($kjHao[3]) ?> </em>
                    <em class="num_red_b ball_4"><?= intval($kjHao[4]) ?> </em>
                </div>
				<?php
} else {
?>                            
                <div class="num_right kj-hao"  ctype="ssc">
                    <em class="num_red_b ball_0"><?= intval($kjHao[0]) ?></em>
                    <em class="num_red_b ball_1"><?= intval($kjHao[1]) ?></em>
                    <em class="num_red_b ball_2"><?= intval($kjHao[2]) ?></em>
                    <em class="num_red_b ball_3"><?= intval($kjHao[3]) ?></em>
                    <em class="num_red_b ball_4"><?= intval($kjHao[4]) ?></em>
                </div>
                <?php
}
?>
                            
                            
                        </div>
                    </li>
                 
                    <li class="three" style="width:100%;"">
					   <h1 style="
    text-align: center;
">近期中奖号码</h1>
<br/>
                        <div class="block11" style="width:100%">
                            <!--h3>最近期号 开奖号码</h3-->
                            <ul class="kj_number" >                                
                                
                    <?php
$sql = "select time, number, data from {$this->prename}data where type={$this->type} order by number desc,time desc limit 20";
if ($data = $this->getRows($sql))
    foreach ($data as $var) {
        $splitD = explode(",", $var['data']);
?>
                    <li><?= $var['number'] ?> <em class="red"><?= $var['data'] ?></em></li>
                    <?php
    }
?>  
                                
                                
                            </ul>

                        </div>
                    </li>

               </ul>


<script type="text/javascript">
$(function(){
	window.S=<?= json_encode($diffTime > 0) ?>;
	window.KS=<?= json_encode($kjDiffTime > 0) ?>;
	window.kjTime=parseInt(<?= json_encode($kjdTime) ?>);
	
	if($.browser.msie){
		window.diffTime=<?= $diffTime ?>;
		setTimeout(function(){
			gameKanJiangDataC(<?= $diffTime ?>);
		}, 1000);
	}else{
		setTimeout(gameKanJiangDataC, 1000, <?= $diffTime ?>);
	}
	<?php
if ($kjDiffTime > 0) {
?> 
		if($.browser.msie){
		setTimeout(function(){
			setKJWaiting(<?= $kjDiffTime ?>);
		}, 1000);
		}else{
			setTimeout(setKJWaiting, 1000, <?= $kjDiffTime ?>);
		}
	<?php
}
?> 
	
	<?php
if (!$kjHao) {
?> 
		loadKjData();
	<?php
}
?> 
});
</script>