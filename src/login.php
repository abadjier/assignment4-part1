<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

if(isset($_GET['action']) && $_GET['action'] == 'end'){
	session_start();
	$_SESSION = array(); //clears out all data stored in SESSION
	session_destroy();	//destroy the session - cookie that identifies it is destroyed
	header("Location:login.php", true);	
	//die();
}
?>
<!DOCTYPE html>
<html  lang="en">
<head>
	<meta charset="UTF-8" />
	<title>PHP login</title>
</head>
<body>

	<form method="post" action="content1.php">
		<label>Username</label>
		<input type="text" name="username" />
		<input type="submit" name="login" value="Login" />
	</form>
	

</body>
</html>