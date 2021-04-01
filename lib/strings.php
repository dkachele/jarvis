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
