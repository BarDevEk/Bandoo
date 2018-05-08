<?php 

function sanitizeRegisterUsername ($inputString){

// strip the username from all the html elements
		$inputString = strip_tags($inputString);
// delete white spaces
		$inputString = str_replace(" ", "", $inputString);
		return $inputString;
}

function sanitizeForm ($inputString){

		$inputString = strip_tags($inputString);
		$inputString = str_replace(" ", "", $inputString);
// make the every character lowercase and first character uppercase
		$inputString = ucfirst(strtolower($inputString));
		return $inputString;
}

function sanitizeFormPassword ($inputString){

		$inputString = strip_tags($inputString);
		return $inputString;
}

// checking if register button was pressed
	if(isset($_POST['registerButton'])) {
		$registerUsername        = sanitizeRegisterUsername($_POST['registerUsername']);
		$registerFirstname       = sanitizeForm($_POST['registerFirstName']);
		$registerLastname        = sanitizeForm($_POST['registerLastName']);
		$registerEmail           = sanitizeForm($_POST['registerEmail']);
		$registerConfirmEmail    = sanitizeForm($_POST['registerConfirmEmail']);
		$registerPassword        = sanitizeFormPassword($_POST['registerPassword']);
		$registerConfirmPassword = sanitizeFormPassword($_POST['registerConfirmPassword']);

		$registrationSucc=$account->register($registerUsername, $registerFirstname, $registerLastname, $registerEmail, $registerConfirmEmail, $registerPassword, $registerConfirmPassword);

		if($registrationSucc == true){
			$_SESSION['LoggedIn'] = $registerUsername;
			header("Location:index.php");
			exit();
		}

	}

 ?>