<?php 
    $success = 0;
    $user = 0;
     include_once("../database/connection.php");

     $con = connection();


     if(!isset($_SESSION)){
         session_start();
     }

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
         $invalid = '<div class="alert alert-danger" role="alert">
         This is a danger alert—check it out!
            </div>';
     }
     else {
        $reg = "INSERT INTO userregister (regUsername,regEmail,regPassword) VALUES ('$regUsername','$regEmail','$regPassword')";
        $result = mysqli_query($con,$reg);

        if($result){
            $success = 1;
            header('location:../php/login.php');
        }
     }


?>


