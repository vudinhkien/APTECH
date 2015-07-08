<?php
require_once('config.php');
require_once('class.php');
require_once('class-user.php');
$user_obj = new user();

$user_check = mysqli_real_escape_string($user_obj->dbc,$_GET['user']);
$pass_check = mysqli_real_escape_string($user_obj->dbc,$_GET['pass']);

if($user_obj->checkLogin($user_check,md5($pass_check)))
{
	echo "dang nhap thanh cong";
}
else
{
	echo "dang nhap that bai";
}
if (preg_match('/^[A-Za-z]{1}[A-Za-z0-9_]{5,31}$/', "datbka",$test))
{
    echo 'succeeded';
	print_r($test);
}
else
{
    echo 'failed';
	print_r($test);
}
echo time();
?>