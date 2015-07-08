<?php
require_once('../models/class-menu.php');
$menu_group_obj = new menu_group();
$sort = '';
if(isset($_GET['sort']))
{
	$sort = $_GET['sort'];
}
switch ($sort){ 
	case 'name':
		$a = $menu_group_obj->getAllMenuGroup('','menu_group_name');
		break;
	case 'status':
		$a = $menu_group_obj->getAllMenuGroup('','status');
		break;
	default:
		$a = $menu_group_obj->getAllMenuGroup();
}


?>
    <table class="table table-bordered table-striped table-condensed flip-content">
        <thead class="flip-content">
            <tr>
                <th width="5%">STT</th>
                <th><a href="index.php?view=list-menu-group&sort=name">Category Name</a></th>
                <th class="numeric"><a href="index.php?view=list-menu-group&sort=status">Trạng thái</a></th>
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
                <td><?php echo $val['menu_group_name'];?></td>
                <td class="numeric"><?php if($val['status']==1) echo "Kích hoạt"; else echo "Vô hiệu hóa";?></td>
                <form action="control/proccess-menu-group.php" method="post">
                <td class="numeric">
                <a href="index.php?view=form-menu-group&act=update&id=<?php echo $val['menu_gr_id']; ?>" class="btn default btn-xs purple"><i class="fa fa-edit"></i>
                Sửa</a></td>
                <td class="numeric">
                <input type="hidden" name="act" value="xoa" />
                <input type="hidden" name="id" value="<?php echo $val['menu_gr_id'];?>" />
                <input type="submit" value="Xóa" /></a><strong></strong></td>
                
                </form>
            </tr>
            <?php
			}
			?>
        </tbody>
    </table>
