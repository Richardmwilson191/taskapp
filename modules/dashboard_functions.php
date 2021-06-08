<?php
include('../database/connect.php');
require_once('notifications.php');

function addDashUser()
{
    $mysqli = new DBCon('localhost', 'root', '', 'taskApp');
    $mysqli = $mysqli->connect();
    $username = $_POST['username'];
    $db_id = $_GET['id'];

    $sql = "INSERT INTO dashboard_user(`db_id`, `username`) VALUES(?, ?);";
    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        Notice::addMessage($mysqli->error, 'caution');
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $db_id, $username);
        mysqli_stmt_execute($stmt);
        Notice::addMessage('Project created Successfully', 'success');
        mysqli_close($mysqli);
        header("location:../views/show_dashboard.php");
        die;
    }
}

function modifyDashboard()
{
    $mysqli = new DBCon('localhost', 'root', '', 'taskApp');
    $mysqli = $mysqli->connect();
    $db_id = $_GET['id'];
    $db_name = $_POST['db_name'];

    $sql = "UPDATE dashboard SET db_name = ? where db_id = ?;";
    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        Notice::addMessage($mysqli->error, 'caution');
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $db_name, $db_id);
        mysqli_stmt_execute($stmt);
        Notice::addMessage('Dashboard modified Successfully', 'success');
        mysqli_close($mysqli);
        header("location:../views/show_dashboard.php");
        die;
    }
}

function delete()
{
    $mysqli = new DBCon('localhost', 'root', '', 'taskApp');
    $mysqli = $mysqli->connect();
    $db_id = $_GET['id'];
    $username = $_SESSION['username'];

    $sql = "UPDATE `dashboard_user` SET `active_flg`= 'n' WHERE db_id = ? and username = ?;";
    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        Notice::addMessage($mysqli->error, 'caution');
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $db_id, $username);
        mysqli_stmt_execute($stmt);
        Notice::addMessage('Dashboard deleted Successfully', 'success');
        mysqli_close($mysqli);
        header("location:../views/show_dashboard.php");
        die;
    }
}
