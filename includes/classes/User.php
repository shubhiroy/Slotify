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
	}
?>