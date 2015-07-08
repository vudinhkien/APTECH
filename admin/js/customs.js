$(document).ready(function(e) {
  $("#hidden-cat").hide();
  $("#hidden-url").hide();
  $("#hidden-cat-product").hide();
  var check_selected = $('#type-menu-select').find(":selected").data("url");
    if(check_selected=='view=news'){
		$("#hidden-cat").show(300);
		}
	else if(check_selected=='view=custom')
	{
		$("#hidden-url").show(300);
	}
	else if(check_selected=='view=product')
	{
		$("#hidden-cat-product").show(300);
	}
  $('#type-menu-select').change(function(){
  //var x =  $(this).attr('#data-url');
  var url = $(this).children(":selected").data("url");
  if(url=='view=news'){
	  $("#hidden-cat").show(300);
	  $("#hidden-cat-product").hide();
	  $("#hidden-url").hide();
	  }
	else if(url=='view=custom'){
		  $("#hidden-cat").hide();
		  $("#hidden-cat-product").hide();
		  $("#hidden-url").show(300);
		}
	else if(url=='view=product'){
		  $("#hidden-cat").hide();
		  $("#hidden-cat-product").show(300);
		  $("#hidden-url").hide();
		}
	else {
			 $("#hidden-cat").hide();
 			 $("#hidden-url").hide();
			 $("#hidden-cat-product").hide();
			}
  });
  
		
	//load lại page khi onchange nhóm menu trong form-menu
	$("#group_menu").change(function(){
    	window.location='index.php?view=form-menu&group_id=' + this.value;
  	});
	//load lại page khi onchange nhóm menu trong list-menu
	$("#group_menu_list").change(function(){
		window.location='index.php?view=list-menu&group_id=' + this.value;
  	});
	
	//them thong so ky thuat
	$('#them_attr').click(function(){
		var i = $("#form_product table#tskt tr").length + 1;
		$('form#form_product').find('table#tskt').append('<tr id="kt'+i+'"><td class="space_col"><input name="thongso[]" type="text" placeholder="nhập thông số" class="form-control"/></td><td class="space_col"><input name="giatri[]" type="text" placeholder="nhập giá trị" class="form-control"/></td><td><button class="btn btn-labeled btn-danger" onclick="$(\'#kt'+i+'\').remove()" type="button"><i class="glyphicon glyphicon-remove"></i></button></td></tr>');
		});
	//xoa thong so ky thuat
	$('.xoa_item').click(function(){
		 $('#kt1').remove();
		});
	//them anh phu
	$('#them_img').click(function(){
		var i = $("#form_product table#image_more tr").length + 1;
		$('form#form_product').find('table#image_more').append('<tr id="img'+i+'"><td class="space_col"><input name="image[]" type="file" placeholder="nhập ảnh" /></td><td class="space_col"><input name="thutu_anh[]" type="text" placeholder="nhập thứ tự" class="form-control"/></td><td><button class="btn btn-labeled btn-danger" onclick="$(\'#img'+i+'\').remove()" type="button"><i class="glyphicon glyphicon-remove"></i></button></td></tr>');
		});
	//xoa anh phu
	$('.xoa_anh').click(function(){
		 $('#img1').remove();
		});
});
function confirmBox() {
	var a;
	a =  confirm("Bạn chắc chắn muốn xóa chứ?");
	if(a==false)
	{
		return false;   
	}
	else
	{
		return true;	
	}
}