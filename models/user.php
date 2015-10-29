<?php

	class user{
		private $name;
		private $function;

		function __construct($n,$f){
			$this->name = $n;
			$this->function = $f;
		}
		public function getName(){
			return $this->name;
		}
		public function getFunction(){
			return $this->function;
		}
		public function setName($n){
			$this->name=$n;
		}
		public function setFunction($f){
			$this->function=$f;
		}
	}
?>