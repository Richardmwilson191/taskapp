<?php
class DBCon
{
    private $host;
    private $user;
    private $pass;
    private $db;
    private $mysqli;

    function __construct($host, $user, $pass, $db)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
    }

    function connect()
    {
        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);

        if (!$this->mysqli) {
            die('Could not connect: ' . $this->mysqli->connect_error());
        } else {
            echo "connected successfully<br>";
        }

        return $this->mysqli;
    }
}
