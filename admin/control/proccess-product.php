<?php
require_once('../../models/config.php');	
require_once('../../models/class.php');
require_once('../../models/class-product.php');
require_once('../../models/function.php');

if(isset($_POST['act'])){
switch ($_POST['act']){
	case "update":
		if(isset($_POST['pro_name']) && isset($_POST['price_niemyet']) && isset($_POST['price_sale']) && isset($_POST['cat_id']) && isset($_POST['ma_sp']) && isset($_POST['mausac']) && isset($_POST['soluong']) && isset($_FILES['file']['name']) && isset($_POST['description']) && isset($_POST['tomtat']))
		{
			$pro_obj = new product();
			$pro_name = $_POST['pro_name'];
			$mausac = $_POST['mausac'];
			$description = $_POST['description'];
			$tomtat = $_POST['tomtat'];
			$price_niemyet = (int)str_replace(".","",$_POST['price_niemyet']);
			$price_sale = (int)str_replace(".","",$_POST['price_sale']);
			$cat_id = $_POST['cat_id'];
			$thongsokythuat = array();
			for($i=0;$i<count($_POST['thongso']);$i++)
			{
				$key = $_POST['thongso'][$i];
				$thongsokythuat[$key] = $_POST['giatri'][$i];
			}
			
			$image_phu = array();
			
			$ma_sp = $_POST['ma_sp'];
			$soluong = $_POST['soluong'];
			$position = isset($_POST['position']) ? $_POST['position'] : 0;
			$hot = $_POST['hot'];
			$status = $_POST['active'];
			$id = $_POST['id'];
			if(!empty($_FILES['file']['name']))
			{
				$temp_name = explode(".",$_FILES["file"]["name"]);
				$newfilename = microtime() . '.' .end($temp_name);
				if(upload_image($_FILES['file'],$newfilename))
				{
					if($pro_obj->updateProduct($pro_name,$newfilename,$tomtat,$description,$price_niemyet,$price_sale,$thongsokythuat,$image_phu,$ma_sp,$soluong,$position,$hot,$status,$cat_id,$mausac,$id))
					{
						header("Location: ../index.php?view=list-product&stt=success");	
					}
					else
					{
						header("Location: ../index.php?view=list-product&stt=fail");
					}
				}			
			}
			else
			{
				if($pro_obj->updateProduct($pro_name,'',$tomtat,$description,$price_niemyet,$price_sale,$thongsokythuat,$image_phu,$ma_sp,$soluong,$position,$hot,$status,$cat_id,$mausac,$id))
				{
					header("Location: ../index.php?view=list-product&stt=success");	
				}
				else
				{
					header("Location: ../index.php?view=list-product&stt=fail");
				}
			}
		}
		break;
	case "xoa":
		$id = $_POST['id'];
		$pro_obj = new product();
		if($pro_obj->delProduct($id))
		{
			header("Location: ../index.php?view=list-product&stt=success");	
		}
		else
		{
			header("Location: ../index.php?view=list-product&stt=fail");
		}
		break;
	default:	
	if(isset($_POST['pro_name']) && isset($_POST['price_niemyet']) && isset($_POST['mausac']) && isset($_POST['price_sale']) && isset($_POST['cat_id']) && isset($_POST['ma_sp']) && isset($_POST['soluong']) && isset($_FILES['file']['name']) && isset($_POST['description']) && isset($_POST['tomtat']))
	{
		$pro_obj = new product();
		$pro_name = $_POST['pro_name'];
		$description = $_POST['description'];
		$tomtat = $_POST['tomtat'];
		$mausac = $_POST['mausac'];
		$price_niemyet = (int)str_replace(".","",$_POST['price_niemyet']);
		$price_sale = (int)str_replace(".","",$_POST['price_sale']);
		$cat_id = $_POST['cat_id'];
		$thongsokythuat = array();
		for($i=0;$i<count($_POST['thongso']);$i++)
		{
			$key = $_POST['thongso'][$i];
			$thongsokythuat[$key] = $_POST['giatri'][$i];
		}
		
		$image_phu = array();
		
		$ma_sp = $_POST['ma_sp'];
		$soluong = $_POST['soluong'];
		$position = isset($_POST['position']) ? $_POST['position'] : 0;
		$hot = $_POST['hot'];
		$status = $_POST['active'];
		$temp_name = explode(".",$_FILES["file"]["name"]);
		$newfilename = microtime() . '.' .end($temp_name);
		if(upload_image($_FILES['file'],$newfilename))
		{
			$image_temp= array();
			for($i=0;$i<count($_FILES['image']['name']);$i++)
			{	
				$temp_name1 = explode(".",$_FILES["image"]["name"][$i]);
				$newfilename1 = microtime() . '.' .end($temp_name1);
				$image_temp["name"] = $_FILES["image"]["name"][$i];
				$image_temp["type"] = $_FILES["image"]["type"][$i];
				$image_temp["tmp_name"] = $_FILES["image"]["tmp_name"][$i];
				$image_temp["error"] = $_FILES["image"]["error"][$i];
				$image_temp["size"] = $_FILES["image"]["size"][$i];
				upload_image($image_temp,$newfilename1);
				$image_phu[$i]["name"] = $newfilename1;
				$image_phu[$i]["position"] = $_POST['thutu_anh'][$i];
			}
			if($pro_obj->insertProduct($pro_name,$newfilename,$tomtat,$description,$price_niemyet,$price_sale,base64_encode(serialize($thongsokythuat)),serialize($image_phu),$ma_sp,$soluong,$position,$hot,$status,$cat_id,$mausac))
			{
				header("Location: ../index.php?view=form-product&stt=success");	
				//echo "thanh cong";
			}
			else
			{
				header("Location: ../index.php?view=form-product&stt=fail");
			}
		}
		else
		{
			echo "khong hop le";
		}
	}
	break;
}
}
?>