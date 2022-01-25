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


$musteri_id=$_POST['musteri_id'];
$musteri_ismi=$_POST['musteri_ismi'];
$telefon=$_POST['telefon'];
$mail=$_POST['mail'];
$vergi_dairesi=$_POST['vergi_dairesi'];
$vergi_no=$_POST['vergi_no'];
$adres=$_POST['adres'];
$tarih=$_POST['tarih'];
$stok_adi=$_POST['stok_adi'];
$satis_fiyatı=$_POST['satis_fiyatı'];
$kdv=$_POST['kdv'];
$urun_adedi=$_POST['urun_adedi'];

$sip_toplam=$urun_adedi*$satis_fiyatı;
$kdv_ara_toplam= ($sip_toplam*$kdv)/100;
$sip_genel_toplam=$sip_toplam+$kdv_ara_toplam;

$kullanıcı = $_SESSION['kullanici_adi'];
date_default_timezone_set('Europe/Istanbul');
$saat= date('H:i');

$sql = "INSERT INTO siparis (musteri_id,musteri_adi,adres,telefon,mail,sip_zaman,stok_isim,sip_satis_fiyat,sip_kdv,sip_adet,sip_toplam,kdv_ara_toplam,sip_genel_toplam,durum)
VALUES ('$musteri_id','$musteri_ismi','$adres','$telefon','$mail', '$tarih','$stok_adi',$satis_fiyatı,$kdv,$urun_adedi,$sip_toplam,$kdv_ara_toplam,$sip_genel_toplam,'Beklemede')";
$db->exec($sql);

$sql = "UPDATE stok SET stok_adet=stok_adet-$urun_adedi WHERE stok_adi='$stok_adi'";
$stmt = $db->prepare($sql);
$stmt->execute();


$sql = "INSERT INTO islem (islem,tarih,saat)
VALUES ('$kullanıcı, yeni bir sipariş oluşturdu','$tarih','$saat')";
$db->exec($sql);





header("Location:/class/basarili.php");

?>
