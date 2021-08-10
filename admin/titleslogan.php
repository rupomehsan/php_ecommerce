<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/User.php';?>

<?php 

$us = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $updateuser = $us->updatewebdoc($_POST,$_FILES);
  }

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Site Title and Description</h2>

        <?php 

        if (isset($updateuser)) {
            echo  $updateuser;
        }


        ?>
        <div class="block sloginblock">  

<?php 

  $getwebdoc = $us->getwebdocument();
  if ($getwebdoc) {
      while ($result = $getwebdoc->fetch_assoc()) {

?>



         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">					
                <tr>
                    <td>
                        <label>Website Title</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result['web_title'];?>"  name="title" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Website Slogan</label>
                    </td>
                    <td>
                        <input type="text"  value="<?php echo $result['web_slogan'];?>" name="slogan" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Phone</label>
                    </td>
                    <td>
                        <input type="text"  value="<?php echo $result['phone'];?>" name="phone" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text"  value="<?php echo $result['email'];?>" name="email" class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Address</label>
                    </td>
                    <td>
                        <textarea class="tinymce" rows="5"  name="address"><?php echo $result['address'];?></textarea>
                    </td>
                </tr>
				  <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src=" <?php echo $result['web_logo'];?>" height="80px" width="100px" alt=""><br>
                        <input type="file" name="image" />
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

<?php } } ?>

        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>