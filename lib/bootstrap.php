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

// define global vars
$mode = ((isset($_GET['mode']) && !empty($_GET['mode'])) ? $_GET['mode'] : ((isset($_POST['mode']) && !empty($_POST['mode'])) ? $_POST['mode'] : 'employees'));
$action = ((isset($_GET['action']) && !empty($_GET['action'])) ? $_GET['action'] : ((isset($_POST['action']) && !empty($_POST['action'])) ? $_POST['action'] : 'view'));
unset($_GET['mode']);
unset($_GET['action']);
unset($_POST['mode']);
unset($_POST['action']);

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
	$db->query("delete from `" . $mode . "` where `id` = " . intval($_GET['id']));

	// header
	header("Location: /?mode=" . $mode);
	exit();

} // end if (!empty($_POST) && $action == 'add')

// get the results
$sql = "select * from `" . $mode . "`";

// initialize where array
$where = [];

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
		){
			// unset header
			unset($headers[$k]);

		}

	} // end foreach ($headers as $k => $v)

} // end if (!empty($results))
