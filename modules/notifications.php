<?php
class Notice
{
    public static function addMessage($message, $type = 'success')
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (!isset($_SESSION['notifications'])) {
            $_SESSION['notifications'] = [];
        }

        $_SESSION['notifications'][] = [
            'body' => $message,
            'type' => $type
        ];
    }

    public static function getMessages()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['notifications'])) {
            $messages = $_SESSION['notifications'];
            unset($_SESSION['notifications']);

            return $messages[0];
        }
    }
}
