<?php
require_once('../models/function.php');
?>
<section class="content">
    <div class="row">
        <div class="col-lg-12">
                    <!--<div class="row">
                        <div class="col-lg-12">-->
                            
                            <?php
                                if(isset($_GET['view']))
                                { 
                                    switch ($_GET['view']) {
									case "form-cat":
                                        include_once('form-cat.php');
										if(isset($_GET['stt']))
										{
											thongbao($_GET['stt']);
										}
										break;
									case "list-cat":
										include_once('list-cat.php');
										if(isset($_GET['stt']))
										{
											thongbao($_GET['stt']);
										}
										break;
									case "form-cat-product":
                                        include_once('form-cat-product.php');
										if(isset($_GET['stt']))
										{
											thongbao($_GET['stt']);
										}
										break;
									case "list-cat-product":
										include_once('list-cat-product.php');
										if(isset($_GET['stt']))
										{
											thongbao($_GET['stt']);
										}
										break;
									case "form-user":
										include_once('form-user.php');
										if(isset($_GET['stt']))
										{
											thongbao($_GET['stt']);
										}
										break;
									case "list-user":
										include_once('list-user.php');
										if(isset($_GET['stt']))
										{
											thongbao($_GET['stt']);
										}
										break;
									case "form-news":
										include_once('form-news.php');
										if(isset($_GET['stt']))
										{
											thongbao($_GET['stt']);
										}
										break;
									case "list-news":
										include_once('list-news.php');
										if(isset($_GET['stt']))
										{
											thongbao($_GET['stt']);
										}
										break;
									case "form-menu":
										include_once('form-menu.php');
										if(isset($_GET['stt']))
										{
											thongbao($_GET['stt']);
										}
										break;
									case "list-menu":
										include_once('list-menu.php');
										if(isset($_GET['stt']))
										{
											thongbao($_GET['stt']);
										}
										break;
									case "form-menu-type":
										include_once('form-menu-type.php');
										if(isset($_GET['stt']))
										{
											thongbao($_GET['stt']);
										}
										break;
									case "list-menu-type":
										include_once('list-menu-type.php');
										if(isset($_GET['stt']))
										{
											thongbao($_GET['stt']);
										}
										break;
									case "form-menu-group":
										include_once('form-menu-group.php');
										if(isset($_GET['stt']))
										{
											thongbao($_GET['stt']);
										}
										break;
									case "list-menu-group":
										include_once('list-menu-group.php');
										if(isset($_GET['stt']))
										{
											thongbao($_GET['stt']);
										}
										break;
									case "form-product":
										include_once('form-product.php');
										if(isset($_GET['stt']))
										{
											thongbao($_GET['stt']);
										}
										break;
									case "list-product":
										include_once('list-product.php');
										if(isset($_GET['stt']))
										{
											thongbao($_GET['stt']);
										}
										break;
									case "config-menu-frontend":
										include_once('config-menu-frontend.php');
										if(isset($_GET['stt']))
										{
											thongbao($_GET['stt']);
										}
										break;	
									case "profile":
										include_once('profile.php');
										break;	
									case "list-order":
										include_once('list-order.php');
										break;
									case "form-slide":
										include_once('form-slide.php');
										break;	
									case "list-slide":
										include_once('list-slide.php');
										break;	
									case "list-lienhe":
										include_once('list-lienhe.php');
										break;	
									case "dashboard":
										include_once('dashboard.php');
										break;
									
									}
									                        
                                }
                            ?>
                            <?php //include('list-table.php'); ?>
                <!--</div>
            </div>-->
        </div>
    </div>

</section>