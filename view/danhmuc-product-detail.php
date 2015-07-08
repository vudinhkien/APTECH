<style>
.spkm-details:last-child
{
	border-bottom:none;
}
</style>

<?php
require_once("models/class-product.php");
require_once('models/class-phan-trang.php');
$pro_obj = new product();
$config = array(
    'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1, // Trang hiện tại
    'total_record'  => $pro_obj->countTable('product'), // Tổng số bản ghi trong bảng(số news_id)
    'limit'         => 4,// số record mỗi trang
    'link_full'     => 'index.php?view=danhmuc-product-detail&page={page}',// Link full có dạng như sau: domain.com/index.php?view=list-view&page={page}
    'link_first'    => 'index.php?view=danhmuc-product-detail',// Link trang đầu tiên
    'range'         => 9 // Số button trang muốn hiển thị
);
$start = (($config['current_page'] - 1)*$config['limit']) ;
$kien = $pro_obj->getAllKhuyenmai("pro_id",array($start,$config["limit"]));
?>
	<div style="width:700px;" id="spkm">
			<div class="km">
				<img src="images/icon-arrow.jpg"><p style="margin-left:40px; color:#777777; margin-top:-19px; font-size:1.5em">Tin khuyến mại</p>
			</div>
            <?php foreach($kien as $a){ ?>
			<div style="margin-top:20px; padding-bottom:20px;padding-top:10px;padding-right:10px; border-bottom:#CCC solid 1px;" class="spkm-details">
					<a href="index.php?view=tintucsp-detail&n_id=<?php echo $a['pro_id']  ?>"><img src="uploads/<?php echo $a['image'] ?>" width="240" height="180"/></a>
                    <div style="width:440px; float:right" class="noidung">
                        <span style="font-size:2em;color:#0F0;"><a href="index.php?view=tintucsp-detail&n_id=<?php echo $a['pro_id']  ?>"><?php echo $a['pro_name'] ?></a></span>
                        <p style=" margin-top:20px; margin-bottom:10px;"><?php echo cattext($a['tomtat'],250) ?></p>
                        <p1 style="float:right; color:#F00"><a href="index.php?view=tintucsp-detail&n_id=<?php echo $a['pro_id']  ?>"> &gt;&gt;Xem thêm</a></p1>	
                    </div>	    	
			 </div>
         	<?php }?>
       			
   	</div> 
<?php
$paging = new PhanTrang($config);
echo $paging->html()
?>
  				