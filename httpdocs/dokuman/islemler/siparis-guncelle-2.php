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
   
	$sorgu=$db->prepare('SELECT * FROM siparis WHERE siparis_id=?');
	$sonuc=$sorgu->execute([$_GET['pid']]);
}$personellist=$sorgu-> fetchAll(PDO::FETCH_OBJ);





$siparis_id = $_POST['siparis_id'];
$musteri_adi = $_POST['musteri_adi'];
$adres = $_POST['adres'];
$telefon = $_POST['telefon'];
$mail = $_POST['mail'];
$sip_zaman = $_POST['sip_zaman'];
$stok_isim = $_POST['stok_isim'];
$sip_satis_fiyat = $_POST['sip_satis_fiyat'];
$sip_kdv = $_POST['sip_kdv'];
$sip_adet = $_POST['sip_adet'];
$sip_toplam = $_POST['sip_toplam'];
$kdv_ara_toplam = $_POST['kdv_ara_toplam'];
$sip_genel_toplam = $_POST['sip_genel_toplam'];
$durum = $_POST['durum'];




$sql = "UPDATE siparis SET musteri_adi='$musteri_adi' WHERE  siparis_id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();


    $sql = "UPDATE siparis SET adres='$adres' WHERE  siparis_id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();


    $sql = "UPDATE siparis SET telefon ='$telefon' WHERE  siparis_id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();


    $sql = "UPDATE siparis SET mail='$mail' WHERE  siparis_id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();


    $sql = "UPDATE siparis SET sip_zaman='$sip_zaman' WHERE  siparis_id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE siparis SET sip_satis_fiyat='$sip_satis_fiyat' WHERE  siparis_id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE siparis SET sip_kdv ='$sip_kdv ' WHERE  siparis_id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE siparis SET sip_adet='$sip_adet' WHERE  siparis_id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE siparis SET sip_toplam='$sip_toplam' WHERE  siparis_id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE siparis SET kdv_ara_toplam='$kdv_ara_toplam' WHERE  siparis_id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE siparis SET sip_genel_toplam='$sip_genel_toplam' WHERE  siparis_id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE siparis SET durum='$durum' WHERE  siparis_id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();

      $sql = "UPDATE siparis SET durum='$durum' WHERE  siparis_id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $kullanıcı = $_SESSION['kullanici_adi'];
    date_default_timezone_set('Europe/Istanbul');
    $tarih= date('d.m.Y') ;
    $saat= date('H:i');
    $sql = "INSERT INTO islem (islem,tarih,saat)
    VALUES ('$kullanıcı, bir ürün güncelledi','$tarih','$saat')";
    $db->exec($sql);

	header("location:../class/basarili.php");

?>
