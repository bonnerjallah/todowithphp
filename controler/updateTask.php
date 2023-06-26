<?php
include_once "../model/dbh.php";


if (isset($_GET["task_id"])) {
    $task_id = $_GET["task_id"];

    // Fetch the task with the given ID from the database
    try {
        $stmt = $pdo->prepare("SELECT * FROM todoinput WHERE id = ?");
        $stmt->execute([$task_id]);
        $task = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error fetching task: " . $e->getMessage();
        exit();
    }
} else {
    echo "Invalid request";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update the task in the database
    if (isset($_POST["update"])) {
        $updatedTask = $_POST["update"];

        try {
            $stmt = $pdo->prepare("UPDATE todoinput SET task = ? WHERE id = ?");
            $stmt->execute([$updatedTask, $task_id]);
            header("Location: ../index.php");
            exit();
        } catch (PDOException $e) {
            echo "Error updating task: " . $e->getMessage();
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Task</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 16px;
      margin: 0;
      padding: 0;
    }
    h1 {
      margin-top: 20px;
      text-align: center;
    }
    form {
      margin: 0 auto;
      max-width: 400px;
      padding: 20px;
    }
    label {
      display: block;
      margin-bottom: 10px;
    }
    input[type="text"] {
      display: block;
      font-size: 16px;
      margin-bottom: 20px;
      padding: 10px;
      width: 100%;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      border: none;
      color: white;
      cursor: pointer;
      font-size: 16px;
      padding: 10px 20px;
    }
    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
  </style>
</head>
<body>
<h1>Edit Task</h1>
  <form method="post">
    <label for="updatedTask">Task:</label>
    <input type="text" id="updatedTask" name="update" value="<?php echo $task['task']; ?>">
    <input type="hidden" name="taskId" value="<?php echo $task['id']; ?>">
    <input type="submit" value="Update Task">
  </form>
</body>
</html>