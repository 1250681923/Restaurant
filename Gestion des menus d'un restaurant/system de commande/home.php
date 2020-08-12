<?php
	require_once('connect.php');
	/*搜索所有食物*/
	$pre = oci_parse($conn, "SELECT * FROM FOODS");
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
    <title>page</title>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/home.css" />
</head>
<body>
    <div class="wrap">
        <span class="t_num badge"></span>
        <img src="image/home_logo.jpg" width="500px" height="80px" />
        <div class="content">
            <nav class="navbar navbar-inverse">
                <ul class="nav navbar-nav">
					<?php 
						/*搜索食物类型*/
						$food_type = "SELECT DISTINCT FOODTYPE FROM FOODS";
						$f_type = oci_parse($conn, $food_type);
						oci_execute($f_type);
						oci_fetch_all($f_type, $ressult);					
						foreach($ressult as $food_types){
							for($i=0;$i<count($food_types);$i++){
					?> 
                    <li><a href="#"><?php echo $food_types[$i]?></a>
                        <div class="food">
							<?php 
								if(!empty($data)){
									foreach($data as $value){
										if($food_types[$i]==$value[2]){
							?>
                            <figure class="food_area">
                                <img class="img-thumbnail" src="<?php echo "../system de gestion/upload_img/".$value[4]?>"/>
                                <figcaption>
                                    <h4><?php echo $value[1]?></h4>
                                    <span>Prix：<?php echo '$'.$value[3]?></span>
                                    <a><span class="glyphicon glyphicon-plus-sign f_plus" data-this_f_id="<?php echo $value[0]?>"></span></a>
                                </figcaption>
                            </figure>
							<?php
										}}
									}
								}
							?>
                        </div>
                    </li>
					<?php
						}
					?>
                </ul>
				<span class="glyphicon glyphicon-chevron-down click_down"></span>
            </nav>
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

</script>
</body>
</html>
