<?php

session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>session_start</title>
</head>
<body>
    <h1>
        <?php
        echo $_SESSION['username'];
        ?>
    </h1>
</body>
</html>