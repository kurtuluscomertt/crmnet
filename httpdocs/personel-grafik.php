<?php  
require("./class/baglan.php");
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
$sorgu11=$db->prepare('SELECT *FROM personel');
$sorgu11->execute();
$personellist11=$sorgu11-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpha Yazılım</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="/img/LOGO.png" type="image/x-icon">
</head>
<style>

    td{
        font-weight:bold !important;
    }
</style>
<body>
    <div id="app">
        
        <?php require('header.php') ?>

        <section class="basic-choices">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Personel Satış Raporu</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                            <div class="col-md-6 mb-4">
                                    <h6>Başlangıç Tarihi</h6>
                                    <p> <code>Seçimleri aşağıdan yapabilirsiniz</code></p>
                                    <div class="form-group">
                                        <form action="personel-rapor.php" method="post">
                                   <input class="form-control" type="date" name="tarih1">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6>Bitiş Tarihi</h6>
                                    <p> <code>Seçimleri aşağıdan yapabilirsiniz</code></p>
                                    <div class="form-group">
                                        <form action="grafik.php" method="post">
                                        <input class="form-control" type="date" name="tarih2">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="alert alert-primary">
                                        <a href="https://choices.org/getting-started/installation" target="_blank">En fazla</a> 10 adet personel seçebilirsiniz
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6>Personel Seçimi</h6>
                                    <p> <code>Seçimleri aşağıdan yapabilirsiniz</code></p>
                                    <div class="form-group">
                                        <form action="personel-rapor.php" method="post">
                                        <select class="form-select" id="basicSelect" name="urun1">
                                        <option value=" "></option>
                                                    <?php
			 foreach($personellist11 as $person11){?> <option value="<?= $person11->isim ?>" ><?= $person11->isim ?></option>
                                                        <?php } ?>
                                                    </select> 
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6>Personel Seçimi</h6>
                                    <p> <code>Seçimleri aşağıdan yapabilirsiniz</code></p>
                                    <div class="form-group">
                                    <select class="form-select" id="basicSelect" name="urun2">
                                        <option value=" "></option>
                                                    <?php
			 foreach($personellist11 as $person11){?> <option value="<?= $person11->isim ?>" ><?= $person11->isim ?></option>
                                                        <?php } ?>
                                                    </select> 
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6>Personel Seçimi</h6>
                                    <p> <code>Seçimleri aşağıdan yapabilirsiniz</code></p>
                                    <div class="form-group">
                                    <select class="form-select" id="basicSelect" name="urun3"> <option value=" "></option>
                                                    <?php
			 foreach($personellist11 as $person11){?> <option value="<?= $person11->isim ?>" ><?= $person11->isim ?></option>
                                                        <?php } ?>
                                                    </select> 
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-4">
                                    <h6>Personel Seçimi</h6>
                                    <p> <code>Seçimleri aşağıdan yapabilirsiniz</code></p>
                                    <div class="form-group">
                                    <select class="form-select" id="basicSelect" name="urun4"> <option value=" "></option>
                                                    <?php
			 foreach($personellist11 as $person11){?> <option value="<?= $person11->isim ?>" ><?= $person11->isim ?></option>
                                                        <?php } ?>
                                                    </select> 
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6>Personel Seçimi</h6>
                                    <p> <code>Seçimleri aşağıdan yapabilirsiniz</code></p>
                                    <div class="form-group">
                                    <select class="form-select" id="basicSelect" name="urun5"> <option value=" "></option>
                                                    <?php
			 foreach($personellist11 as $person11){?> <option value="<?= $person11->isim ?>" ><?= $person11->isim ?></option>
                                                        <?php } ?>
                                                    </select> 
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6>Personel Seçimi</h6>
                                    <p> <code>Seçimleri aşağıdan yapabilirsiniz</code></p>
                                    <div class="form-group">
                                    <select class="form-select" id="basicSelect" name="urun6"> <option value=" "></option>
                                                    <?php
			 foreach($personellist11 as $person11){?> <option value="<?= $person11->isim ?>" ><?= $person11->isim ?></option>
                                                        <?php } ?>
                                                    </select> 
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6>Personel Seçimi</h6>
                                    <p> <code>Seçimleri aşağıdan yapabilirsiniz</code></p>
                                    <div class="form-group">
                                    <select class="form-select" id="basicSelect" name="urun7"> <option value=" "></option>
                                                    <?php
			 foreach($personellist11 as $person11){?> <option value="<?= $person11->isim ?>" ><?= $person11->isim ?></option>
                                                        <?php } ?>
                                                    </select> 
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6>Personel Seçimi</h6>
                                    <p> <code>Seçimleri aşağıdan yapabilirsiniz</code></p>
                                    <div class="form-group">
                                    <select class="form-select" id="basicSelect" name="urun8"> <option value=" "></option>
                                                    <?php
			 foreach($personellist11 as $person11){?> <option value="<?= $person11->isim ?>" ><?= $person11->isim ?></option>
                                                        <?php } ?>
                                                    </select> 
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6>Personel Seçimi</h6>
                                    <p> <code>Seçimleri aşağıdan yapabilirsiniz</code></p>
                                    <div class="form-group">
                                    <select class="form-select" id="basicSelect" name="urun9"> <option value=" "></option>
                                                    <?php
			 foreach($personellist11 as $person11){?> <option value="<?= $person11->isim ?>" ><?= $person11->isim ?></option>
                                                        <?php } ?>
                                                    </select> 
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6>Personel Seçimi</h6>
                                    <p> <code>Seçimleri aşağıdan yapabilirsiniz</code></p>
                                    <div class="form-group">
                                    <select class="form-select" id="basicSelect" name="urun10"> <option value=" "></option>
                                                    <?php
			 foreach($personellist11 as $person11){?> <option value="<?= $person11->isim ?>" ><?= $person11->isim ?></option>
                                                        <?php } ?>
                                                    </select> 
                                    </div>
                                </div>
                                <button class="btn btn-info">Raporla</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
          <?php require("footer.php")?>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>