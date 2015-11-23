<?php
	class imageModel{
		static public function getImagesPost($post_id)
		{
			return DAL::getImagesPost($post_id);
		}		

		static public function getImage($img_id)
		{
			return DAL::getImage($img_id);
		}

		static public function deleteImg($img_id)
		{
			return DAL::deleteImg($img_id);
		}

		static public function addImagePost($post_id,$username,$name){//for now, the minimum
			DAL::addimagePost($post_id,$username,$name);
		}
	}

?>