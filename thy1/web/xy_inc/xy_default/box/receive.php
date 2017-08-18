<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->display('inc_skin.php', 0 , '已收消息 - 我的消息 - '); ?>
<link rel="stylesheet" type="text/css" href="/skin/js/jquery.datetimepicker.css">
<script src="/skin/js/jquery.datetimepicker.js"></script>
<style>
	.dh_68_1 ul{ margin:0px; padding:0px; list-style-type:none; font-size:12px; color:#5c5c5c; font-weight:bold; }
	.dh_68_1 ul li a{width:88px; height:30px; display:block; text-decoration:none; color:#5c5c5c;}
	.dh_68_1 ul li a:hover{width:88px; height:30px; display:block; text-decoration:none;}
	.aafbfg{ float:left; width:88px; height:30px; background-image:url(/oacss/images/bg681.png); margin-left:10px; background-repeat:no-repeat; text-align:center; line-height:30px;}
	.fontback{
		color:#890e0e;  background-image:url(/oacss/images/bg_61.png); width:88px; height:30px;text-align:center; line-height:30px; float:left; background-repeat:no-repeat; margin-left:10px;
		}
</style>
</head>
<body lim:visitorcapacity="1">
<script type="text/javascript">
$(function(){
	$('.chazhao').click(function(){
		$(this).closest('form').submit();
	});
	$('.bottompage a[href]').live('click', function(){
		$('.biao-cont').load($(this).attr('href'));
		return false;
	});
	//查看
	$('.viewbox').live('click', function(){
		var tourl=$(this).attr("tourl");
		var dataid=$(this).attr("dataid");
		if(tourl){
			$('.boxdetail').load(tourl);
		}
	});
	//全选
$("input[name=chk_All]").live("click",function(){
	var item=$("input[name=chk_only]");
	 if( typeof(item.length) == "undefined" )
		{
			item.checked = !item.checked;
		}
		else
		{
			for(i=0;i<item.length;i++)
			{
				item[i].checked=$(this).attr("checked");
			}
		}
	 })	;
});
function boxSearch(err, data){
	if(err){
		alert(err);
	}else{
		$('.biao-cont').html(data);
		recodeRefresh();
	}
}
function recodeRefresh(){
	$('.biao-cont').load(
		$('.bottompage .on').attr('href')
	);
}
function deleteBet(err, data){
	if(err){
		alert(err);
	}else{
		alert('删除成功');
		recodeRefresh();
	}
}
/**
 * 批量撤销前调用
 */
function recordBeforeDelete(){
	//获取ID
	var byid="";
	var tourl="/index.php/box/deleteAll/";
	var a=document.getElementsByName("chk_only");
	for(var i=0,len=a.length;i<len;i++){
		if(a.item(i).checked){
		if(byid.length >0){
			byid=byid + "-" + a.item(i).value;
			}
		else{
			byid=byid + a.item(i).value;
		   }
	   }
	}
	if(byid.length>0){
		if(confirm('是否确定要删除？')){
			tourl+=byid;
			$(".removeAllRecord").attr("href",tourl);
		}else{return false;}
	}else{
		alert("请选择需要删除的消息！");	
		return false;
	}
}
function boxBeforSend(){
	if(!this.boxid.value)  throw('数据有误');
	if(!this.title.value) throw('请输入主题');
	if(!this.content.value) throw('请输入内容');
	if(!this.vcode.value) throw('请输入验证码');
	if(this.vcode.value<4) throw('验证码至少4位');
}
function boxSend(err, data){
	if(err){
		winjinAlert(err,"err");
		$("#vcode").trigger("click");
	}else{
		winjinAlert(data,"ok");
		this.reset();
		reload();
	}
}
</script>
<div class="pagetop"></div>
<div class="pagemain">
	
<div class="content3 wjcont">
 <div class="body">
 <div class="youxi1">
<form action="/index.php/box/searchReceive" datatype="html" call="boxSearch" target="ajax">
 	<h2>
     <select name="state" class="text5">
                <option value="3" selected>所有</option>
                <option value="2">已读</option>
                <option value="1">未读</option>
     </select>
            <input type="text"  name="fromTime" class="datainput"  value="<?=$this->iff($_REQUEST['fromTime'],$_REQUEST['fromTime'],date('Y-m-d H:i:s',$GLOBALS['fromTime']))?>" id="datetimepicker" />至<input type="text" name="toTime"  class="datainput" value="<?=$this->iff($_REQUEST['toTime'],$_REQUEST['toTime'],date('Y-m-d H:i:s',$GLOBALS['toTime']))?>" id="datetimepicker4" /> 
            <input class="an chazhao" value="查询" type="submit">
            <input class="an ml10" value="已发消息" onclick="window.location.href='/index.php/box/send'" type="button">
            <input class="an ml10" value="编写消息" onclick="window.location.href='/index.php/box/write'" type="button">
    </h2>
</form>
<div class="biao-cont">
<?php $this->display('box/searchReceive.php');?>
</div>
<div class="boxdetail">
<table width="820">
    <tbody><tr>
        <td width="50%">主题：<input name="box-title" id="box-title" value="" class="txt"></td>
        <td width="50%">发件人：<input name="box-from" id="box-from" value="" class="txt"></td>
    </tr>
    <tr>
        <td>时间：<input name="box-time" id="box-time" value="" class="txt"></td>
        <td>收件人：<input name="box-to" id="box-to" value="" class="txt"></td>
    </tr>
    <tr>
        <td colspan="2">
            <textarea name="box-content" class="txt2"></textarea>
        </td>
    </tr>
    </tbody>
</table>
</div>
 
 </div>
 </div>
 <div class="foot"></div>
</div>
<div id="wanjinDialog"></div>
<script>

$('#datetimepicker10').datetimepicker({
	step:5,
	inline:true
});
$('#datetimepicker_mask').datetimepicker({
	mask:'9999/19/39 29:59'
});
$('#datetimepicker').datetimepicker();
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
$('#datetimepicker4').datetimepicker();
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
