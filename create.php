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

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $categories = $_POST['category'];
        $mrp = $_POST['mrp'];
        
        $sql = "INSERT `product` (`name`,`categories`,`mrp`)
            VALUES('$name','$categories','$mrp)";

        $result = $conn->query($sql);

        if($result == TRUE){
            echo ("New Product added successfully.");

        }
        else{
            echo "error.".$sql, "<br />" .$conn->connect_error;
        }
        $conn->close();
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <style>
        body{
            
            margin: 30px;
            padding: 0px;
            background-color: lightgray;
        }
        
   </style>
</head>
<body>
    <div class="container">
    <h2 class="center">Product Information</h2>
    <form action="" method="POST">

            Name: <br>
            <input type="text" name="name" >
            <br>

            Category: <br>
            <input type="text" name="category" >
            <br>

            MRP: <br>
            <input type="number" name="mrp" >
            <br><br>

            <input type="submit" name="submit" class="btn btn-primary" value="submit">
            
          </form>
    </div>
</body>
</html>