<?php include 'config.php';
session_start();

if (isset($_SESSION['user']) && isset($_SESSION['pw'])) {
    header('Location:index.php');
    exit;
}
if (isset($_POST['submit'])) {


    $sql = "SELECT * FROM login WHERE username=:username AND password=:password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["username" => $_POST['username'], "password" => $_POST['password']]);
    $result = $stmt->fetch();
    if ($result) {
        $_SESSION['user'] =  $_POST['username'];
        $_SESSION['pw'] = $_POST['password'];
        header('Location: home.php');
        exit;
    } else {
        echo "Login failed";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

<body>
    <div id="container">
        <h1>Welcome to login</h1>
        <br>
        <form action="" method="post">
            <label for="user">Username : </label>
            <input type="text" name="username" placeholder="Username" id="user">
            <br>
            <br>
            <label for="pw">Password :</label>
            <input type="password" name="password" placeholder="Password" id="pw">
            <br>
            <br>
            <input type="submit" name="submit" value="Login">


        </form>

    </div>

</body>
<script src="script.js"></script>


</html>