
<?php
    // Session Start
    session_start();
    // session_destroy();
    // Connection
    include_once("../products/component.php");
    include_once("../database/connection.php");
    include_once("../database/getdata.php");
    $con = connection();
?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--==Title==================================-->
    <title>Cart</title>
    <!--==Fav-icon===============================-->
    <link rel="shortcut icon" href="../images/fav-icon1.png"/>
    <!--==Using-Font-Awesome=====================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!--==Stylesheet=============================-->
    <link rel="stylesheet" href="../css/cart.css">
    <!--==Import-Font-Family======================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/f0ae25b9f0.js" crossorigin="anonymous"></script>
    <!-- CSS Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
       
</head>
<body>
    
<!-- header section starts  -->

<header class="header">
    
    
      <!--logo-------->
      <div  class="logo">
        <a href="../php/home.php"><img src="../images/logo1.png" alt="#" /></a>
    </div>

    <nav class="navbar">
        <div id="nav-close" class="fas fa-times"></div>
        <a href="../php/home.php">Home</a>
        <a href="../php/about.php">About</a>
        <a href="../php/products.php">Products</a>
        <a href="../php/services.php">Services</a>
    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <a href="../php/cart.php" class="fas fa-shopping-cart"></a>
        <div id="search-btn" class="fas fa-search"></div>
        <a href="../php/login.php" class="fa-solid fa-user"></a>

    </div>

</header>


<!-- search form  -->

<div class="search-form">

    <div id="close-search" class="fas fa-times"></div>

    <form action="">
        <input type="search" name="" placeholder="search here..." id="search-box">
        <label for="search-box" class="fas fa-search"></label>
    </form>
</div>

<!-- Home  -->

<section class="home1" id="home1">

    <div class="box" style="background: url(../images/productbanner.png) no-repeat;">
        <div class="content">
            <h3>Checkout</h3>
        </div>
    </div>

</div>

</section>

<!--Cart-->
<div class="container2">
    
	<h1>Shopping Cart</h1>

	<div class="cart">
		<!-- Shopping Cart Fetch Data From Database -->
        <div class="items">
                <?php 
                error_reporting(E_ERROR | E_PARSE);
                   $cid = $_GET['cid'];
                   $total = 0;
                    if(!empty($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'],'product_id');
                        // $product_id = array($_SESSION['cart'],'product_id');
                        $sql = "SELECT * FROM products";
                        $result = mysqli_query($con,$sql);
    
                    while($row = mysqli_fetch_assoc($result)){
                        
                        foreach($product_id as $pid){
                            if($row['product_id'] == $pid){
                                $total = $total + (int)$row['product_price'];
                                ?>
                                	<div class="item">
                                     <img src="<?php echo $row['product_img']; ?>">
                                    <div class="item-info">
                                        <h3 class="item-name"><?php echo $row['product_name']; ?></h3>
                                        <h4 class="item-price">₱ <?php echo $row['product_price']; ?></h4>
                                        <!-- <h4 class="item-offer">10%</h4> -->
                                        <p class="item-quantity">Qty: <input value="1" name="">
                                        <p class="item-remove">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            <span class="remove">Remove</span>
                                        </p>
                                    </div>
                                </div>
                          <?php } ?>   
                       <?php } ?>
                <?php } ?>          
            <?php } else{
                ?>
                <div class="alert alert-primary" role="alert">
                   <h2>Cart is empty</h2>
                </div>
            <?php } ?>
			
		</div>

        
            <div class="cart-total">
                <p>
                    <h4>ORDER SUMMARY</h4>
                </p>
                <p>
                <?php 
                    if(isset($_SESSION['cart'])){
                        $count = count($_SESSION['cart']);
                        echo "<span>Total Price </span>";
                        ?>
                        <span>₱ <?php echo $total; ?> </span>
                  <?php }
                    else{
                        echo "<span>Total Price </span>";
                        echo "<span>₱ 0 </span>";
                    }
                ?>
                </p>
                <!-- <p>
                    <span>Total Price</span>
                    <span>₱ 2700</span>
                </p> -->

                <!-- <p>
                    <span>Number of Items</span>
                    <span>2</span>
                </p> -->
                <p>
                <?php 
                    if(isset($_SESSION['cart'])){
                        $count = count($_SESSION['cart']);
                        echo "<span>Number of items</span>";
                        echo "<span> $count </span>";
                    }
                    else{
                        echo "<span>Number of items 0</span>";
                    }
                ?>
                </p>

                
                <p>
                    <span>You Save</span>
                    <span>₱ 300</span>
                </p>
                
                <a href="#">CHECKOUT</a>
            </div>
    	
    </div>
</div>

<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3><span>Power Pink</span> Motorcyle</h3>
            <a>Corner Block 1, Alley 27, Eastbank road<br> Baranggay San Andres,<br>Cainta Rizal
            <br><br>Copyright © 2022 All rights reserved</a>
        </div>

        <div class="box">
            <h3>contact informations</h3>
            <a href="#"> <i class="fas fa-phone"></i> 09123456789 </a>
            <a href="#"> <i class="fas fa-envelope"></i> powerpinkmotrcyl@gmail.com </a>
        </div>

        <div class="box">
            <h3>Our Social Media Platforms</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
        </div>

    </div>

    

</section>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="../js/script.js"></script>
</body>
</html>