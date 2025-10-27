<?php
require 'session.php';
include 'koneksi.php';
$username = $_SESSION['username'];

$sql = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query error: " . $conn->error);
}

if (isset($_POST['simpan'])) {
    $nim = $_POST['Nim'];
    $nama = $_POST['Nama_Mhs'];
    $jeniskelamin = $_POST['Jenis_Kelamin'];
    $prodi = $_POST['Program_Studi'];

    mysqli_query($conn, "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$jeniskelamin', '$prodi')");
    header("Location: tampilkanData.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Tambah Data</title>
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

    <div class="container-fluid" style="display: flex; height: 100vh;">
        <div class="container-fluid" style="display: flex; flex-direction:column;justify-content: center; align-items: center;">
            <h2>Tambah Data</h2>
            <div class="card" style="width: 700px;">
                <div class="card-body" style="display: flex; justify-content:center; align-items:center; border:0px solid #ffffff">
                    <form action="" method="post">
                        <table style="width: 650px;">
                            <tr>
                                <div class="mb-3 row">
                                    <td>
                                        <label for="nim" class="col-sm-3 col-form-label">NIM</label>
                                    </td>
                                    <td>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nim" name="Nim" required style=" border: 2px solid rgb(185, 185, 185);">
                                        </div>
                                    </td>
                                </div>
                            </tr>
                            <tr>
                                <div class="mb-3 row">
                                    <td>
                                        <label for="nama" class="col-sm-3 col-form-label">Nama </label>
                                    </td>
                                    <td>
                                        <div class="col-sm-9">
                                            <input type="text" style="border: 2px solid rgb(185, 185, 185);" class="form-control" id="nama" name="Nama_Mhs" required>
                                        </div>
                                    </td>
                                </div>
                            </tr>
                            <tr>
                                <div class="mb-3 row">
                                    <td><label for="jenisKelamin" class="form-check-label col-form-label">Jenis Kelamin</label></td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="Jenis_Kelamin" value="Laki-laki"> Laki-laki
                                        <input class="form-check-input" type="radio" name="Jenis_Kelamin" value="Perempuan"> Perempuan
                                    </td>
                                </div>
                            </tr>
                            <tr>
                                <div class="mb-3 row">
                                    <td>
                                        <label for="prodi" class="col-sm-3 col-form-label">Prodi</label>
                                    </td>
                                    <td>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="prodi" name="Program_Studi" style="border: 2px solid rgb(185, 185, 185);" required>
                                        </div>
                                    </td>
                                </div>
                            </tr>
                        </table>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" name="simpan" class="btn btn-light" style="border: 2px solid rgb(0, 0, 0);">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>