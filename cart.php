<?php include'inc/header.php';?>
<?php

if (!isset($_GET['id'])) {
  
  echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
}


?>


<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    
    $cardid = $_POST['cardid'];
    $quantity = $_POST['quantity'];
    $updatecard  = $ct->updatecardquantty($cardid,$quantity);
    if ($quantity <= 0) {
        $delproduct= $ct->delproductbycard($cardid);
    }

  }


?>
<?php 

if (isset($_GET['delpro'])) {
    
    $deltid = $_GET['delpro'];
    $delproduct= $ct->delproductbycard($deltid);
}

?>


<style type="text/css" media="screen">

    .checkoutbtn{
         background: #e73918;
        border-radius: 30px;
        padding: 5px 40px;
        color: white;
        font-size: 16px;
        font-weight: 800;   
    }
    h3.emptycart {
    border: 1px solid gray;
    text-transform: capitalize;
    color: red;
    padding: 10px 10px;
    margin-top: -40px;
    margin-right: 290px;
}

</style>

    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Organic Fruits</h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">ShoppingCart</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain shopping-cart">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                <!--Top banner-->
            

                <!--Cart Table-->
                <div class="shopping-cart-container">
                    <div class="row">
                        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title">Your cart items</h3>



                          
                                <table class="shop_table cart-form">
                                    <thead>
                                    <tr>
                                        <th class="product-name">Product Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-subtotal">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                <?php 

                                $getpro = $ct->getcardproduct();
                                if ($getpro) {

                                    $i=0;
                                    $sum =0;
                                    $qty =0;
                                    
                                    while ($result = $getpro->fetch_assoc()) {
                                     $i++;

                                ?>


                                    <tr class="cart_item">
                                        <td class="product-thumbnail" data-title="Product Name">
                                            <a class="prd-thumb" href="#">
                                                <figure><img width="113" height="113" src="admin/<?php echo $result['image'];?>" alt="shipping cart"></figure>
                                            </a>
                                            <a class="prd-name" href="#"><?php echo $result['productname'];?></a>
                                           
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span><?php echo $result['price'];?></span></ins>
                                               
                                            </div>
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                           <form action="" method="post">

                                                    <input hidden type="number" name="cardid" value="<?php echo $result['cardid'];?>"/>
                                                    <input type="number" name="quantity" value="<?php echo $result['quantity'];?>"/>
                                                    <input type="submit" name="submit" value="Update"/>
                                            </form>
                                        </td>

                                        <td class="product-subtotal" data-title="Total">
                                            <?php

                                                $total =$result['price'] * $result['quantity'];

                                                 echo $total;


                                            ?>Tk
                                            
                                        </td>
                                        
                                        <td class="product-subtotal" data-title="Total">
                                            <div class="action">
                                                
                                                <a href="#" class="remove"></a>
                                                <a class="remove" onclick="return confirm('Are you sure to Delete !!')" href="?delpro=<?php echo $result['cardid'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php
                                     $qty = $qty + $result['quantity'];
                                     $sum= $sum + $total;
                                     Session::set("qty",$qty);
                                     Session::set("sum",$sum);

                                    ?>

                               <?php } } ?>                         
                             
                                    <tr class="cart_item wrap-buttons">
                                        <td class="wrap-btn-control" colspan="4">
                                            <a class="btn back-to-shop" href="index.php">Continue Shoping</a>
                                           
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                           


                             <div style="float:right;" class="checkout">
                                   <?php 

                                  $getdata = $ct->checkcardtable();
                                  if ($getdata) {

                               ?>  

                                
                                 <div class="subtotal-line">
                                    <b class="stt-name">Subtotal :</b>
                                    <span class="stt-price">£<?php echo $sum;?></span>
                                </div>
                                <div class="subtotal-line">
                                    <b class="stt-name">Shipping :</b>
                                    <span class="stt-price">£
                                        
                                        <?php 

                                          $shiping = 50;
                                         
                                          echo $shiping;

                                        ?>

                                   


                                    </span>
                                </div>
                              
                              
                                  <div class="subtotal-line">
                                    <b class="stt-name">Grandtotal :</b>
                                    <span class="stt-price">£<?php $grandtotao= $sum+$shiping;echo $grandtotao;?></span>
                                </div>
                                  <div class="btn-checkout">
                                    <a href="payment.php" class="btn checkoutbtn">Check out</a>
                                </div>

                                <?php }else {  ?>

                                    <h3 class="emptycart">card is empty !!please shop now</h3>  

                                  <?php } ?>

                            </div>



                        </div>
                       
                    </div>
                </div>

          
            </div>
        </div>
    </div>

    <!-- FOOTER -->
  <?php include'inc/footer.php';?>