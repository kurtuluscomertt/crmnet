<?php 


require("./class/baglan.php");
$sorgu=$db->prepare('SELECT *FROM personel');
$sorgu->execute();
$personellist=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 


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
if(isset($_GET["pid"]))
{
   
	$sorgu=$db->prepare('SELECT * FROM personel WHERE id=?');
	$sonuc=$sorgu->execute([$_GET['pid']]);
}$personellist=$sorgu-> fetchAll(PDO::FETCH_OBJ);


$sorgu1=$db->prepare('SELECT * FROM personel');
$sorgu1->execute();
$personellist1=$sorgu1-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 

$sorgu11=$db->prepare('SELECT * FROM firma');
$sorgu11->execute();
$personellist11=$sorgu11-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Personel Kartı</title>
  <link href="https://fonts.googleapis.com/css?family=Liu+Jian+Mao+Cao&display=swap" rel="stylesheet"><link rel="stylesheet" href="./style.css">

</head>
<style>
  * {
  box-sizing: border-box;
}

html, body {
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  position: relative;
  color: rgba(0, 0, 0, 0.8);
  background-color: #e8eef5;
  overflow: hidden;
  height: 100%;
}

h3, h4, h5 {
  margin: 0;
}

h3 {
  font-size: 24px;
}

h4 {
  font-size: 8px;
}

h5 {
  font-size: 7px;
}

.ID-card {
  width: 400px;
  height: 550px;
  margin: auto;
  position: relative;
  top: 80px;
  padding: 20px;
  border-radius: 10px;
  background-image: url("https://i.ibb.co/NL188dQ/white-wood.png");
  border: 1px solid rgba(0, 0, 0, 0.15);
  box-shadow: 2px 5px 8px rgba(0, 0, 0, 0.35);
  z-index: 10;
  filter: opacity(90%);
}

.top-row {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  padding: 5px 0;
}

.flag {
  height: 10px;
  margin-right: 5px;
}

.card-title, .card-title-en {
  line-height: 100%;
}

.name, .name-en, .ID-number {
  font-weight: normal;
}

.card-title-en {
  margin-left: auto;
}

.middle-row {
  margin-top: 30px;
  display: inline-block;
}

.bottom-row {
  position: absolute;
  bottom: 20px;
}

.ID-photo {
  display: block;
  width: 100px;
  height: 128px;
  
  background-repeat: no-repeat;
  background-position: -90px center;
  background-size: 250px;
  position: absolute;
  top: 60px;
  right: 20px;
}

.series-number {
  writing-mode: vertical-rl;
  transform: rotate(180deg);
  position: absolute;
  right: 20px;
  bottom: 100px;
  z-index: 10;
}

.signature-title {
  position: absolute;
  bottom: 20px;
  right: 20px;
}

.signature {
  font-family: "Liu Jian Mao Cao", cursive;
  font-weight: 100;
  position: absolute;
  right: 40px;
  bottom: 35px;
}

.ID-number {
  line-height: 100%;
  margin-top: 5px;
}

.title {
  text-align: center;
  margin: 16px;
  font-weight: normal;
  font-size: 16px;
  width: 100%;
  position: absolute;
  bottom: 20px;
  z-index: 10;
}

.shape-1 {
  z-index: 1;
  position: absolute;
  top: calc(66vh + -12px);
  left: calc(20vw + -12px);
  transform: rotate(46deg);
  width: 57px;
  height: 57px;
  background-color: rgba(188, 66, 59, 0.95);
  border-radius: 100%;
}

.shape-2 {
  z-index: 1;
  position: absolute;
  top: calc(87vh + -38px);
  left: calc(84vw + -38px);
  transform: rotate(313deg);
  border: 57px solid rgba(255, 255, 255, 0.95);
  border-color: rgba(200, 212, 230, 0.95) transparent transparent transparent;
}

.shape-3 {
  z-index: 1;
  position: absolute;
  top: calc(28vh + -31px);
  left: calc(69vw + -31px);
  transform: rotate(220deg);
  width: 35px;
  height: calc(35px / 2);
  border-bottom-left-radius: 35px;
  border-bottom-right-radius: 35px;
  background-color: rgba(30, 75, 133, 0.95);
}

.shape-4 {
  z-index: 1;
  position: absolute;
  top: calc(53vh + -21px);
  left: calc(69vw + -21px);
  transform: rotate(31deg);
  width: 44px;
  height: 44px;
  background-color: rgba(69, 139, 68, 0.95);
  border-radius: 100%;
}

.shape-5 {
  z-index: 1;
  position: absolute;
  top: calc(28vh + -50px);
  left: calc(66vw + -50px);
  transform: rotate(137deg);
  width: 36px;
  height: 36px;
  background-color: rgba(230, 180, 80, 0.95);
}

.shape-6 {
  z-index: 1;
  position: absolute;
  top: calc(33vh + 59px);
  left: calc(55vw + 59px);
  transform: rotate(356deg);
  width: 40px;
  height: 40px;
  background-color: rgba(200, 212, 230, 0.95);
}

.shape-7 {
  z-index: 1;
  position: absolute;
  top: calc(66vh + 15px);
  left: calc(85vw + 15px);
  transform: rotate(216deg);
  width: 35px;
  height: 35px;
  background-color: rgba(230, 180, 80, 0.95);
  border-radius: 100%;
}

.shape-8 {
  z-index: 1;
  position: absolute;
  top: calc(49vh + -31px);
  left: calc(66vw + -31px);
  transform: rotate(231deg);
  border: 41px solid rgba(188, 66, 59, 0.95);
  border-color: rgba(200, 212, 230, 0.95) transparent transparent transparent;
}

.shape-9 {
  z-index: 1;
  position: absolute;
  top: calc(34vh + 56px);
  left: calc(19vw + 56px);
  transform: rotate(17deg);
  width: 54px;
  height: calc(54px / 2);
  border-bottom-left-radius: 54px;
  border-bottom-right-radius: 54px;
  background-color: rgba(255, 255, 255, 0.95);
}

.shape-10 {
  z-index: 1;
  position: absolute;
  top: calc(94vh + -16px);
  left: calc(32vw + -16px);
  transform: rotate(345deg);
  width: 51px;
  height: 51px;
  background-color: rgba(188, 66, 59, 0.95);
}
</style>
<body>
<!-- partial:index.partial.html -->
<!-- 身分證設計作者: 魯少綸 -->
<div class="ID-card">
        <div class="top-row"> <?php
			 foreach($personellist as $person){?>
           
            <h4 class="card-title"><?= $person->isim ?> Kimlik Kartı</h4>
            <h4 class="card-title-en">Personel Kimlik Kartı</h4>
        </div>

            <div class="middle-row">
            <h4 class="name-title">İsim</h4>
            <h3 class="name"></h3>
            <h3 class="name-en"><?= $person->isim ?></h3>
            <h4 class="name-title">Yaş</h4>
            <h3 class="name-en"><?= $person->yas ?></h3>
            <h4 class="name-title">T.C</h4>
            <h3 class="name-en"><?= $person->tc ?></h3>
            <h4 class="name-title">Kan Grubu</h4>
            <h3 class="name-en"><?= $person->kan_grubu ?></h3>
            <h4 class="name-title">Aile Telefon</h4>
            <h3 class="name-en"><?= $person->aile_telefon ?></h3>
            <h4 class="name-title">Adres</h4>
            <h3 class="name-en"><?= $person->adres ?></h3>
            <h4 class="name-title">Departman</h4>
            <h3 class="name-en"><?= $person->departman ?></h3>
            <h4 class="name-title">İşe Giriş Tarihi</h4>
            <h3 class="name-en"><?= $person->ise_giris_tarihi ?></h3>
            <h4 class="name-title">Çalışma Durumu</h4>
            <h3 class="name-en"><?= $person->durum ?></h3>
            </div>

            <div class="bottom-row">
            <h4 class="ID-number-title">ID No.</h4>
            <h3 class="ID-number"><?= $person->id?></h3>
            </div>
            
            <?php
			 foreach($personellist11 as $person11){?>
            <div class="ID-photo"><img class="ID-photo" src='/<?= $person->img?>.png' alt=""> </div><?php } ?>
            <h5 class="series-number">V 1.1.1 0000000105</h5>
            <h5 class="signature-title"><?= $person11->firma_adi ?></h5>
            
    </div> 
    <p class="title"><?= $person11->firma_adi ?></p>
    <div class="shape-1"></div><?php } ?>
    <div class="shape-2"></div>
    <div class="shape-3"></div>
    <div class="shape-4"></div>
    <div class="shape-5"></div>
    <div class="shape-6"></div>
    <div class="shape-7"></div>
    <div class="shape-8"></div>
    <div class="shape-9"></div>
    <div class="shape-10"></div>
<!-- partial -->
  
</body>
</html>





