<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>NoodleFan Store</title>

	<link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1471/1471262.png" />
	<!-- tailwindcss -->
	<link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

	<!-- elements -->

	<!-- flowbite -->
	<link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/9.13.0/firebase-app.js"></script>
	<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- sweetalert2 -->
	<!-- Swiper -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

	<link rel="stylesheet" href="CSS/App.css">
	<script src="JS/App.js"></script>

	<style>
		.swiper-button-prev,
		.swiper-button-next {
			--swiper-theme-color: #ffffff;
			--swiper-navigation-size: 1.5rem;
			--swiper-navigation-offset: 0.5rem;
			--swiper-navigation-opacity: 0.25;
			padding-left: 1em;
			padding-right: 1em;
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

		#card-grid:hover>#warp:not(:hover) #img {
			filter: brightness(0.5) saturate(0.5) contrast(1.2) blur(20px);
		}
	</style>
</head>

<body class="bg-white dark:bg-gray-900">
	<?php
	session_start();
	$btn_login = '<a href="signin.php" >Sign in</a>';
	if (@$_SESSION["role"] == 'admin' || @$_SESSION["role"] == 'user') {
		$btn_login = '<a href="./php/logout.php" >Sign out</a>';
	}
	?>
	<!-- navbar float-->
	<div class="fixed top-0 left-0 w-full z-50">
		<!-- create navbar  -->
		<nav class="bg-transparent px-2 sm:px-4 py-2.5 dark:bg-transparent fixed w-full z-20 top-0 left-0  ">
			<div class="container flex flex-wrap justify-between items-center mx-auto">
				<a href="https://flowbite.com/" class="flex items-center">
					<img src="https://cdn-icons-png.flaticon.com/512/1471/1471262.png" class="mr-3 h-6 sm:h-9" alt="NoodleFans Logo">
					<span class="self-center text-xl font-semibold whitespace-nowrap text-white">NoodleFan Store</span>
				</a>
				<div class="flex md:order-2">
					<button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><?php echo @$btn_login ?></button>
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
							<a href="#" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-blue-500 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Product</a>
						</li>
						<li>
							<a href="#" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-gray-50 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">About</a>
						</li>
						<li>
							<a href="./php/upload.php" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-gray-50 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Upload Image</a>
						</li>
						<li>
							<a href="#" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-gray-50 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Contact</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<div class="swiper headerSwiper">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<img src="res/_SAL9154.JPG" alt="avatar" />
				<figcaption class="absolute bottom-6 px-4 text-lg text-white">
					<p>DJI Avatar</p>
				</figcatpion>
			</div>
			<div class="swiper-slide">
				<img src="res/LUA_9514.JPG" alt="mavic 3 pro" />
			</div>
			<div class="swiper-slide">
				<img src="res/_SAL7726.JPG" alt="t40" />
			</div>
			<div class="swiper-slide" id="rs3content">
				<img src="https://dji-official-fe.djicdn.com/cms/uploads/d41bdcbde3489b373c77b4137a9281d5@origin.jpg" alt="rs3" />

			</div>
		</div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
	</div>


	<!-- Main content -->
	<section class="overflow-hidden text-gray-700 mb-60">
		<h1 class="text-center font-extrabold mt-20 text-7xl dark:text-gray-900 gradient-text">
			LUNAR ARTEMIS
		</h1>
		<h2 class="text-center font-bold mt-3 text-2xl dark:text-gray-900">
			PHOTOGRAPHY
		</h2>
		<div class="container lg:px-32 px-4 py-8 mx-auto items-center">
			<div class="grid grid-cols-4 grid-rows-4 grid-flow-col gap-2" id="card-grid">
				<div class="w-full row-span-2" id="warp">
					<img src="/res/IMGHost/LUA-24.JPG" class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-110 duration-300" id="img" />
				</div>
				<div class="w-full col-span-2 row-span-2" id="warp">
					<img src="/res/IMGHost/_LUA0354.JPG" class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-110 duration-300" id="img" />
				</div>
				<div class="w-full" id="warp">
					<img src="/res/IMGHost/LUA_9917.JPG" class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-125 duration-300" id="img" />
				</div>
				<div class="w-full" id="warp">
					<img src="/res/IMGHost/_LUA0874.JPG" class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-125 duration-300" id="img" />
				</div>
				<div class="w-full col-span-2 row-span-2" id="warp">
					<img src="/res/IMGHost/000040.JPG" class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-110 duration-300" id="img" />
				</div>

				<div class="w-full col-span-2" id="warp">
					<img src="/res/IMGHost/IMG_3016.JPG" class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-125 duration-300" id="img" />
				</div>
				<div class="w-full" id="warp">
					<img src="/res/IMGHost/IMG_7244.JPG" class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-125 duration-300" id="img" />
				</div>
				<div class="w-full" id="warp">
					<img src="res/IMGHost/IMG_2338.JPG" class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-125 duration-300" id="img" />
				</div>
			</div>
		</div>
	</section>

	<!-- dark mode script -->
	<script>
		var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
		var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

		// Change the icons inside the button based on previous settings
		if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
			themeToggleLightIcon.classList.remove('hidden');
		} else {
			themeToggleDarkIcon.classList.remove('hidden');
		}

		var themeToggleBtn = document.getElementById('theme-toggle');

		themeToggleBtn.addEventListener('click', function() {

			// toggle icons inside button
			themeToggleDarkIcon.classList.toggle('hidden');
			themeToggleLightIcon.classList.toggle('hidden');

			// if set via local storage previously
			if (localStorage.getItem('color-theme')) {
				if (localStorage.getItem('color-theme') === 'light') {
					document.documentElement.classList.add('dark');
					localStorage.setItem('color-theme', 'dark');
				} else {
					document.documentElement.classList.remove('dark');
					localStorage.setItem('color-theme', 'light');
				}

				// if NOT set via local storage previously
			} else {
				if (document.documentElement.classList.contains('dark')) {
					localStorage.setItem('color-theme', 'light');
				} else {
					localStorage.setItem('color-theme', 'dark');
				}
			}
		});
	</script>

	<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
	<script>
		var swiper = new Swiper(".headerSwiper", {
			slidesPerView: 1,
			spaceBetween: 30,
			effect: "fade",
			lazy: true,
			loop: true,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
		});
	</script>

	<script>
		// when scroll to bottom of page chage nav bg to white
		window.onscroll = function() {
			var nav = document.getElementsByTagName('nav')[0];
			if (window.scrollY > 0) {
				nav.classList.add('bg-white');
				nav.classList.remove('bg-transparent');
				// Set font color to black in child elements of nav not including sign in button

				// get button tag in nav
				var btn = document.getElementsByTagName('button')[0];
				var navChildElements = nav.getElementsByTagName('*');
				for (var i = 0; i < navChildElements.length; i++) {
					if (navChildElements[i].classList.contains('text-white')) {
						navChildElements[i].classList.remove('text-white');
						navChildElements[i].classList.add('text-black');
					}
				}
				btn.classList.add('text-white');

			} else {
				nav.classList.remove('bg-white');
				nav.classList.add('bg-transparent');
				// Set font color to white in child elements of nav not including sign in button
				var navChildElements = nav.getElementsByTagName('*');
				for (var i = 0; i < navChildElements.length; i++) {
					if (navChildElements[i].classList.contains('text-black')) {
						navChildElements[i].classList.remove('text-black');
						navChildElements[i].classList.add('text-white');
					}
				}
			}
		};
	</script>
</body>

</html>