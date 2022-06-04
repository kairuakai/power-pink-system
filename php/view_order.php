<?php 
    session_start();
    include_once("../database/connection.php");
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
        <a href="../php/logout.php" class="fa-solid fa-user"></a>

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
   <br>
<div class="table-responsive table-lg">
              
        <table class="table table-bordered">
            <tr>
                <!-- <th>Username ID</th>
                <th>Product ID</th> -->
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Total Price</th>
                <th>Number Item</th>
                <th>Location</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Date Ordered</th>
                <th>Payment Mode</th>
                
            </tr>

        <?php
            
                $uids = $_SESSION['usernameid'];

                // $query = "SELECT product_name,product_price,product_quantity,total_price,number_item,location,email,phone_number,date_check,pay_mode FROM checkout_item WHERE username_id = $uids";

                $query = "SELECT * FROM checkout_item WHERE username_id = $uids";

                $retval = mysqli_query($con,$query);

                if(mysqli_num_rows($retval)>0){

                while($row = mysqli_fetch_array($retval)){
                    echo "<tr>";
                    // echo "<td>". $row['username_id']. "</td>";
                    // echo "<td>". $row['product_id']. "</td>";
                    echo "<td>". $row['product_name']. "</td>";
                    echo "<td>". $row['product_price']. "</td>";
                    echo "<td>". $row['product_quantity']. "</td>";
                    echo "<td>". $row['total_price']. "</td>";
                    echo "<td>". $row['number_item']. "</td>";
                    echo "<td>". $row['location']. "</td>";
                    echo "<td>". $row['email']. "</td>";
                    echo "<td>". $row['phone_number']. "</td>";
                    echo "<td>". $row['date_check']. "</td>";
                    echo "<td>". $row['pay_mode']. "</td>";
                    ?>
                 

                        <td>
                        <form action='../php/cancel_order.php' method='POST'>
                            <input type="hidden" name="id" value="<?php echo $row['id']?>">
                            <input type="submit" name="cancel" class="btn btn-danger" value="Cancel Order">
                        
                        </form>
                        </td>
                    <?php
                
            

                }

                }
                else{
                    echo "0 result";
                }
                
        ?>

        
        </table>
</div>     

</div>

<br>




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
            <a href="#"> <i class="fas fa-envelope"></i> powerpinkmotorcyle@gmail.com </a>
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