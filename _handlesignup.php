<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/db_connect.php';
    $username = $_POST['username'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];

    // Check whether this email exists
    $existSql = "select * from `sign_up_info` where `username` = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "Email already in use";
    }
    else{
        if($pass == $cpass){
            // $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `sign_up_info` (`username`, `password`, `date`,`credit_points`) VALUES ( '$username', '$pass', current_timestamp(),50000)";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
            $sql3 = "CREATE TABLE `'$username._bag` (`Item_id` VARCHAR(25) NOT NULL ,`category` VARCHAR(15), `item_brand` VARCHAR(15) NOT NULL ,`size` VARCHAR(5) NOT NULL, `GENDER` VARCHAR(10) NOT NULL, `item_color` VARCHAR(15) NOT NULL , `item_price` INT(11) NOT NULL)";
            $result3 = mysqli_query($conn,$sql3);
            $sql4 = "CREATE TABLE `'$username._orders` (`Item_id` VARCHAR(25) NOT NULL ,`category` VARCHAR(15), `item_brand` VARCHAR(15) NOT NULL ,`size` VARCHAR(5) NOT NULL, `GENDER` VARCHAR(10) NOT NULL, `item_color` VARCHAR(15) NOT NULL , `item_price` INT(11) NOT NULL, `item_rating` INT(6))";
            $result4 = mysqli_query($conn,$sql4);
            if($result3 & $result4){
                header("Location:/WT_project/Home.php?signupsuccess=true");
                exit();
            }
        }
        else{
            $showError = "Passwords do not match"; 
            
        }
    }
    header("Location: /WT_project/Home.php?signupsuccess=false&error=$showError");

}
?>