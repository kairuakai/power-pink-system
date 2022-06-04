<?php
    include('includes/header.php');
    include("../connection.php");
    $con = connection();

?>
  <div class="container-fluid px-4">
            <h1 class="mt-4">Report</h1>
            <ol class="breadcrumb mb-4">
                  <li class="breadcrumb-item active">Dashboard</li>
                  <li class="breadcrumb-item ">Receiver</li>
            </ol>

            <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Receiver Report</h4>
                    </div>
                    <div class="card-body">
    <div class="table-responsive">

              
     <table class="table table-bordered">
    
          
                <tr>
                    <th>ID</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Number of family</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Street</th>
                    <th>Baranggay</th>
                    <th>Can</th>
                    <th>Noodles</th>
                    <th>Drinks</th>
                    <th>Rice</th>
                    <th>Babyfood</th>
                    <th>Snacks</th>
                    <th>Householdgoods</th>
                    <th>Hygiene</th>
                </tr>
           

            <tbody>
                <?php 
                    $query = "SELECT * FROM receiver_info";
                    $query_run = mysqli_query($con,$query);


                    if($query_run){
                        while($row = mysqli_fetch_array($query_run)){
                            ?>
                            <tr>
                                <td><?php echo $row['ID']; ?></td>
                                <td><?php echo $row['lastname']; ?></td>
                                <td><?php echo $row['firstname']; ?></td>
                                <td><?php echo $row['middlename']; ?></td>
                                <td><?php echo $row['numberoffamily']; ?></td>
                                <td><?php echo $row['contact']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['street']; ?></td>
                                <td><?php echo $row['baranggay']; ?></td>
                                <td><?php echo $row['can']; ?></td>
                                <td><?php echo $row['noodles']; ?></td>
                                <td><?php echo $row['drinks']; ?></td>
                                <td><?php echo $row['rice']; ?></td>
                                <td><?php echo $row['babyfood']; ?></td>
                                <td><?php echo $row['snacks']; ?></td>
                                <td><?php echo $row['householdgoods']; ?></td>
                                <td><?php echo $row['hygiene']; ?></td>

                                <form action="receiver-apr.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['ID'] ?>">
                                    <td><input type="submit" name="reject" class="btn btn-danger" value="Reject"></td>
                                </form>
                            </tr>
                            <?php
                        }
                    }

                ?>
            
            </tbody>
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