<?php  
require("baglan.php");
session_start();
$kul_mail=$_POST['username'];
$kul_sifre=$_POST['pass'];
$cek = $db->query("select * from kullanıcı where kullanici_adi = '$kul_mail' && sifre = '$kul_sifre' ",PDO::FETCH_ASSOC);
if($cek->rowCount()){
    $_SESSION["kullanici_adi"] = $kul_mail; 
		header("location:../index.php");
		exit;
	} else {
		header("location:/auth-login-hata.php") ;
	}
	exit;

?>