<?php
session_start();
if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
echo json_encode('die');
die;	
}
if(isset($_POST['act'])){
	switch ($_POST['act']){
		case 'tru':
			$id = $_POST['id'];
			if(!isset($_POST['val']) || empty($_POST['val'])){
				$val = 0;
			}
			else{
				$val = $_POST['val']<100 ? $_POST['val'] : 100 ;
			}
			
			if($_SESSION['cart'][$id]['soluong']!=$val){
				$_SESSION['cart'][$id]['soluong'] = $val-1;
			}
			else{
				$_SESSION['cart'][$id]['soluong']--;
			}
			if($_SESSION['cart'][$id]['soluong']<=0)
			{
				unset($_SESSION['cart'][$id]);
			}
			$soluong = 0;
			foreach($_SESSION['cart'] as $val)
			{
				$soluong += $val['soluong'];
			}
			$_SESSION['tong_so_sp'] = $soluong;
			echo json_encode($_SESSION['cart']);
			die;
		case 'cong':
			$id = $_POST['id'];
			if(!isset($_POST['val']) || empty($_POST['val'])){
				$val = 0;
			}
			else{
				$val = $_POST['val']<100 ? $_POST['val'] : 99 ;
			}
			
			if($_SESSION['cart'][$id]['soluong']!=$val){
				$_SESSION['cart'][$id]['soluong'] = $val+1;
			}
			else{
				$_SESSION['cart'][$id]['soluong']++;
			}
			
			if($_SESSION['cart'][$id]['soluong']>=100)
			{
				$_SESSION['cart'][$id]['soluong'] = 99;
			}
			echo json_encode($_SESSION['cart']);
			$soluong = 0;
			foreach($_SESSION['cart'] as $val)
			{
				$soluong += $val['soluong'];
			}
			$_SESSION['tong_so_sp'] = $soluong;
			die;
		case 'xoa':
			$id = $_POST['id'];
			unset($_SESSION['cart'][$id]);
			echo json_encode($_SESSION['cart']);
			$soluong = 0;
			foreach($_SESSION['cart'] as $val)
			{
				$soluong += $val['soluong'];
			}
			$_SESSION['tong_so_sp'] = $soluong;
			
			die;	
		case 'keypress':
			$id = $_POST['id'];	
			if(!isset($_POST['number']) || empty($_POST['number'])){
				$number = 0;
			}
			else{
				$number = (int)$_POST['number'];
			}
			
			if($number>0){
				$_SESSION['cart'][$id]['soluong'] = $number;
				$soluong = 0;
				foreach($_SESSION['cart'] as $val)
				{
					$soluong += $val['soluong'];
				}
				$_SESSION['tong_so_sp'] = $soluong;
				echo json_encode($_SESSION['cart']);
				die;
			}
			elseif($number==0){
				unset($_SESSION['cart'][$id]);
				$soluong = 0;
				foreach($_SESSION['cart'] as $val)
				{
					$soluong += $val['soluong'];
				}
				$_SESSION['tong_so_sp'] = $soluong;
				echo json_encode($_SESSION['cart']);
				die;
			}
			else{
				$_SESSION['cart'][$id]['soluong'] = 1;
				$soluong = 0;
				foreach($_SESSION['cart'] as $val)
				{
					$soluong += $val['soluong'];
				}
				$_SESSION['tong_so_sp'] = $soluong;
				echo json_encode($_SESSION['cart']);
				die;
			}
		case ">99":
			$id = $_POST['id'];
			$_SESSION['cart'][$id]['soluong'] = 99;
			echo json_encode($_SESSION['cart'][$id]['soluong']);
			die;
	}
}

?>