<?php 
	require_once('../models/class.php');	
	$kien = new database();
?>
<div class="row">
	<div style="background-color:#0F0" class="col-md-3">
    	<div class="analytics">
        	<div class="product">
            	<div style="font-size:1.5em; font-weight:bold" class="text-uppercase text-center br">Product</div>
                <div class="row">
               		<div class="pull-left">Tổng số sản phẩm:</div><div class="pull-right"> <span class="badge"><?php echo $kien->countTableWhere("product"); ?></span></div>
                </div>
                <div class="row">
               		<div class="pull-left">Sản phẩm hot:</div><div class="pull-right"> <span class="badge"><?php echo $kien->countTableWhere("product","hot=1"); ?></span></div>
                </div>
                <div class="row">
               		<div class="pull-left">Sản phẩm nổi bật:</div><div class="pull-right">  <span class="badge"><?php echo $kien->countTableWhere("product","hot=0"); ?></span></div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div style="background-color:#FF0; margin-left:50px;" class="col-md-3">
    	<div class="analytics">
        	<div class="product">
            	<div style="font-size:1.5em; font-weight:bold" class="text-uppercase text-center br">News</div>
                <div class="row">
               		<div class="pull-left">Tổng số bài viết</div><div class="pull-right"> <span class="badge"><?php echo $kien->countTableWhere("news"); ?></span></div>
                </div>
                <div class="row">
               		<div class="pull-left">Tin hot:</div><div class="pull-right"> <span class="badge"><?php echo $kien->countTableWhere("news","hot=1"); ?></span></div>
                </div>
                <div class="row">
               		<div class="pull-left">Tin nổi bật:</div><div class="pull-right">  <span class="badge"><?php echo $kien->countTableWhere("news","hot=0"); ?></span></div>
                </div>
            </div>
        </div>
    </div>

 </div>
    
    