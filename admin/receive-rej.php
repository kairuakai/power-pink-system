
 <?php
    include("../database/connection.php");
    $con = connection();
    
      if(isset($_POST['reject'])){
        $reject_id = $_POST['id'];


        $reject_query = "DELETE FROM receiver_info WHERE ID='$reject_id'";
        $reject_query_run = mysqli_query($con,$reject_query);

        if($reject_query_run){
            echo "<script type='text/javascript'> 
            alert('Delete Successfully'); window.location='view-receiver.php?delete=true' </script>";
            // echo '<script> alert("Delete Succesfully")</script>';
          
        }
        else{
            echo "<script type='text/javascript'> 
            alert('Something Went Wrong'); window.location='view-receiver.php?delete=false' </script>";
            // echo '<script> alert("Delete Failed")</script>';
        }

     }
 
 ?>

<?php
    
      if(isset($_POST['delete'])){
        $reject_id = $_POST['id'];


        $reject_query = "DELETE FROM approve_list WHERE ID='$reject_id'";
        $reject_query_run = mysqli_query($con,$reject_query);

        if($reject_query_run){
            echo "<script type='text/javascript'> 
            alert('Delete Successfully'); window.location='approve.php?delete=true' </script>";
            // echo '<script> alert("Delete Succesfully")</script>';
          
        }
        else{
            echo "<script type='text/javascript'> 
            alert('Something Went Wrong'); window.location='approve.php?delete=false' </script>";
            // echo '<script> alert("Delete Failed")</script>';
        }

     }
 
 ?>

<?php
    
    if(isset($_POST['dlt'])){
      $reject_id = $_POST['id'];


      $reject_query = "DELETE FROM sender_info WHERE ID='$reject_id'";
      $reject_query_run = mysqli_query($con,$reject_query);

      if($reject_query_run){
          echo "<script type='text/javascript'> 
          alert('Delete Successfully'); window.location='view-sender.php?delete=true' </script>";
          // echo '<script> alert("Delete Succesfully")</script>';
        
      }
      else{
          echo "<script type='text/javascript'> 
          alert('Something Went Wrong'); window.location='view-sender.php?delete=false' </script>";
          // echo '<script> alert("Delete Failed")</script>';
      }

   }

?>