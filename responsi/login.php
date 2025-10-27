<?php
session_start();
include 'koneksi.php';

$error = "";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: home.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
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
    <title>login</title>
</head>

<body style="background-color: #353942;">
    <div style="height: 100vh;display: flex; flex-direction: column;  justify-content:center; align-items:center;">
        <?php
        if (isset($_SESSION['logout_alert']) && $_SESSION['logout_alert'] == true): ?>
            <div class="alert alert-danger text-center w-50" role="alert">
                Silakan login terlebih dahulu.
            </div>
            <?php unset($_SESSION['logout_alert']); ?>
        <?php endif; ?>

        <div class="card" style="width: 20rem; background-color:rgb(208, 208, 208); margin-top: 0px;">
            <h3 class="text-center align-items-center" style="height: 2em; font-size: 25px; margin-top: 20px; padding:0px;">Halaman Login</h3>
            <div class="card-body" style="background-color: white;">
                <form method="POST">
                    <div class="mb-3 text-center">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn" style="background-color:rgb(254, 254, 254); border: 2px solid rgb(38, 38, 38); min-width: 120px; border-radius:0%; box-shadow: 1px 1px 3px rgba(0,0,0,1);">Login</button>
                        </div>
                        <p class="text-center mt-3">Belum memiliki akun? <a href="register.php">Buat akun baru</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


</html>