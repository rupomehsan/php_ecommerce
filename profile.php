<?php include'inc/header.php';?>
<?php

$login = Session::get("cuslogin");
if ($login ==false) {
	 echo "<script>window.location = 'login.php';</script>";
}
?>
	




 <div class="container">
<?php 

$id =Session::get("cmrid");
$getdata = $cmr->getcustomerdata($id);
if ($getdata) {

	while ($result = $getdata->fetch_assoc()) {

?>
<table class="tblone">

				<td colspan="3"><h2>Your profile</h2></td>
				
					<tr>
						<td width="20%">Name</td>
						<td width="5%">:</td>
						<td><?php echo $result['name'];?></td>
					</tr>

					<tr>
						<td>Phone</td>
						<td>:</td>
						<td><?php echo $result['phone'];?></td>
					</tr>

					<tr>
						<td>Email</td>
						<td>:</td>
						<td><?php echo $result['email'];?></td>
					</tr>

					<tr>
						<td>Address</td>
						<td>:</td>
						<td><?php echo $result['address'];?></td>
					</tr>

					<tr>
						<td>City</td>
						<td>:</td>
						<td><?php echo $result['city'];?></td>
					</tr>

					<tr>
						<td>ZIP Cde</td>
						<td>:</td>
						<td><?php echo $result['zip'];?></td>
					</tr>

					<tr>
						<td>Country</td>
						<td>:</td>
						<td><?php echo $result['country'];?></td>
					</tr>
					<tr>
						
						<td colspan="3"><a href="editprofile.php" title="">Update detailse</a></td>
					</tr>
			
			</table>
		
	<?php } } ?>

		</div>

<?php include'inc/footer.php';?>