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

// Ambil data statistik
$events = $conn->query("SELECT COUNT(*) AS total FROM events")->fetch_assoc()['total'];
$users = $conn->query("SELECT COUNT(*) AS total FROM users WHERE role_id='2'")->fetch_assoc()['total'];
$orders = $conn->query("SELECT COUNT(*) AS total FROM tickets")->fetch_assoc()['total'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        /* Card Event - Ungu */
        .card.primary {
            background: rgba(139, 92, 246, 0.2);
            border: 1px solid rgba(139, 92, 246, 0.5);
            color: #fff;
        }

        /* Card User - Biru */
        .card.success {
            background: rgba(59, 130, 246, 0.2);
            border: 1px solid rgba(59, 130, 246, 0.5);
            color: #fff;
        }

        /* Card Pesanan - Oranye Muda */
        .card.warning {
            background: rgba(255, 159, 28, 0.2);
            border: 1px solid rgba(255, 159, 28, 0.5);
            color: #fff;
        }

        /* Hover card tetap smooth */
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(59, 130, 246, 0.3);
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="mb-4">Dashboard Admin</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card primary mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Event</h5>
                        <p class="display-6"><?= $events ?></p>
                        <a href="manage_events.php" class="btn btn-sm btn-light mt-2">Kelola Event</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card success mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total User</h5>
                        <p class="display-6"><?= $users ?></p>
                        <a href="manage_users.php" class="btn btn-sm btn-light mt-2">Kelola User</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card warning mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Pesanan</h5>
                        <p class="display-6"><?= $orders ?></p>
                        <a href="manage_orders.php" class="btn btn-sm btn-light mt-2">Lihat Pesanan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "../includes/footer.php"; ?>

</body>

</html>