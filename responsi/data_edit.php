<?php
require 'session.php'; //ini yang buat ada kata distribusi  
include 'koneksi.php';
$username = $_SESSION['username'];

if (!isset($_GET['Nim'])) {
    die("NIM tidak ditemukan.");
}

$nim = intval($_GET['Nim']);

// Proses update data
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['Jenis_Kelamin'];
    $prodi = $_POST['prodi'];

    $update = mysqli_query($conn, "UPDATE mahasiswa SET Nama_Mhs='$nama', Jenis_Kelamin='$jenis_kelamin', Program_Studi='$prodi' WHERE Nim=$nim");

    if ($update) {
        echo "<script>alert('Data berhasil diupdate!');window.location='tampilkanData.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal update data!');</script>";
    }
}

$query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE Nim=$nim");
$data = mysqli_fetch_array($query);

if (!$data) {
    die("Data tidak ditemukan.");
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
<title>Edit Data</title>
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

    <div class="d-flex container-fluid justify-content-center align-items-center" style="height: 100vh; ">
        <div class="d-flex container-fluid justify-content-center align-items-center" style="display: flex; flex-direction: column;">
            <h1 class="text-center">Edit Data</h1>
            <div>
                <form action="" method="post">
                    <table style="width: 650px;">
                        <tr>
                            <div class="mb-3 row">
                                <td>
                                    <label for="nim" class="col-sm-3 col-form-label">NIM</label>
                                </td>
                                <td>
                                    <div class="col-sm-9" >
                                        <input type="text" class="form-control" id="nim"  value="<?php echo $data['Nim']; ?>" readonly style="background-color:rgb(225, 225, 225); border: 2px solid rgb(185, 185, 185);">
                                        <!-- readonly supaya si nimnya ga bisa diedit lagi -->
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
                                        <input type="text" style="border: 2px solid rgb(185, 185, 185);"  class="form-control" id="nama" name="nama" value="<?php echo $data['Nama_Mhs']; ?>" required>
                                    </div>
                                </td>
                            </div>
                        </tr>
                        <tr>
                            <div class="mb-3 row">
                                <td><label for="jenisKelamin" class="form-check-label col-form-label">Jenis Kelamin</label></td>
                                <td>
                                    <input class="form-check-input" type="radio" name="Jenis_Kelamin" value="Laki-laki" <?= $data['Jenis_Kelamin'] == 'Laki-laki' ? 'checked' : ''; ?>> Laki-laki
                                    <input class="form-check-input" type="radio" name="Jenis_Kelamin" value="Perempuan" <?= $data['Jenis_Kelamin'] == 'Perempuan' ? 'checked' : ''; ?>> Perempuan
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
                                        <input type="text" class="form-control" id="prodi" name="prodi" style="border: 2px solid rgb(185, 185, 185);" value="<?php echo $data['Program_Studi']; ?>" required>
                                    </div>
                                </td>
                            </div>
                        </tr>
                    </table>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="tampilkanData.php" class="btn btn-light me-2" style="border: 2px solid rgb(0, 0, 0);" >Kembali</a>
                        <button type="submit" name="submit" class="btn btn-light" style="border: 2px solid rgb(0, 0, 0);" >Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>