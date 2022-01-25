<?php
require("./class/baglan.php");
$sorgu=$db->prepare('SELECT *FROM musteri');
$sorgu->execute();
$personellist=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
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

if(isset($_GET["pid"]))
{
   
	$sorgu=$db->prepare('SELECT * FROM musteri WHERE id=?');
	$sonuc=$sorgu->execute([$_GET['pid']]);
}$personellist=$sorgu-> fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personel Ekle</title>
    
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
                        <h4 class="card-title">Personel Kartı Ekle</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="/islemler/personel-kaydet.php" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">İsim&Soyisim</label>
                                            <input type="text" id="first-name-column" class="form-control" placeholder="İsim Soyisim"
                                                name="isim">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Yaş</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="Yaş"
                                                name="yas">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Tc Kimlik No</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="11 Haneli Tc Numarası" name="tc">
                                        </div>
                                    </div> 
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Kan Grubu</label>
                                            <input type="text" id="country-floating" class="form-control" name="kan_grubu"
                                                placeholder="Kan Grubu (Örnek:A+)">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Telefon</label>
                                            <input type="text" id="company-column" class="form-control" name="telefon"
                                                placeholder="Telefon">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Aile Telefon</label>
                                            <input type="text" id="email-id-column" class="form-control" name="aile_telefon"
                                                placeholder="Acil Durumlar İçin">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Adres</label>
                                            <input type="text" id="email-id-column" class="form-control" name="adres"
                                                placeholder="Adres">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Departman</label>
                                            <input type="text" id="email-id-column" class="form-control" name="departman"
                                                placeholder="Departman">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">İşe Giriş Tarihi</label>
                                            <input type="text" id="email-id-column" class="form-control" name="ise_giris_tarihi"
                                                placeholder="İşe Giriş Tarihi">
                                        </div>
                                        <div class="form-group">
                                        <label>Profil Resmi<br></label>
          <input type="file" name="resim" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <div class='form-check'>
                                           
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Ekle</button>
                                       
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


       <?php require("footer.php") ?>
       
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script src="assets/js/main.js"></script>
</body>
</html>
