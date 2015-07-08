<?php
require_once('../models/class-cat.php');
$cat_obj = new category();
$sort = '';
if(isset($_GET['sort']))
{
	$sort = $_GET['sort'];
}
switch ($sort){ 
	case 'cat':
		$a = $cat_obj->getAllCat('cat_name');
		break;
	case 'position':
		$a = $cat_obj->getAllCat('position');
		break;
	default:
		$a = $cat_obj->getAllCat();
}


?>
    <table class="table table-bordered table-striped table-condensed flip-content">
        <thead class="flip-content">
            <tr>
                <th><a href="index.php?view=list-cat&sort=cat">Category Name</a></th>
                <th width="10%" class="numeric"><a href="index.php?view=list-cat&sort=position">Thứ tự</a></th>
                <th width="5%" class="numeric">Sửa</th>
                <th width="5%" class="numeric">Xóa</th>
            </tr>
        </thead>
        <tbody>
        <?php
			echo listCatTable($a);	
		?>
        </tbody>
    </table>
<?php
function listCatTable($items,$space='', $parent = 0)
{
	//$menu_obj = new category();
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
			$table_html .= "<td>".$space.$item['cat_name'] ."</td>";    
			$table_html .= '<td class="numeric" align="center">'. $item['position']."</td>";
			$table_html .= ' <form action="control/proccess-cat.php" method="post">
                <td class="numeric">';
			$table_html .= '<a href="index.php?view=form-cat&act=update&id='. $item['cat_id'].'" class="btn default btn-xs purple"><i class="fa fa-edit"></i>
                Sửa</a></td>';
			$table_html .=  '<td class="numeric">
                <input type="hidden" name="act" value="xoa" />
                <input type="hidden" name="id" value="'. $item['cat_id'].'" />
				<input type="hidden" name="parent_id" value="'. $item['parent_id'].'" />
                <input onclick="return confirmBox()" type="submit" value="Xóa" /></a></td>
                
                </form>
            </tr>';
			 
            $table_html .= listCatTable($items,$space, $item['cat_id']);                 
        }
    }
    return $table_html;
}

?>