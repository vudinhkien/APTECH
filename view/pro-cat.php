

<?php
require_once("models/class-product.php");
require_once("models/class-cat-product.php");
require_once('models/class-phan-trang.php');

$product = new product();

	//include("models/Product.php");
	$config = array(
		'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1, // Trang hiện tại
		'total_record'  => count($product->getProductByCatId($_GET["c_id"])), // Tổng số record
		'limit'         => 6,// số record mỗi trang
		'link_full'     => "index.php?view=product-cat&c_id={$_GET['c_id']}&page={page}",// Link full có dạng như sau: domain.com/index.php?view=list-view&page={page}
		'link_first'    => "index.php?view=product-cat&c_id={$_GET['c_id']}",// Link trang đầu tiên
		'range'         => 9 // Số button trang muốn hiển thị
	);
	$start = (($config['current_page'] - 1)*$config['limit']) ;
	if($_GET["c_id"]){
		$temp = $product->getProductOfCat($_GET["c_id"],"pro_id",array($start,$config['limit']));
	}
//echo "<pre>";
//	print_r($temp);
//echo "</pre>";
	
?>


       
        		<div class="sp-moi">
                	<?php
					$catpro_obj = new category_product();
					$catpro = $catpro_obj->getCatById($_GET['c_id']);
					
					?>
                        <div class="spm">
                          
                        <h3><?php echo $catpro['cat_name'] ?></h3>
                      
                        </div>
                       
                         <div class="list-spm">
                          <?php
								
										foreach($temp as $val){
							 ?>
                            <div style="margin-top:10px;"  class="spm-details">
                                <a href="index.php?view=product-detail&p_id=<?php echo $val['pro_id']  ?>"><img src="uploads/<?php echo $val['image']; ?>"  width="211" height="117"></a><br />
                                <p style=" font-size:1.1em">
                                <a href="#"><?php echo $val['pro_name']; ?></a> <br /></p>
                                <p><?php echo $val['mausac']; ?>
                                </p>
                                <span>Giá :<b> <?php echo number_format($val['price_niemyet'],'0','.','.') ?> đ</b></span>
                                <div class="buynow"> <a href="index.php?view=product-detail&p_id=<?php echo $val['pro_id']  ?>"> Mua </a></div>
                            </div>
                            <?php } ?>
				 
						</div>
                        <div style="float:left">
                 <?php
                $paging = new PhanTrang($config);
                echo $paging->html()
				?>
                </div>
			
              </div>             		
		 <!--end sanphammoi-->
        
			