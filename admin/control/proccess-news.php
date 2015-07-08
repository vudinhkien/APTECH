<?php
require_once('../../models/config.php');	
require_once('../../models/class.php');
require_once('../../models/class-news.php');
require_once('../../models/function.php');
if(isset($_POST['act'])){
	$news_obj = new News();
	$id = (int)$_POST['id'];
switch ($_POST['act']){
	case "update":
		if(isset($_POST['title']) && isset($_POST['tomtat']) && isset($_POST['content']) && isset($_POST['cat_id']) && isset($_POST['hotnews']) && isset($_POST['featured']))
		{
			
			$title = $_POST['title'];
			$tomtat = $_POST['tomtat'];
			$content = $_POST['content'];
			$cat_id = $_POST['cat_id'];
			$hotnews = $_POST['hotnews'];
			$featured = $_POST['featured'];
			
			if(!empty($_FILES['file']['name']))
			{
				$temp_name = explode(".",$_FILES["file"]["name"]);
				$newfilename = microtime().".".end($temp_name);
				if(upload_image($_FILES['file'],$newfilename))
				{
					if($news_obj->updateNews($title,$newfilename,$tomtat,$content,$cat_id,$hotnews,$featured,$id))
					{
						header("Location: ../index.php?view=list-news&stt=success");	
					}
					else
					{
						header("Location: ../index.php?view=list-news&stt=fail");
					}
				}			
			}
			else
			{
				if($news_obj->updateNews($title,"",$tomtat,$content,$cat_id,$hotnews,$featured,$id))
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
	if(isset($_POST['title']) && isset($_FILES['file']['name']) && isset($_POST['tomtat']) && isset($_POST['content']) && isset($_POST['cat_id'])&& isset($_POST['hotnews']) && isset($_POST['featured']))
	{
		$title = $_POST['title'];
		$tomtat = $_POST['tomtat'];
		$content = $_POST['content'];
		$cat_id = $_POST['cat_id'];
		$hotnews = $_POST['hotnews'];
		$featured = $_POST['featured'];
		// rename file image
		$temp_name = explode(".",$_FILES["file"]["name"]);
		$newfilename = microtime().".".end($temp_name);
		if(upload_image($_FILES['file'],$newfilename))
		{
			if($news_obj->insertNews($title,$newfilename,$tomtat,$content,$cat_id,$hotnews,$featured))
			{
				header("Location: ../index.php?view=list-news&stt=success");	
			}
			else
			{
				header("Location: ../index.php?view=form-news&stt=fail");
			}
		}
		else
		{
			if($news_obj->insertNews($title,'',$tomtat,$content,$cat_id,$hotnews,$featured))
			{
				header("Location: ../index.php?view=form-news&stt=success");	
			}
			else
			{
				header("Location: ../index.php?view=form-news&stt=fail");
			}
		}
	}
	break;
}
}
?>