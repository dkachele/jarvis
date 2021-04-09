<?php

// format strings for pretty output
function format($str, $type = '')
{
	if ($type === 'password')
		return '*******';
	elseif ($type === 'email')
		return $str;
	else
		return ucwords(str_replace("_", " ", $str));

} // end function format($str)

// get employees short name
function employeeShortName($employees, $id)
{
	return $employees[$id]['first_name'] . ' ' . substr($employees[$id]['last_name'], 0, 1) . '.';
}
