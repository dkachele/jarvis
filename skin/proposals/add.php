<form method="post" action="/index.php">
	<input type="hidden" name="mode" value="projects" />
	<input type="hidden" name="action" value="add" />
	<input type="hidden" name="status_id" value="3" />
	<input type="hidden" name="employee_id" value="<?php echo $_user; ?>" />
	<div class="row">
		<div class="col">
			<div class="mb-3">
				<label for="clientid">Client</label>
				<select name="client_id" class="form-select" id="clientid">
					<option selected>Select...</option>
					<?php foreach ($clients as $k => $v) { ?>
						<option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
					<?php } ?>
				</select>
			</div>
			<br />
		</div>
		<div class="col">
			<div class="mb-3">
				<label for="project_name">Project Name</label>
				<input type="text" name="project_name" class="form-control" id="project_name" tabindex="1" />
			</div>
			<br />
		</div>
	</div>
	<div class="mb-3">
		<label for="project_description">Project Description</label>
		<textarea class="form-control" name="project_description" id="project_description" rows="4" tabindex="2"></textarea>
	</div>
	<br />
	<div class="mb-3">
		<label for="scope_of_work">Scope of Work</label>
		<textarea class="form-control" name="scope_of_work" id="scope_of_work" rows="4" tabindex="3"></textarea>
	</div>
	<br />
	<div class="mb-3">
		<label for="exclusions">Exclusions</label>
		<select name="exclusions" class="form-select" id="exclusions" multiple size="<?php echo ((count($exclusions) > 8) ? 8 : count($exclusions)); ?>">
			<?php foreach ($exclusions as $k => $v) { ?>
				<option value="<?php echo $v['id']; ?>"><?php echo $v['exclusion']; ?></option>
			<?php } ?>
		</select>
	</div>
	<br />
	<div class="mb-3">
		<label for="square_footage">Square Footage</label>
		<input type="number" name="square_footage" id="square_footage" class="form-control" tabindex="5" />
	</div>
	<br />
	<div class="row">
		<div class="col">
			<div class="mb-3">
				<label for="study_fee">Study Fee</label>
				<input type="currency" name="study_fee" id="study_fee" class="form-control" tabindex="6" />
			</div>
			<br />
			<div class="mb-3">
				<label for="dd_fee">DD Fee</label>
				<input type="currency" name="dd_fee" id="dd_fee" class="form-control" tabindex="8" />
			</div>
			<br />
			<div class="mb-3">
				<label for="bidding_fee">Bidding Fee</label>
				<input type="currency" name="bidding_fee" id="bidding_fee" class="form-control" tabindex="10" />
			</div>
			<br />
			<div class="mb-3">
				<label for="closeout_fee">Closeout Fee</label>
				<input type="currency" name="closeout_fee" id="closeout_fee" class="form-control" tabindex="12" />
			</div>
			<br />
			<div class="mb-3">
				<label for="electrical_fee_percentage">Elecrical Fee %</label>
				<input type="number" name="electrical_fee_percentage" id="electrical_fee_percentage" class="form-control" tabindex="14" />
			</div>
			<br />
		</div>
		<div class="col">
			<div class="mb-3">
				<label for="sd_fee">SD Fee</label>
				<input type="currency" name="sd_fee" id="sd_fee" class="form-control" tabindex="7" />
			</div>
			<br />
			<div class="mb-3">
				<label for="cd_fee">CD Fee</label>
				<input type="currency" name="cd_fee" id="cd_fee" class="form-control" tabindex="9" />
			</div>
			<br />
			<div class="mb-3">
				<label for="ca_fee">CA Fee</label>
				<input type="currency" name="ca_fee" id="ca_fee" class="form-control" tabindex="11" />
			</div>
			<br />
			<div class="mb-3">
				<label for="hvac_fee_percentage">HVAC Fee %</label>
				<input type="number" name="hvac_fee_percentage" id="hvac_fee_percentage" class="form-control" tabindex="13" />
			</div>
			<br />
			<div class="mb-3">
				<label for="plumbing_fee_percentage">Plumbing Fee %</label>
				<input type="number" name="plumbing_fee_percentage" id="plumbing_fee_percentage" class="form-control" tabindex="15" />
			</div>
			<br />
		</div>
	</div>
	<button class="btn btn-lg btn-primary" type="submit" tabindex="16">Add</button>
</form>
