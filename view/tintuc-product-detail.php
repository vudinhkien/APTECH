<?php
require_once("models/class-product.php");
require_once("models/class-cat-product.php");
?>
<div style="  width:700px;" class="news-detail">
        <!--lấy bài viết-->
        <?php
                $pro_obj = new product();
                $temp = $pro_obj->getProductById($_GET['n_id']);
        ?>
        <div class="doc-tintuc" style=" padding-top:20px;border:#287FA2 solid 1px; margin-top:10px; line-height:20px; padding-left:10px;padding-right:10px;">
            <ul>
                <li style=" text-align:center; font-size:2em; font-weight:bold; color:#287FA2; margin-top:5px; margin-bottom:10px;">
                    <?php echo $temp['pro_name'] ;?>
                </li>
                <li>
                <p style="padding-top:3px; float:right;"><?php $date_int = strtotime( $temp['ngaydangbai'] );
													$time_vietnam = date('d-m-Y', $date_int );
													echo $time_vietnam;  ?>
                 </p>
                 </li>
                <li style=" padding-top:20px;font-size:1.2em; font-weight:bold; margin-top:25px; margin-bottom:10px;">
                   <b><?php echo $temp['tomtat'] ;?></b>
                </li>
                
                <div style="background-color:#F1F1F1; color:#090; margin-bottom:20px;" class="xemthem1">
                                <ul>
                                <li>
                                    <?php
										$new = $pro_obj->getAllProDocThem($_GET['n_id']);
										foreach($new as $val){
                                    ?>
                                        <p style="color:#0F0"> &bull; <a href="index.php?view=news-detail&n_id=<?php echo $val["pro_id"] ?>"><?php echo $val["pro_name"] ?></a></p>
                                 </li>
                                    <?php }?>
                    		  </div><!-- end xemthem -->
                
                <li>
                    <img style="margin-left:40px;" src="uploads/<?php echo $temp['image']; ?>"  width="580">
                </li>
                
                <li style=" padding-top:20px;">
                    <?php echo $temp['description']; ?>
                </li>
                <li style="line-height:20px;">
                <p style="font-weight:bold">Mọi thông tin xin liên hệ:</p>
                <p>Công ty TNHH 1 thành viên Vũ Kiên</p>
                Trụ sở văn phòng: 87 - Tam Trinh - quận Hai Bà Trưng - Hà Nội - 0989690901</p>
                Showroom 1: 24 - Bạch Mai – Hà Nội - 04.36229055</p>
                Showroom 2: 171 - Láng Hạ – Hà Nội - 04.66819130</p>
                Showroom 3: 376 - Khâm Thiên – Hà Nội - 04.66822628</p>
                Showroom 4: 411 – Kim Mã – Hà Nội - 04.66877555</p>
                Showroom 5: 02 – Xương Giang – Bắc Giang - 0240.3525.899</p>
                Chi nhánh phía Nam: 72 - Phạm Văn Bạch - P.15 - Q. Tân Bình - Tp.HCM - 08.38152388</p>
                Chi nhánh miền Trung: 291-293 - Phan Châu Trinh - Tp. Đà Nẵng - 0903.554.666</p>
                Cùng các đại lý bán lẻ trên toàn quốc</p>
                Website: https://www.facebook.com/sad.moon.587</p>
                Email: khigiacmove.uneti@gmail.com</p>
                </li>
            </ul>
        </div>
           
</div>