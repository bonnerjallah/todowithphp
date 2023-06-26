<?php 
include_once "../model/dbh.php";

if (isset($_GET['deletetask'])) {
    $id = $_GET['deletetask'];

    try {
        $stmt = $pdo->prepare("DELETE FROM todoinput WHERE id=?");
        $stmt->execute([$id]);
        echo "Task Deleted!!";
    } catch (PDOException $e) {
        echo "Error deleting task: " . $e->getMessage();
    }
} else {
    echo "No task ID specified.";
}

header("Location: ../index.php");
    exit();
?>