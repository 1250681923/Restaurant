
 //显示第一个菜类
	$('.content li:first .food').addClass("food1");
/*home菜式导航*/
    var $food1 = $('.food1');
    var $last = $food1;
    var $lis = $('.content li');
    $lis.on('click',function(e) {
        $last.prev().css('color', '#9d9d9d');
        $last.css('display', 'none');
        $(this).children().next().css('display', 'block');
        $(this).children().css('color', '#EEEE00');
        $last = $(this).children().next();
		$('.food').css('z-index','0');
		$('.content .nav').css('height','50px');
		e.stopPropagation();
    });
/*home菜式导航点击下拉*/
	$('.click_down').on('click',function(){
		if($('.content .nav').css('height')=='50px'){
			$('.food').css('z-index','-1');
			$('.content .nav').css('height','100px');
		}else{
			$('.food').css('z-index','0');
			$('.content .nav').css('height','50px');
		}
	});
$(document).ready(function(){
	
    /*home菜品添加*/
    $f_plus = $('.f_plus');
    $orderNum = $('.footer .badge');
    if(Number($orderNum.text())==0){
    }else{
        $orderNum.css('display','block');
    }
    $f_plus.on('click',function(){
        $('.footer .badge').text(function(index,text){
			return Number(text)+1;
        });
		sessionStorage.setItem('ORDERED_NUM',$('.footer .badge').text());
        $('.footer .badge').css('display','block');
		$('.footer .badge').text(sessionStorage.getItem('ORDERED_NUM'));
		/*ajax异步刷新，添加入数据库*/
		$tableNum = localStorage.getItem('TABLE_NUM');
		$ordernumber = localStorage.getItem('ORDER_NUMBER');
		$foodId = $(this).data('this_f_id');
		//$foodId = 1;
		$.ajax({ 
			type: "POST", 	
			url: "add_ordered_list.php",
			dataType: "json",
			data: {
				'foodId': $foodId,
				'tableNum':$tableNum,
				'ordernumber':$ordernumber
			},
			success: function(data) {
									
			},
			error: function(jqXHR){     
				alert("发生错误：" + jqXHR.status);  
			}    
		});					
    });
    /*ordered数量加减*/
    $num_add = $('.food_num').next();
    $num_minus = $('.food_num').prev();
    $num_add.on('click',function(){
        /*菜品数值*/
        $f_ordered_num = $(this).prev().val();
        $(this).prev().val(Number($f_ordered_num)+1);
        /*价格*/
        $(this).closest('td').next().text(function(index,text){
            return Number(text) + Number(text)/$f_ordered_num;
        });
		/*右下角已点数值*/
		sessionStorage.setItem('ORDERED_NUM',Number(sessionStorage.getItem('ORDERED_NUM'))+1);
		$('.footer .badge').text(sessionStorage.getItem('ORDERED_NUM'));
		/*ajax异步刷新，增加数据库已有食物数量*/
		$tableNum = localStorage.getItem('TABLE_NUM');
		$ordernumber = localStorage.getItem('ORDER_NUMBER');
		$foodId = $(this).data('this_f_id');
		$.ajax({ 
			type: "POST", 	
			url: "add_food_num.php",
			dataType: "json",
			data: {
				'foodId': $foodId,
				'tableNum':$tableNum,
				'ordernumber':$ordernumber
			},
			success: function(data) {
				$('.ordered_price b').text(function(index,text){
					return Number(text) + Number(data.onefood_price);
				});
			},
			error: function(jqXHR){     
				alert("发生错误：" + jqXHR.status);  
			}    
		});
    });
    $num_minus.on('click',function(){
        if(Number($(this).next().val())-1) {
            $f_ordered_num = $(this).next().val();
            $(this).next().val(Number($f_ordered_num) - 1);
            $(this).closest('td').next().text(function(index,text){
                return Number(text) - Number(text)/$f_ordered_num;
            });
        }else{
            $(this).closest('tr').css('display','none');
        }
		sessionStorage.setItem('ORDERED_NUM',Number(sessionStorage.getItem('ORDERED_NUM'))-1);
		$('.footer .badge').text(sessionStorage.getItem('ORDERED_NUM'));
		/*ajax异步刷新，删减数据库已有食物数量*/
		$tableNum = localStorage.getItem('TABLE_NUM');
		$ordernumber = localStorage.getItem('ORDER_NUMBER');
		$foodId = $(this).data('this_f_id');
		$.ajax({ 
			type: "POST", 	
			url: "minus_food_num.php",
			dataType: "json",
			data: {
				'foodId': $foodId,
				'tableNum':$tableNum,
				'ordernumber':$ordernumber
			},
			success: function(data) {
				$('.ordered_price b').text(function(index,text){
					return Number(text) - Number(data.onefood_price);
				});					
			},
			error: function(jqXHR){     
				alert("发生错误：" + jqXHR.status);  
			}    
		});
    });
    /*获取桌号*/
    $('.t_num').text(localStorage.getItem('TABLE_NUM'));
});