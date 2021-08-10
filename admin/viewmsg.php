<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/User.php');
$us= new User();
$fm= new Format();

 ?>


<?php 

if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {
   
    echo "<script>window.location = 'massage.php';</script>";
    
    //header("Location:catlist.php");

}else{

    $id= $_GET['msgid'];
}

?>



        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>User detailse</h2>

<?php 

     if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        echo "<script>window.location = 'massage.php';</script>";

     }



    


      
 ?>



<div class="block">    

<?php 
$getusermsg = $us->getusermsgbyid($id);
if ($getusermsg) {
  while ($postresult = $getusermsg->fetch_assoc()) {
?>

                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input readonly type="text" value="<?php echo $postresult['firstname']; ?>" class="medium" name="name" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Phone</label>
                            </td>
                            <td>
                                <input readonly type="text" value="<?php echo $postresult['phone']; ?>" class="medium" name="username" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input readonly type="text" value="<?php echo $postresult['email']; ?>" class="medium" name="email" />
                            </td>
                        </tr>

                         <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Detailse</label>
                            </td>
                            <td>
                               
                                <textarea name="massage" id="mes-1" cols="30" rows="9" placeholder="Leave Message"><?php echo $postresult['body']; ?></textarea>
                            </td>
                        </tr>
                     
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="ok" />
                            </td>
                        </tr>
                    </table>
                    </form>

              <?php } } ?>


                </div>
            </div>
        </div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
setupTinyMCE();
setDatePicker('date-picker');
$('input[type="checkbox"]').fancybutton();
$('input[type="radio"]').fancybutton();
});
</script>  
<?php include'inc/footer.php';?>

 