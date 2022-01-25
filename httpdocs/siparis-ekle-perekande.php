<?php
require("./class/baglan.php");

 
$sorgu1=$db->prepare('SELECT *FROM stok');
$sorgu1->execute();
$personellist1=$sorgu1-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.

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
    <title>Sipariş Ekle</title>
    
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="/img/LOGO.png" type="image/x-icon">
</head>
<body>
    <div id="app">
      <?php require('header.php'); ?>


    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cari Bilgileri</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="./islemler/siparis-kaydet-cari.php" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                    <div class="form-group">
                                            <label for="email-id-column">Tarih</label>
                                            <input type="text" id="email-id-column" class="form-control" name="tarih"
                                                placeholder="" value="<?php echo date('d.m.Y') ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Müşteri Unvanı</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="" 
                                                name="musteri_ismi" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Telefon </label>
                                            <input type="text" id="city-column" class="form-control" placeholder=""  name="telefon" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Mail</label>
                                            <input type="text" id="country-floating" class="form-control" name="mail"  
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Vergi Dairesi</label>
                                            <input type="text" id="company-column" class="form-control" name="vergi_dairesi" 
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Vergi No</label>
                                            <input type="text" id="email-id-column" class="form-control" name="vergi_no" 
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Adres</label>
                                            <input type="text" id="email-id-column" class="form-control" name="adres"  
                                                placeholder="">
                                        </div>
                                    </div>
                                   
                                  
                                    
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sipariş Bilgileri</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form"  action="./islemler/siparis-kaydet-cari.php" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Stok Adı</label>
                                            <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect" name="stok_adi">
                                                    <?php
			 foreach($personellist1 as $person1){?> <option value="<?= $person1->stok_adi ?>" ><?= $person1->stok_adi ?></option>
                                                        <?php } ?>
                                                    </select> 
                                                </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Satış Fiyatı</label>
                                            <input type="number" id="last-name-column" class="form-control" placeholder="Satış Fiyatı"
                                                name="satis_fiyatı">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Kdv Oranı</label>
                                            <input type="number" id="city-column" class="form-control" placeholder="!!Yok ise 0 yazın!!" name="kdv">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Ürün Adedi</label>
                                            <input type="text" id="country-floating" class="form-control" name="urun_adedi"
                                                placeholder="Ürün Adedi">
                                        </div>
                                    </div>
                                    
                                    </div>
                                    <div class="col-md-6 col-12">
                                       
                                    </div>
                                    <div class="form-group col-12">
                                        <div class='form-check'>
                                            <div class="checkbox">
                                                <input type="checkbox" id="checkbox5" class='form-check-input' checked disabled>
                                                <label  for="checkbox5" value="<?php  echo $_SESSION['kullanici_adi'];?>">Satışı Yapan: <?php  echo $_SESSION['kullanici_adi'];?></label >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Sipariş Oluştur</button>
                                      
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>

           <?php require("footer.php")?>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script src="assets/js/main.js"></script>
</body>
</html>
