<?php
require_once('../models/class-product.php');
//require_once('../models/class-cat-product.php');
require_once('../models/class-phan-trang.php');
$product_obj = new product();
$config = array(
    'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1, // Trang hiện tại
    'total_record'  => $product_obj->countTable('product'), // Tổng số record
    'limit'         => 3,// số record mỗi trang
    'link_full'     => 'index.php?view=list-product&page={page}',// Link full có dạng như sau: domain.com/index.php?view=list-view&page={page}
    'link_first'    => 'index.php?view=list-product',// Link trang đầu tiên
    'range'         => 9 // Số button trang muốn hiển thị
);
$start = (($config['current_page'] - 1)*$config['limit']) ;
$sort = '';
if(isset($_GET['sort']))
{
	$sort = $_GET['sort'];
}
switch ($sort){ 
	case 'pro_name':
		$a = $product_obj->getAllProduct('pro_name',array($start,$config['limit']));
		break;
	default:
		$a = $product_obj->getAllProduct('',array($start,$config['limit']));
}

?>
    <table class="table table-bordered table-striped table-condensed flip-content">
        <thead class="flip-content">
            <tr>
                <th>STT</th>
                <th><a href="index.php?view=list-news&sort=title">Sản phẩm</a></th>
                 <th class="numeric">Ảnh</th>
                 <th class="numeric">Mã</th>
                 <th class="numeric">Màu sắc</th>
                 <th class="numeric">Giá niêm yết</th>
                 <th width="10%" class="numeric">Ngày đặt</th>
                  <th class="numeric">Giá sale</th>
                <th class="numeric">Sửa</th>
                <th class="numeric">Xóa</th>
            </tr>
        </thead>
        <tbody>
        <?php
			$i = 0;
			foreach($a as $val)
			{
				$i++;
		?>
            <tr>
                <td><?php echo $i?></td>
                <td><a href="index.php?view=form-product&act=update&id=<?php echo $val['pro_id']; ?>"><?php echo $val['pro_name'];?></a></td>
                <td class="numeric"><img width="200" src="../uploads/<?php echo $val['image'];?>"</td>
                <td><?php echo $val['ma_sp'];?></td>
                <td><?php echo $val['mausac'];?></td>
                <td><?php echo $val['price_niemyet'];?></td>
                <td class="numeric"><?php 
						$date_int = strtotime( $val['ngaydangbai'] );
						$time_vietnam = date('d-m-Y', $date_int );
						echo $time_vietnam;
				?>
                </td>
                <td><?php echo $val['price_sale'];?></td>
                <form action="control/proccess-product.php" method="post">
                <td class="numeric">
                <a href="index.php?view=form-product&act=update&id=<?php echo $val['pro_id']; ?>" class="btn default btn-xs purple"><i class="fa fa-edit"></i>
                Sửa</a></td>
                <td class="numeric">
                <input type="hidden" name="act" value="xoa" />
                <input type="hidden" name="id" value="<?php echo $val['pro_id'];?>" />
                <input type="submit" value="Xóa" /></a><strong></strong></td>
                
                </form>
            </tr>
            <?php
			}
			?>
        </tbody>
    </table>
<?php
$paging = new PhanTrang($config);
echo $paging->html();
?>
