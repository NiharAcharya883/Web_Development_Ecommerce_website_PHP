<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
         .navbar{
        top:0;
        width:100%;
        height:80px;
    }
    .navbar img{
        height:70px;
        margin-left:530px;
    }
    .container{
        width:550px;
        height:700px;
        /* border:2px solid black; */
        margin:auto;
        margin-top:20px;
    }
    .bill{
        margin:auto;
        /* margin-left:50px; */
        border:0.01px solid grey;
    }
    .bill h4{
        margin-left:45px;
    }
    .bill table{
        margin-left:45px;
        margin-top:-30px;
    }

    .container2{
        border:0.1px solid grey;
        margin-top:20px;
    }
    .container2 h2{
        margin-left:35px;
    }
    .container2 img{
        margin-left:35px;
    }
    .container2 .button{
        width:300px;
        height:45px;
        margin-left:75px;
        margin-top:15px;
        margin-bottom:25px;
        font-size:1.3rem;
        background-color:red;
        color:white;}
    .code{
        border:1px solid black;
        width:160px;
        height:60px;
        margin-left:100px;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:1.6rem;
    }
    input{
        margin-left:25px;
        border:0.5px solid grey;
        width:450px;
        height:35px;
        border-radius:4px;
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
    .points{
        margin-left:20px;
        font-size:1rem;
        font-weight:700;
    }
    </style>
</head>
<body>
<nav class="navbar">
        <img src="img/payment.png" alt="no">
    </nav>
<div class="container">
<?php
session_start();
require 'partials/db_connect.php';
    $username = $_SESSION['username'];
    // include 'partials/navbar_boot.php';
    $sql = "Select * from `'$username._bag`";
    $n = "'$username._bag";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    $total_mrp = 0;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $namme=$_POST['name'];
        $number=$_POST['number'];
        $add=$_POST['address'];
        $city=$_POST['city'];
        $state=$_POST['state'];

        $address = $add ." , ".$city." , ".$state;
        #print($address);
    }
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

<div class="bill">
            <h4>PRICE DETAILS (<?php echo $num;?> items)</h4>
            <table cell-spacing="1" style="width:400px;">
                <tr>
                    <td>TOTAL PRICE</td>
                    <td><?php echo '&#8377; '.$total_mrp.'';?></td>
                </tr>
                <?php $total_mrp = $total_mrp + 100 + 10;?>
                <tr><br>
                    <td>Convenience fee</td>
                    <td><?php echo '&#8377; 100';?></td>
                </tr>
                <tr><br>
                    <td>Cash On Delivery Fee</td>
                    <td><?php echo '&#8377; 10';?></td>
                </tr>
                <tr>
                    <td><strong>Total Amount</strong></td>
                    <td><strong><?php echo '&#8377; '.$total_mrp.'';?></strong></td>
                </tr>
            </table><br>
        </div>
        

    <div class="container2">
        <h2>Credits</h2>
        <?php 
        $sql = "select `credit_points` from `sign_up_info`";
        $result=mysqli_query($conn,$sql);
        ?>
        <!-- <img src="img/10more.png" alt="no"><br><br> -->
        <p class="points" id="point"><?php while($row = mysqli_fetch_assoc($result)){
            $available = $row['credit_points'];
            echo "Credits availabe: " .$available ;}?></p>
        <p class="code" id="code7"></p>
        <form method="get" onsubmit="return validate()">
            <input type="text" id="code1" placeholder="   Enter code shown from above image." required><br>
            <!-- <p style="margin-left:25px;font-weight:50;">You can pay via cash/UPI on delivery.</p> -->
            <button type="button" class="button" onclick="return validate()">PLACE ORDER</button>
            <!-- <p id="demo"></p> -->
            <!-- <input type="submit" class="button" value="Place Order"> -->
            <!-- <input type="button" class="button" onclick="validate()" value="Place Order"> -->
        </form>
        <?php
        $_SESSION['total_mrp'] = $total_mrp;
        $remaining = $available - $total_mrp;
        $_SESSION['remaining'] = $remaining;
        $_SESSION['available'] = $available;

        ?>
    </div>
</div>
<div class="footer">
<img src="img/bag_foot.png" alt="">
</div>
<script>
let x = Math.floor((Math.random() * 10000) + 1);
console.log(x);
document.getElementById("code7").innerHTML = x;
function validate(){
// alert("code matched");
    let y = document.getElementById('code1').value;
// console.log(x);
// console.log(y);
    if(y.match(x)){
        window.location.href='Add_to_order.php';
        return true;
    }
    else{
        alert("Enter code correctly");
        return false;
}
}
</script>
</body>
</html>