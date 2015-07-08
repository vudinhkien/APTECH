<?php
	require_once('../../models/config.php');	
	require_once('../../models/class.php');
	require_once('../../models/class-menu.php');
	if(isset($_POST['act'])){
	switch ($_POST['act']){
		case "update":
			if(isset($_POST['menu_name']) && isset($_POST['position']) && isset($_POST['menu_type']) && isset($_POST['parent_id']) && isset($_POST['menu_group']))
			{
				$menu_obj = new menu();
				$menu_gr_id = $_POST['menu_group'];
				$menu_name = $_POST['menu_name'];
				$position = $_POST['position'];
				$menu_type = $_POST['menu_type'];
				$parent_id = $_POST['parent_id'];
				if($menu_type==1){
					if(isset($_POST['cat_id'])){
						$cat_id = $_POST['cat_id'];
						$url = "view=news&cat_id=".$cat_id;
					}
				}
				elseif($menu_type==2){
					if(isset($_POST['cat_pro_id'])){
						$cat_pro_id = $_POST['cat_pro_id'];
						$url = "view=product&cat_pro_id=".$cat_pro_id;
					}
				}
				else
				{
					$url = isset($_POST['url']) ? $_POST['url'] : '';
				}
 				$id = $_POST['id'];
				if($menu_obj->updateMenu($menu_gr_id,$menu_name,$position,$parent_id,$menu_type,$url,$id))
				{
					header("Location: ../index.php?view=list-menu&stt=success");	
				}
				else
				{
					header("Location: ../index.php?view=list-menu&stt=fail");
				}
			}
			break;
		case "xoa":
			$id = $_POST['id'];
			$parent_id = $_POST['parent_id'];
			if($parent_id==0)
			{
				$parent_id = '0';
			}
			$menu_obj = new menu();
			if($menu_obj->delMenu($id))
			{
				$temp_arr = $menu_obj->getMenuByParentId($id);
				if(is_array($temp_arr))
				{
					foreach($temp_arr as $values){
						$menu_obj->updateMenu('','',$parent_id,'','',$values['menu_id']);
					}
				}
				header("Location: ../index.php?view=list-menu&stt=success");	
			}
			else
			{
				header("Location: ../index.php?view=list-menu&stt=fail");
			}
			break;
		default:	
			if(isset($_POST['menu_name']) && isset($_POST['position']) && isset($_POST['menu_type']) && isset($_POST['parent_id']) && isset($_POST['menu_group']))
			{
				$menu_obj = new menu();
				$menu_gr_id = $_POST['menu_group'];
				$menu_name = $_POST['menu_name'];
				$position = $_POST['position'];
				$menu_type = $_POST['menu_type'];
				$parent_id = $_POST['parent_id'];
				if($menu_type==1){
					if(isset($_POST['cat_id'])){
						$cat_id = $_POST['cat_id'];
						$url = "view=news&cat_id=".$cat_id;
					}
				}
				elseif($menu_type==2){
					if(isset($_POST['cat_pro_id'])){
						$cat_pro_id = $_POST['cat_pro_id'];
						$url = "view=product&cat_pro_id=".$cat_pro_id;
					}
				}
				else
				{
					$url = isset($_POST['url']) ? $_POST['url'] : '';
				}
				if($menu_obj->insertMenu($menu_gr_id,$menu_name,$position,$url,$menu_type,$parent_id))
				{
					header("Location: ../index.php?view=form-menu&stt=success");	
				}
				else
				{
					header("Location: ../index.php?view=form-menu&stt=fail");
				}
		}
		break;
	}
	}
?>