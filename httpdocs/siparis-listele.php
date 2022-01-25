<?php
require("./class/baglan.php");
$sorgu=$db->prepare('SELECT *FROM siparis ORDER BY siparis_id DESC');
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Listele</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="/img/LOGO.png" type="image/x-icon">
</head>

<body>
    <div id="app">
 <?php   require("header.php"); ?>
                    
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Sipariş Listele
                        </div>
                        <div class="card-body">
                            <table class='table table-striped' id="table1">
                                <thead>
                                    <tr>
                                        <th>Fiş No</th>
                                        <th>Müşteri Adı</th>
                                        <th>Ürün Adı</th>
                                        <th>Satış Fiyatı</th>
                                        <th>Genel Toplam</th>
                                        <th>Tarih</th>
                                        <th>Durum</th>
                                        <th>Fiş Yaz</th>
                                        <th>Güncelle</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
			 foreach($personellist as $person){?>
			 
			 	<tr>
                 <td><b> <?= $person->siparis_id ?></b></td>
			 	<td><b> <?= $person->musteri_adi ?></b></td>
			 	<td><b> <?= $person->stok_isim ?></b></td>
			 	<td><b> <?= $person->sip_satis_fiyat ?></b></td>
			 	<td><b> <?= $person->sip_genel_toplam?> ₺</b></td>
                 <td><b> <?= $person->sip_zaman ?></b></td>
                 <?php if($person->durum == "Tamamlandı"){
                    echo('<td><span class="badge bg-success"><i data-feather="check" width="20"></i>Tamamlandı</span></td>');
                }
                else if($person->durum == "Beklemede"){
                    echo(' <td><span class="badge bg-dark"><i data-feather="clock" width="20"></i>Beklemede</span></td>');
                }
                else if($person->durum == "Kargoya Verildi"){
                    echo(' <td><span class="badge bg-warning"> <i data-feather="fast-forward" width="20"></i>Kargoya Verildi</span></td>');
                }
                else if($person->durum == "İptal Edildi"){
                    echo(' <td><span class="badge bg-danger"><i data-feather="x-circle" width="20"></i>İptal Edildi</span></td>');
                }
                    ?>
                
                
                
                <td><a href="/siparis-fatura.php?pid=<?= $person->siparis_id ?>"  class="btn btn-info"> Fiş Yaz</a></td>
                 <td><a href="/siparis-guncelle.php?pid=<?= $person->siparis_id ?>"  class="btn btn-info">Güncelle</a></td>
			 	
			    </tr>
				 
			 <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>

          <?php require("footer.php") ?>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="assets/js/vendors.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>