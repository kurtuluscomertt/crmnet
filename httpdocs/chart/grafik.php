<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "stok";
  try {
      $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $db->query("SET NAMES 'utf8'");
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    }
  catch(PDOException $e)
    {
      echo "Bağlantı Hatası: " . $e->getMessage();
    }

    $urun1="Kalem";
   




$Fiyat1=$db->prepare("SELECT SUM(sip_genel_toplam) AS stok_isim FROM siparis WHERE stok_isim='$urun1'");
  $Fiyat1->execute();
$FiyatYaz1= $Fiyat1->fetch(PDO::FETCH_ASSOC);






 
 

  
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['<?php echo "Kalem" ?>', <?php  echo $FiyatYaz1['stok_isim'] ?>],
  ['Futbol Topu', 9],
  ['Eat', 2],
  ['TV', 2],
  ['Gym', 2],
  [' ', 0 ]
  
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'My Average Day', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
  
</html>
