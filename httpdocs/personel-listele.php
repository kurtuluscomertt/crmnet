<?php
require("./class/baglan.php");
$sorgu=$db->prepare('SELECT *FROM personel');
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
    <title>Müşteri Listele</title>

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
                          Personel Listele
                        </div>
                        <div class="card-body">
                            <table class='table table-striped' id="table1">
                                <thead>
                                    <tr>
                                        <th>İd</th>
                                        <th>isim</th>
                                        <th>Yaş</th>
                                        <th>Tc</th>
                                        <th>Kan Grubu</th>
                                       
                                        <th>Aile Telefon</th>
                                      
                                        <th>Departman</th>
                                        <th>İşe Giriş</th>
                                        <th>Durum</th>
                                        <th>Detay</th>
                                        <th>Sil</th>
                                        <th>Güncelle</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
			 foreach($personellist as $person){?>
			 
			 	<tr>
			 	<td><b><?= $person->id ?></b> </td>
			 	<td> <b><?= $person->isim ?></b></td>
			 	<td><b> <?= $person->yas ?></b></td>
			 	<td><b> <?= $person->tc?></b> </td>
                 <td><b> <?= $person->kan_grubu ?></b></td>
                 
                 <td><b> <?= $person->aile_telefon ?></b></td>
                 
                 <td><b><?= $person->departman?></b> </td>
                 <td><b> <?= $person->ise_giris_tarihi ?></b></td>
               
                 <?php if($person->durum == "Çalışıyor"){
                    echo('<td><span class="badge bg-success">Çalışıyor</span></td>');
                }
               
                else if($person->durum == "Çalışmıyor"){
                    echo(' <td><span class="badge bg-danger">Çalışmıyor</span></td>');
                }
                else{
                    echo(' <td><span class="badge bg-warning">Durum Yok</span></td>');
                }
                    ?>
                
                
                <td><a href="personel-detay.php?pid=<?= $person->id ?>"  class="btn btn-warning">Detay</a></td>
                <td><a href="/islemler/personel-sil.php?pid=<?= $person->id ?>"  class="btn btn-danger">Sil</a></td>
                 <td><a href="personel-guncelle.php?pid=<?= $person->id ?>"  class="btn btn-info">Güncelle</a></td>
                 
			 	
			    </tr>
				 
			 <?php } ?>
                                    
                                </tbody>
                            </table>
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

    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="assets/js/vendors.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>