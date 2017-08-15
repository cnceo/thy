<?php
require_once('xy_sqlin.php');
$conf['debug']['level']=5;

/*		数据库配置		*/
$conf['db']['dsn']='mysql:host=127.0.0.1;dbname=wanjing';
$conf['db']['user']='root';
$conf['db']['password']='qq2605559995';
$conf['db']['charset']='utf8';
$conf['db']['prename']='xy_';

$conf['safepass']='123';     //后台登陆安全码

$conf['cache']['expire']=0;
$conf['cache']['dir']='_cache/';     //前台缓存目录
$conf['url_modal']=2;
$conf['action']['template']='xy_inc/admin/';
$conf['action']['modals']='xy_action/admin/';
$conf['member']['sessionTime']=15*60;	// 用户有效时长
$conf['node']['access']='http://localhost:65531';	// node访问基本路径

error_reporting(E_ERROR & ~E_NOTICE);
ini_set('date.timezone', 'asia/shanghai');
ini_set('display_errors', 'Off');