<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <style>
    * {
        margin: 0 !important;
        padding: 0 !important;
        box-sizing: border-box !important;
        position: relative;
    }

    .carousel-inner {
        height: 450px;
        margin-top: 20px !important;
        /* position:relative; */
        /* z-index: -99999 !important; */
    }

    .carousel-inner img {
        /* position:relative; */
        height: 500px !important;
        /* z-index: -99999 !important; */
    }

    .ctg {
        margin-top: 20px !important;
        height: 500px;
        width: 100%;
        border-top: none;
    }

    .ctg h1 {
        text-align: center;
        font-size: 2.9rem;
        height: 60px;
        font-weight: 600;
        color:Black;
    }

    .cat {
        margin-top: 20px !important;
        height: 400px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
    }

    .cat-1,
    .cat-2,
    .cat-3 {
        width: 300px;
        height: 300px;
        align-items: center;
    }

    .cat-3 img {
        height: 300px;
        width: 300px;
        align-self: center;
    }

    .cat-3 h2{
        margin-top:8px;
        text-align: center !important;
        font-weight: 700;
    }
    .cat-2 h2{
        margin-top:8px;
        text-align: center !important;
        font-weight: 700;
    }

    .cat-1 img {
        height: 300px;
        width: 300px;
        align-self: center;
    }
    .cat-2 img {
        height: 300px;
        width: 300px;
        align-self: center;
    }
    
    .cat-1 h2{
        text-align: center !important;
        margin-top:8px;
        font-weight: 700;
    }
    .cat-1 img:hover{
        transform:scale(1.07);
    }
    .cat-2 img:hover{
        transform:scale(1.07);
    }
    .cat-3 img:hover{
        transform:scale(1.07);
    }
    </style>
</head>

<body>
    <?php require 'partials/navbar_boot.php'; 
    // session_start();
    // echo $_SESSION['loggedin'];
    if(isset($_GET['signupsuccess'])){ 
            if($_GET['signupsuccess']=='true'){
                echo '<div class="alert alert-success alert-dismissible fade show my-0 p-2" role="alert">
              <strong>Signup Successful!</strong> You can now login.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>';
    }
            elseif($_GET['signupsuccess']=='false'){
                echo '<div class="alert alert-danger alert-dismissible fade show my-0 p-2" role="alert">
              <strong>Error! Signup Failed</strong> '.$_GET['error'].' 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>';
    }
 }
    if(isset($_GET['loginsuccess'])){
            if(($_GET['loginsuccess']=='true')){ 
                echo '<div class="alert alert-success alert-dismissible fade show my-0 p-2" role="alert">
              <strong>Login Successful!</strong> You are now logged in.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>';
    }
            elseif($_GET['loginsuccess']=='false'){
                echo '<div class="alert alert-danger alert-dismissible fade show my-0 p-2" role="alert">
              <strong>Error! Login Failed</strong> '.$_GET['error'].' 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>';
    }
}
        if(isset($_GET['loggedout'])){
            if(($_GET['loggedout']=='true')){ 
                echo '<div class="alert alert-success alert-dismissible fade show my-0 p-2" role="alert">
            <strong>Logout Successful!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
        }
        if(isset($_GET['error'])){
            if(($_GET['error']=='true')){ 
                echo '<div class="alert alert-danger alert-dismissible fade show my-0 p-2" role="alert">
            <strong>Login First!</strong> to access the Bag.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
        }
        if(isset($_GET['order'])){
            if(($_GET['order']=='placed')){ 
                echo '<div class="alert alert-success alert-dismissible fade show my-0 p-2" role="alert">
            <strong>Order Placed successfully</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
        }
 
//     if(isset($_GET['mssg']) && $_GET['mssg']==true){
//     echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
//               <strong>Success!</strong> You are loggedin.
//               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                 <span aria-hidden="true">&times;</span>
//               </button>
//           </div>';
//   }
//     if(isset($_GET['mssg']) && $_GET['mssg']==false){
//     echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
//               <strong>Alert!</strong> '.$showError.'
//               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                 <span aria-hidden="true">&times;</span>
//               </button>
//           </div>';
//   }
//   if(isset($_SESSION['loggedin'])){

//       echo $_SESSION['loggedin'];
//   }
    // if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== false){
    //     echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    //     <strong>Success!</strong> You are logged out successfully.
    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //       <span aria-hidden="true">&times;</span>
    //     </button>
    //         </div>';
    // }
    ?>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" my-40>
            <div class="carousel-item active">
                <a href="Display_shoes_new.php?gender=<?php echo "Male"?>">
                    <img src="img/image-slider-1.jpg" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item">
                <a href="Display_Tshirts.php?gender=<?php echo "Female"?>">
                    <img src="img/image-slider-22.png" class="d-block w-100" alt="...">
                </a>
            </div>
            <div class="carousel-item">

                <img src="img/img-3.jpeg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="ctg">
        <h1>SHOP  BY CATEGORY</h1>
        <div class="cat">
            <div class="cat-1">
            <a href="Display_Tshirts.php?gender=<?php echo "Male"?>">
                <img src="img/tshirts/Male_Tshirt-10.png" alt=""></a>
                <h2>TSHIRTS</h2>
            </div>
            <div class="cat-2">
            <a href="Display_Jeans.php?gender=<?php echo "Female"?>">
                <img src="img/jeans/Female-jeans-20.png" alt=""></a>
                <h2>JEANS</h2>
            </div>
            <div class="cat-3">
                <a href="Display_shoes_new.php?gender=<?php echo "Kids"?>">
                    <img src="img/shoes/Kids_shoes-22.png" alt="no"></a>
                <h2>SHOES</h2>
            </div>
        </div>

    </div>


    <?php 
    include 'partials/footer.php'; ?>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>