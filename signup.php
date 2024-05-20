<?php

$Showalert = false;
$Showerror = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/db_connect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // session_start();
    $_SESSION['username'] = $username;


    // Check for username existance
    $sqlexists = "Select * from `sign_up_info` where username = '$username'";
    $result = mysqli_query($conn,$sqlexists);
    $rows_exists = mysqli_num_rows($result);
    if($rows_exists > 0){
        $Showerror = "Username already exists";
    }
    
    else{
        if(($password == $cpassword)){
            // $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `sign_up_info` ( `username`, `password`, `date`) VALUES ('$username', '$password', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $Showalert = true;
                $sql3 = "CREATE TABLE `$username._bag` (`Item_id` INT(5) NOT NULL AUTO_INCREMENT , `item_brand` VARCHAR(15) NOT NULL , `item_color` VARCHAR(15) NOT NULL , `item_price` INT(11) NOT NULL , PRIMARY KEY (`Item_id`))";
                $result3 = mysqli_query($conn,$sql3);
                if($result3){
                    echo "<script>
                    window.location.href='Login.php';
                    </script>";
                }
            }

        }
        else{
            $Showerror = "Passwords do not match";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/signup.css">
    <?php 
    include 'partials/navbar.php';
    ?>
</head>
<body>
<?php
    // if($Showerror){
    // echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert" my-2>
    //     <strong>Alert!</strong>'. $Showerror .'
    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //         <span aria-hidden="true">&times;</span>
    //     </button>
    // </div> ';
    // }
    if($Showerror){
        echo ' <div class="Error" 
            style="
            height: 60px;
            width: 100%;
            background-color: red;"><h1>'.$Showerror.'</h1></div>';
        }

    ?>
    <div class="main">
        <form action="signup.php" method="POST">
            <div class="box">
                <div class="header">
                    <h1>SIGN UP</h1>
                </div>
                <div class="body">
                    <div class="left">
                        <div class="naam">
                            <h2>Username</h2>
                        </div>
                        <div class="passwd">
                            <h2>Password</h2>
                        </div>
                        <div class="cpasswd">
                            <h2>Confirm Password</h2>
                        </div>
                    </div>
                    <div class="right">
                        <div class="e_naam">
                            <input type="text" name="username" placeholder="Enter username">
                        </div>
                        <div class="e_passwd">
                            <input type="password" name="password" placeholder="Enter your password">
                        </div>
                        <div class="e_cpasswd">
                            <input type="password" name="cpassword" placeholder="Enter confirm password">
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <input type="submit" name="submit" value="submit">
                </div>
            </div>
        </form>
    </div>
  
</body>
</html>