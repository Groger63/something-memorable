<?php

	class user{
		private $username;
		private $displayname;
		private $password;
		private $role;
		private $profile_pic;


		function __construct($username,$displayname,$role,$pic=NULL){
			$this->username = $username;
			$this->displayname = $displayname;
			$this->role = $role;
			$this->profile_pic=$pic;
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
		public function setDisplayname($f){
			$this->displayname=$f;
		}
		public function getDisplayname(){
			return $this->displayname;
		}
		public function setPassword($f){
			$this->password=$f;
		}
		public function getPassword(){
			return $this->password;
		}
		public function setProfile_pic($f){
			$this->profile_pic=$f;
		}
		public function getProfile_pic(){
			if($this->profile_pic!=NULL)return "images/users/".$this->getUsername()."/".$this->profile_pic;
			return "images/users/default.jpg";
		}
	}
?>