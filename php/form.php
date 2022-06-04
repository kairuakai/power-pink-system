<?php 
    session_start();
    include_once("../database/connection.php");
    $con = connection();

     // ===== Check if username have access
     if(empty($_SESSION['username'])){
      echo "<script>window.location ='../php/login.php'</script>";
  }


    if(isset($_POST['submit'])){
        $uid = $_POST['uid'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $date = $_POST['date'];
        $number_service = $_POST['number_service'];
        $service_one = $_POST['service_one'];
        $service_two = $_POST['service_two'];

        $service_sql = "INSERT INTO service_book(userid,fullname,email,phone,message,date,number_service,service_one,service_two) VALUES('$uid','$fullname','$email','$phone','$message','$date','$number_service','$service_one','$service_two')";

        if(mysqli_query($con,$service_sql)){
            echo "<script>alert('Form Submitted');
            window.location.href='../php/services.php';
            </script>";
        }else{
            echo "<script>alert('Form Not Submitted');
            window.location.href='../php/services.php';
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
    <title>Services</title>
    <!--==Fav-icon===============================-->
    <link rel="shortcut icon" href="../images/fav-icon1.png"/>
    <!--==Using-Font-Awesome=====================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!--==Stylesheet=============================-->
    <link rel="stylesheet" href="../css/form.css">
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
                      <h3>Booking</h3>
                  </div>
              </div>

  </div>

</section>

<!--form-->
<div class="container">
    <div class="title">Book a Service</div>

    <div class="content">

      <form method="POST">

        <div class="user-details">

          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" required name="fullname" style="text-transform:none">
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" required name="email" style="text-transform:none">
          </div>

          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="number" placeholder="Enter your number" required name="phone">
          </div>

          <div class="input-box">
            <span class="details">Message</span>
            <input type="text" placeholder="Enter your message" required name="message" style="text-transform:none">
          </div>

          <div class="input-box">
            <label>Booking Date</label>
            <input type="datetime-local" placeholder="Enter your message" required name="date">
          </div>

          <div class="input-box">
            <label>Number of Services you want to avail</label>
              <select required name="number_service">
                <option disabled selected>Select a number</option>
                    <option>1</option>
                    <option>2</option>
              </select>
          </div>

            <span class="title2">! You can only select up to two service per book</span>
            <span class="title3">! You can only select up to two service per book</span>

          <div class="input-box">
            <label>Service No. 1</label>
              <select required name="service_one">
                <option disabled selected>Select a service</option>
                    <option>None</option>
                    <option>Engine Overhaul</option>
                    <option>Maintenance</option>
                    <option>Change Oil</option>
                    <option>Wheel Allignment</option>
                    <option>Bike Washing</option>
                    <option>Maintenance</option>
                    <option>Exhaust System Upgrade</option>
              </select>
          </div>

          <div class="input-box">
            <label>Service No. 2</label>
              <select required name="service_two">
                <option disabled selected>Select a service</option>
                <option>None</option>
                <option>Engine Overhaul</option>
                <option>Maintenance</option>
                <option>Change Oil</option>
                <option>Wheel Allignment</option>
                <option>Bike Washing</option>
                <option>Maintenance</option>
                <option>Exhaust System Upgrade</option>
              </select>
          </div>
        </div>

        <div class="confirm-details">
          <input type="radio" name="gender" id="dot-1" required>
          <span class="confirm-title">Click to confirm</span>
          <div class="category">

            <label for="dot-1">
            <span class="dot one"></span>
            <span class="confirm">I've checked my form twice</span>
          </label>

          </div>
        </div>
      
        <div class="button">
          <input type="submit" name="submit" value="Submit">
          <input type="hidden" name="uid" value="<?php echo $_SESSION['usernameid']; ?>" class="inputValueText">
        </div>
      </form>
    </div>
  </div>

<!--Affiliated Shops-->
<section class="affiliated">

    <div class="swiper affiliated-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide silde"><img src="images/client-logo-1.png" alt=""></div>
            <div class="swiper-slide silde"><img src="images/client-logo-2.png" alt=""></div>
            <div class="swiper-slide silde"><img src="images/client-logo-3.png" alt=""></div>
            <div class="swiper-slide silde"><img src="images/client-logo-4.png" alt=""></div>
        </div>
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













<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="../js/script.js"></script>

</body>
</html>