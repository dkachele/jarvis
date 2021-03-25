<?php

// include database class
require_once('database.php');

// santize inputs
if (!empty($_POST)) $_POST = $db->escape($_POST);
if (!empty($_GET)) $_GET = $db->escape($_GET);
if (!empty($_COOKIE)) $_COOKIE = $db->escape($_COOKIE);
unset($_REQUEST);
unset($_SERVER);

// include security
require_once('security.php');
