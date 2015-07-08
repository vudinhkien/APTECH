<?php
require_once("models/class-product.php");
require_once("models/function.php");
$pro_obj = new product();
$a = $pro_obj->getProductBySanphamnoibat();

?>
		<!--begin #sanphamnoibat-->
		<div class="noibat">
			<div class="spnb">
				<h3>Sản phẩm nổi bật</h3>
			</div>
           
			<div class="list-spnb">
             <?php
			foreach ($a as $val){					
			?>
				<div class="spnb-details">
					<a href="index.php?view=product-detail&p_id=<?php echo $val['pro_id']  ?>"><img style="padding-left:3px" src="uploads/<?php echo $val['image'] ?>" width="200" height="120"/></a><br />
					<p style="font-weight:bold; font-size:1.2em;">
					<a href="index.php?view=product-detail&p_id=<?php echo $val['pro_id']  ?>"><?php echo $val['pro_name']  ?></a><br /></p>
                    <p><?php echo $val['mausac'] ?></p>
					
					<span>Giá :<b><?php echo number_format($val['price_niemyet'],'0','.','.')   ?>đ</b></span>
					<div style="margin-left:-1.5px;" class="buynow"><a href="index.php?view=product-detail&p_id=<?php echo $val['pro_id']  ?>">  Mua </a></div>
				</div>
				 <?php } ?>
			</div>
           
		</div>
        <!--End #sanphamnoibat-->
		<div class="sp-moi">
			<div class="spm">
			<h3>Sản phẩm mới</h3>
			</div>
			
			<div class="list-spm">
				<?php
				$b = $pro_obj->getProductBySanphammoi();
                foreach ($b as $value){					
                ?>
				<div class="spm-details">
					<a href="index.php?view=product-detail&p_id=<?php echo $value['pro_id']  ?>"><img src="uploads/<?php echo $value['image'] ?>" width="200" height="120"/></a><br />
					<p style="font-weight:bold; font-size:1.2em;">
					<a href="index.php?view=product-detail&p_id=<?php echo $value['pro_id']  ?>"><?php echo $value['pro_name']  ?></a><br />
					</p><p><?php echo $value['mausac'] ?>
					</p>
					<span>Giá :<b> <?php echo number_format($value['price_niemyet'],'0','.','.')   ?>đ</b></span>
					<div class="buynow"><a href="index.php?view=product-detail&p_id=<?php echo $val['pro_id']  ?>"> Mua </a></div>
				</div>
				<?php
				}
				?>
			</div>
		</div>
		<!--End #sanphammoi-->