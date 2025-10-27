<?php
require 'session.php'; //ini yang buat kata distribusi
include 'koneksi.php';
$username = $_SESSION['username'];

$sql = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query error: " . $conn->error);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"><title>Tampilkan <Data></Data></title>
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


    <div class="d-flex container-fluid justify-content-center align-items-center" style="height: 100vh;">
        <div class="d-flex container-fluid justify-content-center align-items-center" style="display: flex; flex-direction: column;">
            <h3 class="text-center mb-4">Data Mahasiswa</h3>
            <div>
                <table class="table table-striped">
                    <?php if (isset($_GET['status']) && $_GET['status'] == 'hapus_berhasil'): ?>
                        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; margin-bottom: 10px;">
                            Data berhasil dihapus!
                        </div>
                    <?php endif; ?>


                    <tr style="font-weight: bold;">
                        <td>No.</td>
                        <td>Nim</td>
                        <td>Nama Mahasiswa</td>
                        <td>Jenis Kelamin</td>
                        <td>Program Studi</td>
                        <td>Aksi</td>
                    </tr>
                    <?php $no = 1;
                    while ($row = mysqli_fetch_array($result)): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['Nim'] ?></td>
                            <td><?= $row['Nama_Mhs'] ?></td>
                            <td><?= $row['Jenis_Kelamin'] ?></td>
                            <td><?= $row['Program_Studi'] ?></td>
                            <td>
                                <a href="data_edit.php?Nim=<?= $row['Nim'] ?>" style="background-color:rgb(254, 254, 254); border: 2px solid rgb(38, 38, 38); min-width: 60px; border-radius:0%; box-shadow: 1px 1px 3px rgba(0,0,0,1);" class="btn btn-light me-2">Edit</a>
                                <a href="data_delete.php?Nim=<?= $row['Nim'] ?>" onclick="return confirm('Hapus data ini?')" style="background-color:rgb(254, 254, 254); border: 2px solid rgb(38, 38, 38); min-width: 60px; border-radius:0%; box-shadow: 1px 1px 3px rgba(0,0,0,1);" class="btn btn-light">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
            <a href="data_add.php"
                style="background-color:rgb(254, 254, 254); border: 2px solid rgb(38, 38, 38); min-width: 60px; border-radius:0%; box-shadow: 1px 1px 3px rgba(0,0,0,1);" class="btn">
                Tambah Data
            </a>
        </div>
    </div>
</body>

</html>