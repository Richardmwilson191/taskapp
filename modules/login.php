<?php
// include('top.php');
include('auth.php');
// Initialize the session

// Check if the user is already logged in, if yes then redirect him to welcome page
// echo $_SESSION['loggedin'];
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: welcome.php");
//     exit;
// }
// print_r($_SESSION);
session_start();
$_SESSION['start_time'] = date("Y-m-d H:i:s");
login();
