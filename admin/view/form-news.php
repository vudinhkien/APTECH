<?php
	require_once('../models/config.php');	
	require_once('../models/class.php');
	require_once('../models/class-news.php');
	require_once('../models/class-cat.php');
	if(isset($_GET['id']))
	{
		$news_obj = new news();
		$temp = $news_obj->getNewsById($_GET['id']);
		
	}
?>
<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="livicon" data-name="bell" data-loop="true" data-color="#fff" data-hovercolor="#fff" data-size="18"></i>
             <?php if(isset($_GET['act'])) echo $_GET['act']=='update' ? 'Sửa' : 'Thêm'; else echo "Thêm"; ?> tin bài
        </h3>
        <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            <i class="fa fa-fw fa-times removepanel clickable"></i>
        </span>
    </div>
    <div class="panel-body border">
        <form action="control/proccess-news.php" method="post" class="form-horizontal form-bordered"  enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-md-3 control-label" for="example-text-input">Tiêu đề</label>
                <div class="col-md-6">
                    <input type="text" id="example-text-input" name="title" class="form-control" placeholder="Tên tieu de" value="<?php if(isset($_GET['id']))echo $temp['title'];?>">     
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="example-file-input">Ảnh đại diện </label>
                <div class="col-md-9 pad-top20">
                    <input type="file" id="example-file-input" name="file">
                 </div>
                 <?php
				 	if(isset($_GET['id']))echo '<img src="../uploads/'.$temp['images'].'" width="150" />';
				 ?>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="example-textarea-input">Tóm tắt</label>
                <div class="col-md-9">
                   <textarea cols="93" rows="10" name="tomtat"><?php if(isset($_GET['id']))echo $temp['tomtat'];?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="example-textarea-input">Noi dung</label>
                <div class="col-md-9">
                   <textarea id="ckeditor_full" name="content"><?php if(isset($_GET['id']))echo $temp['content'];?></textarea>
                </div>
            </div>  
               
               <div class="form-group">
                <label class="col-md-3 control-label" for="example-select">Danh mục</label>
                <div class="col-md-6">
                    <select id="example-select" name="cat_id" class="form-control" size="1">
                        <option value="0">Please select</option>
                        <?php
							$cat_obj = new category();
							$temp_cat = $cat_obj->getAllCat();
							foreach ($temp_cat as $val)
							{
						?>
                        <option value="<?php echo $val['cat_id'] ?>" <?php 
						if(isset($_GET['id'])){
							if($val['cat_id'] == $temp['cat_id']) 
							{
								echo "selected";
							} 
						}
						?>><?php echo $val['cat_name']; ?></option>
                        <?php
							}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Loại tin</label>
                <div class="col-md-9">
                    <div class="radio mar-left5">
                        <label for="example-radio1">
                            <input type="radio" id="example-radio1" name="hotnews" value="0"
                            <?php if(isset($_GET['id'])){
									echo $temp['hot']==0 ? 'checked="checked"' : '';
								}
								else
								echo 'checked="checked"';
							?>
                             >Tin thường</label>
                    </div>
                    <div class="radio mar-left5">
                        <label for="example-radio2">
                            <input type="radio" id="example-radio2" name="hotnews" value="1"
                             <?php if(isset($_GET['id'])){
									echo $temp['hot']==1 ? 'checked="checked"' : '';
								}
							?>
                            >Tin hot</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Tin tiêu điểm</label>
                <div class="col-md-9">
                    <div class="radio mar-left5">
                        <label for="example-radio3">
                            <input type="radio" id="example-radio3" name="featured" value="0"
                             <?php if(isset($_GET['id'])){
									echo $temp['featured_home']==0 ? 'checked="checked"' : '';
								}
								else
								echo 'checked="checked"';
							?>
                            >Tin thường</label>
                    </div>
                    <div class="radio mar-left5">
                        <label for="example-radio4">
                            <input type="radio" id="example-radio4" name="featured" value="1"
                             <?php if(isset($_GET['id'])){
									echo $temp['featured_home']==1 ? 'checked="checked"' : '';
								}
							?>
                            >Tin tiêu điểm</label>
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