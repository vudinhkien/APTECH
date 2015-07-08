<?php
session_start();
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Xe đạp điện APUS</title>
<link href="../css/style.css" rel="stylesheet" />

</head>
<body>	
  <div style="margin-bottom:100px;" id="form-order">
                    <ul>
                    	<li style="margin-left:30px;"><a href="../index.php"><img src="../images/logo.jpg"></a></li>
                        <li style="  text-align:center;font-size:3em; color:#FFF">ĐĂNG KÝ ĐẶT HÀNG</li>
                    </ul>

                            <form action="../control/proccess-orders.php" method="post">
                            <table>
                                <tr>
                                    <td>Họ tên:</td><td><input type="text" name="name" placeholder="Nhập tên người nhận" maxlength="40" /></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ:</td><td><input type="text" name="address" placeholder="Nhập địa chỉ người nhận" /></td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại:</td><td><input type="text" name="mobile" placeholder="Nhập số điện thoại người nhận" /></td>
                                </tr>
                                  <tr>
                                    <td>Hình thức thanh toán:</td>
                                    <td><select style="width:280px; height:30px" name="method_pay">
                                        <option value="0" >Chọn hình thức thanh toán</option>
                                        <option value="1">Thanh toán tại shop</option>
                                        <option value="2">Chuyển khoản</option>
                                        <option value="3">COD</option>
                                    </select>
                                    </td>
                                </tr>
                                  <tr>
                                    <td>Tổng đơn hàng bạn cần thanh toán là: </td><td style=" padding-left:30px;color:#0C0" class="addcomma" data-a-sign=" đ" data-p-sign="s" data-a-dec="," data-a-pad="false" data-a-sep="."><?php 
                                        $total = 0;
                                        foreach($_SESSION['cart'] as $val){
                                            $total += $val['soluong']*$val['price'];
                                        }
                                        echo number_format($total,'0','.','.');
                                        $_SESSION['total_order'] = $total;
                                     ?> đ</td>
                                    
                                </tr>
                                <tr>
                                    <td style="float:right" colspan="2"> <a class="checkout-button button alt" href="../index.php?view=cart">  
                                    <input style="width:150px; height:50px; background-color:#060; color:#FFF" type="button" value="QUAY LẠI"></a> 
                                    <input style="width:150px; height:50px;background-color:#060; color:#FFF" type="submit" name="thanhtoan" class="checkout-button button alt" value="THANH TOÁN"></td>
                                </tr>
                            </table>
                            </form>
    </div><!--End #wrapper-->
</body>
</html>
