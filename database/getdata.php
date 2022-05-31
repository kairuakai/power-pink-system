<?php
  include_once("../database/connection.php");


  
  function getData(){
    $con = connection();
    $cid = $_GET['cid'];
    $sql = "SELECT * FROM products WHERE category_id = $cid";

    $results = mysqli_query($con,$sql);

    if(mysqli_num_rows($results)>0){
        return $results;
    }

  }

  // function getData(){
  //   $con = connection();

  //   $sql = "SELECT * FROM products";

  //   $results = mysqli_query($con,$sql);

  //   if(mysqli_num_rows($results)>0){
  //       return $results;
  //   }

  // }

  function getHelmet(){
    $con = connection();

    $sql = "SELECT * FROM products WHERE product_type='Helmet'";

    $results = mysqli_query($con,$sql);

    if(mysqli_num_rows($results)>0){
        return $results;
    }

  }



  function get_prev_data(){
    $con = connection();

    $sql = "SELECT * FROM prev_products";

    $results = mysqli_query($con,$sql);

    if(mysqli_num_rows($results)>0){
        return $results;
    }

  }



?>