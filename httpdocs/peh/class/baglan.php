<?php
  ## BAĞLANTI YAPIYORUZ
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "script1";
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->query("SET NAMES 'utf8'");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    }
  catch(PDOException $e)
    {
      echo "Bağlantı Hatası: " . $e->getMessage();
    }
    
?>