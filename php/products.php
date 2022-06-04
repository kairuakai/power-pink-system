<?php
    // Session Start
    session_start();
//    session_destroy();
   include_once("../products/component.php");
   include_once("../database/connection.php");
   include_once("../database/getdata.php");
   $con = connection();

    // ===== Check if username have access
    if(empty($_SESSION['username'])){
        echo "<script>window.location ='../php/login.php'</script>";
    }


    //======= Add to cart button function
   if(isset($_POST['add'])){
    // print_r($_POST['productid']);
        $quan = $_POST['qty'];
    // echo "<h1>QUANTITY ".$quan."</h1>";
    if(isset($_SESSION['cart'])){
      
       $item =  array_column($_SESSION['cart'],"product_id","product_price");
       print_r($item);
       if(in_array($_POST['productid'],$item)){
            echo "<script>alert('Product is already added in the cart!') </script>";
            // echo "<script>window.location ='../php/products.php'</script>";
       }else{
         $pid = $_POST['productid'];
         $quan = $_POST['qty'];
         $prodprice = $_POST['prodprice'];
         $uid = $_POST['uid'];
         $count = count($_SESSION['cart']);
         $item_array = array('product_id' => $_POST['productid'],'product_price'=>$_POST['prodprice']);
         $_SESSION['cart'][$count] = $item_array;

         $query = "INSERT INTO cart(userid,productid,qty,productprice) VALUES($uid,$pid,$quan,$prodprice)";
         if(mysqli_query($con,$query)){
            echo "<p>RECORD SAVE</p>";
         }
         else{
            echo "<p>RECORD NOT SAVE</p>";
         }
         

         print_r($_SESSION['cart']);

          
       }
     

    }else{
        $item_array = array('product_id' => $_POST['productid'],'product_price'=>$_POST['prodprice']);
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }

   }

   
?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--==Title==================================-->
    <title>Power Pink</title>
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
        
        <a href="../php/cart.php" class="fas fa-shopping-cart"> <?php if(isset($_SESSION['cart'])){ $count = count($_SESSION['cart'])-1; echo "<span class=\"badge badge-dark\">$count</span>";}else{echo "<span class=\"badge badge-dark\">0</span>";}?></a>
        <div id="search-btn" class="fas fa-search"></div>

        <a href="" class="fa-solid fa-user"></a>
        <a href="" id="name-user"><?php echo $_SESSION['username']; ?></a>
        <a href="../php/logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
    </div>

</header>

<!-- search form  -->

<div class="search-form">

    <div id="close-search" class="fas fa-times"></div>

    <form action="" method="GET">
        <input type="text" name="search" placeholder="search here..." id="search-box" value="<?php if(isset($_GET['search'])){ echo $_GET['search'];} ?>">
       <label for="search-box"> <input type="submit" value="search"></label>
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
   <section class="category-container">

<div class="category-heading">
    <h2>Category</h2>
</div>


<!-- TODO ------ Fix the search filter -->
<div class="swiper category-slider">

<div class="swiper-wrapper">

<div class="swiper-slide slide">
<div class="icons1">
<?php  
        $sql = "SELECT * FROM category WHERE category_product ='Helmet'";
        $result_category = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result_category);
        
        
    ?>
    <img src="<?php echo $row['category_img']; ?>" alt="">
    <div class="info">
        <a href="../php/products.php?cid=<?php echo $row['id']; ?>"><?php echo $row['category_product'];?></a>
        
        
      
    </div>
</div>
</div>

<div class="swiper-slide slide">

    <div class="icons1">
    <?php 
        $sql = "SELECT * FROM category  WHERE category_product ='Grip'";
        $result_category = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result_category);
        
    ?>
        <img src="<?php echo $row['category_img']; ?>" alt="">
        <div class="info">
          <a href="../php/products.php?cid=<?php echo $row['id']; ?>" ><?php echo $row['category_product']; ?></a>
         
        </div>
    </div>
</div>

<div class="swiper-slide slide">
    <div class="icons1">
    <?php 
        $sql = "SELECT * FROM category  WHERE category_product ='Gloves'";
        $result_category = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result_category);
        
    ?>
        <img src="<?php echo $row['category_img']; ?>" alt="">
        <div class="info">
          <a href="../php/products.php?cid=<?php echo $row['id']; ?>" ><?php echo $row['category_product']; ?></a>
        
        </div>
    </div>
</div>

<div class="swiper-slide slide">
    <div class="icons1">
    <?php 
        $sql = "SELECT * FROM category  WHERE category_product ='Mirror'";
        $result_category = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result_category);
        
    ?>
        <img src="<?php echo $row['category_img']; ?>" alt="">
        <div class="info">
          <a href="../php/products.php?cid=<?php echo $row['id']; ?>" ><?php echo $row['category_product']; ?></a>
        
        </div>
    </div>
</div>

<div class="swiper-slide slide">
    <div class="icons1">
    <?php 
        $sql = "SELECT * FROM category  WHERE category_product ='Gear'";
        $result_category = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result_category);
        
    ?>
        <img src="<?php echo $row['category_img']; ?>" alt="">
        <div class="info">
          <a href="../php/products.php?cid=<?php echo $row['id']; ?>" ><?php echo $row['category_product']; ?></a>
        
        </div>
    </div>
</div>

<div class="swiper-slide slide">
    <div class="icons1">
    <?php 
        $sql = "SELECT * FROM category  WHERE category_product ='Oil'";
        $result_category = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result_category);
        
    ?>
        <img src="<?php echo $row['category_img']; ?>" alt="">
        <div class="info">
          <a href="../php/products.php?cid=<?php echo $row['id']; ?>" ><?php echo $row['category_product']; ?></a>
        
        </div>
    </div>
</div>

<div class="swiper-slide slide">
    <div class="icons1">
    <?php 
        $sql = "SELECT * FROM category  WHERE category_product ='Light'";
        $result_category = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result_category);
        
    ?>
        <img src="<?php echo $row['category_img']; ?>" alt="">
        <div class="info">
          <a href="../php/products.php?cid=<?php echo $row['id']; ?>" ><?php echo $row['category_product']; ?></a>
        
        </div>
    </div>
</div>

</div>
<div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

</div>

</section>

<!-- shop section ends -->
<!-- prodcuts section starts  -->

<section class="products" id="products">

    <h1 class="heading">All products</h1>

    <div class="box-container">
        
    <?php 
         error_reporting(E_ERROR | E_PARSE);
         $cid = $_GET['cid'];
       
            if(!empty($cid)){

            $sql1 = "SELECT * FROM products WHERE category_id = $cid";
            $result1 = mysqli_query($con,$sql1);
            while($row = mysqli_fetch_assoc($result1)){
               
           ?>
           <div class="box">
               <form action="../php/products.php" method="post">
                  <!--<span class="discount">-10%</span>-->
                   <div class="image">
                       <img src="<?php echo $row['product_img']; ?>" alt="">
                       <div class="icons">
                           <a href="#" class="fas fa-heart"></a>
                           <!--<a href="" class="cart-btn" name="add">add to cart</a>-->
                           <button type="submit" name="add" class="cart-btn">Add to cart</button>
                           <a href="#" class="fas fa-eye"></a>
                           <input type="hidden" name="productid" value="<?php $pid = $row['product_id']; echo $pid;?>" class="inputValueText">
                           <input type="hidden" name="uid" value="<?php echo $_SESSION['usernameid']; ?>" class="inputValueText">
                       </div>
                   </div>
                   <div class="content">
                       <h3><?php echo $row['product_name']; ?></h3>
                       <div class="stars">
                       <i class="fas fa-star fa-2x"></i>
                       <i class="fas fa-star fa-2x"></i>
                       <i class="fas fa-star fa-2x"></i>
                       <i class="fas fa-star fa-2x"></i>
                       <i class="fas fa-star-half-alt fa-2x"></i>
                    </div>
                       <div class="price"> ₱ <?php echo $row['product_price']; ?> <span>₱ 2800</span> </div>
                       <div class="quantity "> <input type="number" value="0" name="qty" style="font-size: 1.7rem; position:relative;  top: 0; background-color: #FFC2F2; text-align: center;  border-radius: 5px;" required min="1" maxlength="2" >
                         <!-- <input type="text" min="1" maxlength="2" > -->
                         </div>

                   </div>
               </form>
           </div>
   
          <?php  } ?>

          <?php  }
          else {
            $sql1 = "SELECT * FROM products";
            $result1 = mysqli_query($con,$sql1);
            while($row = mysqli_fetch_assoc($result1)){
               
           ?>
           <div class="box">
               <form action="../php/products.php" method="post">
                  <!--<span class="discount">-10%</span>-->
                   <div class="image">
                       <img src="<?php echo $row['product_img']; ?>" alt="">
                       <div class="icons">
                           <a href="#" class="fas fa-heart"></a>
                           <!--<a href="" class="cart-btn" name="add">add to cart</a>-->
                           <button type="submit" name="add" class="cart-btn">Add to cart</button>
                           <a href="#" class="fas fa-eye"></a>
                           <input type="hidden" name="productid" value="<?php echo $row['product_id']; ?>" class="inputValueText">
                           <input type="hidden" name="uid" value="<?php echo $_SESSION['usernameid']; ?>" class="inputValueText">
                       </div>
                   </div>
                   <div class="content">
                       <h3><?php echo $row['product_name']; ?></h3>
                       <div class="stars">
                       <i class="fas fa-star fa-2x"></i>
                       <i class="fas fa-star fa-2x"></i>
                       <i class="fas fa-star fa-2x"></i>
                       <i class="fas fa-star fa-2x"></i>
                       <i class="fas fa-star-half-alt fa-2x"></i>
                    </div>
                       <div class="price"> ₱ <?php echo $row['product_price']; ?> <span>₱ 2800</span> </div>
                       <div class="price"> <input type="hidden" name="prodprice" value="<?php $p = $row['product_price']; echo $p;?>"></div>
                   
                         <div class="quantity "> <input type="number" value="0" name="qty" style="font-size: 1.7rem; position:relative;  top: 0; background-color: #FFC2F2; text-align: center;  border-radius: 5px;" required min="1" maxlength="2" >
                         <!-- <input type="text" min="1" maxlength="2" > -->
                         </div>
                       
                   </div>
                   
               </form>
           </div>
   
          <?php  } ?>

          <?php } ?>

          <!-- Search Function -->
          <?php 
            if(isset($_GET['search'])){
                $filter_values = $_GET['search'];
                $search_query = "SELECT * FROM products WHERE CONCAT(product_name,product_type) LIKE '%$filter_values%'";
                $search_run = mysqli_query($con,$search_query);

                if(mysqli_num_rows($search_run)>0){
                    
                
                    foreach($search_run as $row){  
                    ?>
                    <div class="box">
                        <form action="../php/products.php" method="post">
                           <!--<span class="discount">-10%</span>-->
                            <div class="image">
                                <img src="<?php echo $row['product_img']; ?>" alt="">
                                <div class="icons">
                                    <a href="#" class="fas fa-heart"></a>
                                    <!--<a href="" class="cart-btn" name="add">add to cart</a>-->
                                    <button type="submit" name="add" class="cart-btn">Add to cart</button>
                                    <a href="#" class="fas fa-eye"></a>
                                    <input type="hidden" name="productid" value="<?php $pid = $row['product_id']; echo $pid;?>" class="inputValueText">
                                </div>
                            </div>
                            <div class="content">
                                <h3><?php echo $row['product_name']; ?></h3>
                                <div class="stars">
                                <i class="fas fa-star fa-2x"></i>
                                <i class="fas fa-star fa-2x"></i>
                                <i class="fas fa-star fa-2x"></i>
                                <i class="fas fa-star fa-2x"></i>
                                <i class="fas fa-star-half-alt fa-2x"></i>
                             </div>
                                <div class="price"> ₱ <?php echo $row['product_price']; ?> <span>₱ 2800</span> </div>

                                <div class="quantity "> <input type="number" value="0" name="qty" style="font-size: 1.7rem; position:relative;  top: 0; background-color: #FFC2F2; text-align: center;  border-radius: 5px;" required min="1" maxlength="2" >
                                <!-- <input type="text" min="1" maxlength="2" > -->
                                </div>
                            </div>
                        </form>
                    </div>
            
                   <?php  } 
                   }?>
           <?php } 
        //    else{
        //      echo"<h1>Data not been seach</h1>";
        //     }?>
          
      

    
        
      
  
    
  
       

    </div>

</section>
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

<!-- footer section ends -->











<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="../js/script.js"></script>
<script src="../js/product.js"></script>

<!-- Jquery Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Isotope Plugin -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

</body>
</html>