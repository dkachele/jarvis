<?php

// if login process it
if (!empty($_POST)
	&& !empty($_POST['username'])
	&& !empty($_POST['password'])
	&& $_POST['mode'] === 'login'
){
	// process login
	processLogin($_POST['username'], $_POST['password']);

} // end if (!empty($_POST) && $_POST['mode'] === 'login')

// check login status
if (!empty($_COOKIE['token'])
	&& !empty($_COOKIE['secret'])
){
	$_user = validateLogin($_COOKIE['token'], $_COOKIE['secret']);

} // end if (!empty($_COOKIE['token']) && !empty($_COOKIE['secret']))

// process logout
if (!empty($_GET['mode'])
	&& $_GET['mode'] === 'logout'
){
	// end session
	destroyLoginCookies($_user);

} // end if (!empty($_GET['mode']) && $_GET['mode'] === 'logout')

// function to process login
function processLogin($username = '', $password = '')
{
	// globals
	global $db;

	// if either input is false, stop
	if (empty($username)
		|| empty($password)
	){
		return false;

	} // end if (empty($username) || empty($password))

	// get user
	$user = $db->fetch("select * from `employee_info` where `email`='" . $db->escape($username) . "' limit 1;", 'row');

	// if we have a user continue
	if (!empty($user))
	{
		// build and compare passwords
		$nonce = strtolower($user['first_name'].$user['last_name']);

		// generate password hash
		$passwordHash = generatePasswordHash($password, $nonce);

		// compare
		if ($user['password'] === $passwordHash)
		{
			// user is valid
			setLoginCookies($user['id']);

			// reload
			header("Location: /");

		} // end if ($user['password'] === $passwordHash)

	} // end if (!empty($user))

} // end function processLogin($username = '', $password = '')

// make password string
function generatePasswordHash($password = '', $nonce = '')
{
	// validate inputs
	if (empty($password)
		|| empty($nonce)
		|| strlen($nonce) < 3
	){
		return '';

	} // end if (empty($password) || empty($nonce) || strlen($nonce) < 3)

	// find the number of string parts
	$count = floor(strlen($password) / 3);

	// initialize array
	$temp = [];

	// disassemble password
	for ($n=0; $n<4; $n++)
	{
		$temp[] = substr($password, $n*$count, $count);

	} // end for ($n=0; $n<3; $n++)

	// reassemble
	return @md5(md5($temp[0]).md5($nonce[0]).md5($temp[1]).md5($nonce[1]).md5($temp[2]).md5($nonce[2]).md5($temp[3]).md5($nonce[3]).md5('&K#D&GV%A#G*&##N)1S6^&H'));

} // end function generatePasswordHash($password = '', $nonce = '')

// set login cookies
function setLoginCookies($id = 0)
{
	// globals
	global $db;

	// validate input
	if (empty($id))
		return false;

	// generate token
	$token = generatePasswordHash(rand(100, 100000000).date('YMD'), rand(100, 100000000));
	$secret = generatePasswordHash(rand(100, 100000000).date('YMD'), rand(100, 100000000));

	// update the db
	$db->update(
		'employee_info',
		[
			'token' => $token,
			'secret' => $secret
		],
		[
			'id' => $id
		]
	);

	// set cookies
	setcookie('token', $token, time()+3600, '/');
	setcookie('secret', $secret, time()+3600, '/');

} // end function setLoginCookies($id)

// function to validate current login
function validateLogin($token = '', $secret = '')
{
	// globals
	global $db;

	// valiate input
	if (empty($token)
		|| empty($secret)
	){
		return false;

	} // end if (empty($token) || empty($secret))

	// check for entry
	$user = $db->fetch("select `id` from `employee_info` where `token`='" . $db->escape($token) . "' and `secret`='" . $db->escape($secret) . "'", 'one');

	// if we found a user update cookies
	if (!empty($user))
	{
		// update login
		setLoginCookies($user);

		// return user id
		return intval($user);

	} // end if (!empty($user))

	// if we didn't destroy session
	else
	{
		// update login
		destroyLoginCookies();

		// return user id
		return false;

	} // end else

} // end function validateLogin($token, $secret)

// function to destroy login
function destroyLoginCookies($id = 0)
{
	// global
	global $db;

	// set cookies
	setcookie('token', '', time()-3600, '/');
	setcookie('secret', '', time()-3600, '/');

	// if we have an id update it
	if (!empty($id))
		$db->update('employee_info', ['token' => '', 'secret' => ''], ['id' => intval($id)]);

	// reload
	header("Location: /");

} // end function destroyLoginCookies($id = 0)
