<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			
	//source:http://php.net/manual/en/function.empty.php
	if (empty($_GET)) {
		$output = array('Type' => '[GET]', 'parameters' => "null");		
	}
	else {
		$output = array('Type' => '[GET]', 'parameters' => $_GET);
	}		

	echo json_encode($output);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (empty($_POST)) {
		$output = array('Type' => '[POST]', 'parameters' => "null");		
	}
	else {
		$output = array('Type' => '[POST]', 'parameters' => $_POST);
	}		

	echo json_encode($output);
}
?>