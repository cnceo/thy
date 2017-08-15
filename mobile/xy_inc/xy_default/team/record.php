<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$this->display('inc_skin.php', 0, '游戏记录');
?>
<link rel="stylesheet" type="text/css" href="/skin/js/jquery.datetimepicker.css"/>
<script type="text/javascript">
$(function(){
	$('.search form input[name=username]')
	.focus(function(){
		if(this.value=='用户名') this.value='';
	})
	.blur(function(){
		if(this.value=='') this.value='用户名';
	})
	.keypress(function(e){
		if(e.keyCode==13) $(this).closest('form').submit();
	});
	
	$('.search form input[name=betId]')
	.focus(function(){
		if(this.value=='输入单号') this.value='';
	})
	.blur(function(){
		if(this.value=='') this.value='输入单号';
	})
	.keypress(function(e){
		if(e.keyCode==13) $(this).closest('form').submit();
	});
	
	$('.chazhao').click(function(){
		$(this).closest('form').submit();
	});
	
	$('.bottompage a[href]').live('click', function(){
		$('.biao-cont').load($(this).attr('href'));
		return false;
	});

});
function recordSearch(err, data){
	if(err){
		alert(err);
	}else{
		$('.biao-cont').html(data);
	}
}
function recodeRefresh(){
	$('.biao-cont').load(
		$('.bottompage .pagecurrent').attr('href')
	);
}

function deleteBet(err, code){
	if(err){
		alert(err);
	}else{
		recodeRefresh();
	}
}
</script>

<div class="content3 wjcont">
 <div class="title"><span>游戏记录</span></div>
 <div class="body">
 <div class="youxi1">
   	<form action="/index.php/team/searchGameRecord/<?= $this->userType ?>" dataType="html" call="recordSearch" target="ajax">
  		<h2>
    <select name="type" class="text5" style="width:40%">
        	<option value="0" <?= $this->iff($_REQUEST['type'] == '', 'selected="selected"') ?>>全部彩种</option>
            <?php
if ($this->types)
    foreach ($this->types as $var) {
        if ($var['enable']) {
?>
            <option value="<?= $var['id'] ?>" <?= $this->iff($_REQUEST['type'] == $var['id'], 'selected="selected"') ?>><?= $this->iff($var['shortName'], $var['shortName'], $var['title']) ?></option>

            <?php
        }
    }
?>
    </select>
       <select name="state"  style="width:40%"class="text5">
            <option value="0" selected>所有状态</option>
            <option value="1">已派奖</option>
            <option value="2">未中奖</option>
            <option value="3">未开奖</option>
            <option value="4">追号</option>
            <option value="5">撤单</option>
        </select>
     <select name="mode" style="width:40%" class="text5" style="display:none">
            <option value="" selected>全部模式</option>
            <option value="2.000">元</option>
            <option value="0.200">角</option>
            <option value="0.020">分</option>
			<option value="0.002">厘</option>
     </select>
      
       <select name="utype" class="text5" style="width:40%">
            <option  value="0" selected>所有人</option>
            <option value="1">我自己</option>
            <option value="2">直属下线</option>
            <option value="3">所有下线</option>
        </select>
       
    <input type="text" value="用户名" name="username" class="text8"style="width:40%" />
	<input type="text" name="betId" value="输入单号" class="text6" style="width:40%" />
    <input type="text" name="fromTime" value="<?= $this->iff($_REQUEST['fromTime'], $_REQUEST['fromTime'], date('Y-m-d H:i', $GLOBALS['fromTime'])) ?>" id="datetimepicker" class="text7" />至<input type="text" name="toTime" value="<?= $this->iff($_REQUEST['toTime'], $_REQUEST['toTime'], date('Y-m-d H:i', $GLOBALS['toTime'])) ?>" id="datetimepicker4" class="text7" />
    <input class="an chazhao" type="submit" value="查询" >
    </h2>
  </form> 
    <div class="biao-cont">
    	<!--下注列表-->
        <?php
$this->display('team/record-list.php');
?>
        <!--下注列表 end -->
    </div>
</div>
</div>
<div class="foot"></div>
</div>
<?php
$this->display('inc_footer2.php');
?> 
<style>
body {
background: none !important;
padding:0;
margin:0;
left:0;
top:0;
}
</style>
   
  
   
 