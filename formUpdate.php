<?php
include 'config.php';
session_start();
if (empty($_SESSION['user']) || empty($_SESSION['pw'])) {
    header('Location: login.php');
    exit;
} else if (empty($_POST["check"]))
    header('Location: login.php');
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
        echo  "la ligne" + $_POST["check"] + "sera modifié :";
    ?>
    <form method="POST">
        <div>

            <label for="">Nom: </label>
            <input type="text" name="nom">
            <br>
            <label for="">Prenom: </label>
            <input type="text" name="prenom">
            <br>
            <label for="">Points: </label>
            <input type="number" name="points">
            <input type='hidden' name='check' value=" <?php echo $_POST['check'] ?>" />
            <br>
            <input type="submit" value="Ajouter">
        </div>
    </form>

    <a href="index.php">Home</a>
    <?php  }


    if (isset($_POST["check"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["points"])) {


        $id = $_POST["check"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $points = $_POST["points"];

        $sql = "UPDATE persons SET nom=:nom, prenom=:prenom, points=:points WHERE id=:id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute(["id" => $id, "nom" => $nom, "prenom" => $prenom, "points" => $points]);

        echo "<script>window.location.href='index'.php'</script>";
    }

    ?>
</body>

<script src="script.js"></script>

</html>