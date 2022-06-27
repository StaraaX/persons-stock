<?php
include 'config.php';
session_start();
if (empty($_SESSION['user']) || empty($_SESSION['pw'])) {
    header('Location: login.php');
    exit;
} else echo "Welcome " . $_SESSION['user'];
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="persons.css">
    <title>Persons</title>
</head>

<body>
    <?php
    $sql = ' SELECT * FROM persons ORDER BY id asc';
    $stmt = $pdo->query($sql);
    ?>
    <div id="table_container">
        <table>
            <!--  -->
            <tr>
                <th class="col_number" onclick="sortTable(0)">N°</th>
                <th class="col_text" onclick="sortTable(1)">Nom</th>
                <th class=" col_text" onclick="sortTable(2)">Prenom</th>
                <th class=" col_number">Points</th>
                <th class=" col_chkbox">Select</th>
            </tr>
            <tbody>
                <form name=" formgen" method="POST" action="">
                    <?php

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td class="center"><?php echo $row['id'] ?></td>
                        <td class="center"><?php echo $row['nom'] ?></td>
                        <td class="center"><?php echo $row['prenom'] ?></td>
                        <td class="center_p"><?php echo $row['points'] ?></td>
                        <td class="center"><input type="radio" name="check" value="<?php echo $row['id'] ?>"></td>
                    </tr>
                    <?php
                    }
                    ?>
            </tbody>
        </table>


        <div id="down">
            <div id="container_summary">
                <span id="p1">0 ligne(s)</span>

                <span id="p3">Totale point(s) = 0</span>
            </div>
            <br>

            <div id="buttons">

                <input onclick="formgen.action='formUpdate.php'" type="submit" name="update" value="Modifier" id="upd">


                <input onclick="formgen.action='formAdd.php'" type="submit" name="add" value="Ajouter" id="add">


                <input onclick="formgen.action='formDelete.php'" type="submit" name="delete" value="Supprimer" id="del">


                <input onclick="formgen.action='disc.php'" type="submit" name="disc" value="Se deconnecter" id="disc">



            </div>
        </div>
    </div>

    </form>
</body>
<script src="script.js"></script>

</html>