<?php
$url = 'http://www.xjflcp.com/game/sscIndex';
$info=file_get_contents($url);
preg_match_all ("|<i>(.*?)</i>|i", $info, $ml);
preg_match_all ("|<span> (.*?) </span>|i", $info, $qs);

/*print('opencode="'.$ml[1][0].',');
print($ml[1][1].',');
print($ml[1][2].',');
print($ml[1][3].',');
print($ml[1][4].'"');*/
$opencode=$ml[1][0].','.$ml[1][1].','.$ml[1][2].','.$ml[1][3].','.$ml[1][4];
$expect=$qs[1];
$expect=$expect[0][0].$expect[0][1].$expect[0][2].$expect[0][3].$expect[0][4].$expect[0][5].$expect[0][6].$expect[0][7].$expect[0][8].intval($expect[0][9])-1;
//echo $opencode;
//echo 'expect"'.$expect[0].'"'.'<br/>';
//$opentime=date('Y-m-d H:i:s');
header("Content-type: application/xml");
echo'<?xml version="1.0" encoding="utf-8"?>';
echo '<xml><row expect="'.$expect.'" opencode="'.$opencode.'" opentime="'.date("Y-m-d H:i:s").'"/></xml>';
ob_end_flush();
//采集修复QQ:113438373
?>
