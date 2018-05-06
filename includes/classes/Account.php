<?php 
	class Account {

		private $errorArr;

		public function __construct(){
			$this->errorArr = array();
		}

		public function register ($un,$fn,$ln,$em1, $em2, $pass1, $pass2){

			$this->validateUserName($un);
			$this->validateFirstName($fn);
			$this->validateLastName($ln);
			$this->validateEmails($em1, $em2);
			$this->validatePasswords($pass1, $pass2);

// checking if there are any errors
			if(empty($this->errorArr)){
// insert into databse
				return true;
			}else{
				return false;
			}
		}
		
		public function getError($error){
// checking if given parameter exists in array, $error dont't refere to anything - just placeholder
				(!in_array($error, $this->errorArr))?$error="":"";
				return "<span class= 'errorMessage'>$error</span>";
		}

		private function validateUserName($un){
			
			if(strlen($un) > 25 || strlen($un) < 5){
				array_push($this->errorArr, Constants::$usertNameLength);
				return;
			}

			// CHECK if username exists
		}

		private function validateFirstName($fn){
			
			if(strlen($fn) > 25){
				array_push($this->errorArr, Constants::$firstNameLength);
				return;
			}
		}

		private function validateLastName($ln){

			if(strlen($ln) > 25){
				array_push($this->errorArr, Constants::$lastNameLength);
				return;
			}
			
		}

		private function validateEmails($em1, $em2){
			if($em1 != $em2){
				array_push($this->errorArr, Constants::$emailsNotEqual);
				return;
			}
// checking if email format is ok
			if(!filter_var($em1, FILTER_VALIDATE_EMAIL)){
				array_push($this->errorArr, Constants::$emailInvalid);
				return;
			}

// TODO Check if email wasn't already used
			
		}

		private function validatePasswords($pass1, $pass2){
			if($pass1 != $pass2){
				array_push($this->errorArr, Constants::$passwordsNotEqual);
				return;
			}
//checking if password doesn't contain any invalid character
			if(preg_match('/[^A-Za-z0-9]/', $pass1)){
				array_push($this->errorArr, Constants::$passwordInvalidChar);
				return;
			}

			if(strlen($pass1) > 25 || strlen($pass1) < 6){
				array_push($this->errorArr, Constants::$passwordInvalidLenght);
				return;
			}
		}
		
	} //class Account {
 ?>