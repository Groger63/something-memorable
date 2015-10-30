<?php

	class user{
		private $username;
		private $displayname;
		private $role;
		private $password;
		private $salt;


		function __construct($username,$displayname,$role,$password,$salt){
			$this->username = $username;
			$this->displayname = $displayname;
			$this->salt= $salt;
			$this->password=$password;
			$this->role = $role;
		}

		public function setUsername($n){
			$this->username=$n;
		}
		public function getUsername(){
			return $this->username;
		}
		public function setRole($f){
			$this->role=$f;
		}
		public function getRole(){
			return $this->role;
		}
		public function setSalt($f){
			$this->salt=$f;
		}
		public function getSalt(){
			return $this->salt;
		}
		public function setDisplayname($f){
			$this->displayname=$f;
		}
		public function getDisplayname(){
			return $this->displayname;
		}
		public function setPassword($f){
			$this->displayname=$f;
		}
		public function getPassword(){
			return $this->Displayname;
		}
	}
?>