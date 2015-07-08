<?php
	require_once('../../models/config.php');
	require_once('../../models/class.php');
	require_once('../../models/class-user.php');
	if($_GET['id'] and $_GET['data'])
	{
		$id = $_GET['id'];
		$data = $_GET['data'];
		$key = $_GET['key'];
		$user = new user();
		if($key=="user"){
			if($user->updateUser($data,'','','','','','','',$id)){
				echo "true";
			}
			else{
				echo "false";
			}
		}
		elseif($key=="email"){
			if($user->updateUser('','','',$data,'','','','',$id)){
				echo "true";
			}
			else{
				echo "false";
			}
		}
		elseif($key=="fullname"){
			if($user->updateUser('','',$data,'','','','','',$id)){
				echo "true";
			}
			else{
				echo "false";
			}
		}
		elseif($key=="status")
		{
			if($user->updateUser('','','','','','',$data,'',$id)){
				echo "select-true";
			}
			else{
				echo "select-false";
			}
		}
		elseif($key=="mobile")
		{
			if($user->updateUser('','','','','',$data,'','',$id)){
				echo "true";
			}
			else{
				echo "false";
			}
		}
		elseif($key=="address")
		{
			if($user->updateUser('','','','',$data,'','','',$id)){
				echo "true";
			}
			else{
				echo "false";
			}
		}
	}
	
?>