<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//START A SESSION
session_start();

// is a user logged in?
if(!isset($_SESSION['username'])){
	$_SESSION = array(); //clears out all data stored in SESSION
	session_destroy();	//destroy the session - cookie that identifies it is destroyed
	header("Location:login.php", true);
}
else {
	echo "<p><a href='content1.php?action=end'>Content 1</a></p>";
		
	//END THE SESSION?
	//echo "Click <a href='login.php?action=end'>here</a> to log out.";
}
?>