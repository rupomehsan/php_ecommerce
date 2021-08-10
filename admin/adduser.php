<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/User.php';?>

<?php 

$us = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    

    $insertuser = $us->UserInsert($_POST);
  }

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>

                <?php 
                   
                   if (isset( $insertCat)) {
                       echo  $insertCat;
                   }

                ?>
               <div class="block copyblock"> 
                   <form action="" method="post">
                    <table class="form">

                        <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." class="medium" name="username" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="" class="medium" name="password" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Emial</label>
                            </td>
                            <td>
                                <input type="email" placeholder="" class="medium" name="email" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>User role</label>
                            </td>
                            <td>
                                <select type="password" placeholder="" class="medium" name="role">
                                
                                    <option>Select user role</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Author</option>
                                    <option value="2">Editor</option>
                                </select>
                            </td>
                        </tr>

                         <tr> 
                            <td>
                                
                            </td>
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