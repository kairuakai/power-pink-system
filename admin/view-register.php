<?php
    include('includes/header.php');

?>
  <div class="container-fluid px-4">
            <h1 class="mt-4">Users</h1>
            <ol class="breadcrumb mb-4">
                  <li class="breadcrumb-item active">Dashboard</li>
                  <li class="breadcrumb-item ">User</li>
            </ol>

            <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Registered User</h4>
                    </div>
                    <div class="card-body">
                        
     <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Password</th>
                
                 
                </tr>

                <?php
                    include("../database/connection.php");
                    $con = connection();
                    $query = "SELECT * FROM userregister";
                    $retval = mysqli_query($con,$query);

                    if(mysqli_num_rows($retval)>0){

                        while($row = mysqli_fetch_assoc($retval)){
                            echo "<tr>";
                            echo "<td>". $row['regID']. "</td>";
                            echo "<td>". $row['regUsername']. "</td>";
                            echo "<td>". $row['regEmail']. "</td>";
                            echo "<td>". $row['regPhone']. "</td>";
                            echo "<td>". $row['regPassword']. "</td>";                       

                        }

                    }
                    else{
                        echo "0 result";
                    }

            ?>
    </table>

                    </div>
                </div>
                <br>
                <div class="text-center">
                       <button onclick="window.print()" class="btn btn-primary">Print</button>
                 </div>
            </div>

            </div>
<?php
  include('includes/footer.php');
  include('includes/scripts.php');
?>