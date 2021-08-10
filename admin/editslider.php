<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/User.php');
 $us= new User();
 $fm= new Format();

 ?>

<?php 

if (!isset($_GET['editid']) || $_GET['editid'] == NULL) {
   
    echo "<script>window.location = 'sliderlist.php';</script>";
}else{

    $id= $_GET['editid'];
}

?>


<?php 

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

 $slideredit = $us->sliderupdatebyid($id,$_POST,$_FILES);
}

?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Slider</h2>
<?php 
   
if (isset($sliderinrt)) {
    echo $sliderinrt;
}
if (isset($slideredit)) {
    echo $slideredit;
}

?>

    <div class="block">

<?php 

  $getslider = $us->getsliderbyid($id);
  if ($getslider) {
  	 while($result = $getslider->fetch_assoc()){
?>


         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">     
                <tr>
                    <td>
                        <label>Title One</label>
                    </td>
                    <td>
                        <input type="text" name="titleone" value="<?php echo $result['titleone'];?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Title Two</label>
                    </td>
                    <td>
                        <input type="text" name="titletwo" value="<?php echo $result['titletwo'];?>" class="medium" />
                    </td>
                </tr>
                  <tr>
                    <td>
                        <label>Title three</label>
                    </td>
                    <td>
                        <input type="text" name="titlethree" value="<?php echo $result['titlethree'];?>" class="medium" />
                    </td>
                </tr>           
    
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                    	<img src="<?php echo $result['image'];?>" height="80px" width="100px" alt=""><br>
                        <input type="file" name="image"/>
                    </td>
                </tr>
               
				<tr>
                    <td></td>
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
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>