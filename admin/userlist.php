<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>
<?php include '../classes/User.php';?>
<?php

$us = new User();

	if (isset($_GET['deluser'])) {
	   $id = $_GET['deluser'];
	   $deluser = $us->deluserbyid($id); 
	}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>User  List</h2>



                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th> Name</th>
							<th>user Name</th>
							<th>Email</th>
							<th>Detailse</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					<?php 

                       
                        $getalluser = $us->getalluser();
                        if ($getalluser) {
                        	
                        	$i=0;
                        	while ($result = $getalluser->fetch_assoc()) {
                        		
                        		$i++;

					  ?>
					
						<tr class="even gradeC">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['adminUser']; ?></td>
							<td><?php echo $result['adminUser']; ?></td>
							<td><?php echo $result['adminEmail']; ?></td>
							<td><?php echo $result['adminEmail']; ?></td>
							<td>
							<?php

                             if ($result['role'] == '0') {

                             	echo "Admin";

                             }elseif ($result['role'] == '1'){

                                echo "Author";

                             }elseif ($result['role'] == '2'){

                                echo "Editor";

                             }
	
							 ?>
							 	
							 </td>

							<td><a href="viewuser.php?userid=<?php echo $result['adminId']; ?>">View user</a>
					<?php 

					if (Session::get('userRole')== '0') { ?>

							 || <a onclick="return confirm('Are you sure to delete data?')" href="?deluser=<?php echo $result['adminId']; ?>">delete</a>

					<?php } ?>

							</td>
						</tr>


                       <?php } } ?>

					</tbody>
				</table>
               </div>
            </div>


<script type="text/javascript">

$(document).ready(function () {
setupLeftMenu();

$('.datatable').dataTable();
setSidebarHeight();


});
</script>
<?php include'inc/footer.php';?>
  