<!DOCTYPE html>
<html lang="en">

<head class="scroll-smooth">
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

	<script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        // if (
        //     localStorage.getItem("color-theme") === "dark" ||
        //     (!("color-theme" in localStorage) &&
        //         window.matchMedia("(prefers-color-scheme: dark)").matches)
        // ) {
        //     document.documentElement.classList.add("dark");
        // } else {
        //     document.documentElement.classList.remove("dark");
        // }

        // https://dji-official-fe.djicdn.com/cms/uploads/028360d8d670123687db11a9870c8400@origin.jpg

        // style="background-image: url('images/img.jpg')"
	</script>

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

		#rs3content {
			background-image: url('https://dji-official-fe.djicdn.com/cms/uploads/d41bdcbde3489b373c77b4137a9281d5@origin.jpg');
		}
	</style>
</head>

<body class="bg-white dark:bg-gray-900">
	<?php
	    session_start();
		$btn_login='<a href="signin.php" >Sign in</a>';
		if(@$_SESSION["role"] == 'admin' || @$_SESSION["role"] == 'user'){
			$btn_login='<a href="./php/logout.php" >Sign out</a>';
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
					<button type="button"
						class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><?php echo @$btn_login ?></button>
					<button data-collapse-toggle="navbar-sticky" type="button"
						class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
						aria-controls="navbar-sticky" aria-expanded="false">
						<span class="sr-only">Open main menu</span>
						<svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
							xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd"
								d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
								clip-rule="evenodd"></path>
						</svg>
					</button>
				</div>
				<div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
					<ul
						class="flex flex-col p-4 mt-4 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:bg-blue-100 lg:bg-transparent">
						<li>
							<a href="#"
								class="block py-2 pr-4 pl-3 text-white rounded hover:bg-gray-100 md:hover:bg-blue-500 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Product</a>
						</li>
						<li>
							<a href="#"
								class="block py-2 pr-4 pl-3 text-white rounded hover:bg-gray-100 md:hover:bg-gray-50 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">About</a>
						</li>
						<li>
							<a href="./php/upload.php"
								class="block py-2 pr-4 pl-3 text-white rounded hover:bg-gray-100 md:hover:bg-gray-50 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Upload Image</a>
						</li>
						<li>
							<a href="#"
								class="block py-2 pr-4 pl-3 text-white rounded hover:bg-gray-100 md:hover:bg-gray-50 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Contact</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<div class="swiper headerSwiper">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<img src="https://dji-official-fe.djicdn.com/cms/uploads/028360d8d670123687db11a9870c8400@origin.jpg"
					alt="avatar" />

			</div>
			<div class="swiper-slide">
				<div class="swiper-lazy" style="background-image: url('https://dji-official-fe.djicdn.com/cms/uploads/81b484ebfa1d073281c2e2ee6eca7cd1.jpg')">
					<div class="swiper-lazy-preloader"></div>
				</div>
			</div>
			<div class="swiper-slide">
				<img src="https://dji-official-fe.djicdn.com/cms/uploads/5469e09498cb5bec60e052e587616a1c@origin.jpg"
					alt="t40" />
			</div>
			<div class="swiper-slide" id="rs3content">
				<img src="https://dji-official-fe.djicdn.com/cms/uploads/d41bdcbde3489b373c77b4137a9281d5@origin.jpg" alt="rs3" />
				
			</div>
		</div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
	</div>

	<!-- content sample-->
	<div class=" container mx-auto px-4 pt-10">
		<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
			<div class="col-span-1">
				<div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
					<div class="px-4 py-5 sm:p-6">
						<h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">
							Product Information
						</h3>
						<p class="mt-1 max-w 2xl text-sm text-gray-500">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus magnam
							voluptatum
							cupiditate
							veritatis in accusamus quisquam.
						</p>
					</div>
					<div class="border-t border-gray-200 dark:border-gray-700">
						<dl>
							<div class="bg-gray-50 dark:bg-gray-900 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">
									Full name
								</dt>
								<dd class="mt-1 text-sm text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
									Margot Foster
								</dd>
							</div>
							<div class="bg-white dark:bg-gray-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">
									Application for
								</dt>
								<dd class="mt-1 text-sm text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
									Backend Developer
								</dd>
							</div>
							<div class="bg-gray-50 dark:bg-gray-900 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">
									Email address
								</dt>
								<dd class="mt-1 text-sm text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
								</dd>
							</div>
							<div class="bg-white dark:bg-gray-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">
									Salary expectation
								</dt>
								<dd class="mt-1 text-sm text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
									$120,000
								</dd>
							</div>
							<div class="bg-gray-50 dark:bg-gray-900 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">
									About
								</dt>
								<dd class="mt-1 text-sm text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
									Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt
									cillum culpa
									consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit
									nulla mollit
									nostrud
									in ea officia proident. Irure nostrud pariatur mollit ad adipisicing
									reprehenderit
									deserunt
									qui eu.
								</dd>
							</div>
						</dl>
					</div>
				</div>
			</div>
			<div class="col-span-1">
				<div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
					<div class="px-4 py-5 sm:p-6">
						<h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">
							Attachments
						</h3>
						<p class="mt-1 max-w 2xl text-sm text-gray-500">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus magnam
							voluptatum
							cupiditate
							veritatis in accusamus quisquam.
						</p>
					</div>
					<div class="border-t border-gray-200 dark:border-gray-700">
						<dl>
							<div class="bg-gray-50 dark:bg-gray-900 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">
									Cover letter
								</dt>
								<dd class="mt-1 text-sm text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
									<a href="#" class="text-indigo-600 hover:text-indigo-900">Download</a>
								</dd>
							</div>
							<div class="bg-white dark:bg-gray-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">
									Resume
								</dt>
								<dd class="mt-1 text-sm text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
									<a href="#" class="text-indigo-600 hover:text-indigo-900">Download</a>
								</dd>
							</div>
						</dl>
					</div>
				</div>
			</div>
		</div>
	</div>


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

		themeToggleBtn.addEventListener('click', function () {

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
</body>

</html>