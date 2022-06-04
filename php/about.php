<?php 
    session_start();
    include_once("../database/connection.php");
    $con = connection();

     // ===== Check if username have access
     if(empty($_SESSION['username'])){
        echo "<script>window.location ='../php/login.php'</script>";
    }


    if(isset($_POST['submit'])){
        $q_email = $_POST['q_email'];
        $q_mess = $_POST['q_message'];

        $q_sql = "INSERT INTO user_question(email,message) VALUES ('$q_email','$q_mess')";

        if(mysqli_query($con,$q_sql)){
            echo "<script>alert('Question Submitted');
            window.location.href='../php/about.php';
            </script>";
        }else{
            echo "<script>alert('Question Submitted');
            window.location.href='../php/about.php';
            </script>";
        }

    }


?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--==Title==================================-->
    <title>About Us</title>
    <!--==Fav-icon===============================-->
    <link rel="shortcut icon" href="../images/fav-icon1.png"/>
    <!--==Using-Font-Awesome=====================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!--==Stylesheet=============================-->
    <link rel="stylesheet" href="../css/about.css">
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
      
      <a href="" class="fa-solid fa-user"></a>
        <a href="" id="name-user"><?php echo $_SESSION['username']; ?></a>
        <a href="../php/logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>

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

              <div class="box" style="background: url(../images/aboutbanner.png) no-repeat;">
                  <div class="content">
                      <h3>Get to know us</h3>
                  </div>
              </div>

  </div>

</section>

<!-- team section starts  -->

<section class="team">

    <h1 class="heading">our team</h1>

    <div class="box-container">

        <div class="box">
            <img src="../images/place.jpg" alt="">
            <h3>Asnny Aloydan</h3>
            <p>Manager</p>
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
        </div>

        <div class="box">
            <img src="../images/place.jpg" alt="">
            <h3>Rosalie Fontaniel</h3>
            <p>Employee (Manufacturing)</p>
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
        </div>

        <div class="box">
            <img src="../images/place.jpg" alt="">
            <h3>Julius Ariola</h3>
            <p>Employee (Finance)</p>
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
        </div>

        <div class="box">
            <img src="../images/place.jpg" alt="">
            <h3>Jimeno Alamilla</h3>
            <p>Employee (Marketing)</p>
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
        </div>

    </div>

</section>
<!-- about section starts  -->

<section class="about" id="about">

    <div class="image">
        <img src="../images/about-img.jpg" alt="">
    </div>

    <div class="content">
        <h3>About Us</h3>
        <p>Power Pink Motorcycle was founded by Asnny Pichampongan in 20??. Located in Corner Block 1, Alley 27, Eastbank road Baranggay San Andres,Cainta Rizal. Our company provides products and services to the ones who owned a motorcycle.</p>
        <p>Customer service and happiness have always been our primary objectives. From the moment you contact us until your motorcycle is delivered, you will be met by kind, courteous personnel who will be happy to answer any questions you may have. You will always feel at ease about your delivery, whether want to check the progress of your delivery, or want to speak with the driver. We guarantee a hassle-free delivery and services whether you're shipping a new motorcycle part to your house or booking a service to us.</p>
        <a href="#" class="btn2">read more</a>
    </div>

</section>

<!-- inquire section  -->

<section class="inquire1">

    <div class="content">
        <h1 class="heading">inquire now</h1>
        <p>We're available to help answer any questions you may have. Please feel free to contact us at any time!</p>
        <form method="POST">
            <input type="email" name="q_email" placeholder="enter your email" id="" class="email"> <br>
            <br>
            <input type="text" name="q_message" placeholder="enter your message" id="" class="message"> <br><br>
            <input type="submit" value="submit" name="submit" class="btn">
        </form>
        
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

</body>
</html>