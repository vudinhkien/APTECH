<?php
require_once('../models/class-user.php');
$user_obj = new user();
$sort = '';
if(isset($_GET['sort']))
{
	$sort = $_GET['sort'];
}
switch ($sort){ 
	case 'user':
		$a = $user_obj->getAllUser('user');
		break;
	case 'fullname':
		$a = $user_obj->getAllUser('fullname');
		break;
	default:
		$a = $user_obj->getAllUser();
}


?>
    <table class="table table-bordered table-striped table-condensed flip-content">
        <thead class="flip-content">
            <tr>
                <th>STT</th>
                <th><a href="index.php?view=list-user&sort=user">Username</a></th>
                <th class="numeric"><a href="index.php?view=list-user&sort=fullname">Tên</a></th>
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
                <td><?php echo $val['user'];?></td>
                <td class="numeric"><?php echo $val['fullname'];?></td>
                <form action="control/proccess-user.php" method="post">
                <td class="numeric">
                <a href="index.php?view=form-user&act=update&id=<?php echo $val['u_id']; ?>" class="btn default btn-xs purple"><i class="fa fa-edit"></i>
                Sửa</a></td>
                <td class="numeric">
                <input type="hidden" name="act" value="xoa" />
                <input type="hidden" name="id" value="<?php echo $val['u_id'];?>" />
                <input type="submit" value="Xóa" /></a><strong></strong></td>
                
                </form>
            </tr>
            <?php
			}
			?>
        </tbody>
    </table>
