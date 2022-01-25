<?php
  $hostname = "localhost";
  $username = "chat_";
  $password = "Smev513%";
  $dbname = "chat_";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
