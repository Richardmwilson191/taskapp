<?php
require_once('notifications.php');
function auth_check()
{
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    $authorized = array('dashboard.php', 'logout.php');
    $unauthorized = array('signup_form.php', 'login_form.php');

    $filename = basename($_SERVER['SCRIPT_FILENAME']);
    if (!isset($_SESSION['username'])) {
        if (in_array($filename, $authorized)) {
            Notice::addMessage('You must be logged in to access that page', 'caution');
            header('location: ../index.php');
            die;
        }
    } else {
        if (in_array($filename, $unauthorized)) {
            Notice::addMessage('Cannot access that page while logged in', 'caution');
            header('location: ../index.php');
            die;
        }
    }
}
