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
if(isset($_GET["pid"]))
{
   
	$sorgu=$db->prepare('SELECT * FROM arac WHERE id=?');
	$sonuc=$sorgu->execute([$_GET['pid']]);
}$personellist=$sorgu-> fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Arac Guncelle</title>

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
              <h3>Araç Güncelle</h3>
              <p class="text-subtitle text-muted">Bu panelden  araç bilgilerini güncelleyebilirsiniz.</p>
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
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                <h4 class="card-title">Lütfen bilgileri eksiksiz doldurunuz.</h4>
                </div>
                <div class="card-content">
                <div class="card-body"><?php
			 foreach($personellist as $person){?>
                    <form class="form form-horizontal" action="/islemler/arac-guncelle-2.php?pid=<?= $person->id ?>" method="post">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                            
                                <label>Plaka</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" value="<?= $person->plaka ?>" name="plaka" id="first-name-icon" >
                                        <div class="form-control-icon">
                                            <i data-feather="file-plus"></i>
                                        </div> <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Şoför</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" value="<?= $person->sofor ?>" name="sofor" id="first-name-icon">
                                        <div class="form-control-icon">
                                            <i data-feather="file-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Muayene Bitiş Tarihi</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="muayene_bt" value="<?= $person->muayene ?>">
                                        <div class="form-control-icon">
                                            <i data-feather="file-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Kasko Bitiş Tarihi</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="kasko_bt" value="<?= $person->kasko ?>">
                                        <div class="form-control-icon">
                                            <i data-feather="file-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Model</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="model" value="<?= $person->tip ?>">
                                        <div class="form-control-icon">
                                            <i data-feather="file-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                         
                            </div>
                       
                        <div class="col-12 d-flex justify-content-end ">
                            <button type="submit"  class="btn btn-primary me-1 mb-1">Güncelle</button>
                            
                        </div>
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