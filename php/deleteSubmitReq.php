<?php
session_start();
    if($_SESSION["role"] != 'admin'){
        header("Location:./foo.php");
    }else{
    include("server.php");
    $id = $_POST['id'];
    $sql = "DELETE FROM `request` WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    header("Location:adminSubmitReq.php");
    $conn->close();
}
?>