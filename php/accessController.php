<?php
    function accessController($accessLevel) {
        include("server.php");
        if ($accessLevel == "user") {
            $query = $conn->query("SELECT * FROM images where role_access = 'user'");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                    $imageURL = './upload/' . $row["file_name"];
                    $id = $row["id"];
                
                ?>
					<div class="w-full row-span-2" id="warp">
						<img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-115 duration-300" id="img" />
					</div>
				<?php
					}
                }
        } elseif ($accessLevel == "premium") {
            $query = $conn->query("SELECT * FROM images where role_access = 'premium' OR role_access = 'user' ");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                    $imageURL = './upload/' . $row["file_name"];
                    $id = $row["id"];
                
                ?>
                <div class="w-full row-span-2" id="warp">
                    <img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-115 duration-300" id="img" />
                </div>
            <?php
                }
            }
        }
        else {
            $query = $conn->query("SELECT * FROM images ");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                    $imageURL = './upload/' . $row["file_name"];
                    $id = $row["id"];
                
                ?>
                <div class="w-full row-span-2" id="warp">
                    <img src=<?php echo $imageURL ?> class="inset-0 h-full w-full shadow-lg object-cover object-center rounded imgHover hover:scale-115 duration-300" id="img" />
                </div>
            <?php
                }
            }
        }
    }

?>