<?php
  session_start();
  include("server.php");

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = MD5($_POST['password']);
  }
  
  $sql = "SELECT * FROM user WHERE username='$username' and password='$password' ";
  $result = $conn->query($sql);
  $pw_check = $usr_check = "";
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $usr_check = $row["username"];
        $pw_check = $row["password"];
        if($row["username"]==$username)
          $_SESSION['username'] = $username;
        if($row["password"]==$password)
          $_SESSION['password'] = $password;
        $role = $row['role'];
    }
  }
    if($role == 'admin'){
      $_SESSION['role'] = $role;
      header("Location:../index.php");
      setcookie("username", $username, time() + (86400 * 30), "/");
    }
    else if($role == 'user'){
      $_SESSION['role'] = $role;
      header("Location:../index.php");
      setcookie("username", $username, time() + (86400 * 30), "/");
    }else{
      if($usr_check != $username){
        $_SESSION['username']=-1;
      }
      if($pw_check != $password){
        $_SESSION['password']=-1;
      }
      // header("Location:../signin.php");
    }
  $conn->close();

?>