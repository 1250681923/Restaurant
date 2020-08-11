<?php
	require_once('connect.php');
	$del_type = $_POST['del_type'];
	$dellect = "DELETE FROM FOODS WHERE FOODTYPE='".$del_type."'";
	$stid = oci_parse($conn, $dellect);
	$r = oci_execute($stid);
?>