<?php

require("../class/baglan.php");
session_start();
$veri= $db->query("SELECT * FROM kullanici ")->fetch(PDO::FETCH_ASSOC);
if (isset($_SESSION['kullanici_adi']))
{
   //Oturum değişkeninin içeriği boş, direkt anasayfaya yönlendirme kodları
  // bu kısma gelecek.
}
else {
    header("location:/auth-login-hata.php") ;
}
$baslik=$_POST['baslik'];
$ders=$_POST['ders'];
$aciklama=$_POST['aciklama'];
$dosya_yolu=$_POST['dosya_yolu'];





$sql = "INSERT INTO dokuman (ders,baslik,aciklama,dosya_yolu)
VALUES ('$ders','$baslik','$aciklama','$dosya_yolu')";
$db->exec($sql);

header("location:../class/basarili.php");

?>
