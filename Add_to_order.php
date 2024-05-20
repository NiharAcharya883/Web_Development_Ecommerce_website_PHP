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
            //  if($_SERVER["REQUEST_METHOD"]=="POST"){
            //      $namme=$_POST['name'];
            //      $number=$_POST['number'];
            //      $add=$_POST['address'];
            //      $city=$_POST['city'];
            //      $state=$_POST['state'];
         
            //      $address = $add ." , ".$city." , ".$state;
                 #print($address);
             //}
             $total_mrp = $_SESSION['total_mrp'];
             $available = $_SESSION['available'];
             $remaining = $_SESSION['remaining'];
             while($row = mysqli_fetch_assoc($result)){
                 $item_id= $row['Item_id']; 
                 $gender = $row['GENDER'];
                 $item_brand = $row['item_brand'];
                 $item_price = $row['item_price'];
                 $cat = $row['category'];
                 $item_color = $row['item_color'];
                 $item_size = $row['size'];
                 $total_mrp = $total_mrp + $item_price;
                 $sql2 = "INSERT INTO `'$username._orders` (`item_id`, `category`, `item_brand`,`size`,`gender`,`item_color`,`item_price`) VALUES ( '$item_id', '$cat', '$item_brand','$item_size','$gender','$item_color','$item_price')";
                 $result2 = mysqli_query($conn, $sql2);
                 $sql3 = "Delete from `'$username._bag` where `item_id` = '$item_id'";
                 $result3 = mysqli_query($conn,$sql3);
                 $sql4 = "UPDATE `sign_up_info` SET `credit_points` = '$remaining' WHERE `Username` = '$username' ";
                 $result4=mysqli_query($conn,$sql4);
                if($result2 & $result3 & $result4){
                    echo "<script>
                        window.location.href='Home.php?order=placed';
                        </script>";
                 }   
             }
            ?>