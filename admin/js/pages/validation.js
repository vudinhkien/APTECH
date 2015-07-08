$(document).ready(function() {
	$('.addcomma').autoNumeric('init'); 
	$('#form_product').validate({
		rules: {	
			pro_name: {
				required: true,
				minlength: 5
			},
			ma_sp: "required",
			"thongso[]": "required",
			"giatri[]": "required",
			price_niemyet: "required",
			price_sale: "required",
			soluong: {
				required: true,
				number: true
			},
			position: {
				required: true,
				number: true
			},
			tomtat: "required",
			description: "required",
			"cat_id[]":"required"
		},
		messages: {
			pro_name: {
				required: "Vui lòng nhập tên sản phẩm",
				minlength: "Bạn phải nhập tối thiểu 5 ký tự"
			},
			ma_sp: "Bạn phải nhập mã sản phẩm",
			price_niemyet: "Vui lòng nhập giá sản phẩm",
			price_sale: "Vui lòng nhập giá sale",
			soluong: {
				required: "Vui lòng nhập số lượng",
				number: "Bạn phải nhập số"
				},
			position: {
				required: "Vui lòng nhập số thứ tự",
				number: "Bạn phải nhập số"
				},
			tomtat: "Vui lòng nhập nội dung",
			description: "Vui lòng nhập nội dung",
			"thongso[]": "Vui lòng nhập thông số",
			"giatri[]": "Vui lòng nhập giá trị",
			"cat_id[]":"Vui lòng chọn ít nhất 1 category"
		}
	   
	});
});

