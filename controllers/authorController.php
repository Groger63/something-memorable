<?php
class authorController extends registeredUserController{
	public $AUTHOR_ACTION=array('addpost','editpost','vote','dashboard');

	public function __construct($action){
		$this->SPECIFIC_ACTION=array_merge ($this->SPECIFIC_ACTION,$this->AUTHOR_ACTION);
		parent::__construct($action);
	}

		protected function dashboard(){//$post
			global $rep, $view;
			$data=array();
			$usr=$_SESSION['username'];
			$data['stories']=postModel::getPostsByUsername($usr);
			require_once ($view['authordashboard']);
		}

		protected function addpost(){//$post
			global $rep, $view;
			$data=array();

			if(isset($_POST['addpost'])){//we edit

				$post_title=isset($_POST['post_title']) ? $_POST['post_title'] : NULL ;
				$post_content=isset($_POST['post_content']) ? $_POST['post_content'] : NULL ;
				$data['uploadfile']=NULL;
				$usr=$_SESSION['username'];
				//$postID=md5($post_title.$post_content.$usr.getdate());

				$post_Id=postModel::addPost($usr,$post_title,$post_content);

				if($_FILES['imagepost']['name']!=NULL){ 
					///check error upload
					if($_FILES['imagepost']['error']>0){
						if($_FILES['imagepost']['error']==UPLOAD_ERR_FORM_SIZE){
							$data['uploadfile']='The file must not be bigger than 5mo.';
						}
						else $data['uploadfile']='The upload failed. Please try again, if this persists, contact the admin.'; //setup the error code
					}
					$valid_extensions=array('jpg','jpeg','gif','png');
					$extension_upload = strtolower(  substr(  strrchr($_FILES['imagepost']['name'], '.')  ,1)  );
					if (!in_array($extension_upload,$valid_extensions) ){
							$data['uploadfile']='The extension isn\'t valid. The picture must be a jpg, jpeg, gig or png file.'; //setup the error code
						}
						/// end check error upload
						/// check error move
						$uploaddir = './images/posts/'.$post_Id.'/';//create the directory of theprofile pic
						if(!is_dir($uploaddir))mkdir($uploaddir, 0777, true);
								//give this image a random name (for multiple images)
						$temp = explode(".", $_FILES["imagepost"]["name"]);
						$newfilename = round(microtime(true)) . '.' . end($temp);
						$uploadfile = $uploaddir . $newfilename;


						if (file_exists($uploadfile)){
							$data['uploadfile']='Error during the upload. Please try again, if this persists, contact the admin.'; //setup the error code
						}
						elseif (!move_uploaded_file($_FILES['imagepost']['tmp_name'], $uploadfile)) { //if error moving file
							if (is_dir_empty($uploaddir))rmdir($uploaddir); //remove the directory  IF NOT EMPTY
							$data['uploadfile']='Error during the upload. Please try again, if this persists, contact the admin.'; //setup the error code
						}
						if($data['uploadfile']!=NULL){
								$post=postModel::getPost($post_Id);
								$data['error']='Post has been added but something went wrong with the picture. Please edit your post. ';
								require_once ($view['editpost']);
								break;
						}else{
							imageModel::addImagePost($post_Id,$usr,$newfilename);
						}
					}
					
								$post=postModel::getPost($post_Id);
								require_once ($view['editpost']);


				}else require_once ($view['addpost']);
			}


		protected function editpost(){//$post
			global $rep, $view;
			$data=array();

			if(isset($_POST['edit'])){//we edit
				switch ($_POST['edit']) {
					case 'edit':
					$post_Id=isset($_POST['post_id']) ? $_POST['post_id'] : NULL ;
					$post_title=isset($_POST['post_title']) ? $_POST['post_title'] : NULL ;
					$post_content=isset($_POST['post_content']) ? $_POST['post_content'] : NULL ;
					$data['uploadfile']=NULL;
						//if you upload a file

					if($_FILES['imagepost']['name']!=NULL){ 
							///check error upload
						if($_FILES['imagepost']['error']>0){
							if($_FILES['imagepost']['error']==UPLOAD_ERR_FORM_SIZE){
								$data['uploadfile']='The file must not be bigger than 5mo.';
							}
								else $data['uploadfile']='The upload failed. Please try again, if this persists, contact the admin.'; //setup the error code
							}
							$valid_extensions=array('jpg','jpeg','gif','png');
							$extension_upload = strtolower(  substr(  strrchr($_FILES['imagepost']['name'], '.')  ,1)  );
							if (!in_array($extension_upload,$valid_extensions) ){
								$data['uploadfile']='The extension isn\'t valid. The picture must be a jpg, jpeg, gig or png file.'; //setup the error code
							}
							/// end check error upload

							/// check error move
							$uploaddir = './images/posts/'.$post_Id.'/';//create the directory of theprofile pic

							if(!is_dir($uploaddir))mkdir($uploaddir, 0777, true);

							//give this image a random name (for multiple images)
							$temp = explode(".", $_FILES["imagepost"]["name"]);
							$newfilename = round(microtime(true)) . '.' . end($temp);
							$uploadfile = $uploaddir . $newfilename;



							if (file_exists($uploadfile)){
								$data['uploadfile']='Error during the upload. Please try again, if this persists, contact the admin.'; //setup the error code
							}
							elseif (!move_uploaded_file($_FILES['imagepost']['tmp_name'], $uploadfile)) { //if error moving file
								if (is_dir_empty($uploaddir))rmdir($uploaddir); //remove the directory  IF NOT EMPTY
								$data['uploadfile']='Error during the upload. Please try again, if this persists, contact the admin.'; //setup the error code
							}
							if($data['uploadfile']!=NULL){
								$post=postModel::getPost($post_Id);
								require_once ($view['editpost']);
								break;
							}else{
								imageModel::addImagePost($post_Id,$_SESSION['username'],$newfilename);
							}
						}

						postModel::updatePost($post_Id,$post_title,$post_content);

						$host  = $_SERVER['HTTP_HOST'];
						$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
						$extra = 'editpost/'.$post_Id;
						header("Location: http://$host$uri/$extra");
						break;

						case 'deletepost':
						$post_Id=isset($_POST['post_id']) ? $_POST['post_id'] : NULL ;
						postModel::deletePost($post_Id);

						$host  = $_SERVER['HTTP_HOST'];
						$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
						$extra = 'dashboard';
						header("Location: http://$host$uri/$extra");
						break;
						case 'deleteimg':
						$post_Id=isset($_POST['post_id']) ? $_POST['post_id'] : NULL ;
						$img_id=isset($_POST['img_id']) ? $_POST['img_id'] : NULL ;



						imageModel::deleteImg($img_id);

						
						$host  = $_SERVER['HTTP_HOST'];
						$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
						$extra = 'editpost/'.$post_Id;
						header("Location: http://$host$uri/$extra");
						break;
						default:
						$data[0]='Unknow Error';
						$data[1]='We couldnt handle that request';
						$data[0]='<a href="dashboard" >Dashboard</a>';
						require_once ($view['error']);
					}
				}
				else{
						//otherwise we show the post
					$postId=isset($_GET['arg1']) ? $_GET['arg1'] : NULL ;
					if($postId==NULL){
						$data=array();
						$data[0]="We're sorry, something somewhere went wrong...";
						$data[1]="Please tell us which post you want to edit first.";
						require_once ($view['error']);
					}
					elseif(postModel::getPost($postId)==NULL){
						$data=array();
						$data[0]="We're sorry, something somewhere went wrong...";
						$data[1]="The post you're trying to edit doesn't exist!";
						require_once ($view['error']);
					}
					else{
						$post=postModel::getPost($postId);
						require_once ($view['editpost']);
					}
				}

			}

			public function vote(){
				global $rep, $view;

				$post_id=isset($_REQUEST['id_adv']) ? $_REQUEST['id_adv'] : NULL ;
				$username=isset($_SESSION['username']) ? $_SESSION['username'] : NULL ;

				if(postModel::getPost($post_id)==NULL){
					$data=array();
					$data[0]="We're sorry, something somewhere went wrong...";
					$data[1]="The post you're trying to vote for doesn't exist!";
					require_once ($view['error']);
				}
				if(postModel::getPost($post_id)->getUsername()==$username){
					$data=array();
					$data[0]="We're sorry, something somewhere went wrong...";
					$data[1]="You can't vote for your own post!";
					require_once ($view['error']);
				}
				elseif ($username==NULL) {
					$data=array();
					$data[0]="We're sorry, something somewhere went wrong...";
					$data[1]="Please login first";
					require_once ($view['error']);
				}
				else{

					$vote=vote_postModel::existVote_post($post_id,$username);
					if($vote){
						vote_postModel::unsetVote_post($post_id,$username);
					}
					else {
						vote_postModel::setVote_post($post_id,$username);
					}
					$this->showadventure();
				}

			}


		}
		?>