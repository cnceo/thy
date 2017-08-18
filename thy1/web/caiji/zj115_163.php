<?php

ob_start();
function cut($start,$end,$file){
$content=explode($start,$file);
$content=explode($end,$content[1]);
return  $content[0];
}
function getcode($str){
$str=trim(eregi_replace("[^0-9]","",$str));
return $str;
}
$url='http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=zjd11&periodNum=10';
$content=file_get_contents($url);
$start='daXiaoBi';
$end='xingTai":""}';
$content0=cut($start,$end,$content);
$start='period":"';
$end='","secondXt';
$num=cut($start,$end,$content);
$Nob=substr(getcode($num),-9);
$start='winningNumber":"';
$end='","';
$codes=cut($start,$end,$content);
$opencode=str_replace(' ',',',$codes);
$opentime=date('Y-m-d H:i:m');
if($opencode!='µÈ´ý¿ª½±ÖÐ'){
	$expect=$Nob;
}else{
	$expect='';
}
header("Content-type: application/xml");
echo'<?xml version="1.0" encoding="utf-8"?>';
echo '<xml><row expect="'."$expect".'" opencode="'."$opencode".'" opentime="'."$opentime".'" /></xml>';
ob_end_flush();
;echo '
'
?>