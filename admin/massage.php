<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/User.php');
 $us= new User();
 $fm= new Format();

 ?>


 
<?php 

 if (isset($_GET['seenid'])) {
 	$seenid = $_GET['seenid'];
 	$getseencon = $us->updateseenid($seenid);
 }

 

?>
<?php 

 if (isset($_GET['delid'])) {
 	$delid = $_GET['delid'];
 	$detseencon = $us->deleteseenid($delid);
 }

 

?>

 <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
<?php 
 
 if (isset($getseencon)) {
 	 
 	 echo $getseencon;
 }

?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name </th>
							<th>Email</th>
							<th>Phone</th>
							<th>Massage</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php 
						  
						  $getcon = $us->getcontact();
						  if ($getcon) {
						  	  
						  	  $i= 0;
						  	  while ($result = $getcon->fetch_assoc()) {
						  	  $i++;
						?>


						  <tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $result['phone'];?></td>
							<td><?php echo $result['body'];?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td>
							<a href="viewmsg.php?msgid=<?php echo $result['id'];?>">View</a> ||
							<a href="replymsg.php?msgid=<?php echo $result['id'];?>">Reply</a>||
							 <a onclick="return confirm('Are you send to to seen box ?')" href="?seenid=<?php echo $result['id'];?>">Seen

							</td>
						
						
						   </tr>
	               <?php } } ?>	

					</tbody>
				</table>
               </div>
            </div>

             <div class="box round first grid">
                <h2>Seen box</h2>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name </th>
							<th>Email</th>
							<th>Phone</th>
							<th>Massage</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php 
						  
						  $getcon = $us->getseencontactid();
						  if ($getcon) {
						  	  
						  	  $i= 0;
						  	  while ($result = $getcon->fetch_assoc()) {
						  	  $i++;
						?>


						  <tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $result['phone'];?></td>
							<td><?php echo $result['body'];?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td>
							<a href="viewmsg.php?msgid=<?php echo $result['id'];?>">View</a> ||
							<a onclick="return confirm('Are you send to to seen box ?')" href="?delid=<?php echo $result['id'];?>">Delete</a> 

							</td>
						
						
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
