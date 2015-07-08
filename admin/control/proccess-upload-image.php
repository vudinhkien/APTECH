<?php
require_once('../../models/config.php');	
require_once('../../models/class.php');
require_once('../../models/class-user.php');
$id = $_POST['id'];
saveImage($_POST['img'],$id);
function saveImage($base64img,$id){
    define('UPLOAD_DIR', '../../uploads/');
    $base64img = str_replace('data:image/jpeg;base64,', '', $base64img);
    $data = base64_decode($base64img);
    $file = UPLOAD_DIR . 'thuphat.jpg';
    if(file_put_contents($file, $data)){
		$user_obj = new user();
		if($user_obj->updateUser('','','','','','','','thuphat1231ssssss111â.jpg',$id)){
			echo "true";
			}
			else
			{
				echo "false";
			}
	}
	else
	{
		echo "false";
	}
}
?>