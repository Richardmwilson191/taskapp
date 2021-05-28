<?php
include('../database/connect.php');

function createDashboard()
{
    session_start();
    $mysqli = new DBCon('localhost', 'root', '', 'taskApp');
    $mysqli = $mysqli->connect();
    $db_id = $_POST['db_id'];
    $db_name = $_POST['db_name'];
    $username = $_SESSION['username'];

    $sql = "SELECT `db_id` FROM dashboard where `db_id` = ?;";
    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        throw new Exception("Failed to execute sql query");
    }
    mysqli_stmt_bind_param($stmt, "s", $db_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("The database id entered already exists")</script>';
        // header('location:../views/dashboard.php');
    } else {
        $sql = "INSERT INTO dashboard(`db_id`, `db_name`, `created_by`) VALUES(?, ?, ?);";
        $stmt = mysqli_stmt_init($mysqli);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Failed to insert data";
        } else {
            mysqli_stmt_bind_param($stmt, "sss", $db_id, $db_name, $username);
            mysqli_stmt_execute($stmt);
            echo "Record successfully inserted";
            header("location:../views/dashboard.php");

            $sql2 = "INSERT INTO dashboard_user(`db_id`, `username`) values(?, ?);";
            $stmt = mysqli_stmt_init($mysqli);
            if (!mysqli_stmt_prepare($stmt, $sql2)) {
                echo "Failed to insert data";
            } else {
                mysqli_stmt_bind_param($stmt, "ss", $db_id, $username);
                mysqli_stmt_execute($stmt);
                echo "Record successfully inserted";
                header("location:../views/dashboard.php");
            }
            mysqli_close($mysqli);
            // header('location: ../views/dashboard.php?message=success');
        }
    }
}

if (isset($_POST['submit'])) {
    try {
        createDashboard();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
