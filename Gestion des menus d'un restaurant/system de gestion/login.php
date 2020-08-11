<?PHP
    require_once('connect.php');
	//检测提交操作
    if(!isset($_POST["submit"])){
        exit("ERREUR");
    }
    $admin_name = $_POST['name'];
    $admin_psd = $_POST['password'];
	
    if($admin_name && $admin_psd){
		$sql = "SELECT AD_NOM,AD_PW FROM ADMIN WHERE AD_NOM=$admin_name and AD_PW=$admin_psd";
		$pres = oci_parse($conn, $sql);
		oci_execute($pres);	
		if(($rows = oci_fetch_array($pres, OCI_ASSOC)) != false){
			header("refresh:0;url=ordernumber.php");
			exit;
		}else{
			echo "ERREUR";
			echo "<script>setTimeout(function(){window.location.href='index.php';},1000);</script>";
		}
    }else{
        echo "Veuillez vous vous identifier!";
        echo "<script>setTimeout(function(){window.location.href='index.php';},1000);</script>";                 
    }

?>