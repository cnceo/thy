<?php
require_once('xy_sqlin.php');
$conf['debug']['level']=5;

/*		���ݿ�����		*/
$conf['db']['dsn']='mysql:host=127.0.0.1;dbname=wanjing';
$conf['db']['user']='root';
$conf['db']['password']='qq2605559995';
$conf['db']['charset']='utf8';
$conf['db']['prename']='xy_';

$conf['safepass']='123';     //��̨��½��ȫ��

$conf['cache']['expire']=0;
$conf['cache']['dir']='_cache/';     //ǰ̨����Ŀ¼
$conf['url_modal']=2;
$conf['action']['template']='xy_inc/admin/';
$conf['action']['modals']='xy_action/admin/';
$conf['member']['sessionTime']=15*60;	// �û���Чʱ��
$conf['node']['access']='http://localhost:65531';	// node���ʻ���·��

error_reporting(E_ERROR & ~E_NOTICE);
ini_set('date.timezone', 'asia/shanghai');
ini_set('display_errors', 'Off');