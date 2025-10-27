<?php
require 'session.php';
include 'koneksi.php';

if (!isset($_GET['Nim'])) {
    die("NIM tidak ditemukan.");
}
$nim = $_GET['Nim'];

// Proses hapus data
$query = mysqli_query($conn, "DELETE FROM mahasiswa WHERE Nim = '$nim'");

if ($query) {
    // Redirect ke tampilkanData.php setelah berhasil hapus
    header("Location: tampilkanData.php?pesan=hapus_sukses");
    exit();
} else {
    // Redirect ke tampilkanData.php dengan pesan error jika gagal
    header("Location: tampilkanData.php?pesan=hapus_gagal");
    exit();
}
?>