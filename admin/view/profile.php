<?php
	require_once('../models/class-user.php');
	$user_obj = new user();
	$user_arr = $user_obj->getUserById($_SESSION['u_id']);
?>

<ul class="nav  nav-tabs ">
    <li class="active">
        <a href="#tab1" data-toggle="tab">
           <i class="livicon" data-name="user" data-size="16" data-c="#000" data-hc="#000" data-loop="true"></i>
        User Profile</a>
    </li>
    <li>
        <a href="#tab2" data-toggle="tab">
     <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
        Change Password</a>
    </li>
                           
</ul>
 <div  class="tab-content mar-top">
    <div id="tab1" class="tab-pane fade active in">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                           
                            User Profile
                        </h3>
    
                    </div>
                    <div class="panel-body">
                        <div class="col-md-4">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail img-file">
                                    <img data-src="holder.js/100%x100%" alt="..."></div>
                                <div id="image_src" data-id="1" class="fileinput-preview fileinput-exists thumbnail img-max"></div>
                                <div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input id="change_img" type="file" name="..."></span>
                                    <a href="#" id="remove" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    <a href="#" id="save_image" class="btn btn-default fileinput-exists" >Save</a>
                                    <div class="text-success" id="result_image"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="users">
    
                                        <tr>
                                            <td>User Name</td>
                                            <td>
                                                <a href="#" data-pk="<?php echo $_SESSION['u_id']; ?>" data-key="user" class="editable" data-title="Edit User Name"><?php echo $user_arr['user'];?></a>
                                            </td>
    
                                        </tr>
                                         <tr>
                                            <td>Fullname</td>
                                            <td>
                                                <a href="#" data-pk="<?php echo $_SESSION['u_id']; ?>" data-key="fullname" class="editable" data-title="Edit Full Name"><?php echo $user_arr['fullname'];?></a>
                                            </td>
    
                                        </tr>
                                        <tr>
                                            <td>E-mail</td>
                                            <td>
                                                <a href="#" data-key="email" data-pk="<?php echo $_SESSION['u_id']; ?>" class="editable" data-title="Edit E-mail"><?php echo $user_arr['email'];?></a>
                                              
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td>
                                                <a href="#" data-pk="<?php echo $_SESSION['u_id']; ?>" data-key="mobile" class="editable" data-title="Edit Phone Number"><?php echo $user_arr['mobile'];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>
                                                <a href="#" data-pk="<?php echo $_SESSION['u_id']; ?>" data-key="address" class="editable" data-title="Edit Address"><?php echo $user_arr['address'];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>
                                                <a href="#" id="status" data-key="status" data-type="select" data-pk="<?php echo $_SESSION['u_id']; ?>" data-value="<?php echo $user_arr['status'];?>" data-title="Status"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ngày đăng ký</td>
                                            <td>
                                                <?php echo $user_arr['created_date'];?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="tab2" class="tab-pane fade">
        <div class="row">
            <div class="col-md-12 pd-top">
                <form action="#" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="inputpassword" class="col-md-3 control-label">
                                Password
                                <span class='require'>*</span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                    </span>
                                    <input type="password" placeholder="Password" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputnumber" class="col-md-3 control-label">
                                Confirm Password
                                <span class='require'>*</span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                    </span>
                                    <input type="password" placeholder="Password" class="form-control"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            &nbsp;
                            <button type="button" class="btn btn-danger">Cancel</button>
                            &nbsp;
                            <input type="reset" class="btn btn-default hidden-xs" value="Reset"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>