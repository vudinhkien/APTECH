<style>
.spkm-details:last-child
{
	border-bottom:none;
}
</style>

<?php
require_once("models/class-news.php");
require_once('models/class-phan-trang.php');
$new_obj = new news();
$config = array(
    'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1, // Trang hiện tại
    'total_record'  => $new_obj->countTable('news'), // Tổng số bản ghi trong bảng(số news_id)
    'limit'         => 4,// số record mỗi trang
    'link_full'     => 'index.php?view=news&page={page}',// Link full có dạng như sau: domain.com/index.php?view=list-view&page={page}
    'link_first'    => 'index.php?view=news',// Link trang đầu tiên
    'range'         => 9 // Số button trang muốn hiển thị
);
$start = (($config['current_page'] - 1)*$config['limit']) ;
$kien = $new_obj->getAllNoibat("news_id",array($start,$config["limit"]));
?>
	<div style="width:700px;" id="spkm">
			<div class="km">
				<img src="images/icon-arrow.jpg"><p style="margin-left:40px; margin-top:-19px; font-size:1.5em">Tin Nổi Bật</p>
			</div>
            <?php foreach($kien as $a){ ?>
			<div style="margin-top:20px; padding-bottom:20px;padding-top:10px;padding-right:10px; border-bottom:#CCC solid 1px;" class="spkm-details">
					<a href="index.php?view=news-detail&n_id=<?php echo $a['news_id']  ?>"><img src="uploads/<?php echo $a['images'] ?>" width="240" height="180"/></a>
                    <div style="width:440px; float:right" class="noidung">
                        <span style="font-size:2em;color:#0F0;"><a href="index.php?view=news-detail&n_id=<?php echo $a['news_id']  ?>"><?php echo $a['title'] ?></a></span>
                        <p style=" margin-top:20px; margin-bottom:10px;"><?php echo cattext($a['tomtat'],200) ?></p>
                        <p1 style="float:right; color:#F00"><a href="index.php?view=news-detail&n_id=<?php echo $a['news_id']  ?>"> &gt;&gt;Xem thêm</a></p1>	
                    </div>	    	
			 </div>
         	<?php }?>
       			
   	</div> 
<?php
$paging = new PhanTrang($config);
echo $paging->html()
?>
  				