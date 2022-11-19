<?php
// Include the database configuration file
    include ('server.php');
    if(!isset($_SESSION['role'])){
        $_SESSION['loginFirst']="Please login first";
        header("location:../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1471/1471262.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1471/1471262.png" />
	<!-- lordicon -->
	<script src="https://cdn.lordicon.com/qjzruarw.js"></script>
	<!-- flowbite -->
	<link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/9.13.0/firebase-app.js"></script>
	<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- sweetalert2 -->
	<!-- Swiper -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

	<link rel="stylesheet" href="CSS/App.css">
	<script src="JS/App.js"></script>
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
        include("server.php");
        $btn_login = 'Sign in';
        $btn_icon = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block ml-1 w-4 h-4 text-white xl:inline"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /></svg>';
        $id_btn = 'btn_login';
        if (isset($_SESSION['role'])) {
            $btn_login = '<a href="logout.php">Sign out</a>';
            $id_btn = 'btn_logout';
            $btn_icon = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block ml-1 w-4 h-4 text-white xl:inline"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" /></svg>';
        }

    ?>
<nav class="bg-transparent px-2 sm:px-4 py-2.5 dark:bg-transparent fixed w-full z-20 top-0 left-0  ">
			<div class="container flex flex-wrap justify-between items-center mx-auto">
				<a href="../index.php" class="flex items-center">
					<img src="https://cdn-icons-png.flaticon.com/512/1471/1471262.png" class="mr-3 h-6 sm:h-9" alt="NoodleFans Logo">
					<span class="self-center text-xl font-semibold whitespace-nowrap text-white">NoodleFan Store</span>
				</a>
                <div class="flex md:order-2">
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
							<a href="all.php" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-blue-500 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">All</a>
						</li>
						<li>
							<a href="../pricetable.php" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-blue-500 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Package</a>
						</li>
						<li>
                            <a href="orderCheck.php" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-gray-50 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Order</a>
						</li>
                        <?php if(@$_SESSION['role']=='admin'){ ?>
						<li>
							<a href="upload.php" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-gray-50 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Upload Image</a>
						</li>
						<li>
                        <a href="adminSubmitReq.php" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-gray-50 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Admin Submit</a>
						</li><?php } ?>
					</ul>
				</div>
			</div>
            <div class="absolute top-0 right-0 mr-5 mt-5">
            
            </div>
		</nav>
<div class="relative p-10 bg-gray-700">
</div>
<div class="container mx-auto pt-50">
        <div class="flex flex-col justify-center px-6">
            <div class="w-full flex">
                <div class="w-full bg-gray-50 p-5 shadow-xl ring-1 ring-gray-900/5 rounded-lg lg:rounded-l-none">
                    <h3 class="pt-4 text-2xl text-center">Select your plan</h3>
                    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" action="addReqUser.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label class="block mb-3 text-sm font-bold text-gray-700" for="image">
                                What you want package
                            </label>
                            
                            <select class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-black-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="role_req" id="role_access" onchange="topUp()">
                                <option selected="true" disabled="disabled">Select package</option>
                                <?php if($_SESSION['role']=='commercial'){?>
                                    <option selected="true" disabled="disabled">You already commercial</option>
                                <?php }elseif($_SESSION['role']=='premium_p'){?>
                                    <option value="commercial">Commercial</option>
                                <?php }elseif($_SESSION['role']=='premium'){?>
                                    <option value="premium_p">Premium Plus</option>
                                    <option value="commercial">Commercial</option>
                                <?php }else{?>
                                <option selected="true" disabled="disabled">Select package</option>
                                <option value="premium">Premium</option>
                                <option value="premium_p">Premium Plus</option>
                                <option value="commercial">Commercial</option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-3 text-sm font-bold text-gray-700" for="image">
                                Image Receipt
                            </label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:border-gray-600 dark:placeholder-gray-400 id="image" type="file" name="file" accept="image/gif,image/jpg,image/jpeg,image/png">
                            <p class="text-xs italic text-grey-500">Only JPG , JPEG , PNG file are allow to upload.</p>
                        </div>
                        <div class="mb-6 text-center">
                            <input class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="submit" name="submit" value="Upload">
                        </div>
                    </form>
                    <h3 class="pt-4 text-2xl text-center font-bold mx-5" id="payment"></h3><br>
                    <div class="hero container max-w-screen-lg mx-auto pb-10 flex">
                        <img class="mx-auto object-cover" width="40%" src="../res/promptpay.jpeg">
                    </div>
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
<script>
    function topUp() {
  var x = document.getElementById("role_access").value;
    if(x=="premium")
        document.getElementById("payment").innerHTML = "You have to pay 60 THB";
    else if(x=="premium_p")
        document.getElementById("payment").innerHTML = "You have to pay 150 THB";
    else if(x=="commercial")
        document.getElementById("payment").innerHTML = "You have to pay 3500 THB";
    
}
</script>
</body>
</html>
