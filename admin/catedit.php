<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php';?>

<?php 

$cat = new Category();

if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
  
  echo "<script>windows.location = 'catlist.php';</script>";
}else{

  $id = $_GET['catid'];
}


?>

<?php 



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $catName = $_POST['catName'];
   

    $updateCat = $cat->catUpdate($catName,$id);
  }

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Category</h2>

                <?php 
                   
                   if (isset( $updateCat)) {
                       echo  $updateCat;
                   }

                ?>


                <?php 

                 $getCat= $cat->getCatById($id);
                 if ($getCat) {
                  while($result = $getCat->fetch_assoc()){
                 


                ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" value="<?php echo $result['catname'];?>" class="medium" />
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