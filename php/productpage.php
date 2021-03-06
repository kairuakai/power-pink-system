<?php
   include_once("../products/component.php");
   include_once("../database/connection.php");
   include_once("../database/getdata.php");
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--==Title==================================-->
    <title></title>
    <!--==Fav-icon===============================-->
    <link rel="shortcut icon" href="../images/fav-icon1.png"/>
    <!--==Using-Font-Awesome=====================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!--==Stylesheet=============================-->
    <link rel="stylesheet" href="../css/products.css">
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
      <div class="logo">
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

<!-- home section starts  -->

<section class="home1" id="home1">

                <div class="box" style="background: url(../images/productbanner.png) no-repeat;">
                    <div class="content">
                        <h3>Shop Now</h3>
                    </div>
                </div>

    </div>

</section>

    <!--Category-->
    <section id="category">
        
        <div class="category-heading">
            <h2>Category</h2>
            <span>All</span>
        </div>
        
        <div class="category-container">
            
            <a href="#" class="category-box">
                <img alt="Fish" src="../images/helmet.png">
                <span>Helmet</span>
            </a>
            
            <a href="#" class="category-box">
                <img alt="Fish" src="../images/grip.png">
                <span>Grip</span>
            </a>
            
            <a href="#" class="category-box">
                <img alt="Fish" src="../images/glove.png">
                <span>Gloves</span>
            </a>
            
            <a href="#" class="category-box">
                <img alt="Fish" src="../images/gear.png">
                <span>Gears</span>
            </a>
            
            <a href="#" class="category-box">
                <img alt="Fish" src="../images/oil.png">
                <span>Oils</span>
            </a>
            
            <a href="#" class="category-box">
                <img alt="Fish" src="../images/mirror.png">
                <span>Mirror</span>
            </a>
            
            <a href="#" class="category-box">
                <img alt="Fish" src="../images/light.png">
                <span>Lights</span>
            </a>
        </div>
        </section>

<!-- Prodcuts -->
<div class="container">

    <h3 class="title"> All products </h3>
   <!-- Product main image -->
    <div class="products-container">
 
      <?php 
      $get_product = getData();
      while($row = mysqli_fetch_assoc($get_product)){
         main_component($row['product_name'],$row['product_price'],$row['product_img'],"p-1");
      }
      ?>
 
   
      
 
    </div>
 
 </div>
 
 <!--Products Preview-->
 <div class="products-preview">
   <!-- Product Preview Images -->
   <?php preview_component("Classic Helmet Racing",2500,"../images/helmet/classic helmet racing ff358.jpg","p-1");?>

   <?php preview_component("Evo GSX Matte Black Helmet",2500,"../images/helmet/Evo GSX 3000 Matte Black Helmet.jpg","p-2");?>

   <?php preview_component("HNJ 902 Pro with Spoiler Full Face Motorcylce Helmet",2500,"../images/helmet/HNJ 902 Pro wspoiler full face motor cycle hemet.jpg","p-3");?>

   <?php preview_component("HNJ motor open face helmet",2500,"../images/helmet/HNJ motor open face helmet.jpg","p-4");?>

   <?php preview_component("Modular Motor Helmet",2500,"../images/helmet/modular moto helmet.jpg","p-5");?>

   <?php preview_component("Black Gloves",2500,"../images/gloves/black.jpg","p-6");?>

  
 

 

   
    
 
 </div>

<!-- Footer -->
<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3><span>Power Pink</span> Motorcyle</h3>
            <a>Corner Block 1, Alley 27, Eastbank road<br> Baranggay San Andres,<br>Cainta Rizal
            <br><br>Copyright ?? 2022 All rights reserved</a>
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

<!-- footer section ends -->











<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="../js/script.js"></script>

</body>
</html>