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
    <title>Order History</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        .error {
            color: red;
        }

        .approve,
        .delete {
            cursor: pointer;
        }
        .green{
            color: green;
            font-weight: bolder;
        }
        .yellow{
            color: #fcc603;
            font-weight: bolder;
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
		}
	}
    $btn_login = 'Sign in';
    $btn_icon = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block ml-1 w-4 h-4 text-white xl:inline"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
	</svg>
	';
    $id_btn = 'btn_login';
    if(!isset($_SESSION['role'])){
        $_SESSION['loginFirst']="Please login first";
        header("Location:../index.php");
    }
    if (isset($_SESSION['role'])) {
        $btn_login = '<a href="logout.php">Sign out</a>';
        $id_btn = 'btn_logout';
        $btn_icon = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block ml-1 w-4 h-4 text-white xl:inline"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" /></svg>';
    }

    ?>

    <div class="fixed top-0 left-0 w-full z-50">
        <nav class=" bg-gray-700 px-2 sm:px-4 py-2.5 dark:bg-transparent fixed w-full z-20 top-0 left-0  ">
            <div class="container flex flex-wrap justify-between items-center mx-auto">
                <a href="../index.php" class="flex items-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/1471/1471262.png" class="mr-3 h-6 sm:h-9" alt="NoodleFans Logo">
                    <span class="self-center text-xl font-semibold whitespace-nowrap text-white">NoodleFan Store</span>
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
							<a href="all.php" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-blue-500 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Gallery</a>
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
        </nav>
    </div>
    <!-- </div> -->

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white mt-10">All request</h2>
            </div>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <?php
                $sql = "SELECT * FROM request WHERE username_req='" . $_SESSION['username'] . "'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo '<table id="sortme" class="w-full text-sm text-left"><thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-white"><tr><th data-type="number">ID <i style="font-size:10px" class="fa">&#xf0dc;</i></th><th>Username <i style="font-size:10px" class="fa">&#xf0dc;</i></th><th>Role Request <i style="font-size:10px" class="fa">&#xf0dc;</i></th><th>Current Role <i style="font-size:10px" class="fa">&#xf0dc;</i></th><th>Status <i style="font-size:10px" class="fa">&#xf0dc;</i></th></tr></thead>';
                    while ($row = $result->fetch_assoc()) {
                        $imageURL = '../receipt/' . $row["file_name"];
                        $filename = $row["file_name"];
                        if ($row["status"] == 0) {
                            $status = "<td ><span class='yellow'>Pending</span></td>";
                        } else {
                            $status = "<td><span class='green'>Approved</span></td>";
                        }
                        echo "<tbody><tr><td>" . $row["id"] . "</td><td>" . $row["username_req"] . "</td><td>" . $row["role_req"] . "</td><td>" . $row["current_role"] . "</td>" . $status . '</td></tr></tbody>';
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </section>
    <script>
        //click icon to edit data in table
        $(document).ready(function() {
            $("#sortme th").click(function() {
                var table = $(this).parents('table').eq(0)
                var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
                this.asc = !this.asc
                if (!this.asc) {
                    rows = rows.reverse()
                }
                for (var i = 0; i < rows.length; i++) {
                    table.append(rows[i])
                }
            })
        })

        function comparer(index) {
            return function(a, b) {
                var valA = getCellValue(a, index),
                    valB = getCellValue(b, index)
                return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
            }
        }

        function getCellValue(row, index) {
            return $(row).children('td').eq(index).html()
        }
    </script>
</body>

</html>