<?php
	require_once('../models/class-cat-product.php');
	require_once('../models/class-product.php');
	if(isset($_GET['id']))
	{
		$product_obj = new product();
		$temp = $product_obj->getProductById($_GET['id']);
		//print_r($temp);
	}
?>
 <ul class="nav  nav-tabs ">
    <li class="active">
        <a href="#tab1" data-toggle="tab">
           <i class="livicon" data-name="apple" data-size="16" data-c="#000" data-hc="#000" data-loop="true"></i>
        Thông tin cơ bản</a>
    </li>
    <li>
        <a href="#tab2" data-toggle="tab">
     <i class="livicon" data-name="laptop" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
        Thông số kỹ thuật</a>
    </li>
    <li>
        <a href="#tab3" data-toggle="tab">
     <i class="livicon" data-name="image" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
        Ảnh bổ sung</a>
    </li>
                           
</ul>
 <form action="control/proccess-product.php" method="post" id="form_product" class="form-horizontal form-bordered" enctype="multipart/form-data">
 <div  class="tab-content mar-top">
    <div id="tab1" class="tab-pane fade active in">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">    
                            Thông tin cơ bản
                        </h3>
    
                    </div>
                    <div class="panel-body">
                     
                       <div class="col-md-8">
                           <div class="form-group">
                                <label class="col-md-3 control-label hidden-xs" for="example-text-input">Tên sản phẩm</label>
                                <div class="col-md-6">
                                    <input type="text" id="example-text-input" name="pro_name" class="form-control" placeholder="Tên sản phẩm" value="<?php if(isset($_GET['id']))echo $temp['pro_name'];?>">     
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="example-text-input">Mã sản phẩm</label>
                                <div class="col-md-6">
                                    <input type="text" id="example-text-input" name="ma_sp" class="form-control" placeholder="Mã sản phẩm" value="<?php if(isset($_GET['id']))echo $temp['ma_sp'];?>">     
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="example-text-input">Màu sắc</label>
                                <div class="col-md-6">
                                    <input type="text" id="example-text-input" name="mausac" class="form-control" placeholder="Màu sắc" value="<?php if(isset($_GET['id']))echo $temp['mausac'];?>">     
                                </div>
                            </div>
                            
                               <div class="form-group">
                                    <label class="col-md-3 control-label" for="example-file-input">Ảnh sản phẩm </label>
                                    <div class="col-md-9 pad-top20">
                                        <input type="file" id="example-file-input" name="file">
                                     </div>
                                     <?php
                                        if(isset($_GET['id']))echo '<img src="../uploads/'.$temp['image'].'" width="150" />';
                                     ?>
                                </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label" for="example-text-input">Giá niêm yết</label>
                                <div class="col-md-6">
                                    <input type="text" id="price_niemyet" data-a-sign=" đ" data-p-sign="s" data-a-dec="," data-a-pad="false" data-a-sep="." name="price_niemyet" class="form-control addcomma" placeholder="Nhập giá niêm yết" value="<?php if(isset($_GET['id']))echo $temp['price_niemyet'];?>">     
                                </div>
                            </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label" for="example-text-input">Giá khuyến mại</label>
                                <div class="col-md-6">
                                    <input type="text" id="price_sale" data-a-sign=" đ" data-p-sign="s" data-a-dec="," data-a-pad="false" data-a-sep="." name="price_sale" class="form-control addcomma" placeholder="Nhập giá khuyến mại" value="<?php if(isset($_GET['id']))echo $temp['price_sale'];?>">     
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-3 control-label" for="example-text-input">Số lượng</label>
                                <div class="col-md-6">
                                    <input type="number" id="soluong" name="soluong" class="form-control" placeholder="Nhập số lượng" value="<?php if(isset($_GET['id']))echo $temp['soluong'];?>">     
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="example-email">Position</label>
                                <div class="col-md-6">
                                    <input type="number" id="position" name="position" class="form-control" placeholder="Thứ tự" value="<?php if(isset($_GET['id'])) echo $temp['position'];?>"></div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-3 control-label">Sản phẩm</label>
                                <div class="col-md-9">
                                    <div class="radio mar-left5">
                                        <label for="example-radio1">
                                            <input type="radio" id="example-radio1" name="hot" value="0"
                                            <?php if(isset($_GET['id'])){
                                                    echo $temp['hot']==0 ? 'checked="checked"' : '';
                                                }
                                                else
                                                echo 'checked="checked"';
                                            ?>
                                             >Mới</label>
                                    </div>
                                    <div class="radio mar-left5">
                                        <label for="example-radio2">
                                                <input type="radio" id="example-radio2" name="hot" value="1"
                                             <?php if(isset($_GET['id'])){
                                                    echo $temp['hot']==1 ? 'checked="checked"' : '';
                                                }
                                            ?>
                                            >Nổi bật</label>
                                    </div>
                                </div>
                                 
                             
                                
                            </div>	
          					 <div class="form-group">
                                <label class="col-md-3 control-label">Active</label>
                                <div class="col-md-9">
                                    <div class="radio mar-left5">
                                        <label for="example-radio3">
                                            <input type="radio" id="example-radio3" name="active" value="1"
                                             <?php if(isset($_GET['id'])){
                                                    echo $temp['status']==1 ? 'checked="checked"' : '';
                                                }
                                                else
                                                echo 'checked="checked"';
                                            ?>
                                            >Bật</label>
                                    </div>
                                    <div class="radio mar-left5">
                                        <label for="example-radio4">
                                            <input type="radio" id="example-radio4" name="active" value="0"
                                             <?php if(isset($_GET['id'])){
                                                    echo $temp['status']==0 ? 'checked="checked"' : '';
                                                }
                                            ?>
                                            >Tắt</label>
                                    </div>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-3 control-label" for="example-textarea-input">Giới thiệu ngắn</label>
                                <div class="col-md-9">
                                   <textarea cols="70" rows="10" name="tomtat"><?php if(isset($_GET['id']))echo $temp['tomtat'];?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="example-textarea-input">Thông tin chi tiết</label>
                                <div class="col-md-9">
                                   <textarea id="ckeditor_full" name="description"><?php if(isset($_GET['id']))echo $temp['description'];?></textarea>
                                </div>
                            </div>  
                        </div>
                        <div class="col-md-4">
                        	  <div class="form-group">
                                <label class="col-md-12 reset-margin-padding">Chọn danh mục sản phẩm:</label>
                                <div class="col-md-12 grey-back">
                                    <table class="align-col">
                                          <?php
                                            //$temp_cat = $cat_obj->getAllCat();
                                            $cat_obj = new category_product();
                                            $temp_cat = $cat_obj->getAllCat('position');
                                            echo buildCatDeQuy($temp_cat,0);
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="tab2" class="tab-pane fade">
        <div class="row">
            <div class="col-md-12 pd-top">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-12">
                            <table id="tskt">
                            	<tr id="kt1">
                                	<td class="space_col"><input name="thongso[]" type="text" placeholder="nhập thông số" class="form-control" /></td>
                                    <td class="space_col"><input name="giatri[]" type="text" placeholder="nhập giá trị" class="form-control" /></td>
                                    <td><button class="btn btn-labeled btn-danger xoa_item" type="button">
                                            <i class="glyphicon glyphicon-remove"></i>
                                        </button></td>
                                    
                                </tr>
                            </table>
                             
                            </div>
                            <div class="col-md-12 panel-body">
                            	<button type="button" id="them_attr" class="btn btn-primary">Thêm thông số</button>
                            </div>
                        </div>
                        
                    </div>
            </div>
        </div>
    </div>
    <div id="tab3" class="tab-pane fade">
        <div class="row">
            <div class="col-md-12 pd-top">
              
                    <div class="form-body">
                           <div class="form-group">
                            <div class="col-md-12">
                            <table id="image_more">
                            	<tr id="img1">
                                	<td class="space_col"><input name="image[]" type="file" placeholder="nhập ảnh" /></td>
                                    <td class="space_col"><input name="thutu_anh[]" type="text" placeholder="nhập thứ tự" class="form-control"/></td>
                                    <td><button class="btn btn-labeled btn-danger xoa_anh" type="button">
                                            <i class="glyphicon glyphicon-remove"></i>
                                        </button></td>
                                    
                                </tr>
                            </table>
                             
                            </div>
                            <div class="col-md-12 panel-body">
                            	<button type="button" id="them_img" class="btn btn-primary">Thêm ảnh</button>
                            </div>
                        </div>
                    </div>

            </div>
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
<?php
function buildCatDeQuy($items,$id_check,$space='', $parent = 0)
{
    $menu_con_html = '';
	$str='';
	if($parent==0){  
    	$space=''; }
		else{  
    	$space .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";  
		}  

    foreach($items as $item)
    {
        if ($item['parent_id'] == $parent) {
			$id = $item['cat_id'];
			if($item['cat_id']==$id_check) $str = "checked class='bold-option'";
            $menu_con_html .="<tr><td>".$space."<input type='checkbox' {$str} name='cat_id[]' value='$id'>&nbsp;".$item['cat_name'].'</td></tr>';       
            $str='';
			$menu_con_html .= buildCatDeQuy($items,$id_check,$space, $item['cat_id']);                 
        }
    }
    return $menu_con_html;
}
?>