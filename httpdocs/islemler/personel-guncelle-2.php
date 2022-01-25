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
   
	$sorgu=$db->prepare('SELECT * FROM personel WHERE id=?');
	$sonuc=$sorgu->execute([$_GET['pid']]);
}$personellist=$sorgu-> fetchAll(PDO::FETCH_OBJ);






$isim=$_POST['isim'];
$yas=$_POST['yas'];
$tc=$_POST['tc'];
$kan_grubu=$_POST['kan_grubu'];
$telefon=$_POST['telefon'];
$aile_telefon=$_POST['aile_telefon'];
$adres=$_POST['adres'];
$departman=$_POST['departman'];
$ise_giris_tarihi=$_POST['ise_giris_tarihi'];
$durum=$_POST['durum'];

$sql = "UPDATE personel SET isim='$isim' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();


    $sql = "UPDATE personel SET yas='$yas' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();


    $sql = "UPDATE personel SET tc ='$tc' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();


    $sql = "UPDATE personel SET kan_grubu ='$kan_grubu' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();


    $sql = "UPDATE personel SET telefon='$telefon' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    
    $sql = "UPDATE personel SET aile_telefon='$aile_telefon' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE personel SET adres='$adres' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE personel SET departman='$departman' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE personel SET ise_giris_tarihi='$ise_giris_tarihi' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE personel SET durum='$durum' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();


    $kullanıcı = $_SESSION['kullanici_adi'];
    date_default_timezone_set('Europe/Istanbul');
    $tarih= date('d.m.Y') ;
    $saat= date('H:i');
    $sql = "INSERT INTO islem (islem,tarih,saat)
    VALUES ('$kullanıcı, bir personel güncelledi','$tarih','$saat')";
    $db->exec($sql);

	header("location:../class/basarili.php");

?>
