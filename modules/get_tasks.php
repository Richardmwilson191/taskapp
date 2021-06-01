<?php
require_once('../database/connect.php');
require_once('notifications.php');
function getTask()
{
    $mysqli = new DBCon('localhost', 'root', '', 'taskapp');
    $mysqli = $mysqli->connect();

    $username = $_SESSION['username'];
    $sql = "SELECT DISTINCT `task_id`, task_name, `p_id`, `p_status`, `start_date`, `end_date`, `created_by` from task where created_by = ?;";
    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        Notice::addMessage($mysqli->error, 'caution');
    } else {
        mysqli_stmt_bind_param($stmt, 's', $username);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo "You have not created any dashboards";
                die;
            }
        } else {
            Notice::addMessage($mysqli->error, 'caution');
        }
    }
}
