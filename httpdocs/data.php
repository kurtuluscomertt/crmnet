<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","stok");

$sqlQuery = "SELECT siparis_id,stok_isim,sip_genel_toplam FROM siparis ORDER BY siparis_id";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>