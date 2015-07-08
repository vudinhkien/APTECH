<?php
require_once("models/config.php");
require_once("models/function.php");
require_once("models/class.php");
require_once("models/class-cat-product.php");
?>



	<div id="col-left">
		<div id="list-cat">
			<div class="header">
				Danh mục
			</div>
			<div class="list">
             <?php
					$catsp_obj = new category_product();
					$kien = $catsp_obj->getCatByHome();
					
					foreach($kien as $val){
				?>
				<ul>
					<li><a href="index.php?view=product-cat&c_id=<?php echo $val["cat_id"] ?>"><?php echo $val['cat_name'] ?></a></li>
				</ul>
                 <?php } ?>
			</div>
		</div><!--End #danhmuc-->
		<div id="spkm">
			<div class="km">
				<h3>Tin khuyến mại</h3>
			</div>
			<div clas="list-sp">
            	<?php
				require_once("models/class-product.php");
				$pro_obj = new product();
				$a = $pro_obj->getProductByKhuyenmai();
				foreach($a as $value){
				?>
				<div class="spkm-details">
					<a href="index.php?view=tintucsp-detail&n_id=<?php echo $value['pro_id']  ?>"><img src="uploads/<?php echo $value['image'] ?>" width="56" height="60"/></a>
					<a href="index.php?view=tintucsp-detail&n_id=<?php echo $value['pro_id']  ?>"><?php echo cattext($value['tomtat'],50) ?></a>
					<p style="margin-top:3px;"><?php $date_int = strtotime( $value['ngaydangbai'] );
													$time_vietnam = date('d-m-Y', $date_int );
													echo $time_vietnam;  ?>
                    </p>				
				</div>
                <?php } ?>
			</div>
			<div class="them">
				<a href="index.php?view=danhmuc-product-detail">Xem thêm</a>
			</div>
		</div><!--End #spkm-->
	</div><!--End #col-left-->