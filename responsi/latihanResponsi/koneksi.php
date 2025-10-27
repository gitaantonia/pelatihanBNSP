<?php

$host = "localhost";
$usn = "root";
$pass = "";
$db_name = "latres";

$conn = new mysqli($host, $usn, $pass, $db_name);

  if($conn->connect_error){
    die('Maaf koneksi gagal/terputus: '. $conn->connect_error);
  }
?>