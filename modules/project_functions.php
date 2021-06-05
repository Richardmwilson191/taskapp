<?php
include('../database/connect.php');
require_once('notifications.php');

function addProjectUser()
{
    $mysqli = new DBCon('localhost', 'root', '', 'taskApp');
    $mysqli = $mysqli->connect();
    $username = $_POST['username'];
    $p_id = $_GET['id'];

    $sql = "INSERT INTO project_user(`p_id`, `username`) VALUES(?, ?);";
    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        Notice::addMessage($mysqli->error, 'caution');
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $p_id, $username);
        mysqli_stmt_execute($stmt);
        Notice::addMessage('User added Successfully', 'success');
        mysqli_close($mysqli);
        header("location:../views/show_project.php");
        die;
    }
}

function modifyProject()
{
    $mysqli = new DBCon('localhost', 'root', '', 'taskApp');
    $mysqli = $mysqli->connect();
    $p_id = $_GET['id'];
    $p_name = $_POST['p_name'];
    $status = $_POST['status'];

    $sql = "UPDATE project SET p_name = ?, p_status = ? where p_id = ?;";
    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        Notice::addMessage($mysqli->error, 'caution');
    } else {
        mysqli_stmt_bind_param($stmt, "sss", $p_name, $status, $p_id);
        mysqli_stmt_execute($stmt);
        Notice::addMessage('Project modified Successfully', 'success');
        mysqli_close($mysqli);
        header("location:../views/show_project.php");
        die;
    }
}
