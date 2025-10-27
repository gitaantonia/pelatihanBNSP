<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User</title>
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
?>

<div class="container">
    <h2 class="mb-4">Daftar Pengguna</h2>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT 
                        u.*, 
                        r.role_name 
                    FROM 
                        users u
                    JOIN 
                        roles r ON u.role_id = r.id 
                    ORDER BY 
                        u.created_at DESC";
            
            $res = $conn->query($sql);
            $no = 1;
            while ($row = $res->fetch_assoc()):
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= $row['role_name'] ?></td>
                <td><?= $row['created_at'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include "../includes/footer.php"; ?>

</body>
</html>