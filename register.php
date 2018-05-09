<?php 
	require_once("includes/config.php");
	require_once("includes/classes/Account.php");
	require_once("includes/classes/Constants.php");

	$account = new Account($config);

	require_once("includes/handlers/register-handler.php");
	require_once("includes/handlers/login-handler.php");

	function getInputValue($name){
		if(isset($_POST[$name])){
			echo $_POST[$name];
		}
	}

 ?>


<html>
<head>
	<meta charset="UTF-8">
	<title>Bandoo | Register for free !</title>
	<link rel="stylesheet" href="assets/css/reg.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900&amp;subset=latin-ext" rel="stylesheet">
</head>
<body>
	<div id="container">
	<div id="inuputsContainer">
		<div id="loginContainer">
					<form action="register.php" id="loginForm" method="POST">
							<h2>Login to Bandoo</h2>
							<p>

								<?php echo $account->getError(Constants::$loginFailed); ?>
								<label for="loginUsername">Username:</label>
								<input type="text" id="loginUsername" name="loginUsername" required>
							</p>
							<p>
								<label for="loginPassword">Password:</label>
								<input type="password" id="loginPassword" name="loginPassword" required>
							</p>
							<button type="submit" name="loginButton">LOG IN</button>
						
					</form>
		</div>	<!-- <div id="loginContainer"> -->	
		<div id="registerContainer">
					<form action="register.php" id="registerForm" method="POST">
						<h2>Register for free</h2> 
						<h4>and start the Bandoo</h4> 
						<p>
							<?php echo $account->getError(Constants::$usernameCharacters); ?>
							<?php echo $account->getError(Constants::$usernameTaken); ?>
							<label for="registerUsername">Username:</label>
							<input type="text" id="registerUsername" name="registerUsername" value="<?php getInputValue('registerUsername');?>" required>
						</p>
						<p>
							<?php echo $account->getError(Constants::$firstNameCharacters); ?>
							<label for="registerFirstName">First Name:</label>
							<input type="text" id="registerFirstName" name="registerFirstName" value="<?php getInputValue('registerFirstName');?>" required>
						</p>
						<p>
							<?php echo $account->getError(Constants::$lastNameCharacters); ?>
							<label for="registerLastName">Last Name:</label>
							<input type="text" id="registerLastName" name="registerLastName" value="<?php getInputValue('registerLastName');?>" required>
						</p>
						<p>
							<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
							<?php echo $account->getError(Constants::$emailInvalid); ?>
							<?php echo $account->getError(Constants::$emailTaken); ?>
							<label for="registerEmail">Email:</label>
							<input type="text" id="registerEmail" name="registerEmail" value="<?php getInputValue('registerEmail');?>" required>
						</p>
						<p>
							<label for="registerConfirmEmail">Confirm Email:</label>
							<input type="text" id="registerConfirmEmail" name="registerConfirmEmail"  value="<?php getInputValue('registerConfirmEmail');?>" required>
						</p>
						<p>
							<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
							<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
							<?php echo $account->getError(Constants::$PasswordCharacters); ?>
							<label for="registerPassword">Password:</label>
							<input type="password" id="registerPassword" name="registerPassword" required>
						</p>
						<p>
							
							<label for="registerConfirmPassword">Confirm Password:</label>
							<input type="password" id="registerConfirmPassword" name="registerConfirmPassword" required>
						</p>
						<button type="submit" name="registerButton">SIGN UP</button>
					</form>
				</div>	<!-- <div id="registerContainer"> -->
			</div>	<!-- <div id="inuputsContainer"> -->
		</div> <!-- <div id="container"> -->
</body>
</html>