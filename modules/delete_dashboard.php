<?php
include('../database/connect.php');
require_once('notifications.php');

function delete()
{
    session_start();
    $mysqli = new DBCon('localhost', 'root', '', 'taskApp');
    $mysqli = $mysqli->connect();
    $db_id = $_GET['id'];
    $username = $_SESSION['username'];

    $sql = "UPDATE `dashboard_user` SET `active_flg`= 'n' WHERE db_id = ?;";
    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        Notice::addMessage($mysqli->error, 'caution');
    } else {
        mysqli_stmt_bind_param($stmt, "s", $db_id);
        mysqli_stmt_execute($stmt);
        Notice::addMessage('Dashboard deleted Successfully', 'success');
        mysqli_close($mysqli);
        header("location:../views/show_dashboard.php");
        die;
    }
}

delete();
