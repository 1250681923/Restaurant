<?php
	require_once('connect.php');
	$file = $_FILES['file_modify'];//获得图片文件
	$fid = $_POST['fid'];
	$modify_picname = $file['name'];
	$modifyname = $_POST['modify_name'];
	$modifyprice = $_POST['modify_price'];	
	//改了图片
	if(!empty($file['tmp_name'])){
		if(!is_uploaded_file($file['tmp_name'])){
		   //如果不是HTTP POST上传的
		   return ;
		}
	$upload_path = "C:/wamp/www/Gestion des menus d'un restaurant/system de gestion/upload_img/"; 
		//移动文件到指定的文件夹
		//加入数据库
		move_uploaded_file($file['tmp_name'],$upload_path.$file['name']);	
		$modify="UPDATE FOODS SET FOODNAME='".$modifyname."',FOODPRICE='".$modifyprice."',FOODIMAGE='".$modify_picname."' WHERE FOODID='".$fid."'";
	}else{
		//没改图片
		$modify="UPDATE FOODS SET FOODNAME='".$modifyname."',FOODPRICE='".$modifyprice."' WHERE FOODID='".$fid."'";
	}
		$stid = oci_parse($conn, $modify);
		$r = oci_execute($stid);
	if($r){
		echo "<script>alert('La modification reussi');window.location.href='home.php'</script>";	
	}
?>