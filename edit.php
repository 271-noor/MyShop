<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shop";

    // Create connection
    $conn = new mysqli($servername,$username,$password,$database);

    // Check connection
    if ($conn->connect_error) {
        die ("Connection Failed: " . $conn->connect_error);
    }

    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $categories = $_POST['category'];
        $mrp = $_POST['mrp'];

        $sql = "UPDATE `product` SET `name`='$name', `categories`='$categories', `mrp`='$mrp'
        WHERE `id`='$id'"

        $result = $conn->query($sql);
        if($result == TRUE){
            echo ("Product Updated successfully.");

        }
        else{
            echo "error." . $sql. "<br>". $conn->connect_error;
        }
            }

            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $sql = "SELECT * FROM `shop` WHERE `id`='$id'";

                $result = $conn->query($sql);

                if($result->num_rows>0){
                    while ($row = $result->fetch_assoc()) {
                        
                        $name = $row['name'];
                        $categories = $row['categories'];
                        $mrp = $row['mrp'];
                        $id = $row['id'];
                    }
                    ?>


                        <html>
                            <head>
                                <style>
                                    body{
                                        background-color: lightgray;
                                    }
                                </style>
                            </head>
                            <body>
                                <form action="" method="POST">
                                    <h2>Product Update Page</h2>
                                    ID <input type="text" name="id" value="<?php echo $id;?>"> <br />
                                        Name <input type="text" name="name" value="<?php echo $name;?>">

                                         <br>
                                       CATEGORIY<input type="text" name="category" value="<?php echo $categories;?>">
                                         <br>
                                        MRP  <input type="text" name="mrp" value="<?php echo $mrp;?>">
                                </form>
                            </body>
                        </html>

            <?php        
                }
                else{
                    header("location: index.php");
                }
            }
?>