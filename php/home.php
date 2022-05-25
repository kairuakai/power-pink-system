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
    <link rel="stylesheet" href="../css/home.css">
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

<!-- header section ends -->

<!-- search form  -->

<div class="search-form">

    <div id="close-search" class="fas fa-times"></div>

    <form action="">
        <input type="search" name="" placeholder="search here..." id="search-box">
        <label for="search-box" class="fas fa-search"></label>
    </form>
</div>

<!-- home section starts  -->

<section class="home" id="home">

    <div class="swiper home-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="box" style="background: url(../images/home-bg-1.png) no-repeat;">
                    <div class="content">
                        <span>Motrocyle</span>
                        <h3>Parts and Accessories</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit unde ex molestias soluta consequatur saepe aliquam, excepturi delectus consequuntur minus!</p>
                        <a href="#" class="btn">Shop Now</a>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box second" style="background: url(../images/home-bg-2.png) no-repeat;">
                    <div class="content">
                        <span>Convinient</span>
                        <h3>Services</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit unde ex molestias soluta consequatur saepe aliquam, excepturi delectus consequuntur minus!</p>
                        <a href="#" class="btn">Shop Now</a>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box" style="background: url(../images/home-bg-3.png) no-repeat;">
                    <div class="content">
                        <span>Affordable</span>
                        <h3>Products</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit unde ex molestias soluta consequatur saepe aliquam, excepturi delectus consequuntur minus!</p>
                        <a href="#" class="btn">Shop Now</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>

<!-- home section ends -->

<section class="abouthome" id="about1">

    <h1 class="headinghome">why choose us?</h1>

    <div class="row">

        <div class="picture-container">
            <img src="../images/best.jpg"></img>
            <h3>Best Motorcyle Shop</h3>
        </div>

        <div class="content">
            <h3>Our Shop</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem cumque sit nemo pariatur corporis perspiciatis aspernatur a ullam repudiandae autem asperiores quibusdam omnis commodi alias repellat illum, unde optio temporibus.</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium ea est commodi incidunt magni quia molestias perspiciatis, unde repudiandae quidem.</p>
            <a href="#" class="btn2">learn more</a>
        </div>

    </div>

</section> 

<!-- about section ends -->

<!-- icons section starts  -->

<section class="icons-container">

    <div class="icons1">
        <img src="../images/icon-1.png" alt="">
        <div class="info">
            <h3>Fast Service</h3>
            <span>on all offers</span>
        </div>
    </div>

    <div class="icons1">
        <img src="../images/icon-2.png" alt="">
        <div class="info">
            <h3>Great Customer Service</h3>
            <span>Convient for customers</span>
        </div>
    </div>

    <div class="icons1">
        <img src="../images/icon-3.png" alt="">
        <div class="info">
            <h3>Monthly Discounts</h3>
            <span>on selected items only</span>
        </div>
    </div>

    <div class="icons1">
        <img src="../images/icon-4.png" alt="">
        <div class="info">
            <h3>Fast Delivery</h3>
            <span>2-5 days shipping</span>
        </div>
    </div>
   
</section>

<!-- featured section starts  -->

<section class="featured" id="featured">

    <h1 class="heading">featured products</h1>

    <div class="swiper product-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="../images/product-1.jpg" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Helmet Racing FF358</h3>
                    <div class="price"> ₱ 1000 </div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="../images/product-2.jpg" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Black Grip</h3>
                    <div class="price"> ₱ 250 </div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="../images/product-3.jpg" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Red Gloves</h3>
                    <div class="price"> ₱ 250</div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="../images/product-4.jpg" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Evo GSX 3000 Helmet</h3>
                    <div class="price"> ₱ 2800 </div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="../images/product-5.jpg" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Red Grip</h3>
                    <div class="price"> ₱ 250 </div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="../images/product-6.jpg" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Black Gloves</h3>
                    <div class="price"> ₱ 250 </div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>

<!-- services section starts  -->

<section class="services" id="services">

    <h1 class="heading">popular services</h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="../images/img-1.jpg" alt="">
            </div>
            <div class="content">
                <h3>Engine Overhaul</h3>
                <p>Depending on the Engine</p>
                <h3>₱ 100 - ₱ 1000</h3>
                <a href="#" class="btn2">learn more</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../images/img-2.jpg" alt="">
            </div>
            <div class="content">
                <h3>Maintenance</h3>
                <p>Depends on how many parts to fix</p>
                <h3>₱ 250 - ₱ 2000</h3>
                <a href="#" class="btn2">learn more</a>
            </div>
        </div>

    </div>

</section>

<!--Map Location-->
<section id="location">
        
    <div class="app-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d287.0114274767808!2d121.10792152288661!3d14.56770207905249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c7be9ec528c1%3A0xccc7d8ccf1012b95!2sCebuana%20Lhuillier%20Pawnshop%20-%20Kabisig%20Floodway!5e0!3m2!1sen!2sph!4v1651920534176!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    
    <div class="location-text">
        <strong>Visit Our Store</strong>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id officiis, ratione, non doloribus similique nam aliquam doloremque, ipsa neque voluptas at recusandae est cumque ipsum. Vel sint libero odit placeat?</p>
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











<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="../js/script.js"></script>

</body>
</html>