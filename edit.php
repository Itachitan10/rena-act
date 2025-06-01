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
    <div class="task-table">
        <h2>Edit Task</h2>
        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['task_id'])) {
                    $task_id = $_GET['task_id'];
                    $select = ("SELECT * FROM task_tbl WHERE task_id = ?");
                    //Prepare statement
                    $stmt = mysqli_prepare($connection, $select);
                    if ($stmt) {
                        //Bind Parameter 
                        mysqli_stmt_bind_param($stmt, "i", $task_id);
                        if (mysqli_stmt_execute($stmt)) {
                            $stmt_result = mysqli_stmt_get_result($stmt);
                            $result = mysqli_fetch_all($stmt_result, MYSQLI_ASSOC);
                            foreach ($result as $display) {
                ?>
                                <tr>
                                    <form action="update.php" method="POST">
                                        <td>
                                            <input type="hidden" name="task_id" value="<?php echo $display['task_id'] ?>">
                                            <input type="text" id="task" name="task" value="<?php echo $display['task'] ?>" placeholder="Input Value" required autocomplete="off">
                                        </td>
                                        <td>
                                            <button type="submit" id="btn-success" name="edit">Update</button>
                                            <a href="index.php"><button type="button" id="btn-cancel">Cancel</button></a>
                                        </td>
                                    </form>
                                </tr>
                <?php
                            }
                        }
                        // statement close
                        mysqli_stmt_close($stmt);
                    }
                }
                // connection close
                mysqli_close($connection);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>

