<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/User.php');
 $us= new User();
 $fm= new Format();

 ?>

<?php 

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

 $sliderinrt = $us->sliderinserdtdata($_POST,$_FILES);
}

?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Slider</h2>
<?php 
   
if (isset($sliderinrt)) {
    echo $sliderinrt;
}

?>

    <div class="block">

         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">     
                <tr>
                    <td>
                        <label>First Title</label>
                    </td>
                    <td>
                        <input type="text" name="titleone" placeholder="Enter Slider Title..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Second Title</label>
                    </td>
                    <td>
                        <input type="text" name="titletwo" placeholder="Enter Slider Title..." class="medium" />
                    </td>
                </tr>
                  <tr>
                    <td>
                        <label>Third Title</label>
                    </td>
                    <td>
                        <input type="text" name="titlethree" placeholder="Enter Slider Title..." class="medium" />
                    </td>
                </tr>           
    
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
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