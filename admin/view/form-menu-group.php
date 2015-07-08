<?php
	require_once('../models/class-menu.php');
	if(isset($_GET['id']))
	{
		$menu_group_obj = new menu_group();
		$temp = $menu_group_obj->getMenuGroupById($_GET['id']);
		
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
        <form action="control/proccess-menu-group.php" method="post" class="form-horizontal form-bordered">
            <div class="form-group">
                <label class="col-md-3 control-label" for="example-text-input">Tên nhóm menu</label>
                <div class="col-md-6">
                    <input type="text" id="example-text-input" name="menu_group_name" class="form-control" placeholder="Tên nhóm menu" value="<?php if(isset($_GET['id']))echo $temp['menu_group_name'];?>">     
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Kích hoạt</label>
                <div class="col-md-9">
                    <div class="radio mar-left5">
                        <label for="example-radio1">
                            <input type="radio" id="example-radio1" name="status" value="1"
                            <?php if(isset($_GET['id'])){
									echo $temp['status']==1 ? 'checked="checked"' : '';
								}
								else
								echo 'checked="checked"';
							?>
                             >Bật</label>
                    </div>
                    <div class="radio mar-left5">
                        <label for="example-radio2">
                            <input type="radio" id="example-radio2" name="status" value="0"
                             <?php if(isset($_GET['id'])){
									echo $temp['status']==0 ? 'checked="checked"' : '';
								}
							?>
                            >Tắt</label>
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