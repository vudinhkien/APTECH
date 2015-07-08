<?php
	require_once('models/config.php');	
	require_once('models/class.php');
	require_once('models/class-menu.php');
	require_once('models/function.php');
	require_once('models/class-config.php');
	require_once('models/class-user.php');
	$menu_config_obj = new cauhinhchung();
	$menu_config_temp = $menu_config_obj->getConfigByDieukien("name='menu_config'");
	$menu_config = unserialize($menu_config_temp['values_data']);
	$menu_obj = new menu();
	//khai bao de in ra ten user
	$user_obj = new user();
	$taikhoan = $user_obj->getUserById('u_id');
?>
	<div id="header">
		<div id="logo">
			<img class="header-logo" src="images/logo.jpg" />
			<div class="header-info">
				<p class="p1">Hotline <b>0989690901</b></p>
				<p class="p2">Nhà phân phối độc quyền chính thức tại Việt Nam</p>
                </div>
                <div style="float:right;margin-top:70px; margin-right:-350px;" class="header-icon">
                    <img src="images/icon-me.jpg" />
                    <!-- kiem tra session co ton tai ko..neu ton tai hien thi ten,ko thi de nguyen -->
                    <?php if(isset($_SESSION['user-khachhang']))
                        {
                            echo $_SESSION['fullname'];
                        }
                        else
                        {
                    ?>
                    <a href="login.php">Đăng nhập</a>
                    <?php } ?>
                    
                    <a style="margin-left:10px;" target="_blank" href="dangky.php"><img src="images/dangky.jpg" width="20" height="20" /> Đăng Ký</a>
                    
					
					<?php if(isset($_SESSION['user-khachhang']))
                        {
                    ?>
                            <p style=" margin-top:2px; margin-left:40px"><a href="logout.php">Logout</a></p>
                    <?php
                        }
                    ?>
                    
                </div>
			 <!--End .header-info-->
		</div><!--End #logo-->
		<div class="group"></div>
		 <div class="menu">
        	<div class="main-menu">
        	<?php
			$menu_temp = $menu_obj->getAllMenu($menu_config['main_menu'],'position');
			echo buildMenuFrontend($menu_temp);
			
			?>
          	</div>
            <div class="search">
				<form action="index.php" method="get">
                	<input type="hidden" name="view" value="search" />
                    <input class="search1" type="text" placeholder="TÌM KIẾM" name="keyword" />
                    <input class="search1-buttom" type="submit" value="" />
                </form>
			</div>
             <!--end search-->
        </div>
	</div><!--End #header-->
    <?php
	if(!isset($_GET["view"]))
	{
	?>
	<div id="banner">
		<div id="main-banner">
			<img src="images/main-banner.jpg"/>
            <img src="images/banner-xe-dap-dien-bridgestone.jpg" />
            <img src="images/banner-to3.jpg" />
            <img src="images/9-cach-giup-tang-chieu-cao-tu-nhien (2).jpg" />
		</div><!--End #main-banner-->
		<div id="muti-banner">
			<ul>
				<li><a href="index.php?view=quangcao"><img src="images/banner1.jpg" /></a></li>
				<li><a href="index.php?view=quangcao"><img src="images/banner2.jpg" /></a></li>
				<li><a href="index.php?view=quangcao"><img src="images/banner3.jpg" /></a></li>
			</ul>
		</div><!--End #muti-banner-->
	</div><!--End #banner-->
    <?php
	}
	?>
    <div style="margin-top:10px; margin-bottom:10px;" class="themnem">
    <marquee behavior="scroll" direction="left" scrollamount="4" style="width:970px;">
   <img src="images/hot.png" width="32" height="32"> GIAO XE TRONG NGÀY. <span style="color:#0C0">BÁN HÀNG ĐÚNG GIÁ TRÊN WEB.</span> <span style="color:#F00">ĐẶT HÀNG QUA MẠNG HOẶC GỌI A.Kiên: 0989690901</span><img src="images/hot.png" width="32" height="32">
   </marquee>
    </div>