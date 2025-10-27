<?php
include 'config/config.php';
include 'includes/header.php';

$message = '';

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Cek apakah email sudah terdaftar
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $message = "<div class='alert alert-danger text-center'>Email sudah digunakan!</div>";
    } else {
        $query = "INSERT INTO users (name, email, password, role, created_at) 
                  VALUES ('$name', '$email', '$password', 'user', NOW())";
        if (mysqli_query($conn, $query)) {
            $message = "<div class='alert alert-success text-center'>Registrasi berhasil! Silakan login.</div>";
        } else {
            $message = "<div class='alert alert-danger text-center'>Terjadi kesalahan. Coba lagi.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | EventGo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .register-card {
            max-width: 500px;
            margin: 50px auto;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(151, 219, 255, 0.1);
            backdrop-filter: blur(200px);
        }
    </style>
</head>

<body>
    <div class="register-card">
        <h3 class="text-center mb-4">Daftar EventGo</h3>

        <?php echo $message; ?>

        <form method="POST">
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button name="register" class="btn btn-secondary w-100 text-white">Daftar</button>
        </form>

        <p class="text-center mt-3">Sudah punya akun? <a href="login.php">Login</a></p>
    </div>
</body>

</html>