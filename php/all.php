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
			filter: brightness(0.5) saturate(0.5) contrast(1) blur(2px);
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

		.img-wrap:hover .material-symbols-outlined {
			opacity: 1;
		}
	</style>
</head>

<body>
	<?php
	include("server.php");
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
	<section class="bg-white dark:bg-gray-900">
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
					if ($accessLevel == "user") {
						$query = $conn->query("SELECT * FROM images where role_access = 'user'");
						if ($query->num_rows > 0) {
							while ($row = $query->fetch_assoc()) {
								$imageURL = '../upload/' . $row["file_name"];
								$id = $row["id"];
								$dis = $row["dis"];
					?>
								<div class="w-full row-2" id="warp">
									<figure class="relative max-w-sm transition-all w-full duration-300 cursor-pointer ">
										<a href="./download.php?name=<?php echo $row["file_name"] ?>"><img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-115 duration-300" id="img" /></a>
										<figcaption class="absolute bottom-6 px-4 text-lg text-white">
											<p>Do you want to get notified when a new component is added to Flowbite?</p>
											</figcatpion>
									</figure>
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
								<div class="w-full row-2" id="warp">
									<a href="./download.php?name=<?php echo $row["file_name"] ?>"><img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-115 duration-300" id="img" /></a>
									<figcaption class="absolute bottom-6 px-4 text-lg text-white border-b-gray-400">
										<p><?php echo $dis ?></p>
										</figcatpion>
								</div>
							<?php
							}
						}
					} else if ($accessLevel == "premium_p") {
						$query = $conn->query("SELECT * FROM images where role_access = 'premium' OR role_access = 'user' ");
						if ($query->num_rows > 0) {
							while ($row = $query->fetch_assoc()) {
								$imageURL = '../upload/' . $row["file_name"];
								$id = $row["id"];
								$dis = $row["dis"];

							?>
								<div class="w-full row-2" id="warp">
									<a href="./download.php?name=<?php echo $row["file_name"] ?>"><img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-115 duration-300" id="img" /></a>
									<figcaption class="absolute bottom-6 px-4 text-lg text-white border-b-gray-400">
										<p><?php echo $dis ?></p>
										</figcatpion>
								</div>
							<?php
							}
						}
					} elseif ($accessLevel == "commercial") {
						$query = $conn->query("SELECT * FROM images where role_access = 'premium' OR role_access = 'user' ");
						if ($query->num_rows > 0) {
							while ($row = $query->fetch_assoc()) {
								$imageURL = '../upload/' . $row["file_name"];
								$id = $row["id"];
								$dis = $row["dis"];

							?>
								<div class="w-full row-2" id="warp">
									<a href="./download.php?name=<?php echo $row["file_name"] ?>"><img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-115 duration-300" id="img" /></a>
									<figcaption class="absolute bottom-6 px-4 text-lg text-white border-b-gray-400">
										<p><?php echo $dis ?></p>
										</figcatpion>
								</div>
							<?php
							}
						}
					} else {
						$query = $conn->query("SELECT * FROM images ");
						if ($query->num_rows > 0) {
							while ($row = $query->fetch_assoc()) {
								$imageURL = '../upload/' . $row["file_name"];
								$id = $row["id"];
								$dis = $row["dis"];

							?>
								<div class="w-full row-2" id="warp">
									<a href="./download.php?name=<?php echo $row["file_name"] ?>"><img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-115 duration-300" id="img" /></a>
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
		</div>
	</section>


	<footer class="p-4 bg-gray-700 shadow md:px-6 md:py-8 dark:bg-gray-900">
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

</body>