<?php
require_once('../models/class-orders.php');
require_once('../models/class-phan-trang.php');
$order_obj = new orders();

$config = array(
    'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1, // Trang hiện tại
    'total_record'  => $order_obj->countTable('orders'), // Tổng số record
    'limit'         => 3,// số record mỗi trang
    'link_full'     => 'index.php?view=list-order&page={page}',// Link full có dạng như sau: domain.com/index.php?view=list-view&page={page}
    'link_first'    => 'index.php?view=list-order',// Link trang đầu tiên
    'range'         => 9 // Số button trang muốn hiển thị
);
$start = (($config['current_page'] - 1)*$config['limit']) ;
$sort = '';
if(isset($_GET['sort']))
{
	$sort = $_GET['sort'];
}
switch ($sort){ 
	case 'id':
		$config['link_full'] = 'index.php?view=list-order&sort=id&page={page}';
		$config['link_first'] = 'index.php?view=list-order&sort=id';
		$a = $order_obj->getAllOrder('order_id',array($start,$config['limit']));
		break;
	case 'kh':
		$config['link_full'] = 'index.php?view=list-order&sort=kh&page={page}';
		$config['link_first'] = 'index.php?view=list-order&sort=kh';
		$a = $order_obj->getAllOrder('u_id',array($start,$config['limit']));
		break;
	case 'stt':
		$config['link_full'] = 'index.php?view=list-order&sort=stt&page={page}';
		$config['link_first'] = 'index.php?view=list-order&sort=stt';
		$a = $order_obj->getAllOrder('status',array($start,$config['limit']));
		break;
	default:
		$a = $order_obj->getAllOrder('',array($start,$config['limit']));
}


?>
    <table class="table table-bordered table-striped table-condensed flip-content">
        <thead class="flip-content">
            <tr>
                <th width="10%"><a href="index.php?view=list-order&sort=id">Mã đơn hàng</a></th>
                <th width="10%" class="numeric"><a href="index.php?view=list-order&sort=kh">Khách hàng</a></th>
                <th width="30%" class="numeric">Sản phẩm</th>
                <th width="10%" class="numeric">Thành tiền</th>
                <th width="10%" class="numeric">Ngày đặt</th>
                <th width="10%" class="numeric">Thông tin ship</th>
                <th width="10%" class="numeric"><a href="index.php?view=list-order&sort=stt">Trạng thái</a></th>
                <th width="5%" class="numeric">Sửa</th>
                <th width="5%" class="numeric">Xóa</th>
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
                <td><?php echo $val['order_name'].$val['order_id'];?></td>
                <td><?php echo $val['u_id'];?></td>
                <td class="numeric"><?php $sp_arr = json_decode($val['product_info'],true); 
						foreach($sp_arr as $sp_val){
							echo $sp_val['name'].' - Số lượng: '.$sp_val['soluong'].' - Giá: <div class="addcomma" data-a-sign=" đ" data-p-sign="s" data-a-dec="," data-a-pad="false" data-a-sep=".">'.$sp_val['price'].'</div><br>';
							}
				?> </td>
                <td class="numeric addcomma" data-a-sign=" đ" data-p-sign="s" data-a-dec="," data-a-pad="false" data-a-sep="." ><?php echo $val['total'];?></td>
              
                <td class="numeric"><?php 
						$date_int = strtotime( $val['ngaydat'] );
						$time_vietnam = date('H:i:s d-m-Y', $date_int );
						echo $time_vietnam;
				?>
                </td>
                <td><?php 
					$ship_arr = json_decode($val['ship_address'],true);
					echo "Tên: ".$ship_arr['name'].'<br>Địa chỉ: '.$ship_arr['address'].'<br>Mobile: '.$ship_arr['mobile'];
				?></td>
                <td>
                	<?php 
					$arr = array("Chưa kiểm tra","Chưa thanh toán","Chưa ship","Đang ship","Đã nhận hàng");
					 foreach($arr as $key => $values){	 
						 if($key==$val['status']){
							 echo $values;
							 break;
							 }
					 }
					 ?>
                </td>
                <form action="control/proccess-order.php" method="post">
                <td class="numeric">
                <a href="index.php?view=form-order&act=update&id=<?php echo $val['order_id']; ?>" class="btn default btn-xs purple"><i class="fa fa-edit"></i>
                Sửa</a></td>
                <td class="numeric">
                <input type="hidden" name="act" value="xoa" />
                <input type="hidden" name="id" value="<?php echo $val['order_id'];?>" />
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