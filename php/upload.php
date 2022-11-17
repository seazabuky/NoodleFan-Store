<?php
// Include the database configuration file
    include ('server.php');
    if(@$_SESSION["role"]!='admin'){
        echo $_SESSION["role"];
        header("location:./foo.php");
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
                    <h3 class="pt-4 text-2xl text-center">Upload images</h3>
                    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" action="upload_db.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label class="block mb-3 text-sm font-bold text-gray-700" for="image">
                                Image
                            </label>
                            <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-black-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="image" type="file" name="file[]" accept="image/gif,image/jpg,image/jpeg,image/png" multiple>
                            <p class="text-xs italic text-grey-500">Only JPG , JPEG , PNG , GIF file are allow to upload.</p>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-3 text-sm font-bold text-gray-700" for="image">
                                Role can Access this image
                            </label>
                            <!-- select by use tailwindcss option first disable "select role" "user" "admin" -->
                            <select class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-black-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="role_access" id="role_access">
                                <option selected="true" disabled="disabled">Select role</option>
                                <option value="user">User</option>
                                <option value="premium">Premium</option>
                                <option value="premium_p">Premium Plus</option>
                                <option value="commercial">Commercial</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="mb-6 text-center">
                            <input class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="submit" name="submit" value="Upload">
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex flex-col">
            <?php if(!empty(@$_SESSION["statusMsg"])&&@$_SESSION["statusMsg"]=="The file ".@$_SESSION["fileName"]. " has been uploaded successfully."){?>
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline"><?php echo @$_SESSION["statusMsg"]; ?></span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
                        </div>
                        
                    <?php unset($_SESSION["statusMsg"]); unset($_SESSION["fileName"]); }else if(!empty(@$_SESSION["statusMsg"])){ ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Failed!</strong>
                        <span class="block sm:inline"><?php echo @$_SESSION["statusMsg"]; ?></span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
                    </div>
                
                <?php unset($_SESSION["statusMsg"]); unset($_SESSION["fileName"]); } ?>
                    <div class="grid gap-4 grid-cols-3 grid-rows-3 ">
                        <?php
                            $query = $conn->query("SELECT * FROM images ORDER BY uploaded_on DESC");
                            if($query->num_rows > 0){
                                while($row = $query->fetch_assoc()){
                                    $imageURL = '../upload/'.$row["file_name"];
                                    $name=$row["file_name"];
                                ?>
                                <div class="img-wrap">
                                    <span class="delete">&times;</span>
                                    <img class="<?php echo $name ?>" src="<?php echo $imageURL; ?>" alt="" width="100%">
                                </div>
                            <?php 
                                }
                            }else{ ?>
                                <p class="text-xl italic text-red-500">Image(s) not found...</p>
                          <?php } ?>
                    </div>
                </div>
        </div>
    </div>
<script>
    $(document).ready(function(){
        $('.delete').click(function(){
            var el = this;
            var name = $(this).next().attr('class');
            var confirmalert = confirm("Are you sure you want to delete this image?");
            var data = {
                name:name
            };
            if (confirmalert == true) {
                $.ajax({
                    url: 'delete.php',
                    type: 'POST',
                    data: data,
                    success: function(response){
                            $(el).closest('div').fadeOut(800,function(){
                                $(this).remove();
                            });
                    }
                });
            }
        });
    });
</script>
</body>
</html>