<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Acceuil</title>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/index.css" />
</head>
<body>
    <div class="wrap">
        <img class="img-circle" src="image/index_logo.jpeg" />
        <main>
                <a class="btn btn-lg btn-default order">Je commande</a>
                <div class="tablenum_select">
                    <div class="table_content">
                        <label for="t_num">Numero de table:</label>
                        <input id="t_num" size="8" value=""/>
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </div>
                    <div class="table_num">
                        <span>7</span>
                        <span>8</span>
                        <span>9</span>
                        <span>4</span>
                        <span>5</span>
                        <span>6</span>
                        <span>1</span>
                        <span>2</span>
                        <span>3</span>
                        <span>0</span>
                        <span class="sure">Confir</span>
                    </div>
                </div>
        </main>
    </div>
    <script src="js/jquery1.9.1/jquery.js"></script>
    <script>
		//存在桌号则显示在框
		if(sessionStorage.getItem('TABLE_NUM')){
			$('#t_num').val(sessionStorage.getItem('TABLE_NUM'));
		}
        /*index桌号*/
			//点击弹出数字框
        $('.order').click(function () {
            if($('.tablenum_select').css('display') == "none"){
                $('.tablenum_select').show();
            }else{
                $('.tablenum_select').hide();
            }
        });
			//点击选择数字
        $('.table_num span:not(span:last)').click(function () {
            if($('#t_num').val() == null){
                $('#t_num').val($(this).text());
            }else{
                $('#t_num').val($('#t_num').val()+$(this).text());
            }
        });
			//点击删除一位数字
        $('#t_num').next().click(function () {
            $t_num_val = $('#t_num').val();
            $('#t_num').val($t_num_val.substring(0,$t_num_val.length-1));
        });
			//确认进入点餐
        $('.tablenum_select .sure').click(function () {
			if($('#t_num').val()==''){
				alert('请输入桌号');
			}else{
				//sessionStorage：这里用于页面之间的存取
				//清除上次会话存储
				sessionStorage.removeItem('ORDERED_NUM');
				//新的会话存储
				sessionStorage.setItem('TABLE_NUM',$('#t_num').val());
				/*新桌建订单*/
				$tableNum = sessionStorage.getItem('TABLE_NUM');
				$.ajax({ 
					type: "POST", 	
					url: "create_orderNum.php",
					dataType: "json",
					data: {
						'tableNum':$tableNum
					},
					success: function(data) {
						localStorage.setItem('ORDER_NUMBER',data.orderNumber);
						localStorage.setItem('TABLE_NUM',$tableNum);
					},
					error: function(jqXHR){     
						alert("发生错误：" + jqXHR.status);  
					}    
				});
				window.location.href="home.php";
			}			
            
        });
		
    </script>
</body>
</html>