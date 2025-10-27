<?php
session_start();
include 'config/config.php';
include 'includes/header.php';

$error = '';

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        // verifikasi password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_role'] = $row['role_id'];

            // arahkan berdasarkan role
            if ($row['role_id'] === '1') {
                header('Location: admin/dashboard.php');
            } else {
                header('Location: index.php');
            }
            exit;
        } else {
            $error = 'Password salah!';
        }
    } else {
        $error = 'Email tidak ditemukan!';
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | EventGo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .login-card {
            max-width: 400px;
            margin: 80px auto;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(151, 219, 255, 0.1);
                backdrop-filter: blur(200px);
        }
    </style>
</head>

<body>
    <div class="login-card">
        <h3 class="text-center mb-4">EventGo Login</h3>

        <?php if ($error): ?>
            <div class="alert alert-danger text-center"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button name="login" class="btn btn-secondary w-100 text-white">Login</button>
        </form>

        <p class="text-center mt-3">Belum punya akun? <a href="register.php">Daftar</a></p>
    </div>
</body>

</html>
