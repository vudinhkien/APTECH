<?php

require_once('../models/class-menu.php');
require_once('../models/function.php');
$menu_obj = new menu();
$sort = '';
if(isset($_GET['sort']))
{
	$sort = $_GET['sort'];
}
$group_id = isset($_GET['group_id']) ? $_GET['group_id'] : '';
switch ($sort){ 
	case 'menu_name':
		$a = $menu_obj->getAllMenu($group_id,'menu_name');
		break;
	case 'position':
		$a = $menu_obj->getAllMenu($group_id,'position');
		break;
    case 'parent_id':
        $a = $menu_obj->getAllMenu($group_id,'parent_id');
        break;
	default:
		$a = $menu_obj->getAllMenu($group_id,'parent_id');
}

?>
 <form class="form-horizontal form-bordered">
 <div class="form-group">
                <label class="col-md-3 control-label" for="example-select">Lọc theo nhóm Menu</label>
                <div class="col-md-6">
                    <select id="group_menu_list" name="menu_group" class="form-control" size="1">
                        <option value="0">Chọn nhóm menu</option>
                        <?php
                            $menu_group_obj = new menu_group();
                            $temp_menu_group = $menu_group_obj->getAllMenuGroup(1);
                            foreach ($temp_menu_group as $val)
                            {
                        ?>
                        <option value="<?php echo $val['menu_gr_id'] ?>" 
                        <?php 
						if(isset($_GET['group_id'])){
							if($val['menu_gr_id'] == $_GET['group_id']) {
								echo " selected";
								}
						}
                        ?>><?php echo $val['menu_group_name']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
 </form>
    <table class="table table-bordered table-striped table-condensed flip-content">
        <thead class="flip-content">
            <tr>
              
                <th width="30%"><a href="index.php?view=list-menu<?php echo isset($_GET['group_id']) ? "&group_id=$group_id" : '' ?>&sort=menu_name">Menu Name</a></th>
                <th width="10%">Nhóm Menu</th>
                <th width="5%" class="numeric"><a href="index.php?view=list-menu<?php echo isset($_GET['group_id']) ? "&group_id=$group_id" : '' ?>&sort=position">Thứ tự</a></th>
                <th class="numeric">Kiểu Menu</th>
				<th class="numeric">Url</th>
                <th class="numeric">Sửa</th>
                <th class="numeric">Xóa</th>
            </tr>
        </thead>
        <tbody>
        <?php
			echo listMenuTable($a);
		?>
       
        </tbody>
    </table>
<?php
function listMenuTable($items,$space='', $parent = 0)
{
	//$menu_obj = new menu();
    $table_html = '';
	if($parent==0){  
    	$space=''; }
		else{  
    	$space .="-&nbsp;";  
		}  

    foreach($items as $item)
    {
        if ($item['parent_id'] == $parent) {
			$table_html .= "<tr>";
			$table_html .= "<td>".$space.$item['menu_name'] ."</td>"; 
			$table_html .= "<td>".$item['menu_group_name'] ."</td>";    
			$table_html .= '<td class="numeric" align="center">'. $item['position']."</td>";
          	$table_html .= '<td class="numeric">'. $item['type_name']."</td>";
			$table_html .= '<td class="numeric">'. $item['url']."</td>";
			$table_html .= ' <form action="control/proccess-menu.php" method="post">
                <td class="numeric">';
			$table_html .= '<a href="index.php?view=form-menu&group_id='.$item['menu_gr_id'].'&act=update&id='. $item['menu_id'].'" class="btn default btn-xs purple"><i class="fa fa-edit"></i>
                Sửa</a></td>';
			$table_html .=  '<td class="numeric">
                <input type="hidden" name="act" value="xoa" />
                <input type="hidden" name="id" value="'. $item['menu_id'].'" />
				<input type="hidden" name="parent_id" value="'. $item['parent_id'].'" />
                <input onclick="return confirmBox()" type="submit" value="Xóa" /></a></td>
                
                </form>
            </tr>';
			 
            $table_html .= listMenuTable($items,$space, $item['menu_id']);                 
        }
    }
    return $table_html;
}

?>