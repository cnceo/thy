<?php


//网站支付接入QQ:2572707
$userkey = "686558e369574580ab436b08934c7127"; //MD5私钥
$parter  = "1339";
$orderid = intval($_POST['p2_Order']);

$price = floatval($_POST['p3_Amt']);

$attach = $_POST['pa_MP'];

$OrderDate = date("YmdHis");
$bankid    = $_POST['rbPayMType'];

$callbackurl = "http://" . $_SERVER['SERVER_NAME'] . "/ay/callback.php";
$hrefbackurl = "http://" . $_SERVER['SERVER_NAME'] . "/ay/hrefbackurl.php";


$sign = md5("parter=" . $parter . "&type=" . $bankid . "&value=" . $price . "&orderid=" . $orderid . "&callbackurl=" . $callbackurl . $userkey);

$u   = "http://go.akpk.cn/chargebank.aspx";
$url = $u . "?type=" . $bankid . "&parter=" . $parter . "&value=" . $price . "&orderid=" . $orderid . "&callbackurl=" . $callbackurl . "&hrefbackurl=" . $hrefbackurl . "&attach=" . $attach . "&sign=" . $sign;
header("location:" . $url);

?> 
