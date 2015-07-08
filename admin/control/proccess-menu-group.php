<?php
	require_once('../../models/config.php');	
	require_once('../../models/class.php');
	require_once('../../models/class-menu.php');
	if(isset($_POST['act'])){
	switch ($_POST['act']){
		case "update":
			if(isset($_POST['menu_group_name']) && isset($_POST['status']))
			{
				$menu_group_obj = new menu_group();
				$menu_group_name = $_POST['menu_group_name'];
				$status = $_POST['status'];
				if($status==0) $status='0';
				$id = $_POST['id'];
				if($menu_group_obj->updateMenuGroup($menu_group_name,$status,$id))
				{
					header("Location: ../index.php?view=list-menu-group&stt=success");	
				}
				else
				{
					header("Location: ../index.php?view=list-menu-group&stt=fail");
				}
			}
			break;
		case "xoa":
			$id = $_POST['id'];
			$menu_group_obj = new menu_group();
			if($menu_group_obj->delMenuGroup($id))
			{
				header("Location: ../index.php?view=list-menu-group&stt=success");	
			}
			else
			{
				header("Location: ../index.php?view=list-menu-group&stt=fail");
			}
			break;
		default:	
		if(isset($_POST['menu_group_name']) && isset($_POST['status']))
			{
				$menu_group_obj = new menu_group();
				$menu_group_name = $_POST['menu_group_name'];
				$status = $_POST['status'];
			if($menu_group_obj->insertMenuGroup($menu_group_name,$status))
			{
				header("Location: ../index.php?view=form-menu-group&stt=success");	
			}
			else
			{
				header("Location: ../index.php?view=form-menu-group&stt=fail");
			}
		}
		break;
	}
	}
?>