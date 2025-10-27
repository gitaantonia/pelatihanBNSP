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
    <h2 class="mb-4">Kelola Pesanan Tiket</h2>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama User</th>
                <th>Event</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Tanggal Pesan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT t.*, u.name AS user, e.title AS event 
                    FROM tickets t
                    JOIN users u ON t.user_id = u.id
                    JOIN events e ON t.event_id = e.id
                    ORDER BY t.created_at DESC";
            $res = $conn->query($sql);
            $no = 1;
            while ($row = $res->fetch_assoc()):
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['user']) ?></td>
                <td><?= htmlspecialchars($row['event']) ?></td>
                <td><?= $row['quantity'] ?></td>
                <td>Rp <?= number_format($row['total_price'], 0, ',', '.') ?></td>
                <td><?= $row['created_at'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include "../includes/footer.php"; ?>
