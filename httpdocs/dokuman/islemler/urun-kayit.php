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

$stok_adi=$_POST['stok_adi'];
$stok_adedi=$_POST['stok_adedi'];
$alis_fiyat=$_POST['alis_fiyat'];
$satis_fiyat=$_POST['satis_fiyat'];
$stok_birim=$_POST['stok_birim'];


$sql = "INSERT INTO stok (stok_adi,stok_adet,stok_alis_fiyat,stok_satis_fiyat,stok_birim)
VALUES ('$stok_adi', $stok_adedi, $alis_fiyat,$satis_fiyat,'$stok_birim')";
$db->exec($sql);


$kullanıcı = $_SESSION['kullanici_adi'];
date_default_timezone_set('Europe/Istanbul');
$tarih= date('d.m.Y') ;
$saat= date('H:i');
$sql = "INSERT INTO islem (islem,tarih,saat)
VALUES ('$kullanıcı, $stok_adi adında yeni bir ürün ekledi','$tarih','$saat')";
$db->exec($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="1;URL=../urun-ekle.php">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>swal("Başarılı!", "Ürün Stoğa Eklendi!", "success");</script>
</body>
</html>