<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../classes/Cart.php');

 $ct= new Cart();
 $fm= new Format();

 ?>

<?php

if (isset($_GET['shiftid'])) {
	
	$id = $_GET['shiftid'];
	$price = $_GET['price'];
	$time = $_GET['time'];

	$shift = $ct->productshifted($id,$time,$price);


}

if (isset($_GET['delproid'])) {
	
	$id = $_GET['delproid'];
	$price = $_GET['price'];
	$time = $_GET['time'];

	$delorder = $ct->delproductshifted($id,$time,$price);


}



?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>

                <?php 

                if (isset($shift)) {
                	echo $shift;
                }
                 if (isset($delorder)) {
                	echo $delorder;
                }


                ?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Id</th>
							<th>Date </th>
							<th>product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Cus Id</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>


						<?php 

                        
                         $getorder = $ct->getallorderproduct();
                         if ($getorder) {


                         	
                         	while ($result = $getorder->fetch_assoc()) {
                      

						?>
						  <tr class="odd gradeX">
							<td><?php echo $result['id'];?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td><?php echo $result['productname'];?></td>
							<td><?php echo $result['quantity'];?></td>
							<td><?php echo $result['price'];?></td>
							<td><?php echo $result['cmrid'];?></td>
							<td><a href="customer.php?cusid=<?php echo $result['cmrid'];?>" title="">view detailse</a></td>

							<?php 
                              
                              if ($result['status'] == '0') { ?>
                              	<td><a href="?shiftid=<?php echo $result['cmrid'];?> &price=<?php echo $result['price'];?> &time=<?php echo $result['date'];?>">Shifted</a> </td>
                              <?php }elseif($result['status'] == '1') { ?>

                              		<td>Pending </td>
 
							  <?php }else { ?>
							  	<td><a href="?delproid=<?php echo $result['cmrid'];?> &price=<?php echo $result['price'];?> &time=<?php echo  $result['date'];?>">Remove</a> </td>

							  		 <?php }  ?>
						
						   </tr>
						     <?php } } ?>

					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
