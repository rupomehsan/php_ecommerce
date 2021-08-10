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
                <h2>Edit massage</h2>

<?php 

     if ($_SERVER['REQUEST_METHOD'] == 'POST') {

         $sendmail = $us->sendusermalbyid($id,$_POST);
         if (isset($sendmail)) {
             echo $sendmail;

         }
    
      }
 ?>



                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">

<?php 

$getmsgbyid = $us->getusermsgbyid($id);
if ($getmsgbyid) {
while ($result = $getmsgbyid->fetch_assoc()) {
?>




                    <table class="form">
                       
                       
                         <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input readonly type="text" value="<?php echo $result['email'];?>" class="medium" name="toEmail" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input  type="email"  class="medium" name="fromEmail" />
                            </td>
                        </tr>
                   
                    
                       
                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input   type="text"  class="medium" name="subject" />
                            </td>
                        </tr>

                           <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Massage</label>
                            </td>
                            <td>
                                <textarea readonly class="tinymce" name="body">
                                   
                                </textarea>
                            </td>
                        </tr>
                        
                     
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
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

 