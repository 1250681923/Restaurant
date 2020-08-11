<?php
	require_once('connect.php');
	session_start();
	//session_destroy();
	$bill_total_price = intval($_POST['bill_total_price']);
	$tableNum = intval($_POST['tableNum']);
	$ordernumber = intval($_POST['ordernumber']);
	//$dateline=time();
	/*生成bill*/
        //$billtime = date("Y-m-d h:i:s");
	$billtime = date('Y-m-d h:i:s');
	//INSERT INTO BILLS (TABLENUM, ORDERNUM, BILLPRICE, BILLTIME, SERVICESTATE, PAYSTATE) VALUES ('111', '1111', '4', '2012-03-22 23:00:00', '1', '1');
	$insert="INSERT INTO BILLS (TABLENUM, ORDERNUM, BILLPRICE, BILLTIME, SERVICESTATE, PAYSTATE) VALUES ($tableNum, $ordernumber, $bill_total_price, '$billtime', '0', '0')";
	$ins = oci_parse($conn, $insert);
	oci_execute($ins);
?>