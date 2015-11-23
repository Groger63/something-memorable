<?php
class unregisteredUserController extends userController{
	protected  $SPECIFIC_ACTION=array('login','signup');

	protected function login(){

		global $rep, $view;
		$login = isset($_POST['username']) ? $_POST['username'] : '';
				$pwd = isset($_POST['password']) ? $_POST['password'] : '';//récupération des variables

				$user=userModel::getUser($login,$pwd);
				if(isset($user)){
					$_SESSION['username'] = $user->getUsername();
					$_SESSION['displayname'] = $user->getDisplayname();
					$_SESSION['role'] = $user->getRole();
					$_SESSION['profilepic'] = $user->getProfile_pic();
					$_SESSION['logged'] = true;
					$host  = $_SERVER['HTTP_HOST'];
					$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
					$extra = 'index.php';
					header("Location: http://$host$uri/$extra");
				}
				else {
					$data=array();
					$data[0]="We're sorry, something somewhere went wrong...";
					$data[1]="Username or password wrong";
					require_once ($view['error']);
				}
			}

			function signup(){
				global $rep, $view;


				if(isset($_POST['signup'])){
					switch($_POST['signup']){
						case 'step1':
						// if(/* !validate username */){
						// 	$data['username']='regexp';
						// }
						if(userModel::existUser($_POST['username'])){
							$data['username']='taken';
						}

						// if(/* !validate regexp password */){
						// 	$data['password']='regexp';
						// }
						if(!checkData::checkBothPassword($_POST['password'],$_POST['password2'])){
							$data['password']='notidentical';
						}
						if(isset($data)) require_once ($view['signupUnamePwd']);
						else{
							$data['password']=hash ( "md5", $_POST['password']);
							$data['username']=$_POST['username'];	
							require_once ($view['signupMoreinfo']);
						}
						break;

						case 'step2':
						$username=$_POST['username'];

						if(userModel::existUser($_POST['username'])){
							$data=array();
							$data[0]="We're sorry, something somewhere went wrong...";
							$data[1]="This user has already been registered!";
							require_once ($view['error']);
						}else{
							///create a "tools" file, this kind of check could be used elsewhere
							if($_FILES['profilepic']['name']!=NULL){ //if you upload a file
								$data['uploadfile']=NULL;
								if($_FILES['profilepic']['error']>0){
									if($_FILES['profilepic']['error']==UPLOAD_ERR_FORM_SIZE){
										$data['uploadfile']='The file must not be bigger than 5mo.';
									}
									else $data['uploadfile']='The upload failed. Please try again, if this persists, contact the admin.'; //setup the error code
								}
								$valid_extensions=array('jpg','jpeg','gif','png');

								$extension_upload = strtolower(  substr(  strrchr($_FILES['profilepic']['name'], '.')  ,1)  );
								if (!in_array($extension_upload,$valid_extensions) ){
									$data['uploadfile']='The extension isn\'t valid. The picture must be a jpg, jpeg, gig or png file.'; //setup the error code
								}

								$uploaddir = './images/users/'.$username.'/';//create the directory of theprofile pic
								mkdir($uploaddir, 0777, true);

									//give this image a random name (for multiple images)
								$temp = explode(".", $_FILES["profilepic"]["name"]);
								$newfilename = round(microtime(true)) . '.' . end($temp);
								$uploadfile = $uploaddir . $newfilename;
								$filename=$newfilename;

								if (!move_uploaded_file($_FILES['profilepic']['tmp_name'], $uploadfile)) { //if error moving file

									rmdir($uploaddir); //remove the directory
									$data['uploadfile']='Error during the upload. Please try again, if this persists, contact the admin.'; //setup the error code
								}
								if($data['uploadfile']!=NULL){
									$data['password']=$_POST['password_hash'];
									$data['username']=$_POST['username'];	
									$data['displayname']=isset($_POST['displayname']) ? $_POST['displayname'] : '';
									require_once ($view['signupMoreinfo']);//give the view again
									break;
								}
							}
							else $filename=NULL;
							$displayname=$_POST['displayname']!='' ? $_POST['displayname'] : 'Anonymous';
							$pwd_hash=$_POST['password_hash'];
							$profilepic=$filename;
							$role='reader';
							userModel::addUser($username,$displayname,$role,$pwd_hash,$profilepic);
							$data['username']=$username;
							require_once ($view['signupComplete']);
							
						}
						break;

					}

				}
				else require_once ($view['signupUnamePwd']);
			//require_once ($view['signupMoreinfo']);

			}



		}
		?>