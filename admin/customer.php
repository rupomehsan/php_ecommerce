<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/Customer.php');

 ?>

<?php 

$cus = new Customer();

if (!isset($_GET['cusid']) || $_GET['cusid'] == NULL) {
  
  echo "<script>windows.location = 'inbox.php';</script>";
}else{

  $id = $_GET['cusid'];
}


?>

<?php 



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

     echo "<script>windows.location = 'inbox.php';</script>";
 
  }

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customer Detailse</h2>

                <?php 
                   
                   if (isset( $updateCat)) {
                       echo  $updateCat;
                   }

                ?>


                <?php 

                 $getCust= $cus->getcustomerdata($id);
                 if ($getCust) {
                  while($result = $getCust->fetch_assoc()){
                 


                ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>

                           <td>Name</td>
                            <td>
                                <input type="text" readonly name="name" value="<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>

                        <tr>

                           <td>address</td>
                            <td>
                                <input type="text" readonly name="address" value="<?php echo $result['address'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>

                           <td>city</td>
                            <td>
                                <input type="text" readonly name="ncityame" value="<?php echo $result['city'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>

                           <td>Zipocode</td>
                            <td>
                                <input type="text" readonly name="zip" value="<?php echo $result['zip'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>

                           <td>phone</td>
                            <td>
                                <input type="text" readonly name="phone" value="<?php echo $result['phone'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>

                           <td>Email</td>
                            <td>
                                <input type="text" readonly name="email" value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>

					             	<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                  <?php } } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>