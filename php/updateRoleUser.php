<?php
    include('server.php');
    $stmt = $conn->prepare("UPDATE `user` SET `role` = ? WHERE `username` = ?");
    $stmt->bind_param("ss",$role_req,$username);
    $username = $_POST['username'];
    $role_req = $_POST['role_req'];
    $filename=$_POST['$filename'];
    if($stmt->execute()){
        $_SESSION['updateSucc'] = "Update success";
        $stmt->close();
        $stmt = $conn->prepare("UPDATE `request` SET `status` = ? ,`approved_by` = ? WHERE `id` = ?");
        $stmt->bind_param("isi",$status,$approved_by,$id);
        $status = 1;
        $approved_by = $_POST['approved_by'];
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