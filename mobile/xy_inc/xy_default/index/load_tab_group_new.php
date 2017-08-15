                    <div class="tz_xz">
<?php
$sql       = "select groupName from {$this->prename}played_group where id=?";
$groupName = $this->getValue($sql, $this->groupId);

$sql     = "select id, name, playedTpl, enable  from {$this->prename}played where enable=1 and groupId=? order by sort";
$playeds = $this->getRows($sql, $this->groupId);
if (!$playeds) {
    echo '<td colspan="7" align="center">暂无玩法</td>';
    return;
}
if (!$this->played)
    $this->played = $playeds[0]['id'];
?>
	<?php
if ($playeds)
    foreach ($playeds as $played) {
        if ($this->played == $played['id'])
            $tpl = $played['playedTpl'];
        if ($played['enable']) {
?>
	<a data_id="<?= $played['id'] ?>" href="#" tourl="/index.php/index/played_new/<?= $this->type ?>/<?= $played['id'] ?>" <?= ($played['id'] == $this->played) ? ' class="tag"' : '' ?> style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?= $played['name'] ?></a>
	<?php
        }
    }
?>
                    </div>
                    <style>
					.game_eg {position: absolute;z-index: 9999;text-align: left;width: 260px;padding: 10px;background: #3a90b2;line-height: 20px;color: #FFFFFF;color: #fff;border-radius: 8px;}
					</style>
                    <div class="tz_info" id="game-helptips">
<?php
$sql     = "select simpleInfo, info, example  from {$this->prename}played where id=?";
$playeds = $this->getRows($sql, $this->played);
?>
                        <p class="wjhelps">玩法说明：<?= $playeds[0]["simpleInfo"] ?><a href="#"><em action="lt_example" class="ico_sl showeg"></em></a><a href="#"><i action="lt_help" class="ico_ques showeg"></i></a></p>
                        <div class="line2"></div>
                    </div>
                    <div class="ball_list">
<div class="num-table" id="num-select">
<?php
if (!$played['enable']) {
    $this->display('index/game-played/un-open.php');
    return;
}
$this->display("index/game-played/$tpl.php");
?>
</div>
                    </div>