<?php

include "Snoopy.class.php"; 
function getxml($url){
	$snoopy = new Snoopy; 

	$snoopy->agent = "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)";   

	$snoopy->referer = "http://www.baidu.com/";     

	$snoopy->rawheaders["Pragma"] = "no-cache";      

	$snoopy->maxredirs = 2;   

	$snoopy->offsiteok = false;   

	$snoopy->read_timeout = 1;   

	$snoopy->expandlinks = false;    

	if($snoopy->fetch($url))   

	{   

		  return $snoopy->results;  

	}   

	else{   

		 return false;

	}

}
ob_start();
function cut($start,$end,$file){
$content=explode($start,$file);
$content=explode($end,$content[1]);
return  $content[0];
}
function getcode($str){
$str=trim(preg_replace('/\D/',"",$str));
return $str;
}
$url='http://baidu.lecai.com//lottery/ajax_latestdrawn.php?lottery_type=565&'.time();
$content=getxml($url);
if($content){
$content=json_decode($content);
$expect=$content->data[0]->phase;
$opencode=$content->data[0]->result->result[0]->data;
$shijian=$content->data[0]->time_endticket;
$opencode=implode(',',$opencode);
header("Content-type: application/xml");
echo'<?xml version="1.0" encoding="utf-8"?>';
echo '<xml><row expect="20'."$expect".'" opencode="'."$opencode".'" opentime="'."$shijian".'" /></xml>';
ob_end_flush();
}
?>