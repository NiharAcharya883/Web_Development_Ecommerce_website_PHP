<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display_Shoes_new</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
    * {
        margin: 0 !important;
        padding: 0 !important;
        box-sizing: border-box !important;
        position: relative;
    }
    .filter{
        /* border:2px solid black !important; */
        height:100px !important;
        margin-bottom:20px !important;
        /* z-index: -999999 !important; */
        position: relative !important;
    }
    .items {
        margin-top:40px !important;
        height:100% !important;
        /* width:100% !important; */
        margin-left:100px !important;
        width:1500px !important;
        position: absolute;
        display: grid !important;
        grid-template-columns: repeat(3, auto) !important;
        z-index: -1111 !important;
    }
    .image:hover {
        transform:scale(1.07);

    }
    .filter form{
        margin-left:30px !important;
    }
    .filter form select{
        margin:3px 20px !important;
    }
    .h5{
        margin-left :145px !important;
        margin-top:10px !important;
    }
    .filter form select{
        text-align:center !important;
        background-color:pink !important;
    }
    .filter form select option{
        text-align:center !important;
        background-color:white !important;
    }
    .submit{
        padding:6px !important;
        border-radius:5px !important;
        background-color:red !important;
        color:white !important;
    }

    </style>
</head>

<body>
    <?php
    include 'partials/db_connect.php';
    require 'partials/navbar_boot.php'; 
    if(isset($_GET['gender'])){
    $gender = $_GET['gender'];
    $Shoes_color = "black";
    $sql = "Select * from `shoes` where `gender` = '$gender'";
    $result = mysqli_query($conn,$sql);
    }
    elseif($_SERVER["REQUEST_METHOD"]=="POST"){
        $gender = $_POST['gender'];
        $Shoes_color = $_POST['Shoes_color'];
        $Shoes_brand = $_POST['Shoes_brand'];
        $sql = "Select * from `shoes` where `gender` = '$gender' and `Shoes_brand`='$Shoes_brand' and `Shoes_color`='$Shoes_color'";
        $result = mysqli_query($conn,$sql);
    }
    ?>

        <!-- <div class="filter">
            <form action="Display_Shoes_new.php" method="post">
                <h5 class="h5">FILTERS</h5><br>
                <select name="gender" id="gender" name="gender">Brand
                    <option value="Male" selected>Male</option>
                    <option value="Female">Female</option>
                    <option value="Kids">Kids</option>
                </select>
                <select id="brand" name="Shoes_brand">Brand
                    <option value="ADIDAS" selected>ADIDAS</option>
                    <option value="Nike">Nike</option>
                    <option value="Puma">Puma</option>
                </select>
                <select id="color" name="Shoes_color">Brand
                    <option value="Black" selected>Black</option>
                    <option value="Blue">Blue</option>
                    <option value="White">White</option>
                    <option value="Grey">Grey</option>
                </select>
                <input type="submit" class="submit" name="submit" value="Apply Changes">
                <!-- <input type="reset" class="reset" name="reset" value="Reset Changes"> -->
                <!-- <input type="reset" name="reset" value="Reset Changes"> -->
            <!--</form>
        </div> -->
        <div class="items">
            <?php display_items($gender,$result); ?>
        </div>
    
        <?php
              
              function display_items($gender,$result){
                  while($row = mysqli_fetch_assoc($result)){
                      $Shoes_id = $row['Shoes_id'];
                      $Shoes_color = $row['Shoes_color'];
                      $Shoes_brand = $row['Shoes_brand'];
                      $Shoes_price = $row['Shoes_price'];
                      $item_id =  $gender.'_Shoes-' .$Shoes_id;
                      $cat = "Shoes";
                      echo '<div class="view_items"
                      style="border:2px solid white;margin:40px; width:250px;height:400px;position:relative;">
                      <div class="image">
                        <a href="items.php?item_id='.$item_id.'&gender='.$gender.'&brand='.$Shoes_brand.'&price='.$Shoes_price.'&cat='.$cat.'&color='.$Shoes_color.'">
                            <img src="img/Shoes/'. $gender.'_shoes-'.$Shoes_id.'.png" alt="no image"
                            style="width:250px;height:300px;cursor:pointer;">
                        </a>
                        <p style="font-size:20px"><b> '.$Shoes_brand .'</b><i class="fa fa-regular fa fa-heart"
                        style="float:right;width:25px;height:25px"></i></p>
                        <p>'.$gender.' Sports shoes <br>
                        <b>Rs '.$Shoes_price .'</b>
                        </p>
                        </div>
                        <br>
                        </div>';
                    ?>
            <?php
                }
            }
            ?>

</body>

</html>