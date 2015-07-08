
$(document).ready(function() {
	$.fn.editable.defaults.mode = 'popup';
		$('.editable').editable();		
		$(document).on('click','.editable-submit',function(){
			var key = $(this).closest('.editable-container').prev().data('key');
			var x = $(this).closest('.editable-container').prev().data('pk');
			var y = $('.input-sm').val();
			var z = $(this).closest('.editable-container').prev().text(y);
	
			$.ajax({
				url: "control/proccess-user-ajax.php?id="+x+"&data="+y+'&key='+key,
				type: 'GET',
				success: function(s){
					if(s=="true")
					{
						$(z).html(y+"<div style='color:red'>(Cập nhật thành công)</div>");
					}
					else if(s=="false"){
						$(z).html("<div style='color:red'>Cập nhật thất bại, vui lòng thử lại hoặc F5 lại trang</div>");
					}
					if(s=="select-true")
					{
						
					}
					else if(s=="select-false"){
						$(z).html("<div style='color:red'>Cập nhật thất bại, vui lòng thử lại hoặc F5 lại trang</div>");
					}
				},
				error: function(e){
					alert('Yêu cầu lỗi!!');
				}
			});
		});

	$('#status').editable({
		prepend: "not selected",
		source: [
			{value: 1, text: 'Activated'},
			{value: 2, text: 'Pending'},
			{value: 3, text: 'Deleted'}
		],
		display: function(value, sourceData) {
			 var colors = {1: "text-success", 2: "text-warning", 3: "text-danger"},
				 elem = $.grep(sourceData, function(o){return o.value == value;});
				 
			 if(elem.length) {
				 $(this).text(elem[0].text).removeClass('text-success text-warning text-danger');     
				 $(this).text(elem[0].text).addClass(colors[value]); 
			 }
		}   
	});     
	
	$('#save_image').click(function(){
		$.ajax({
			type: "POST",
			url: "control/proccess-upload-image.php",
			data: {
				img: $('#image_src').find('img').attr('src'),
				id: $('#image_src').data('id')
			},
			contentType: "application/x-www-form-urlencoded;charset=UTF-8",
			success: function(result){
				if(result=="true")
				{
					$('#remove').hide();
					$('#save_image').hide();
					$('#result_image').html("Cập nhật thành công");
				}
			},
			error: function(e){
				alert("lỗi roài");	
			}
		
		});
		
		});
	$('#change_img').click(function(){
		$('#remove').show();
		$('#save_image').show();
	});
	$('#remove').click(function(){
		if(confirmBox()){
			$('#remove').attr("data-dismiss","");
		}
		else
		{
			
		}
	});
});