<?php
	require_once('connect.php');
	$ordernum = $_POST['ordernumber'];
	$dellect = "UPDATE BILLS SET SERVICESTATE='1' WHERE ORDERNUM='".$ordernum."'";
	$stid = oci_parse($conn, $dellect);
	$r = oci_execute($stid);
?>