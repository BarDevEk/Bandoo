<?php 	

	require_once("includes/config.php");

	// session_destroy();

	if(isset($_SESSION['LoggedIn'])){
		$LoggedIn = $_SESSION['LoggedIn'];
	}
	else{
		header("Location: register.php");
		exit();
	}

 ?>


<html>
<head>
	<meta charset="UTF-8">
	<title>Welcome to Bandoo</title>
</head>
<body>
	Hello World
</body>
</html>