<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php';?>



<?php
$brand = new Brand();
if (isset($_GET['delbrand'])) {
  
   $id = $_GET['delbrand'];
   $delbrand = $brand->delbrandbyid($id); 

}
?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                <div class="block">

                <?php 
                 
                 if (isset($delbrand)) {
                 	
                 	echo  $delbrand;

                 }

                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php 
						$getbrand = $brand->getAllbrand();
                        
                        if ($getbrand) {
                        	$i=0;
                        	while ($result = $getbrand->fetch_assoc()){
                            $i++;

						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['brandname'];?></td>
							<td><a href="brandedit.php?brandid=<?php echo $result['brandid']; ?>">Edit</a>

		                <?php 

		                if (Session::get('role')== '0') { ?>
		                     || <a onclick="return confirm('Are you sure to Delete data!!')" href="?delbrand=<?php echo $result['brandid']; ?>">Delete</a></td>
		              <?php } ?>  
							

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

