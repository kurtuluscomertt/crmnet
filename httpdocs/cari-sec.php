<?php
require("./class/baglan.php");
$sorgu=$db->prepare('SELECT *FROM musteri');
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
    <title>Cari Seç</title>

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
                            Lütfen sipariş için cari seçin
                        </div>
                        <div class="card-body">
                            <table class='table table-striped' id="table1">
                                <thead>
                                    <tr>
                                        <th>Müşteri No</th>
                                        <th>Unvanı</th>
                                        <th>Telefon</th>
                                        
                                        <th>Vergi Dairesi</th>
                                        <th>Vergi No</th>
                                        <th>Adres</th>
                                        <th>Seçim</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
			 foreach($personellist as $person){?>
			 
			 	<tr>
			 	<td><?= $person->id ?></td>
			 	<td><?= $person->unvan ?></td>
			 	<td><?= $person->telefon ?></td>
			 	
                 <td><?= $person->vergi_dairesi ?></td>
                 <td><?= $person->vergi_no?></td>
                 <td><?= $person->adres?></td>
			 	
                 <td><a href="/siparis-ekle-cari.php?pid=<?= $person->id ?>"  class="btn btn-success">Seç</a></td>
			 	
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