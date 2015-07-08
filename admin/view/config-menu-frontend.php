<?php
	require_once('../models/class-menu.php');
	require_once('../models/class-config.php');
	$menu_group_obj = new menu_group();
	$temp = $menu_group_obj->getAllMenuGroup(1);//1 tức là active
	$cauhinh_obj = new cauhinhchung();
	$config_temp = $cauhinh_obj->getConfigByDieukien("name='menu_config'");
	$menu_config = unserialize($config_temp['values_data']);
	//$xxx = array("top_menu"=>0,"main_menu"=>0,"left_menu"=>0,"footer_menu"=>0);
	//$cauhinh_obj->updateConfig('',serialize($xxx),"name='menu_config'");
?>
<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="livicon" data-name="bell" data-loop="true" data-color="#fff" data-hovercolor="#fff" data-size="18"></i>
           Cấu hình menu cho trang ngoài
        </h3>
        <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            <i class="fa fa-fw fa-times removepanel clickable"></i>
        </span>
    </div>
    <div class="panel-body border">
        <form action="control/proccess-config-menu-frontend.php" method="post" class="form-horizontal form-bordered">
           <?php
		   $i=0;
		   		foreach ($menu_config as $key=>$val){
		   ?>
              <div class="form-group">
                <label class="col-md-3 control-label" for="example-select"><?php echo $key ?></label>
                <div class="col-md-6">
                    <select id="example-select" name="menu_gr_id_<?php echo $i++; ?>" class="form-control" size="1">
                        <option value="0">Chọn nhóm menu</option>
                        <?php
							foreach ($temp as $values_select)
							{
						?>
                        <option value="<?php echo $values_select['menu_gr_id'] ?>"
                        <?php 
							if($values_select['menu_gr_id']==$val) echo "selected"
						?>>
						<?php echo $values_select['menu_group_name']; ?></option>
                        <?php
							}
						?>
                    </select>
                </div>
            </div>
            <?php
				}
			?>
    
            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <input type="hidden" name="values_data" value='<?php echo $config_temp['values_data'];?>' />
                    <button type="submit" name="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
                    <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>