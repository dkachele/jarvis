<div class="table-responsive">
	<table class="table table-striped table-sm">
		<?php if (!empty($headers)) { ?>
			<thead>
				<tr>
					<?php foreach ($headers as $header) { ?>
						<th><?php echo format($header); ?></th>
					<?php } ?>
					<th colspan="2">&nbsp;</th>
				</tr>
			</thead>
		<?php } ?>
		<tbody>
			<?php foreach ($results as $result) { ?>
				<tr>
					<?php foreach ($headers as $header) { ?>
						<td><?php echo format($result[$header], $header); ?></td>
					<?php } ?>
					<td><a href="/?mode=<?php echo $mode; ?>&action=edit&id=<?php echo $result['id']; ?>">edit</a></td>
					<td><a href="/?mode=<?php echo $mode; ?>&action=delete&id=<?php echo $result['id']; ?>">delete</a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
