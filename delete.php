<?php
include('config.php');

if (isset($_GET['task_id'])) {
    $task_id = $_GET['task_id'];

    $delete = ("DELETE FROM task_tbl WHERE task_id = ?");
    //Prepare statement
    $stmt = mysqli_prepare($connection, $delete);

    if ($stmt) {
        //Bind Parameter 
        mysqli_stmt_bind_param($stmt, "i", $task_id);
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