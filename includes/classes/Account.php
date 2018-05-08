<?php 
	class Account {

		private $config;
		private $errorArr;

		public function __construct($config){
			$this->errorArr = array();
			$this->config = $config;
		}

		public function login($un, $pass){
			$pass = md5($pass);

			$loginUnQuery = mysqli_query($this->config, "SELECT * FROM users WHERE username='$un' AND password = '$pass'");

			if(mysqli_num_rows($loginUnQuery)==1){
				return true;
			}
			else{
				array_push($this->errorArr,Constants::$loginFailed);
				return false;
			}
		}

		public function register($un,$fn,$ln,$em1, $em2, $pass1, $pass2){

			$this->validateUserName($un);
			$this->validateFirstName($fn);
			$this->validateLastName($ln);
			$this->validateEmails($em1, $em2);
			$this->validatePasswords($pass1, $pass2);

// checking if there are any errors
			if(empty($this->errorArr)){
// insert into databse
				return $this->insertUserDetails($un, $fn, $ln, $em1, $pass1);
			}else{
				return false;
			}
		}
//check if given parameter exists in particular array $error could be anything - it's juasy a placeholder
		public function getError($error) {
			if(!in_array($error, $this->errorArr)){
// if there isn't change a error communicate into nothing
				$error="";
			}
			return "<span class='errorMessage'>$error</span>";
		}
		
		private function insertUserDetails($un, $fn, $ln, $em1, $pass1){
			$encryptedPass = md5($pass1);
			$profilePic = "assets/images/profile-pics/anonimous.jpg";
			$date = date("Y-m-d");

			$result = mysqli_query($this->config, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em1', '$encryptedPass', '$date', '$profilePic')");
// line above returns true / false,
			return $result;

		}

		private function validateUserName($un){
			
			if(strlen($un) > 25 || strlen($un) < 5){
				array_push($this->errorArr,Constants::$usernameCharacters);
				return;
			}

// checking if username wasn't taken

			$lookForUn = mysqli_query($this->config, "SELECT username FROM users WHERE username= '$un'" );
				if(mysqli_num_rows($lookForUn)!=0){
					array_push($this->errorArr,Constants::$usernameTaken);
					return;
				}
		}

		private function validateFirstName($fn){
			
			if(strlen($fn) > 25){
				array_push($this->errorArr,Constants::$firstNameCharacters);
				return;
			}
		}

		private function validateLastName($ln){

			if(strlen($ln) > 25){
				array_push($this->errorArr,Constants::$lastNameCharacters);
				return;
			}
			
		}

		private function validateEmails($em1, $em2){
			if($em1 != $em2){
				array_push($this->errorArr,Constants::$emailsDoNotMatch);
				return;
			}
// checking if email format is ok
			if(!filter_var($em1, FILTER_VALIDATE_EMAIL)){
				array_push($this->errorArr,Constants::$emailInvalid);
				return;
			}

// checking if username wasn't taken

			$lookForEm = mysqli_query($this->config, "SELECT email FROM users WHERE email= '$em1'" );
				if(mysqli_num_rows($lookForEm)!=0){
					array_push($this->errorArr,Constants::$emailTaken);
					return;
				}
		}

		private function validatePasswords($pass1, $pass2){
			if($pass1 != $pass2){
				array_push($this->errorArr,Constants::$passwordsDoNotMatch);
				return;
			}
//checking if password doesn't contain any invalid character
			if(preg_match('/[^A-Za-z0-9]/', $pass1)){
				array_push($this->errorArr,Constants::$passwordNotAlphanumeric);
				return;
			}

			if(strlen($pass1)>25 || strlen($pass1)<6){
				array_push($this->errorArr,Constants::$PasswordCharacters);
				return;
			}
		}
		
	} //class Account
 ?>