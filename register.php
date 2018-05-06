<?php 

	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account();

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

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
</head>
<body>
	<div id="inputContainer">
		<form action="register.php" id="loginForm" method="POST">
			<h2>Login to Bandoo</h2>
			<p>
				<label for="loginUsername">Username:</label>
				<input type="text" id="loginUsername" name="loginUsername" required>
			</p>
			<p>
				<label for="loginPassword">Password:</label>
				<input type="password" id="loginPassword" name="loginPassword" required>
			</p>
			<button type="submit" name="loginButton">LOG IN</button>
		</form>

		<form action="register.php" id="registerForm" method="POST">
			<h2>Register for free and start the Bandoo</h2>
			<p>
				<?php echo $account->getError(Constants::$usernameCharacters); ?>
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

	</div>
</body>
</html>