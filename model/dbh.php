<?php


$host = "localhost";
$dbname = "mytodolist";
$username = "root";
$password = "";

$dsn = "mysql:host=$host;dbname=$dbname";

try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Connectio failed. " . $e->getMessage();
    die();
} 
?>