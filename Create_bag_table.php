<?php
$Showerror = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/db_connect.php';
    session_start();
    $username = $_SESSION['username'];
    echo $username;







}


?>