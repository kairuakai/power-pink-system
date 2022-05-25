
<!-- For User Registration -->
<?php
      include_once("../database/connection.php");
      $success = 0;
      $user = 0;
      $invalid = 0;
      $con = connection();
    
      if(!isset($_SESSION)){
        session_start();
    }
    
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        
        $regUsername = $_POST['regUsername'];
        $regEmail = $_POST['regEmail'];
        $regPassword = $_POST['regPassword'];
        $cregPassword = $_POST['cregPassword'];

        $sql = "SELECT * FROM userregister WHERE regUsername = '$regUsername'";
        $result = mysqli_query($con,$sql);
   
        $num = mysqli_num_rows($result);
   
       
   
       //  Validating if they have an existing account
        if($num > 0){
            $user = 1;
        }
        else {
           if($regPassword === $cregPassword){
            $reg = "INSERT INTO userregister (regUsername,regEmail,regPassword) VALUES ('$regUsername','$regEmail','$regPassword')";
            $result = mysqli_query($con,$reg);
            
          
                if($result){
                    $success = 1;
                //    header('location:../php/login.php');
                }
           }    
           else{
              $invalid = 1;
           }
        }
   
    }

?>











<!DOCTYPE html>
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!--==Title==================================-->
    <title>Login or Register</title>
    <!--==Fav-icon===============================-->
    <link rel="shortcut icon" href="../images/fav-icon1.png"/>
    <!--==Using-Font-Awesome=====================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!--==Stylesheet=============================-->
    <link rel="stylesheet" href="../try/loginreg.css">
    <!--==Import-Font-Family======================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/f0ae25b9f0.js" crossorigin="anonymous"></script>
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- CSS Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
         
</head>
<body>

    
    <div class="container container-sm">
        <div class="forms">
        
            <!-- Registration Form -->
            <div class="form signup">
                <span class="title">Registration</span>
                <!-- Form for Registration -->
                <form action="../php/register.php" method="POST">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your username" name="regUsername" required >
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="regEmail" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Create a password" name="regPassword" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Confirm a password" name="cregPassword" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="sigCheck">
                            <label for="sigCheck" class="text">Remember me</label>
                        </div>
                        
                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                      <input type="submit" value="SIGN UP" name="submit"/>
                    </div>

               
                </form>

                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="../php/login.php" class="text login-link">Login now</a>
                    </span>
                </div>
            
            </div>
        </div>
    
        <!-- Already Exist Account Alert -->
    <?php if($user){echo '<div class="alert alert-danger mt-5" role="alert">Account already exist! Please create another account.</div>';}?>
        <!--Successful Creating Account Alert-->
    <?php if($success){echo '<div class="alert alert-success" role="alert">Create Successfully! Login now</div>';}?>
        <!--Not Match in Confirmation Password Alert-->
    <?php if($invalid){echo '<div class="alert alert-danger mt-5" role="alert">Password not match! Make sure the password is match.</div>';}?>

    </div>

    <script src="../try/script2.js"></script>

</body>
</html>