<div class="change_tab" id="groupList">
                    <ul style="width:100%;background: #656565;">
    <?php
$check1 = $this->settings['checkLogin1'];
$check2 = $this->settings['checkLogin2'];
$this->getTypes();
$sql    = "select id, groupName, enable from {$this->prename}played_group where enable=1 and type=? order by sort";
$groups = $this->getObject($sql, 'id', $this->types[$this->type]['type']);
if ($this->groupId && !$groups[$this->groupId])
    unset($this->groupId);
if ($groups)
    foreach ($groups as $key => $group) {
        if (!$this->groupId)
            $this->groupId = $group['id'];
?>
    	<li style="width:25%"><a href="#" tourl="/index.php/index/group_new/<?= $this->type . '/' . $group['id'] ?>" <?= ($this->groupId == $group['id']) ? ' class="active"' : '' ?>     onclick="showx(<?= $group['id'] ?>)" ><?= $group['groupName'] ?></a></li>
	<?php
    }
?>
                    </ul>
                </div>
