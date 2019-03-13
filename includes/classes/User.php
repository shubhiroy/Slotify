<?php
	class User {

		private $con;
		private $userLoggedIn;

		public function __construct($con,$userLoggedIn) {
			$this->con = $con;
			$this->userLoggedIn = $userLoggedIn;
		}

		public function getUsername(){
			return $this->userLoggedIn;
		}

		public function getFullName(){
			$query = "Select concat(firstName,' ',lastName) as name from users where username = '$this->userLoggedIn'";
			$result = mysqli_query($this->con,$query);
			$resultArr = mysqli_fetch_array($result);
			return $resultArr['name'];
			// $resultArr['name']
		}
	}
?>