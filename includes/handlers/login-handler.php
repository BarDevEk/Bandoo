<?php  

// checking if login button was pressed
	if(isset($_POST['loginButton'])) {

		$loginUsername = $_POST['loginUsername'];
		$loginPassword = $_POST['loginPassword'];

		$registrationSucc = $account->login($loginUsername, $loginPassword);

		if($registrationSucc){

			$_SESSION['LoggedIn'] = $loginUsername;
			header("Location: index.php");
			exit();
		}

	}

?>