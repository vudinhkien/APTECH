<?php
	require_once('../models/class-menu.php');
	require_once('../models/class-cat.php');
	require_once('../models/class-cat-product.php');
	if(isset($_GET['id']))
	{
		$menu_obj = new menu();
		$temp = $menu_obj->getMenuById($_GET['id']);
		//print_r($temp);
	}
?>
<style type="text/css">.bold-option{font-weight:bold} </style>
 <form class="form-horizontal form-bordered">
 <?php
 	echo isset($_GET['id']) ? '<fieldset disabled>' : '';
 ?>
 <div class="form-group">
                <label class="col-md-3 control-label" for="example-select">NHÓM MENU***</label>
                <div class="col-md-6">
                    <select id="group_menu" name="menu_group" class="form-control" size="1">
                        <option value="0">Chọn nhóm menu</option>
                        <?php
                            $menu_group_obj = new menu_group();
                            $temp_menu_group = $menu_group_obj->getAllMenuGroup(1);
                            foreach ($temp_menu_group as $val)
                            {
                        ?>
                        <option value="<?php echo $val['menu_gr_id'] ?>" 
                        <?php 
                        if(isset($_GET['id'])){
                            if($val['menu_gr_id'] == $temp['menu_gr_id']) 
                            {
                                echo "selected";
                            } 
                        }
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
 <?php
 	echo isset($_GET['id']) ? '</fieldset>' : '';
 ?>
 </form>
<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="livicon" data-name="bell" data-loop="true" data-color="#fff" data-hovercolor="#fff" data-size="18"></i>
             <?php if(isset($_GET['act'])) echo $_GET['act']=='update' ? 'Sửa' : 'Thêm'; else echo "Thêm"; ?> menu
        </h3>
        <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
        </span>
    </div>
    <div class="panel-body border">
     <?php
		echo (isset($_GET['group_id']) && $_GET['group_id']==0) || !isset($_GET['group_id']) ? '<fieldset disabled>' : '';
	 ?>
        <form action="control/proccess-menu.php" method="post" class="form-horizontal form-bordered">
            <div class="form-group">
                <label class="col-md-3 control-label" for="example-text-input">Tên menu</label>
                <div class="col-md-6">
                    <input type="text" id="example-text-input" name="menu_name" class="form-control" placeholder="Tên menu" value="<?php if(isset($_GET['id']))echo $temp['menu_name'];?>">     
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-3 control-label" for="example-select">Kiểu menu</label>
                <div class="col-md-6">
                    <select id="type-menu-select" name="menu_type" class="form-control" size="1">
                        <option value="0">Chọn kiểu menu</option>
                        <?php
                            $menu_type_obj = new menu_type();
                            $temp_menu_type = $menu_type_obj->getAllMenuType();
                            foreach ($temp_menu_type as $val)
                            {
                        ?>
                        <option data-url="<?php echo $val['view']?>" value="<?php echo $val['mn_type_id'] ?>" 
                        <?php 
                        if(isset($_GET['id'])){
                            if($val['mn_type_id'] == $temp['mn_type_id']) 
                            {
                                echo "selected";
                            } 
                        }
                        ?>><?php echo $val['type_name']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group" id="hidden-cat">
                <label class="col-md-3 control-label" for="example-select">Danh mục</label>
                <div class="col-md-6">
                    <select id="example-select" name="cat_id" class="form-control" size="1">
                        <option value="0">Please select</option>
                          <?php
							//$temp_cat = $cat_obj->getAllCat();
							$cat_obj = new category();
							$temp_cat = $cat_obj->getAllCat('position');
							echo buildCatDeQuy($temp_cat,0);
						?>
                    </select>
                </div>
            </div>
            <div class="form-group" id="hidden-cat-product">
                <label class="col-md-3 control-label" for="example-select">Danh mục sản phẩm</label>
                <div class="col-md-6">
                    <select id="example-select" name="cat_pro_id" class="form-control" size="1">
                        <option value="0">Please select</option>
                          <?php
							//$temp_cat = $cat_obj->getAllCat();
							$cat_obj = new category_product();
							$temp_cat = $cat_obj->getAllCat('position');
							echo buildCatDeQuy($temp_cat,0);
						?>
                    </select>
                </div>
            </div>
            <div class="form-group" id="hidden-url">
                <label class="col-md-3 control-label" for="example-text-input">Url</label>
                <div class="col-md-6">
                    <input type="text" id="example-text-input" name="url" class="form-control" placeholder="Url" value="<?php if(isset($_GET['id']))echo $temp['url'];?>">     
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="example-email">Position</label>
                <div class="col-md-6">
                    <input type="text" id="example-email" name="position" class="form-control" placeholder="Thứ tự" value="<?php if(isset($_GET['id'])) echo $temp['position'];?>"></div>
            </div>
            
            <div class="form-group">
                <label class="col-md-3 control-label" for="example-select">Chọn menu cha</label>
                <div class="col-md-6">
                    <select id="example-select" name="parent_id" class="form-control" size="1">
                        <option value="0"><strong>Không có cấp cha</strong></option>
                        <?php
                            $menu_obj = new menu();
							$group_id = isset($_GET['group_id']) ? $_GET['group_id'] : '';
                            $temp_menu = isset($_GET['id']) ? $menu_obj->getAllMenuExceptId($_GET['id'],$group_id,'position') : $menu_obj->getAllMenu($group_id,'position');
							$id = isset($_GET['id']) ? $temp['parent_id'] : 0;
							echo buildMenuDeQuy($temp_menu,$id);
                           
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                	<input type="hidden" name="id" value="<?php 
					if(isset($_GET['id'])) echo $_GET['id'];  ?>" />
                    <input type="hidden" name="menu_group" value="<?php echo isset($_GET['group_id']) ? $_GET['group_id'] : '' ?>"  />
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
             <?php
				echo (isset($_GET['group_id']) && $_GET['group_id']==0) || !isset($_GET['group_id']) ? '</fieldset>' : '';
			 ?>
        </form>
    </div>
</div>
<?php
function buildMenuDeQuy($items,$id_check,$space='', $parent = 0)
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
			$id = $item['menu_id'];
			if($item['menu_id']==$id_check) $str = "selected class='bold-option'";
            $menu_con_html .="<option {$str} value='$id'>".$space.$item['menu_name']."</option>";    
			$str ="";     
            $menu_con_html .= buildMenuDeQuy($items,$id_check,$space, $item['menu_id']);                 
        }
    }
    return $menu_con_html;
}
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