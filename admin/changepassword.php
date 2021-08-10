<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
$filepath = realpath(dirname(__FILE__));
 include ($filepath.'/../classes/User.php');


 ?>

<?php 

$us = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $chngpass = $us->updateuserpass($_POST);
 
}
?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Change Password</h2>
        <?php 
          
          if (isset($chngpass)) {
             echo $chngpass;
          }

        ?>
        <div class="block">               
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <label>Old Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter Old Password..."  name="oldpass" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>New Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter New Password..." name="newpass" class="medium" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>