<?php
include('../database/connect.php');
require_once('notifications.php');

function delete()
{
    session_start();
    $mysqli = new DBCon('localhost', 'root', '', 'taskApp');
    $mysqli = $mysqli->connect();
    $p_id = $_GET['id'];
    $username = $_SESSION['username'];

    $sql = "UPDATE `project_user` SET `active_flg`= 'n' WHERE p_id = ?;";
    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        Notice::addMessage($mysqli->error, 'caution');
    } else {
        mysqli_stmt_bind_param($stmt, "s", $p_id);
        mysqli_stmt_execute($stmt);
        Notice::addMessage('Project deleted Successfully', 'success');
        mysqli_close($mysqli);
        header("location:../views/show_project.php");
        die;
    }
}

delete();
