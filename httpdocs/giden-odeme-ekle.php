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
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alpha Yazilim Gider Ekle</title>

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
              <h3>Giden Ödeme Ekle</h3>
              <p class="text-subtitle text-muted">Bu panelden kasaya giren ödemeleri kayıt edebilirsiniz.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Gider Ekle</li>
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
                <div class="card-body">
                    <form class="form form-horizontal" action="./islemler/giden-odeme-kaydet.php" method="post">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Ödeme/Masraf Yapılan Yer</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Ünvan (Örnek: Alpha Yazılım Ltd.Şti. & Yemek Masrafı)" name="isim" id="first-name-icon">
                                        <div class="form-control-icon">
                                            <i data-feather="file-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-md-4">
                                <label>Ödeme Türü</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                    <fieldset class="form-group"> <select class="form-select" id="basicSelect" name="odeme_turu"> <option>Nakit</option> <option>Kart</option> <option>Cari</option> </select> </fieldset>
                                        <div class="form-control-icon">
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Tarih/Saat</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="tarihh" placeholder="" value="<?php date_default_timezone_set('Europe/Istanbul'); echo date('d.m.Y');?>">
                                        <div class="form-control-icon">
                                            <i data-feather="file-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Miktar</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="miktar" placeholder="Miktar">
                                        <div class="form-control-icon">
                                            <i data-feather="file-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            </div>
                       
                        <div class="col-12 d-flex justify-content-end ">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Ekle</button>
                            
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