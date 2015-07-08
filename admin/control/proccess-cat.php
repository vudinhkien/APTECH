<?php
	require_once('../../models/config.php');	
	require_once('../../models/class.php');
	require_once('../../models/class-cat.php');
	if(isset($_POST['act'])){
	switch ($_POST['act']){
		case "update":
			if(isset($_POST['cat_name']) && isset($_POST['position']) && isset($_POST['parent_id']))
			{
				$cat_obj = new category();
				$cat = $_POST['cat_name'];
				$position = $_POST['position'];
				$parent_id = $_POST['parent_id'];
				$home = isset($_POST['home']) ? $_POST['home'] : '';
				$id = $_POST['id'];
				if($cat_obj->updateCat($cat,$parent_id,$position,$home,$id))
				{
					header("Location: ../index.php?view=list-cat&stt=success");	
				}
				else
				{
					header("Location: ../index.php?view=list-cat&stt=fail");
				}
			}
			break;
		case "xoa":
			$id = $_POST['id'];
			$cat_obj = new category();
			if($cat_obj->delCat($id))
			{
				header("Location: ../index.php?view=list-cat&stt=success");	
			}
			else
			{
				header("Location: ../index.php?view=list-cat&stt=fail");
			}
			break;
		default:	
		if(isset($_POST['cat_name']) && isset($_POST['position']) && isset($_POST['parent_id']))
		{
			$cat_obj = new category();
			$cat = $_POST['cat_name'];
			$position = $_POST['position'];
			$parent_id = $_POST['parent_id'];
			$home = isset($_POST['home']) ? $_POST['home'] : '';
			if($cat_obj->insertCat($cat,$parent_id,$position,$home))
			{
				header("Location: ../index.php?view=form-cat&stt=success");	
			}
			else
			{
				header("Location: ../index.php?view=form-cat&stt=fail");
			}
		}
		break;
	}
	}
?>