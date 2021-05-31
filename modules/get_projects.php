<?php
require_once('../database/connect.php');
require_once('notifications.php');
function getProject()
{
    $mysqli = new DBCon('localhost', 'root', '', 'taskapp');
    $mysqli = $mysqli->connect();

    $username = $_SESSION['username'];
    $sql = "SELECT DISTINCT `db_id`, pu.p_id, `p_name`, `p_status`, `p_start_dt`, `p_end_dt`, `created_by` from project AS p JOIN project_user AS pu ON pu.p_id = p.p_id where pu.active_flg = 'y' and pu.username = ?;";
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
