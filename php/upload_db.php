<?php
    session_start();
    include ('server.php');
    if(@$_SESSION["role"]!='admin'){
        header("Location:../index.php");
    }
    $_SESSION["statusMsg"]="";
    
    //file path
    $targetDir = "../upload/";

    if(isset($_POST['submit'])){
        if(!empty($_FILES["file"]["name"])&&!empty($_POST["role_access"])){
            $fileName = basename($_FILES["file"]["name"]);
            $_SESSION["fileName"]=$fileName;
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            //allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','JPG');
            //check if file is already exists
                if(in_array($fileType,$allowTypes)){
                    if(file_exists($targetFilePath)){
                        $_SESSION["statusMsg"] = "Sorry, file already exists.";
                        header("LOCATION:upload.php");
                    }else{
                    if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath)){
                        $insert = $conn->query("INSERT INTO images(file_name,uploaded_on,username,role_access) VALUES('".$fileName."',NOW(),'".$_SESSION["username"]."','".$_POST["role_access"]."')");
                        if($insert){
                            $_SESSION["statusMsg"] = "The file ".$fileName. " has been uploaded successfully.";
                            header("LOCATION:upload.php");
                        }else{
                            $_SESSION["statusMsg"] = "File upload failed, please try again.";
                            header("LOCATION:upload.php");
                        }
                        }else{
                            $_SESSION["statusMsg"] = "Sorry, there was an error uploading your file.";
                            header("LOCATION:upload.php");
                        }
                    }
                }else{
                    $_SESSION["statusMsg"] = "Sorry, only JPG, JPEG, PNG, GIF files are allowed to upload.";
                    header("LOCATION:upload.php");
                }
        }else{
            $_SESSION["statusMsg"] = "Please select a file or role access to upload.";
            header("LOCATION:upload.php");
        }
    
}


?>