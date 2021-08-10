<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/User.php';?>

<?php 

$us = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $updatesocal = $us->updatesocial($_POST);
  }

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Social Media</h2>
        <?php 
           
           if (isset($updatesocal)) {
               echo $updatesocal;
           }


        ?>
        <div class="block">               
         <form action="" method="post">
            <?php

             $getsocial = $us->getsocialdata();
             if ($getsocial) {
                 while ($result = $getsocial->fetch_assoc()) {
                     
            ?>
            <table class="form">					
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text" name="facebook" value="<?php echo $result['fb'];?>" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Twitter</label>
                    </td>
                    <td>
                        <input type="text" name="twitter" value="<?php echo $result['tw'];?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>LinkedIn</label>
                    </td>
                    <td>
                        <input type="text" name="youtube" value="<?php echo $result['yt'];?>" class="medium" />
                    </td>
                </tr>
				
				
				
				 <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>

           <?php } } ?>

            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>