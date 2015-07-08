<?php
require_once('../../models/config.php');	
require_once('../../models/class.php');
require_once('../../models/class-slide.php');
require_once('../../models/function.php');
if(isset($_POST['act'])){
switch ($_POST['act']){
	case "update":
	
			if(!empty($_FILES['file']['name']))
			{
				if(upload_image($_FILES['file']))
				{
					if($news_obj->updateNews($title,$tomtat,$_FILES['file']['name'],$content,$cat_id,$id))
					{
						header("Location: ../index.php?view=list-news&stt=success");	
					}
					else
					{
						header("Location: ../index.php?view=list-news&stt=fail");
					}
				}			
			else
			{
				if($news_obj->updateNews($title,$tomtat,'',$content,$cat_id,$id))
				{
					header("Location: ../index.php?view=list-news&stt=success");	
				}
				else
				{
					header("Location: ../index.php?view=list-news&stt=fail");
				}
			}
		}
		break;
	case "xoa":
		$id = $_POST['id'];
		$news_obj = new news();
		if($news_obj->delNews($id))
		{
			header("Location: ../index.php?view=list-news&stt=success");	
		}
		else
		{
			header("Location: ../index.php?view=list-news&stt=fail");
		}
		break;
	default:	
	if(isset($_POST['title']) && isset($_FILES['file']['name']) && isset($_POST['tomtat']) && isset($_POST['content']) && isset($_POST['cat_id']))
	{
		$news_obj = new news();
		$title = $_POST['title'];
		$tomtat = $_POST['tomtat'];
		$content = $_POST['content'];
		$cat_id = $_POST['cat_id'];
		if(upload_image($_FILES['file']))
		{
			if($news_obj->insertNews($title,$tomtat,$_FILES['file']['name'],$content,$cat_id))
			{
				header("Location: ../index.php?view=form-news&stt=success");	
			}
			else
			{
				header("Location: ../index.php?view=form-news&stt=fail");
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