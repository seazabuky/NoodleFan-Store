<?php
    include('server.php');
    $stmt = $conn->prepare("UPDATE `user` SET `role` = ? WHERE `username` = ?");
    $stmt->bind_param("ss",$role_req,$username);
    $username = $_POST['username'];
    $role_req = $_POST['role'];
    if($stmt->execute()){
        $_SESSION['updateSucc'] = "Update success";
        $stmt->close();
        $stmt = $conn->prepare("UPDATE `request` SET `status` = ? WHERE `id` = ?");
        $stmt->bind_param("ii",$status,$id);
        $status = 1;
        $id=$_POST['id'];
        if($stmt->execute()){
            $_SESSION['updateMsg'] = "Update success";
            $stmt->close();
            header("Location:./adminSubmitReq.php");
        }
        else{
            $_SESSION['updateMsg'] = "Update failed";
            header("Location:./adminSubmitReq.php");
        }
    }
    else{
        $_SESSION['updateMsg'] = "Update failed";
        header("Location:./adminSubmitReq.php");
    }
    $conn->close();

?>