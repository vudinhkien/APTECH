<?php
require_once('models/config.php');
require_once('models/class.php');
require_once('models/class-search.php');
$search_obj = new search();

$search_obj->table		= array("product");
$search_obj->column_dk	= array
							(
								array("pro_name","description","tomtat")		
							);
$search_obj->column_kq	= array
							(
								array("*")
							);
//$search_obj->setFullIndexTable();
$search_obj->keyword= isset($_GET['keyword']) ? $_GET['keyword'] : '';
$search = $search_obj->seachLikeMethod();
?>


<!--show ra -->
<div class="sp-moi">
			<div class="spm">
			<h1 style="font-weight:bold">KẾT QUẢ TÌM KIẾM</h1>
			</div>
			
			<div class="list-spm">
				<?php
				$b = $pro_obj->getProductBySanphammoi();
                foreach ($search as $value){					
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