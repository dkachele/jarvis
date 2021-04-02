<?php

// if we have global vars process them
if (!empty($global_vars))
{
	// loop
	foreach ($global_vars as $global_var => $default)
	{
		// process it
		$$global_var = ((isset($_GET[$global_var]) && !empty($_GET[$global_var])) ? $_GET[$global_var] : ((isset($_POST[$global_var]) && !empty($_POST[$global_var])) ? $_POST[$global_var] : $default));
		unset($_GET[$global_var]);
		unset($_POST[$global_var]);

	} // end foreach ($global_vars as $global_var)

} // end if (!empty($global_vars))

// get dropdown vars
if (!empty($nav_elements))
	foreach ($nav_elements as $nav_element)
		$$nav_element = $db->fetch("select * from `" . $nav_element . "` where `active`='Y';");
