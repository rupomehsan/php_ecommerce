<?php include'inc/header.php';?>

<?php

if (isset($_GET['cmrid'])) {
	
	$id = $_GET['cmrid'];
	$time = $_GET['time'];
	$price = $_GET['price'];

	$confirmed = $ct->confrmproductshifted($id,$time,$price);


}



?>
<?php

$login = Session::get("cuslogin");
if ($login ==false) {

	echo "<script>window.location = 'login.php';</script>";
}
?>











<style type="text/css" media="screen">
h2{
	margin:0 auto;
	display: block;
	width: 30%;
	margin-top: 30px;
}	
</style>

 <div class="container">
 	
		<h2>Your Order Detailse</h2>
     <div class="col-lg-12 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                     <table class="tblone">
							<tr>
								<th>No</th>
								<th>Product Name</th>
								<th>Image</th>
								<th>Quantity </th>
								<th>Price</th>
                               
								<th>Date</th>
								 <th>Status</th>
								<th>Action</th>
								
							</tr>

						<?php 

						$cmrid = Session::get("cmrid");
			            $getorder =$ct->getorderproduct($cmrid);
						if ($getorder) {

							$i=0;
							while ($result = $getorder->fetch_assoc()) {
						    $i++;

						?>



							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $result['productname'];?></td>
								<td><img src="admin/<?php echo $result['image'];?>" height="80" width="100"/></td>
								<td><?php echo $result['quantity'];?></td>
								
								<td><?php

								$total =$result['price'];
								 echo $total;
								 ?>Tk</td>
								
                                <td><?php echo $fm->formatDate($result['date']);?></td>
                             <td>
                             	<?php 

                             	if ($result['status'] == '0') {
                             		
                             		echo "Pending";
                             	}elseif($result['status'] == '1'){

                             	echo "Shifted";

                               	}else{ 
                             		echo "Ok";
                             	}
                               

                               ?>
                             	
                             </td>

                             <?php
                                 
                                 if ($result['status'] == '1') { ?>
                                 	<td><a href="?cmrid=<?php echo $cmrid;?> &price=<?php echo $result['price'];?> &time=<?php echo $result['date'];?>">Confirmed</a> </td>
                                 	
                                 <?php }elseif($result['status'] == '2') { ?>

										<td>OK</td>

                                 	  <?php   }elseif($result['status'] == '0'){ ?>

                                 	  <td>N/A</td>

                                  <?php   } ?>

							</tr>
						
				

                        <?php } } ?>	
							
						</table>
                    </div>

 </div>

<?php include'inc/footer.php';?>