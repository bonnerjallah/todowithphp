<?php 
$stmt = $pdo->query("SELECT * FROM todoinput");

$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>