<?php
	//session_start();
	/*echo "<pre>";
	print_r($_SESSION['total_order']);
	echo "</pre>";*/
	//session_destroy();


?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="js" lang="en"><!--<![endif]--><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Cart</title>


	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    

	<!-- CSS
  ================================================== -->
	
     <script type="text/javascript">
	 var max_num = 99;
	 </script>
<style>
#cart thead
{
	font-size:1.2em;
}
.cart_totals tbody
{
	line-height:50px
}
.cart_totals tbody th
{
	font-weight:bold
}
</style>
</head>


<body> 
<div style="width:708px; border:#009133 solid 1px; color:#6D6D6D" id="bodychild">
		<div id="outercontainer">

       		 	<div  style="background-color:#009133" class="container">
                    <h1 style="margin-left:160px; color:#FFF; font-size:2.2em; padding-top:20px; padding-bottom:20px;" class="pagetitle">GIỎ HÀNG CỦA BẠN</h1>
            </div>
       			 <!-- END giỏ hàng -->
       		    <div style="margin-top:20px;" id="outermain">
        			<div class="container">
                            
                
                           <div id="cart">
                                <table border="1" style="width:700px; text-align:center">
                                
                                    <thead style=" height:50px;font-weight:bold; border:1px solid #999">
                                        <tr>
                                            <th class="remove">Xóa</th>
                                            <th class="product">Ảnh</th>
                                            <th class="desc">Sản phẩm</th>
                                            <th class="unit-price">Giá</th>
                                            <th class="qty">Số lượng</th>
                                            <th class="total">Tổng</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody style=" height:100px; margin-top:30px"  id="cart-content">
                                    <?php 
                                    if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
                                        echo "<tr><td colspan='7' style=' color:#090;'>Giỏ hàng rỗng</td></tr>";
                                    }
                                    else{
                                        $temp = '';
                                    foreach($_SESSION['cart'] as $key => $val): ?>
                                    <tr id="item-<?php echo $key?>">
                                        <td class="remove"><input type="button" class="remove" data-id="<?php echo $key?>" value="×"></td>
                                        <td class="product"><img src="<?php echo $val['image']?>" width="150" alt=""></td>
                                        <td style="font-size:1.3em; font-weight:bold" class="desc"><?php echo cattext($val['name'],25)?></td>
                                        <td class="unit-price addcomma" data-a-sign=" đ" data-p-sign="s" data-a-dec="," data-a-pad="false" data-a-sep="."><?php echo $val['price']?></td>
                                        <td>
                                        <div class="quantity buttons_added">
                                            <input class="minus" data-id="<?php echo $key?>" value="-" type="button">
                                            <input style="text-align:center; background-color:#090" maxlength="12" data-id="<?php echo $key?>" id="ketqua-<?php echo $key?>" class="input-text qty text ketquaxx" title="Qty" size="1" value="<?php echo $val['soluong']?>" name="quantity">
                                            <input class="plus" data-id="<?php echo $key?>"  value="+" type="button">
                                        </div>	
                                        </td>
                                        <td id="price-item-<?php echo $key?>" class="addcomma" data-a-sign=" đ" data-p-sign="s" data-a-dec="," data-a-pad="false" data-a-sep="."><?php $a=''; $a = $val['soluong']*$val['price']; echo $a;
                                                $temp	+= $a;					
                                        ?></td>
                                    </tr>
                                    <?php endforeach; } ?>
                                    </tbody>
                                    
                                </table>
                                
                           </div>
                                
                               <br><br>
                
                           <div style=" border-top:#CCC solid 1px; padding-top:30px;" class="cart_totals">
                                  <h2 style="font-size:2em; font-weight:bold; margin-left:100px;">Tổng cộng</h2>
                                  <table cellpadding="1" cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Tổng đơn hàng:</th>
                                            <td id="sub-total" class="addcomma" data-a-sign=" đ" data-p-sign="s" data-a-dec="," data-a-pad="false" data-a-sep="."><?php echo isset($_SESSION['cart']) && !empty($_SESSION['cart']) ? $temp : "0đ"; ?></td>
                                        </tr>      
                                        <tr class="shipping">
                                            <th>Tiền ship:</th>
                                            <td class="addcomma" data-a-sign=" đ" data-p-sign="s" data-a-dec="," data-a-pad="false" data-a-sep=".">0</td>
                                        </tr>        
                                        <tr class="total">
                                            <th>Tổng cộng (tax excl):</th>
                                            <td  id="total" class="addcomma" data-a-sign=" đ" data-p-sign="s" data-a-dec="," data-a-pad="false" data-a-sep="."><?php echo isset($_SESSION['cart']) && !empty($_SESSION['cart'])? $temp : "0đ"; ?></td>
                                        </tr>
                                        <tr>
                                        <td>
                                        	<div style="margin-top:30px;margin-left:250px;">
                                                
                                                 <?php 
                                                if(isset($_SESSION['user-khachhang']))
                                                    {
                                                ?>
                                                <a class="checkout-button button alt" href="view/check-out.php">
                                                <input style=" background-color:#090;width:200px; height:50px; color:#FFF" value="THANH TOÁN" name="thanhtoan" type="submit"></a>
                                                <?php
                                                    }
                                                else
                                                        {
                                                            echo '<p class="thongbao" style="font-size:2em;text-align:center"><a href="login.php"> &rarr; Hãy đăng nhập để mua</a></p>';
                                                        }
                                                ?>
                                   </div>
                                   		</td>
                                        </tr>
                                    </tbody>
                                  </table> 
                                </div>           
        		</div>
       			 <!-- END table giỏ hàng -->
   		</div><!-- end bodychild -->
        </div>
        <!--end outercontainer-->
</div><!-- end bodychild -->
</body></html>