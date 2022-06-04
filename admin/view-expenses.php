<?php
    include('includes/header.php');

?>
  <div class="container-fluid px-4">
            <h1 class="mt-4">Report</h1>
            <ol class="breadcrumb mb-4">
                  <li class="breadcrumb-item active">Dashboard</li>
                  <li class="breadcrumb-item ">Expenses</li>
            </ol>

            <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List of Expenses</h4>
                    </div>
                    <div class="card-body">
    <div class="table-responsive">

              
     <table class="table table-bordered">
     <tr>
            <th>Product_id</th>
            <th>Category_id</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <!-- <th>Product Image</th> -->
            <th>Product Type</th>
        </tr>

        <?php
             include("../database/connection.php");
             $con = connection();
             $query = "SELECT * FROM products";
             $retval = mysqli_query($con,$query);

             if(mysqli_num_rows($retval)>0){

                while($row = mysqli_fetch_assoc($retval)){
                    echo "<tr>";
                    echo "<td>". $row['product_id']. "</td>";
                    echo "<td>". $row['category_id']. "</td>";
                    echo "<td>". $row['product_name']. "</td>";
                    echo "<td>". $row['product_price']. "</td>";
                    // echo "<td>". $row['product_img']. "</td>";
                    echo "<td>". $row['product_type']. "</td>";
                    ?>

                    <td>
                      <form action='receive-rej.php' method='POST'>
                          <input type="hidden" name="id" value="<?php echo $row['product_id']?>">
                          <input type="submit" name="dlt" class="btn btn-danger" value="Delete">
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