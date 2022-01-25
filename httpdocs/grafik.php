<?php
  $servername = "localhost";
  $username = "stokk";
  $password = "1*Qjml31";
  $dbname = "stokk";
  try {
      $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $db->query("SET NAMES 'utf8'");
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    }
  catch(PDOException $e)
    {
      echo "Bağlantı Hatası: " . $e->getMessage();
    }
    $urun1=$_POST['urun1'];
    $urun2=$_POST['urun2'];
    $urun3=$_POST['urun3'];
    $urun4=$_POST['urun4'];
    $urun5=$_POST['urun5'];
    $urun6=$_POST['urun6'];
    $urun7=$_POST['urun7'];
    $urun8=$_POST['urun8'];
    $urun9=$_POST['urun9'];
    $urun10=$_POST['urun10'];

    $tarih1=$_POST['tarih1'];
    $tarih2=$_POST['tarih2'];

    $Fiyat11=$db->prepare("SELECT SUM(sip_genel_toplam) AS stok_isim FROM siparis WHERE siparis_id>1");
  $Fiyat11->execute();
$FiyatYaz11= $Fiyat11->fetch(PDO::FETCH_ASSOC);



    


$Fiyat1=$db->prepare("SELECT SUM(sip_genel_toplam) AS stok_isim FROM siparis WHERE stok_isim='$urun1' AND (sip_zaman > '$tarih1' and sip_zaman < '$tarih2')");
  $Fiyat1->execute();
$FiyatYaz1= $Fiyat1->fetch(PDO::FETCH_ASSOC);


$Fiyat2=$db->prepare("SELECT SUM(sip_genel_toplam) AS stok_isim FROM siparis WHERE stok_isim='$urun2'  AND (sip_zaman > '$tarih1' and sip_zaman < '$tarih2')");
$Fiyat2->execute();
$FiyatYaz2= $Fiyat2->fetch(PDO::FETCH_ASSOC);


$Fiyat3=$db->prepare("SELECT SUM(sip_genel_toplam) AS stok_isim FROM siparis WHERE stok_isim='$urun3'  AND (sip_zaman > '$tarih1' and sip_zaman < '$tarih2')");
$Fiyat3->execute();
$FiyatYaz3= $Fiyat3->fetch(PDO::FETCH_ASSOC);


$Fiyat4=$db->prepare("SELECT SUM(sip_genel_toplam) AS stok_isim FROM siparis WHERE stok_isim='$urun4'  AND (sip_zaman > '$tarih1' and sip_zaman < '$tarih2')");
$Fiyat4->execute();
$FiyatYaz4= $Fiyat4->fetch(PDO::FETCH_ASSOC);


$Fiyat5=$db->prepare("SELECT SUM(sip_genel_toplam) AS stok_isim FROM siparis WHERE stok_isim='$urun5'  AND (sip_zaman > '$tarih1' and sip_zaman < '$tarih2')");
$Fiyat5->execute();
$FiyatYaz5= $Fiyat5->fetch(PDO::FETCH_ASSOC);


$Fiyat6=$db->prepare("SELECT SUM(sip_genel_toplam) AS stok_isim FROM siparis WHERE stok_isim='$urun6'  AND (sip_zaman > '$tarih1' and sip_zaman < '$tarih2')");
$Fiyat6->execute();
$FiyatYaz6= $Fiyat6->fetch(PDO::FETCH_ASSOC);


$Fiyat7=$db->prepare("SELECT SUM(sip_genel_toplam) AS stok_isim FROM siparis WHERE stok_isim='$urun7'  AND (sip_zaman > '$tarih1' and sip_zaman < '$tarih2')");
$Fiyat7->execute();
$FiyatYaz7= $Fiyat7->fetch(PDO::FETCH_ASSOC);


$Fiyat8=$db->prepare("SELECT SUM(sip_genel_toplam) AS stok_isim FROM siparis WHERE stok_isim='$urun8'  AND (sip_zaman > '$tarih1' and sip_zaman < '$tarih2')");
$Fiyat8->execute();
$FiyatYaz8= $Fiyat8->fetch(PDO::FETCH_ASSOC);


$Fiyat9=$db->prepare("SELECT SUM(sip_genel_toplam) AS stok_isim FROM siparis WHERE stok_isim='$urun9'  AND (sip_zaman > '$tarih1' and sip_zaman < '$tarih2')");
$Fiyat9->execute();
$FiyatYaz9= $Fiyat9->fetch(PDO::FETCH_ASSOC);


$Fiyat10=$db->prepare("SELECT SUM(sip_genel_toplam) AS stok_isim FROM siparis WHERE stok_isim='$urun10'  AND (sip_zaman > '$tarih1' and sip_zaman < '$tarih2')");
$Fiyat10->execute();
$FiyatYaz10= $Fiyat10->fetch(PDO::FETCH_ASSOC);



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
<html>
  <head>
  <link rel="stylesheet" href="assets/css/bootstrap.css">

<link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">

<link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
<link rel="stylesheet" href="assets/css/app.css">
<link rel="shortcut icon" href="/img/LOGO.png" type="image/x-icon">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['<?php echo "$urun1" ?>', <?php  echo $FiyatYaz1['stok_isim'] ?>],
  ['<?php echo "$urun2" ?>', <?php  echo $FiyatYaz2['stok_isim'] ?>],
  ['<?php echo "$urun3" ?>', <?php if($urun3 == " "){echo "0";} else if($FiyatYaz3['stok_isim']==null){echo "0";} else {echo $FiyatYaz3['stok_isim']; }  ?>],
  ['<?php echo "$urun4" ?>', <?php if($urun4 == " "){echo "0";}  else if($FiyatYaz4['stok_isim']==null){echo "0";} else {echo $FiyatYaz4['stok_isim']; }  ?>],
  ['<?php echo "$urun5" ?>', <?php if($urun5 == " "){echo "0";}  else if($FiyatYaz5['stok_isim']==null){echo "0";} else {echo $FiyatYaz5['stok_isim']; }  ?>],
  ['<?php echo "$urun6" ?>', <?php if($urun6 == " "){echo "0";}  else if($FiyatYaz6['stok_isim']==null){echo "0";} else {echo $FiyatYaz6['stok_isim']; }  ?>],
  ['<?php echo "$urun7" ?>', <?php if($urun7 == " "){echo "0";}  else if($FiyatYaz7['stok_isim']==null){echo "0";} else {echo $FiyatYaz7['stok_isim']; }  ?>],
  ['<?php echo "$urun8" ?>', <?php if($urun8 == " "){echo "0";}  else if($FiyatYaz8['stok_isim']==null){echo "0";} else {echo $FiyatYaz8['stok_isim']; }  ?>],
  ['<?php echo "$urun9" ?>', <?php if($urun9 == " "){echo "0";}  else if($FiyatYaz9['stok_isim']==null){echo "0";} else {echo $FiyatYaz9['stok_isim']; }  ?>],
  ['<?php echo "$urun10" ?>', <?php if($urun10 == " "){echo "0";}  else if($FiyatYaz10['stok_isim']==null){echo "0";} else {echo $FiyatYaz10['stok_isim']; }  ?>],
  
  
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Crmnet Ürün Raporlaması --> Seçilen tarih Aralığındaki Tüm Ürünlerden Edilen Toplam Gelir :  <?php  echo $FiyatYaz11['stok_isim']; ?> ₺', 'width':1000, 'height':650};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
  </head>
  <body>
  <?php require("header.php") ?>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    <?php require("footer.php")?>

    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script src="assets/js/main.js"></script>
  </body>
  
</html>
