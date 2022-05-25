<!-- For User Login -->
<?php 
    include_once("../database/connection.php");
    $con = connection();
    $login = 0;
    $invalid_login = 0;

    if(!isset($_SESSION)){
        session_start();
    }

    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $username = $_POST['l_username'];
        $password = $_POST['l_password'];

        $sql = "SELECT * FROM userregister WHERE regUsername = '$username' && regPassword = '$password'";
        $result = mysqli_query($con,$sql);
        $num = mysqli_fetch_array($result);

        if($num > 0){
            $login = 1;
        
            header('location: ../php/home.php');

        }
        else{
            $invalid_login = 1;
            
           
        }

    }

?>
