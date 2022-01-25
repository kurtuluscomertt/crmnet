<?php
require("./class/baglan.php");
$sorgu=$db->prepare('SELECT *FROM arac');
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
    <title>Araç Listele</title>

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
                         Araç Listele
                        </div>
                        <div class="card-body">
                            <table class='table table-striped' id="table1">
                                <thead>
                                    <tr>
                                        <th>İd</th>
                                        <th>Plaka</th>
                                        <th>Şoför</th>
                                        <th>Model</th>
                                        <th>Muayene Bitiş Tarihi</th>
                                        <th>Kasko Bitiş Tarihi</th>
                                       
                                       
                                        <th>Sil</th>
                                        <th>Güncelle</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
			 foreach($personellist as $person){?>
			 
			 	<tr>
			 	<td><b><?= $person->id ?></b> </td>
			 	<td> <b><?= $person->plaka ?></b></td>
			 	<td><b> <?= $person->sofor ?></b></td>
			 	<td><b> <?= $person->tip ?></b> </td>
                 <td><b> <?= $person->muayene ?></b></td>
                 
                 <td><b> <?= $person->kasko ?></b></td>
                 
                 
               
                
                

                <td><a href="/islemler/arac-sil.php?pid=<?= $person->id ?>"  class="btn btn-danger">Sil</a></td>
                 <td><a href="arac-guncelle.php?pid=<?= $person->id ?>"  class="btn btn-info">Güncelle</a></td>
                 
			 	
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