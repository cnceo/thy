<?php
require_once('xy_sqlin.php');
$conf['debug']['level']=5;
$conf['db']['dsn']='mysql:host=127.0.0.1;dbname=wanjing';
$hostname='localhost';    //������֧������
$dbname='wanjing'; 
$username='root';
$password='qq2605559995'; //������֧������

$conf['db']['user']='root';
$conf['db']['password']='qq2605559995';
$conf['db']['charset']='utf8';
$conf['db']['prename']='xy_';
$conf['cache']['expire']=0;
$conf['cache']['dir']='_cache/';
$conf['url_modal']=2;
$conf['action']['template']='xy_inc/xy_default/';
$conf['action']['modals']='xy_action/xy_default/';
$conf['member']['sessionTime']=15*60;	// �û���Чʱ��
error_reporting(E_ERROR & ~E_NOTICE);
ini_set('date.timezone', 'asia/shanghai');
ini_set('display_errors', 'Off');
if(strtotime(date('Y-m-d H:i:s',time()))>strtotime(date('Y-m-d',time()).' 03:00:00')){
	
	$GLOBALS['fromTime']=strtotime(date('Y-m-d',strtotime("-60 day")).' 03:00:00');
	$GLOBALS['toTime']=strtotime(date('Y-m-d',strtotime("+1 day")).' 03:00:00');
}else{
	$GLOBALS['fromTime']=strtotime(date('Y-m-d',strtotime("-60 day")).' 03:00:00');
	$GLOBALS['toTime']=strtotime(date('Y-m-d',time()).' 03:00:00');
}
?>