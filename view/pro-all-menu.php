

<?php
require_once("models/class-product.php");
require_once("models/class-cat-product.php");
require_once('models/class-phan-trang.php');

$pro_obj = new product();
$config = array(
    'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1, // Trang hiện tại
    'total_record'  => $pro_obj->countTable('product'), // Tổng số bản ghi trong bảng(pro_id)
    'limit'         => 6,// số record mỗi trang
    'link_full'     => 'index.php?view=product&page={page}',// Link full có dạng như sau: domain.com/index.php?view=list-view&page={page}
    'link_first'    => 'index.php?view=product',// Link trang đầu tiên
    'range'         => 9 // Số button trang muốn hiển thị
);
$start = (($config['current_page'] - 1)*$config['limit']) ;
$product = $pro_obj->getAllKhuyenmai("",array($start,$config["limit"]));
?>

<div style="height:auto; margin-top:10px; float:left" class="cat-proall">
            	
		<div class="sp-moi">
        		<div style="height:50px; font-size:2em;margin-bottom:20px; color:#090" class="banchay">
                <marquee behavior="scroll" direction="left" scrollamount="10" style="z-index:9999">
                Hot - Hot - Hot &hearts; Hàng mới về
                </marquee>
                </div>
			
                <div class="list-spm">
                     <?php
                        
                        foreach($product as $value){
                    ?>
                    <div class="spm-details">
                        <a href="index.php?view=product-detail&p_id=<?php echo $value['pro_id']  ?>"><img src="uploads/<?php echo $value['image'] ?>" width="200" height="120"/></a><br />
                        <p style="font-weight:bold; font-size:1.2em;">
                        <a href="index.php?view=product-detail&p_id=<?php echo $value['pro_id']  ?>"><?php echo $value['pro_name']  ?></a><br />
                        </p><p><?php echo $value['mausac'] ?>
                        </p>
                        <span>Giá :<b> <?php echo number_format($value['price_niemyet'],'0','.','.')   ?>đ</b></span>
                        <div class="buynow"> <a href="index.php?view=product-detail&p_id=<?php echo $value['pro_id']  ?>">Mua </a></div>
                    </div>
                    <?php
                    }
                    ?>
                </div>            
        </div>
</div>

<?php
   $paging = new PhanTrang($config);
   echo $paging->html()
?>