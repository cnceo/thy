<?php
date_default_timezone_set('PRC');//设置为中华人民共和国
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
$url='http://kj.cjcp.com.cn/ssl/';
$content=file_get_contents($url);
$start='<td class="th">上海时时乐开奖结果号码</td>';
$end='</table>';
$content0=cut($start,$end,$content);
$start='<td class="qihao">';
$end='</td>';
$num=getcode(cut($start,$end,$content0));
$expect=substr($num,2,6).'0'.substr($num,-2);
$opentime=date('Y-m-d H:i:m');
$start='<td class="kjhm t_center">';
$end='</td>';
$codes=getcode(cut($start,$end,$content0));
$opencode='';
$i = 0;
while ($i<=2){
if($i<>2) $str=',';else $str='';
$opencode.=substr($codes,$i,1).$str;
$i+=1;
}
header("Content-type: application/xml");
echo'<?xml version="1.0" encoding="utf-8"?>';
echo '<xml><row expect="'."$expect".'" opencode="'."$opencode".'" opentime="'."$opentime".'" /></xml>';
ob_end_flush();
;echo '
'
?>