<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <style>
        form label {
            color: #cbd5e1;
            font-weight: 500;
            margin-bottom: 6px;
            display: block;
        }

        textarea {
            resize: none;
        }

        .alert-success {
            animation: fadeIn 0.6s ease-in-out;
        }

        .btn-outline-primary {
            background: rgba(59, 130, 246, 0.1);
            border-color: rgba(59, 130, 246, 0.4);
            color: #60a5fa;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: rgba(59, 130, 246, 0.3);
            color: #fff;
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.4);
        }
    </style>
</head>

<body>
    <?php
    include 'config/config.php';
    include 'includes/header.php';

    $success = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $conn->query("INSERT INTO contacts (name, email, message, created_at) 
                  VALUES ('$name', '$email', '$message', NOW())");

        $success = 'Pesan Anda telah terkirim! Kami akan segera menghubungi Anda.';
    }
    ?>

    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3" style="letter-spacing:1px;">Hubungi <span class="text-light">Kami</span></h2>
            <p class="text-secondary fs-5">Ada pertanyaan, saran, atau ingin kerja sama event? Silakan kirim pesan Anda di bawah ini.</p>
        </div>

        <!-- ✅ Alert sukses -->
        <?php if ($success): ?>
            <div class="alert alert-success text-center mx-auto" style="max-width:700px; border-radius:12px; background:rgba(59,130,246,0.15); border:1px solid rgba(59,130,246,0.4); color:#60a5fa;">
                <?= $success; ?>
            </div>
        <?php endif; ?>

        <!-- 💌 Form Kontak -->
        <div class="card mx-auto p-4" style="max-width: 700px;">
            <div class="card-body">
                <form method="POST" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan email aktif" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pesan</label>
                        <textarea class="form-control" name="message" rows="5" placeholder="Tulis pesan Anda di sini..." required></textarea>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary px-4 py-2">Kirim Pesan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- 📍 Info Tambahan -->
        <div class="text-center mt-5">
            <p class="text-secondary">Atau kunjungi kami di media sosial:</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="#" class="btn btn-outline-primary btn-sm">Instagram</a>
                <a href="#" class="btn btn-outline-primary btn-sm">Facebook</a>
                <a href="#" class="btn btn-outline-primary btn-sm">Twitter</a>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

</body>

</html>