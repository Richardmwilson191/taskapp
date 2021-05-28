<?php
require_once('../database/connect.php');
require_once('notifications.php');

function createProject()
{
    session_start();
    $mysqli = new DBCon('localhost', 'root', '', 'taskapp');
    $mysqli = $mysqli->connect();

    $p_id = $_POST['p_id'];
    $p_name = $_POST['p_name'];
    $db_id = $_POST['db_id'];
    $s_date = $_POST['s_date'];
    $e_date = $_POST['e_date'];
    $status = $_POST['status'];
    $username = $_SESSION['username'];

    $sql = "INSERT INTO project(`p_id`, `p_name`, `db_id`, `p_start_dt`, `p_end_dt`, `p_status`, `created_by`) VALUES(?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Failed to insert data";
    } else {
        mysqli_stmt_bind_param($stmt, "sssssss", $p_id, $p_name, $db_id, $s_date, $e_date, $status, $_SESSION['username']);
        if (mysqli_stmt_execute($stmt)) {
            Notice::addMessage('Project created Successfully', 'success');
            header("location:../views/dashboard.php");

            $sql2 = "INSERT INTO project_user(`p_id`, `username`) values(?, ?);";
            $stmt = mysqli_stmt_init($mysqli);
            if (!mysqli_stmt_prepare($stmt, $sql2)) {
                echo "Failed to insert data";
            } else {
                mysqli_stmt_bind_param($stmt, "ss", $p_id, $username);
                if (mysqli_stmt_execute($stmt)) {
                    Notice::addMessage('Project user created Successfully', 'success');
                    header("location:../views/dashboard.php");
                } else {
                    Notice::addMessage($mysqli->error, 'caution');
                    header("location:../views/project_form.php");
                }
            }
        } else {
            Notice::addMessage($mysqli->error, 'caution');
            header("location:../views/project_form.php");
        }
    }
    mysqli_close($mysqli);
}

if (isset($_POST['submit'])) {
    try {
        createProject();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
