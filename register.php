<?php 

	require_once("includes/classes/Account.php");
	require_once("includes/classes/Constants.php");

	$account = new Account();

	require_once("includes/handlers/register-handler.php");
	require_once("includes/handlers/login-handler.php");

// function that remembers inserted data after error validation
	function rememberInput($x) {
		if(isset($_POST[$x])) {
			echo $_POST[$x];

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
				<?php echo $account->getError(Constants::$usertNameLength); ?>
				<label for="registerUsername">Username:</label>
				<input type="text" id="registerUsername" name="registerUsername" value=" <?php rememberInput('registerUsername') ?>" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$firstNameLength); ?>
				<label for="registerFirstName">First Name:</label>
				<input type="text" id="registerFirstName" name="registerFirstName" value=" <?php rememberInput('registerFirstName') ?>" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$lastNameLength); ?>
				<label for="registerLastName">Last Name:</label>
				<input type="text" id="registerLastName" name="registerLastName" value=" <?php rememberInput('registerLastName') ?>" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$emailsNotEqual); ?>
				<?php echo $account->getError(Constants::$emailInvalid); ?>
				<label for="registerEmail">Email:</label>
				<input type="text" id="registerEmail" name="registerEmail" value=" <?php rememberInput('registerEmail') ?>" required>
			</p>
			<p>
				<label for="registerConfirmEmail">Confirm Email:</label>
				<input type="text" id="registerConfirmEmail" name="registerConfirmEmail" value=" <?php rememberInput('registerConfirmEmail') ?>" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$passwordsNotEqual); ?>
				<?php echo $account->getError(Constants::$passwordInvalidChar); ?>
				<?php echo $account->getError(Constants::$passwordInvalidLenght); ?>
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