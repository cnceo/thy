<?php
header("Content-Type: text/html;charset=utf-8");

$userkey = '686558e369574580ab436b08934c7127';

$orderid = $_GET["orderid"];
$opstate = $_GET["opstate"];
$ovalue  = $_GET["ovalue"];
$sign    = $_GET["sign"];
$attach  = $_GET["attach"];
$signu   = md5("orderid=" . $orderid . "&opstate=" . $opstate . "&ovalue=" . $ovalue . $userkey);


//网站支付接入QQ:257270725
if ($signu == $sign) {
    if ($opstate == '0') {
        echo 'opstate=0';
        $Amount   = $ovalue;
        $BillNo   = $orderid;
        $hostname = "localhost"; //服务器的IP地址 或 服务器的名字 
        $dbuser   = "root"; //服务器的帐号 
        $dbpasswd = "root"; //服务器的密码  改
        $dbname   = "sjk"; //数据库的名字
        $conn     = mysql_connect($hostname, $dbuser, $dbpasswd); //连接数据库
        mysql_query("SET NAMES 'UTF8'");
        mysql_query("SET CHARACTER SET UTF8");
        mysql_query("SET CHARACTER_SET_RESULTS=UTF8'");
        if (!$conn) {
            die('Could not connect: ' . mysql_error());
        }
        //mysql_query("SET NAMES 'utf8'",$conn);
        mysql_select_db($dbname, $conn) or die("Unable to select database!");
        //查询当前订单名字
        $s_name_sql = "select username,id from xy_member_recharge where rechargeId=$BillNo";
        $s_name = mysql_query($s_name_sql) or die("Couldn't execute query!");
        while ($row = mysql_fetch_array($s_name)) {
            $username = $row['username']; //充值当前订单号是否存在
            $id       = $row['id']; //订单的ID
        }
        $chaxun6   = mysql_query("select value from xy_params where name='czzs'");
        $czzs      = mysql_result($chaxun6, 0);
        //查询当前订单是否存在
        $s_rId_sql = "select COUNT(extfield1) as crec from xy_coin_log where extfield1=$BillNo";
        $s_rId = mysql_query($s_rId_sql) or die("Couldn't execute query!");
        while ($row = mysql_fetch_array($s_rId)) {
            $extfield1 = $row['crec']; //充值当前订单号是否存在
        }
        
        if ($extfield1 == 0) { //如果查询出来的订单系统不存在则添加、更新数据
            if ($czzs != '0') {
                $rechrageAmount = number_format($Amount * (1 + $czzs / 100.00), 2, '.', ''); //充值赠送后的金额
            } else {
                $rechrageAmount = $Amount; //无活动
            }
            $s_info_sql = "select uid,coin from xy_members where username='$username'";
            //根据名字username查询当前uid,当前金额
            $s_info = mysql_query($s_info_sql) or die("Couldn't execute query!");
            while ($row = mysql_fetch_array($s_info)) {
                $uid      = $row['uid']; //充值帐号uid,当前金额
                $bfAmount = $row['coin'];
            }
            $i_c_l        = "insert into xy_coin_log (uid,type,playedId,coin,userCoin,fcoin,liqType,actionUID,actionTime,actionIP,info,extfield0,extfield1) values ('$uid',0,0,'$rechrageAmount','$bfAmount'+'$rechrageAmount',0,1,0,UNIX_TIMESTAMP(),'0','aypay','$id','$BillNo')";
            $i_c_l_result = mysql_query($i_c_l); //插入用户余额更新记录
            $u_m_r        = "update xy_member_recharge set rechargeTime=UNIX_TIMESTAMP(),rechargeAmount='$rechrageAmount',coin='$bfAmount',state='2',info='aypay' where rechargeid='$BillNo'";
            $u_m_r_result = mysql_query($u_m_r); //更新用户帐变记录 
            $u_o          = "update xy_members set coin = coin+'$rechrageAmount' where uid =$uid";
            $u_o_result   = mysql_query($u_o); //更新用户表余额
            
        }
        mysql_close($conn); //关闭数据库
        
        
    }
}






?>
