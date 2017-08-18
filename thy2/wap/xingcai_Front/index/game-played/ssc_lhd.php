<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<div class="pp" action="lhd" length="1" random="combineRandom">
	<div class="title">选择</div>
        &nbsp;
	<input type="button" value="龙" class="code" />
	<input type="button" value="虎" class="code" />
	<input type="button" value="和" class="code" />

	&nbsp;&nbsp;
	
</div>
<?php $maxPl=$this->getPl($this->type, $this->played); ?>
<script type="text/javascript">
$(function(){
	gameSetPl(<?=json_encode($maxPl)?>);
})
</script>
