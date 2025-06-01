<?php
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="design.css">
</head>

<body>
    <h1 style="text-align: center; color:black;">renalyn padlan</h1>
    <div class="box">
        <h1>ITP2 Task Form</h1>
        <form action="insert.php" method="POST">
            <input type="text" id="task" name="task" placeholder="Input Task" autocomplete="off" required>
            <button type="submit" id="btn" name="submit">Add Task</button>
        </form>
    </div>
    <div class="task-table">
        <h2>Task List Table</h2>
        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select = ("SELECT * FROM task_tbl");
                $check_query = mysqli_query($connection, $select);
                foreach ($check_query as $display) {
                ?>
                    <tr>
                        <td><?php echo $display['task']; ?></td>
                        <td><?php echo $display['date']; ?></td>
                        <td>
                            <a href="edit.php?task_id=<?php echo $display['task_id']?>">
                                <button type="button" id="btn-success">Edit</button>
                            </a>
                            <a href="delete.php?task_id=<?php echo $display['task_id']?>"
                            onclick="return confirm('Are you sure you want to delete this task?');">
                                <button type="button" id="btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>