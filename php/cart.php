
<?php
    // Session Start
    session_start();
    // session_destroy();
    // Connection
    include_once("../products/component.php");
    include_once("../database/connection.php");
    include_once("../database/getdata.php");
    $con = connection();

     // ===== Check if username have access
     if(empty($_SESSION['username'])){
        echo "<script>window.location ='../php/login.php'</script>";
    }


    // TODO -------- Fix delete button
    if(isset($_GET['action'])){
        if($_GET['action'] == "delete"){
            foreach($_SESSION['cart'] as $key => $value){
                if($value['product_id'] == $_GET['id']){
                    $row_del =(int)$_GET['id'];

                    $delete_sql = "DELETE FROM cart WHERE productid =".$row_del;
                    if(mysqli_query($con,$delete_sql)){
                        unset($_SESSION['cart'][$key]);
                        // echo "<script>alert('Product has been removed')</script>";
                
                         echo "<script>header('location:../php/cart.php')</script>";
                    }
                    else{
                        echo "<script>alert('DELETE IN SQL FAILED')</script>";
                        echo "<script>header('location:../php/home.php')</script>";
                    }

                }
                else{
                    // echo "<script>alert('Product has not been removed')</script>";
                    echo "<script>header('location:../php/cart.php')</script>";
                }
            }
        }
      }  
    
      if(isset($_GET['action'])){
            if($_GET['action']=="clearAll"){
                // foreach($_SESSION['cart'] as $key => $value){
                //     unset($_SESSION['cart'][$key]);
                //     session_destroy();
                // }
                $delete_sql = "DELETE FROM cart";
                if(mysqli_query($con,$delete_sql)){
                    unset($_SESSION['cart']);
                    // echo "<script>alert('Product has been removed')</script>";
            
                     echo "<script>header('location:../php/cart.php')</script>";
                }
                else{
                    echo "<script>alert('DELETE IN SQL FAILED')</script>";
                    echo "<script>header('location:../php/home.php')</script>";
                }

               
               
            }
      }
  

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
    <p class="remove-all">
        <i class="fa fa-trash" aria-hidden="true"></i>
        <!-- REMINDER: Something wrong in this line fix it -->
        <a href="../php/cart.php?action=clearAll"><span class="remove">Remove All</span></a>
        <!-- <span class="remove">Remove</span> -->
    </p>

    <p class="see-order">
        <i class="fa-solid fa-cart-shopping" aria-hidden="true"></i>
        <!-- REMINDER: Something wrong in this line fix it -->
        <a href="../php/view_order.php"><span class="remove"> View order</span></a>
        <!-- <span class="remove">Remove</span> -->
    </p>


	<div class="cart">
		<!-- Shopping Cart Fetch Data From Database -->
        <div class="items">
                <?php 
                error_reporting(E_ERROR | E_PARSE);
                   $cid = $_GET['cid'];
                   $pid = $_POST['productid'];
                   $total = 0;
                   $min = 1;
                    if(!empty($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'],'product_id');
                       
                        // $product_id = array($_SESSION['cart'],'product_id');
                        // Product fetch data
                        // $sql = "SELECT * FROM products";
                        // $sql = "SELECT * FROM products INNER JOIN cart ON products.product_id=productid";
                        $sql = "SELECT pr.*, ct.* FROM products pr, cart ct WHERE pr.product_id=ct.productid";
                       
                        $result = mysqli_query($con,$sql);
                        
                    while($row = mysqli_fetch_assoc($result)){
                        foreach($product_id as $pid){
                            if($row['product_id'] == $pid){
                                // $quantity = $_SESSION['qty'];
                                $total = $total + (int)$row['product_price'] * (int)$row['qty']; 
                                $p_id = $row['productid'];
                                $pname = $row['product_name'];
                                $pprice = $row['product_price'];
                                $pqty = $row['qty'];
                                
                                ?>
                                <form action="" method="POST">
                                	<div class="item">
                                     <img src="<?php echo $row['product_img']; ?>">
                                    <div class="item-info">
                                        <h3 class="item-name"><?php echo $row['product_name']; ?></h3>
                                        <input type="hidden" name="pname" value="<?php echo $row['product_name']; ?>">
                                        <h4 class="item-price">₱ <?php echo $row['product_price']; ?></h4>
                                        <input type="hiddne" name="pprice" value=" <?php echo $row['product_price']; ?>">
                                        <!-- <h4 class="item-offer">10%</h4> -->
                                        <p class="item-quantity">Qty: <?php echo $row['qty']; ?></p>
                                        <input type="hidden" name="pqty" value="<?php echo $row['qty']; ?>">
                                        <!-- <a class="item-quantity"><input  type="submit" value="ADD" name="qty"></p> -->
                                        <p class="item-remove">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            
                                           <a href="../php/cart.php?action=delete&id=<?php echo $row['productid']; ?>"><span class="remove">Remove</span></a>
                                           <input type="hidden" name="p_id" value="<?php echo $row['productid']; ?>">
                                          <!-- <span class="remove">Remove</span> -->
                                        </p>
                                        
                                    </div>
                                </div>
                                </form>
                          <?php  } ?>   

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
                
                <form action="../database/purchase.php" method="POST">
                    <p>
                        <h4>ORDER SUMMARY</h4>
                    </p>
                    <p>
                    <?php 
                        if(isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span>Total Price </span>";
                            // $total = $total;
                            ?>
                            <span>₱ <?php  echo $total; ?> </span>
                            <input type="hidden" value="<?php  echo $total; ?>" name="total_price"> 
                    <?php }
                        else{
                            echo "<span>Total Price </span>";
                            echo "<span>₱ 0 </span>";
                        }
                    ?>

                    
                    </p>
               
                    <p>
                    <?php 
                        if(isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']) - 1;
                            if(!empty($count)){
                                echo "<span>Number of items</span>";
                                echo "<span> $count </span>";
                            }
                            
                        }
                        else{
                            echo "<span>Number of items </span>";
                            echo "<span>0</span>";
                        }
                    ?>
                        <input type="hidden" value="<?php echo $count; ?>" name="number_item">
                    </p>

                    
                    <p>
                        <span><i class="fa-solid fa-location-dot"></i> Location</span>
                        <span><input type="text" placeholder="Enter Address" required name="location" style="text-transform: none;"></span>
                        <!-- <span><i class="fa-solid fa-location-dot"></i></span> -->
                    </p>
                    
                    <p>
                        <span><i class="fa-solid fa-envelope"></i></i> Email</span>
                        <span><?php echo $_SESSION['useremail']; ?></span>
                        <input type="hidden" name="email" value="<?php echo $_SESSION['useremail']; ?>">
                    
                    </p>

                    <p>
                        <span><i class="fa-solid fa-mobile-screen"></i> Phone number</span>
                        <span><?php echo $_SESSION['userphone']; ?></span>
                        <input type="hidden" name="phone_no" value="<?php echo $_SESSION['userphone']; ?>">
                    
                    </p>
                  
                    <p>
                        <span><i class="fa-solid fa-calendar"></i> Date</span>
                        <span>  <?php date_default_timezone_set('Asia/Manila'); $time_now = date("Y-m-d H:i"); echo $time_now; ?></span>
                        <input type="hidden" name="date_time" value=" <?php   date_default_timezone_set('Asia/Manila'); $time_now = date("Y-m-d H:i"); echo $time_now; ?>">
                    
                    </p>

                    <p>
                        <span><i class="fa-solid fa-money-bill-wave"></i> Mode of Payment</span>
                        <span>COD</span>
                        <input type="hidden" name="paymode" value="COD">
                    
                    </p>
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['usernameid']; ?>">
                        <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
                        <input type="hidden" name="pname" value="<?php echo $pname; ?>">
                        <input type="hidden" name="pprice" value="<?php echo $pprice; ?>">
                        <input type="hidden" name="pqty" value="<?php echo $pqty; ?>">
                    
                    <input type="submit" value="CHECKOUT" name="payorder" class="checkout">
                </form>

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