<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "db";
$port = 3306;
$dsn = "mysql:host=" . $host . ";dbname=" . $dbname . ";port=" . $port;
$pdo = new PDO($dsn, $user, $password);