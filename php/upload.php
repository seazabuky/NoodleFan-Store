<?php
// Include the database configuration file
include('server.php');
if (@$_SESSION["role"] != 'admin') {
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
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1471/1471262.png" />

    <!-- Tailwind And Flowbite -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

    <!-- lordicon -->
    <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
    <!-- flowbite -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/9.13.0/firebase-app.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- sweetalert2 -->

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
    <?php
    $btn_login = 'Sign in';
    $btn_icon = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block ml-1 w-4 h-4 text-white xl:inline"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
	</svg>
	';
    $id_btn = 'btn_login';
    if (isset($_SESSION['role'])) {
        $btn_login = '<a href="logout.php">Sign out</a>';
        $id_btn = 'btn_logout';
        $btn_icon = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block ml-1 w-4 h-4 text-white xl:inline"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" /></svg>';
    }
    ?>

    <!-- navbar float-->
    <div class="fixed top-0 left-0 w-full z-50">
        <nav class=" bg-gray-700 px-2 sm:px-4 py-2.5 dark:bg-transparent fixed w-full z-20 top-0 left-0  ">
            <div class="container flex flex-wrap justify-between items-center mx-auto">
                <a href="../index.php" class="flex items-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/1471/1471262.png" class="mr-3 h-6 sm:h-9" alt="NoodleFans Logo">
                    <span class="self-center text-xl font-semibold whitespace-nowrap text-white">NoodleFan Store</span>
                </a>
                <div class="flex md:order-2">
                    <!-- sign in and sign out btn -->

                    <button type="button" id="<?php echo @$id_btn ?>" class="text-white inline-block bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><?php echo @$btn_login, @$btn_icon ?></button>

                    <!-- open menu -->
                    <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul class="flex flex-col p-4 mt-4 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:bg-blue-100 lg:bg-transparent">
                        <li>
                            <a href="../pricetable.php" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-blue-500 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Product</a>
                        </li>
                        <li>
                            <a href="orderCheck.php" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-gray-50 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Order</a>
                        </li>
                        <li>
                            <a href="upload.php" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-gray-50 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Upload Image</a>
                        </li>
                        <li>
                            <a href="adminSubmitReq.php" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-gray-50 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Admin Submit</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container mx-auto pt-50">
        <div class="flex flex-col justify-center px-6 my-12">
            <div class="w-full flex">
                <div class="w-full bg-gray-50 p-5 shadow-xl ring-1 ring-gray-900/5 rounded-lg lg:rounded-l-none">
                    <p class="w-full pt-5 text-3xl pb-10 text-center font-bold leading-normal text-gray-900 dark:text-white">Upload images</p>
                    <form class="px-10 pt-6 pb-8 mb-4 bg-gray-50 rounded" action="upload_db.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">

                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload file</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="image" type="file" name="file[]" accept="image/gif,image/jpg,image/jpeg,image/png" multiple>

                            <p class="text-xs italic text-grey-500">Only JPG , JPEG , PNG , GIF file are allow to upload.</p>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">
                                Role can Access this image
                            </label>
                            <!-- select by use tailwindcss option first disable "select role" "user" "admin" -->
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="role_access" id="role_access">
                                <option selected="true" disabled="disabled">Select role</option>
                                <option value="user">User</option>
                                <option value="premium">Premium</option>
                                <option value="premium_p">Premium Plus</option>
                                <option value="commercial">Commercial</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="mb-6 pt-2 text-center">
                            <button type="button" class="w-52 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" type="submit" name="submit" value="Upload">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto">
        <div class="flex flex-col justify-center px-20 my-12 pt-20">
            <?php if (!empty(@$_SESSION["statusMsg"]) && @$_SESSION["statusMsg"] == "The file " . @$_SESSION["fileName"] . " has been uploaded successfully.") { ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline"><?php echo @$_SESSION["statusMsg"]; ?></span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
                </div>

            <?php unset($_SESSION["statusMsg"]);
                unset($_SESSION["fileName"]);
            } else if (!empty(@$_SESSION["statusMsg"])) { ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Failed!</strong>
                    <span class="block sm:inline"><?php echo @$_SESSION["statusMsg"]; ?></span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
                </div>

            <?php unset($_SESSION["statusMsg"]);
                unset($_SESSION["fileName"]);
            } ?>
            <div class="grid gap-4 grid-cols-3 grid-rows-3 ">
                <?php
                $query = $conn->query("SELECT * FROM images ORDER BY uploaded_on DESC");
                if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                        $imageURL = '../upload/' . $row["file_name"];
                        $name = $row["file_name"];
                ?>
                        <div class="img-wrap">
                            <span class="delete">&times;</span>
                            <img class="<?php echo $name ?>" src="<?php echo $imageURL; ?>" alt="" width="100%">
                        </div>
                    <?php
                    }
                } else { ?>
                    <p class="text-xl italic text-red-500">Image(s) not found...</p>
                <?php } ?>
            </div>
        </div>
    </div>
    <footer class="p-4 bg-gray-700 rounded-lg shadow md:px-6 md:py-8 dark:bg-gray-900">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="index.php" class="flex items-center mb-4 sm:mb-0">
                <img src="https://cdn-icons-png.flaticon.com/512/1471/1471262.png" class="mr-3 h-8" alt="Flowbite Logo" />
                <span class="text-gray-400 self-center text-2xl font-semibold whitespace-nowrap dark:text-white">NoodleFan</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="" class="hover:underline">NoodleFan™</a>. All Rights Reserved.
        </span>
    </footer>
    <script>
        $(document).ready(function() {
            $('.delete').click(function() {
                var el = this;
                var name = $(this).next().attr('class');
                var confirmalert = confirm("Are you sure you want to delete this image?");
                var data = {
                    name: name
                };
                if (confirmalert == true) {
                    $.ajax({
                        url: 'delete.php',
                        type: 'POST',
                        data: data,
                        success: function(response) {
                            $(el).closest('div').fadeOut(800, function() {
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
