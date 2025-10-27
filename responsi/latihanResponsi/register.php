<?php
session_start();
include "koneksi.php";

$error = "";
$success = "";

if (isset($_POST['register-btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    if ($password !== $konfirmasi) {
        $error = "Konfirmasi password tidak cocok!";
    } else {
        $check = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
        if (mysqli_num_rows($check) > 0) {
            $error = "Username sudah terdaftar!";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
            if (mysqli_query($conn, $query)) {
                $success = "Registrasi berhasil! <a href='login.php'>Login disini</a>";
            } else {
                $error = "Gagal registrasi: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>register</title>
</head>

<body style="background-color: #353942;">
    <div style="height: 100vh;display: flex; justify-content:center; align-items:center;">
        <div class="card" style="width: 20rem; background-color:rgb(208, 208, 208)">
            <h3 class="text-center align-items-center" style="height: 2em; font-size: 25px; margin-top: 20px; padding:0px;">Register Akun</h3>
            <div class="card-body" style="background-color: white;">
                <?php if (!empty($error)) echo "<div class='alert alert-danger text-center'>$error</div>"; ?>
                <?php if (!empty($success)) echo "<div class='alert alert-success text-center'>$success</div>"; ?>
                <form method="POST">
                    <div class="mb-3 text-center">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="konfirmasi" class="form-label">Konfirmasi</label>
                            <input type="password" class="form-control" name="konfirmasi" id="konfirmasi" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="register-btn" style="background-color:rgb(254, 254, 254); border: 2px solid rgb(38, 38, 38); min-width: 120px; border-radius:0%; box-shadow: 1px 1px 3px rgba(0,0,0,1);">Buat Akun</button>
                        </div>
                        <p class="text-center mt-3">Sudah memiliki akun? <a href="login.php">Masuk disini</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>