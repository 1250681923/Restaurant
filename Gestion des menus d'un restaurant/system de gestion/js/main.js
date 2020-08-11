
//显示第一个菜类
	$('.content li:first .food').addClass("food1");
	/*home菜式导航*/
	var $food1 = $('.food1');
	var $last = $food1;
	var $lis = $('.content li');
	$lis.on('click',function(e) {
		$last.prev().prev().css('color', '#9d9d9d');
		$last.prev().css('display', 'none');
		$last.css('display', 'none');
		$(this).children().next().next().css('display', 'block');
		$(this).children().next().css('display', 'block');
		$(this).children('a').css('color', '#EEEE00');
		$last = $(this).children().next().next();
		$('.food').css('z-index','0');
		$('.content .nav').css('height','50px');
		$('.add_food').show();
		e.stopPropagation();
	});
/*菜类删除*/
	$('.type_del').on('click',function(e){
		$del_type = $(this).prev().text();
		$(this).closest('li').remove();
		$('.content li:first .food').show();
		$.ajax({ 
			type: "POST", 	
			url: "admin_del_foodtype.php",
			dataType: "json",
			data: {
				'del_type':$del_type
			},
			success: function(data) {
				
			},
			error: function(jqXHR){     
				alert("发生错误：" + jqXHR.status);  
			}    
		});
		e.stopPropagation();
	});

/*home点击下拉*/
	$('.click_down').on('click',function(){
		if($('.content .nav').css('height')=='50px'){
			$('.food').css('z-index','-1');
			$('.content .nav').css('height','120px');
			$('.add_food').hide();
		}else{
			$('.food').css('z-index','0');
			$('.content .nav').css('height','50px');
			$('.add_food').show();
		}
		
	});
	/*home点击添加*/
	/* $('.add_type span').on('click',function (e) {
        if($('.add_type_content').css('display') == 'none'){
            $('.add_type_content').show();
        }else{
            $('.add_type_content').hide();
        }
		e.stopPropagation();
    }); */
	//有问题？？？？？？？？？？？？？？？？
	/*菜类添加*/
	/* $('.add_type_content input:last').on('click',function(e){
		$ht = "<li><a href='#'></a><span class='glyphicon glyphicon-remove-circle type_del'></span><div class='food'></div></li>";
		$('.add_type').prev().after($ht);
		$('.add_type').prev().children('a').text($('.add_type_content input:first').val());
		
		var $lis = $('.content li:not(li:last)');
		$lis.on('click',function() {
			$last.prev().prev().css('color', '#9d9d9d');
			$last.prev().css('display', 'none');
			$last.css('display', 'none');
			$(this).children().next().next().css('display', 'block');
			$(this).children().next().css('display', 'block');
			$(this).children('a').css('color', '#EEEE00');
			$last = $(this).children().next().next();
			$('.food').css('z-index','0');
			$('.content .nav').css('height','50px');
			$('.add_food').show();
			e.stopPropagation();
		});
		
		$('.type_del').on('click',function(e){
			$(this).closest('li').remove();
			$('.content li:first .food').show();
		});
		
		e.stopPropagation();
	}); */
	//食物添加
	$('.add_food').on('click',function(e){
		if($('.add_foodarea').css('display')== 'none'){
			$('.add_foodarea').show();
		}else{
			$('.add_foodarea').hide();
		}
		e.stopPropagation();
	});
	//食物添加》》》图片预览
	$("#file").on("change", function(e) {
		var file = e.target.files[0]; //获取图片资源		  
		var reader = new FileReader();
		reader.readAsDataURL(file); // 读取文件
		// 渲染文件
		reader.onload = function(arg) {
			var img = '<img class="preview" src="' + arg.target.result + '" alt="preview"/>';
			$("#preview").empty().append(img);
		}
		e.stopPropagation();
	});
	//**更改图片
	$(".file_modify").on("change", function(e) {
		var file = e.target.files[0]; //获取图片资源		  
		var reader = new FileReader();
		reader.readAsDataURL(file); // 读取文件
		// 渲染文件
		$div_=$(this).closest('.food_area').children('div');
		reader.onload = function(arg) {		
			var img = '<img class="img-thumbnail" src="' + arg.target.result + '" />';
			$div_.children('img').remove;
			$div_.empty().append(img);
		}
		e.stopPropagation();
	});
	//详细订单
	$(".one_bill").on('click',function(e){
		if($(this).next().css('display')== 'none'){
			$(this).next().show();
		}else{
			$(this).next().hide();
		}
		e.stopPropagation();
	});
	//要上传文件和数值，目前找不到方法处理
	/* $('.addonefood').on('click',function(){
		var file=document.getElementById('file').files[0];
		
		$pic_path = file.name;
		$type = $('.typename').val();
		$fname = $('.foodname').val();
		$fprice = $('.foodprice').val();
		$.ajax({ 
			type: "POST", 	
			url: "admin_add_food.php",
			dataType: "json",
			data: {
				'pic_path':$pic_path,
				'type':$type,
				'fname':$fname,
				'fprice':$fprice
			},
			success: function(data) {
				
			},
			error: function(jqXHR){     
				alert("发生错误：" + jqXHR.status);  
			}    
		});
	}); */
$(document).ready(function(){
	
	//确定修改
    $('.f_modify').on('click',function(){
		$modify_name = $(this).closest('figcaption').find('.modify_name');
		$modify_price = $(this).closest('figcaption').find('.modify_price');
		$modify_name.val($modify_name.next().text());
		$modify_price.val($modify_price.next().children('b').text());
    });
});