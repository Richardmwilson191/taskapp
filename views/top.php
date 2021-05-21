<?php
session_start();
set_exception_handler(function ($exception) {
    echo $exception->getMessage();
});

$authorized = array('dashboard.php', 'logout.php');
$unauthorized = array('signup_form.php', 'login_form.php');

$filename = basename($_SERVER['SCRIPT_FILENAME']);
if(!isset($_SESSION['username'])) {
    if(in_array($filename, $authorized)) {
        header('location: ../index.php');
    }
} else {
    if(in_array($filename, $unauthorized)) {
        header('location: ../index.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/style.css">
    <title>Task App</title>
</head>

<body>
    <header>
        <div class="custom-padding">
            <nav>
                <div class="logo">Logo</div>
                <ul class="menu-area">
                    <li><a href="home.php">Home</a></li>
                    <?php if(!isset($_SESSION['username'])) { ?>
                        <li><a href="signup_form.php">Sign Up</a></li>
                        <li><a href="login_form.php">Login</a></li>
                    <?php } ?>
                    <?php if(isset($_SESSION['username'])) { ?>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="../modules/logout.php">Logout</a></li>
                    <?php } ?>
                </ul>
            </nav>
            <h2 style="margin-top: 30px; text-align: center; ">
                <?php
                if(isset($_SESSION['username'])) {
                    echo "Hello, " . $_SESSION['username'];
                }
                ?>
            </h2>
        </div>
    </header>
    <main>