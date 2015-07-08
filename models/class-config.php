<?php
class cauhinhchung extends database{
	var $table = "cauhinhchung";
	function insertConfig($name,$values_data)
	{
		return parent::insert_data($this->table,array('name'=>$name,'values_data'=>$values_data));
	}
	function updateConfig($name,$values_data,$dieukien)
	{
		if($name!='')
		{
			$a['name'] = $name;
		}
		if($values_data!='')
		{
			$a['values_data'] = $values_data;
		}
		return parent::updateDb($this->table,$a,$dieukien);
	}
	function delConfig($id)
	{
		return parent::deleteDb($this->table,"id=$id");
	}
	function getAllConfig($order_by='')
	{
		if($order_by!=''){
			return parent::selectDb($this->table,array("id","name","values_data"),'','ORDER BY ' .$order_by.' ASC');
		}
		else
		{
			return parent::selectDb($this->table,array("id","name","values_data"),'','');
		}
	}
	function getConfigByDieukien($dieukien)
	{
		$a = parent::selectDb($this->table,array('id','name','values_data'),$dieukien);
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