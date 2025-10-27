<?php

  $hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "akademik";

  $konek = new mysqli($hostname,$username, $password,$database);

  if($konek->connect_error){
    die('Maaf koneksi gagal/terputus: '. $connect->connect_error);
  }

?>