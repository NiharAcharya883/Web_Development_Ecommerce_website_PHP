<?php
require 'partials/db_connect.php';
session_start();
if(isset($_SESSION['login']) && ($_SESSION['login']==true)){
$item_id= $_SESSION['item_id']; 
$gender = $_SESSION['gender'];
$item_brand = $_SESSION['brand'];
$item_price = $_SESSION['price'];
$cat = $_SESSION['cat'];
$item_color = $_SESSION['color'];
$username = $_SESSION['username'];
echo $username;


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $size = $_POST['size'];
    $sql2 = "INSERT INTO `'$username._bag` (`Item_id`,`category`, `item_brand`, `size`, `GENDER`, `item_color`, `item_price`) VALUES ('$item_id','$cat','$item_brand', '$size', '$gender', '$item_color', '$item_price')";
    $result = mysqli_query($conn,$sql2);
    if($result){
        header("location:Bag.php?item=added");
    }
}
}
else{
    header("location:Home.php?error=true");
}
?>