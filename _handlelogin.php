<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/db_connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "select * from `sign_up_info` where `username` = '$username' and `password` = '$password'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    $showError = "Invalid Credentials";
    if($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            // if(password_verify($password, $row['Password'])){
                if(($password == $row['Password']) && ($username == $row['Username'])){
                    $login = true;
                    session_start();
                    $_SESSION['login'] = true;
                    echo $_SESSION['login'];
                    $_SESSION['username'] = $username;
                    // echo "<script>
                    //   window.location.href='Home.php';
                    //   </script>";  
                    header("location: Home.php?loginsuccess=true");
                }
                //} 
                else{
                    $showError = "Invalid Credentials";
                    header("location: Home.php?loginsuccess=false&error=$showError");
                }
            }
        }
        else{
        header("location: Home.php?loginsuccess=false&error=$showError");
    }
}
?>