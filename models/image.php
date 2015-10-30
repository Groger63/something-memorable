<?php
	class image{
		private $img_id; 
		public function getImg_id(){
			return $this->img_id;
		}	
		private $username;
		public function getUsername(){
			return $this->username;
		}	
		private $post_id;
		public function getPost_id(){
			return $this->post_id;
		}	
		private $caption;
		public function getCaption(){
			return $this->caption;
		}	
		private $file_path;
		public function getFile_path(){
			return 'images/posts/'.$this->post_id.'/'.$this->file_path;
		}	
		private $location;
		public function getLocation(){ 
			return $this->location;
		}	
		private $coordinates;
		public function getCoordinates(){


			$exif = exif_read_data($this->getFile_path());
			$latitude = $this->gps($exif["GPSLatitude"], $exif['GPSLatitudeRef']);
			$longitude = $this->gps($exif["GPSLongitude"], $exif['GPSLongitudeRef']);
			return $latitude.','.$longitude;
		}	

		function __construct($img_id,$username,$post_id,$caption,$file_path,$location){
			$this->img_id=$img_id;
			$this->username=$username;
			$this->post_id=$post_id;
			$this->caption=$caption;
			$this->file_path=$file_path;
			$this->location=$location;



		}
		private function gps($coordinate, $hemisphere) {
		  for ($i = 0; $i < 3; $i++) {
		    $part = explode('/', $coordinate[$i]);
		    if (count($part) == 1) {
		      $coordinate[$i] = $part[0];
		    } else if (count($part) == 2) {
		      $coordinate[$i] = floatval($part[0])/floatval($part[1]);
		    } else {
		      $coordinate[$i] = 0;
		    }
		  }
		  list($degrees, $minutes, $seconds) = $coordinate;
		  $sign = ($hemisphere == 'W' || $hemisphere == 'S') ? -1 : 1;
		  return $sign * ($degrees + $minutes/60 + $seconds/3600);
		}
	}
	
?>