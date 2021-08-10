<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php';?>

<?php 

$brand = new Brand();

if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
  
  echo "<script>windows.location = 'brandlist.php';</script>";
}else{

  $id = $_GET['brandid'];
}


?>

<?php 



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $brandname = $_POST['brandname'];
   

    $updatebrand = $brand->brandUpdate($brandname,$id);
  }

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Brand</h2>

                <?php 
                   
                   if (isset( $updatebrand)) {
                       echo  $updatebrand;
                   }

                ?>


                <?php 

                 $getbrand= $brand->getbrandById($id);
                 if ($getbrand) {
                  while($result = $getbrand->fetch_assoc()){
                 


                ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandname" value="<?php echo $result['brandname'];?>" class="medium" />
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