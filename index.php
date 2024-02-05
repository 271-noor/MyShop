<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shop";

    // Create Connection
    $conn = new mysqli($servername,$username,$password,$database);

    // Check Connection
    if ($conn->connect_error) {
        die ("Connection Failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM  `product`";
    $result = $conn->query($sql);
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
            margin: 0px;
            padding: 0px;
            background-color: lightgray;
        }
    </style>
</head>
<body>
        <div class="container">
            <h2>Products</h2>
            <a href="/MyShop_php/create.php" class="btn btn-primary">Add Product</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Categories</th>
                        <th>MRP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($result->num_rows>0){

                            while ($row = $result->fetch_assoch()) {
                                ?>
                                    <tr>
                                        <td <?php echo $row['id']; ?>>Id</td>
                                        <td <?php echo $row['name']; ?>>Name</td>
                                        <td <?php echo $row['categories']; ?>>Categories</td>
                                        <td <?php echo $row['mrp']; ?>>MRP</td>
                                        <td>
                                            <a href="/MyShop_php/edit.php<?php echo $row['id']; ?>" class="btn">Edit</a>
                                            <a href="/MyShop_php/delete.php<?php echo $row['id']; ?>" class="btn-primary">Delete</a>
                                        </td>
                                    </tr>

                        <?php }
                        }
                    ?>
                </tbody>
            </table>
        </div>
</body>
</html>