<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php';?>

<?php 

$brand = new Brand();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $brandname = $_POST['brandname'];
   

    $insertbrand = $brand->barandInsert($brandname);
  }

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>

                <?php 
                   
                   if (isset( $insertbrand)) {
                       echo  $insertbrand;
                   }

                ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandname" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>