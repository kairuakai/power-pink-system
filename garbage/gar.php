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