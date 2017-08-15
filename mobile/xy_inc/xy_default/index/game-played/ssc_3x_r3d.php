<input type="hidden" name="playedGroup" value="<?= $this->groupId ?>" />
<input type="hidden" name="playedId" value="<?= $this->played ?>" />
<input type="hidden" name="type" value="<?= $this->type ?>" />
<div class="pp" action="tzSscWeiInput" length="3" random="sscRandom" style="width:100%">
	<div id="wei-shu" length="3" type="2x_r3d_zuhetouzhu" style="width:100%">
		<label><input type="checkbox" value="16"  style="width:10%"/>万</label>
		<label><input type="checkbox" value="8" style="width:10%" />千</label>
		<label><input type="checkbox" value="4"  style="width:10%"/>百</label>
		<label><input type="checkbox" value="2"  style="width:10%"/>十</label>
		<label><input type="checkbox" value="1"  style="width:10%"/>个</label>
        
        <span style="border:#CCC 1px solid; width:30%; " onclick="$('#wei-shu :checkbox').attr('checked', true);">一键全选</span>
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
