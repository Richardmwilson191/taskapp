<?php
require_once('../database/connect.php');
require_once('notifications.php');

function get_tasks_by_project($id)
{
    $mysqli = new DBCon('localhost', 'root', '', 'taskapp');
    $mysqli = $mysqli->connect();
    $username = $_SESSION['username'];

    $sql = "SELECT * from task where p_id = ? and created_by = ?;";
    $id = trim($id);

    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        Notice::addMessage($mysqli->error, 'caution');
    } else {
        mysqli_stmt_bind_param($stmt, 'ss', $id, $username);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo "You have not created any tasks";
                die;
            }
        } else {
            Notice::addMessage($mysqli->error, 'caution');
        }
    }
}
