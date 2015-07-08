<?php

if(isset($_POST['email']) && isset ($_POST['noidung']) && isset ($_POST['fullname'])&& isset ($_POST['mobile']))
{
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$noidung = $_POST['noidung'];
$kien = mysqli_connect('sql104.byethost7.com','b7_16299504','vannhucu1000','b7_16299504_kien') or die ('khong the ket noi');
mysqli_set_charset($kien,'utf8');

$sql = "INSERT INTO lienhe VALUES('','$fullname','$email','$mobile','$noidung')";

if(mysqli_query($kien,$sql))
{
			echo '<script type="text/javascript">';
			echo 'alert("Thành công!\nCám ơn ý kiến của bạn!"); window.location.href = "../index.php";';
            echo '</script>';
}
else
{
			echo '<script type="text/javascript">';
			echo 'alert("Thất bại!\nVui lòng thử lại!");';
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
</head>
<body>
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


<div style=" width:700px;padding-bottom:100px"class="form_login">
	<div style="text-align:center; margin-bottom:40px; font-size:2em; color:#FFF; font-weight:bold" class="titulo"><marquee behavior="scroll" direction="left" scrollamount="10" style="z-index:9999">SỰ ĐÓNG GÓP CỦA QUÝ KHÁCH LÀ NIỀM VINH HẠNH CỦA CHÚNG TÔI</marquee></div>
    <section class="login">
        <div class="titulo">Liên hệ với chúng tôi</div>
        
         <form accept-charset="UTF-8" action="view/lienhe.php" method="post">
                      <p>Fullname</p><input type="text" placeholder="Example : Vũ Đình Kiên" onblur="check_fullname(this.id)" id="fullname" name="fullname">
                      <p>Email</p><input onblur="check_email(this.id)" id="email" style="width:238px;height:45px; background-color:#141414; border:#141414 solid 1px" type="email" placeholder="Email" name="email">
                      <p>Mobile</p><input onblur="check_mobile(this.id)" id="mobile" type="text" placeholder="Mobile" name="mobile">
                     <p>Nội Dung</p> <textarea style="width:238px;background-color:#141414; color:#FFF; border:#141414 solid 1px" id="noidung" name="noidung"></textarea>
                    
                     <input type="submit" class="btn btn-primary btn-block btn-md btn-responsive" value="Gửi ý kiến" id="btnSubmit" name="btnSubmit">
                     <a href="index.php"><input style="margin-left:30px;" type="button" value="Hủy Bỏ"></a>
        </form>
    </section>          
 </div>
 </body>
 </html>