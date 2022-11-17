<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1471/1471262.png" />
    <title>Order History</title>
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
        if(!isset($_SESSION['role'])){
            header("Location:./index.php");
        }

    ?>
    <div class="cotainer mx-auto">
    <div class="relative p-10 bg-gray-100">
        <div class="absolute top-0 right-0 mr-5 mt-5">
            <a href="../index.php" class="transition-all delay-150 duration-0 ease-in-out hover:duration-150 text-white mx-1 p-1 border-solid border-sky-300 border-2 rounded-xl bg-sky-300 hover:bg-sky-700 hover:text-lg hover:p-2 hover:drop-shadow-lg">Back</a>
        </div>
    </div>
    <div class="flex flex-col items-center justify-center">
    <div class="flex flex-col shadow-2xl shadow-outline p-10 rounded-lg self-center">
        <div class="text-center">
            <p class="subpixel-antialiased text-xl my-10 font-bold underline">All request</p>
        </div>
        <?php
        $sql = "SELECT * FROM request WHERE username_req='".$_SESSION['username']."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo '<table id="sortme" class="table-auto"><thead><tr><th data-type="number">ID <i style="font-size:10px" class="fa">&#xf0dc;</i></th><th>Username <i style="font-size:10px" class="fa">&#xf0dc;</i></th><th>Role Request <i style="font-size:10px" class="fa">&#xf0dc;</i></th><th>Current Role <i style="font-size:10px" class="fa">&#xf0dc;</i></th><th>Status <i style="font-size:10px" class="fa">&#xf0dc;</i></th></tr></thead>';
            while($row = $result->fetch_assoc()) {
                $imageURL = '../receipt/'.$row["file_name"];
                $filename = $row["file_name"];
                if($row["status"]==0){$status = "<td class='font-yellow-300'>Pending</td>";}else{ $status = "<td class='font-green-300'>Approved</td>";}
                echo "<tbody><tr><td>" . $row["id"]. "</td><td>" . $row["username_req"]. "</td><td>" . $row["role_req"]. "</td><td>" . $row["current_role"]. "</td>" . $status.'</td></tr></tbody>';
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</div>
<script>
    //click icon to edit data in table
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

