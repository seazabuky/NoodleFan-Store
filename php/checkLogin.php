<?php
  session_start();
  include("server.php");

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
  }
  
  $sql = "SELECT * FROM user WHERE username='$username'";
  $result = $conn->query($sql);
  $pw_check = $usr_check = "";
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $usr_check = $row["username"];
        $pw_check = $row["password"];
        $_SESSION['pwddd'] = $pw_check;
        if($row["username"]==$username && password_verify($password,$pw_check)){
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;
          $role = $row['role'];
          $_SESSION['role']=$role;
        }
    }
  }
    if($role == 'admin'){
      header("Location:../index.php");
      setcookie("username", $username, time() + (86400 * 30), "/");
    }
    else if(isset($_SESSION['role'])){
      header("Location:../index.php");
      setcookie("username", $username, time() + (86400 * 30), "/");
    }else{
      if($usr_check != $username){
        $_SESSION['usrErr']="Username incorrect";

      }
      if($pw_check != $password){
        $_SESSION['pwErr']="Password incorrect";
      }
      $_SESSION['loginErr']="Login failed";
      // header("Location:../index.php");
    }
    header("Location:../index.php");
  $conn->close();

?>