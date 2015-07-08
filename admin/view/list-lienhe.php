<?php
require_once('../models/class-lienhe.php');
$user_obj = new lienhe();
$sort = '';
if(isset($_GET['sort']))
{
	$sort = $_GET['sort'];
}
switch ($sort){ 
	case 'fullname':
		$a = $user_obj->getAllLienhe('fullname');
		break;
	default:
		$a = $user_obj->getAllLienhe();
}


?>
    <table class="table table-bordered table-striped table-condensed flip-content">
        <thead class="flip-content">
            <tr>
                <th>STT</th>
                <th><a href="index.php?view=list-lienhe&sort=fullname">Tên khách hàng</a></th>
                <th class="numeric">Email</th>
                <th class="numeric">Mobile</th>
                <th class="numeric">Nội Dung</th>
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
                <td><?php echo $val['fullname'];?></td>
                <td class="numeric"><?php echo $val['email'];?></td>
                <td class="numeric"><?php echo $val['mobile'];?></td>
                <td class="numeric"><?php echo $val['noidung'];?></td>
                <form action="control/proccess-lienhe.php" method="post">
                <td class="numeric">
                <a href="index.php?view=form-user&act=update&id=<?php echo $val['lh_id']; ?>" class="btn default btn-xs purple"><i class="fa fa-edit"></i>
                Sửa</a></td>
                <td class="numeric">
                <input type="hidden" name="act" value="xoa" />
                <input type="hidden" name="id" value="<?php echo $val['lh_id'];?>" />
                <input type="submit" value="Xóa" /></a><strong></strong></td>
                
                </form>
            </tr>
            <?php
			}
			?>
        </tbody>
    </table>
