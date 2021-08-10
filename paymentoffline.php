<?php include_once 'inc/header.php';?>

<?php
if (isset($_GET['orderid']) && $_GET['orderid']=='order' ) {
    
    $cmrid = Session::get("cmrid");
    $insertorder = $ct->insertorder($cmrid);
    $deltdata= $ct->delcustomercard();
    echo "<script>window.location = 'success.php';</script>";
}

?>



<?php

$login = Session::get("cuslogin");
if ($login ==false) {
    echo "<script>window.location = 'login.php';</script>";
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
    .orderbtn{
    	display: block;
    	margin:0 auto;
    	width: 20%;
    }
  	
  </style>

    <!--Order Summary-->
        <div class="container">
                    <div class="col-lg-6 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                        <div class="order-summary sm-margin-bottom-80px">
                            <div class="title-block">
                                <h3 class="title">Order Summary</h3>
                                <a href="#" class="link-forward">Edit cart</a>
                            </div>
                            <div class="cart-list-box short-type">
                            <table class="tblone">
                                <tr>
                                    <th>No</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                
                                </tr>

                            <?php 

                            $getpro = $ct->getcardproduct();
                            if ($getpro) {

                                $i=0;
                                $sum =0;
                                $qty =0;
                                
                                while ($result = $getpro->fetch_assoc()) {
                                 $i++;

                            ?>



                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $result['productname'];?></td>
                            
                                    <td><?php echo $result['price'];?>Tk</td>
                                    <td><?php echo $result['quantity'];?></td>
                                    <td><?php

                                    $total =$result['price'] * $result['quantity'];

                                     echo $total; ?>Tk</td>

                                </tr>
                                <?php
                                 $qty = $qty + $result['quantity'];
                                 $sum= $sum + $total;
                       


                                ?>
                    

                            <?php } } ?>    
                            
                        </table>
                        <table class="tbltwo">
                            <tr>
                                <th>Sub Total : </th>
                                <td><?php echo $sum;?>TK</td>
                            </tr>
                            <tr>
                                <th>Quantity : </th>
                                <td><?php echo $qty; ?></td>
                            </tr>
                            <tr>
                                <th>Shipping Charge :  </th>
                                <td> <?php 

                                          $shiping = 50;
                                         
                                          echo $shiping;

                                        ?>-tk</td>

                            </tr>
                            </tr>
                            
                            <tr>
                                <th>Grand Total :</th>
                                <td><?php
                                  
                                
                                  $gtotal = $shiping + $sum;
                                  echo $gtotal;?> 
                               </td>
                            </tr>

                       </table>

                        </div>
                    </div>
                </div>
                     <div class="col-lg-6 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                        <div class="order-summary sm-margin-bottom-80px">
                            <div class="title-block">
                                <h3 class="title">customer detailse</h3>
                                <a href="editprofile.php" class="link-forward">Edit Profile</a>
                            </div>
                             <div class="contact-info-container  xs-margin-bottom-60px ">
                            <?php 

                                  $id =Session::get("cmrid");
                                  $getdata = $cmr->getcustomerdata($id);
                                  if ($getdata) {

                                    while ($result = $getdata->fetch_assoc()) {
                                
                                ?>

                                <table>
                                        <tr>
                                            <td>Name</td>
                                            <td>:</td>
                                            <td><?php echo $result['name'];?></td>
                                        </tr>

                                        <tr>
                                            <td>Phone</td>
                                            <td>:</td>
                                            <td><?php echo $result['phone'];?></td>
                                        </tr>

                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td><?php echo $result['email'];?></td>
                                        </tr>

                                        <tr>
                                            <td>Address</td>
                                            <td>:</td>
                                            <td><?php echo $result['address'];?></td>
                                        </tr>

                                        <tr>
                                            <td>City</td>
                                            <td>:</td>
                                            <td><?php echo $result['city'];?></td>
                                        </tr>

                                        <tr>
                                            <td>ZIP Cde</td>
                                            <td>:</td>
                                            <td><?php echo $result['zip'];?></td>
                                        </tr>

                                        <tr>
                                            <td>Country</td>
                                            <td>:</td>
                                            <td><?php echo $result['country'];?></td>
                                        </tr>
                                        <tr>
                                            
                                            <td colspan="3"><a href="editprofile.php" title="">Update detailse</a></td>
                                        </tr>
                                
                                </table>

                            <?php } } ?>
                                               
                           
                        </div>
                        </div>
                    </div>
                  </div>

                       <a href="?orderid=order" class="btn checkoutbtn orderbtn">Order now</a>

 <?php include'inc/footer.php';?>