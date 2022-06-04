<?php 
    session_start();
    include_once("../database/connection.php");
    $con = connection();
 // ====== For checkout function
    if($_SERVER["REQUEST_METHOD"]== "POST"){
       
        if(isset($_POST['payorder'])){

            $usernameid = $_POST['user_id'];
            $pname = $_POST['pname'];
            $pprice = $_POST['pprice'];
            $pqty = $_POST['pqty'];
            $p_id = $_POST['p_id'];
            $t_price = $_POST['total_price'];
            $n_item = $_POST['number_item'];
            $location = $_POST['location'];
            $phone_number = $_POST['phone_no'];
            $email = $_POST['email'];
            $date_time = $_POST['date_time'];
            $paymode = $_POST['paymode'];
            
            $checkout_sql = "INSERT INTO checkout_item(username_id,product_id,product_name,product_price,product_quantity,total_price,number_item,location,email,phone_number,date_check,pay_mode) VALUES ('$usernameid','$p_id','$pname','$pprice','$pqty','$t_price','$n_item','$location','$email','$phone_number','$date_time','$paymode')";

            if(mysqli_query($con,$checkout_sql)){
                unset($_SESSION['cart']);
                echo "<script>alert('Checkout Accepted');
                window.location.href='../php/cart.php';
                </script>";

                
            }
            else{
                echo "<script>alert('Checkout Rejected');
                window.location.href='../php/products.php';
                </script>";
            }
            
        }
        else{
            echo "FAILED";
        }

    }

?>