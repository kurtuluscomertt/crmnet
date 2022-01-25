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
$musteri_adi=$_POST['musteri_adi'];
$telefon=$_POST['telefon'];
$mail=$_POST['mail'];
$vergi_dairesi=$_POST['vergi_dairesi'];
$vergi_no=$_POST['vergi_no'];
$adres=$_POST['adres'];


$sql = "INSERT INTO musteri (unvan,telefon,mail,vergi_dairesi,vergi_no,adres)
VALUES ('$musteri_adi', '$telefon','$mail','$vergi_dairesi','$vergi_no','$adres')";
$db->exec($sql);
$kullanıcı = $_SESSION['kullanici_adi'];
date_default_timezone_set('Europe/Istanbul');
$tarih= date('d.m.Y') ;
$saat= date('H:i');
$sql = "INSERT INTO islem (islem,tarih,saat)
VALUES ('$kullanıcı, bir müşteri ekledi','$tarih','$saat')";
$db->exec($sql);
header("location:../class/basarili.php");

?>
