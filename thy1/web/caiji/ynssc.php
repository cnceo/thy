<?php
error_reporting(0);
$url='http://shishicai.cjcp.com.cn/yunnan/kaijiang/';
$subject=file_get_contents($url);
$subject=iconv('gbk', 'utf-8', $subject);
$pattern='~<table class="kjjg_table">([\s\S]*?)</table>~';
preg_match_all($pattern, $subject, $matches);
$subject=$matches[1][0];
$pattern='~<td>(.*?)期<\/td>~';
preg_match_all($pattern, $subject, $matches);
$qihao=$matches[1];
$pattern='~<td>([0-9]+-[0-9]+-[0-9]+ [0-9]+:[0-9]+:[0-9]+)</td>~';
preg_match_all($pattern, $subject, $matches);
$sj=$matches[1];
$pattern='~<td><div class="kjjg_hm_bg">(.*?)</div></td>~';
preg_match_all($pattern, $subject, $matches);
$haoma=$matches[1];
foreach ($haoma as $key => $value) {
	$data[$key]=substr(str_replace('</div>',',',str_replace('<div class="hm_bg">', '', $value)), 0,-1);
}
$haoma=$data;
ob_start();
header( "Content-type: application/xml" );
$str='<xml>';
$i=0;
foreach ($haoma as $key => $value) {
	$str.="<row expect=\"".( $qihao[$key]."" )."\" opencode=\"".( $haoma[$key]."" )."\" opentime=\"".$sj[$key]."\" />";
	$i++;
	if($i==5){
		break;
	}
}

$str.='</xml>';
echo $str;
?>