<?php
class menu extends database{
	var $table = "menu";
	function insertMenu($menu_gr_id,$name,$position,$url,$mn_type_id,$parent=0)
	{
		return parent::insert_data($this->table,array('menu_gr_id'=>$menu_gr_id,'menu_name'=>$name,'position'=>$position,'url'=>$url,'parent_id'=>$parent,'mn_type_id'=>$mn_type_id));
	}
	function updateMenu($menu_gr_id,$name,$position,$parent,$menu_type,$url='',$dieukien)
	{
		if($menu_gr_id!='')
		{
			$a['menu_gr_id'] = $menu_gr_id;
		}
		if($name!='')
		{
			$a['menu_name'] = $name;
		}
		if($position!='')
		{
			$a['position'] = $position;
		}
		if($parent!='')
		{
			$a['parent_id'] = $parent;
		}
		if($menu_type!='')
		{
			$a['mn_type_id'] = $menu_type;
		}
		if($url!='')
		{
			$a['url'] = $url;
		}
		return parent::updateDb($this->table,$a,"menu_id=".$dieukien);
	}
	function delMenu($menu_id)
	{
		return parent::deleteDb($this->table,"menu_id=$menu_id");
	}
	function getAllMenu($menu_gr_id='',$order_by='')
	{
		if($order_by!='' && $menu_gr_id==''){
			return parent::selectjoinDb(array("menu","menu_type","menu_group"),array("menu.mn_type_id=menu_type.mn_type_id","menu.menu_gr_id=menu_group.menu_gr_id"),array('inner join','left join'),array('menu.menu_id','menu.menu_gr_id','menu_name','position','url','parent_id','menu.mn_type_id','type_name','view','menu_group_name'),'','ORDER BY ' .$order_by.' ASC');
		}
		elseif($order_by=='' && $menu_gr_id=='')
		{
			 return parent::selectjoinDb(array("menu","menu_type","menu_group"),array("menu.mn_type_id=menu_type.mn_type_id","menu.menu_gr_id=menu_group.menu_gr_id"),array('inner join','left join'),array('menu.menu_id','menu.menu_gr_id','menu_name','position','url','parent_id','menu.mn_type_id','type_name','view','menu_group_name'),'','');
		}
		elseif($order_by!='' && $menu_gr_id!='')
		{
			return parent::selectjoinDb(array("menu","menu_type","menu_group"),array("menu.mn_type_id=menu_type.mn_type_id","menu.menu_gr_id=menu_group.menu_gr_id"),array('inner join','left join'),array('menu.menu_id','menu.menu_gr_id','menu_name','position','url','parent_id','menu.mn_type_id','type_name','view','menu_group_name'),'menu.menu_gr_id='.$menu_gr_id,'ORDER BY ' .$order_by.' ASC');
		}
		elseif($order_by=='' && $menu_gr_id!='')
		{
			return parent::selectjoinDb(array("menu","menu_type","menu_group"),array("menu.mn_type_id=menu_type.mn_type_id","menu.menu_gr_id=menu_group.menu_gr_id"),array('inner join','left join'),array('menu.menu_id','menu.menu_gr_id','menu_name','position','url','parent_id','menu.mn_type_id','type_name','view','menu_group_name'),'menu.menu_gr_id='.$menu_gr_id,'');
		}
	}
	function getAllMenuExceptId($id,$menu_gr_id='',$order_by='')
	{
		if($order_by!='' && $menu_gr_id==''){
			return parent::selectjoinDb(array("menu","menu_type","menu_group"),array("menu.mn_type_id=menu_type.mn_type_id","menu.menu_gr_id=menu_group.menu_gr_id"),array('inner join','left join'),array('menu.menu_id','menu.menu_gr_id','menu_name','position','url','parent_id','menu.mn_type_id','type_name','view','menu_group_name'),'menu.menu_id!='.$id,'ORDER BY ' .$order_by.' ASC');
		}
		elseif($order_by=='' && $menu_gr_id=='')
		{
			 return parent::selectjoinDb(array("menu","menu_type","menu_group"),array("menu.mn_type_id=menu_type.mn_type_id","menu.menu_gr_id=menu_group.menu_gr_id"),array('inner join','left join'),array('menu.menu_id','menu.menu_gr_id','menu_name','position','url','parent_id','menu.mn_type_id','type_name','view','menu_group_name'),'menu.menu_id!='.$id,'');
		}
		elseif($order_by!='' && $menu_gr_id!='')
		{
			return parent::selectjoinDb(array("menu","menu_type","menu_group"),array("menu.mn_type_id=menu_type.mn_type_id","menu.menu_gr_id=menu_group.menu_gr_id"),array('inner join','left join'),array('menu.menu_id','menu.menu_gr_id','menu_name','position','url','parent_id','menu.mn_type_id','type_name','view','menu_group_name'),'menu.menu_id!='.$id.' and menu.menu_gr_id='.$menu_gr_id,'ORDER BY ' .$order_by.' ASC');
		}
		elseif($order_by=='' && $menu_gr_id!='')
		{
			 return parent::selectjoinDb(array("menu","menu_type","menu_group"),array("menu.mn_type_id=menu_type.mn_type_id","menu.menu_gr_id=menu_group.menu_gr_id"),array('inner join','left join'),array('menu.menu_id','menu.menu_gr_id','menu_name','position','url','parent_id','menu.mn_type_id','type_name','view','menu_group_name'),'menu.menu_id!='.$id.' and menu.menu_gr_id='.$menu_gr_id,'');
		}
	}
	function getAllMenuKieuView($view,$order_by='')
	{
		if($order_by!=''){
			return parent::selectjoinDb(array("menu","menu_type","menu_group"),array("menu.mn_type_id=menu_type.mn_type_id","menu.menu_gr_id=menu_group.menu_gr_id"),array('inner join','left join'),array('menu.menu_id','menu.menu_gr_id','menu_name','position','url','parent_id','menu.mn_type_id','type_name','view','menu_group_name'),'view='."'".$view."'",'ORDER BY ' .$order_by.' ASC');
		}
		else
		{
			 return parent::selectjoinDb(array("menu","menu_type","menu_group"),array("menu.mn_type_id=menu_type.mn_type_id","menu.menu_gr_id=menu_group.menu_gr_id"),array('inner join','left join'),array('menu.menu_id','menu.menu_gr_id','menu_name','position','url','parent_id','menu.mn_type_id','type_name','view','menu_group_name'),'view='."'".$view."'",'');
		}
	}
	function getMenuById($id)
	{
		$a = parent::selectjoinDb(array("menu","menu_type","menu_group"),array("menu.mn_type_id=menu_type.mn_type_id","menu.menu_gr_id=menu_group.menu_gr_id"),array('inner join','left join'),array('menu.menu_id','menu.menu_gr_id','menu_name','position','url','parent_id','menu.mn_type_id','type_name','view','menu_group_name'),"menu.menu_id=".$id);
		if(!empty($a))
		{
			return $a[0];
		}
		else
		{
			echo "Khong co du lieu";
		}
	}
	function getMenuByParentId($menu_id)
	{
		$a = parent::selectDb($this->table,array("menu_id,parent_id"),'parent_id='.$menu_id);
		if(!empty($a))
		{
			return $a;
		}
		else
		{
			return false;
		}
	}
}
class menu_type extends database{
	var $table = "menu_type";
	function insertMenuType($name,$view)
	{
		return parent::insert_data($this->table,array('type_name'=>$name,'view'=>$view));
	}
	function updateMenuType($name,$view,$dieukien)
	{
		if($name!='')
		{
			$a['type_name'] = $name;
		}
		if($view!='')
		{
			$a['view'] = $view;
		}

		return parent::updateDb($this->table,$a,"mn_type_id=".$dieukien);
	}
	function delMenuType($menu_type_id)
	{
		return parent::deleteDb($this->table,"mn_type_id=$menu_type_id");
	}
	function getAllMenuType($order_by='')
	{
		if($order_by!=''){
			return parent::selectDb($this->table,array("type_name","mn_type_id","view"),'','ORDER BY ' .$order_by.' ASC');
		}
		else
		{
			return parent::selectDb($this->table,array("type_name","mn_type_id","view"),'','');
		}
	}
	function getMenuTypeById($id)
	{
		$a = parent::selectDb($this->table,array('mn_type_id','type_name','view'),"mn_type_id=".$id);
		if(!empty($a))
		{
			return $a[0];
		}
		else
		{
			echo "Khong co du lieu";
		}
	}
}
class menu_group extends database{
	var $table = "menu_group";
	function insertMenuGroup($name,$status)
	{
		return parent::insert_data($this->table,array('menu_group_name'=>$name,'status'=>$status));
	}
	function updateMenuGroup($name,$status,$dieukien)
	{
		if($name!='')
		{
			$a['menu_group_name'] = $name;
		}
		if($status!='')
		{
			$a['status'] = $status;
		}
		return parent::updateDb($this->table,$a,"menu_gr_id=".$dieukien);
	}
	function delMenuGroup($menu_group_id)
	{
		return parent::deleteDb($this->table,"menu_gr_id=$menu_group_id");
	}
	function getAllMenuGroup($status='',$order_by='')
	{
		if($order_by!='' && $status==''){
			return parent::selectDb($this->table,array("menu_gr_id","menu_group_name","status"),'','ORDER BY ' .$order_by.' ASC');
		}
		elseif($order_by=='' && $status=='')
		{
			return parent::selectDb($this->table,array("menu_gr_id","menu_group_name","status"),'','');
		}
		elseif($order_by!='' && $status!='')
		{
			return parent::selectDb($this->table,array("menu_gr_id","menu_group_name","status"),'status='.$status,'ORDER BY ' .$order_by.' ASC');
		}
		elseif($order_by=='' && $status!='')
		{
			return parent::selectDb($this->table,array("menu_gr_id","menu_group_name","status"),'status='.$status,'');
		}
	}
	function getMenuGroupById($id)
	{
		$a = parent::selectDb($this->table,array('menu_gr_id','menu_group_name','status'),"menu_gr_id=".$id);
		if(!empty($a))
		{
			return $a[0];
		}
		else
		{
			echo "Khong co du lieu";
		}
	}
}
?>