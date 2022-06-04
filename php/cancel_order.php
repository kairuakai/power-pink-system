
 <?php
    session_start();
    include_once("../database/connection.php");
    $con = connection();
    
      if(isset($_POST['cancel'])){
        $reject_id = $_POST['id'];


        $reject_query = "DELETE FROM checkout_item WHERE ID='$reject_id'";
        $reject_query_run = mysqli_query($con,$reject_query);

        if($reject_query_run){
            echo "<script type='text/javascript'> 
            alert('Cancel Successfully'); window.location='../php/view_order.php?delete=true' </script>";
            // echo '<script> alert("Delete Succesfully")</script>';
          
        }
        else{
            echo "<script type='text/javascript'> 
            alert('Something Went Wrong'); window.location='../php/view_order.php?delete=false' </script>";
            // echo '<script> alert("Delete Failed")</script>';
        }

     }
 
 ?>