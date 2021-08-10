<?php include'inc/header.php';?>

<?php

$login = Session::get("cuslogin");
if ($login ==true) {

    header("Location:order.php");

    
}

?>


<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    
    $customerreg = $cmr->customerregtrasion($_POST);

  }


?>


<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    
    $customerlogin = $cmr->customerlogin($_POST);

  }


?>
















<style type="text/css" media="screen">
input[type="text"], input[type="email"], textarea, input[type="password"], input[type="tel"], select, input[type="search"]{
    width: 100%;
}    
</style>

    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Organic Fruits</h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">Authentication</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain login-page">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                <div class="row">

                    <!--Form Sign In-->
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="signin-container">
                              <h3>Customer Login</h3>
                              <?php 

                                if (isset($customerlogin)) {
                                    echo $customerlogin;
                                }

                                ?>

                            <form action="#" name="frm-login" method="post">
                                <p class="form-row">
                                    <label for="fid-name">Email Address:<span class="requite">*</span></label>
                                    <input type="email" id="fid-name" name="email" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Password:<span class="requite">*</span></label>
                                    <input type="password" id="fid-pass" name="password" value="" class="txt-input">
                                </p>
                                <p class="form-row wrap-btn">
                                    <button class="btn btn-submit btn-bold" name="login" type="submit">sign in</button>
                                    <a href="#" class="link-to-help">Forgot your password</a>
                                </p>
                            </form>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                           <div class="register_account">



                               <h3>Register New Account</h3>
                               <?php 

                                    if (isset($customerreg)) {
                                        echo $customerreg;
                                    }

                                    ?>


                                <form action="" method="post">
                                         <table>
                                            <tbody>
                                            <tr>
                                              <td>
                                                <div>
                                                <input type="text" name="name" placeholder="name">
                                                </div>
                                                
                                                <div>
                                                   <input type="text" name="city" placeholder="city">
                                                </div>
                                                
                                                <div>
                                                    <input type="text" name="zip" placeholder="zip code">
                                                </div>
                                                <div>
                                                    <input type="text" name="email" placeholder="Email">
                                                </div>


                                                
                                             </td>
                                            <td>
                                            <div>
                                                <input type="text" name="address" placeholder="address">
                                            </div>
                                             <div>
                                                <input type="text" name="country" placeholder="country">
                                            </div>      
                        
                                       <div>
                                      <input type="text" name="phone" placeholder="phone">
                                      </div>
                                      
                                      <div>
                                        <input type="text" name="password" placeholder="password">
                                    </div>
                                    </td>
                                    </tr> 
                                  </tbody>

                                </table> 
                                  <div class="search"><div><button class="grey" name="register">Create Account </button></div></div>
                               
                                  <div class="clear"></div>
                          </form>
                          </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

  <?php include'inc/footer.php';?>