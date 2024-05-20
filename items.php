<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    * {
        margin: 0 !important;
        padding: 0 !important;
        box-sizing: border-box !important;
        position: relative;
    }
    .container{
        margin:auto !important;
        margin-top:50px !important;
        height:600px !important;
        width:800px !important;
        /* border:2px solid black !important; */
        display:grid !important;
        grid-template-columns:1.5fr 1fr !important;
    }
    .size-item:hover{
        background-color:pink !important;

    }
    .right form input{
        background-color:red !important;
        color:white !important;
        width:200px !important;
        height:50px !important;
        display:flex !important;
        align-items:center !important;
        justify-content:center !important;
        font-size:1.2rem !important;
        margin-left:30px !important;
        font-weight:600 !important;
        font-size:1.3rem !important;
        border-radius:10px !important;
    }
    .size{
        margin-left:30px !important;
    }
    .right form label{
        
        margin-left:30px !important;
    }
</style>
<body>
    
    <?php 
 
    require 'partials/db_connect.php';
    require 'partials/navbar_boot.php';
    $item_id =$_GET['item_id'];
    $item_color = $_GET['color'];
    $item_brand = $_GET['brand'];
    $item_price = $_GET['price'];
    $item = $_GET['cat'];
    $gender = $_GET['gender'];
    $_SESSION['item_id'] = $item_id;
    $_SESSION['gender'] = $gender;
    $_SESSION['brand'] = $item_brand;
    $_SESSION['price'] = $item_price;
    $_SESSION['cat'] = $item;
    $_SESSION['color'] = $item_color;
    ?>
    <div class="container">
        <div class="left">
        <?php echo '<img src="img/'.$item.'/'.$item_id.'.png" alt="no image"
                            style="width:480px;height:597px;cursor:pointer;">'; ?>
        </div>
        <div class="right">
            <?php 
            echo '<br><h2 class="size">'.$item_brand.'</h2>
            <h6 class="size">'.$gender.' '.$item_color.' '.$item.'</h6><br><hr><hr>
            <h4 class="size">&#8377; '.$item_price.'</h4><h6 class="size" style="color:green;">inclusive of all taxes</h6><br><br>
            <h4 class="size">SELECT SIZE</h4><br>';

            if($item == "tshirts" && $gender == "Male"){
                echo '<form method="post" action="ADD_TO_BAG.php">
                <label for="size" style="font-size:1.2rem;"> <h5>SIZE: </h5></label>
                <select name="size" id = "size">
                <option value="S" selected>S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                </select>
                <br><br><br>
            <input type = "submit" name="submit" value="ADD TO BAG">
            </form>
                ';
            }
            elseif($item == "tshirts" && $gender =="Female"){
                echo '<form method="post" action="ADD_TO_BAG.php">
                <label for="size" style="font-size:1.2rem;"> <h5>SIZE: </h5></label>
                <select name="size" id = "size">
                <option value="S" selected>S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                </select>
                <br><br><br>
            <input type = "submit" name="submit" value="ADD TO BAG">
            </form>
                ';
            }
            elseif($item == "tshirts" && $gender == "Kids"){
                echo '<form method="post" action="ADD_TO_BAG.php">
                <label for="size" style="font-size:1.2rem;"> <h5>SIZE: </h5></label>
                <select name="size" id = "size">
                <option value="3-4y" selected>3-4y</option>
                <option value="5-6y">5-6y</option>
                <option value="7-8y">7-8y</option>
                <option value="9-10y">9-10y</option>
                </select>
                <br><br><br>
            <input type = "submit" name="submit" value="ADD TO BAG">
            </form>
                ';
            }
            elseif($item == "Shoes" && $gender == "Male"){
                echo '<form method="post" action="ADD_TO_BAG.php">
                <label for="size" style="font-size:1.2rem;"> <h5>SIZE: </h5></label>
                <select name="size" id = "size">
                <option value="8" selected>8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                </select>
                <br><br><br>
                <input type = "submit" name="submit" value="ADD TO BAG">
                </form>
                ';
            }
            elseif($item == "Shoes" && $gender =="Female"){
                echo '<form method="post" action="ADD_TO_BAG.php">
                <label for="size" style="font-size:1.2rem;"> <h5>SIZE: </h5></label>
                <select name="size" id = "size">
                <option value="8" selected>8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                </select>
                <br><br><br>
                <input type = "submit" name="submit" value="ADD TO BAG">
                </form>
                ';
            }
            elseif($item == "Shoes" && $gender == "Kids"){
                echo '<form method="post" action="ADD_TO_BAG.php">
                <label for="size" style="font-size:1.2rem;"> <h5>SIZE: </h5></label>
                <select name="size" id = "size">
                <option value="3-4y" selected>3-4y</option>
                <option value="5-6y">5-6y</option>
                <option value="7-8y">7-8y</option>
                <option value="9-10y">9-10y</option>
                </select>
                <br><br><br>
            <input type = "submit" name="submit" value="ADD TO BAG">
            </form>
                ';
            }
            elseif($item == "Jeans" && $gender == "Male"){
                echo '<form method="post" action="ADD_TO_BAG.php">
                <label for="size" style="font-size:1.2rem;"> <h5>SIZE: </h5></label>
                <select name="size" id = "size">
                <option value="28" selected>28</option>
                <option value="30">30</option>
                <option value="32">32</option>
                <option value="34">34</option>
                </select>
                <br><br><br>
                <input type = "submit" name="submit" value="ADD TO BAG">
                </form>
                ';
            }
            elseif($item == "Jeans" && $gender =="Female"){
                echo '<form method="post" action="ADD_TO_BAG.php">
                <label for="size" style="font-size:1.2rem;"> <h5>SIZE: </h5></label>
                <select name="size" id = "size">
                <option value="28" selected>28</option>
                <option value="30">30</option>
                <option value="32">32</option>
                <option value="34">34</option>
                </select>
                <br><br><br>
                <input type = "submit" name="submit" value="ADD TO BAG">
                </form>
                ';
            }
            elseif($item == "Jeans" && $gender == "Kids"){
                echo '<form method="post" action="ADD_TO_BAG.php">
                <label for="size" style="font-size:1.2rem;"> <h5>SIZE: </h5></label>
                <select name="size" id = "size">
                <option value="3-4y" selected>3-4y</option>
                <option value="5-6y">5-6y</option>
                <option value="7-8y">7-8y</option>
                <option value="9-10y">9-10y</option>
                </select>
                <br><br><br>
            <input type = "submit" name="submit" value="ADD TO BAG">
            </form>
                ';
            }

            ?>
        </div>
    </div>
       <!-- <ul class="size" style="width:250px;height:60px;display:flex;justify-content:space-evenly;align-items:center;">
            <li class="size-item" style="width:50px;height:50px;border:2px solid black;display:flex;align-items:center;justify-content:center;border-radius:50%;list-style:none;position:relative;padding-top:5px;font-size:1.3rem;">S</li>
            <li class="size-item" style="width:50px;height:50px;border:2px solid black;display:flex;align-items:center;justify-content:center;border-radius:50%;list-style:none;position:relative;padding-top:5px;font-size:1.3rem;">M</li>
           <li class="size-item" style="width:50px;height:50px;border:2px solid black;display:flex;align-items:center;justify-content:center;border-radius:50%;list-style:none;position:relative;padding-top:5px;font-size:1.3rem;">L</li>
            <li class="size-item" style="width:50px;height:50px;border:2px solid black;display:flex;align-items:center;justify-content:center;border-radius:50%;list-style:none;position:relative;padding-top:5px;font-size:1.3rem;">XL</li>
        </ul>
  -->
  
    
</body>
</html>