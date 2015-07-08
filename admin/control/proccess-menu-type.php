<?php
	require_once('../../models/config.php');	
	require_once('../../models/class.php');
	require_once('../../models/class-menu.php');
	if(isset($_POST['act'])){
	switch ($_POST['act']){
		case "update":
			if(isset($_POST['type_name']) && isset($_POST['view']))
			{
				$menu_type_obj = new menu_type();
				$type_name = $_POST['type_name'];
				$view = $_POST['view'];
 				$id = $_POST['id'];
				if($menu_type_obj->updateMenuType($type_name,$view,$id))
				{
					header("Location: ../index.php?view=list-menu-type&stt=success");	
				}
				else
				{
					header("Location: ../index.php?view=list-menu-type&stt=fail");
				}
			}
			break;
		case "xoa":
			$id = $_POST['id'];
			$menu_type_obj = new menu_type();
			if($menu_type_obj->delMenuType($id))
			{
				header("Location: ../index.php?view=list-menu-type&stt=success");	
			}
			else
			{
				header("Location: ../index.php?view=list-menu-type&stt=fail");
			}
			break;
		default:	
			if(isset($_POST['type_name']) && isset($_POST['view']))
			{
				$menu_type_obj = new menu_type();
				$type_name = $_POST['type_name'];
				$view = $_POST['view'];
				if($menu_type_obj->insertMenuType($type_name,$view))
				{
					header("Location: ../index.php?view=list-menu-type&stt=success");	
				}
				else
				{
					header("Location: ../index.php?view=form-menu-type&stt=fail");
				}
		}
		break;
	}
	}
?>