<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>NoodleFan Store</title>

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        #card-grid:hover>#warp:not(:hover)#img {
			filter: brightness(0.5) saturate(0.5) contrast(1) blur(2px);
		}
        .img-wrap {
            position: relative;
            display: inline-block;
            font-size: 0;
        }

        .img-wrap .material-symbols-outlined {
            position: absolute;
            bottom: 5px;
            right: 2px;
            z-index: 100;
            padding: 0px 2px 2px;
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

        .img-wrap:hover .material-symbols-outlined {
            opacity: 1;
        }
    </style>
</head>
<body>
<?php
    include("server.php");
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
							<a href="#" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-blue-500 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">All</a>
						</li>
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
    <div class="container lg:px-32 px-4 py-8 mx-auto items-center">
        <div class="grid grid-cols-4 grid-rows-4 grid-flow-col gap-2 ">
		<?php $accessLevel = @$_SESSION['role']; if ($accessLevel == "user") {
            $query = $conn->query("SELECT * FROM images where role_access = 'user'");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                    $imageURL = '../upload/' . $row["file_name"];
                    $id = $row["id"];
                    $dis = $row["dis"];
                    
                
                ?>
					 <div class="img-wrap">
                            <span class="material-symbols-outlined">download</span>
                            <img src=<?php echo $imageURL ?> class="<?php echo $name ?> inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-115 duration-300" id="img" />
                            <figcaption class="absolute bottom-6 px-4 text-lg text-white border-b-gray-400">
					            <p><?php echo $dis ?></p>
					        </figcatpion>
                        </div>
				<?php
					}
                }
        } elseif ($accessLevel == "premium") {
            $query = $conn->query("SELECT * FROM images where role_access = 'premium' OR role_access = 'user' ");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                    $imageURL = '../upload/' . $row["file_name"];
                    $id = $row["id"];
					$dis = $row["dis"];
                
                ?>
                <div class="img-wrap">
                            <span class="material-symbols-outlined">download</span>
                            <img src=<?php echo $imageURL ?> class="<?php echo $name ?> inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-115 duration-300" id="img" />
                            <figcaption class="absolute bottom-6 px-4 text-lg text-white border-b-gray-400">
					            <p><?php echo $dis ?></p>
					        </figcatpion>
                        </div>
            <?php
                }
            }
        }else if ($accessLevel == "premium_p") {
            $query = $conn->query("SELECT * FROM images where role_access = 'premium' OR role_access = 'user' ");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                    $imageURL = '../upload/' . $row["file_name"];
                    $id = $row["id"];
					$dis = $row["dis"];
                
                ?>
                <div class="img-wrap">
                            <span class="material-symbols-outlined">download</span>
                            <img src=<?php echo $imageURL ?> class="<?php echo $name ?> inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-115 duration-300" id="img" />
                            <figcaption class="absolute bottom-6 px-4 text-lg text-white border-b-gray-400">
					            <p><?php echo $dis ?></p>
					        </figcatpion>
                        </div>
            <?php
                }
            }
        }elseif ($accessLevel == "commercial") {
            $query = $conn->query("SELECT * FROM images where role_access = 'premium' OR role_access = 'user' ");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                    $imageURL = '../upload/' . $row["file_name"];
                    $id = $row["id"];
					$dis = $row["dis"];
                
                ?>
                <div class="img-wrap">
                            <span class="material-symbols-outlined">download</span>
                            <img src=<?php echo $imageURL ?> class="<?php echo $name ?> inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-115 duration-300" id="img" />
                            <figcaption class="absolute bottom-6 px-4 text-lg text-white border-b-gray-400">
					            <p><?php echo $dis ?></p>
					        </figcatpion>
                        </div>
            <?php
                }
            }
        }
        else {
            $query = $conn->query("SELECT * FROM images ");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                    $imageURL = '../upload/' . $row["file_name"];
                    $id = $row["id"];
					$dis = $row["dis"];
                
                ?>
                <div class="img-wrap">
                            <span class="material-symbols-outlined">download</span>
                            <a href="./download.php?name=<?php echo $row["file_name"] ?>"><img src=<?php echo $imageURL ?> id="img" class="<?php echo $row["file_name"] ?>"/></a>
                            <figcaption class="absolute bottom-6 px-4 text-lg text-white border-b-gray-400">
					            <p><?php echo $dis ?></p>
					        </figcatpion>
                        </div>
            <?php
                }
            }
        } ?>
            </div>
		</div>
        <div id="sign-in-popup" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
		<div class="flex items-center justify-center h-screen px-10 py-8 mx-auto md:h-screen lg:py-0">
			<div class="bg-white rounded-lg shadow w-auto dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
				<div class="p-10 space-y-4 md:space-y-6 sm:p-8">
					<div class="flex justify-between space-x-6 pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
						<h2 class="text-2xl mb-1 font-bold leading-tight tracking-tight text-blue-600 md:text-2xl dark:text-white">
							Sign in to your account
						</h2>
						<button type="button" id="close" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
							<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
							</svg>
							<span class="sr-only">Close</span>
						</button>
					</div>

					<?php if (!empty(@$_SESSION["regisSucc"])) { ?>
						<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
							<strong class="font-bold">Success!</strong>
							<span class="block sm:inline"><?php echo @$_SESSION["regisSucc"]; ?></span>
							<span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
						</div>
					<?php 
					} ?>
					<form class="space-y-4 md:space-y-6" action="checkLogin.php" method="POST">
						<label for="user-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your username</label>
						<span class="text-red-600"><?php echo @$_SESSION['usrErr'];
													unset($_SESSION['usrErr']); ?></span>
						<div class="relative">
							<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-400">
									<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path>
								</svg>
							</div>
							<input type="text" name="username" id="user-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username" required="" value="<?php if (isset($_COOKIE['username'])) {
																																																																																																				echo $_COOKIE['username'];
																																																																																																			} ?>">
						</div>
						<label for="key-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
						<span class="text-red-600"><?php echo @$_SESSION['pwErr'];
													unset($_SESSION['pwErr']); ?></span>
						<div class="relative">
							<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-400">
									<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z"></path>
								</svg>
							</div>
							<input type="password" name="password" id="key-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="••••••••" required="">
						</div>
						<button type="submit" class="w-full text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">Sign in</button>
						<p class="text-sm font-light text-gray-500 dark:text-gray-400">
							Don’t have an account yet? <a id="regis_btn" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Sign up</a>
						</p>

						<?php
						// if username and password is incorrect swal alert
						if (isset($_SESSION['loginErr'])) {
							echo "<script>Swal.fire({
									icon: 'error',
									title: 'Oops...',
									text: 'Username or password is incorrect!'
								}).then((result) => {
									document.getElementById('sign_btn').click();
								})</script>";

							unset($_SESSION['loginErr']);
						}
						?>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="register-popup" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
		<div class="flex items-center justify-center h-screen px-6 py-8 mx-auto md:h-screen lg:py-0">
			<div class="bg-white rounded-lg shadow w-auto dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
				<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
					<div class="flex justify-between space-x-6 pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
						<h2 class="text-2xl mb-1 font-bold leading-tight tracking-tight text-blue-600 md:text-2xl dark:text-white">
							Create your account
						</h2>
						<button type="button" id="close2" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
							<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
							</svg>
							<span class="sr-only">Close</span>
						</button>
					</div>
					<?php if (!empty(@$_SESSION["regisFail"])) { ?>
						<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
							<strong class="font-bold">Failed!</strong>
							<span class="block sm:inline"><?php echo @$_SESSION["regisFail"]; ?></span>
							<span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
						</div>

					<?php
					} ?>
					<form class="space-y-4 md:space-y-6" action="add_account.php" method="POST">
						<label for="user-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your username</label>
						<span class="text-red-600"><?php if(isset($_SESSION['usrErrRegis'])){ echo @$_SESSION['usrErrRegis'];unset($_SESSION['usrErrRegis']);} ?></span>
						<div class="relative">
							<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-400">
									<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path>
								</svg>
							</div>
							<input type="text" name="username" id="user-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username" required="">

						</div>

						<label for="key-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
						<span class="text-red-600"><?php  if(isset($_SESSION['pwErrRegis'])){echo $_SESSION['pwErrRegis'];unset($_SESSION['pwErrRegis']);} ?></span>
						<div class="relative">
							<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-400">
									<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z"></path>
								</svg>
							</div>
							<input type="password" name="password" id="key-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="••••••••" required="">
						</div>
						<label for="mail-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
						<span class="text-red-600"><?php if(isset($_SESSION['emailErrRegis'])){echo @$_SESSION['emailErrRegis'];unset($_SESSION['emailErrRegis']);} ?></span>
						<div class="relative">
							<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-400">
									<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
								</svg>

							</div>
							<input type="email" name="email" id="mail-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="example@gmail.com" required="">
						</div>
						<button type="submit" class="w-full text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">Create Account</button>
						<p class="text-sm font-light text-gray-500 dark:text-gray-400">
							Already have an account. <a id="sign_btn" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Sign in</a>
						</p>

						<?php
						if (isset($_SESSION['regisSucc'])) {
							echo "<script>Swal.fire({
								icon: 'success',
								title: 'Registration Success',
								text: 'Please Login',
							}).then((result) => {
								document.getElementById('sign_btn').click();
							})</script>";
							unset($_SESSION['regisSucc']);
						} elseif (isset($_SESSION['regisFail'])) {
							echo "<script>
							Swal.fire({
								icon: 'error',
								title: 'Something Wrong',
								text: 'Please try again',
							}).then((result) => {
								document.getElementById('regis_btn').click();
							})</script>";
							unset($_SESSION['regisFail']);
						}
						?>
					</form>
				</div>
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
		// if user click sign-in-btn change to id to sign-out-btn
		var signInBtn = document.getElementById('btn_login');
		var signOutBtn = document.getElementById('btn_logout');
		const modalSignIn = document.getElementById('sign-in-popup');
		const modalRegister = document.getElementById('register-popup');

		// get a element in modal sign in by id
		var regisBtnModal = document.getElementById('regis_btn');
		var signBtnModal = document.getElementById('sign_btn');
		const SignInModal = new Modal(modalSignIn, {
			placement: 'center'
		});

		const RegisterModal = new Modal(modalRegister, {
			placement: 'center'
		});

		signInBtn.addEventListener('click', function() {
			SignInModal.show();
			RegisterModal.hide();
			// set html style to overflow hidden to prevent scrolling
			document.getElementsByTagName('html')[0].style.overflow = 'hidden';
		});

		regisBtnModal.addEventListener('click', function() {
			SignInModal.hide();
			RegisterModal.show();
			// set html style to overflow hidden to prevent scrolling
			document.getElementsByTagName('html')[0].style.overflow = 'hidden';
		});
		signBtnModal.addEventListener('click', function() {
			SignInModal.show();
			RegisterModal.hide();
			// set html style to overflow hidden to prevent scrolling
			document.getElementsByTagName('html')[0].style.overflow = 'hidden';
		});

		const closemodalSignIn = document.getElementById('close');
		closemodalSignIn.addEventListener('click', function() {
			SignInModal.hide();
			document.getElementsByTagName('html')[0].style.overflow = 'scroll';
		});

		const closemodalRegister = document.getElementById('close2');
		closemodalRegister.addEventListener('click', function() {
			RegisterModal.hide();
			document.getElementsByTagName('html')[0].style.overflow = 'scroll';
		});
	</script>

<script>
        // $(document).ready(function() {
        //     $('#img').click(function() {
        //         var el = this;
        //         var name = $(this).next().attr('class');
		// 		window.location.href = "download.php?name=" + name;
		// 	});
            
		// });
    </script>
</body>