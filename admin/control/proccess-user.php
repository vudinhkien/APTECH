<?php
	require_once('../../models/config.php');	
	require_once('../../models/class.php');
	require_once('../../models/class-user.php');
	if(isset($_POST['act'])){
	switch ($_POST['act']){
		case "update":
			if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['fullname']))
			{
				$user_obj = new user();
				$user = $_POST['user'];
				$pass = md5($_POST['pass']);
				$fullname = $_POST['fullname'];
				$id = $_POST['id'];
				if($user_obj->updateUser($user,$pass,$fullname,$id))
				{
					header("Location: ../index.php?view=list-user&stt=success");	
				}
				else
				{
					header("Location: ../index.php?view=list-user&stt=fail");
				}
			}
			break;
		case "xoa":
			$id = $_POST['id'];
			$user_obj = new user();
			if($user_obj->delUser($id))
			{
				header("Location: ../index.php?view=list-user&stt=success");	
			}
			else
			{
				header("Location: ../index.php?view=list-user&stt=fail");
			}
			break;
		default:	
		if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['fullname']))
		{
			$user_obj = new user();
			$user = $_POST['user'];
			$pass = md5($_POST['pass']);
			$fullname = $_POST['fullname'];
			if($user_obj->insertUser($user,$pass,$fullname))
			{
				header("Location: ../index.php?view=form-user&stt=success");	
			}
			else
			{
				header("Location: ../index.php?view=form-user&stt=fail");
			}
		}
		break;
	}
	}
?>