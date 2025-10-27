<?php
include 'config/config.php';
include 'includes/header.php';

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$event = null; // Inisialisasi untuk menghindari error
$event_id = null;

// Periksa apakah event_id disediakan dan valid
if (isset($_GET['event_id']) && is_numeric($_GET['event_id'])) {
    $event_id = (int) $_GET['event_id']; // Sanitasi sebagai integer

    // Gunakan prepared statement untuk query SELECT
    $stmt = $conn->prepare("SELECT * FROM events WHERE id = ?");
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $event = $result->fetch_assoc();
    $stmt->close();

    if (!$event) {
        // Event tidak ditemukan
        echo "<script>alert('Event tidak ditemukan!'); window.location='index.php';</script>";
        exit;
    }
} else {
    // event_id tidak valid atau tidak disediakan
    echo "<script>alert('Event ID tidak valid!'); window.location='index.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = (int) $_SESSION['user_id']; // Pastikan integer
    $qty = (int) $_POST['quantity']; // Sanitasi sebagai integer

    // Validasi quantity
    if ($qty < 1) {
        echo "<script>alert('Jumlah tiket minimal 1!');</script>";
    } else {
        // **TAMBAHAN: Periksa apakah user_id valid di tabel users**
        $stmt_check_user = $conn->prepare("SELECT id FROM users WHERE id = ?");
        $stmt_check_user->bind_param("i", $user_id);
        $stmt_check_user->execute();
        $user_exists = $stmt_check_user->get_result()->num_rows > 0;
        $stmt_check_user->close();

        if (!$user_exists) {
            echo "<script>alert('User tidak valid! Silakan login ulang.'); window.location='login.php';</script>";
            exit;
        }

        // **TAMBAHAN: Periksa apakah event_id masih valid (meskipun sudah dicek di atas, untuk safety)**
        $stmt_check_event = $conn->prepare("SELECT id FROM events WHERE id = ?");
        $stmt_check_event->bind_param("i", $event_id);
        $stmt_check_event->execute();
        $event_exists = $stmt_check_event->get_result()->num_rows > 0;
        $stmt_check_event->close();

        if (!$event_exists) {
            echo "<script>alert('Event tidak valid!'); window.location='index.php';</script>";
            exit;
        }

        $total = $qty * $event['price'];

        // Gunakan prepared statement untuk INSERT
        $stmt = $conn->prepare("INSERT INTO tickets (user_id, event_id, quantity, total_price, order_date) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("iiid", $user_id, $event_id, $qty, $total);
        
        if ($stmt->execute()) {
            echo "<script>alert('Tiket berhasil dipesan!'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Gagal memesan tiket. Coba lagi!');</script>";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .event-container form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .event-container label {
            font-weight: 500;
            color: #e2e8f0;
            display: block;
            margin-bottom: 5px;
        }

        .event-container input[type="number"] {
            width: 120px;
            text-align: center;
            border-radius: 10px;
            border: 1px solid rgba(59, 130, 246, 0.4);
            background: rgba(255, 255, 255, 0.08);
            color: #e2e8f0;
            font-size: 1rem;
            padding: 8px;
            transition: all 0.3s ease;
        }

        .event-container button {
            border-radius: 10px;
            background: rgba(59, 130, 246, 0.2);
            border: 1px solid rgba(59, 130, 246, 0.5);
            color: #e2e8f0;
            font-weight: 600;
            padding: 10px 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .event-container button:hover {
            background: rgba(59, 130, 246, 0.4);
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <div class="event-container">
        <h2>Pesan Tiket: <?= htmlspecialchars($event['title']) ?></h2>
        <form method="POST">
            <label>Jumlah Tiket:</label>
            <input type="number" name="quantity" min="1" value="1" required>
            <button type="submit">Pesan Sekarang</button>
        </form>
    </div>
</body>
</html>

<?php include 'includes/footer.php'; ?>