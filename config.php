<?php
$localhost = "localhost";
$username = "root";
$password = "";
$db_name = "demo_db";
$connection = mysqli_connect($localhost, $username, $password, $db_name);
if (!$connection) {
    echo mysqli_connect_errno();
}