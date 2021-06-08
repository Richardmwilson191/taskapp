<?php
include('../database/connect.php');
require_once('notifications.php');

function restore()
{
    session_start();
    $mysqli = new DBCon('localhost', 'root', '', 'taskApp');
    $mysqli = $mysqli->connect();

    $sql = "UPDATE `dashboard_user` SET `active_flg`= 'y';";
    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        Notice::addMessage($mysqli->error, 'caution');
    } else {
        mysqli_stmt_execute($stmt);
        Notice::addMessage('Dashboards Restored Successfully', 'success');
        mysqli_close($mysqli);
        header("location:../views/show_dashboard.php");
        die;
    }
}

restore();
