<?php include'inc/header.php';?>

<?php

$login = Session::get("cuslogin");
if ($login ==false) {
	 echo "<script>window.location = 'login.php';</script>";
}
?>


<?php

$cmrid = Session::get("cmrid");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    
    $updatecustomer = $cmr->customerupdate($_POST,$cmrid);

  }


?>









<style type="text/css" media="screen">
input[type="text"], input[type="email"], textarea, input[type="password"], input[type="tel"], select, input[type="search"] {
    border: 1px solid #e6e6e6;
    border-radius: 0;
    padding: 10px 10px;
    outline: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 100%;
}	
</style>
 <div class="container">
<table class="tblone">

<?php 

$id =Session::get("cmrid");
$getdata = $cmr->getcustomerdata($id);
if ($getdata) {

while ($result = $getdata->fetch_assoc()) {

?>
		<form action="" method="post">

			<table class="tblone">

				<?php 
                  if (isset($updatecustomer)) {
                  	 echo  $updatecustomer;
                  }


				?>

				<td colspan="3"><h2>Update Detailse</h2></td>
				
					<tr>
						<td width="20%">Name</td>
					  <td><input type="text" name="name" value="<?php echo $result['name'];?>"></td>
						<td></td>
					</tr>

					<tr>
						<td>Phone</td>
				    <td><input type="text" name="phone" value="<?php echo $result['phone'];?>"></td>
						<td></td>
					</tr>

					<tr>
						<td>Email</td>
				       <td><input type="text" name="email" value="<?php echo $result['email'];?>"></td>
						<td></td>
					</tr>

					<tr>
						<td>Address</td>
			 <td><input type="text" name="address" value="<?php echo $result['address'];?>"></td>
						<td></td>
					</tr>

					<tr>
						<td>City</td>
				<td><input type="text" name="city" value="<?php echo $result['city'];?>"></td>
						
					</tr>

					<tr>
						<td>ZIP Cde</td>
					    <td><input type="text" name="zip" value="<?php echo $result['zip'];?>"></td>
						
					</tr>

					<tr>
						<td>Country</td>
				        <td><input type="text" name="country" value="<?php echo $result['country'];?>"></td>
					</tr>
					<tr>
					   <td></td>
				
						<td><input type="submit" name="submit" value="Save"></td>
					</tr>
					
						
						
			
			</table>

			</form>

			<?php } } ?>

			</tbody>
		</table>

		</div>

<?php include'inc/footer.php';?>