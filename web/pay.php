<?php
header('Content-Type: text/html; charset=utf-8');
$uri = "http://cashier.duoduojump.com/payment";
$merId = "90168199";
$key = "H27imAMZQ2BMp32Z25QG2xhwPbG7CQ3i";
echo "MerId=90168199&OrdId=20170000001&OrdAmt=1&PayType=DT&CurCode=CNY&BankCode=ABC&ProductInfo=cp&Remark=no&ReturnURL=www.baidu.com&NotifyURL=www.baidu.com&SignType=MD5&MerKey=H27imAMZQ2BMp32Z25QG2xhwPbG7CQ3i".PHP_EOL;
$signInfo = md5("MerId=90168199&OrdId=20170000001&OrdAmt=1&PayType=DT&CurCode=CNY&BankCode=ABC&ProductInfo=cp&Remark=no&ReturnURL=www.baidu.com&NotifyURL=www.baidu.com&SignType=MD5&MerKey=H27imAMZQ2BMp32Z25QG2xhwPbG7CQ3i");

?>

<form action="http://cashier.duoduojump.com/payment/" method="post">
<input type="hidden" name="MerId" value="90168199"/>
<input type="hidden" name="OrdId" value="20170000001"/>
<input type="hidden" name="OrdAmt" value="1.00"/>
<input type="hidden" name="PayType" value="DT"/>
<input type="hidden" name="CurCode" value="CNY"/>
<input type="hidden" name="BankCode" value="ABC"/>
<input type="hidden" name="ProductInfo" value="cp"/>
<input type="hidden" name="Remark" value="no"/>
<input type="hidden" name="ReturnURL" value="www.baidu.com"/>
<input type="hidden" name="NotifyURL" value="www.baidu.com"/>
<input type="hidden" name="SignType" value="MD5"/>
<input type="hidden" name="SignInfo" value="<?=$signInfo?>"/>
<input type="submit" value="提交">
</form>
