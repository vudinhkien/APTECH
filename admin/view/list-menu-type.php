<?php
require_once('../models/class-menu.php');
$menu_type_obj = new menu_type();
$sort = '';
if(isset($_GET['sort']))
{
	$sort = $_GET['sort'];
}
switch ($sort){ 
	case 'type_name':
		$a = $menu_type_obj->getAllMenuType('type_name');
		break;
	default:
		$a = $menu_type_obj->getAllMenuType();
}

?>
    <table class="table table-bordered table-striped table-condensed flip-content">
        <thead class="flip-content">
            <tr>
                <th>ID</th>
                <th><a href="index.php?view=list-menu-type&sort=type_name">Type Name</a></th>
                <th class="numeric">Kiểu view</th>
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
                <td><?php echo $val['mn_type_id'];?></td>
                <td><?php echo $val['type_name'];?></td>
                <td class="numeric"><?php echo $val['view'];?></td>                
                <form action="control/proccess-menu-type.php" method="post">
                <td class="numeric">
                <a href="index.php?view=form-menu-type&act=update&id=<?php echo $val['mn_type_id']; ?>" class="btn default btn-xs purple"><i class="fa fa-edit"></i>
                Sửa</a></td>
                <td class="numeric">
                <input type="hidden" name="act" value="xoa" />
                <input type="hidden" name="id" value="<?php echo $val['mn_type_id'];?>" />
                <input type="submit" value="Xóa" /></a><strong></strong></td>
                
                </form>
            </tr>
            <?php
			}
			?>
        </tbody>
    </table>
