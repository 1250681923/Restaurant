<?php
	require_once('connect.php');
	$file = $_FILES['file'];//获得图片文件
	$name = $file['name'];
	$typename = $_POST['typename'];
	$foodname = $_POST['foodname'];
	$foodprice = $_POST['foodprice'];
	if(!is_uploaded_file($file['tmp_name'])){
	   //如果不是HTTP POST上传的
	   return ;
	}
	$upload_path = "C:/wamp/www/Gestion des menus d'un restaurant/system de gestion/upload_img/";  
	//移动文件到指定的文件夹
	//加入数据库
	if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
		$insert="INSERT INTO FOODS(FOODNAME,FOODTYPE,FOODPRICE,FOODIMAGE) values('".$foodname."','".$typename."','".$foodprice."','".$file['name']."')";
		$stid = oci_parse($conn, $insert);
		$r = oci_execute($stid);
		if($r){
			echo "<script>alert('reussi');window.location.href='home.php'</script>";	
		}
			
	}else{
		echo "Failed!";
	}
?>