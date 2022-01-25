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
   
	$sorgu=$db->prepare('SELECT * FROM stok WHERE id=?');
	$sonuc=$sorgu->execute([$_GET['pid']]);
}$personellist=$sorgu-> fetchAll(PDO::FETCH_OBJ);






$plaka=$_POST['plaka'];
$model=$_POST['model'];
$kasko_bt=$_POST['kasko_bt'];
$muayene_bt=$_POST['muayene_bt'];
$sofor=$_POST['sofor'];

$sql = "UPDATE arac SET plaka='$plaka' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();


    $sql = "UPDATE arac SET sofor='$sofor' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();


    $sql = "UPDATE arac SET muayene ='$muayene_bt ' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();


    $sql = "UPDATE arac SET kasko ='$kasko_bt' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();


    $sql = "UPDATE arac SET tip ='$model' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();

	header("location:../class/basarili.php");

    $kullanıcı = $_SESSION['kullanici_adi'];
date_default_timezone_set('Europe/Istanbul');
$tarih= date('d.m.Y') ;
$saat= date('H:i');
$sql = "INSERT INTO islem (islem,tarih,saat)
VALUES ('$kullanıcı, bir araç güncelledi','$tarih','$saat')";
$db->exec($sql);

?>
