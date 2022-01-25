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
$sorgu=$db->prepare('SELECT *FROM firma where id = 1');
$sorgu->execute();
$personellist=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.






$firma_adi = $_POST['firma_adi'];
$cep_tel = $_POST['cep_tel'];
$sabit_tel = $_POST['sabit_tel'];
$adres = $_POST['adres'];
$mail = $_POST['mail'];
$banka = $_POST['banka'];
$sube = $_POST['sube'];
$iban = $_POST['iban'];
$hesap_adi = $_POST['hesap_adi'];


$sql = "UPDATE firma SET firma_adi='$firma_adi' WHERE  id=1";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE firma SET cep_tel='$cep_tel' WHERE  id=1";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE firma SET sabit_tel='$sabit_tel' WHERE  id=1";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE firma SET adres='$adres' WHERE  id=1";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    
    $sql = "UPDATE firma SET mail='$mail' WHERE  id=1";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE firma SET banka='$banka' WHERE  id=1";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    
    $sql = "UPDATE firma SET sube='$sube' WHERE  id=1";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE firma SET iban='$iban' WHERE  id=1";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE firma SET hesap_adi='$hesap_adi' WHERE  id=1";
    $stmt = $db->prepare($sql);
    $stmt->execute();


   
    






    $kullanıcı = $_SESSION['kullanici_adi'];
    date_default_timezone_set('Europe/Istanbul');
    $tarih= date('d.m.Y') ;
    $saat= date('H:i');
    $sql = "INSERT INTO islem (islem,tarih,saat)
    VALUES ('$kullanıcı, firma ayarlarını güncelledi','$tarih','$saat')";
    $db->exec($sql);

	header("location:../class/basarili.php");

?>
