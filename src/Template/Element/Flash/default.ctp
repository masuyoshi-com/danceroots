<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<label class="label-flash w-100">
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?= $message ?>
	</div>
</label>
