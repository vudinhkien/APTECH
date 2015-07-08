<?php
session_start();
if(!isset($_SESSION['useradmin']))
{
	header('location: login.php');
	die();	
}
if(!isset($_SESSION["timeout"])){
     $_SESSION['timeout'] = time();
}
if ($_SESSION['timeout'] + 30 * 60 < time()) {
	if (ini_get("session.use_cookies")) 
	{
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]);
	}
	session_destroy();
	header('location: login.php');
	die();
}
else
{
	$_SESSION['timeout'] = !isset($_SESSION['remember']) ? time() : time() + 1440 * 60;
}
require_once('../models/config.php');	
require_once('../models/class.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Quản trị nội dung</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="plugin-style/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/styles/black.css" rel="stylesheet" type="text/css" id="colorscheme" />
    <link href="css/panel.css" rel="stylesheet" type="text/css"/>
    <link href="css/metisMenu.css" rel="stylesheet" type="text/css"/>    
    <!-- end of global css -->    
    <!--page level css -->
    <link href="css/pages/calendar_custom.css" rel="stylesheet" type="text/css" />
    
     <link href="plugin-style/bootstrap-wysihtml5-rails-b3/vendor/assets/stylesheets/bootstrap-wysihtml5/core-b3.css"  rel="stylesheet" media="screen"/>
    <link href="css/pages/editor.css" rel="stylesheet" type="text/css"/>
    
     <link href="plugin-style/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="plugin-style/x-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />
    <link href="css/pages/user_profile.css" rel="stylesheet" type="text/css"/>
    <link href="css/custom-css.css" rel="stylesheet" type="text/css"/>
    <!--end of page level css-->
</head>

<body class="skin-josh">
    <?php include_once('view/header.php'); ?>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <?php include_once('view/left-sidebar.php'); ?>
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Welcome to Dashboard</h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <a href="#">
                            <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>
                            Trang chủ
                        </a>
                    </li>
                </ol>
            </section>
            <?php include_once('view/main-content.php');?>
        </aside>
        <!-- right-side -->
    </div>
   <?php include_once('view/footer.php');?>
</body>
</html>
