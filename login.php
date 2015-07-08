<?php
session_start();
$str = '';
if(isset($_SESSION['user-khachhang']))
{
	header('location: index.php');	
}

if (isset($_POST['user']) && isset($_POST['password']))
{
	require_once('models/config.php');
	require_once('models/class.php');
	require_once('models/class-user.php');
	$user_obj = new user();
	$user = addslashes($_POST['user']);
	$pass = addslashes($_POST['password']);
	if($user_obj->checkLogin($user,md5($pass)))
	{
		$user_info = $user_obj->getUserByUsername($user);
		$_SESSION['user-khachhang'] = $user;
		$_SESSION['fullname'] = $user_info['fullname'];
		$_SESSION['u_id'] = $user_info['u_id'];
		$_SESSION['IsAuthorized'] = true;
		if(isset($_POST['remember'])){
			$_SESSION['timeout'] = time() + 1440 * 60; // thông tin login được lưu giữ trong 1 ngày
			$_SESSION['remember'] = 1;
			}
		header('location: index.php');	
		die();
	}
	else
	{
		$str = '</br><b style="color:red">Thông tin đăng nhập của bạn không đúng. Xin vui lòng thử lại</b>';	
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
</head>
<body>

<div style="padding-bottom:200px" class="form_login">
    <section class="login">
        <div class="titulo">ĐĂNG NHẬP</div>
         <form accept-charset="UTF-8" role="form" id="login_form" action="login.php" method="post" enctype="application/x-www-form-urlencoded">
            <input type="text" required title="Username required" placeholder="Tên đăng nhập" data-icon="U" name="user">
            <input type="password" required title="Password required" placeholder="Mật khẩu" data-icon="x" name="password">
            <div class="olvido">
                <div style="color:#FFF; font-size:1.4em; margin-top:-2px" class="col">
                 <label>
                  <input style=" padding-top:1px;" name="remember" type="checkbox" value="1" class="minimal-blue">
                   Nhớ mật khẩu
                  </label>
                </div>
                <div class="col"><a href="#" title="Fotgot Password">Quên mật khẩu</a></div>
            </div>
             <input style="color:#FFF;width:80px;height:30px; background-color:#121212;margin-top:20px;" type="submit" class="btn btn-primary btn-block btn-md btn-responsive" value="Đăng Nhập" id="btnSubmit" name="btnSubmit">
             <a href="index.php"><input style="color:#FFF; margin-left:30px;width:80px;height:30px; background-color:#121212;margin-top:20px;"  type="button" value="Quay lại"></a>
               <?php echo $str ?>
        </form>
    </section>          
 </div>
 
 </body>
 </html>