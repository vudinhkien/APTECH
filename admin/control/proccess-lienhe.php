<?php
	require_once('../../models/config.php');	
	require_once('../../models/class.php');
	require_once('../../models/class-lienhe.php');
	if(isset($_POST['act'])){
	switch ($_POST['act']){
		case "update":
			if(isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['mobile'])&& isset($_POST['noidung']))
			{
				$lienhe_obj = new lienhe();
				$fullname = $_POST['fullname'];
				$email = $_POST['email'];
				$mobile = $_POST['mobile'];
				$noidung = $_POST['noidung'];
				$id = $_POST['id'];
				if($lienhe_obj->updateLienhe($fullname,$email,$mobile,$noidung,$id))
				{
					header("Location: ../index.php?view=list-lienhe&stt=success");	
				}
				else
				{
					header("Location: ../index.php?view=list-lienhe&stt=fail");
				}
			}
			break;
		case "xoa":
			$id = $_POST['id'];
			$lienhe_obj = new lienhe();
			if($lienhe_obj->delLienhe($id))
			{
				header("Location: ../index.php?view=list-lienhe&stt=success");	
			}
			else
			{
				header("Location: ../index.php?view=list-lienhe&stt=fail");
			}
			break;
		default:	
			if(isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['mobile'])&& isset($_POST['noidung']))
		{
				$lienhe_obj = new lienhe();
				$fullname = $_POST['fullname'];
				$email = $_POST['email'];
				$mobile = $_POST['mobile'];
				$noidung = $_POST['noidung'];
			if($user_obj->insertUser($fullname,$email,$mobile,$noidung))
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