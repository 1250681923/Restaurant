<?php
	/*为桌号创建随机订单号*/
	require_once('connect.php');
	session_start();
	//session_destroy();
	$orderNumber = rand(1000,9999);
	$tableNum = intval($_POST['tableNum']);
	$insert="INSERT INTO ORDER_TABLES (TABLENUM, ORDERNUM) VALUES($tableNum,$orderNumber)";
	//$ins = $pdo->prepare($insert);
	//$ins->execute();
  	$ins = oci_parse($conn, $insert);
	oci_execute($ins);
	//session_start();
	$_SESSION['ORDERNUMBER']=$orderNumber;
	$code_arr = json_encode(array('orderNumber'=>$orderNumber));
	echo $code_arr;
?>