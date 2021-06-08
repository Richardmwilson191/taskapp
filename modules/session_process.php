<?php
include('../database/connect.php');

function storeSession()
{
    date_default_timezone_set('America/Jamaica');
    $username = $_SESSION['username'];
    $_SESSION['started'] = $_SERVER['REQUEST_TIME'];
    $session_start_time = $_SERVER['REQUEST_TIME'];
    // $session_start_time = date('d M Y H:i:s', $_SESSION['started']);
    // $requestTime = new DateTime("@$_SERVER[REQUEST_TIME]");
    // $requestTime = $requestTime->getTimestamp();
    $request_time = $_SESSION['start_time'];

    $mysqli = new DBCon('localhost', 'root', '', 'taskApp');
    $mysqli = $mysqli->connect();

    $sql = "INSERT INTO session(`username`, `start_time`) values('$username', '$request_time');";

    if ($mysqli->query($sql)) {
        echo "Session registered";
    } else {
        echo "Error inserting recording";
    }

    $mysqli = null;
    // header('location:index.php');
}
