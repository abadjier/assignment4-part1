<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//START A SESSION
session_start();

// Did we come from login page?
if (!isset($_POST['username'])){
	//came from external 
	// is a user logged in?
	if(!isset($_SESSION['username'])){
		$_SESSION = array(); //clears out all data stored in SESSION
		session_destroy();	//destroy the session - cookie that identifies it is destroyed
		header("Location:login.php", true);
	}
	else {
		echo "Hello $_SESSION[username], you have visited this page $_SESSION[visits] times before. \n";
		
		$_SESSION['visits']++;
		
		echo "<p><a href='content2.php?action=end'>Content 2</a></p>";
		
		//END THE SESSION?
		echo "Click <a href='login.php?action=end'>here</a> to log out.";
	}
} else {
	//came from login.php
	
	// do we have a valid username?
	// no, cleanup session, logout, go back to login.php	
	if (($_POST['username']) == "" || ($_POST['username']) == "null") {
		$_SESSION = array(); //clears out all data stored in SESSION
		session_destroy();	//destroy the session - cookie that identifies it is destroyed
		echo "A user name must be entered. Click <a href='login.php'>here</a> to return to the login screen.";
	} else {

		if(!isset($_SESSION['visits']) || $_SESSION['username'] != $_POST['username']){	//initialize a value 
			$_SESSION['visits'] = 0;
		}
		
		// yes - we have a valid user name		
		$_SESSION['username'] = $_POST['username'];			
		
		// print username and visits count. ask to logout		
		echo "Hello $_SESSION[username], you have visited this page $_SESSION[visits] times before. \n";
		
		$_SESSION['visits']++;
		
		echo "<p><a href='content2.php?action=end'>Content 2</a></p>";
		
		//END THE SESSION
		echo "Click <a href='login.php?action=end'>here</a> to log out.";
	
}
	
}


 	

?>