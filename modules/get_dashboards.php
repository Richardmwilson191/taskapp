<?php
require_once('../database/connect.php');
function getDashboard()
{
    $mysqli = new DBCon('localhost', 'root', '', 'taskapp');
    $mysqli = $mysqli->connect();

    $username = $_SESSION['username'];
    // $sql = "SELECT * FROM `dashboard` where `created_by` = ?;";
    $sql = "SELECT DISTINCT d.db_id, `db_name`, `created_by` from dashboard AS d JOIN dashboard_user AS du ON du.db_id = d.db_id where du.active_flg = 'y' and du.username = ?;";

    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        throw new Exception("Failed to execute sql query " . $mysqli->error);
    } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            // $row = mysqli_fetch_assoc($result);
            // while ($row = mysqli_fetch_assoc($result)) {
            //     echo "<li>" . $row['db_name'] . "</li>";
            // }
            return $result;

            // if (!password_verify($password, $row['password'])) {
            //     $_SESSION['message'] = "Incorrect username or password";
            //     header('location:index.php');
            //     die;
            // } else {
            //     session_start();
            //     $_SESSION['username'] = $row['username'];
            //     header('location:resume.php');
            // }
        } else {
            echo "You have not created any dashboards";
            // $_SESSION['message'] = "Incorrect username or password";
            // header('location:index.php');
            die;
        }
    }
}
