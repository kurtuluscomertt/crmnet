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
   
	$sorgu=$db->prepare('SELECT * FROM kasa_giden WHERE id=?');
	$sonuc=$sorgu->execute([$_GET['pid']]);
}$personellist=$sorgu-> fetchAll(PDO::FETCH_OBJ);





$isim = $_POST['isim'];

$miktar = $_POST['miktar'];
$tarih = $_POST['tarih'];
$odeme_turu = $_POST['odeme_turu'];




$sql = "UPDATE kasa_giden SET isim='$isim' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();



    $sql = "UPDATE kasa_giden SET miktar ='$miktar' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();


    $sql = "UPDATE kasa_giden SET tarih='$tarih' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE kasa_giden SET odeme_turu='$odeme_turu' WHERE  id={$_GET['pid']}";
    $stmt = $db->prepare($sql);
    $stmt->execute();
   


    $kullanıcı = $_SESSION['kullanici_adi'];
    date_default_timezone_set('Europe/Istanbul');
    $tarih= date('d.m.Y') ;
    $saat= date('H:i');
    $sql = "INSERT INTO islem (islem,tarih,saat)
    VALUES ('$kullanıcı, giden ödeme  güncelledi','$tarih','$saat')";
    $db->exec($sql);

	header("location:../class/basarili.php");

?>
