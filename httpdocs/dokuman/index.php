<?php  
require("./class/baglan.php");
session_start();
$veri= $db->query("SELECT * FROM kullanici ")->fetch(PDO::FETCH_ASSOC);
if (isset($_SESSION['kullanici_adi']))
{
   //Oturum değişkeninin içeriği boş, direkt anasayfaya yönlendirme kodları
  // bu kısma gelecek.
}
else {
    header("location:/auth-login-hata.php") ;
}



$sorgu=$db->prepare('SELECT *FROM dokuman');
$sorgu->execute();
$personellist=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
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
<?php
$kullanici = $_SESSION['kullanici_adi']; 
$veri= $db->query("SELECT * FROM kullanici WHERE mail='$kullanici'")->fetch(PDO::FETCH_ASSOC);
  $yetki = $veri['yetki'];
  if($yetki==1){
      require("header.php");
  }
  else{
    require("kull-header.php");
  }
  
  ?>
    <div id="app">
        
       
     



<div class="container">
<div class="row"> <?php
			 foreach($personellist as $person){?>
<div class="col-md-4">   <div class="card"  style="width: 18rem;position:relative;left:50px">
  <div class="card-body">
    <h5 class="card-title"><?= $person->ders ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?= $person->baslik?></h6>
    <p class="card-text"><?= $person->aciklama ?></p>
    <a href="<?= $person->dosya_yolu ?>" class="card-link">İndir</a>
    
  </div>
</div></div> <?php } ?>

</div>
</div>
            

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