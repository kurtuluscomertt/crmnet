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
$plaka=$_POST['plaka'];
$model=$_POST['model'];
$kasko_bt=$_POST['kasko_bt'];
$muayene_bt=$_POST['muayene_bt'];
$sofor=$_POST['sofor'];







$sql = "INSERT INTO arac (plaka,sofor,muayene,kasko,tip)
VALUES ('$plaka','$sofor','$muayene_bt','$kasko_bt','$model')";
$db->exec($sql);

$kullanıcı = $_SESSION['kullanici_adi'];
date_default_timezone_set('Europe/Istanbul');
$tarih= date('d.m.Y') ;
$saat= date('H:i');
$sql = "INSERT INTO islem (islem,tarih,saat)
VALUES ('$kullanıcı, yeni bir araç ekledi','$tarih','$saat')";
$db->exec($sql);
header("location:../class/basarili.php");

?>
