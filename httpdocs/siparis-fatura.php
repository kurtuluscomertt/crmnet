<?php 


require("./class/baglan.php");
$sorgu=$db->prepare('SELECT *FROM siparis');
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
   
	$sorgu=$db->prepare('SELECT * FROM siparis WHERE siparis_id=?');
	$sonuc=$sorgu->execute([$_GET['pid']]);
}$personellist=$sorgu-> fetchAll(PDO::FETCH_OBJ);


$sorgu1=$db->prepare('SELECT * FROM firma');
$sorgu1->execute();
$personellist1=$sorgu1-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>







<div class="app-main__inner">

<a onclick="window.print();" id="printbutton">Yazdır</a>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Satış Fişi</title>
  <link rel="stylesheet" href="bootstrap.min.css">
  <style>
  @import url(http://fonts.googleapis.com/css?family=Bree+Serif);
  body, h1, h2, h3, h4, h5, h6{
    font-family: 'Bree Serif', serif;
  }
  </style>
</head>
<body>

  <div class="container">

    <div class="row">
      <div class="col-xs-6">
        <h1>
          <a href="">

            <img style="width:100px" src="/img/LOGO.png"> 
           
          </a>
        </h1>
      </div>
      <div class="col-xs-6 text-right">
        <h1>Satış Fişi</h1>

        <?php
			 foreach($personellist as $person){?> <?php } ?> <?php
			 foreach($personellist1 as $person1){?> <?php } ?> 
        <h1><small>Fiş No: #<?= $person->siparis_id ?></small></h1>
      </div>
    </div>

      <div class="row">
        <div class="col-xs-5">
          <div class="panel panel-default">
                  <div class="panel-heading">
  
                    <h4> Firma Adı : <?= $person1->firma_adi ?></h4>
                  </div>
                  <div class="panel-body">
                  
                    <p>
                     Firma Adresi : <?= $person1->adres ?> <br />
                     Telefon: <?= $person1->cep_tel ?><br />
                     Sabit Telefon: <?= $person1->sabit_tel ?><br>
                     Mail       : <?= $person1->mail ?>
                    </p>
                  </div>
                </div>
        </div>
        <div class="col-xs-5 col-xs-offset-2 text-right">
          <div class="panel panel-default">
                  <div class="panel-heading">
                  <h4>MÜŞTERİ BİLGİLERİ</h4>
                    <h4><a href="#"></a></h4>
                  </div>
                  <div class="panel-body">
                    <p>
                   <b>Unvan: <?= $person->musteri_adi ?></b>  <br>
                    <b>Adres: <?= $person->adres ?></b> <br />
                   <b>Telefon:<?= $person->telefon ?></b>  <br />
                     <b>Email:<?= $person->mail?></b> <br />
                     
                    </p>
                  </div>
                </div>
        </div>
      </div> <!-- / end client details section -->

             <table class="table table-bordered">
        <thead>
          <tr>
            <th><h4>Hizmet Adı </h4> </th>
            <th><h4>Adet</h4></th>
            <th><h4>Fiyat</h4></th>
            <th><h4>Kdv Oran</h4></th>
            <th><h4>Fiyat Tutar</h4></th>
          </tr>
        </thead>
        <tbody>
        
        <tr>
            <td><?= $person->stok_isim ?></td>
            <td class="text-right"><?= $person->sip_adet ?></td>
             <td class="text-right"><?= $person->sip_satis_fiyat ?></td>
             <td class="text-right">%<?= $person->sip_kdv ?> </td>
              <td class="text-right"><?= $person->sip_toplam ?> ₺</td>
          </tr>  


        </tbody>
      </table>

    <div class="row text-right ">
      <div class="col-xs-2 col-xs-offset-8">
        <p style="font-size: 16px;">
          <strong>
            Toplam Kdv :<?= $person->kdv_ara_toplam ?> ₺ <br>
            Genel Toplam : <?= $person->sip_genel_toplam ?> ₺ <br>
          </strong>
        </p>
      </div>
      <div class="col-xs-2">
        <strong style="font-size: 16px;">
         <br>
        </strong>
      </div>
    </div>


    <div class="row">
      <div class="col-xs-5">
        <div class="panel panel-info">
        <div class="panel-heading">
          <h4>Ödeme Bilgisi</h4>
        </div>
        <div class="panel-body">
          <p>Banka Adı: <?= $person1->banka ?> </p>
          <p>Şube: <?= $person1->sube ?> </p>
          <p>IBAN : <?= $person1->iban ?></p>
          <p>Hesap Adı: <?= $person1->hesap_adi ?></p> 
        </div>
      </div>
      </div>
      <div class="col-xs-7">
       <div class="span7">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h4>Önemli<h4>
          </div>
          <div class="panel-body">
            <p>
              Bu fiş crmnet.co alt yapısı ile yazdırılmış olup asla resmi fatura yerine geçmemektedir.
             
            </p>
           <!--  <h4>Payment should be mabe by Bank Transfer</h4> -->
          </div>
        </div>
      </div>
      </div>
    </div>

  </div>

</body>
</html>

