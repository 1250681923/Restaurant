<?php
	require_once('connect.php');
	session_start();
	$number = $_SESSION['ORDERNUMBER'];
	//匹配订单号搜索所有数据
	$all_ordered = "SELECT * FROM ORDERED_LIST WHERE ORDERNUM=$number";
	$pre = oci_parse($conn, $all_ordered);
	oci_execute($pre,OCI_DEFAULT);
        //while($row = $pre->fetch(PDO::FETCH_ASSOC)){
	while($row = oci_fetch_row($pre)){
		$data[]=$row;
	}    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>已点</title>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/ordered.css"/>
</head>
<body>
<div class="wrap">
    <span class="t_num badge"></span>
    <img src="image/home_logo.jpg" width="500px" height="80px" />
    <div class="content">
        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li><a href="">Mon panier</a></li>
            </ul>
        </nav>
        <div class="ordered">
            <div class="cent">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>Plat</td>
                            <td>Quantite</td>
                            <td>Montant</td>
                        </tr>
                    </thead>
					<?php 
						$total_price = 0;
						if(!empty($data)){
							foreach($data as $value){
								$ordered_food_id=$value[1];
								//由食物ID号在foods找到food_name
								$id_name = "SELECT FOODNAME FROM FOODS WHERE FOODID=$ordered_food_id";
								$preb = oci_parse($conn, $id_name);
								oci_execute($preb);
								$f_idname = oci_fetch_array($preb, OCI_ASSOC);
					?>
                    <tr>
                        <td><?php echo $f_idname['FOODNAME']?></td>
                        <td>
                            <a data-this_f_id="<?php echo $ordered_food_id?>"><span class="glyphicon glyphicon-minus-sign"></span></a>
                            <input class="food_num" type="text" value="<?php echo $value[3]?>" size="1">
							<a data-this_f_id="<?php echo $ordered_food_id?>"><span class="glyphicon glyphicon-plus-sign"></span></a>
                        </td>
                        <td><?php echo $value[4]?></td>
                    </tr>
					<?php	
								$total_price += $value[4];
							}
						}
					?>
                </table>
                <div class="ordered_price">
                    <span>Prix total：$<b><?php echo $total_price?></b></span>
                    <strong>Confirmation</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <nav class="navbar navbar-inverse navbar-fixed-bottom">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Recommencer</a></li>
                <li><a href="home.php">Menu</a></li>
                <li><a href="ordered.php">Panier</a><span class="badge">0</span></li>
            </ul>
        </nav>
    </div>
</div>
<script src="js/jquery1.9.1/jquery.js"></script>
<script src="js/main.js"></script>
<script>
	if(sessionStorage.getItem('ORDERED_NUM')){
		$('.footer .badge').text(sessionStorage.getItem('ORDERED_NUM'));
	}
	$('.ordered_price strong').click(function(){
		$tableNum = localStorage.getItem('TABLE_NUM');
		$ordernumber = localStorage.getItem('ORDER_NUMBER');
		$bill_total_price = $('.ordered_price b').text();
		sessionStorage.removeItem('TABLE_NUM');
		$.ajax({ 
			type: "POST", 	
			url: "create_bill.php",
			dataType: "json",
			data: {
				'bill_total_price': $bill_total_price,
				'tableNum':$tableNum,
				'ordernumber':$ordernumber
			},
			success: function(data) {
				window.location.href="index.php";					
			},
			error: function(jqXHR){     
				alert("发生错误：" + jqXHR.status);  
			}    
		});
		
	});
</script>
</body>
</html>