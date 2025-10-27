<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventGo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-blue bg-blue fixed-top shadow-sm">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="index.php">
      <img src="assets/img/Logo.png" alt="EventGo Logo" style="width: 40px; border-radius: 50%;" class="me-2">
      <span>EventGo</span>
    </a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a href="about.php" class="nav-link">Tentang</a></li>
        <li class="nav-item"><a href="contact.php" class="nav-link">Kontak</a></li>

        <?php if (isset($_SESSION['user_id'])): ?>
            <li class="nav-item"><a href="index.php" class="nav-link">Dashboard</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link text-danger">Logout</a></li>
        <?php else: ?>
            <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<main class="py-4">
