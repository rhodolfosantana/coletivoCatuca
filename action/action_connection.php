<?php

session_start();
$user = "root";
$pass = "1995";
$host = "localhost";
$db   = "coletivoCatuca";

try {

    $connection = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);

    

} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage();
}