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
$isim=$_POST['isim'];
$yas=$_POST['yas'];
$tc=$_POST['tc'];
$kan_grubu=$_POST['kan_grubu'];
$telefon=$_POST['telefon'];
$aile_telefon=$_POST['aile_telefon'];
$adres=$_POST['adres'];
$departman=$_POST['departman'];
$ise_giris_tarihi=$_POST['ise_giris_tarihi'];






$sql = "INSERT INTO personel (isim,yas,tc,kan_grubu,telefon,aile_telefon,adres,departman,ise_giris_tarihi,durum)
VALUES ('$isim','$yas','$tc','$kan_grubu','$telefon','$aile_telefon','$adres','$departman','$ise_giris_tarihi','Çalışıyor')";
$db->exec($sql);

$kullanıcı = $_SESSION['kullanici_adi'];
date_default_timezone_set('Europe/Istanbul');
$tarih= date('d.m.Y') ;
$saat= date('H:i');
$sql = "INSERT INTO islem (islem,tarih,saat)
VALUES ('$kullanıcı, yeni bir personel ekledi','$tarih','$saat')";
$db->exec($sql);
header("location:../class/basarili.php");

?>
