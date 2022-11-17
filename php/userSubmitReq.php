<?php
// Include the database configuration file
    include ('server.php');
    if(!isset($_SESSION['role'])){
        header("location:./index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Upload images</title>
    <style>
        .img-wrap {
    position: relative;
    display: inline-block;
    font-size: 0;
    }
    .img-wrap .delete {
        position: absolute;
        top: 2px;
        right: 2px;
        z-index: 100;
        background-color: #FFF;
        padding: 5px 2px 2px;
        color: #000;
        font-weight: bold;
        cursor: pointer;
        opacity: 0.2;
        text-align: center;
        font-size: 2rem;
        line-height: 10px;
        height: 4%;
        border-radius: 50%;
    }
    .img-wrap:hover .delete {
    opacity: 1;
    }
    </style>
</head>
<body>
    <div class="container mx-auto">
        <div class="flex flex-col justify-center px-6 my-12">
            <div class="w-full flex">
                <div class="w-full bg-white p-5 rounded-lg lg:rounded-l-none">
                    <h3 class="pt-4 text-2xl text-center">Select your plan</h3>
                    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" action="addReqUser.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label class="block mb-3 text-sm font-bold text-gray-700" for="image">
                                What you want package
                            </label>
                            <!-- select by use tailwindcss option first disable "select role" "user" "admin" -->
                            <select class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-black-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="role_req" id="role_access">
                                <option selected="true" disabled="disabled">Select package</option>
                                <option value="premium">Premium</option>
                                <option value="premium_p">Premium Plus</option>
                                <option value="commercial">Commercial</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-3 text-sm font-bold text-gray-700" for="image">
                                Image Receipt
                            </label>
                            <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-black-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="image" type="file" name="file" accept="image/gif,image/jpg,image/jpeg,image/png">
                            <p class="text-xs italic text-grey-500">Only JPG , JPEG , PNG file are allow to upload.</p>
                        </div>
                        <div class="mb-6 text-center">
                            <input class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="submit" name="submit" value="Upload">
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex flex-col">
            <?php if(!empty(@$_SESSION["userSubmitMsg"])&&@$_SESSION["userSubmitMsg"]=="The file ".@$_SESSION["fileName"]. " has been uploaded successfully."){?>
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline"><?php echo @$_SESSION["userSubmitMsg"]; ?></span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
                        </div>
                        
                    <?php unset($_SESSION["userSubmitMsg"]); unset($_SESSION["fileName"]); }else if(!empty(@$_SESSION["userSubmitMsg"])){ ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Failed!</strong>
                        <span class="block sm:inline"><?php echo @$_SESSION["userSubmitMsg"]; ?></span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
                    </div>
                
                <?php unset($_SESSION["userSubmitMsg"]); unset($_SESSION["fileName"]); } ?>
            </div>
        </div>
    </div>
</body>
</html>