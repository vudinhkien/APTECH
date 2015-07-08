<?php
	require_once('../models/config.php');	
	require_once('../models/class.php');
	require_once('../models/class-menu.php');
	if(isset($_GET['id']))
	{
		$menu_obj = new menu_type();
		$temp = $menu_obj->getMenuTypeById($_GET['id']);
		//print_r($temp);
	}
?>
<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="livicon" data-name="bell" data-loop="true" data-color="#fff" data-hovercolor="#fff" data-size="18"></i>
           <?php if(isset($_GET['act'])) echo $_GET['act']=='update' ? 'Sửa' : 'Thêm'; else echo "Thêm"; ?>  menu
        </h3>
        <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            <i class="fa fa-fw fa-times removepanel clickable"></i>
        </span>
    </div>
    <div class="panel-body border">
        <form action="control/proccess-menu-type.php" method="post" class="form-horizontal form-bordered">
            <div class="form-group">
                <label class="col-md-3 control-label" for="example-text-input">Kiểu menu</label>
                <div class="col-md-6">
                    <input type="text" id="example-text-input" name="type_name" class="form-control" placeholder="Tên menu" value="<?php if(isset($_GET['id']))echo $temp['type_name'];?>">     
                </div>
            </div>
            
            <div class="form-group" id="url">
                <label class="col-md-3 control-label" for="example-text-input">view</label>
                <div class="col-md-6">
                    <input type="text" id="example-text-input" name="view" class="form-control" placeholder="Ví dụ: view=news" value="<?php if(isset($_GET['id']))echo $temp['view'];?>">     
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