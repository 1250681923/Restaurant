<?php
	require_once('connect.php');
	$foodId = intval($_POST['foodId']);
	$tableNum = intval($_POST['tableNum']);
	$ordernumber = intval($_POST['ordernumber']);
	
	/*取单价*/
	$sqls = "SELECT FOODPRICE FROM FOODS WHERE FOODID=$foodId";
	$prea = oci_parse($conn, $sqls);
	oci_execute($prea);
	//oci_fetch_all($prea, $ressult);
	//$price=intval($ressult);
	$row = oci_fetch_array($prea, OCI_ASSOC);
    	$price=$row['FOODPRICE'];
	
	/*搜索数量*/
	$o_f_id = "SELECT FOODNUM FROM ORDERED_LIST WHERE FOODID=$foodId AND ORDERNUM=$ordernumber";
	$pres = oci_parse($conn, $o_f_id);
	oci_execute($pres);
	$rows = oci_fetch_array($pres, OCI_ASSOC);
	$food_num=$rows['FOODNUM']+1;
	/*更新数量*/
	$update = "UPDATE ORDERED_LIST SET FOODNUM=$food_num,ORDERPRICE=$food_num*$price WHERE FOODID=$foodId AND ORDERNUM=$ordernumber";
	$udp = oci_parse($conn, $update);
	oci_execute($udp);
	$code_arr = json_encode(array('onefood_price'=>$price));
	echo $code_arr;
	
?>