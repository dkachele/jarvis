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

// if mode is proposal
if ($mode === 'proposals')
{
	$_mode = $mode;
	$mode = 'projects';
}

// get the results
$sql = "select * from `" . $mode . "`";

// initialize where array
$where = [
	"`" . $mode . "`.`active` = 'Y'"
];

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
	{
		// if a sensitive header unset it
		if ($v === 'token'
			|| $v === 'secret'
			|| $v === 'id'
			|| $v === 'active'
		){
			// unset header
			unset($headers[$k]);

		}

	} // end foreach ($headers as $k => $v)

} // end if (!empty($results))

// if we have an original mode go back to it
if (!empty($_mode))
{
	// switcharoo
	$mode = $_mode;
	unset($_mode);

} // end if (!empty($_mode))
