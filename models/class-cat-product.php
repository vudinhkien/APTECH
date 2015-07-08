<?php
class category_product extends database{
	var $table = "category_product";
	function insertCat($name,$parent_id,$position,$home)
	{
		return parent::insert_data($this->table,array('cat_name'=>$name,'parent_id'=>$parent_id,'position'=>$position,'home'=>$home));
	}
	function updateCat($name,$parent_id,$position,$home,$dieukien)
	{
		if($name!='')
		{
			$a['cat_name'] = $name;
		}
		if($parent_id!='')
		{
			$a['parent_id'] = $parent_id;
		}
		if($position!='')
		{
			$a['position'] = $position;
		}
		if($home!='')
		{
			$a['home'] = $home;
		}
		return parent::updateDb($this->table,$a,"cat_id=".$dieukien);
	}
	function delCat($cat_id)
	{
		return parent::deleteDb($this->table,"cat_id=$cat_id");
	}
	function getAllCat($order_by='')
	{
		if($order_by!=''){
			return parent::selectDb($this->table,array("cat_id","parent_id","cat_name","position","home"),'','ORDER BY ' .$order_by.' ASC');
		}
		else
		{
			return parent::selectDb($this->table,array("cat_id","parent_id","cat_name","position","home"),'','');
		}
	}
	function getAllCatExceptId($id,$order_by='')
	{
		if($order_by!=''){
			return parent::selectDb($this->table,array("cat_id","parent_id","cat_name","position","home"),'cat_id!='.$id,'ORDER BY ' .$order_by.' ASC');
		}
		else
		{
			return parent::selectDb($this->table,array("cat_id","parent_id","cat_name","position","home"),'cat_id!='.$id,'');
		}
	}
	function getCatById($id)
	{
		$a = parent::selectDb($this->table,array('cat_id',"parent_id",'cat_name','position','home'),"cat_id=".$id);
		if(!empty($a))
		{
			return $a[0];
		}
		else
		{
			echo "Khong co du lieu";
		}
	}
	function getCatByHome()
	{
		$a = parent::selectDb($this->table,array('cat_id',"parent_id",'cat_name','position','home'),"home=1","ORDER BY position asc");
		if(!empty($a))
		{
			return $a;
		}
		else
		{
			echo "Khong co du lieu";
		}
	}
	
}
?>