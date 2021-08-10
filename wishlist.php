<?php include'inc/header.php';?>

<?php 
$cmrid = Session::get("cmrid");
if (isset($_GET['delwlistid'])) {
	$productid = $_GET['delwlistid'];
	$delwlist = $pd->delwishlist($cmrid,$productid);
}

?>


   <div class="container">
 	
		<h2 class="box-title">Your Order Detailse</h2>
     <div class="col-lg-12 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                     <table class="tblone">
							<tr>
								<th>No</th>
								<th>Product Name</th>
								<th>Image</th>
								<th>Price</th>
								<th>Action</th>
								
							</tr>

						<?php 

						$cmrid = Session::get("cmrid");
			            $getpd = $pd->chekwislistdata($cmrid);
						if ($getpd) {

							$i=0;
							while ($result = $getpd->fetch_assoc()) {
						    $i++;

						?>



							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $result['productname'];?></td>
								<td><img src="admin/<?php echo $result['image'];?>" height="80" width="100"/></td>
								
								
								<td><?php

								$total =$result['price'];
								 echo $total;
								 ?>Tk</td>
								<td><a href="detailse.php?proid=<?php echo $result['productid'];?>">Buy now</a> ||
									
									 <a class="remove" onclick="return confirm('Are you sure to Delete !!')" href="?delwlistid=<?php echo $result['productid'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

								</td>
                         

                           

							</tr>
						
				

                        <?php } } ?>	
							
						</table>
                    </div>

 </div>


  <?php include'inc/footer.php';?>