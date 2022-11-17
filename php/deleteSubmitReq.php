<?php
session_start();
    if($_SESSION["role"] != 'admin'){
        header("Location:./foo.php");
    }else{
    include("server.php");
    $id = $_POST['id'];
    $filename = $_POST['filename'];
    $sql = "DELETE FROM `request` WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        unlink("../receipt/".$filename);
        $sql = "SELECT * FROM request";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $stmt = $conn->prepare("ALTER TABLE request AUTO_INCREMENT = 1");
            $stmt->execute();
            $stmt->close();
        }
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    header("Location:adminSubmitReq.php");
    $conn->close();
}
?>