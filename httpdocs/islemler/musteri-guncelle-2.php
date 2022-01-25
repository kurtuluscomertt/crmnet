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
   
	$sorgu=$db->prepare('SELECT * FROM musteri WHERE id=?');
	$sonuc=$sorgu->execute([$_GET['pid']]);
}$personellist=$sorgu-> fetchAll(PDO::FETCH_OBJ);






$musteri_adi = $_POST['musteri_adi'];
$telefon = $_POST['telefon'];
$mail = $_POST['mail'];
$vergi_dairesi = $_POST['vergi_dairesi'];
$vergi_no = $_POST['vergi_no'];
$adres = $_POST['adres'];

$sql = "UPDATE musteri SET unvan='$musteri_adi' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();


    $sql = "UPDATE musteri SET telefon='$telefon' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();


    $sql = "UPDATE musteri SET mail ='$mail' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();


    $sql = "UPDATE musteri SET vergi_dairesi='$vergi_dairesi' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();


    $sql = "UPDATE musteri SET vergi_no='$vergi_no' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    
    $sql = "UPDATE musteri SET adres='$adres' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $kullanıcı = $_SESSION['kullanici_adi'];
    date_default_timezone_set('Europe/Istanbul');
    $tarih= date('d.m.Y') ;
    $saat= date('H:i');
    $sql = "INSERT INTO islem (islem,tarih,saat)
    VALUES ('$kullanıcı, bir müşteri güncelledi','$tarih','$saat')";
    $db->exec($sql);

	header("location:../class/basarili.php");

?>
