<?php
//echo $this->userType;
$para = $_GET;

if ($para['state'] == 5) {
    $whereStr = ' and b.isDelete=1 ';
} else {
    $whereStr = ' and  b.isDelete=0 ';
}
// 彩种限制
if ($para['type'] = intval($para['type'])) {
    $whereStr .= " and b.type={$para['type']}";
}

// 时间限制
if ($para['fromTime'] && $para['toTime']) {
    $whereStr .= ' and b.actionTime between ' . strtotime($para['fromTime']) . ' and ' . strtotime($para['toTime']);
} elseif ($para['fromTime']) {
    $whereStr .= ' and b.actionTime>=' . strtotime($para['fromTime']);
} elseif ($para['toTime']) {
    $whereStr .= ' and b.actionTime<' . strtotime($para['toTime']);
} else {
    if ($GLOBALS['fromTime'] && $GLOBALS['toTime']) {
        $whereStr .= ' and b.actionTime between ' . $GLOBALS['fromTime'] . ' and ' . $GLOBALS['toTime'] . ' ';
    }
}

// 投注状态限制
if ($para['state']) {
    switch ($para['state']) {
        case 1:
            // 已派奖
            $whereStr .= ' and b.zjCount>0';
            break;
        case 2:
            // 未中奖
            $whereStr .= " and b.zjCount=0 and b.lotteryNo!='' and b.isDelete=0";
            break;
        case 3:
            // 未开奖
            $whereStr .= " and b.lotteryNo=''";
            break;
        case 4:
            // 追号
            $whereStr .= ' and b.zhuiHao=1';
            break;
        case 5:
            // 撤单
            $whereStr .= ' and b.isDelete=1';
            break;
    }
}

// 模式限制
if ($para['mode'] = floatval($para['mode']))
    $whereStr .= " and b.mode={$para['mode']}";

//单号
if ($para['betId'] && $para['betId'] != '输入单号') {
    $para['betId'] = wjStrFilter($para['betId']);
    if (!ctype_alnum($para['betId']))
        throw new Exception('单号包含非法字符,请重新输入');
    $whereStr .= " and b.wjorderId='{$para['betId']}'";
}


// 用户名限制
if ($para['username'] && $para['username'] != '用户名') {
    $para['username'] = wjStrFilter($para['username']);
    if (!ctype_alnum($para['username']))
        throw new Exception('用户名包含非法字符,请重新输入');
    $whereStr .= " and u.username like '%{$para['username']}%' and concat(',',u.parents,',') like '%,{$this->user['uid']},%'";
}
switch ($para['utype']) {
    case 1:
        //我自己
        $whereStr .= " and b.uid={$this->user['uid']}";
        break;
    case 2:
        //直属下线
        $whereStr .= " and u.parentId={$this->user['uid']}";
        break;
    case 3:
        // 所有下级
        $whereStr .= " and concat(',',u.parents,',') like '%,{$this->user['uid']},%' and u.uid!={$this->user['uid']}";
        break;
    default:
        // 所有人
        $whereStr .= " and concat(',',u.parents,',') like '%,{$this->user['uid']},%'";
        break;
}
$sql = "select b.*, u.username from {$this->prename}bets b, {$this->prename}members u where b.uid=u.uid";
$sql .= $whereStr;
$sql .= ' order by id desc, actionTime desc';

$data   = $this->getPage($sql, $this->page, $this->pageSize);
//print_r($data);
$params = http_build_query($para, '', '&');

$modeName = array(
    '2.000' => '元',
    '0.200' => '角',
    '0.020' => '分',
    '0.002' => '厘'
);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr class="top">
			<td>编号（点击查看详情）</td>
            
		</tr>
	<?php
if ($data['data']) {
    foreach ($data['data'] as $var) {
?>
		<tr style="width"100%">
			<td style="width"100%">
				<a href="/index.php/record/betInfo/<?= $var['id'] ?>" width="100%" title="投注信息" button="关闭:defaultModalCloase" target="modal"><?= $var['wjorderId'] ?></a>
			</td>
            
		</tr>
	<?php
    }
} else {
?>
    <tr><td colspan="12">暂无投注信息</td></tr>
    <?php
}
?>
</table>
<?php
$this->display('inc_page.php', 0, $data['total'], $this->pageSize, "/index.php/{$this->controller}/{$this->action}-{page}/?$params");
?>