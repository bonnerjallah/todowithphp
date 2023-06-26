<?php 
    include_once "model/dbh.php";
    include_once "view/displayTask.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>To Do List</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <div class="header">
            <?php echo "<h1>My Projects List</h1>";?>
        </div>
        
        <div class="container">
            <div class="box1">
                <h3>
                    What I Need to Do!!
                </h3>
                <form action="controler/grabbing.php" method="post">
                    <input class="addhereBox" class="add" type="text" id="add" name="add" placeholder="Add Task">
                    <input class="bttn" type="submit" name="submit" id="submit" placeholder="ADD">
                </form>
            </div>

            <div class="done">  
                <?php 
                    if(isset($tasks)) {
                    echo '<div class="output">'; // added parent div element
                        foreach($tasks as $row) {
                            ?>
                            <div class="tablebody">
                                <div class="tasks">
                                    <input type="checkbox"><?php echo $row["task"] ?>
                                </div>
                                <div class="edit">
                                    <button><a href="/Projects/Todolist/controler/updateTask.php?task_id=<?php echo $row['id']; ?>">Edit</a></button>
                                </div>
                                <div class="delete">
                                    <button><a href="controler/deleteTask.php?deletetask=<?php echo $row['id']; ?>">Delete</a></button>
                                </div>
                            </div>
                            <?php 
                        }
                        echo '</div>'; // close parent div element
                        } else {
                        echo "No tasks found";
                    }
                ?> 
            </div>

        </div>

    </body>
</html>