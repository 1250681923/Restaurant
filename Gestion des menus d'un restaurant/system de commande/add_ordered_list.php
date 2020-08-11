<?php
	require_once('connect.php');
	$foodId = intval($_POST['foodId']);
	$tableNum = intval($_POST['tableNum']);
	$ordernumber = intval($_POST['ordernumber']);
	$foodNum=1;
	/*取单价*/
	$sqls = "SELECT FOODPRICE FROM FOODS WHERE FOODID=$foodId";
	$prea = oci_parse($conn, $sqls);
	oci_execute($prea);
	//oci_fetch_all($prea, $ressult);
	//$price=intval($ressult);
	$row = oci_fetch_array($prea, OCI_ASSOC);
    	$price=$row['FOODPRICE'];



	/*存在则更新数量*/
	$o_f_id = "SELECT FOODNUM FROM ORDERED_LIST WHERE FOODID=$foodId AND ORDERNUM=$ordernumber";
	$pres = oci_parse($conn, $o_f_id);
	oci_execute($pres);	
	if (($rows = oci_fetch_array($pres, OCI_ASSOC)) != false) {
			$food_num=$rows['FOODNUM']+1;
			echo $food_num;
			/*更新数量*/
			$price=$food_num*$price;
			$update = "UPDATE ORDERED_LIST SET FOODNUM=$food_num,ORDERPRICE=$price WHERE FOODID=$foodId AND ORDERNUM=$ordernumber";
			$udp = oci_parse($conn, $update);
			oci_execute($udp);
			echo "1";		    		
	}
	else{
			/*插入一条新记录*/
			$insert="INSERT INTO ORDERED_LIST (FOODID, ORDERNUM, FOODNUM, ORDERPRICE, TABLENUM) VALUES ($foodId,$ordernumber,$foodNum,$price,$tableNum)";
			$ins = oci_parse($conn, $insert);
			oci_execute($ins);
			echo "2";
        }
	
	
?>