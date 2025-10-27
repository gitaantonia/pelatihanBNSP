<?php
include 'config/config.php'; // koneksi database
include 'includes/header.php';

// Ambil semua event dari database
$query = "SELECT * FROM events ORDER BY date ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventGo | Temukan Event Seru!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
<!-- Hero Section -->
<div class="text-center mb-4" style="margin-top: 50px;">
    <h1 class="fw-bold" style="color: #e2e8f0;">Temukan Event Terbaik di Sekitarmu</h1>
    <p style="color: #a1a1aa;">Dari seminar teknologi hingga konser musik, semua ada di EventGo!</p>
</div>

<!-- Daftar Event -->
<div class="container mb-5">
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                        <p class="card-text"><?php echo substr($row['description'], 0, 80) . '...'; ?></p>
                        <ul class="list-unstyled small mb-3">
                            <li>📅 <?php echo date("d M Y", strtotime($row['date'])); ?></li>
                            <li>📍 <?php echo htmlspecialchars($row['location']); ?></li>
                            <li>💰 Rp <?php echo number_format($row['price'], 0, ',', '.'); ?></li>
                        </ul>
                        <a href="event_detail.php?id=<?php echo $row['id']; ?>" class="btn btn-primary w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>