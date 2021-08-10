<?php include'inc/header.php';?>

<?php

$login = Session::get("cuslogin");
if ($login ==false) {
	 echo "<script>window.location = 'login.php';</script>";
}
?>


<style type="text/css" media="screen">
 .success{

 	text-align: center;
    padding: 60px;

 }	
</style>

 <div class="container">
 	<div class="success">

 		<?php 

			$cmrid = Session::get("cmrid");
			$amount =$ct->payableamount($cmrid);
			if ($amount) {

				$sum = 0;
				while ($result = $amount->fetch_assoc()) {
					$price = $result['price'];
					$sum =$sum+$price;

				}
		
			?>

		<h2>Order success</h2>
		<h3>total payable Amount (including VAT):$ <?php 
              
              $shiping = 50;
              $total = $sum + $shiping;
              echo $total; 

             ?></h3>
		<h3>thnaks for purchase .Recived your order sucseccfully we will contact you ASPA with delivery detailse <a href="orderdetailse.php" title="">Visit here your detailse</a></h3>
    <?php }else{ ?>
    	echo "<script>window.location = 'cart.php';</script>";
      <?php } ?>

    </div>
 </div>

<?php include'inc/footer.php';?>