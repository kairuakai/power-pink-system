<?php 

function main_component($productname,$productprice,$productimg,$productid){
    $main_element = <<<END
    <div class="box">
            <form action="../php/products.php" method="post">
               <!--<span class="discount">-10%</span>-->
                <div class="image">
                    <img src="$productimg" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <!--<a href="" class="cart-btn" name="add">add to cart</a>-->
                        <button type="submit" name="add" class="cart-btn">Add to cart</button>
                        <a href="#" class="fas fa-eye"></a>
                        <input type="hidden" name="productid" value="$productid" class="inputValueText">
                    </div>
                </div>
                <div class="content">
                    <h3>$productname</h3>
                    <div class="stars">
                    <i class="fas fa-star fa-2x"></i>
                    <i class="fas fa-star fa-2x"></i>
                    <i class="fas fa-star fa-2x"></i>
                    <i class="fas fa-star fa-2x"></i>
                    <i class="fas fa-star-half-alt fa-2x"></i>
                 </div>
                    <div class="price"> ₱ $productprice <span>₱ 2800</span> </div>
                </div>
            </form>
        </div>

END;
 echo $main_element;

}

function category_component($category_icon){
    $category_comp = <<<END
        <div class="swiper-slide slide">
        <div class="icons1">
            <img src="$category_icon" alt="">
            <div class="info">
            <!-- <a href="#" data-filter = ".grip">Grip</a> -->
            <button data-filter=".HandleGrip">Handle Grip</button>
                </div>
                </div>
        </div>
    END;
    echo $category_comp;
}




//For preview images
function preview_component($prevproduct,$prevprice,$previmg,$prevtarget){
    $preview_element = <<<END
    <div class="preview" data-target="$prevtarget">
    <form action="../php/products.php" method="post">
       <i class="fas fa-times"></i>
       <img src="$previmg" alt="">
       <h3>$prevproduct</h3>
       <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
          <span>( 250 )</span>
       </div>
       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
       <div class="price">₱ $prevprice</div>
       <div class="buttons">
          <a href="#" class="buy" type="submit">buy now</a>
          <a href="../php/login.php" class="cart" type="submit">add to cart</a>
       </div>
       </form>
  </div>
  END; 

  echo $preview_element;
}



?>