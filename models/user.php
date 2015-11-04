<?php

	class user{
		private $username;
		private $displayname;
		private $role;
		private $salt;


		function __construct($username,$displayname,$role,$salt){
			$this->username = $username;
			$this->displayname = $displayname;
			$this->salt= $salt;
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
	}
?>