<?php
header("Content-Type: text/html;charset=utf-8");
$userkey = '686558e369574580ab436b08934c7127'; //密钥

$orderid = $_GET["orderid"];
$opstate = $_GET["opstate"];
$ovalue  = $_GET["ovalue"];
$sign    = $_GET["sign"];
$attach  = $_GET["attach"];
$signu   = md5("orderid=" . $orderid . "&opstate=" . $opstate . "&ovalue=" . $ovalue . $userkey);

if ($signu == $sign) {
    if ($opstate == '0') {
?>
	   
	    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head><title>
            充值结果
        </title>
            <style>
                .tab
                {
                    border-collapse: collapse;
                    width: 700px;
                    border: #999 1px dashed;
                }
                .tab td
                {
                    padding: 5px;
                    border: #999 1px dashed;
                }
            </style>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        </head>
<body>
        
            <div style="height: 50px">
            </div>
            <div>
                <table class="tab" width="100%" border="0" align="center">
                    <tr>
                        <td align="center" colspan="2">
                            充值结果：
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="width: 150px">
                            支付结果信息：
                        </td>
                        <td>
                           支付成功
                        </td>
                    </tr>
                    <tr>
                      <td align="left">
                            订单号：
                      </td>
                      <td>
                            <?= $orderid ?>
                      </td>
                    </tr>
                   
                    <tr>
                        <td align="left">
                            支付金额：
                        </td>
                        <td>
                            <?= $ovalue ?>
                        </td>
                    </tr>
                     <tr>
                        <td align="left">
                            
                        </td>
                        <td>
                           <a href="javascript:window.opener=null;window.close();">关闭此页</a>
                        </td>
                    </tr>
                </table>
            </div>
</body>
</html>
	   
	   <?php
        
    }
    
} else {
    echo 'opstate=1';
    echo "您已充值，请勿反复刷新";
    exit;
}

?>
