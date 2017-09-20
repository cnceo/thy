<?
// $lastNo=$this->getGameLastNo(5);
// $api = 'http://www.qqfenfencai.com/open/code_new.asp';
// $result = file_get_contents( $api );  
// $tmpResult = str_replace("<span>", "", $result);
// $resource = str_replace("</span>", "", $tmpResult);
// //echo $resource;
// // $data = json_decode( $resource , 1 );
// $data = explode('@AAA@', $resource);
// //var_dump($data);
// $actionNo = $data[0];
// $opencode = $data[1];
// //echo $opencode;
// if(!is_numeric($opencode))exit; //如果不为数字重新获取
// $realCode = "";
// for($i = 0; $i < strlen(trim($opencode)); $i++) {
//     //echo $opencode[1];
//     $realCode .= $opencode[$i].",";
// }
// $realCode = rtrim($realCode, ',');
// header('Content-Type: text/xml;charset=utf8');

// echo '<xml>
// <row expect="'.$actionNo.'" opencode="'.$realCode.'" opentime="'.$lastNo['actionTime'].'"/>
// </xml>';
ob_start();
#$lastNo=$this->getGameLastNo(5);
$api = 'http://api.cai99.com:99/QQ=1?callback=successCallback';
$resultJson = file_get_contents( $api ); 
if(!$resultJson)exit;
$resultJson = ltrim($resultJson, 'successCallback(');
$resultJson = rtrim($resultJson, ')');
$result = json_decode($resultJson, true);
$ffc = $result['result'][0];
$onlineNumber = (string)$ffc['count'];
//echo $onlineNumber;exit;
$total = 0;
for($i = 0; $i < strlen($onlineNumber); $i++) $total += (int)$onlineNumber[$i]; 
$lastNumber = substr($onlineNumber, -4);
if(strlen($lastNumber) < 4) exit;
$openCode = substr($total, -1).$lastNumber;
$realCode = "";
for($i = 0; $i < strlen(trim($openCode)); $i++) {
    $realCode .= $openCode[$i].",";
}
$realCode = rtrim($realCode, ',');
$data['opencode'] = $realCode;
$data['opentime'] = $ffc['time'] = str_replace('/', '-', $ffc['time']);
$lastNo=$this->getGameLastNo(5, strtotime($ffc['time']));
#var_dump($lastNo);exit(0);
header('Content-type: application/xml');
echo'<?xml version="1.0" encoding="utf-8"?>';
echo '<xml>
<row expect="'.$lastNo['actionNo'].'" opencode="'.$realCode.'" opentime="'.$ffc['time'].'"/>
</xml>';

ob_end_flush();
