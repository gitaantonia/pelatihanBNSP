<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php
session_start();
require_once "../config/config.php";
require_once "../includes/functions.php";
// checkLogin();
// if (!isAdmin()) {
//     header("Location: ../index.php");
//     exit;
// }
include "../includes/header.php";

// Hapus event
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM events WHERE id=$id");
    header("Location: manage_events.php");
}

// Tambah event
if (isset($_POST['add_event'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $date = $_POST['date'];
    $loc = $_POST['location'];
    $price = $_POST['price'];
    $author_id = $_SESSION['user_id'];

    $conn->query("INSERT INTO events (title, description, date, location, price, author_id, created_at) 
                  VALUES ('$title', '$desc', '$date', '$loc', '$price', '$author_id', NOW())");
    header("Location: manage_events.php");
}
?>

<div class="container">
    <h2 class="mb-4">Kelola Event</h2>

    <!-- Tambah Event -->
    <form method="POST" class="mb-4">
        <div class="row g-2">
            <div class="col-md-3"><input type="text" name="title" class="form-control" placeholder="Judul Event" required></div>
            <div class="col-md-2"><input type="date" name="date" class="form-control" required></div>
            <div class="col-md-2"><input type="text" name="location" class="form-control" placeholder="Lokasi" required></div>
            <div class="col-md-2"><input type="number" name="price" class="form-control" placeholder="Harga" required></div>
            <div class="col-md-3"><button class="btn btn-primary w-100" name="add_event">Tambah</button></div>
        </div>
        <textarea name="description" class="form-control mt-2" placeholder="Deskripsi singkat"></textarea>
    </form>

    <!-- Tabel Event -->
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $res = $conn->query("SELECT * FROM events ORDER BY created_at DESC");
            $no = 1;
            while ($row = $res->fetch_assoc()):
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= $row['date'] ?></td>
                <td><?= $row['location'] ?></td>
                <td>Rp <?= number_format($row['price'], 0, ',', '.') ?></td>
                <td>
                    <a href="?delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus event ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include "../includes/footer.php"; ?>

</body>
</html>