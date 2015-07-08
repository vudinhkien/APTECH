<?php
session_start();
include('../models/config.php');
include('../models/class.php');
include('../models/class-orders.php');
if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['mobile'])){
	$ship_address = array();
	$ship_address['name'] = $_POST['name'];
	$ship_address['address'] = $_POST['address'];
	$ship_address['mobile'] = $_POST['mobile'];
	$method_pay = $_POST['method_pay'];
	$orders = new orders();
	if($orders->insertOrders("APUS#000",$_SESSION['u_id'],json_encode($_SESSION['cart']),$_SESSION['total_order'],json_encode($ship_address),$method_pay,0))
	{
		$_SESSION['cart'] = '';
		$_SESSION['total_order'] = '';
		$_SESSION['tong_so_sp'] = '';
			echo '<script type="text/javascript">';
			echo 'alert("Da dat hang!\nVui long cho xet duyet!"); window.location.href = "../index.php";';
            echo '</script>';
	}
	else
		{
			echo "<br>Fail!";
			//header("Location: index.php?view=form-product&stt=fail");
		}
}

?> 