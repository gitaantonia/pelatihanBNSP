<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <h2>
    <?php

    if(isset($_GET['pesan'])){
      $pesan = $_GET['pesan'];

      if($pesan == "gagal"){
        echo "Login gagal! awokaowkaok";
      }
      else if($pesan == "blom_login"){
        echo "login dulu bang";
      }
      else if($pesan == "logout"){
        echo "anda telah berhasil keluar";
      }
    }

    ?>
  </h2>
  <h2>Login Form</h2>
  <br>
  <form method="POST" action="ceklogin.php">
    <table>
      <tr>
        <td>Username</td>
        <td><input type="text" name="username"></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="password"></td>
      </tr>
      <tr>
        <td><input type="submit" value="Login"></td>
      </tr>
    </table>
  </form>
</body>
</html>