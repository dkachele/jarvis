<?php
// print page context
if (!empty($_GET['context']))
{
	echo "<pre>";
	print_r(
		[
			'mode' => $mode,
			'action' => $action,
			'headers' => $headers,
			'results' => $results,
			'_GET' => $_GET,
			'_POST' => $_POST,
			'_COOKIE' => $_COOKIE
		]
	);
	echo "</pre>";

} // end if (!empty($_GET['context']))
