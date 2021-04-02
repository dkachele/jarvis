<form method="post" action="/index.php">
	<input type="hidden" name="mode" value="projects" />
	<input type="hidden" name="action" value="add" />
	<input type="hidden" name="employeeid" value="<?php echo $_user; ?>" />
	<div class="mb-3">
		<label for="clientid">Client</label>
		<select name="clientid" class="form-select" id="clientid">
			<option selected>Select...</option>
			<?php foreach ($clients as $k => $v) { ?>
				<option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
			<?php } ?>
		</select>
	</div>
	<br />
	<div class="mb-3">
		<label for="project_name">Project Name</label>
		<input type="text" name="project_name" class="form-control" id="project_name" />
	</div>
	<br />
	<div class="mb-3">
		<label for="project_description">Project Description</label>
		<textarea class="form-control" name="project_description" id="project_description" rows="4"></textarea>
	</div>
	<br />
	<div class="mb-3">
		<label for="scope_of_work">Scope of Work</label>
		<textarea class="form-control" name="scope_of_work" id="scope_of_work" rows="4"></textarea>
	</div>
	<br />
	<div class="mb-3">
		<label for="exclusions">Exclusions</label>
		<textarea class="form-control" name="exclusions" id="exclusions" rows="4"></textarea>
	</div>
	<br />
	<div class="row">
		<div class="col">
			<div class="mb-3">
				<label for="total_fee">Total Fee</label>
				<input type="text" name="total_fee" id="total_fee" class="form-control" />
			</div>
			<br />
			<div class="mb-3">
				<label for="study_fee">Study Fee</label>
				<input type="text" name="study_fee" id="study_fee" class="form-control" />
			</div>
			<br />
			<div class="mb-3">
				<label for="dd_fee">DD Fee</label>
				<input type="text" name="dd_fee" id="dd_fee" class="form-control" />
			</div>
			<br />
			<div class="mb-3">
				<label for="bidding_fee">Bidding Fee</label>
				<input type="text" name="bidding_fee" id="bidding_fee" class="form-control" />
			</div>
			<br />
			<div class="mb-3">
				<label for="closeout_fee">Closeout Fee</label>
				<input type="text" name="closeout_fee" id="closeout_fee" class="form-control" />
			</div>
			<br />
			<div class="mb-3">
				<label for="electrical_fee_percentage">Elecrical Fee %</label>
				<input type="text" name="electrical_fee_percentage" id="electrical_fee_percentage" class="form-control" />
			</div>
			<br />
		</div>
		<div class="col">
			<div class="mb-3">
				<label for="square_footage">Square Footage</label>
				<input type="text" name="square_footage" id="square_footage" class="form-control" />
			</div>
			<br />
			<div class="mb-3">
				<label for="sd_fee">SD Fee</label>
				<input type="text" name="sd_fee" id="sd_fee" class="form-control" />
			</div>
			<br />
			<div class="mb-3">
				<label for="cd_fee">CD Fee</label>
				<input type="text" name="cd_fee" id="cd_fee" class="form-control" />
			</div>
			<br />
			<div class="mb-3">
				<label for="ca_fee">CA Fee</label>
				<input type="text" name="ca_fee" id="ca_fee" class="form-control" />
			</div>
			<br />
			<div class="mb-3">
				<label for="hvac_fee_percentage">HVAC Fee %</label>
				<input type="text" name="hvac_fee_percentage" id="hvac_fee_percentage" class="form-control" />
			</div>
			<br />
			<div class="mb-3">
				<label for="plumbing_fee_percentage">Plumbing Fee %</label>
				<input type="text" name="plumbing_fee_percentage" id="plumbing_fee_percentage" class="form-control" />
			</div>
			<br />
		</div>
	</div>
	<button class="btn btn-lg btn-primary" type="submit">Add</button>
</form>
