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

	<link rel="stylesheet" href="./CSS/App.css">

	<style>
		#card-grid:hover>#warp:not(:hover) #img {
			filter: brightness(0.5) saturate(0.25) contrast(1) blur(2px);
		}

		.img_access {
			filter: none;
		}

		.img_access:hover {
			filter: blur(2px);
			transition-duration: 0.35s;
		}

		/* text slide up when # img_access hover */

		.img_detail {
			display: none;
			opacity: 0;
			transition: 0.45s;
		}

		.img_access:hover~.img_detail {
			display: block;
			opacity: 100;
			animation: img_detail 0.45s cubic-bezier(0.65, 0, 0.35, 1) both
		}

		@keyframes img_detail {
			0% {
				transform: translateY(100px);
			}

			100% {
				transform: translateY(0px);
			}
		}

		.gradient-text {
			background: linear-gradient(-45deg, #D16BA5, #86A8E7, #5FFBF1);
			background-size: 300%;
			font-family: Arial, Helvetica, sans-serif;
			font-weight: 900;
			font-size: 100px;
			letter-spacing: -5px;
			text-transform: uppercase;
			background-clip: text;
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			animation: animated_text 5s ease-in-out infinite;
			-moz-animation: animated_text 5s ease-in-out infinite;
			-webkit-animation: animated_text 5s ease-in-out infinite;
		}

		@keyframes animated_text {
			0% {
				background-position: 0px 50%;
			}

			50% {
				background-position: 100% 50%;
			}

			100% {
				background-position: 0px 50%;
			}
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
	</style>
</head>

<body>
	<?php
	include("server.php");
	function checkRole(){
		if(isset($_SESSION['role'])){
			if($_SESSION['role'] == "admin"){
				echo $_SESSION['username'].'<span class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-md text-sm px-2 py-1 text-center ml-2 mr-2 mb-2">'.$_SESSION['role'].'</span>' ;
			}elseif($_SESSION['role'] == "user"){
				echo $_SESSION['username'].'<span class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-md text-sm px-2 py-1 text-center ml-2 mr-2 mb-2">'.$_SESSION['role'].'</span>' ;
			}elseif($_SESSION['role'] == "premium"){
				echo $_SESSION['username'].'<span class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-md text-sm px-2 py-1 text-center ml-2 mr-2 mb-2">'.$_SESSION['role'].'</span>' ;
			}elseif($_SESSION['role'] == "premium_p"){
				echo $_SESSION['username'].'<span class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 font-medium rounded-md text-sm px-2 py-1 text-center ml-2 mr-2 mb-2">premium plus</span>' ;
			}elseif($_SESSION['role'] == "commercial"){
				echo $_SESSION['username'].'<span class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-md text-sm px-2 py-1 text-center ml-2 mr-2 mb-2">'.$_SESSION['role'].'</span>' ;
			}
		}else
			echo "Please Login";
	}
	$btn_login = '<a href="../index.php?sign=sign">Sign in</a>';
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
	<nav class="relative bg-gray-700 px-2 sm:px-4 py-2.5 dark:bg-transparent w-full z-20 top-0 left-0  ">
		<div class="container flex flex-wrap justify-between items-center mx-auto">
			<a href="../index.php" class="flex items-center">
				<img src="https://cdn-icons-png.flaticon.com/512/1471/1471262.png" class="mr-3 h-6 sm:h-9" alt="NoodleFans Logo">
				<span class="self-center text-xs md:text-lg lg:text-xl font-semibold whitespace-nowrap text-white">NoodleFan Store</span>
			</a>
			<div class="flex md:order-2">
				<!-- sign in and sign out btn -->
				<div class="flex items-center p-2 text-base font-normal text-white">
               		<svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-200 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
               		<span class="flex-1 ml-3 whitespace-nowrap"> 
					<?php checkRole(); ?> </span>
				</div>
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
						<a href="" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-blue-500 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Gallery</a>
					</li>
					<li>
						<a href="../pricetable.php" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-blue-500 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Package</a>
					</li>
					<li>
						<a href="orderCheck.php" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-gray-50 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Order</a>
					</li>
					<?php if (@$_SESSION['role'] == 'admin') { ?>
							<li>
								<a href="upload.php" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-gray-50 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Upload Image</a>
							</li>
							<li>
								<a href="adminSubmitReq.php" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-gray-50 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Admin Submit</a>
							</li><?php } ?>
				</ul>
			</div>
		</div>
	</nav>
	<div class="flex flex-row justify-center">
	<aside class="w-64 basis-1/4 bg-gray-50 rounded dark:bg-gray-800" aria-label="Sidebar">
   <div class="overflow-y-auto py-4 px-3">
      <ul class="space-y-2">
         <li>
		 	<a href="" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap"> 
				<?php checkRole(); ?> </span>
            </a>
         </li>
         <li>
            <a href="./all.php?sidebar_select=all" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">All</span>
            </a>
         </li>
         <li>
            <a href="./all.php?sidebar_select=premium" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Premium</span>
            </a>
         </li>
         <li>
            <a href="./all.php?sidebar_select=premium_p" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Premium Plus</span>
            </a>
         </li>
         <li>
            <a href="./all.php?sidebar_select=commercial" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Commercial</span>
            </a>
         </li>
      </ul>
   </div>
</aside>
	<section class="bg-white dark:bg-gray-900 basis-1 grow" >
		<div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
			<h1 class="text-center font-extrabold pt-10 mt-20 text-7xl dark:text-gray-900 gradient-text">
				NoodleFan
			</h1>
			<h2 class="text-center font-bold mt-3 text-2xl dark:text-gray-900">
				PRODUCTION
			</h2>
			<div class="container lg:px-32 px-4 py-8 mx-auto items-center">
				<div class="grid grid-cols-4 grid-rows-4 grid-flow-col gap-2" id="card-grid">
					<?php $accessLevel = @$_SESSION['role'];
					if(isset($_GET["sidebar_select"])&&$_GET["sidebar_select"]!="all"){
						$sidebarSelect = $_GET["sidebar_select"];
						$sql="SELECT * FROM `images` WHERE `role_access`= ".'"'.$sidebarSelect.'"';
						$query = $conn->query($sql);
					}else
						$query = $conn->query("SELECT * FROM images");
					
					if ($accessLevel == "user") {
						if ($query->num_rows > 0) {
							while ($row = $query->fetch_assoc()) {
								$imageURL = '../upload/' . $row["file_name"];
								$id = $row["id"];
								$dis = $row["dis"];
					?>
								<?php
								if ($row["role_access"] == "user") {
								?>
									<figure class="relative max-w-sm transition-all w-full row-2 duration-300 cursor-pointer " id="warp">
										<a href="./download.php?name=<?php echo $row["file_name"] ?>"><img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-115 duration-300" id="img" /></a>
										<figcaption class="absolute bottom-6 px-4 text-lg text-white">
											<p><?php echo $row["dis"] ?></p>
											</figcatpion>
									</figure>
								<?php
								} elseif ($row["role_access"] == "admin") {
								?>
									<figure class="relative max-w-sm transition-all w-full row-2 duration-300 cursor-pointer " id="warp">
										<img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center imgHover img_access rounded hover:scale-115 duration-300" id="img" />
										<figcaption class=" absolute bottom-6 px-4 text-lg text-white img_detail">
											<p>This Image <mark class="px-1 text-white bg-red-600 rounded">Admin</mark> can access only</p>
											</figcatpion>
									</figure>
								<?php
								} elseif ($row["role_access"] == "premium") {
								?>
									<figure class="relative max-w-sm transition-all w-full row-2 duration-300 cursor-pointer " id="warp">
										<img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center imgHover img_access rounded hover:scale-115 duration-300" id="img" />
										<figcaption class=" absolute bottom-6 px-4 text-lg text-white img_detail">
											<p>This Image <mark class="px-1 text-white bg-blue-600 rounded">Premium</mark> can access only</p>
											</figcatpion>
									</figure>
								<?php
								} elseif ($row["role_access"] == "premium_p") {
								?>
									<figure class="relative max-w-sm transition-all w-full row-2 duration-300 cursor-pointer " id="warp">
										<img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center imgHover img_access rounded hover:scale-115 duration-300" id="img" />
										<figcaption class=" absolute bottom-6 px-4 text-lg text-white img_detail">
											<p>This Image <mark class="px-1 text-white bg-pink-600 rounded">Premium plus</mark> can access only</p>
											</figcatpion>
									</figure>
								<?php
								} elseif ($row["role_access"] == "commercial") {
								?>
									<figure class="relative max-w-sm transition-all w-full row-2 duration-300 cursor-pointer " id="warp">
										<img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center imgHover img_access rounded hover:scale-115 duration-300" id="img" />
										<figcaption class=" absolute bottom-6 px-4 text-lg text-white img_detail">
											<p>This Image <mark class="px-1 text-white bg-yellow-400 rounded">commercial</mark> can access only</p>
											</figcatpion>
									</figure>
								<?php
								}
								?>
							<?php
							}
						}
					} elseif ($accessLevel == "premium") {
						if ($query->num_rows > 0) {
							while ($row = $query->fetch_assoc()) {
								$imageURL = '../upload/' . $row["file_name"];
								$id = $row["id"];
								$dis = $row["dis"];
							?>
								<?php
								if ($row["role_access"] == "user" or $row["role_access"] == "premium") {
								?>
									<figure class="relative max-w-sm transition-all w-full row-2 duration-300 cursor-pointer " id="warp">
										<a href="./download.php?name=<?php echo $row["file_name"] ?>"><img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-115 duration-300" id="img" /></a>
										<figcaption class="absolute bottom-6 px-4 text-lg text-white">
											<p><?php echo $row["dis"] ?></p>
											</figcatpion>
									</figure>
								<?php
								} elseif ($row["role_access"] == "admin") {
								?>
									<figure class="relative max-w-sm transition-all w-full row-2 duration-300 cursor-pointer " id="warp">
										<img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center imgHover img_access rounded hover:scale-115 duration-300" id="img" />
										<figcaption class=" absolute bottom-6 px-4 text-lg text-white img_detail">
											<p>This Image <mark class="px-1 text-white bg-red-600 rounded">Admin</mark> can access only</p>
											</figcatpion>
									</figure>
								<?php
								} elseif ($row["role_access"] == "premium_p") {
								?>
									<figure class="relative max-w-sm transition-all w-full row-2 duration-300 cursor-pointer " id="warp">
										<img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center imgHover img_access rounded hover:scale-115 duration-300" id="img" />
										<figcaption class=" absolute bottom-6 px-4 text-lg text-white img_detail">
											<p>This Image <mark class="px-1 text-white bg-pink-600 rounded">Premium plus</mark> can access only</p>
											</figcatpion>
									</figure>
								<?php
								} elseif ($row["role_access"] == "commercial") {
								?>
									<figure class="relative max-w-sm transition-all w-full row-2 duration-300 cursor-pointer " id="warp">
										<img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center imgHover img_access rounded hover:scale-115 duration-300" id="img" />
										<figcaption class=" absolute bottom-6 px-4 text-lg text-white img_detail">
											<p>This Image <mark class="px-1 text-white bg-yellow-400 rounded">commercial</mark> can access only</p>
											</figcatpion>
									</figure>
								<?php
								}
								?>
							<?php
							}
						}
					} else if ($accessLevel == "premium_p") {
						if ($query->num_rows > 0) {
							while ($row = $query->fetch_assoc()) {
								$imageURL = '../upload/' . $row["file_name"];
								$id = $row["id"];
								$dis = $row["dis"];
							?>
								<?php
								if ($row["role_access"] == "user" or $row["role_access"] == "premium" or $row["role_access"] == "premium_p") {
								?>
									<figure class="relative max-w-sm transition-all w-full row-2 duration-300 cursor-pointer " id="warp">
										<a href="./download.php?name=<?php echo $row["file_name"] ?>"><img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-115 duration-300" id="img" /></a>
										<figcaption class="absolute bottom-6 px-4 text-lg text-white">
											<p><?php echo $row["dis"] ?></p>
											</figcatpion>
									</figure>
								<?php
								} elseif ($row["role_access"] == "admin") {
								?>
									<figure class="relative max-w-sm transition-all w-full row-2 duration-300 cursor-pointer " id="warp">
										<img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center imgHover img_access rounded hover:scale-115 duration-300" id="img" />
										<figcaption class=" absolute bottom-6 px-4 text-lg text-white img_detail">
											<p>This Image <mark class="px-1 text-white bg-red-600 rounded">Admin</mark> can access only</p>
											</figcatpion>
									</figure>
								<?php
								} elseif ($row["role_access"] == "commercial") {
								?>
									<figure class="relative max-w-sm transition-all w-full row-2 duration-300 cursor-pointer " id="warp">
										<img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center imgHover img_access rounded hover:scale-115 duration-300" id="img" />
										<figcaption class=" absolute bottom-6 px-4 text-lg text-white img_detail">
											<p>This Image <mark class="px-1 text-white bg-amber-400 rounded">commercial</mark> can access only</p>
											</figcatpion>
									</figure>
								<?php
								}
								?>
							<?php
							}
						}
					} elseif ($accessLevel == "commercial") {
						if ($query->num_rows > 0) {
							while ($row = $query->fetch_assoc()) {
								$imageURL = '../upload/' . $row["file_name"];
								$id = $row["id"];
								$dis = $row["dis"];
							?>
								<?php
								if ($row["role_access"] == "user" or $row["role_access"] == "premium" or $row["role_access"] == "premium_p" or $row["role_access"] == "commercial") {
								?>
									<figure class="relative max-w-sm transition-all w-full row-2 duration-300 cursor-pointer " id="warp">
										<a href="./download.php?name=<?php echo $row["file_name"] ?>"><img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-115 duration-300" id="img" /></a>
										<figcaption class="absolute bottom-6 px-4 text-lg text-white">
											<p><?php echo $row["dis"] ?></p>
											</figcatpion>
									</figure>
								<?php
								} elseif ($row["role_access"] == "admin") {
								?>
									<figure class="relative max-w-sm transition-all w-full row-2 duration-300 cursor-pointer " id="warp">
										<img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center imgHover img_access rounded hover:scale-115 duration-300" id="img" />
										<figcaption class=" absolute bottom-6 px-4 text-lg text-white img_detail">
											<p>This Image <mark class="px-1 text-white bg-red-600 rounded">Admin</mark> can access only</p>
											</figcatpion>
									</figure>
								<?php
								}
								?>
							<?php
							}
						}
					} else {
						if ($query->num_rows > 0) {
							while ($row = $query->fetch_assoc()) {
								$imageURL = '../upload/' . $row["file_name"];
								$id = $row["id"];
								$dis = $row["dis"];

							?>
								<div class="w-full row-2" id="warp">
									<a href="./download.php?name=<?php echo $row["file_name"] ?>"><img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-115 duration-300" id="img" /></a>
								</div>
					<?php
							}
						}
					} ?>
				</div>
			</div>
		</div>
	</section>
	</div>


	<footer class="p-4 bg-gray-700 shadow md:px-6 md:py-8 dark:bg-gray-900">
		<div class="sm:flex sm:items-center sm:justify-between">
			<a href="index.php" class="flex items-center mb-4 sm:mb-0">
				<img src="https://cdn-icons-png.flaticon.com/512/1471/1471262.png" class="mr-3 h-8" alt="Flowbite Logo" />
				<span class="text-gray-400 self-center text-2xl font-semibold whitespace-nowrap dark:text-white">NoodleFan</span>
			</a>
			<ul class="flex flex-wrap items-center mb-6 text-sm text-gray-500 sm:mb-0 dark:text-gray-400">
				<li>
					<a href="./contact.php" class="mr-4 hover:underline">Contact</a>
				</li>
				<li>
					<a href="" class="mr-4 hover:underline">About</a>
				</li>
				<li>
					<a href="" class="mr-4 hover:underline">Privacy Policy</a>
				</li>
				<li>
					<a href="" class="mr-4 hover:underline">Licensing</a>
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

</body>