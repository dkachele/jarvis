<?php

// include config
require_once('../lib/config.php');

// include string functions
require_once('../lib/strings.php');

// include database class
require_once('../lib/database.php');

// santize inputs
if (!empty($_POST)) $_POST = $db->escape($_POST);
if (!empty($_GET)) $_GET = $db->escape($_GET);
if (!empty($_COOKIE)) $_COOKIE = $db->escape($_COOKIE);
unset($_REQUEST);
unset($_SERVER);

// include security
require_once('../lib/security.php');

// include vars
require_once('../lib/vars.php');

// process adds and edits
if (!empty($_POST)
	&& ($action == 'add'
		|| $action == 'edit'
	)
){
	// insert new record
	$db->insert(
		$mode,
		$_POST,
		'update'
	);

	// header
	header("Location: /?mode=" . $mode);
	exit();

} // end if (!empty($_POST) && $action == 'add')

// process deletes
if (!empty($_GET)
	&& !empty($_GET['id'])
	&& $action == 'delete'
){
	// remove record
	$db->update(
		$mode,
		[
			'active' => 'N'
		],
		[
			'id' => intval($_GET['id'])
		]
	);

	// header
	header("Location: /?mode=" . $mode);
	exit();

} // end if (!empty($_POST) && $action == 'add')

// initialize where array
$where = [];

// if mode is proposal
if ($mode === 'proposals')
{
	$_mode = $mode;
	$mode = 'projects';
	$where[] = "`" . $mode . "`.`status_id` = 3";
}

// get the results
$sql = "select * from `" . $mode . "`";

// add is active to where statement
$where[] = "`" . $mode . "`.`active` = 'Y'";

// add id sql
if (isset($_GET['id']))
	$where[] = "`" . $mode . "`.`id` = " . intval($_GET['id']);

// if we have where add to sql
if (!empty($where))
	$sql .= " where " . implode(" and ", $where);

// run query
$results = $db->fetch($sql);

// if we have result process headers
if (!empty($results))
{
	// build headers
	$headers = array_keys($results[0]);

	// loop
	foreach ($headers as $k => $v)
		if (in_array($v, $suppress_headers))
			unset($headers[$k]);

} // end if (!empty($results))

// if mode is projects remap vars
if ($mode === 'projects'
	&& !empty($results)
){
	// loop
	foreach ($results as $k => $v)
	{
		// correct project manager
		$results[$k]['project_manager_id'] = $v['project_manager'];
		$results[$k]['project_manager'] = employeeShortName($employees, $v['project_manager']);

		// correct hvac designer
		$results[$k]['hvac_designer_id'] = $v['hvac_designer'];
		$results[$k]['hvac_designer'] = employeeShortName($employees, $v['hvac_designer']);

		// correct electrical engineer
		$results[$k]['electrical_engineer_id'] = $v['electrical_engineer'];
		$results[$k]['electrical_engineer'] = employeeShortName($employees, $v['electrical_engineer']);

		// correct plumbing designer
		$results[$k]['plumbing_designer_id'] = $v['plumbing_designer'];
		$results[$k]['plumbing_designer'] = employeeShortName($employees, $v['plumbing_designer']);

		// correct construction admin
		$results[$k]['construction_administrator_id'] = $v['construction_administrator'];
		$results[$k]['construction_administrator'] = employeeShortName($employees, $v['construction_administrator']);

		// correct project market
		$headers[] = 'phase';
		$results[$k]['phase'] = $design_phases[$v['phase_id']]['design_phase'];

		// correct project market
		$headers[] = 'project_market';
		$results[$k]['project_market'] = $project_markets[$v['project_market_id']]['project_market'];

		// correct construction type
		$headers[] = 'construction_type';
		$results[$k]['construction_type'] = $construction_types[$v['construction_type_id']]['construction_type'];

		// correct hvac system type
		$headers[] = 'hvac_system_type';
		$results[$k]['hvac_system_type'] = $hvac_system_types[$v['hvac_system_type_id']]['hvac_system_type'];

		// correct status
		array_unshift($headers , 'status');
		$results[$k]['status'] = $statuses[$v['status_id']]['status'];

		// correct client name
		array_unshift($headers , 'client');
		$results[$k]['client'] = $clients[$v['client_id']]['name'];

		// correct employee name
		array_unshift($headers , 'employee');
		$results[$k]['employee'] = employeeShortName($employees, $v['employee_id']);

		// unset empty values
		foreach ($v as $_k => $_v)
		{
			// if empty or invalid date
			if (empty($_v)
				|| $_v === '1000-01-01'
			){
				// unset vars
				unset($results[$k][$_k]);

			} // end if (empty($_v) || $_v === '1000-01-01')

		} // end foreach ($v as $_k => $_v)

	} // end foreach ($results as $k => $v)

} // end if ($mode === 'projects')

// simplify
$headers = array_unique($headers);

// if we have an original mode go back to it
if (!empty($_mode))
{
	// switcharoo
	$mode = $_mode;
	unset($_mode);

} // end if (!empty($_mode))
