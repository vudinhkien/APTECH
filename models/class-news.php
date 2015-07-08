<?php
class news extends database{
	var $table = "news";
	function insertNews($title,$images,$tomtat,$content,$cat_id,$hotnews,$featured)
	{
		return parent::insert_data($this->table,array('title'=>$title,'tomtat'=>$tomtat,'images'=>$images,'content'=>$content,'cat_id'=>$cat_id,'hot'=>$hotnews,'featured_home'=>$featured,'ngaydangbai'=>date('Y-m-d H:i:s')));
	}
	function updateNews($title,$images,$tomtat,$content,$cat_id,$hotnews,$featured,$dieukien)
	{
		if($title!='')
		{
			$a['title'] = $title;
		}
		if($tomtat!='')
		{
			$a['tomtat'] = $tomtat;
		}
		if($images!='')
		{
			$a['images'] = $images;
		}
		if($content!='')
		{
			$a['content'] = $content;
		}
		if($cat_id!='')
		{
			$a['cat_id'] = $cat_id;
		}
		if($hotnews!='')
		{
			$a['hot'] = $hotnews;
		}
		if($featured!='')
		{
			$a['featured_home'] = $featured;
		}
		return parent::updateDb($this->table,$a,"news_id=".$dieukien);
	}
	function delNews($news_id)
	{
		return parent::deleteDb($this->table,"news_id=$news_id");
	}
	function getAllNews($order_by='',$limit='')
	{
		if($order_by!='' && $limit==''){
			return parent::selectDb($this->table,array("news_id","title","tomtat","images","content","cat_id","hot","featured_home"),'','ORDER BY ' .$order_by.' DESC','');
		}
		elseif($order_by=='' && $limit=='')
		{
			return parent::selectDb($this->table,array("news_id","title","tomtat","images","content","cat_id","hot","featured_home",),'','');
		}
		elseif($order_by=='' && $limit!='')
		{
			return parent::selectDb($this->table,array("news_id","title","tomtat","images","content","cat_id","hot","featured_home"),'','',"LIMIT $limit[0],$limit[1]");
		}
		elseif($order_by!='' && $limit!='')
		{
			return parent::selectDb($this->table,array("news_id","title","tomtat","images","content","cat_id","hot","featured_home"),'','ORDER BY ' .$order_by.' DESC',"LIMIT $limit[0],$limit[1]");
		}
	}
	
	function getAllFeatured($id)
	{
		return parent::selectDb($this->table,array("news_id","title","tomtat","images","content","cat_id","hot","featured_home"),"featured_home=1 and news_id!=$id",'',"LIMIT 0,3");
	}

	function getAllFeaturedAndHot()
	{
		return parent::selectDb($this->table,array("news_id","title","tomtat","images","content","cat_id","hot","featured_home"),"featured_home=1 and hot=1",'',"LIMIT 0,1");
	}
	
	function getNewsById($id)
	{
		$a = parent::selectDb($this->table,array("news_id","title","images","tomtat","content","cat_id","hot","featured_home","ngaydangbai"),"news_id=".$id);
		if(!empty($a))
		{
			return $a[0];
		}
		else
		{
			echo "Khong co du lieu";
		}
	}
	function getNewsByCat($cat_id)
	{
		$a = parent::selectDb($this->table,array("news_id","title","images","tomtat","content","cat_id","hot","featured_home"),"cat_id=".$cat_id,'ORDER BY news_id desc','limit 0,4');
		if(!empty($a))
		{
			return $a;
		}
		else
		{
			echo "Khong co du lieu";
		}
	}
	function getAllNoibat($order_by='',$limit='')
	{
		if($order_by!='' && $limit==''){
			return parent::selectDb($this->table,array("news_id","title","tomtat","images","content","cat_id","hot","featured_home"),'hot=1','ORDER BY ' .$order_by.' DESC','');
		}
		elseif($order_by=='' && $limit=='')
		{
			return parent::selectDb($this->table,array("news_id","title","tomtat","images","content","cat_id","hot","featured_home",),'hot=1','','');
		}
		elseif($order_by=='' && $limit!='')
		{
			return parent::selectDb($this->table,array("news_id","title","tomtat","images","content","cat_id","hot","featured_home"),'hot=1','',"LIMIT $limit[0],$limit[1]");
		}
		elseif($order_by!='' && $limit!='')
		{
			return parent::selectDb($this->table,array("news_id","title","tomtat","images","content","cat_id","hot","featured_home"),'hot=1','ORDER BY ' .$order_by.' DESC',"LIMIT $limit[0],$limit[1]");
		}
	}
	
	/*chon tieu đề tin ko cho show cái tiêu đề đang ở đó*/
	function getAllnewsDocThem($id,$order_by='')
	{
		if($order_by!=''){
			return parent::selectDb($this->table,array("news_id","title","tomtat"),'news_id!='.$id,'ORDER BY ' .$order_by.'DESC','limit 0,4');
		}
		else
		{
			return parent::selectDb($this->table,array("news_id","title","tomtat"),'news_id!='.$id,'','limit 0,4');
		}
	}
}
?>