<?php
 require("../class/baglan.php");
session_start();
$veri= $db->query("SELECT * FROM kullanıcı ")->fetch(PDO::FETCH_ASSOC);
if (isset($_SESSION['kullanici_adi']))
{
   //Oturum değişkeninin içeriği boş, direkt anasayfaya yönlendirme kodları
  // bu kısma gelecek.
}
else {
    header("location:/auth-login-hata.php") ;
}

/********************************************************************************/

if(isset($_GET["pid"]))
{
   
	$sorgu=$db->prepare('DELETE FROM arac WHERE id=?');
	$sonuc=$sorgu->execute([$_GET['pid']]);
	if($sonuc){
		header("Location:/class/basarili.php"); //Silme tamamlandıktan sonra personelliste sayfasına yönlendiriyoruz.
	}
	else
		echo("Kayıt silinemedi.");
}

$kullanıcı = $_SESSION['kullanici_adi'];
date_default_timezone_set('Europe/Istanbul');
$tarih= date('d.m.Y') ;
$saat= date('H:i');
$sql = "INSERT INTO islem (islem,tarih,saat)
VALUES ('$kullanıcı, bir araç sildi','$tarih','$saat')";
$db->exec($sql);
    ?>
