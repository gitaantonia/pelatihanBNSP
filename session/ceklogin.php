<?php
  include "koneksi.php";
  session_start();

  $username = $_POST['username'];
  $password = $_POST['password'];

  $data = mysqli_query($konek,"select * from mahasiswa where 
  username = '$username' and password = '$password'");

  $jumlah = mysqli_num_rows($data);

  if($jumlah > 0){
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header("location:session.php");
  }else{
    header("location:login.php?pesan=gagal");
  }
?>