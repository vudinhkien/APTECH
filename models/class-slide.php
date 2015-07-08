<?php
class slideshow extends database{
	var $table = "slideshow";
	function insertSlide($slide_chinh,$slide_phu)
	{
		return parent::insert_data($this->table,array('slide_chinh'=>$slide_chinh,'slide_phu'=>$slide_phu));
	}
	function updateSlide($slide_chinh,$slide_phu,$dieukien)
	{
		if($slide_chinh!='')
		{
			$a['slide_chinh'] = $slide_chinh;
		}
		if($slide_phu!='')
		{
			$a['slide_phu'] = $slide_phu;
		}
		
		return parent::updateDb($this->table,$a,"slide_id=".$dieukien);
	}
	function delNews($slide_id)
	{
		return parent::deleteDb($this->table,"slide_id=$slide_id");
	}
	function getAllNews($order_by='',$limit='')
	{
		if($order_by!='' && $limit==''){
			return parent::selectDb($this->table,array("slide_id","slide_chinh","slide_phu"),'','ORDER BY ' .$order_by.' ASC','');
		}
		elseif($order_by=='' && $limit=='')
		{
			return parent::selectDb($this->table,array("slide_id","slide_chinh","slide_phu",),'','');
		}
		elseif($order_by=='' && $limit!='')
		{
			return parent::selectDb($this->table,array("slide_id","slide_chinh","slide_phu"),'','',"LIMIT $limit[0],$limit[1]");
		}
		elseif($order_by!='' && $limit!='')
		{
			return parent::selectDb($this->table,array("slide_id","slide_chinh","slide_phu"),'','ORDER BY ' .$order_by.' ASC',"LIMIT $limit[0],$limit[1]");
		}
	}
	
	function getAllFeatured($id)
	{
		return parent::selectDb($this->table,array("slide_id","slide_chinh","slide_phu"),"featured_home=1 and news_id!=$id",'',"LIMIT 0,3");
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
	function getAllNoibat()
	{
		return parent::selectDb($this->table,array("news_id","title","tomtat","images","content","cat_id","hot","featured_home"),"hot=1",'','');
	}
}
?>