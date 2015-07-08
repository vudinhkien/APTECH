<?php

session_start();
$str = '';

if (isset($_POST['user']) && isset($_POST['password']))
{
	require_once('../models/config.php');
	require_once('../models/class.php');
	require_once('../models/class-user.php');
	$user_obj = new user();
	$user = addslashes($_POST['user']);
	$pass = addslashes($_POST['password']);
	if($user_obj->checkLogin($user,md5($pass)))
	{
		
		
		$user_info = $user_obj->getUserByUsername($user);
		$_SESSION['useradmin'] = $user;
		$_SESSION['fullname'] = $user_info['fullname'];
		$_SESSION['u_id'] = $user_info['u_id'];
		$_SESSION['status'] = $user_info['status'];
		if($user_info['status']!=0)
		{
		
			$_SESSION['IsAuthorized'] = true;
			if(isset($_POST['remember']))
			{
			$_SESSION['timeout'] = time() + 1440 * 60; // thông tin login được lưu giữ trong 1 ngày
			$_SESSION['remember'] = 1;
			}
			header('location: index.php');	
			die();
		}
	else
		{
			$str = '<b style="color:red">Thông tin đăng nhập của bạn không đúng. Xin vui lòng thử lại</b>';	
		}	
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Admin Login | News Aptech</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <link href="css/pages/login2.css" rel="stylesheet" />
    <!-- styles of the page ends-->
</head>

<body>
    <div class="container">
        <div class="row vertical-offset-100">
            <div class=" col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Đăng nhập</h3>
                    </div>
                    <div class="panel-body">
                        <form accept-charset="UTF-8" role="form" id="login_form" action="login.php" method="post">
                            <fieldset>
                                <div class="form-group input-group">
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="at" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
                                    </div>
                                    <input class="form-control" placeholder="Username" name="user" type="text" />
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="key" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
                                    </div>
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" />
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input name="remember" type="checkbox" value="1" class="minimal-blue">
                                        Remember Me
                                    </label>
                                </div>
                              <input type="submit" class="btn btn-primary btn-block btn-md btn-responsive" value="Login" id="btnSubmit" name="btnSubmit">
                                <?php echo $str ?>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- global js -->
    <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>