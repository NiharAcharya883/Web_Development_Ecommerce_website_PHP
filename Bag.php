<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .main{
            width:100% !important;
            height:100% !important;
            display:grid !important;
            grid-template-columns:1fr 1fr !important;
        }
        .container1{
            display:flex !important;
            /* align-items:center !important; */
            justify-content:center !important; 
            /* border-right:2px solid black !important; */
        }
    .container-11{
            /* border:2px solid black !important; */
            /* height:100vh !important; */
            width:560px !important;
            /* margin:auto !important; */
            margin-top:60px !important;
            margin-left:150px !important;
    }
    .container2{
        display:flex !important;
        align-items:center !important;
        justify-content:center !important; 
    }
    .container-22{
            /* border:2px solid black !important; */
            height:600px !important;
            width:400px !important;
            margin-left:40px !important;
            margin-top:100px !important;
    }

    .items{
        border:0.1px solid black !important;
        width:560px !important;
        height:250px !important;
        display:grid !important;
        margin:10px;
        grid-template-columns:1.5fr 2fr !important;
        
    }
    .bill button{
        width:300px;
        height:45px;
        margin-left:35px;
        font-size:1.3rem;
        background-color:red;
        color:white;

    }
    .bill h4{
        margin-left:25px;
    }
    .bill img{
        margin-left:25px;
        width:350px;
    }
    .bill table{
        margin-left:25px;
    }
    .navbar{
        top:0;
        width:100%;
        height:80px;
    }
    .navbar .img-1{
        height:80px;
        margin-left:400px;
    }
    .navbar .img-2{
        height:80px;
        /* margin-left:700px; */
        float:right;
        margin-right:30px;
    }
    .navbar .img-3{
        height:80px;
        /* margin-left:700px; */
        float:left;
        margin-left:50px;
    }
    .footer{
        bottom:0 !important;
        margin-top:30px;
        width:100%;
        height:70px;
    }
    .footer img{
        margin-bottom:5px;
        margin-left:400px;
    }
    </style>
</head>
<body>
    <nav class="navbar">
        <img src="img/bag_nav_1.png" class="img-1" alt="no">
        <img src="img/secure.png" class="img-2" alt="no">
        <img src="img/myntra_logo.png" class="img-3" alt="no">
    </nav>
<?php
session_start();
require 'partials/db_connect.php';
if(isset($_SESSION['login']) && ($_SESSION['login']==true)){
    $username = $_SESSION['username'];
    // include 'partials/navbar_boot.php';
    $sql = "Select * from `'$username._bag`";
    $n = "'$username._bag";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    $total_mrp = 0;
    if($num>0){?>
    <div class="main">
        <div class="container1">
    <div class="container-11">
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
    ?>
    
        <div class="items">
        <div class="left">
        <?php echo '<img src="img/'.$cat.'/'.$item_id.'.png" alt="no image"
                style="width:210px;height:250px;cursor:pointer;">'; ?>
        </div>
        <div class="right">
        <?php
        echo '<h1 class="size" style="margin-left:10px">'.$item_brand.'<a href="remove_item_bag.php?id='.$item_id.'" style="border:none;float:right;background-color:white;font-size:1.5rem;text-decoration:none;color:black;">X</a></h1>
            <h4 class="size" style="margin-left:10px">'.$gender.' '.$item_color.' '.$cat.'</h4><br>
            <button class="size" style="margin-left:10px;padding:9px;height:30px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;border-radius:3px;">Size '.$item_size.'</button> 
            <h2 class="size" style="margin-left:10px">&#8377; '.$item_price.'</h2>';
            ?>
          
        </div>
        </div>
        <?php
    } ?>
    </div>
    
    </div>
    
    <div class="container-2">
    <div class="container-22">
        <div class="bill">
            <h4>GIFTING AND PERSONALISATION</h4>
            <img src="img/Gift.png" alt="no"><br>
            <h4>PRICE DETAILS (<?php echo $num;?> items)</h4>
            <table cell-spacing="10" style="width:400px;">
                <tr>
                    <td>TOTAL PRICE</td>
                    <td><?php echo '&#8377; '.$total_mrp.'';?></td>
                </tr>
                <?php $total_mrp = $total_mrp + 100;?>
                <tr><br>
                    <td>Convenience fee</td>
                    <td><?php echo '&#8377; 100';?></td>
                </tr>
                <tr>
                    <td><strong>Total Amount</strong></td>
                    <td><strong><?php echo '&#8377; '.$total_mrp.'';?></strong></td>
                </tr>
            </table><br>
            <button><a href="Address.html" style="color:white;text-decoration:none;">PLACE ORDER</a></button>
        </div>
    </div>
    </div>
    </div>
    <?php } 
    else{
        echo '<div class="emptybag" style="width:100%;height:600px;display:flex;flex-direction:column;align-items:center;justify-content:center;">
        <img src = "img/empty_bag.png">
        <a style="width:200px;height:40px;text-decoration:none;display:flex;align-items:center;justify-content:center;color:white;font-size:1.3rem;background-color:red;padding:4px;" href="Home.php">ADD ITEMS</a></div>';
    }
        ?>
<?php
}
else{
    echo "Please login first:";
    echo "<script>
    window.location.href='Home.php?error=true';
    </script>";
    // header("location : Login.php");
}
?>
<div class="footer">
    <img src="img/bag_foot.png" alt="">
</div>
</body>
</html>