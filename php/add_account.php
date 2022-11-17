<?php
    session_start();
    if(isset($_SESSION['role'])){
        header("Location:../index.php");
    }
    include("server.php");
    $username = $password = $email="";
    $role = "user";
    $usrErr = $pwErr = $emailErr = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (!empty($_POST["username"])) {
            $username = $_POST["username"];
            $_SESSION["usrErr"] = "";
        }
        if (!empty($_POST["password"])) {
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $_SESSION["pwErr"] = "";
        }
        if (!empty($_POST["email"])) {
            $email = $_POST["email"];
            $_SESSION["emailErr"] = "";
        }
    }
    $sql = "SELECT * FROM user WHERE username='$username' or email='$email' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row["username"]==$username){
                $usrErr = "Username already exists";
                $_SESSION["usrErr"] = $usrErr;
            }
            if($row["email"]==$email){
                $emailErr = "Email already exists";
                $_SESSION["emailErr"] = $emailErr;
            }
        }
    }
    if($usrErr == "" && $emailErr == ""){
        $stmt = $conn->prepare("INSERT INTO `user` (`username`, `password`, `role`, `email`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss",$username,$password,$role,$email);
        if($stmt->execute()){
            $_SESSION['regisSucc'] = "Register success";
            $stmt->close();
            header("Location:../index.php");
        }
        else{
            $_SESSION['regisErr'] = "Register failed";
            header("Location:../index.php");
        }
    }else{
        $_SESSION['regisErr'] = "Register failed";
        header("Location:../index.php");
    }
    
?>