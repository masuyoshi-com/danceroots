<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<label class="label-flash w-100">
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?= '<i class="fa fa-check"></i> ' . $message ?>
	</div>
</label>
