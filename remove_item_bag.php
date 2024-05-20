
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    require 'partials/db_connect.php';
    $username = $_SESSION['username'];
    $n= "'$username._bag";
    echo $n;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        echo $id;
        $sql2 = "Delete from `$n` where `item_id` = '$id'";
        $result2 = mysqli_query($conn,$sql2);
        header("location:Bag.php");
    }
    else{
        echo "no";
    }
    ?>               
    
</body>
</html>  