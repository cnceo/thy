<input type="hidden" name="playedGroup" value="<?= $this->groupId ?>" />
<input type="hidden" name="playedId" value="<?= $this->played ?>" />
<input type="hidden" name="type" value="<?= $this->type ?>" />
<div class="pp pp11" action="tz11x5Select" length="1"  style="width:100%">
	<div class="title"style="width:100%"><div style="float:left">猜中位</div></div>
       
	<input type="button" value="03"   style="width:10%" class="code min d" />
	<input type="button" value="04"    style="width:10%"class="code min s" />
	<input type="button" value="05"    style="width:10%"class="code max d" />
	<input type="button" value="06"    style="width:10%" class="code max s" />
	<input type="button" value="07"    style="width:10%" class="code max d" />
	<input type="button" value="08"    style="width:10%" class="code max s" />
	<input type="button" value="09"    style="width:10%" class="code max d" />


	<div style="width:30%;">	.</div>
	<input type="button" value="清" class="action none" />
    <input type="button" value="双" class="action even" />
    <input type="button" value="单" class="action odd" />
    <input type="button" value="小" class="action small" />
    <input type="button" value="大" class="action large" />
    <input type="button" value="全" class="action all" />

</div>
<?php
$maxPl = $this->getPl($this->type, $this->played);
?>
<script type="text/javascript">
$(function(){
	gameSetPl(<?= json_encode($maxPl) ?>);
})
</script>