<?php
	require_once('connect.php');
	$all_ordered = "SELECT * FROM BILLS WHERE SERVICESTATE = '0'";
	$pre = oci_parse($conn, $all_ordered);
	oci_execute($pre,OCI_DEFAULT);
	while($row = oci_fetch_row($pre)){
		$data[]=$row;
	}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion</title>
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
                <li><a href="">Order</a></li>
            </ul>
        </nav>
        <div class="ordered">
            <div class="cent">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>Order</td>
                            <td>Table</td>
                            <td>Prix total</td>
                        </tr>
                    </thead>
					
					<?php 						
						if(!empty($data)){
							foreach($data as $value){
								$orderNumer=$value[2];
								$order_t_num=$value[1];								 
					?>
                    <tr class="one_bill">
                        <td><?php echo $value[2]?></td>
                        <td><?php echo $value[1]?></td>
                        <td><?php echo $value[3]?></td>
						
                    </tr>
					<tr class="detials">
						<td colspan="3">
							<table class="table table-bordered text-center">              
								<tr>
									<td>Plat</td>
									<td>Quantite</td>
									<td>Montant</td>
								</tr>                
								<?php
									$all_ordered = "SELECT * FROM ORDERED_LIST INNER JOIN FOODS ON ORDERED_LIST.FOODID = FOODS.FOODID WHERE ORDERNUM=$orderNumer AND TABLENUM=$order_t_num";
									$pres = oci_parse($conn, $all_ordered);
									oci_execute($pres,OCI_DEFAULT);
									//while($val = $pres->fetch(PDO::FETCH_ASSOC)){
										//$details[]=$rows;
									//foreach($details as $val){
									while($val = oci_fetch_row($pres)){
								?>
								 <tr>
									<td><?php echo $val[7]?></td>
									<td><?php echo $val[3]?></td>
									<td><?php echo $val[4]?></td>
								</tr>
								<?php
									}
								?>
								<tr>
									<td colspan="3">
										<div class="ordered_price">
											<span>OrderNum：$<b><?php echo $value[2]?></b></span>
											<strong>Finir</strong>
										</div>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<?php
									
							}
						}
					?>
                </table>
				
            </div>
        </div>
    </div>
    <div class="footer">
		<nav class="navbar navbar-inverse navbar-fixed-bottom">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Deconnexion</a></li>
				<li><a href="ordernumber.php">Order</a></li>
				<li><a href="home.php">Gestion</a></li>
				
			</ul>
		</nav>
	</div>
</div>
<script src="js/jquery1.9.1/jquery.js"></script>
<script src="js/main.js"></script>
<script>
	$('.ordered_price strong').click(function(){
		$ordernum = $('.ordered_price b').text();
		$.ajax({ 
			type: "POST", 	
			url: "Finir_bill.php",
			dataType: "json",
			data: {
				'ordernumber':$ordernum
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