<?php include_once 'inc/header.php';?>
 

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

    .payment{
    	    display: inline-block;
    padding: 50px 100px;
    text-align: center;
    margin-left: 23%;
    }
    h2 {
    font-size: 30px;
    margin-bottom: 35px;
}

</style>

<div class="payment">
	
	 <h2>Choose you payment option</h2>

	 <div class="btn-checkout">
	   <a href="paymentoffline.php" class="btn checkoutbtn">Cash on delivery</a>
	    <a href="payment.php" class="btn checkoutbtn">Online Payment</a>

	</div>

</div>
  
 <?php include'inc/footer.php';?>