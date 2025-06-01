<?php
include('config.php');

if (isset($_POST['edit'])) {
    $task_id = trim(mysqli_real_escape_string($connection, $_POST['task_id']));
    $task = trim(mysqli_real_escape_string($connection, $_POST['task']));

    $update = ("UPDATE task_tbl SET task = ? WHERE task_id = ?");
    //Prepare statement
    $stmt = mysqli_prepare($connection, $update);

    if ($stmt) {
        //Bind Parameter 
        mysqli_stmt_bind_param($stmt, "si", $task, $task_id);
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>window.location='index.php'</script>";
        } else {
            echo "<script>alert('Ooopppss Invalid. Please try again.'); window.location='index.php'</script>";
        }
        // statement close
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('SQL Error. Please try again.'); window.location='index.php'</script>";
    }
}
// connection close
mysqli_close($connection);