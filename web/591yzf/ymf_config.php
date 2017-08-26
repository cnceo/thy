 <?php	

//数据库服务器
$db_host = 'localhost';

//数据库用户名
$db_user = 'root';

//数据库密码
$db_pwd = '5671893';

//数据库名
$db_name = '0xc';

//数据表前缀
$db_tablepre = 'blast_';

//数据表编码
$db_charset = 'utf8';

?>
<?php
	$conn=mysql_connect("$db_host","$db_user","$db_pwd"); //连接数据库地址、用户名、密码
	mysql_query("set names '$db_charset'"); //数据库编码
	mysql_select_db("$db_name"); //数据库名称
	

?>
<?php
$parter="1000500503";
$key="MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCdFps9Uk39sijFC6N845+f0E3qyS5trCOyTEQbZJ/oWUULkJKUT6aTU5tcKd7PyEThWlDDgGUctwvuTm4C4Z3OEMI614ob8bQPXXkYavtTGEIiPidtHrBW3wh6sh4TDCdzv/yDKWFDjrULr253nrlL1V5KWbfd0jIDpZZnIeM30QIDAQAB ";
?>