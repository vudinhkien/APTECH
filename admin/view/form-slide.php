<?php
	require_once('../models/config.php');	
	require_once('../models/class.php');
	require_once('../models/class-slide.php');
	if(isset($_GET['id']))
	{
		$slide_obj = new slidehow();
		$temp = $slide_obj->getSlideById($_GET['id']);
		
	}
?>
<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="livicon" data-name="bell" data-loop="true" data-color="#fff" data-hovercolor="#fff" data-size="18"></i>
             <?php if(isset($_GET['act'])) echo $_GET['act']=='update' ? 'Sửa' : 'Thêm'; else echo "Thêm"; ?> slide
        </h3>
        <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            <i class="fa fa-fw fa-times removepanel clickable"></i>
        </span>
    </div>
    <div class="panel-body border">
        <form action="control/proccess-news.php" method="post" class="form-horizontal form-bordered"  enctype="multipart/form-data">
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-file-input">Ảnh Chính </label>
                <div class="col-md-9 pad-top20">
                    <input type="file" id="example-file-input" name="file">
                 </div>
                 <?php
				 	if(isset($_GET['id']))echo '<img src="../uploads/'.$temp['slide-chinh'].'" width="150" />';
				 ?>
            </div>
            
          <div class="form-group">
            <label class="col-md-3 control-label" for="example-file-input">Ảnh phụ </label>
                <div class="col-md-9 pad-top20">
                    <input type="file" id="example-file-input" name="file">
                 </div>
                 <?php
				 	if(isset($_GET['id']))echo '<img src="../uploads/'.$temp['slide-phu'].'" width="150" />';
				 ?>
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