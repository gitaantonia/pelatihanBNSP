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
?>

<div class="container">
    <h2 class="mb-4">Pesan dari Pengguna</h2>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $res = $conn->query("SELECT * FROM contacts ORDER BY created_at DESC");
            $no = 1;
            while ($row = $res->fetch_assoc()):
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['message']) ?></td>
                <td><?= $row['created_at'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include "../includes/footer.php"; ?>
