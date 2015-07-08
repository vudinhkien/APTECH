<?php

if(isset($_POST['user']) && isset ($_POST['pass']) && isset ($_POST['fullname']))
{
$user = $_POST['user'];
$pass = md5($_POST['pass']);
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];
$kien = mysqli_connect('localhost','root','','project') or die ('khong the ket noi');
mysqli_set_charset($kien,'utf8');

$sql = "INSERT INTO user VALUES('','$user','$pass','$fullname','$email','$address','mobile','','','')";

if(mysqli_query($kien,$sql))
{
			echo '<script type="text/javascript">';
			echo 'alert("Thành công!\nVui lòng đăng nhập để mua hàng!"); window.location.href = "login.php";';
            echo '</script>';
}
else
{
			echo '<script type="text/javascript">';
			echo 'alert("Thất bại!\nVui lòng đăng ký lại!"); window.location.href = "dangky.php";';
            echo '</script>';
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Xe đạp điện APUS</title>
<meta charset="UTF-8">
<link href="css/style.css" rel="stylesheet" />
<style>
.login input
{
	color:#FFF;
	width:80px;
	height:30px;
    background-color:#121212;
	margin-top:20px;
}
</style>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>

</head>
<body>

<div style="padding-bottom:100px"class="form_login">
    <section class="login">
        <div class="titulo">ĐĂNG KÝ</div>
        
         <form accept-charset="UTF-8" action="dangky.php" method="post">
                      <p>Tên đăng nhập</p>  <input type="text" placeholder="Tên đăng nhập" onblur="check_user(this.id)" id="user" name="user">
                      <p>Họ và tên</p><input type="text" placeholder="Example : Vũ Đình Kiên" onblur="check_fullname(this.id)" id="fullname" name="fullname">
                      <p>Mật khẩu</p><input type="password" placeholder="Mật khẩu" onblur="check_pass(this.id)" id="pass" name="pass">
                      <p>Email</p><input onblur="check_email(this.id)" id="email" style="width:238px;height:59px; border:#141414 solid 1px" type="email" placeholder="Email" name="email">
                      <p>Điện thoại</p><input onblur="check_mobile(this.id)" id="mobile" type="text" placeholder="Điện thoại" name="mobile">
                      <p>Địa chỉ</p><input onblur="check_address(this.id)" id="address" type="text" placeholder="Địa chỉ" name="address">
                      
                    
                     <input type="submit" class="btn btn-primary btn-block btn-md btn-responsive" value="Đăng ký" id="btnSubmit" name="btnSubmit">
                     <a href="index.php"><input style="margin-left:30px;" type="button" value="Hủy Bỏ"></a>
        </form>
    </section>          
 </div>
 
 </body>
 </html>