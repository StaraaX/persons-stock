<?php
include 'config.php';
session_start();
if (empty($_SESSION['user']) || empty($_SESSION['pw'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="persons.css">
    <title>Document</title>
</head>

<body>
    <?php

    if (isset($_POST["check"])) {
    ?>

    <?php } {
        $id = $_POST["check"];

        $sql = "Delete  from persons where id=:id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute(["id" => $id]);

        echo "<script>window.location.href='index.php'</script>";
    }

    ?>
</body>

<script src="script.js"></script>

</html>