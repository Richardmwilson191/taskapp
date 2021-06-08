<?php
session_start();

if (isset($_SESSION['username'])) {
    include('session_process.php');
    storeSession();
    session_destroy();
    header('location:../views/home.php');
} else {
    header('location:../views/login_form.php');
}
