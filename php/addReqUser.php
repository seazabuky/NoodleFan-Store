<?php
    session_start();
    include ('server.php');
    if(@$_SESSION["role"]!='admin'){
        header("Location:../index.php");
    }
    $_SESSION["userSubmitMsg"]="";
    
    //file path
    $targetDir = "../receipt/";

    if(isset($_POST['submit'])){
        if(!empty($_FILES["file"]["name"])&&!empty($_POST["role_req"])){
            $fileName = basename($_FILES["file"]["name"]);
            $_SESSION["fileName"]=$fileName;
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            //allow certain file formats
            $allowTypes = array('jpg','png','jpeg','JPG');
            //check if file is already exists
                if(in_array($fileType,$allowTypes)){
                    if(file_exists($targetFilePath)){
                        $_SESSION["userSubmitMsg"] = "Sorry, file already exists please change file name.";
                        header("LOCATION:userSubmitReq.php");
                    }else{
                    if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath)){
                        if($_POST["role_req"]!=$_SESSION['role']){
                        $insert = $conn->query("INSERT INTO `request`(`file_name`,`upload_on`,`username_req`,`role_req`,`current_role`) VALUES('".$fileName."',NOW(),'".$_SESSION["username"]."','".$_POST["role_req"]."','".$_SESSION["role"]."')");
                        if($insert){
                            $_SESSION["userSubmitMsg"] = "The file ".$fileName. " has been uploaded successfully.";
                            header("LOCATION:userSubmitReq.php");
                        }else{
                            $_SESSION["userSubmitMsg"] = "File upload failed, please try again.";
                            header("LOCATION:userSubmitReq.php");
                            }
                        }else{
                            $_SESSION["userSubmitMsg"] = "This account already use package you select.";
                            header("LOCATION:userSubmitReq.php");
                        }
                        }else{
                            $_SESSION["userSubmitMsg"] = "Sorry, there was an error uploading your file.";
                            header("LOCATION:userSubmitReq.php");
                        }
                    }
                }else{
                    $_SESSION["userSubmitMsg"] = "Sorry, only JPG, JPEG, PNG files are allowed to upload.";
                    header("LOCATION:userSubmitReq.php");
                }
        }else{
            $_SESSION["userSubmitMsg"] = "Please select a file or package to submit.";
            header("LOCATION:userSubmitReq.php");
        }
    
}


?>