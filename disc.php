<?php
session_start();
if (empty($_SESSION['user']) || empty($_SESSION['pw'])) {
    echo "<script>window.location.href='login.php'</script>";
    exit;
}
session_destroy();
echo "<script>window.location.href='login.php'</script>";