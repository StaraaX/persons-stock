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

    <form method="POST">
        <div>
            <label>Numero:</label>
            <input type="number" name="id">
            <br>
            <label for="">Nom: </label>
            <input type="text" name="nom">
            <br>
            <label for="">Prenom: </label>
            <input type="text" name="prenom">
            <br>
            <label for="">Points: </label>
            <input type="number" name="points">
            <br>
            <input type="submit" value="Ajouter">
        </div>
    </form>
    <a href="index.php">Home</a>

    <?php


    if (isset($_POST["id"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["points"])) {

        $id = $_POST["id"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $points = $_POST["points"];


        $sql = "INSERT INTO persons (id,nom,prenom,points) VALUES (:id,:nom,:prenom,:points) ";

        $stmt = $pdo->prepare($sql);

        $stmt->execute(["id" => $id, "nom" => $nom, "prenom" => $prenom, "points" => $points]);

        echo "<script>window.location.href='index.php'</script>";
    }
    ?>
</body>
<script src="script.js"></script>

</html>