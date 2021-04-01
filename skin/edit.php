<form method="post" action="/index.php">
	<input type="hidden" name="mode" value="<?php echo $mode; ?>" />
	<input type="hidden" name="action" value="add" />
	<input type="hidden" name="id" value="<?php echo $results[0]['id']; ?>" />
	<?php foreach ($headers as $header) { ?>
		<div class="form-floating">
			<input type="text" name="<?php echo $header; ?>" class="form-control" id="floatingInput" value="<?php echo $results[0][$header]; ?>" />
			<label for="floatingInput"><?php echo format($header); ?></label>
		</div>
		<br />
	<?php } ?>
	<button class="btn btn-lg btn-primary" type="submit">Add</button>
</form>
