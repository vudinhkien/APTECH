<?php	
require_once("models/class-product.php");
require_once("models/class-cat.php");
require_once("models/function.php");
$cat_pro_id = $_GET['p_id'];
		$pro_obj = new product();
		$kien = $pro_obj->getProductById($cat_pro_id);
?>

<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

</script>



        <div style="padding-left:10px; width:700px;float:left" id="content-right">
        		<div class="center-tren">
                	 <img id="zoom" src="uploads/<?php echo $kien['image']; ?>" data-magnify-src="uploads/<?php echo $kien['image']; ?>" width="370" height="300">
                    <div class="center-tren1">
                    	<ul>
                        <li><h1 style="font-size:2.4em; color:#090; font-family:'Times New Roman', Times, serif;"><?php echo $kien['pro_name'] ;?></h1></li></br></br>
                        <li style="font-size:1.6em"> Giá : <span style="font-size:1.5em; color:#090; font-family:'Times New Roman', Times, serif;" class="style2"><?php echo number_format($kien['price_sale'],'0','.','.') ?></span> đ</li></br>
                        <li><?php echo cattext($kien['tomtat'],150)  ?></li>
                        </ul>
                    </div>
                    <div class="center-tren2">
                    	<div class="center-tren2-1">
                            <ul>
                                <li>
                                    <div class="dathang">
                                            <a style="font-size:1.3em; font-weight:bold;" href="index.php?view=cart"><img style="margin-bottom:-5px;" id="img2" src="images/giohang.png" width="30"/>
                                            <b><?php echo isset($_SESSION['tong_so_sp']) ? $_SESSION['tong_so_sp'] : "0"; ?> </b>sản phẩm được thêm </a>
                                    </div>
                				</li></br>
                            </ul>
                        </div>
                    	<div class="center-tren2-2">
                            <ul>
                                <li><img style=" margin-right:5px;" src="images/11185848_489225244559037_1061413886_n.jpg" /><a href="index.php?view=cart">Mua Hàng</a></li>     
                            </ul>
                        </div>
                        <div class="center-tren2-3">
                            <ul>
                                <li>
                                <input type="button" data-id="<?php echo $kien['pro_id']; ?>" data-image="uploads/<?php echo $kien['image']?>" data-price=" <?php echo $kien['price_sale'];?>" data-product="<?php echo $kien['pro_name'];?>" value="Thêm vào giỏ hàng"></li>   
                            </ul>
                        </div>
                    </div>
                </div>
                <!--end center-tren-->
                
                <div class="center-duoi">
                	<div class="center-duoi1">
                    	<p>Thông Tin Chi Tiết</p>
                    </div>
                    <div style="font-family:'Times New Roman', Times, serif ; color:#777777" class="center-duoi2">
                   	 <p><?php echo $kien['description'] ;?></p>
                    </div>
                    <!--comentface-->
                    <div style="border:#CCC solid 1px;width:715px" class="fb-comments" data-href="index.php?view=pro-detail&p_id=<?php echo $kien["pro_id"] ?>" data-numposts="5" data-colorscheme="light"></div>
                </div>

      </div>
  
		
        <!--end col-center-->
