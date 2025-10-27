<?php
session_start();
session_destroy();
header('location: home.php');

session_start();
$_SESSION['logout_alert'] = true;

header("Location: login.php");
exit();
