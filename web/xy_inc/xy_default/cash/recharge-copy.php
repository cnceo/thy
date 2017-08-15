<!--//复制程序 flash+js------end-->
<?php
$this->freshSession();
$mBankId=$args[0]['mBankId'];
$sql="select mb.*, b.name bankName, b.logo bankLogo, b.home bankHome from {$this->prename}sysadmin_bank mb, {$this->prename}bank_list b where b.isDelete=0 and mb.id=$mBankId and mb.bankId=b.id";
$memberBank=$this->getRow($sql);
if($memberBank['bankId']==12 || $memberBank['bankId']==23){
?>
<!--左边栏body-->
<div class="content3 wjcont">
 <div class="title"><span>在线充值</span></div>
 <div class="body">
<form action="/mobao/pay.php" method="POST" name="a32" href="#" target="_blank">
     <div class="chongzhi3">
	 <h2>请核对充值信息：</h2>
    <ul>
     <li>
	 
	 
<link href="https://trade.mobaopay.com//css/reset.css" rel="stylesheet" />

<link href="https://trade.mobaopay.com//css/v1.3.0/index.css" rel="stylesheet" />
<script type="text/javascript" src="https://trade.mobaopay.com//js/jquery-1.4.1.min.js"></script>

<body><!--[if lte IE 6]>
<script type="text/javascript" src="https://trade.mobaopay.com//js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript">
DD_belatedPNG.fix('.pngIcon');
</script>
<![endif]-->
	 
	 <div style="width:700px" class="bankList">
	<ul style="border-top: 1px solid #CCCCCC;" class="clearfix">
		<li><input name="pt" value="ICBC" type="radio" checked="checked" onclick="onChecked('ICBC','payType1','1');" id="ICBC"><img src="/images/ICBC.gif" alt="工商银行"  onclick="onChecked('ICBC','payType1','1');"></li>
		<li><input name="pt" value="CMB" type="radio" onclick="onChecked('CMB','payType1','1');" id="CMB"><img src="/images/CMB.gif" alt="招商银行" onclick="onChecked('CMB','payType1','1');"></li>
		<li><input name="pt" value="CCB" type="radio" onclick="onChecked('CCB','payType1','1');" id="CCB"><img src="/images/CCB.gif" alt="建设银行" onclick="onChecked('CCB','payType1','1');"></li>
		<li><input name="pt" value="COMM" type="radio" onclick="onChecked('COMM','payType1','1');" id="COMM"><img src="/images/COMM.gif" alt="交通银行" onclick="onChecked('COMM','payType1','1');"></li>
		<li><input name="pt" value="ABC" type="radio" onclick="onChecked('ABC','payType1','1');" id="ABC"><img src="/images/ABC.gif" alt="农业银行" onclick="onChecked('ABC','payType1','1');"></li>
		<li><input name="pt" value="BOC" type="radio" onclick="onChecked('BOC','payType1','1');" id="BOC"><img src="/images/BOC.gif" alt="中国银行" onclick="onChecked('BOC','payType1','1');"></li>
		<li><input name="pt" value="PSBC" type="radio" onclick="onChecked('PSBC','payType1','1');" id="PSBC"><img src="/images/PSBC.gif" alt="邮政储蓄银行" onclick="onChecked('PSBC','payType1','1');"></li>
	  			<li><input name="pt" value="CIB" type="radio" "="" onclick="onChecked('CIB','payType1','1');" id="CIB"><img src="/images/CIB.gif" alt="兴业银行" onclick="onChecked('CIB','payType1','1');"></li>
		<li><input name="pt" value="SPDB" type="radio" onclick="onChecked('SPDB','payType1','1');" id="SPDB"><img src="/images/SPDB.gif" alt="浦发银行" onclick="onChecked('SPDB','payType1','1');"></li>
		<li><input name="pt" value="CMBC" type="radio" onclick="onChecked('CMBC','payType1','1');" id="CMBC"><img src="/images/CMBC.gif" alt="民生银行" onclick="onChecked('CMBC','payType1','1');"></li>
		<li><input name="pt" value="CNCB" type="radio" onclick="onChecked('CNCB','payType1','1');" id="CNCB"><img src="/images/CNCB.gif" alt="中信银行" onclick="onChecked('CNCB','payType1','1');"></li>
		<li><input name="pt" value="CEB" type="radio" onclick="onChecked('CEB','payType1','1');" id="CEB"><img src="/images/CEB.gif" alt="光大银行" onclick="onChecked('CEB','payType1','1');"></li>
		<li><input name="pt" value="HXB" type="radio" onclick="onChecked('HXB','payType1','1');" id="HXB"><img src="/images/HXB.gif" alt="华夏银行" onclick="onChecked('HXB','payType1','1');"></li>
		<li><input name="pt" value="PAB" type="radio" onclick="onChecked('PAB','payType1','1');" id="PAB"><img src="/images/PAB.gif" alt="平安银行" onclick="onChecked('PAB','payType1','1');"></li>
		<li><input name="pt" value="GDB" type="radio" onclick="onChecked('GDB','payType1','1');" id="GDB"><img src="/images/GDB.gif" alt="广发银行" onclick="onChecked('GDB','payType1','1');"></li>
		
	
	</ul>
</div>

<script type="text/javascript">

function onChecked(obj,id,value)
{	
	document.getElementById(obj).checked = true;
	document.getElementById(id).value = value;
	var bankCode=document.getElementById(obj).value;
	if(value=="6")
	{
		strs=obj.split("_"); //字符分割
		bankCode = bankCode+"_"+"A"
	}else if (value=="7")
	{
		strs=obj.split("_"); //字符分割
		bankCode = bankCode+"_"+"B2B"
	}
	document.getElementById(bankCode).checked = true;
	
}
		
function choose_BankType(type)
{
	document.getElementById("chooseBankType").value=type;
	if(type == '2'){
		document.getElementById("payType").value='6';
	}else{
		document.getElementById("payType").value='0';
	}
}
		
</script>
	 
	 
	 
	 
	 
	 
	 
	 </li>
     <li><span>充值编号：</span><?=$args[0]['rechargeId']?></li>
     <li><span>充值金额：</span><?=$args[0]['amount']?>&nbsp元</li>
     <li><span>充值金额：</span><?=$args[0]['amount']?>&nbsp元</li>
    </ul>
     <input name="p2_Order" type="hidden" value="<?=$args[0]['rechargeId']?>" />
     <input name="p3_Amt" type="hidden" value="<?=$args[0]['amount']?>" />
     <input name="pa_MP" type="hidden" value="<?=$this->user['username']?>" />
     <h3><input id="" type="submit" class="an" value="进入支付" /><input type="reset" onclick="window.location.reload();" class="an" value="重置" /></h3>
</div>
</form>
 <div class="chongzhi2">
 	<h3>充值说明：</h3>
    <ul>
     <li>1、每次"充值编号"均不相同,务必将"充值编号"正确复制填写到引号汇款页面的"附言"栏目中；</li>
     <li>2、帐号不固定，转帐前请仔细核对该帐号；</li>
     <li>3、充值金额与网友转账金额不符，充值将无法到账；</li>
     <li>4、转账后如10分钟未到账，请联系客服，告知您的充值编号和您的充值金额及你的银行用户姓名。</li>
    </ul>
 </div>
   <div class="bank"></div>
  </div>
  <div class="foot"></div>
</div>
    <!--左边栏body end-->
<?
}else{
?>
<div class="content3 wjcont">
 <div class="title"><span>充值信息</span></div>
 <div class="body">
 <div class="chongzhi1">
 	<h2>充值信息：</h2>
    <ul>
     <li><span>银行类型：</span><b><?=$memberBank['bankName']?></b><strong><a href="<?=$memberBank['bankHome']?>" target="_blank">进入银行网站>></a></strong></li>
     <li><span>银行账号：</span><input type="text" id="bank-account" readonly value="<?=$memberBank["account"]?>" class="text4" />
     <em class="copy" for="bank-account" >
	  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="43" id="copy-account" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-account&inputID=bank-account" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-account&inputID=bank-account" width="62" height="43" name="copy-account" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object>
	</em>
     </li>
     <li><span>账户名：</span><input type="text" id="bank-username" readonly value="<?=$memberBank["username"]?>" class="text4" />
     <em class="copy" for="bank-username">
	  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="43" id="copy-bankuser" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-bankuser&inputID=bank-username" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-bankuser&inputID=bank-username" width="62" height="43" name="copy-bankuser" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object> 
	  </em>
     </li>
     <li><span>充值金额：</span><input type="text" id="recharg-amount" readonly value="<?=$args[0]['amount']?>" class="text4" />
      <em class="copy" for="recharg-amount"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="43" id="copy-recharg" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-recharg&inputID=recharg-amount" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-recharg&inputID=recharg-amount" width="62" height="43" name="copy-recharg" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object>
	 </em>
     网银充值金额必须与网站填写金额一致方能到账！</li>
     <li><span>充值编号：</span><input type="text" id="username" readonly value="<?=$args[0]['rechargeId']?>" class="text4" />
     <em class="copy" for="username">
            <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="43" id="copy-username" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-username&inputID=username" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-username&inputID=username" width="62" height="43" name="copy-username" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object> 
    </em>
     每个充值编号仅用于一笔充值，重复使用将不能到账！</li>
    </ul>
 </div>
 <div class="chongzhi2">
 	<h3>充值说明：</h3>
    <ul>
     <li>1、每次"充值编号"均不相同,务必将"充值编号"正确复制填写到引号汇款页面的"附言"栏目中；</li>
     <li>2、帐号不固定，转帐前请仔细核对该帐号；</li>
     <li>3、充值金额与网友转账金额不符，充值将无法到账；</li>
     <li>4、转账后如10分钟未到账，请联系客服，告知您的充值编号和您的充值金额及你的银行用户姓名。</li>
         </ul>
 </div>
  <div class="bank"></div>
  </div>
  <div class="foot"></div>
</div>
<?
}
?>