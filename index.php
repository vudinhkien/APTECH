<?php 
session_start();
require_once("models/config.php");
require_once("models/class.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Xe đạp điện APUS</title>
<meta charset="UTF-8">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel=icon  href="images/icon-k.png"sizes="32x32" type="image/png"/>

<script language="javascript" type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/autoNumeric.js"></script>
<script language="javascript" type="text/javascript" src="js/okzoom.js"></script>
<script language="javascript" type="text/javascript" src="js/main.js"></script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</head>
<body>
<div id="wrapper">


				
		<?php
        include ("view/header.php");

		include("view/col-left.php");
		include ("view/main-content.php");
		?>
        <!--End-->
        <div id="footer">
            <div class="footer1">
                    <img class="logo-footer" src="images/logo-footer.jpg" />
                    <div class="chu-footer1">
                        <ul>
                        <li> 450 Xã Đàn - Đống Đa - HN</li>
                        <li> Tell : 0989690901 - 01632001274</li>
                        <li> 450 Xã Đàn - Đống Đa - TP.HCM</li>
                        <li> Tell : 0989690901 - 01632001274</li>
                        <li> 450 Xã Đàn - Đống Đa - Đà Nẵng</li>
                        <li> Tell : 0989690901 - 01632001274</li>
                        </ul>
                    </div>
                    <div class="chu-footer2">
                        <ul>
                        <li style="font-weight:bold"> Thời gian làm việc</li>
                        <li>Từ 8h30 - 19h30 hàng ngày</li>
                        <li style="font-weight:bold"> Góp ý về dịch vụ sản phẩm</li>
                        <li>Facebook: <a target="_blank" href="https://www.facebook.com/sad.moon.587">Vũ Đình Kiên</a></li>
                       	<li style="font-weight:bold"> Liên hệ và hợp tác kinh doanh</li>
                        <li>Email: Khigiacmove.uneti@gmail.com</li>
                        </ul>
                    </div>
                    <div class="chu-footer3">
                        <ul>
                        <li style="font-weight:bold"> Liên kết với chúng tôi trên các mạng xã hội</li></br>
                          <li>
                           <div class="fb-page" data-href="https://www.facebook.com/CNTTUNETI/" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/sad.moon.587">Facebook</a></blockquote></div></div>
                          </li>
                            
                        </ul>
                    </div>
            </div>
            <!--end footer1-->
            <div style="float:left" class="footer2">
                    <ul>
                            <li class="footer2-1">Mộ Trạch - Bình Giang - Hải Dương</li>
                            <li class="footer2-2"> Designed by Vũ Đình Kiên</li>
                    </ul>
             </div>
         <!--end footer2-->
    </div>
	<!--End #footer-->
    <div id="bttop">
             <a href="#"><span style="font-size:2em; color:#0C0; margin-bottom::5px;"> &uarr;</span> <img src="images/top.jpg" width="50" height="50"></a>
    </div>
    <!--End #lên top-->
</div><!--End #wrapper-->
</body>
</html>