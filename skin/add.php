<form method="post" action="/index.php">
	<input type="hidden" name="mode" value="<?php echo $mode; ?>" />
	<input type="hidden" name="action" value="<?php echo $action; ?>" />
	<?php foreach ($headers as $header) { ?>
		<div class="form-floating">
			<input type="text" name="<?php echo $header; ?>" class="form-control" id="floatingInput" />
			<label for="floatingInput"><?php echo format($header); ?></label>
		</div>
		<br />
	<?php } ?>
	<button class="btn btn-lg btn-primary" type="submit"><?php echo ucwords(strtolower($action)); ?></button>
</form>
