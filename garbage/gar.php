<?php 
        error_reporting(E_ERROR | E_PARSE);
        $cid = $_GET['cid'];
        if(is_null($cid)){
            $sql1 = "SELECT * FROM products";
            $result1 = mysqli_query($con,$sql1);
            while($row = mysqli_fetch_assoc($result1)){
                main_component($row['product_name'],$row['product_price'],$row['product_img'],$row['product_id'],$row['product_type']);
            }
        }
        else{
            $sql = "SELECT * FROM products WHERE category_id = $cid";
            $result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($result)){
                main_component($row['product_name'],$row['product_price'],$row['product_img'],$row['product_id'],$row['product_type']);
            }
        }
      
       
        // $result = getData();
        // $result = mysqli_query($con,$sql);
        // while($row = mysqli_fetch_assoc($result)){
        //     main_component($row['product_name'],$row['product_price'],$row['product_img'],$row['product_id'],$row['product_type']);
        // }

    ?>

    		<!-- <img src="../images/helmet/Evo GSX 3000 Matte Black Helmet.jpg">
				<div class="item-info">
					<h3 class="item-name">Evo GSX 3000 Matte Black Helmet</h3>
					<h4 class="item-price">₱ 2500</h4>
					<h4 class="item-offer">10%</h4>
					<p class="item-quantity">Qnt: <input value="1" name="">
					<p class="item-remove">
						<i class="fa fa-trash" aria-hidden="true"></i>
						<span class="remove">Remove</span>
					</p>
				</div> -->

            <!-- For checkout -->
                <p>
                    <h4>ORDER SUMMARY</h4>
                </p>

                <p>
                    <span>Total Price</span>
                    <span>₱ 2700</span>
                </p>
                <p>
                    <span>Number of Items</span>
                    <span>2</span>
                </p>

                
                <p>
                    <span>You Save</span>
                    <span>₱ 300</span>
                </p>

                <!-- if(isset($_POST['qty'])){
                            $qty = $_POST['qty'];
    
                            echo "<h1>DATA QUANTITY STORED $qty</h1>";
                        }
                        else{
                            echo "<h1>DATA QUANTITY NOT STORED</h1>";
                        } -->

                        // if(isset($_GET['action'])){
    //     if($_GET['action'] == "clearAll"){
    //         foreach($_SESSION['cart'] as $key => $value){
    //             if($value['product_id'] == $_GET['id']){

    //                 unset($_SESSION['cart'][$key]);
    //                 session_destroy();
    //                 // echo "<script>alert('Product has been removed')</script>";
                
    //                 echo "<script>header('location:../php/cart.php')</script>";
    //             }
    //             else{
    //                 // echo "<script>alert('Product has not been removed')</script>";
    //                 echo "<script>header('location:../php/cart.php')</script>";
    //             }
    //         }
    //     }
    //   }



    <?php 
                        if(isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span>Total Price </span>";
                            // $total = $total;
                            ?>
                            <span>₱ <?php  echo $total; ?> </span>
                            <input type="hidden" value="<?php  echo $total; ?>" name="total_price"> 
                    <?php }
                        else{
                            echo "<span>Total Price </span>";
                            echo "<span>₱ 0 </span>";
                        }
                    ?>




  <!-- Get total request in Can Goods -->
  <?php
            $sql = "SELECT COUNT(*) AS Total FROM approve_list WHERE can='R-can'";
            $sql_result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($sql_result)){
                $output = $row['Total'];
            }
        ?>
    <!-- Get total request in Noodles -->
        <?php
            $sql = "SELECT COUNT(*) AS Total FROM approve_list WHERE noodles='R-noodles'";
            $sql_result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($sql_result)){
                $output1 = $row['Total'];
            }
        ?>

        <!-- Get total request in Drinks -->
        <?php
            $sql = "SELECT COUNT(*) AS Total FROM approve_list WHERE drinks='R-drinks'";
            $sql_result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($sql_result)){
                $output2 = $row['Total'];
            }
        ?>

        <!-- Get total request in Rice -->
        <?php
            $sql = "SELECT COUNT(*) AS Total FROM approve_list WHERE rice='R-rice'";
            $sql_result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($sql_result)){
                $output3 = $row['Total'];
            }
        ?>

         <!-- Get total request in Baby Food -->
         <?php
            $sql = "SELECT COUNT(*) AS Total FROM approve_list WHERE babyfood='R-bfoods'";
            $sql_result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($sql_result)){
                $output4 = $row['Total'];
            }
        ?>

         <!-- Get total request in Baby Snacks -->
         <?php
            $sql = "SELECT COUNT(*) AS Total FROM approve_list WHERE snacks='R-snacks'";
            $sql_result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($sql_result)){
                $output5 = $row['Total'];
            }
        ?>
         <!-- Get total request in House Hold Goods -->
         <?php
            $sql = "SELECT COUNT(*) AS Total FROM approve_list WHERE householdgoods='R-household'";
            $sql_result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($sql_result)){
                $output6 = $row['Total'];
            }
        ?>

         <!-- Get total request in Hygiene -->
         <?php
            $sql = "SELECT COUNT(*) AS Total FROM approve_list WHERE hygiene='R-hygiene'";
            $sql_result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($sql_result)){
                $output7 = $row['Total'];
            }
        ?>






<!-- For graphs -->

        <!-- Get total send in Can Goods -->
        <?php
            $sql = "SELECT COUNT(*) AS Total FROM sender_info WHERE can='S-can'";
            $sql_result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($sql_result)){
                $sender = $row['Total'];
            }
        ?>
    <!-- Get total send in Noodles -->
        <?php
            $sql = "SELECT COUNT(*) AS Total FROM sender_info WHERE noodles='S-noodles'";
            $sql_result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($sql_result)){
                $sender1 = $row['Total'];
            }
        ?>

        <!-- Get total send in Drinks -->
        <?php
            $sql = "SELECT COUNT(*) AS Total FROM sender_info WHERE drinks='S-drinks'";
            $sql_result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($sql_result)){
                $sender2 = $row['Total'];
            }
        ?>

        <!-- Get total send in Rice -->
        <?php
            $sql = "SELECT COUNT(*) AS Total FROM sender_info WHERE rice='S-rice'";
            $sql_result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($sql_result)){
                $sender3 = $row['Total'];
            }
        ?>

         <!-- Get total send in Baby Food -->
         <?php
            $sql = "SELECT COUNT(*) AS Total FROM sender_info WHERE babyfood='S-bfoods'";
            $sql_result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($sql_result)){
                $sender4 = $row['Total'];
            }
        ?>

         <!-- Get total send in Baby Snacks -->
         <?php
            $sql = "SELECT COUNT(*) AS Total FROM sender_info WHERE snacks='S-snacks'";
            $sql_result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($sql_result)){
                $sender5 = $row['Total'];
            }
        ?>
         <!-- Get total send in House Hold Goods -->
         <?php
            $sql = "SELECT COUNT(*) AS Total FROM sender_info WHERE householdgoods='S-household'";
            $sql_result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($sql_result)){
                $sender6 = $row['Total'];
            }
        ?>

         <!-- Get total send in Hygiene -->
         <?php
            $sql = "SELECT COUNT(*) AS Total FROM sender_info WHERE hygiene='S-hygiene'";
            $sql_result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($sql_result)){
                $sender7 = $row['Total'];
            }
        ?>




    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        // var data = google.visualization.arrayToDataTable([
        //   ['Task', 'Hours per Day'],
        //   ['Work',     11],
        //   ['Eat',      2],
        //   ['Commute',  2],
        //   ['Watch TV', 2],
        //   ['Sleep',    7]
        // ]);

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Can',     <?php echo $output;?>],
          ['Noodles', <?php echo $output1;?>],
          ['Drinks', <?php echo $output2;?>],
          ['Rice', <?php echo $output3;?>],
          ['Babyfood', <?php echo $output4;?>],
          ['Snacks', <?php echo $output5;?>],
          ['House Hold Goods', <?php echo $output6;?>],
          ['Hygiene', <?php echo $output7;?>],
        ]);
        var data1 = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Can',     <?php echo $sender;?>],
          ['Noodles', <?php echo $sender1;?>],
          ['Drinks', <?php echo $sender2;?>],
          ['Rice', <?php echo $sender3;?>],
          ['Babyfood', <?php echo $sender4;?>],
          ['Snacks', <?php echo $sender5;?>],
          ['House Hold Goods', <?php echo $sender6;?>],
          ['Hygiene', <?php echo $sender7;?>],
        ]);

        var options = {
          title: 'Most Request Item in Community Pantry',
          legend: 'center',
        };
        var options1 = {
          title: 'Most Send Item in Community Pantry ',
          pieHole: 0.4,

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        var chart1 = new google.visualization.PieChart(document.getElementById('donutchart'));

        chart.draw(data, options);
        chart1.draw(data1, options1);
       
      }
    </script>
    <style>
        body{
            overflow-x: hidden;
        }
    </style>


  <div id="piechart" style="width: 900px; height: 500px; position:relative; left:80vh; z-index:2;"></div>
  <div id="donutchart" style="width: 900px; height: 500px; bottom:500px; right:80px;  position:relative; z-index:1;"></div>




  <!-- For another Totals -->
  <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Total Distribute
                                    <?php 
                                           
                                           $dash_register_query = "SELECT * FROM approve_list";
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
                                        <a class="small text-white stretched-link" href="approve.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>



                 <?php 
                error_reporting(E_ERROR | E_PARSE);
                   $cid = $_GET['cid'];
                   $pid = $_POST['productid'];
                   $total = 0;
                    if(!empty($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'],'product_id');
                       
                        // $product_id = array($_SESSION['cart'],'product_id');
                        // Product fetch data
                        // $sql = "SELECT * FROM products";
                        // $sql = "SELECT * FROM products INNER JOIN cart ON products.product_id=productid";
                        $sql = "SELECT pr.*, ct.* FROM products pr, cart ct WHERE pr.product_id=ct.productid";
                       
                        $result = mysqli_query($con,$sql);
                        
                    while($row = mysqli_fetch_assoc($result)){
                        foreach($product_id as $pid){
                            if($row['product_id'] == $pid){
                                // $quantity = $_SESSION['qty'];
                                $total = $total + (int)$row['product_price'] * (int)$row['qty']; 
                                
                                ?>
                                <form action="" method="POST">
                                	<div class="item">
                                     <img src="<?php echo $row['product_img']; ?>">
                                    <div class="item-info">
                                        <h3 class="item-name"><?php echo $row['product_name']; ?></h3>
                                        <input type="hidden" name="pname" value="<?php echo $row['product_name']; ?>">
                                        <h4 class="item-price">₱ <?php echo $row['product_price']; ?></h4>
                                        <input type="hiddne" name="pprice" value=" <?php echo $row['product_price']; ?>">
                                        <!-- <h4 class="item-offer">10%</h4> -->
                                        <p class="item-quantity">Qty: <?php echo $row['qty']; ?></p>
                                        <input type="hidden" name="pqty" value="<?php echo $row['qty']; ?>">
                                        <!-- <a class="item-quantity"><input  type="submit" value="ADD" name="qty"></p> -->
                                        <p class="item-remove">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            
                                           <a href="../php/cart.php?action=delete&id=<?php echo $row['productid']; ?>"><span class="remove">Remove</span></a>
                                           <input type="hidden" name="p_id" value="<?php echo $row['productid']; ?>">
                                          <!-- <span class="remove">Remove</span> -->
                                        </p>
                                        
                                    </div>
                                </div>
                                </form>
                          <?php  } ?>   

                       <?php } ?>

                <?php } ?>    

            <?php } ?>