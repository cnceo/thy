<input type="hidden" name="playedGroup" value="<?= $this->groupId ?>" />
<input type="hidden" name="playedId" value="<?= $this->played ?>" />
<input type="hidden" name="type" value="<?= $this->type ?>" />
<div class="pp" action="tzSscWeiInput" length="2" random="sscRandom">
	<div id="wei-shu" length="2" type="2x_r2d_zuhetouzhu">
		<label><input type="checkbox" value="16" />万</label>
		<label><input type="checkbox" value="8" />千</label>
		<label><input type="checkbox" value="4" />百</label>
		<label><input type="checkbox" value="2" />十</label>
		<label><input type="checkbox" value="1" />个</label>
        <span style="border:#CCC 1px solid; line-height:200%; margin-left:100px;" onclick="$('#wei-shu :checkbox').attr('checked', true);">一键全选</span>
	</div><br/>
	<textarea id="textarea-code"></textarea>
</div>
<?php
$maxPl = $this->getPl($this->type, $this->played);
?>
<script type="text/javascript">
$(function(){
	gameSetPl(<?= json_encode($maxPl) ?>);
})
</script>
