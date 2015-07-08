
// JavaScript Document
//////////////////////////////////// chữ chạy từ từ hiện lên menu-con ///////////////////////////////////
$(document).ready(function(e) {
    $('.main-menu li').hover(function(){
		$(this).css('cursor','pointer');
		$(this).find('ul:first').css({visibility: 'visible',display: 'none'}).show(200);
		$(this).find('#sub-menu li ul').css({visibility: 'hidden',display: 'none'});
		},function(
		){
			$(this).find('ul').css('visibility','hidden');
			})
				});
				////////////////////////////Banner///////////////////
		$('#main-banner').find('img:gt(0)').hide();
		setInterval(function(){
			$('#main-banner :first-child').fadeOut().next('img').fadeIn().end().appendTo('#main-banner');
			},3000);
				
					 ////////////////////////////cuộn menu///////////////////
var scrollTop = 0;
var position_menu = 0;
$(document).ready(function(){
	position_menu = $("#header .menu").position();
	$(window).scroll(function () {//bắt sự kiện người dùng scrool chuột
		scrollTop = $(window).scrollTop();//lấy được tợ độ màn hình khi scrool là bao nhiêu px
		if(scrollTop > position_menu.top){//kiểm tra nếu tọa độ scrool > tọa độ hiện tại của menu thì gán class fixed
			$('#header .menu').addClass('fixed');
		}else{//ngược lại bỏ class fixed
			$('#header .menu').removeClass('fixed');
		}
   });

/******************************* ZOom ****************************************/
    	
	$('#zoom').okzoom
	({
        width: 300,
        height: 300,
        border: "1px solid black",
        shadow: "0 0 5px #000"
     });
	 

   
			////////////////////////////cuộn top///////////////////
			
			$(document).ready(function(){
				$(window).scroll(function(){
						if($(this).scrollTop()!=0)
							{
							$('#bttop').fadeIn();
							}
						else{
							$('#bttop').fadeOut();
							}
				});
					$('#bttop').click(function(){
						$('body,html').animate({scrollTop:0},800);
				});
	});
	
	

			<!--đặt hàng-->
	
	$(".center-tren2-3 input").click(function(){
		var pro_id = $(this).data("id");
		var link_image = $(this).data("image");
		var price = $(this).data("price");
		var name_product = $(this).data("product");
		$.ajax({
			type:"POST",
			url:"control/proccess-cart.php",
			dataType:"json",
			data:{
					id:pro_id,
					image:link_image,
					price:price,
					name:name_product
				},
			success: function(result){	
				$('.dathang  b').html(+result+" ");
				},
			error: function(e){
				alert("lỗi roài");
				}
			
			});
		});
		
		
		<!--dấu trừ-->
		
		$('.addcomma').autoNumeric('init');
	$('.minus').on('click',preventMultiActionInSecond(function(event){
		var id = $(this).data('id');
		var val = parseInt($('#ketqua-'+id).val());
		$.ajax({
			type:"POST",
			url:"control/ajax-shopping.php",
			dataType:"json",
			data:{
					act:"tru",
					val:val,
					id:id
				},
			success: function(result){
				var tong = 0;			
				if(result=='die')
				{
					$('.minus').on('setDefaultValue',function(){
						$('#cart-content').html("<tr><td colspan='7'>Giỏ hàng rỗng</td></tr>");
							$('#sub-total').autoNumeric('set',tong);
							$('#total').autoNumeric('set',tong);
						})
					throw $('.minus').trigger("setDefaultValue");
				}
				var abc = $.parseJSON(JSON.stringify(result));
				if(!abc.hasOwnProperty(id)){
					$('#item-'+id).fadeOut(300, function() { $(this).remove(); });
				}
				else{
					$('#ketqua-'+id).val(abc[id].soluong);
					$('#price-item-'+id).fadeOut(300).fadeIn(300, function() { $(this).autoNumeric('set', abc[id].soluong*abc[id].price); });
				}
				if(abc=='')
				{
					$('#cart-content').append("<tr><td colspan='7'>Giỏ hàng rỗng</td></tr>");
				}
				$.each(abc,function(i,item){
					tong += abc[i].soluong*abc[i].price;
				});
				$('#sub-total').fadeOut(300).fadeIn(300, function() { $(this).autoNumeric('set',tong); }).css({'background-color': '#F8F8F8','font-weight': 'bold'});
					$('#total').fadeOut(300).fadeIn(300, function() { $(this).autoNumeric('set',tong).css({'background-color': '#F8F8F8','font-weight': 'bold'}); });
				//window.location.reload();
			},
			error: function(e){
				alert("Lỗi roài");
				}
			});
	},500));
	
	<!--dấu cộng-->		
	$('.plus').on('click',preventMultiActionInSecond(function(event){
		var id = $(this).data('id');
		var val = parseInt($('#ketqua-'+id).val());
		if(val>=max_num){
			$.ajax({
				type:"POST",
				url:"control/ajax-shopping.php",
				dataType:"json",
				data:{
					id:id,
					act:">"+max_num
				},
				success: function(result){
					//$('.plus').focus();
					var tong = 0;
						if(result=='die')
						{
							$('.plus').on('setDefaultValue',function(){
								$('#cart-content').html("<tr><td colspan='7'>Giỏ hàng rỗng</td></tr>");
									$('#sub-total').autoNumeric('set',tong);
									$('#total').autoNumeric('set',tong);
								})
							throw $('.plus').trigger("setDefaultValue");
						}
					$('#ketqua-'+id).val(result);
					}
				});
			throw '';
			
			}
		$.ajax({
				type:"POST",
				url:"control/ajax-shopping.php",
				dataType:"json",
				data:{
						id:id,
						val:val,
						act: "cong"
					},
				success: function(result)
				{
					var tong = 0;
					if(result=='die')
					{
						$('.plus').on('setDefaultValue',function(){
							$('#cart-content').html("<tr><td colspan='7'>Giỏ hàng rỗng</td></tr>");
								$('#sub-total').autoNumeric('set',tong);
								$('#total').autoNumeric('set',tong);
							})
						throw $('.plus').trigger("setDefaultValue");
					}
					var abc = $.parseJSON(JSON.stringify(result));
					$('#ketqua-'+id).val(abc[id].soluong);
					$('#price-item-'+id).fadeOut(300).fadeIn(300, function() { $(this).autoNumeric('set', abc[id].soluong*abc[id].price); });
					$.each(abc,function(i,item){
						tong += abc[i].soluong*abc[i].price;
					});
					$('#sub-total').fadeOut(300).fadeIn(300, function() { $(this).autoNumeric('set',tong); }).css({'background-color': '#F8F8F8','font-weight': 'bold'});
					$('#total').fadeOut(300).fadeIn(300, function() { $(this).autoNumeric('set',tong).css({'background-color': '#F8F8F8','font-weight': 'bold'}); });
				}
			});
	},500));
	
	<!--dấu xóa-->
	
	$('.remove input').one('click',function(){
		var id = $(this).data('id');
		$.ajax({
				type:"POST",
				url:"control/ajax-shopping.php",
				dataType:"json",
				data:{
						id:id,
						act:"xoa"
					},
				success: function(result){
						var tong = 0;
						if(result=='die')
						{
							$('.remove').on('setDefaultValue',function(){
								$('#cart-content').html("<tr><td colspan='7'>Giỏ hàng rỗng</td></tr>");
									$('#sub-total').autoNumeric('set',tong);
									$('#total').autoNumeric('set',tong);
								})
							throw $('.remove').trigger("setDefaultValue");
						}
					var abc = $.parseJSON(JSON.stringify(result));
					$.each(abc,function(i,item){
						tong += abc[i].soluong*abc[i].price;
					});
					$('#sub-total').fadeOut(300).fadeIn(300, function() { $(this).autoNumeric('set',tong); }).css({'background-color': '#F8F8F8','font-weight': 'bold'});
					$('#total').fadeOut(300).fadeIn(300, function() { $(this).autoNumeric('set',tong).css({'background-color': '#F8F8F8','font-weight': 'bold'}); });
					$('#item-'+id).fadeOut(300, function() { $(this).remove(); });
					if(abc=='')
					{
						$('#cart-content').append("<tr><td colspan='7'>Giỏ hàng rỗng</td></tr>");
					}
				}
			});
	});	
	$('.ketquaxx').keyup(function(e){
		if(e.keyCode == 13){
		var id = $(this).data('id');
		var val = parseInt($(this).val());
		if(val>=max_num){
			$.ajax({
				type:"POST",
				url:"control/ajax-shopping.php",
				dataType:"json",
				data:{
					id:id,
					act:">"+max_num
				},
				success: function(result){
					//$('.plus').focus();
					var tong = 0;
						if(result=='die')
						{
							$('.remove').on('setDefaultValue',function(){
								$('#cart-content').html("<tr><td colspan='7'>Giỏ hàng rỗng</td></tr>");
									$('#sub-total').autoNumeric('set',tong);
									$('#total').autoNumeric('set',tong);
								})
							throw $('.remove').trigger("setDefaultValue");
						}
					$('#ketqua-'+id).val(result);
					}
				});
			throw '';
			
			}
		$.ajax({
		type:"POST",
		url:"control/ajax-shopping.php",
		dataType:"json",
		data:{
				act:"keypress",
				id:id,
				number:val
			},
		success: function(result){	
			var tong = 0;
			if(result=='die')
			{
				$('.remove').on('setDefaultValue',function(){
					$('#cart-content').html("<tr><td colspan='7'>Giỏ hàng rỗng</td></tr>");
						$('#sub-total').autoNumeric('set',tong);
						$('#total').autoNumeric('set',tong);
					})
				throw $('.remove').trigger("setDefaultValue");
			}		
			var abc = $.parseJSON(JSON.stringify(result));
			if(!abc.hasOwnProperty(id)){
				$('#item-'+id).fadeOut(300, function() { $(this).remove(); });
			}
			else{
				$('#ketqua-'+id).val(abc[id].soluong);
				$('#price-item-'+id).fadeOut(300).fadeIn(300, function() { $(this).autoNumeric('set', abc[id].soluong*abc[id].price); });
			}
			if(abc=='')
			{
				$('#cart-content').append("<tr><td colspan='7'>Giỏ hàng rỗng</td></tr>");
			}
			$.each(abc,function(i,item){
				tong += abc[i].soluong*abc[i].price;
			});
			$('#sub-total').fadeOut(300).fadeIn(300, function() { $(this).autoNumeric('set',tong); }).css({'background-color': '#F8F8F8','font-weight': 'bold'});
				$('#total').fadeOut(300).fadeIn(300, function() { $(this).autoNumeric('set',tong).css({'background-color': '#F8F8F8','font-weight': 'bold'}); });
			//window.location.reload();
		},
		error: function(e){
			alert("Lỗi roài");
			}
		});
		}
	});	
});
	
function preventMultiActionInSecond(func, interval) { // ngăn ngừa các hành động tấn công bằng cách ấn liên tục vào nút cộng, trừ...
    var lastCall = 0;
    return function() {
        var now = Date.now();
        if (lastCall + interval < now) {
            lastCall = now;
            return func.apply(this, arguments);
        }
    };
}
function debounce(func, interval) { //khi hành động cuối cùng thực hiện xong thì mới gọi, ví dụ như người dùng gõ bàn phím thoải mái, khi ngừng thì mới gọi ajax
    var lastCall = -1;
    return function() {
        clearTimeout(lastCall);
        var args = arguments;
        var self = this;
        lastCall = setTimeout(function() {
            func.apply(self, args);
        }, interval);
    };
}
/////////////////////check điều kiện đăng ký//////////////////////
function check_mobile(id){
	 txtcheck = document.getElementById(id).value;
		 if(txtcheck.trim()== "")
		 {
		 alert("Bạn chưa nhập mobile");
		 document.getElementById(id).focus();
		 document.getElementById(id).className = "error";	
		 }
	}
	
	function check_pass(id){
	 txtcheck = document.getElementById(id).value;
		 if(txtcheck.trim()== "")
		 {
		 alert("Bạn chưa nhập pass");
		 document.getElementById(id).focus();
		 document.getElementById(id).className = "error";	
		 }
	}
		function check_user(id){
	 txtcheck = document.getElementById(id).value;
		 if(txtcheck.trim()== "")
			 {
			 alert("Bạn chưa nhập user");
			 document.getElementById(id).focus();
			 document.getElementById(id).className = "error";	
			 }
		}
		
		
	function check_email(id){
	 txtcheck = document.getElementById(id).value;
		 if(txtcheck.trim()== "")
		 {
		 alert("Bạn chưa nhập email");
		 document.getElementById(id).focus();
		 document.getElementById(id).className = "error";	
		 }
	}
	function check_fullname(id){
	 txtcheck = document.getElementById(id).value;
		 if(txtcheck.trim()== "")
		 {
		 alert("Bạn chưa nhập họ và tên");
		 document.getElementById(id).focus();
		document.getElementById(id).className = "error";	
		 }
	}
	function check_address(id){
	 txtcheck = document.getElementById(id).value;
		 if(txtcheck.trim()== "")
		 {
		 alert("Bạn chưa nhập địa chỉ");
		 document.getElementById(id).focus();
		 document.getElementById(id).className = "error";	
		 }
	}
	
