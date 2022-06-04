
<!-- For User Login -->
 <?php
      session_start();
      include_once("../database/connection.php");
      $login = 0;
      $invalid_login = 0;
      $con = connection();

  
    
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        
        $username = $_POST['l_username'];
        $password = $_POST['l_password'];

        $adminuser = $_POST['l_username'];
        $adminpass = $_POST['l_password'];
       

        $sql = "SELECT * FROM userregister WHERE regUsername = '$username' && regPassword = '$password'";
        $result = mysqli_query($con,$sql);
        $num = mysqli_num_rows($result);
       
   
       //  Validating if they have an existing account
        if($num > 0){
            $user_fetch = mysqli_fetch_assoc($result);   
            $_SESSION['username'] = $user_fetch['regUsername']; 
            $_SESSION['usernameid'] = $user_fetch['regID']; 
            $_SESSION['useremail'] = $user_fetch['regEmail']; 
            $_SESSION['userphone'] = $user_fetch['regPhone']; 
            $login = 1;
            // echo "<script type='text/javascript'> 
            // alert('Login Successfully');</script>";
            
            header('location:../php/home.php');
        }
        else {    
              $invalid_login = 1;
            //   echo "<script type='text/javascript'> 
            //   alert('Login failed');</script>";
           
        }

        $sql_admin = "SELECT * FROM admin_login WHERE admin_name = '$adminuser' && admin_password = '$adminpass'";
        $admin_result = mysqli_query($con,$sql_admin);

        $num_result = mysqli_num_rows($admin_result);

        if($num_result>0){
            header('location:../admin/index.php');
        }
        else{
            $invalid_login = 1;
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
    <link rel="stylesheet" href="../css/loginreg.css">
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
            

            <div class="form login">
                <span class="title">Login</span>
                <!-- Login Form -->
                <form action="../php/login.php" method="POST">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your username" name="l_username" required>
                        <i class="uil uil-user"></i>
                        <!-- <i class="uil uil-envelope icon"></i> -->
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Enter your password" name="l_password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        
                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <!-- onclick="location.href='../php/home.php';" -->
                      <input type="submit" value="LOGIN" />
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="../php/register.php" class="text signup-link">Signup now</a>
                    </span>
                </div>
            </div>
        </div>
    
        <!-- Already Exist Account Alert -->
    <!-- <?php if($user){echo '<div class="alert alert-danger mt-5" role="alert">Account already exist! Please create another account.</div>';}?> -->
        <!--Successful Creating Account Alert-->
    <?php if($login){echo '<div class="alert alert-success" role="alert">Create Successfully! Login now</div>';}?>
        <!--Not Match in Confirmation Password Alert-->
    <?php if($invalid_login){echo '<div class="alert alert-danger mt-5" role="alert">Invalid Username or Password! Login again.</div>';}?>

    </div>

    <script src="../js/script2.js"></script>

</body>
</html>