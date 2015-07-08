<?php
	require_once('includes/config.php');	
	require_once('includes/class.php');
	require_once('includes/class-menu.php');
	require_once('includes/function.php');
	require_once('includes/class-config.php');
	require_once('includes/class-user.php');
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
				<p class="p1">Hotline <b>1800 1900</b></p>
				<p class="p2">Nhà phân phối độc quyền chính thức tại Việt Nam</p>
			<div class="header-icon">
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
				<a href="view/cart.php"><img id="img2" src="images/icon-sp.jpg" />
				<b><?php echo isset($_SESSION['tong_so_sp']) ? $_SESSION['tong_so_sp'] : "0"; ?> </b>sản phẩm</a>
                <?php if(isset($_SESSION['user-khachhang']))
					{
				?>
						<p style=" margin-top:2px; margin-left:40px"><a href="logout.php">Logout</a></p>
                <?php
					}
				?>
                
			</div>
			</div> <!--End .header-info-->
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
	<div id="banner">
		<div id="main-banner">
			<img src="images/main-banner.jpg "/>
		</div><!--End #main-banner-->
		<div id="muti-banner">
			<ul>
				<li><img src="images/banner1.jpg" /></li>
				<li><img src="images/banner2.jpg" /></li>
				<li><img src="images/banner3.jpg" /></li>
			</ul>
		</div><!--End #muti-banner-->
	</div><!--End #banner-->