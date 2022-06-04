<?php 
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['usernameid']);
    session_destroy();
    header('location:../php/login.php');
?>
