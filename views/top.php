<?php
include('../modules/auth_check.php');
require_once('../modules/notifications.php');
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
set_exception_handler(function ($exception) {
    echo $exception->getMessage();
});

auth_check();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Task App</title>
</head>

<body>
    <header>
        <div class="custom-padding">
            <nav>
                <div class="logo">RJ<span>SS</span></div>
                <ul class="menu-area">
                    <li><a href="home.php">Home</a></li>
                    <?php if (!isset($_SESSION['username'])) { ?>
                        <li><a href="signup_form.php">Sign Up</a></li>
                        <li><a href="login_form.php">Login</a></li>
                    <?php } ?>
                    <?php if (isset($_SESSION['username'])) { ?>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="../modules/logout.php">Logout</a></li>
                    <?php } ?>
                </ul>
            </nav>
            <h2 style="margin-top: 30px; text-align: center; color:antiquewhite ">
                <?php
                if (isset($_SESSION['username'])) {
                    echo "Welcome, " . $_SESSION['username'];
                }
                ?>
            </h2>
        </div>
    </header>
    <main>
        <?php $message = Notice::getMessages(); ?>
        <?php if (isset($message)) : ?>
            <div class="<?= $message['type'] ?>">
                <?= $message['body'] ?>
            </div>
        <?php endif; ?>