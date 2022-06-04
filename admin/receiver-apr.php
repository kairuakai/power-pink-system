
 <?php
    include("../database/connection.php");
    $con = connection();
    
      if(isset($_POST['approve'])){
        $approve_id = $_POST['id'];
        $sql = "INSERT INTO approve_list SELECT * FROM receiver_info WHERE ID='$approve_id'";

        $sql_run = mysqli_query($con,$sql);

        $reject_query = "DELETE FROM receiver_info WHERE ID='$approve_id'";
        $reject_query_run = mysqli_query($con,$reject_query);
       
       
        if($sql_run){
           
    
            echo "<script type='text/javascript'> 
            alert('Approved Successfully'); window.location='view-receiver.php?delete=true' </script>";
            // echo '<script> alert("Delete Succesfully")</script>';
          
        }
        else{
            echo "<script type='text/javascript'> 
            alert('Something Went Wrong'); window.location='view-receiver.php?delete=false' </script>";
            // echo '<script> alert("Delete Failed")</script>';
        }

     }
 
 ?>