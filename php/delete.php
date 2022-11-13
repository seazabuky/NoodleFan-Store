<?php
session_start();
    if($_SESSION["role"] != 'admin'){
        header("Location:foo.php");
    }else{
    include("server.php");
    $file_pointer = $name = $_POST['name'];
    $_SESSION['namee'] = $name;
    
    $sql = "DELETE FROM images WHERE file_name='$name'";
    if ($conn->query($sql) === TRUE) {
        if (unlink("../upload/".$file_pointer)) {
            $_SESSION["statusMsg"] = "The file ".$fileName. " has been remove successfully.";
            header("Location:upload.php");
        }
        else {
            $_SESSION["statusMsg"] = "Sorry, there was an error removing your file.";
            header("Location:upload.php");
        }
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
}
?>