<?php
require_once('../database/connect.php');
require_once('notifications.php');

function get_projects_by_dashboard($id)
{
    $mysqli = new DBCon('localhost', 'root', '', 'taskapp');
    $mysqli = $mysqli->connect();
    $username = $_SESSION['username'];

    $sql = "SELECT * from project as p join project_user as pu on p.p_id = pu.p_id where username = ? and active_flg = 'y' and db_id = ?;";
    $id = trim($id);

    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        Notice::addMessage($mysqli->error, 'caution');
    } else {
        mysqli_stmt_bind_param($stmt, 'ss', $username, $id);
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
