<!--//复制程序 flash+js------end-->
<?php
$this->freshSession();
$mBankId    = $args[0]['mBankId'];
$sql        = "select mb.*, b.name bankName, b.logo bankLogo, b.home bankHome from {$this->prename}sysadmin_bank mb, {$this->prename}bank_list b where b.isDelete=0 and mb.id=$mBankId and mb.bankId=b.id";
$memberBank = $this->getRow($sql);
if ($memberBank['bankId'] == 12 || $memberBank['bankId'] == 23) {
?>
<!--左边栏body-->
<style type="text/css">
<!--
.banklogo input{
height:15px; width:15px
}
.banklogo{}
-->
</style>

<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>充值信息</td> 
    </tr>
    <tr height=25 class='table_b_tr_b' >
      <td align="right" height="80" class="copys">充值银行：</td>
      <td align="left" ><img id="bank-type-icon" class="bankimg" src="/<?= $memberBank['bankLogo'] ?>" title="<?= $memberBank['bankName'] ?>" /></td> 
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">充值金额：</td>
     <td align="left" ><input id="recharg-amount" readonly value="<?= $args[0]['amount'] ?>" />
      <div class="btn-a copy" for="recharg-amount"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-recharg" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-recharg&inputID=recharg-amount" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <!--<embed src="/skin/js/copy.swf?movieID=copy-recharg&inputID=recharg-amount" width="62" height="23" name="copy-recharg" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object>
	 </div>      </td>
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys"> 充值编号 ：</td>
      <td align="left"><input id="username" readonly value="<?= $args[0]['rechargeId'] ?>" />
         <div class="btn-a copy" for="username">
            <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-username" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-username&inputID=username" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <!--<embed src="/skin/js/copy.swf?movieID=copy-username&inputID=username" width="62" height="23" name="copy-username" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object> 
            </div>			</td> 
    </tr>-->
	<tr height=25 class='table_b_tr_h'>
    <td colspan="2" align="right" class="copyss">
	  <form action="http://<?= $_SERVER['HTTP_HOST'] ?>/ay/pays.php" method="POST" name="a32" target="_blank">
         <table border="0"  cellpadding="2" cellspacing="0" >
           <tr>
             <td valign="middle"><span class="banklogo">
               <input name="rbPayMType" type="radio" value="967" checked  style="width:15px;"/>
             </span></td>
             <td height="40" align="left" valign="middle">
               <div class="banklogo"><img src="/ay/images/gongshang.gif" title="工商银行" alt="工商银行"  border="0" style="border:1px solid #CCCCCC;" />										</div>									</td>
             <td align="left" valign="middle"><span class="banklogo">
               <input name="rbPayMType" type="radio" value="964" style="width:15px;"/>
             </span></td>
             <td height="40" align="left" valign="middle">
               <div class="banklogo"><img src="/ay/images/nongye.gif" title="中国农业银行"  alt="中国农业银行"  border="0" style="border:1px solid #CCCCCC;" /></div>									  </td>
             <td align="left" valign="middle"><span class="banklogo">
               <input name="rbPayMType" type="radio" value="965" style="width:15px;"/>
             </span></td>
             <td height="40" align="left" valign="middle">
               <div class="banklogo"><img src="/ay/images/jianshe.gif" title="建设银行" alt="建设银行"  border="0" style="border:1px solid #CCCCCC;" />										</div>									</td>
			                <td><span class="banklogo">
               <input name="rbPayMType" type="radio" value="970"  style="width:15px;"/>
             </span></td>
             <td height="40" align="left">  <div class="banklogo"><img src="/ay/images/zhaohang.gif" title="招商银行" alt="招商银行"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>
             <td align="left" valign="middle"><span class="banklogo">
               <input name="rbPayMType" type="radio" value="989" style="width:15px;"/>
             </span></td>
             <td align="left" valign="middle"><div class="banklogo"><img src="/ay/images/beijing.gif" title="北京银行" alt="北京银行"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>
             </tr>
           <tr>
             <td><span class="banklogo">
               <input name="rbPayMType" type="radio" value="963" style="width:15px;"/>
             </span></td>								     
             <td height="40" align="left">
               <div class="banklogo"><img src="/ay/images/zhongguo.gif" title="中国银行" alt="中国银行"  border="0" style="border:1px solid #CCCCCC;" />										 </div>									</td>
             <td align="left"><span class="banklogo">
               <input name="rbPayMType" type="radio" value="981" style="width:15px;"/>
             </span></td>
             <td align="left">
               <div class="banklogo"><img src="/ay/images/jiaotong.gif" title="交通银行" alt="交通银行"  border="0" style="border:1px solid #CCCCCC;" />										 </div>									</td>
             <td align="left"><span class="banklogo">
               <input name="rbPayMType" type="radio" value="972" style="width:15px;"/>
             </span></td>
             <td align="left"><span class="banklogo"><img src="/ay/images/xingye.gif" title="兴业银行" alt="兴业银行"  border="0" style="border:1px solid #CCCCCC;" /> </span></td>
             <td align="left"><span class="banklogo">
               <input name="rbPayMType" type="radio" value="971" style="width:15px;"/>
             </span></td>
             <td align="left"><div class="banklogo"><img src="/ay/images/youzheng.gif" title="中国邮政" alt="中国邮政"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>
			              <td align="left"><span class="banklogo">
               <input name="rbPayMType" type="radio" value="962" style="width:15px;"/>
             </span></td>
             <td align="left"> <div class="banklogo"><img src="/ay/images/zhongxin.gif" title="中信银行" alt="中信银行"  border="0" style="border:1px solid #CCCCCC;" /></div>	</td>
             </tr>
           <tr>
             <td align="left"><span class="banklogo">
               <input name="rbPayMType" type="radio" value="980" style="width:15px;"/>
             </span></td>
             <td align="left"><div class="banklogo"><img src="/ay/images/minsheng.gif" title="中国民生银行" alt="中国民生银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
             <td align="left"><span class="banklogo">
               <input name="rbPayMType" type="radio" value="985" style="width:15px;"/>
             </span></td>
             <td align="left"><div class="banklogo"><img src="/ay/images/guangfa.gif" title="广发银行" alt="广发银行"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>
             <td align="left"><span class="banklogo">
               <input name="rbPayMType" type="radio" value="982" style="width:15px;"/>
             </span></td>
             <td align="left">
             <div class="banklogo"><img src="/ay/images/huaxia.gif" title="华夏银行" alt="华夏银行"  border="0" style="border:1px solid #CCCCCC;" />									     </div>			</td>
			              <td><span class="banklogo">
               <input name="rbPayMType" type="radio" value="986" style="width:15px;"/>
             </span></td>
             <td height="40" align="left"><img src="/ay/images/guangda.gif" title="光大银行" alt="光大银行"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>
			              <td align="left"><span class="banklogo">
               <input name="rbPayMType" type="radio" value="978" style="width:15px;"/>
             </span></td>
             <td align="left"><div class="banklogo"><img src="/ay/images/pingan.gif" title="平安银行" alt="平安银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
             </tr>
           <tr>

             <td align="left"><span class="banklogo">
               <input name="rbPayMType" type="radio" value="977" style="width:15px;"/>
             </span></td>
             <td align="left"><span class="banklogo1"><img src="/ay/images/shangpufa.gif"  title="上海浦东发展银行"  border="0" style="border:1px solid #CCCCCC;" /></span></td>
			              <td height="40" align="center"><span class="banklogo">
               <input name="rbPayMType" type="radio" value="1003" style="width:15px;"/>
             </span></td>
             <td height="40" align="center"><img src="/ay/images/weixin.gif" title="微信支付" alt="微信支付"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>
             </tr>
           <tr>
             <!--<td height="40" align="center"><span class="banklogo">
               <input name="rbPayMType" type="radio" value="992" style="width:15px;"/>
             </span></td>
             <td height="40" align="center"><img src="/ay/images/alipay.gif" title="支付宝" alt="支付宝"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>-->
             <td height="40" align="center">&nbsp;</td>
             <td height="40" align="center">&nbsp;</td>
             <td height="40" align="center">&nbsp;</td>
             <td height="40" align="center">&nbsp;</td>
           </tr>
           <tr>
             <td height="40" colspan="8" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="go" value="前去充值" style="width:100px; height:40px; line-height:40px; text-align:center;"></td>
             </tr>
           
           
         </table>
         <input name="p2_Order" type="hidden" value="<?= $args[0]['rechargeId'] ?>" />
         <input name="p3_Amt" type="hidden" value="<?= $args[0]['amount'] ?>" />
        <input name="pa_MP" type="hidden" value="<?= $this->user['username'] ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style="display:inline">*注意：在线充值付款成功后，请等待30s后再关闭充值的窗口，以防资金不到账。若付款后未到账，请联系客服。
</form></td>
	</td>
   </tr>
</table>
    <!--左边栏body结束-->
<?php
} else {
?>
<div class="content3 wjcont">
 <div class="title"><span>充值信息</span></div>
 <div class="body">
 <div class="chongzhi1">
 	<h2>充值信息：</h2>
    <ul>
     <li><span>银行类型：</span><b>农业银行</li>
     <li><span>银行账号：</span><input type="text" id="bank-account" readonly value="<?= $memberBank["account"] ?>" class="text4" />
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
     <li><span>账户名：</span><input type="text" id="bank-username" readonly value="<?= $memberBank["username"] ?>" class="text4" />
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
     <li><span>充值金额：</span><input type="text" id="recharg-amount" readonly value="<?= $args[0]['amount'] ?>" class="text4" />
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
     <br/>
	 网银充值金额必须与网站填写金额一致方能到账！</li>
     <li><span>充值编号：</span><input type="text" id="username" readonly value="<?= $args[0]['rechargeId'] ?>" class="text4" />
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
    <br/> 每个充值编号仅用于一笔充值，重复使用将不能到账！</li>
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
<?php
}
?>