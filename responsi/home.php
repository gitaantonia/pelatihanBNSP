<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" style="font-weight: bold;">
                <img src="logo.jpg" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                SMART STUDENT
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="d-flex align-items-center gap-2 mt-3" style="margin-left: 15px;">
                        <i class="bi bi-person-fill fs-1"></i>
                        <div>
                            <h5 class="mb-0">Welcome</h5>
                            <p class="mb-0"><?= htmlspecialchars($username) ?></p> 
                        </div>
                    </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Data Mahasiswa
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="tampilkanData.php">Tampilan Data</Data></a></li>
                                <li><a class="dropdown-item" href="data_add.php">Tambah Data</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div style="height: 100vh;">
        <div style="height:100%; display:flex; justify-content:center; align-items:center;">
            <div style="display: flex; flex-direction: column; align-items: center;">
                <img src="logo.jpg" alt="logo" style="width: 15em;">
                <div class="text-center" style="font-weight: bold; margin-top:20px;">
                    <p>
                        REKAP DATA MAHASISWA FAKULTAS TEKNIK INDUSTRI<br>
                        UNIVERSITAS PEMBANGUNAN NASIONAL "VETERAN" YOGYAKARTA
                    </p>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>