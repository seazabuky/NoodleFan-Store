<?php
    session_start();
    if($_SESSION["role"] != 'admin' && $_SESSION["role"] != 'user'){
        header("Location:../signin.php");
    }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "noodlefan";
    // $servername = "10.1.3.40";
    // $username = "64102010078";
    // $password = "64102010078";
    // $dbname = "64102010078";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    ?>