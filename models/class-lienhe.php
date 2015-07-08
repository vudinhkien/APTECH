<?php
class lienhe extends database
{
	var $table = "lienhe";
	
	function insertLienhe($fullname,$email,$mobile,$noidung)
	{
		return parent::insert_data($this->table,array('fullname'=>$fullname,'email'=>$email,'mobile'=>$mobile,'noidung'=>$noidung));
	}
	function updateLienhe($fullname,$email,$mobile,$noidung,$dieukien)
	{
	
		if($fullname!='')
		{
			$a['fullname'] = $fullname;
		}
		if($email!='')
		{
			$a['email'] = $email;
		}

		if($mobile!='')
		{
			$a['mobile'] = $mobile;
		}
		if($noidung!='')
		{
			$a['noidung'] = $noidung;
		}
		
		return parent::updateDb($this->table,$a,"lh_id=".$dieukien);
	}
	function getLienheById($id)
	{
		$a = parent::selectDb($this->table,array('fullname','email','mobile','noidung'),"lh_id=".$id);
		//print_r($a);
		if(!empty($a))
		{
			return $a[0];
		}
		else
		{
			echo "Khong co du lieu";
		}
	}
	
	function delLienhe($uid)
	{
		return parent::deleteDb($this->table,"lh_id=$uid");
	}
	function getAllLienhe($order_by='')
	{
		if($order_by != '')
		{	
			return parent::selectDb($this->table,array("lh_id","fullname","email","mobile","noidung"),'','ORDER BY ' .$order_by.' ASC');
		}
		else
		{
			return parent::selectDb($this->table,array("lh_id","fullname","email","mobile","noidung"),'','');
		}
	}
	
}

?>