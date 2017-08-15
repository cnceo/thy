<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$this->display('inc_skin.php', 0, '会员中心 - 充值记录');
?>
<link rel="stylesheet" type="text/css" href="/skin/js/jquery.datetimepicker.css"/>


<div class="content3 wjcont">
 <div class="title"><span>充值记录</span></div>
 <div class="body">
 <div class="youxi1">
  		<form action="/index.php/cash/rechargeLog" method="get">
  		<h2>
        <input type="text" name="fromTime" value="<?= $this->iff($_REQUEST['fromTime'], $_REQUEST['fromTime'], date('Y-m-d H:i', $GLOBALS['fromTime'])) ?>" id="datetimepicker" class="text7" />至<input type="text" name="toTime" value="<?= $this->iff($_REQUEST['toTime'], $_REQUEST['toTime'], date('Y-m-d H:i', $GLOBALS['toTime'])) ?>" id="datetimepicker4" class="text7" />
        <input type="submit" class="an chazhao" value="查 询">
		</h2>
  </form> 
    <div class="biao-cont">
        <!--下注列表-->
            <table style="width:100%" border="0" cellspacing="0" cellpadding="0">
			<tr class="top" style="width="100%">
     			<td style="width:10%">编号</td>
                <td style="width:10%">充值金额</td>
                <td style="width:10%">实际到账</td>
                <td style="width:10%">充值银行</td>
                <td style="width:10%">状态</td>
                <td style="width:10%">成功时间</td>
                <td style="width:10%">备注</td>
            </tr>
            <?php
$sql = "select a.rechargeId,a.amount,a.rechargeAmount,a.info,a.state,a.actionTime,b.name as bankName from {$this->prename}member_recharge a left join {$this->prename}bank_list b on b.id=a.bankId where a.isDelete=0 and a.uid={$this->user['uid']}";
if ($_GET['fromTime'] && $_GET['endTime']) {
    $fromTime = strtotime($_GET['fromTime']);
    $endTime  = strtotime($_GET['endTime']);
    $sql .= " and a.actionTime between $fromTime and $endTime";
} elseif ($_GET['fromTime']) {
    $sql .= ' and a.actionTime>=' . strtotime($_GET['fromTime']);
} elseif ($_GET['endTime']) {
    $sql .= ' and a.actionTime<' . (strtotime($_GET['endTime']));
} else {
    if ($GLOBALS['fromTime'] && $GLOBALS['toTime'])
        $sql .= ' and a.actionTime between ' . $GLOBALS['fromTime'] . ' and ' . $GLOBALS['toTime'] . ' ';
}
$sql .= ' order by a.id desc';

$pageSize = 10;

$list = $this->getPage($sql, $this->page, $pageSize);
if ($list['data'])
    foreach ($list['data'] as $var) {
?>
            <tr style="width:100%">
                <td style="width:10%"><?= $this->ifs($var['rechargeId'], '管理员充值') ?></td>
                <td style="width:10%"><?= $var['amount'] ?></td>
                <td style="width:10%"><?= $this->iff($var['rechargeAmount'] > 0, $var['rechargeAmount'], '--') ?></td>
                <td style="width:10%"><?= $this->iff($var['bankName'], $var['bankName'], '--') ?></td>
                <td style="width:10%"><?= $this->iff($var['state'], '<span style="color:#FF0000">充值成功</span>', '<span style="color:blue">正在处理</span>') ?></td>
                <td style="width:10%"><?= $this->iff($var['state'], date('m-d H:i:s', $var['actionTime']), '--') ?></td>
                <td style="width:10%"><?= $var['info'] ?></td>
            </tr>
            <?php
    } else {
?>
            <tr>
                <td colspan="7" align="center">没有充值记录</td>
            </tr>
            <?php
}
?>
        </table>
        <?php
$this->display('inc_page.php', 0, $list['total'], $this->pageSize, "/index.php/cash/rechargeLog-{page}?fromTime={$_GET['fromTime']}&endTime={$_GET['endTime']}");
?>
        <!--下注列表 end -->
    </div>
</div>
</div>
<div class="foot"></div>
</div>
<?php
$this->display('inc_footer2.php');
?> 
<style>
body {
background: none !important;
padding:0;
margin:0;
left:0;
top:0;
}
</style>
   