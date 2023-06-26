<?php 
include_once "../model/dbh.php";


    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $rawadding = $_POST["add"];
        if(trim(htmlspecialchars($rawadding))) {
            $adding = $rawadding;

            $stmt = $pdo->prepare("INSERT INTO todoinput(task) VALUES (?)");
            $stmt->bindParam(1, $adding);
            $stmt->execute();
        }
    }

    header("Location: ../index.php");
    exit();
    ?>

