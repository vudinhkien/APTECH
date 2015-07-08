<?php
	require_once('../models/class-cat-product.php');
	$cat_obj = new category_product();
	if(isset($_GET['id']))
	{
		$temp = $cat_obj->getCatById($_GET['id']);
	}
?>
<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="livicon" data-name="bell" data-loop="true" data-color="#fff" data-hovercolor="#fff" data-size="18"></i>
            <?php if(isset($_GET['act'])) echo $_GET['act']=='update' ? 'Sửa' : 'Thêm'; else echo "Thêm"; ?> danh mục
        </h3>
        <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            <i class="fa fa-fw fa-times removepanel clickable"></i>
        </span>
    </div>
    <div class="panel-body border">
        <form action="control/proccess-cat-product.php" method="post" class="form-horizontal form-bordered">
            <div class="form-group">
                <label class="col-md-3 control-label" for="example-text-input">Tên danh mục</label>
                <div class="col-md-6">
                    <input type="text" id="example-text-input" name="cat_name" class="form-control" placeholder="Tên danh mục" value="<?php if(isset($_GET['id']))echo $temp['cat_name'];?>">     
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="example-email">Position</label>
                <div class="col-md-6">
                    <input type="text" id="example-email" name="position" class="form-control" placeholder="Thứ tự" value="<?php if(isset($_GET['id'])) echo $temp['position'];?>"></div>
            </div>
             <div class="form-group">
                <label class="col-md-3 control-label" for="example-select">Lựa chọn danh mục cha</label>
                <div class="col-md-6">
                    <select id="example-select" name="parent_id" class="form-control" size="1">
                        <option value="0">Không có danh mục cha</option>
                        <?php
							//$temp_cat = $cat_obj->getAllCat();
							$temp_cat = isset($_GET['id']) ? $cat_obj->getAllCatExceptId($_GET['id'],'position') : $cat_obj->getAllCat('position');
							$id = isset($_GET['id']) ? $temp['parent_id'] : 0;
							echo buildCatDeQuy($temp_cat,$id);
						?>
                    </select>
                </div>
            </div>
             <div class="form-group">
                <label class="col-md-3 control-label">Hiển thị ra trang chủ </label>
                <div class="col-md-9">
                    <div class="checkbox mar-left5">
                        <label for="example-checkbox1">
                            <input type="checkbox" id="example-checkbox1" <?php if(isset($_GET['id'])) echo $temp['home']==1 ? "checked" : "";?> name="home" value="1">Tích để chọn</label>
                    </div>
                 
                </div>
             </div>
            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                	<input type="hidden" name="id" value="<?php 
					if(isset($_GET['id'])) echo $_GET['id'];  ?>" />
                    <input type="hidden" name="act" value="<?php 
					if(isset($_GET['act'])){
						echo $_GET['act'];
						}
						else
						{
							echo "addnew";
						}
						
					?>" />
                    <button type="submit" name="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
                    <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
function buildCatDeQuy($items,$id_check,$space='', $parent = 0)
{
    $menu_con_html = '';
	$str = '';
	if($parent==0){  
    	$space=''; }
		else{  
    	$space .="&nbsp;&nbsp;&nbsp;&nbsp;";  
		}  

    foreach($items as $item)
    {
        if ($item['parent_id'] == $parent) {
			$id = $item['cat_id'];
			if($item['cat_id']==$id_check) $str = "selected class='bold-option'";
            $menu_con_html .="<option {$str} value='$id'>".$space.$item['cat_name']."</option>";    
			$str ="";     
            $menu_con_html .= buildCatDeQuy($items,$id_check,$space, $item['cat_id']);                 
        }
    }
    return $menu_con_html;
}
?>