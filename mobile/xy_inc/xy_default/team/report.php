<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$this->display('inc_skin.php', 0, '盈亏报表');
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

	$('.chazhao').click(function(){
		$(this).closest('form').submit();
	});

	$('.bottompage a[href]').live('click', function(){
		$('.biao-cont').load($(this).attr('href'));
		return false;
	});
});
function searchData(err, data){
	if(err){
		alert(err);
	}else{
		$('.biao-cont').html(data);
	}
}
</script>

<div class="content3 wjcont">
 <div class="title"><span>盈亏报表</span></div>
 <div class="body">
 <div class="youxi1">
  <form  style="width:100%" action="/index.php/team/searchReport" target="ajax" call="searchData" dataType="html">
        <h2 >
		<input type="text" style="width:100%" name="username" value="用户名" class="text8" />
        <input type="text" name="fromTime" style="width:40%" value="<?= $this->iff($_REQUEST['fromTime'], $_REQUEST['fromTime'], date('Y-m-d H:i', $GLOBALS['fromTime'])) ?>" id="datetimepicker" class="text7" />至<input style="width:40%" type="text" name="toTime" value="<?= $this->iff($_REQUEST['toTime'], $_REQUEST['toTime'], date('Y-m-d H:i', $GLOBALS['toTime'])) ?>" id="datetimepicker4" class="text7" />
        <input class="an chazhao" type="submit" value="查询" >
		</h2>
  </form> 
    <div class="biao-cont">
    	 <!--列表-->
        <?php
$this->display('team/report-list.php');
?>
        <!--列表 end -->
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
   