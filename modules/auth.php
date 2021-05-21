<?php 

require('../database/connect.php');

function signUp() {
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $names = explode(" ", $name);
        $fname = $names[0];
        $lname = $names[1];

        if ($password === $c_password) {
            $mysqli = new DBCon('localhost', 'root', '', 'taskApp');
            $mysqli = $mysqli->connect();

            $password = password_hash($password, PASSWORD_DEFAULT);
            // $sql = "INSERT INTO user (`username`, `password`) VALUES (?, ?);";
            $sql = "INSERT INTO users(`first_name`, `last_name`, `dob`, `username`, `password`) values(?, ?, ?, ?, ?);";
            $stmt = mysqli_stmt_init($mysqli);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "Failed to insert data";
            } else {
                mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $dob, $username, $password);
                mysqli_stmt_execute($stmt);
                // $result = mysqli_stmt_get_result($stmt);
                echo "Record successfully inserted";
                mysqli_close($mysqli);
                header('location: ../views/login.php?message=success');
            }
        } else {
            echo "Passwords do not match";
        }
    }
}

function login() {

    if(isset($_POST['login'])) {   
        // Include config file
        $mysqli = new DBCon('localhost', 'root', '', 'taskApp');
        $mysqli = $mysqli->connect();
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT `username`, `password` FROM users where `username` = ?;";
        $stmt = mysqli_stmt_init($mysqli);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            throw new Exception("Failed to execute sql query");
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                
                if (!password_verify($password, $row['password'])) {
                    throw new Exception('Incorrect username or password');
                } else {
                    session_start();
                    $_SESSION['username'] = $row['username'];
                    mysqli_close($mysqli);
                    header('location:../views/dashboard.php');
                }
            } else {
                echo "0 results";
            }
        }
    }   
}