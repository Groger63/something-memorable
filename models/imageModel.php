<?php
	class imageModel{
		static public function getImagesPost($post_id)
		{
			return DAL::getImagesPost($post_id);
		}
	}

?>