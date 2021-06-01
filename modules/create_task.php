<?php
require_once('../database/connect.php');
require_once('notifications.php');

function createTask()
{
    session_start();
    $mysqli = new DBCon('localhost', 'root', '', 'taskapp');
    $mysqli = $mysqli->connect();
    $created_by = $_SESSION['username'];

    $task_id = $_POST['task_id'];
    $task_name = $_POST['task_name'];
    $project_id = $_POST['p_id'];
    $status = $_POST['p_status'];
    $end_date = $_POST['end_date'];

    $sql = "INSERT into task(task_id, task_name, p_id, p_status, end_date, created_by) values(?,?,?,?,?,?)";

    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Failed to insert data" . $mysqli->error;
    } else {
        mysqli_stmt_bind_param($stmt, "ssssss", $task_id, $task_name, $project_id, $status, $end_date, $created_by);
        if (mysqli_stmt_execute($stmt)) {
            Notice::addMessage('Created Successfully', 'success');
            header("location:../views/dashboard.php");
        } else {
            Notice::addMessage($mysqli->error, 'caution');
            header("location:../views/project_form.php");
        }
    }
    mysqli_close($mysqli);
}

if (isset($_POST['submit'])) {
    createTask();
}
