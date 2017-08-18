<?php
if (!$this->types)
    $this->getTypes();
if (!$this->playeds)
    $this->getPlayeds();
$modes  = array(
    '0.002' => '厘',
    '0.020' => '分',
    '0.200' => '角',
    '2.000' => '元'
);

$toTime = strtotime('00:00:00');
$sql="select id,wjorderId,actionNo,actionTime,fpEnable,playedId,type,left(actionData,15) as shows,beiShu,mode,actionNum,lotteryNo,bonus,isDelete,kjTime,zjCount from {$this->prename}bets where  isDelete=0 and uid={$this->user['uid']} and actionTime>{$toTime} order by id desc limit 10";

if ($list = $this->getRows($sql, $actionNo['actionNo'])) {
    foreach ($list as $var) {
?>
	<tr data-code="<?= json_encode($var) ?>">
		<td class="t1"><a href="/index.php/record/betInfo/<?= $var['id'] ?>" title="投注信息" button="关闭:defaultModalCloase" target="modal"><?= $var['wjorderId'] ?></a></td>
		<!--<td class="t2"><?= date('H:i:s', $var['actionTime']) ?></td>-->
		<!--<td class="t3"><?= $this->types[$var['type']]['shortName'] ?></td>-->
		<td class="t4"><?= $this->playeds[$var['playedId']]['name'] ?></td>
		<td class="t5"> <?= $var['actionNo'] ?></li>
		<!--<td class="t6"><?= Object::CsubStr($var['actionData'], 0, 10) ?></td>-->
		<td class="t7"><?= $var['beiShu'] ?>倍</li>
		<td class="t9"><?= $modes[$var['mode']] ?></li>

		<td class="t8"><?= $var['beiShu'] * $var['mode'] * $var['actionNum'] ?></td>
        
		<td class="t10"><?= $this->iff($var['lotteryNo'], number_format($var['bonus'], 2), '0.00') ?></td>

		<td class="t11">
		<?php
				if($var['isDelete']==1){
					echo '<font color="#999999">已撤单</font>';
				}elseif(!$var['lotteryNo']){
					echo '<font color="#009900">未开奖</font>';
				}elseif($var['zjCount']){
					echo '<font color="red">已派奖</font>';
				}else{
					echo '未中奖';
				}
			?>
			</td>

		<td class="t11">

		<?php
        if ($var['lotteryNo'] || $var['isDelete'] == 1 || $var['kjTime'] < $this->time) {
?>
            --
        <?php
        } else {
?>
            <a target="ajax" call="gameFreshOrdered"  onajax="confirmCancel" dataType="json" href="/index.php/game/deleteCode/<?= $var['id'] ?>">撤单</a>
        <?php
        }
?>
        </td>
	</tr>

<?php
    }
} else {
?>
<tr>
<td colspan="12" height="10">今日暂无投注数据</td>
</tr>
<?php
}
?>