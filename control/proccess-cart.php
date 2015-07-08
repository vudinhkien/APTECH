<?php
session_start();
$id		= $_POST['id'];
$image	= $_POST['image'];
$price	= $_POST['price'];
$name	= $_POST['name'];
if(!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
	}
if(!isset($_SESSION['cart'][$id]))
{
	$_SESSION['cart'][$id] = array('image'=>$image,'price'=>round($price,0),'name'=>$name,'soluong'=>1);
}
else
{
	$_SESSION['cart'][$id]['soluong']++;
	if($_SESSION['cart'][$id]['soluong']>=100)
	{
		$_SESSION['cart'][$id]['soluong'] = 99;
	}
}
if(!isset($_SESSION['tong_so_sp']))
{
	$_SESSION['tong_so_sp'] = '';
}
$soluong = 0;
foreach($_SESSION['cart'] as $val)
{
	$soluong += $val['soluong'];
}
$_SESSION['tong_so_sp'] = $soluong;
echo json_encode($_SESSION['tong_so_sp']);
?>