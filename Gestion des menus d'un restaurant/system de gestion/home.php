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
    <title>首页</title>
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
					<span class="glyphicon glyphicon-remove-circle type_del"></span>
                        <div class="food">
							<?php 
								if(!empty($data)){
									foreach($data as $value){
										if($food_types[$i]==$value[2]){
							?>
                            <form action="admin_modify_food.php" method="post" enctype="multipart/form-data">
								<figure class="food_area">
									<div><img class="img-thumbnail" src="<?php echo "upload_img/".$value[4]?>" /></div>
									<input id="file_modify<?php echo $value[0]?>" class="file_modify" style="display:none" type="file" name="file_modify" accept="image/png, image/jpeg, image/gif, image/jpg"/>
									<label for="file_modify<?php echo $value[0]?>" class="change_pic">click to change pic</label>
									<figcaption>
										<input name="fid" value="<?php echo $value[0]?>" style="display:none">
										<input name="modify_name" class="modify_name" value="" style="display:none">
										<h4 contenteditable="true" name=""><?php echo $value[1]?></h4>
										<input name="modify_price" class="modify_price" value="" style="display:none">
										<span>Prix：$&nbsp;<b name="" contenteditable="true"><?php echo $value[3]?></b></span>
										<input type="submit" class="btn btn-default btn-xs f_modify" value="confir">
									</figcaption>
								</figure>
							</form>
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
					<!--<li class="add_type">
						<span class="glyphicon glyphicon-plus"></span>
						<section class="add_type_content">
							<input size="4">
							<input type="button" class="btn btn-default btn-xs" value="Ajouter">
						</section>
					</li>-->
                </ul>
				<span class="glyphicon glyphicon-chevron-down click_down"></span>
            </nav>
			<!--管理员点击添加的食物区 -->
			<span class="glyphicon glyphicon-plus add_food"></span>
			<section class="add_foodarea">
				<form action="admin_add_food.php" method="post" enctype="multipart/form-data">
					<input id="file" type="file" name="file" accept="image/png, image/jpeg, image/gif, image/jpg"/>
					<label for="file" class="pick_pic">Choisir image</label>
					<div id="preview"></div>
					<div>
						<label for="">Type：<input type="text" placeholder="FOODTYPE" size='6' name="typename" required></label>
						<label for="">Nom：<input type="text" placeholder="FOODNAME" size='6' name="foodname" required></label>
						<label for="">Prix：<input type="text" placeholder="FOODPRICE" size='6' name="foodprice" required></label>
						<input type="submit" class="btn btn-default btn-xs addonefood" value="Ajouter">
					</div>
				</form>
			</section>
        </div>
        <div class="footer">
            <nav class="navbar navbar-inverse navbar-fixed-bottom">
                <ul class="nav navbar-nav">
					<li><a href="index.php">Deconnexion</a></li>
					<li><a href="ordernumber.php">Order</a></li>
                    <li><a href="home.html">Gestion</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <script src="js/jquery1.9.1/jquery.js"></script>
    <script src="js/main.js"></script>
</body>
</html>