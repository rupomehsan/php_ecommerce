<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/User.php');
 $us= new User();
 $fm= new Format();

 ?>

 <?php 

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

 $slideredit = $us->sliderupdatebyid($id,$_POST,$_FILES);
}

?>
<?php 

if (isset($_GET['delid'])){

    $id= $_GET['delid'];
    $delslider = $us->deltesliderdata($id);
}

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>


        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>No.</th>
					<th> Title One</th>
					<th> Title Two</th>
					<th> Title Three</th>
					<th>Slider Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

	<?php 
	 
      $getslider = $us->getallslider();
      if ($getslider) {
      	$i= 0;
      	while ($result = $getslider->fetch_assoc()) {
        $i++;

     ?>	
	  
		

				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['titleone'];?></td>
					<td><?php echo $result['titletwo'];?></td>
					<td><?php echo $result['titlethree'];?></td>
					<td><img src="<?php echo $result['image'];?>" height="40px" width="60px"/></td>		

					<td>
					 <a href="editslider.php?editid=<?php echo $result['sliderid'];?>">EDIT</a>

               <?php 

                if (Session::get('role')== '0') { ?>
                     ||
					 <a onclick="return confirm('Are you send to to Delete data!! ?')" href="?delid=<?php echo $result['sliderid'];?>">Delete

              <?php } ?>  

					 

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
