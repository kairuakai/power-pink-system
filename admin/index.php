<?php
    include('includes/header.php');
    include("../database/connection.php");
    $con = connection();

?>
  <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                  <li class="breadcrumb-item active">Dashboard</li>
            </ol>

            <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body">Total Users
                                        
                                        <?php 
                                           
                                            $dash_register_query = "SELECT * FROM userregister";
                                            $dash_register_query_run = mysqli_query($con,$dash_register_query);
                                            if($user_total = mysqli_num_rows($dash_register_query_run)){
                                                echo '<h4 class="mb-0">'.$user_total.'</h4>';
                                            }
                                            else{
                                                echo '<h4 class="mb-0">0</h4>';
                                            }
                                        ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="view-register.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Total Expenses
                                    <?php 
                                           
                                           $dash_register_query = "SELECT * FROM products";
                                           $dash_register_query_run = mysqli_query($con,$dash_register_query);
                                           if($user_total = mysqli_num_rows($dash_register_query_run)){
                                               echo '<h4 class="mb-0">'.$user_total.'</h4>';
                                           }
                                           else{
                                               echo '<h4 class="mb-0">0</h4>';
                                           }
                                       ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="view-expenses.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Service Book
                                    <?php 
                                           
                                           $dash_register_query = "SELECT * FROM service_book";
                                           $dash_register_query_run = mysqli_query($con,$dash_register_query);
                                           if($user_total = mysqli_num_rows($dash_register_query_run)){
                                               echo '<h4 class="mb-0">'.$user_total.'</h4>';
                                           }
                                           else{
                                               echo '<h4 class="mb-0">0</h4>';
                                           }
                                       ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="view-booklist.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Total Sales
                                    <?php 
                                           
                                           $dash_register_query = "SELECT SUM(total_price) AS sum FROM checkout_item";
                                           $dash_register_query_run = mysqli_query($con,$dash_register_query);
                                           if($total_sale = mysqli_num_rows($dash_register_query_run)){
                                               while($total_sale = mysqli_fetch_assoc($dash_register_query_run) ){
                                                echo '<h4 class="mb-0">'.$total_sale['sum'].'</h4>';
                                               }
                                               
                                           }
                                           else{
                                               echo '<h4 class="mb-0">0</h4>';
                                           }
                                       ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="approve.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
        </div>

     

<?php
  include('includes/footer.php');
  include('includes/scripts.php');
?>