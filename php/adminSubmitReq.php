<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1471/1471262.png" />
    <title>Request Verify</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        .error{
            color: red;
        }
        .approve , .delete{
            cursor:pointer;
        }
    </style>
</head>
<body>
    <?php
        include("server.php");
        if(@$_SESSION['role']!='admin'){
            header("Location:./foo.php");
        }

    ?>
   <div class="fixed top-0 left-0 w-full z-50">
		<nav class="bg-transparent px-2 sm:px-4 py-2.5 dark:bg-transparent fixed w-full z-20 top-0 left-0  ">
			<div class="container flex flex-wrap justify-between items-center mx-auto">
				<a href="../index.php" class="flex items-center">
					<img src="https://cdn-icons-png.flaticon.com/512/1471/1471262.png" class="mr-3 h-6 sm:h-9" alt="NoodleFans Logo">
					<span class="self-center text-xl font-semibold whitespace-nowrap text-white">NoodleFan Store</span>
				</a>
                <div class="flex md:order-2">
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
						<?php if(@$_SESSION['role']=='admin'){ ?>
						<li>
							<a href="adminSubmitReq.php" class="block py-2 pr-4 pl-3 text-white rounded md:hover:bg-gray-50 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white ">Admin Submit</a>
						</li><?php } ?>
					</ul>
				</div>
			</div>
            <div class="absolute top-0 right-0 mr-5 mt-5">
            <a href="../index.php" class="transition-all delay-150 duration-0 ease-in-out hover:duration-150 text-white mx-1 p-1 border-solid border-sky-300 border-2 rounded-xl bg-sky-300 hover:bg-sky-700 hover:text-lg hover:p-2 hover:drop-shadow-lg">Back</a>
            </div>
		</nav>
	</div>
    <div class="cotainer mx-auto">
    <div class="relative p-10 bg-gray-700">
    </div>
    </div>
    <div class="flex flex-col items-center justify-center">
    <div class="flex flex-col shadow-2xl shadow-outline p-10 rounded-lg self-center">
        <div class="text-center">
            <p class="subpixel-antialiased text-xl my-10 font-bold underline">All request</p>
        </div>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <?php
        $sql = "SELECT * FROM request WHERE status=0";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo '<table id="sortme" class="w-full text-sm text-left"><thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-white"><tr><th data-type="number">ID <i style="font-size:10px" class="fa">&#xf0dc;</i></th><th>Username <i style="font-size:10px" class="fa">&#xf0dc;</i></th><th>Role Request <i style="font-size:10px" class="fa">&#xf0dc;</i></th><th>Current Role <i style="font-size:10px" class="fa">&#xf0dc;</i></th><th>Status <i style="font-size:10px" class="fa">&#xf0dc;</i></th><th>Receipt <i style="font-size:10px" class="fa">&#xf0dc;</i></th><th colspan="2">approve and remove</td></tr></thead>';
            while($row = $result->fetch_assoc()) {
                $imageURL = '../receipt/'.$row["file_name"];
                $filename = $row["file_name"];
                echo "<tbody><tr><td>" . $row["id"]. "</td><td>" . $row["username_req"]. "</td><td>" . $row["role_req"]. "</td><td>" . $row["current_role"]. "</td><td>" . $row["status"]. "</td><td><img src=".$imageURL ." alt='' width='20%'>".'</td><td class="approve"><span class="material-icons">done</span></td><td class="delete"><span class="material-icons">
                close
                </span></td></tr></tbody>';
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
        </div>
    </div>
</div>
<script>
    //click icon to edit data in table
    $(document).ready(function(){
        $('.approve').click(function(){
            var id = $(this).closest('tr').find('td:eq(0)').text();
            var username = $(this).closest('tr').find('td:eq(1)').text();
            var role_req = $(this).closest('tr').find('td:eq(2)').text();
            var approved_by = '<?php echo $_SESSION['username']; ?>';
            var filename = '<?php echo $filename ?>';
            var data = {
                id: id,
                username: username,
                role_req: role_req,
                approved_by: approved_by,
                filename:$filename
            };
            $.ajax({
                url: 'updateRoleUser.php',
                type: 'POST',
                data: data,
                success: function(response){
                    location.reload();
                }
            });
            

    });
});
//click icon to delete
    $(document).ready(function(){
        $('.delete').click(function(){
            var id = $(this).closest('tr').find('td:eq(0)').text();
            var filename = '<?php echo $filename ?>';
            var data = {
                id: id,
                filename:filename
            };
            $.ajax({
                url: 'deleteSubmitReq.php',
                type: 'POST',
                data: data,
                success: function(response){
                    location.reload();
                }
            });
        });
    });
    

    $(document).ready(function(){
        $("#sortme th").click(function(){
            var table = $(this).parents('table').eq(0)
            var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
            this.asc = !this.asc
            if (!this.asc){rows = rows.reverse()}
            for (var i = 0; i < rows.length; i++){table.append(rows[i])}
        })
    })
    function comparer(index) {
        return function(a, b) {
            var valA = getCellValue(a, index), valB = getCellValue(b, index)
            return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
        }
    }
    function getCellValue(row, index){ return $(row).children('td').eq(index).html() }
</script>
</body>
</html>

