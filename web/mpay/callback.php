﻿<?php
/* *
 * 功能：支付回调文件
 * 版本：1.0
 * 日期：2015-04-23
 * 说明：
 * DAVID 适应万金大部分版本.
 * 第三方申请 对接 QQ：85546880
 */
 
	require_once("Mobaopay.Config.php");
	require_once("MobaoPay.class.php");

	// 请求数据赋值
	$data = "";
	$data['apiName'] = $_REQUEST["apiName"];
	// 通知时间
	$data['notifyTime'] = $_REQUEST["notifyTime"];
	// 支付金额(单位元，显示用)
	$data['tradeAmt'] = $_REQUEST["tradeAmt"];
	// 商户号
	$data['merchNo'] = $_REQUEST["merchNo"];
	// 商户参数，支付平台返回商户上传的参数，可以为空
	$data['merchParam'] = $_REQUEST["merchParam"];
	// 商户订单号
	$data['orderNo'] = $_REQUEST["orderNo"];
	// 商户订单日期
	$data['tradeDate'] = $_REQUEST["tradeDate"];
	// Mo宝支付订单号
	$data['accNo'] = $_REQUEST["accNo"];
	// Mo宝支付账务日期
	$data['accDate'] = $_REQUEST["accDate"];
	// 订单状态，0-未支付，1-支付成功，2-失败，4-部分退款，5-退款，9-退款处理中
	$data['orderStatus'] = $_REQUEST["orderStatus"];
	// 签名数据
	$data['signMsg'] = $_REQUEST["signMsg"];
	//充值赠送百分比  为'0'则不开启活动 
	$czzs=0; //%

	print_r($data);
	// 初始化
	$cMbPay = new MbPay($mbp_key, $mobaopay_gateway);
	// 准备准备验签数据
	$str_to_sign = $cMbPay->prepareSign($data);
	// 验证签名
	$resultVerify = $cMbPay->verify($str_to_sign, $data['signMsg']);
	//var_dump($data);
	if ($resultVerify) 
	{




		if ($_REQUEST["notifyType"] == 0 or $_REQUEST["notifyType"] == 1)
		{
				
				
				
				
	$r3_Amt=$data['tradeAmt'];
	$r6_Order=$data['orderNo'];


 $info="支付成功，请确认！";

		if($r9_BType=="1"){
		
		}elseif($r9_BType=="2"){

    $dbname = 'xc';
	$dbhost = '103.214.170.32';
	$conf['db']['user'] = 'thy';
	$conf['db']['password'] = 'www.123.com';
	$conf['db']['charset'] = 'utf8';
	$conn = mysql_connect($dbhost, $conf['db']['user'], $conf['db']['password']);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($dbname, $conn);
	mysql_query("SET NAMES UTF8");
	
	
	$orderId = $r6_Order;
	$amount = $r3_Amt;

	$chaxun = mysql_query("SELECT username FROM blast_member_recharge where rechargeid = '" . $orderId . "'");
	$r8_MP = mysql_result($chaxun, 0);
	
	$chaxun2 = mysql_query("select actionIP from blast_member_recharge where rechargeid= '" . $orderId . "'");
	$actionIP = mysql_result($chaxun2, 0);
	
	$chaxun3 = mysql_query("select id from blast_member_recharge where rechargeid= '" . $orderId . "'");
	$id = mysql_result($chaxun3, 0);
	$chaxun4 = mysql_query("select uid from blast_member_recharge where rechargeid= '" . $orderId . "'");
	$uid = mysql_result($chaxun4, 0);
	$chaxun5 = mysql_query("select coin from blast_members where uid= '" . $uid . "'");
	$coin = mysql_result($chaxun5, 0);
	$chaxun6 = mysql_query("select value from blast_params where name='czzs'");
	$czzs = mysql_result($chaxun6, 0);
	$chaxun7 = mysql_query("select username from blast_member_recharge where rechargeid= '" . $orderId . "'");
	$username = mysql_result($chaxun7, 0);
	
	
	if ($czzs) {
		$r3_Amt = $r3_Amt * (1 + number_format($czzs / 100, 2, '.', ''));
	}
	
	$inserts = "insert into blast_coin_log (uid,type,playedId,coin,userCoin,fcoin,liqType,actionUID,actionTime,actionIP,info,extfield0,extfield1) values ('" . $uid . "',0,0,'" . $payMoney . "','" . $coin . "'+'" . $payMoney . "',0,1,0,UNIX_TIMESTAMP(),'" . $actionIP . "','在线支付自动到账','" . $id . "','" . $uid . "')";
	
	$update1 = "UPDATE blast_member_recharge SET state = 1 WHERE rechargeid = '" . $orderId . "'";
	
	$update2 = "UPDATE blast_members SET coin = coin+'" . $amount . "' WHERE username = '" . $username . "'";
	
	$update3 = "update blast_member_recharge set rechargeTime=UNIX_TIMESTAMP(),rechargeAmount='" . $amount . "',coin='" . $coin . "', info='在线支付自动到账' where rechargeid='" . $orderId . "'";
	
	$sql = "SELECT * FROM blast_member_recharge where rechargeid = '" . $orderId . "' and state=0";
	$banduan = mysql_query($sql);
	$row2 = mysql_fetch_array($banduan);
	
if(empty($row2))//开始判断是够为空 
{ 
 $info="非法数据提交！";
} else { 
	if (mysql_query($update1, $conn)) {
		mysql_query($update2, $conn);
		mysql_query($update3, $conn);
		mysql_query($inserts, $conn);
	}
	}	 
	}
	}
	
}else{
 $info="支付失败，请确认！";
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<title>支付结果通知</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
    <div>
	<h1><?=$info?></h1>
	<table align="center" width="350" cellpadding="5" cellspacing="0">
        <tr>
            <td align="right">订单号：</td>
            <td align="left"><?=$r6_Order?></td>
        </tr>
		<tr>
           <td align="right">第三方支付订单号：</td>
           <td align="left"><?=$r2_TrxId?></td>
        </tr>
        <tr>
           <td align="right">付款金额：</td>
           <td align="left"><?=$r3_Amt?></td>
        </tr>
    </table>
    </div>
</body>
</html>

