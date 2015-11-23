<?php
abstract class registeredUserController extends userController{
	protected  $SPECIFIC_ACTION=array('logout','deleteaccount','changepassword','changedisplayname','changeprofilepic','manageaccount');

	
	protected function logout(){
		session_unset ();
		session_destroy();
		$_REQUEST['action']=NULL;
		header('Location: index.php');
	}

	protected function deleteaccount(){
		//do something
		global $rep, $view;
		$data=array();

		if(isset($_POST['confirmdelete'])){//we edit
			$pwd1=$_POST['pwd1'];
			$pwd2=$_POST['pwd2'];
			if(checkData::checkBothPassword($pwd1,$pwd2)){
				$usr=$_SESSION['username'];
				if(userModel::getUser($usr,$pwd1)!=NULL){

					session_unset ();
					session_destroy();

					userModel::deleteUser($usr);

					$_REQUEST['action']=NULL;
					header('Location: index.php');

				}
				else{
					$data['error']='You typed the wrong password';
				}
			}else{
				$data['error']='The password don\'t match!';
			}

		}
		require_once ($view['deleteaccount']);
	}

	protected function changepassword(){
		global $rep, $view;
		$data=array();
		if(isset($_POST['changepassword'])){//we edit

			if($_POST['pwd1']!=''){//we edit
				$usr=$_SESSION['username'];
				$pwd1=$_POST['pwd1'];
				$pwd2=$_POST['pwd2'];
				if(checkData::checkBothPassword($pwd1,$pwd2)){

					///other verification including regexp etc...


					userModel::changepassUser($usr,$pwd1);
					$data['password']='Passwords successfully updated!';
				}else $data['password']='Passwords don\'t match!';
			}else $data['password']='Please enter a password!';
		}
		require_once ($view['manageaccount']);
	}

	protected function changedisplayname(){
		global $rep, $view;
		$data=array();

		if($_POST['displayname']!=''){//we edit
			$dspname=$_POST['displayname'];
			$usr=$_SESSION['username'];
			userModel::changedisplaynameUser($usr,$dspname);
			$_SESSION['displayname'] = $dspname;
			$data["displayname"]="Display name updated!";
		}else{
			$data["displayname"]="Please enter a new display name";
		}
		require_once ($view['manageaccount']);
	}

	protected function changeprofilepic(){
		global $rep, $view;
		$data=array();

		if(isset($_POST['changeprofilepic'])){
			$data['uploadfile']=NULL;
			if($_FILES['picturefile']['name']!=NULL){ 

				$usr=$_SESSION['username'];
						///check error upload
				if($_FILES['picturefile']['error']>0){
					if($_FILES['picturefile']['error']==UPLOAD_ERR_FORM_SIZE){
						$data['uploadfile']='The file must not be bigger than 5mo.';
					}
							else $data['uploadfile']='The upload failed. Please try again, if this persists, contact the admin.'; //setup the error code
						}
						$valid_extensions=array('jpg','jpeg','gif','png');
						$extension_upload = strtolower(  substr(  strrchr($_FILES['picturefile']['name'], '.')  ,1)  );
						if (!in_array($extension_upload,$valid_extensions) ){
								$data['uploadfile']='The extension isn\'t valid. The picture must be a jpg, jpeg, gig or png file.'; //setup the error code
							}
							/// end check error upload
							/// check error move
							$uploaddir = './images/users/'.$usr.'/';//create the directory of theprofile pic
							if(!is_dir($uploaddir))mkdir($uploaddir, 0777, true);
									//give this image a random name (for multiple images)
							$temp = explode(".", $_FILES["picturefile"]["name"]);
							$newfilename = round(microtime(true)) . '.' . end($temp);
							$uploadfile = $uploaddir . $newfilename;


							if (file_exists($uploadfile)){
								$data['uploadfile']='Error during the upload. Please try again, if this persists, contact the admin.'; //setup the error code
							}
							elseif (!move_uploaded_file($_FILES['picturefile']['tmp_name'], $uploadfile)) { //if error moving file
								if (is_dir_empty($uploaddir))rmdir($uploaddir); //remove the directory  IF NOT EMPTY
								$data['uploadfile']='Error during the upload. Please try again, if this persists, contact the admin.'; //setup the error code
							}
							if($data['uploadfile']==NULL){
								if($_SESSION['profilepic']!='images/users/default.jpg')unlink($_SESSION['profilepic']);
								$_SESSION['profilepic']=$uploadfile;
								userModel::changepicUser($usr,$newfilename);
							}
						}
						else $data['uploadfile']='Please select a picture!';
					}
					require_once ($view['manageaccount']);
				}

				protected function manageaccount(){
					global $rep, $view;
					$data=array();


					require_once ($view['manageaccount']);
				}

			}
?>