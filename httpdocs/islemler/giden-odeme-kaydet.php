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
$odeme_turu=$_POST['odeme_turu'];
$tarihh=$_POST['tarihh'];
$miktar=$_POST['miktar'];



$sql = "INSERT INTO kasa_giden (isim,odeme_turu,miktar,tarih)
VALUES ('$isim','$odeme_turu',$miktar,'$tarihh')";
$db->exec($sql);

$kullanıcı = $_SESSION['kullanici_adi'];
date_default_timezone_set('Europe/Istanbul');
$tarih= date('d.m.Y') ;
$saat= date('H:i');
$sql = "INSERT INTO islem (islem,tarih,saat)
VALUES ('$kullanıcı, kasaya gelen ödeme ekledi','$tarih','$saat')";
$db->exec($sql);
header("location:../class/basarili.php");

?>
