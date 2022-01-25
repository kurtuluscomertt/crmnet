<?php
  ## BAĞLANTI YAPIYORUZ
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ders";
  try {
      $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $db->query("SET NAMES 'utf8'");
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    }
  catch(PDOException $e)
    {
      echo "Bağlantı Hatası: " . $e->getMessage();
    }
    
?>