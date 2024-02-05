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

if (isset($_GET['id'])) {
    
    $user_id = $_GET['id'];
    $sql = "DELETE FROM `product` WHERE `id`='$id'";

    $result = $conn->query($sql);

    if ($result==TRUE) {
        echo "Product Deleted successfully.";
    }
    else {
        echo "error.".$sql,"<br />".$conn->connect_error;
    }
}
?>

<html>
    <body>
        
    <h2>welcom to delete page</h2>
    </body>
</html>