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
$url='http://tubiao.zhcw.com/tubiao/tianJing/11x5/11x5Jsp/kaiJiangOrLengReHaoMaTjDesc.jsp';
$content=file_get_contents($url);
$start='kj_issue0';
$end='</tr>';
$content1=cut($start,$end,$content);
$start='title=';
$end='>';
$opentime=substr(cut($start,$end,$content1),-19);
$start='title=';
$end='</a></td>';
$num=substr(cut($start,$end,$content1),-8);
$expect=substr($num,0,6).'0'.substr($num,-2);
$start='FF6600_12b';
$end='</td>';
$codes=getcode(cut($start,$end,$content));
$opencode='';
$i = 0;
while ($i<=8){
if($i<>8) $str=',';else $str='';
$opencode.=substr($codes,$i,2).$str;
$i+=2;
}
header("Content-type: application/xml");
echo'<?xml version="1.0" encoding="utf-8"?>';
echo '<xml><row expect="'."$expect".'" opencode="'."$opencode".'" opentime="'."$opentime".'" /></xml>';
ob_end_flush();
;echo '
'
?>