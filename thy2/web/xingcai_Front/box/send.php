<?php $this->display('inc_daohang.php'); ?>


<div id="nsc_subContent" style="border:0">
<script type="text/javascript">

	$(function() {
		$( ".menus-li li").click(function(){
            $( ".menus-li li").removeClass("on");
            $(this).addClass("on");
            $("#tabs-1,#tabs-2").hide();
            $("#tabs-"+($(this).index()+1)).show();
        });
	})
</script>

<div id="siderbar">
<ul class="list clearfix">
<li ><a href="/index.php/safe/info" >绑定卡号</a></li>
<li ><a href="/index.php/safe/passwd" >密码修改</a></li>
<li ><a href="/index.php/record/search" >投注记录</a></li>
<li ><a href="/index.php/report/coin" >帐变记录</a></li>
<li ><a href="/index.php/report/count" >盈亏报表</a></li>
<li ><a href="/index.php/cash/rechargeLog" >充值记录</a></li>
<li ><a href="/index.php/cash/toCashLog" >提现记录</a></li>
<li ><a href="/index.php/user/nickname" >更改称昵</a></li>
<li class="current"><a href="/index.php/box/receive" >消息管理</a></li>
</ul>
</div>

<link rel="stylesheet" href="/css/nsc/reset.css?v=1.16.11.5" />
<link rel="stylesheet" href="/css/nsc/list.css?v=1.16.11.5" />
<link rel="stylesheet" href="/css/nsc/activity.css?v=1.16.11.5" />
<script type="text/javascript" src="/js/nsc/jquery-1.7.min.js?v=1.16.11.5"></script>
<script type="text/javascript" src="/js/nsc/main.js?v=1.16.11.5"></script>
<script type="text/javascript" src="/js/nsc/dialogUI/jquery.dialogUI.js?v=1.16.11.5"></script>
<link href="/css/nsc/plugin/dialogUI/dialogUI.css?v=1.16.11.5" media="all" type="text/css" rel="stylesheet" />

</head>
<body>
<div id="subContent_bet_re">

<style>
    .task_div{right:50px;}
</style>
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
		$.alert(err);
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
		$.alert(err);
	}else{
		$.alert('删除成功');
		recodeRefresh();
	}
}
/**
 * 批量撤销前调用
 */
function recordBeforeDelete(){
	//获取ID
	var byid="";
	var tourl="/index.php/box/senddeleteAll/";
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
		}
		
	}else{
		$.alert("请选择需要删除的消息！");	
		return false;
	}
}
</script>

<div id="contentBox">
    <form action="/index.php/box/sendsearchReceive" datatype="html" call="boxSearch" target="ajax">
      
        <div id="searchBox" class="re">
        	<div class="inlineBlock">
            	<label>信息时间：</label><input type="text" class="input150" value="<?= $this->iff($_REQUEST['fromTime'], $_REQUEST['fromTime'], date('Y-m-d H:i', $GLOBALS['fromTime'])) ?>" name="fromTime" id="datetimepicker" /> <span class="image"></span>
            </div>
            <label>至</label>
            <div class="inlineBlock">
            	<input type="text" class="input150" value="<?= $this->iff($_REQUEST['toTime'], $_REQUEST['toTime'], date('Y-m-d H:i', $GLOBALS['toTime'])) ?>" id="datetimepicker4" name="toTime" /> <span class="image" ></span>
            </div>
			            <div class="inlineBlock">
            	<label>类型：</label><select id="methodid"  name="state"  class="team">
			<option value="3" selected>所有</option>
                <option value="2">已读</option>
                <option value="1">未读</option>
        </select>
		
            </div>  
          <input type="submit" value="查询" class="formCheck chazhao" />
		  <input type="button" value="收信箱" onclick="window.location.href='/index.php/box/receive'" class="formCheck" />
		  <?php if($this->settings['LetterStatus']==1 && $this->user['mLetterStatus']==1){ //总开关为1，用户配置为1则开启   ?> 
		  <input type="button" value="发信息" onclick="window.location.href='/index.php/box/write'" class="formCheck" />
		  <?php } ?>
		  </div>
    </form>
    </div>
  <div class="biao-cont">
    	<!--下注列表-->
        <?php $this->display('box/sendsearchReceive.php'); ?>
        <!--下注列表 end -->
    </div>
	<div class="boxdetail"> </div>
<?php $this->display('inc_root.php'); ?>

</div></div></div></div></div>
<?php $this->display('inc_che.php'); ?>

 </body>
 </html>