<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php';?>
<?php include_once '../helpers/Format.php';?>

<?php 

$pd = new Product();
$fm = new Format();


?>

<?php

if (isset($_GET['delproduct'])) {
  
   $id = $_GET['delproduct'];
   $delproduct = $pd->delprobyid($id); 
}


?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Poduct List</h2>

        <?php 

if (isset($delproduct)) {
    
    echo $delproduct;
 }

        ?>  



        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL No</th>
					<th>Product name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Descripsion</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

<?php 

$getPd = $pd->getAllproduct();
if ($getPd) {
	
	$i=0;
	while ($result = $getPd->fetch_assoc()){
    $i++;
?>

		<tr class="odd gradeX">
			<td><?php echo $i;?></td>
			<td><?php echo $result['productname']; ?></td>
			<td><?php echo $result['catname']; ?></td>
			<td><?php echo $result['brandname']; ?></td>
			<td><?php echo $fm->textShorten($result['body'],50) ; ?></td>
			<td><?php echo $result['price']; ?>$</td>
			<td><img src="<?php echo $result['image'];?>" height="40px" width="60px"/></td>

			<td>
				<?php
	               
	               if ($result['type'] == 0) {
	               	  echo "Featured";
	               }else{
	               	echo "General";
	               }

				  ?>
			 	
			 </td>



			<td><a href="productedit.php?productid=<?php echo $result['productid']; ?>">Edit</a>
              <?php 

                if (Session::get('role')== '0') { ?>
                     || <a onclick="return confirm('Are you sure to Delete data!!')" href="?delproduct=<?php echo $result['productid']; ?>">Delete</a></td>
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
