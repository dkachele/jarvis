<form method="post" action="/index.php">
	<input type="hidden" name="mode" value="<?php echo $mode; ?>" />
	<input type="hidden" name="action" value="<?php echo $action; ?>" />
	<input type="hidden" name="id" value="<?php echo $results[0]['id']; ?>" />
	<input type="hidden" name="proposal_date" value="<?php echo date('Y-m-d'); ?>" />
	<div class="row">
		<div class="col">
			<div class="mb-3">
				<label for="clientid">Client</label>
				<select name="client_id" class="form-select" id="clientid" tabindex="1">
					<option selected>Select...</option>
					<?php foreach ($clients as $k => $v) { ?>
						<option value="<?php echo $v['id']; ?>" <?php if ($results[0]['client_id'] === $v['id']) echo 'selected="selected"'; ?>><?php echo $v['name']; ?></option>
					<?php } ?>
				</select>
			</div>
			<br />
			<div class="mb-3">
				<label for="project_name">Project Name</label>
				<input type="text" name="project_name" value="<?php echo $results[0]['project_name']; ?>" class="form-control" id="project_name" tabindex="2" />
			</div>
			<br />
			<div class="mb-3">
				<label for="project_market">Project Market</label>
				<select name="project_market_id" class="form-select" id="project_market" tabindex="3">
					<option selected>Select...</option>
					<?php foreach ($project_markets as $k => $v) { ?>
						<option value="<?php echo $v['id']; ?>" <?php if (@$results[0]['project_market_id'] === $v['id']) echo 'selected="selected"'; ?>><?php echo $v['project_market']; ?></option>
					<?php } ?>
				</select>
			</div>
			<br />
			<div class="mb-3">
				<label for="contruction_type">Contruction Type</label>
				<select name="construction_type_id" class="form-select" id="contruction_type" tabindex="4">
					<option selected>Select...</option>
					<?php foreach ($construction_types as $k => $v) { ?>
						<option value="<?php echo $v['id']; ?>" <?php if (@$results[0]['construction_type_id'] === $v['id']) echo 'selected="selected"'; ?>><?php echo $v['construction_type']; ?></option>
					<?php } ?>
				</select>
			</div>
			<br />
			<div class="mb-3">
				<label for="hvac_system_type">HVAC Type</label>
				<select name="hvac_system_type_id" class="form-select" id="hvac_system_type" tabindex="5">
					<option selected>Select...</option>
					<?php foreach ($hvac_system_types as $k => $v) { ?>
						<option value="<?php echo $v['id']; ?>" <?php if (@$results[0]['hvac_system_type_id'] === $v['id']) echo 'selected="selected"'; ?>><?php echo $v['hvac_system_type']; ?></option>
					<?php } ?>
				</select>
			</div>
			<br />
			<div class="mb-3">
				<label for="project_manager">Project Manager</label>
				<select name="project_manager" class="form-select" id="project_manager" tabindex="6">
					<option selected>Select...</option>
					<?php foreach ($employees as $k => $v) { if ($v['discipline'] === 'PM') { ?>
						<option value="<?php echo $v['id']; ?>" <?php if (@$results[0]['project_manager_id'] === $v['id']) echo 'selected="selected"'; ?>><?php echo $v['first_name'] . ' ' . $v['last_name']; ?></option>
					<?php } } ?>
				</select>
			</div>
			<br />
			<div class="mb-3">
				<label for="hvac_designer">HVAC Designer</label>
				<select name="hvac_designer" class="form-select" id="hvac_designer" tabindex="7">
					<option selected>Select...</option>
					<?php foreach ($employees as $k => $v) { if ($v['discipline'] === 'HVAC') { ?>
						<option value="<?php echo $v['id']; ?>" <?php if (@$results[0]['hvac_designer_id'] === $v['id']) echo 'selected="selected"'; ?>><?php echo $v['first_name'] . ' ' . $v['last_name']; ?></option>
					<?php } } ?>
				</select>
			</div>
			<br />
			<div class="mb-3">
				<label for="electrical_engineer">Electrical Engineer</label>
				<select name="electrical_engineer" class="form-select" id="electrical_engineer" tabindex="8">
					<option selected>Select...</option>
					<?php foreach ($employees as $k => $v) { if ($v['discipline'] === 'Electrical') { ?>
						<option value="<?php echo $v['id']; ?>" <?php if (@$results[0]['electrical_engineer_id'] === $v['id']) echo 'selected="selected"'; ?>><?php echo $v['first_name'] . ' ' . $v['last_name']; ?></option>
					<?php } } ?>
				</select>
			</div>
			<br />
			<div class="mb-3">
				<label for="plumbing_designer">Plumbing Engineer</label>
				<select name="plumbing_designer" class="form-select" id="plumbing_designer" tabindex="9">
					<option selected>Select...</option>
					<?php foreach ($employees as $k => $v) { if ($v['discipline'] === 'Plumbing') { ?>
						<option value="<?php echo $v['id']; ?>" <?php if (@$results[0]['plumbing_designer_id'] === $v['id']) echo 'selected="selected"'; ?>><?php echo $v['first_name'] . ' ' . $v['last_name']; ?></option>
					<?php } } ?>
				</select>
			</div>
			<br />
			<div class="mb-3">
				<label for="construction_administrator">Construction Administrator</label>
				<select name="construction_administrator" class="form-select" id="construction_administrator" tabindex="10">
					<option selected>Select...</option>
					<?php foreach ($employees as $k => $v) { if ($v['discipline'] === 'CA') { ?>
						<option value="<?php echo $v['id']; ?>" <?php if (@$results[0]['construction_administrator_id'] === $v['id']) echo 'selected="selected"'; ?>><?php echo $v['first_name'] . ' ' . $v['last_name']; ?></option>
					<?php } } ?>
				</select>
			</div>
			<br />
			<div class="mb-3">
				<label for="status_id">Status</label>
				<select name="status_id" class="form-select" id="status_id" tabindex="11">
					<option selected>Select...</option>
					<?php foreach ($statuses as $k => $v) { ?>
						<option value="<?php echo $v['id']; ?>" <?php if (@$results[0]['status_id'] === $v['id']) echo 'selected="selected"'; ?>><?php echo $v['status']; ?></option>
					<?php } ?>
				</select>
			</div>
			<br />
			<div class="mb-3">
				<label for="phase_id">Phase</label>
				<select name="phase_id" class="form-select" id="phase_id" tabindex="12">
					<option selected>Select...</option>
					<?php foreach ($design_phases as $k => $v) { ?>
						<option value="<?php echo $v['id']; ?>" <?php if (@$results[0]['phase_id'] === $v['id']) echo 'selected="selected"'; ?>><?php echo $v['design_phase']; ?></option>
					<?php } ?>
				</select>
			</div>
			<br />
		</div>
		<div class="col">
			<div class="mb-3">
				<label for="kickoff_date">Kickoff Date</label>
				<input type="text" name="kickoff_date" value="<?php echo @$results[0]['kickoff_date']; ?>" class="form-control datepicker" id="kickoff_date" tabindex="13" />
			</div>
			<br />
			<div class="mb-3">
				<label for="sd_date">SD Date</label>
				<input type="text" name="sd_date" value="<?php echo @$results[0]['sd_date']; ?>" class="form-control datepicker" id="sd_date" tabindex="14" />
			</div>
			<br />
			<div class="mb-3">
				<label for="dd_date">DD Date</label>
				<input type="text" name="dd_date" value="<?php echo @$results[0]['dd_date']; ?>" class="form-control datepicker" id="dd_date" tabindex="15" />
			</div>
			<br />
			<div class="mb-3">
				<label for="cd_qaqc_date">Checkset Date</label>
				<input type="text" name="cd_qaqc_date" value="<?php echo @$results[0]['cd_qaqc_date']; ?>" class="form-control datepicker" id="cd_qaqc_date" tabindex="16" />
			</div>
			<br />
			<div class="mb-3">
				<label for="cd_date">CD Date</label>
				<input type="text" name="cd_date" value="<?php echo @$results[0]['cd_date']; ?>" class="form-control datepicker" id="cd_date" tabindex="17" />
			</div>
			<br />
			<div class="mb-3">
				<label for="bidding_date">Bidding Date</label>
				<input type="text" name="bidding_date" value="<?php echo @$results[0]['bidding_date']; ?>" class="form-control datepicker" id="bidding_date" tabindex="18" />
			</div>
			<br />
			<div class="mb-3">
				<label for="completion_date">Completion Date</label>
				<input type="text" name="completion_date" value="<?php echo @$results[0]['completion_date']; ?>" class="form-control datepicker" id="completion_date" tabindex="19" />
			</div>
			<br />
			<div class="mb-3">
				<label for="ca_start_date">CA Start Date</label>
				<input type="text" name="ca_start_date" value="<?php echo @$results[0]['ca_start_date']; ?>" class="form-control datepicker" id="ca_start_date" tabindex="20" />
			</div>
			<br />
			<div class="mb-3">
				<label for="ca_completion_date">CA Completion Date</label>
				<input type="text" name="ca_completion_date" value="<?php echo @$results[0]['ca_completion_date']; ?>" class="form-control datepicker" id="ca_completion_date" tabindex="21" />
			</div>
			<br />
			<div class="mb-3">
				<label for="hvac_constuction_cost">HVAC Constuction Cost</label>
				<input type="currency" name="hvac_constuction_cost" value="<?php echo @$results[0]['hvac_constuction_cost']; ?>" class="form-control" id="hvac_constuction_cost" tabindex="22" />
			</div>
			<br />
			<div class="mb-3">
				<label for="electrical_construction_cost">Electrical Constuction Cost</label>
				<input type="currency" name="electrical_construction_cost" value="<?php echo @$results[0]['electrical_construction_cost']; ?>" class="form-control" id="electrical_construction_cost" tabindex="23" />
			</div>
			<br />
			<div class="mb-3">
				<label for="plumbing_contruction_cost">Plumbing Constuction Cost</label>
				<input type="currency" name="plumbing_contruction_cost" value="<?php echo @$results[0]['plumbing_contruction_cost']; ?>" class="form-control" id="plumbing_contruction_cost" tabindex="24" />
			</div>
			<br />
		</div>
	</div>
	<button class="btn btn-lg btn-primary" type="submit"><?php echo ucwords(strtolower($action)); ?></button>
</form>
