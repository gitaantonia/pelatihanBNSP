<?php
include 'config/config.php';
include 'includes/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM events WHERE id = $id");
    $event = $result->fetch_assoc();
}
?>
<div class="event-container">
    <?php if ($event): ?>
        <h2><?= htmlspecialchars($event['title']) ?></h2>
        <p><strong>Tanggal:</strong> <?= htmlspecialchars($event['date']) ?></p>
        <p><strong>Lokasi:</strong> <?= htmlspecialchars($event['location']) ?></p>
        <p><?= nl2br(htmlspecialchars($event['description'])) ?></p>
        <p><strong>Harga:</strong> Rp<?= number_format($event['price'], 0, ',', '.') ?></p>
        <a href="order_ticket.php?event_id=<?= $event['id'] ?>" class="btn">Pesan Tiket</a>
    <?php else: ?>
        <p>Event tidak ditemukan.</p>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
