<?php
class user extends database
{
	var $table = "user";
	
	function insertUser($username,$password,$fullname,$email,$address,$mobile,$status,$created_date,$avatar)
	{
		return parent::insert_data($this->table,array('user'=>$username,'pass'=>$password,'fullname'=>$fullname,'email'=>$email,'address'=>$address,'mobile'=>$mobile,'status'=>$status,'created_date'=>$created_date,'avatar'=>$avatar));
	}
	function updateUser($username,$password,$fullname,$email,$address,$mobile,$status,$avatar,$dieukien)
	{
		if($username!='')
		{
			$a['user'] = $username;
		}
		if($password!='')
		{
			$a['pass'] = $password;
		}
		if($fullname!='')
		{
			$a['fullname'] = $fullname;
		}
		if($email!='')
		{
			$a['email'] = $email;
		}
		if($address!='')
		{
			$a['address'] = $address;
		}
		if($mobile!='')
		{
			$a['mobile'] = $mobile;
		}
		if($status!='')
		{
			$a['status'] = $status;
		}
		if($avatar!='')
		{
			$a['avatar'] = $avatar;
		}
		return parent::updateDb($this->table,$a,"u_id=".$dieukien);
	}
	function getUserById($id)
	{
		$a = parent::selectDb($this->table,array('user','pass','fullname','email','address','mobile','status','avatar','created_date'),"u_id=".$id);
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
	function getUserByUsername($user)
	{
		$a = parent::selectDb($this->table,array('u_id','user','fullname','email','address','mobile','status','avatar','created_date'),"user= '$user'");
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
	function delUser($uid)
	{
		return parent::deleteDb($this->table,"u_id=$uid");
	}
	function getAllUser($order_by='')
	{
		if($order_by != '')
		{	
			return parent::selectDb($this->table,array("u_id","user","fullname",'email','address','mobile','status','avatar'),'','ORDER BY ' .$order_by.' ASC');
		}
		else
		{
			return parent::selectDb($this->table,array("u_id","user","fullname",'email','address','mobile','status','avatar'),'','');
		}
	}
	function getsttbyUser()
	{
		
	}
	function checkLogin($username,$password)
	{
		$a = parent::selectDb($this->table,array('user','pass'),"user='$username' and pass='$password'");
		if(!empty($a))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function checkLoginAdmin($username,$password)
	{
		$a = parent::selectDb($this->table,array('user','pass','status'),"user='$username' and pass='$password' and status =0");
		if(!empty($a))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

?>