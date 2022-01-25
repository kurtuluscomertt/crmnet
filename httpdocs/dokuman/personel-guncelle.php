<?php  
require("./class/baglan.php");
session_start();
$veri= $db->query("SELECT * FROM kullanıcı")->fetch(PDO::FETCH_ASSOC);
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personel Güncelle</title>

  <link rel="stylesheet" href="assets/css/bootstrap.css">

  <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" href="assets/css/app.css">
  <link rel="shortcut icon" href="/img/LOGO.png" type="image/x-icon">
</head>

<body>
  <div id="app">
  <?php require('header.php') ?>

      <div class="main-content container-fluid">
        <div class="page-title">
          <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Personel Güncelle</h3>
              <p class="text-subtitle text-muted">Zor durumda kalmadıkça bilgi güncellemesi yapmayın. Sipariş İptali yapıp yeni sipariş açmak daha sağlılı olacaktır.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Table</li>
                </ol>
              </nav>
            </div>
          </div>

        </div>
        <!-- Basic Tables start -->
        <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Personel Güncelle</h4>
                    </div><?php
			 foreach($personellist as $person){?><?php } ?>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="./islemler/personel-guncelle-2.php?pid=<?= $person->id ?>" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Personel İsim</label>
                                            <input type="text" id="first-name-column" class="form-control" placeholder="" value="<?= $person->isim?>"
                                                name="isim">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Yaş</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="" value="<?= $person->yas?>"
                                                name="yas">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">TC No</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="" name="tc" value="<?= $person->tc?>"> 
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Kan Grubu</label>
                                            <input type="text" id="country-floating" class="form-control" name="kan_grubu"
                                                placeholder="" value="<?= $person->kan_grubu?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Telefon</label>
                                            <input type="text" id="company-column" class="form-control" name="telefon"
                                                placeholder="" value="<?= $person->telefon?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Aile Telefon</label>
                                            <input type="text" id="company-column" class="form-control" name="aile_telefon"
                                                placeholder="" value="<?= $person->aile_telefon?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Adres</label>
                                            <input type="text" id="email-id-column" class="form-control" name="adres"
                                                placeholder="" value="<?= $person->adres?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Departman</label>
                                            <input type="text" id="company-column" class="form-control" name="departman"
                                                placeholder="" value="<?= $person->departman?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">İşe Giriş Tarihi</label>
                                            <input type="text" id="company-column" class="form-control" name="ise_giris_tarihi"
                                                placeholder="" value="<?= $person->ise_giris_tarihi?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                    <label for="company-column">Durum</label>
                                    <fieldset class="form-group"> <select class="form-select" id="basicSelect" name="durum"> <option value="Çalışıyor">Çalışıyor</option> <option value="Çalışmıyor">Çalışmıyor</option> </select> </fieldset>
                                    </div>
                                  
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Güncelle</button>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

                <!-- Table with no outer spacing -->
                <div class="table-responsive">
               

   <?php require("footer.php") ?>
    </div>
  </div>
  <script src="assets/js/feather-icons/feather.min.js"></script>
  <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="assets/js/app.js"></script>

  <script src="assets/js/main.js"></script>
</body>

</html>