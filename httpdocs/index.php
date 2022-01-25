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

            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Yönetim Paneli</h3>
                    <p class="text-subtitle text-muted">Teknik destek için buradan destek talebi oluşturabilirsiniz.</p>
                </div>  <!-- Input Group Select start 
                <section class="section">
                    <div class="row mb-2">
                        <div class="col-12 col-md-3">
                            <div class="card card-statistic">
                                <div class="card-body p-0">
                                    <div class="d-flex flex-column">
                                        <div class='px-3 py-3 d-flex justify-content-between'>
                                            <h3 class='card-title'>BALANCE</h3>
                                            <div class="card-right d-flex align-items-center">
                                                <p>$50 </p>
                                            </div>
                                        </div>
                                        <div class="chart-wrapper">
                                            <canvas id="canvas1" style="height:100px !important"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="card card-statistic">
                                <div class="card-body p-0">
                                    <div class="d-flex flex-column">
                                        <div class='px-3 py-3 d-flex justify-content-between'>
                                            <h3 class='card-title'>Revenue</h3>
                                            <div class="card-right d-flex align-items-center">
                                                <p>$532,2 </p>
                                            </div>
                                        </div>
                                        <div class="chart-wrapper">
                                            <canvas id="canvas2" style="height:100px !important"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="card card-statistic">
                                <div class="card-body p-0">
                                    <div class="d-flex flex-column">
                                        <div class='px-3 py-3 d-flex justify-content-between'>
                                            <h3 class='card-title'>ORDERS</h3>
                                            <div class="card-right d-flex align-items-center">
                                                <p>1,544 </p>
                                            </div>
                                        </div>
                                        <div class="chart-wrapper">
                                            <canvas id="canvas3" style="height:100px !important"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="card card-statistic">
                                <div class="card-body p-0">
                                    <div class="d-flex flex-column">
                                        <div class='px-3 py-3 d-flex justify-content-between'>
                                            <h3 class='card-title'>Sales Today</h3>
                                            <div class="card-right d-flex align-items-center">
                                                <p>423 </p>
                                            </div>
                                        </div>
                                        <div class="chart-wrapper">
                                            <canvas id="canvas4" style="height:100px !important"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    -->
                    <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title ">Son Yapılan Satışlar</h4>
                                    <div class="d-flex  ">
                                        <i data-feather="download"></i>
                                    </div>
                                </div>
                                <div style="background-color:#d1ecf1" class="card-body px-3 pb-0 ">
                                    <div class="table-responsive ">
                                        <table class='table table-info mb-0' id="table1">
                                            <thead>
                                                <tr>
                                                <th>Müşteri Adı</th>
                                        <th>Ürün Adı</th>
                                        
                                        <th>Genel Toplam</th>
                                        <th>Tarih</th>
                                        <th>Durum</th>
                                       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <tr>
                                                <?php
                                                $sorgu4=$db->prepare('SELECT *FROM siparis  ORDER BY siparis_id DESC LIMIT 0,5');
                                                $sorgu4->execute();
                                                $personellist4=$sorgu4-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
                                                 
			 foreach($personellist4 as $person4){?> 
			 
			 	<tr>
			 	<td><?= $person4->musteri_adi ?></td>
			 	<td><?= $person4->stok_isim ?></td>
			 	<td><?= $person4->sip_genel_toplam ?></td>
			 	<td><?= $person4->sip_zaman?> ₺</td>
                 
                 <?php if($person4->durum == "Tamamlandı"){
                    echo('<td><span class="badge bg-success">Tamamlandı</span></td>');
                }
                else if($person4->durum == "Beklemede"){
                    echo(' <td><span class="badge bg-warning">Beklemede</span></td>');
                }
                else if($person4->durum == "İptal Edildi"){
                    echo(' <td><span class="badge bg-danger">İptal Edildi</span></td>');
                }
                    ?>
                                                     
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                
                                
                            </div>
                            
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Son Yapılan Ödemeler</h4>
                                    <div class="d-flex ">
                                        <i data-feather="download"></i>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-0">
                                    <div class="table-responsive">
                                        <table class='table  table-danger mb-0' id="table1">
                                            <thead>
                                                <tr>
                                                    <th>Ödeme ID</th>
                                                <th>Müşteri Adı</th>
                                        <th>Ürün Adı</th>
                                        
                                        <th>Miktar</th>
                                        <th>Tarih</th>
                                        
                                       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <tr>
                                                <?php
                                                $sorgu44=$db->prepare('SELECT *FROM kasa_gelen  ORDER BY id DESC LIMIT 0,5');
                                                $sorgu44->execute();
                                                $personellist44=$sorgu44-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
                                                 
			 foreach($personellist44 as $person44){?> 
			 
			 	<tr>
			 	<td><?= $person44->id?></td>
			 	<td><?= $person44->unvan ?></td>
			 	<td><?= $person44->odeme_turu ?></td>
			 	<td><?= $person44->miktar?> ₺</td>
                 <td><?= $person44->tarih?></td>
                 
               
                                                     
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>





             
                        <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Son İşlemler</h4>
                                    <div class="d-flex ">
                                        <i data-feather="download"></i>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-0">
                                    <div class="table-responsive">
                                        <table class='table table-warning mb-0  ' id="table1">
                                            <thead>
                                                <tr>
                                                    <th>İşlem İd</th>
                                                    <th>İşlem</th>
                                                <th>Tarih</th>
                                        <th>Saat</th>
                                      
                                        
                                       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <tr>
                                                <?php
                                                $sorgu13=$db->prepare('SELECT *FROM islem ORDER BY id DESC LIMIT 0,5');
                                                $sorgu13->execute();
                                                $personellist13=$sorgu13-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
                                                 
			 foreach($personellist13 as $person13){?> 
			 
			 	<tr>
                 <td><?= $person13->id?></td>
			 	<td><?= $person13->islem?></td>
			 	<td><?= $person13->tarih?></td>
			 	<td><?= $person13->saat ?></td>
			 
               
                                                     
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>










                        



                        
                      
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Stok Durumu</h4>
                                    <div class="d-flex ">
                                        <i data-feather="download"></i>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-0">
                                    <div class="table-responsive">
                                        <table class='table table-success mb-0' id="table1">
                                            <thead>
                                                <tr>
                                                    <th>Stok ID</th>
                                                <th>Stok Adı</th>
                                        <th>Stok Adedi</th>
                                        
                                        <th>Stok Birimi</th>
                                        
                                        
                                       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <tr>
                                                <?php
                                                $sorgu444=$db->prepare('SELECT *FROM stok ORDER BY id DESC LIMIT 0,5');
                                                $sorgu444->execute();
                                                $personellist444=$sorgu444-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
                                                 
			 foreach($personellist444 as $person444){?> 
			 
			 	<tr>
			 	<td><?= $person444->id?></td>
			 	<td><?= $person444->stok_adi ?></td>
			 	<td><?= $person444->stok_adet ?></td>
			 	<td><?= $person444->stok_birim?> ₺</td>
                 
               
                                                     
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                       










                       
                            </div>
                        </div>
                    </div>
                </section>
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