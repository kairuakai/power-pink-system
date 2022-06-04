<?php
    include('includes/header.php');

?>
  <div class="container-fluid px-4">
            <h1 class="mt-4">Report</h1>
            <ol class="breadcrumb mb-4">
                  <li class="breadcrumb-item active">Dashboard</li>
                  <li class="breadcrumb-item ">Book Service List</li>
            </ol>

            <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Book Service</h4>
                    </div>
                    <div class="card-body">
    <div class="table-responsive">

              
     <table class="table table-bordered">
     <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Date</th>
            <th>Number of Service</th>
            <th>Service One</th>
            <th>Service Two</th>
            
        </tr>

        <?php
             include("../database/connection.php");
             $con = connection();
            


             $query = "SELECT * FROM service_book";
             $retval = mysqli_query($con,$query);

             if(mysqli_num_rows($retval)>0){

                while($row = mysqli_fetch_array($retval)){
                    echo "<tr>";
                    echo "<td>". $row['id']. "</td>";
                    echo "<td>". $row['userid']. "</td>";
                    echo "<td>". $row['fullname']. "</td>";
                    echo "<td>". $row['email']. "</td>";
                    echo "<td>". $row['phone']. "</td>";
                    echo "<td>". $row['message']. "</td>";
                    echo "<td>". $row['date']. "</td>";
                    echo "<td>". $row['number_service']. "</td>";
                    echo "<td>". $row['service_one']. "</td>";
                    echo "<td>". $row['service_two']. "</td>";
                    // echo "<td> <button type ='button' class='btn btn-success'>Approve</button> </td>";

                    // echo "<td><button type ='button' class='btn btn-danger'>Reject</button>  </td>";
                    ?>
                    <td>
                    <form action='receiver-apr.php' method='POST'>
                          <input type="hidden" name="id" value="<?php echo $row['id']?>">
                          <input type="submit" name="approve" class="btn btn-success" value="Approve">
                        <!-- <button type ='submit' class='btn btn-danger' name='reject' value='<?php $row['ID']; ?>'>Reject</button>  -->
                     </form>
                     </td>

                     <td>
                      <form action='receive-rej.php' method='POST'>
                          <input type="hidden" name="id" value="<?php echo $row['id']?>">
                          <input type="submit" name="reject" class="btn btn-danger" value="Reject">
                        <!-- <button type ='submit' class='btn btn-danger' name='reject' value='<?php $row['ID']; ?>'>Reject</button>  -->
                     </form>
                     </td>
                    <?php
             
            

                }

             }
             else{
                 echo "0 result";
             }
             
       ?>

       
        <!-- <form action='receiver-apr.php' method='POST'>
         <button type ='submit' class='btn btn-danger' name='reject' value='<?php $row['ID']; ?>'>Reject</button> 
        </form> -->
    </table>
    </div>     

   
                    </div>
                </div>
                <br>
                    <div class="text-center">
                       <button onclick="window.print()" class="btn btn-primary">Print</button>
                      </div>
            </div>

            </div>
            <div style="padding-bottom: 200px;"></div>


<?php
  include('includes/footer.php');
  include('includes/scripts.php');
?>