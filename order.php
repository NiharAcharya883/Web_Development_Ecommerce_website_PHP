<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <style>
         * {
        margin: 0 !important;
        padding: 0 !important;
        box-sizing: border-box !important;
        position: relative;
    }
    .container{
        width:400px;
        height:500px;
        border:1px solid grey;
        margin-left:200px;
        /* margin:auto; */
        margin-top:150px;
    }
    </style>
</head>
<body>
    <?php
require 'partials/db_connect.php';
require 'partials/navbar_boot.php';
if(isset($_SESSION['login']) && ($_SESSION['login']==true)){
    $username = $_SESSION['username'];
    // include 'partials/navbar_boot.php';
    $sql = "Select * from `'$username._orders`";
    $n = "'$username._orders";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    $total_mrp = 0;
    if($num>0){?>
    <div class="container">
    <?php
     while($row = mysqli_fetch_assoc($result)){
        $item_id= $row['Item_id']; 
        $gender = $row['GENDER'];
        $item_brand = $row['item_brand'];
        $item_price = $row['item_price'];
        $cat = $row['category'];
        $item_color = $row['item_color'];
        $item_size = $row['size'];
        $total_mrp = $total_mrp + $item_price;
    }
    ?>
    </div>
    <?php
    }}
    ?>
</body>
</html>