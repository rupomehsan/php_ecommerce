<?php

include 'lib/Session.php';
Session::init();

  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
  
include 'lib/Database.php';
include 'helpers/Format.php';

spl_autoload_register(function($class){

include_once "classes/".$class.".php";


});



$db = new Database();
$fm = new Format();
$pd = new Product();
$ct = new Cart();
$cat = new Category();
$cmr = new Customer();
$us = new User();




?>




<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biolife - Organic Food</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/main-color.css">
</head>
<body class="biolife-body">

    <!-- Preloader -->
   <!--  <div id="biof-loading">
        <div class="biof-loading-center">
            <div class="biof-loading-center-absolute">
                <div class="dot dot-one"></div>
                <div class="dot dot-two"></div>
                <div class="dot dot-three"></div>
            </div>
        </div>
    </div> -->

    <!-- HEADER -->
<?php 

if (isset($_GET['cid'])) {
$cmrid = Session::get("cmrid");
$deltdata= $ct->delcustomercard();
Session::destroy();
}

?>  
    <header id="header" class="header-area style-01 layout-03">
        <div class="header-top bg-main hidden-xs">
            <div class="container">
                <div class="top-bar left">
                    <ul class="horizontal-menu">
                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>Organic@company.com</a></li>
                        <li><a href="#">Free Shipping for all Order of $99</a></li>
                    </ul>
                </div>
                <div class="top-bar right">
                    <ul class="social-list">
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    </ul>
                    <ul class="horizontal-menu">
                        <li class="horz-menu-item currency">
                            <select name="currency">
                                <option value="eur">€ EUR (Euro)</option>
                                <option value="usd" selected>$ USD (Dollar)</option>
                                <option value="usd">£ GBP (Pound)</option>
                                <option value="usd">¥ JPY (Yen)</option>
                            </select>
                        </li>
                        <li class="horz-menu-item lang">
                            <select name="language">
                                <option value="fr">French (EUR)</option>
                                <option value="en" selected>English (USD)</option>
                                <option value="ger">Germany (GBP)</option>
                                <option value="jp">Japan (JPY)</option>
                            </select>
                        </li>
                    <?php

                        $login = Session::get("cuslogin");
                        if ($login == false) { ?>

                            <li><a href="login.php" class="login-link"><i class="biolife-icon icon-login"></i>Login</a></li>

                        <?php   }else{ ?>

                        <li><a href="?cid=<?php Session::get("cmrid")?>" class="login-link"><i class="biolife-icon icon-login"></i>Logout</a></li>

                        <?php   } ?>

                    </ul>
                </div>
            </div>
        </div>
        <div class="header-middle biolife-sticky-object ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                        <?php

                          $getwebdoc = $us->getwebdocument();
                          if ($getwebdoc) {
                              while ($result = $getwebdoc->fetch_assoc()) {
                    
                        ?>
                        <a href="index.php" class="biolife-logo"><img src="admin/<?php echo $result['web_logo'];?>" alt="biolife logo" width="135" height="34"></a>
                        <?php } } ?>
                    </div>
                    <div class="col-lg-6 col-md-7 hidden-sm hidden-xs">
                        <div class="primary-menu">
                            <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">
                                <li class="menu-item"><a href="index.php">Home</a></li>
                                   <li class="menu-item"><a href="product.php">Product</a></li>

<?php 

$chkcard =$ct->checkcardtable();
if ($chkcard) { ?>

     <li class="menu-item"><a href="cart.php">Cart</a></li>
     <li class="menu-item"><a href="payment.php">Payment</a></li>
    
<?php } ?>
<?php 

$login = Session::get("cuslogin");
if ($login == true) { ?>

<li class="menu-item"><a href="profile.php">Pofile</a> </li>

  <?php } ?>
  
<?php 
$cmrid = Session::get("cmrid");
$chkorder =$ct->checkorder($cmrid);
if ($chkorder) { ?>

<li><a href="orderdetailse.php">Order</a></li>
    
<?php } ?>
                                

                             
                                <li class="menu-item"><a href="wishlist.php">WishList</a></li>s
                                <li class="menu-item"><a href="contact.php">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-md-6 col-xs-6">
                        <div class="biolife-cart-info">
                            <div class="mobile-search">
                                <a href="javascript:void(0)" class="open-searchbox"><i class="biolife-icon icon-search"></i></a>
                                <div class="mobile-search-content">
                                    <form action="#" class="form-search" name="mobile-seacrh" method="get">
                                        <a href="#" class="btn-close"><span class="biolife-icon icon-close-menu"></span></a>
                                        <input type="text" name="s" class="input-text" value="" placeholder="Search here...">
                                        <select name="category">
                                            <option value="-1" selected>All Categories</option>

                                        </select>
                                        <button type="submit" class="btn-submit">go</button>
                                    </form>
                                </div>
                            </div>
                            <div class="wishlist-block hidden-sm hidden-xs">
                                <a href="wishlist.php" class="link-to">
                                    <span class="icon-qty-combine">
                                        <i class="icon-heart-bold biolife-icon"></i>
                                        <span class="qty">

                                            <?php 
                                            $query= "select * from tbl_wlist where cmrid='$cmrid' order by id desc ";
                                            $msg = $db->select($query);
                                            if ($msg) {
                                                $count = mysqli_num_rows($msg);
                                                echo "$count";

                                            }else{
                                                echo "(0)";

                                            }



                                            ?>

                                       </span>
                                    </span>
                                </a>
                            </div>
                            <div class="minicart-block">
                                <div class="minicart-contain">
                                    <a href="javascript:void(0)" class="link-to">
                                            <span class="icon-qty-combine">
                                                <i class="icon-cart-mini biolife-icon"></i>
                                                <span class="qty">
                                                <?php 
                                                    $sid=session_id();
                                                    $query= "select * from tbl_card where sid='$sid' order by cardid desc ";
                                                    $msg = $db->select($query);
                                                    if ($msg) {
                                                        $count = mysqli_num_rows($msg);
                                                        echo "$count";

                                                    }else{
                                                        echo "0";

                                                    }



                                            ?>

                                                </span>
                                            </span>
                                        <span class="title">My Cart -</span>


                                        <span class="sub-total">$

                                        <?php

                                              $getdata = $ct->checkcardtable();
                                              if ($getdata) {
                                                $sum = Session::get("sum");
                                                $qty = Session::get("qty");
                                                echo $sum."TK"." | Q:".$qty;
                                              }else{
                                                echo "(Empty)";
                                              }


                                           

                                          ?>


                                    </span>
                                    </a>
                                    <div class="cart-content">
                                        <div class="cart-inner">
                                            <ul class="products">
                                                <?php 

                                                    if (isset($_GET['delpro'])) {
                
                                                      $deltid = $_GET['delpro'];
                                                       $delproduct= $ct->delproductbycard($deltid);
                                                        }
                                                        if (isset($delproduct)) {
                                                            echo $delproduct;
                                                        }

                                                 ?>


                                                <?php 
                                                $getpro = $ct->getcardproduct();
                                                if ($getpro) {
                                                    
                                                    while ($result = $getpro->fetch_assoc()) {
                                                ?>

                                                <li>
                                                    <div class="minicart-item">
                                                        <div class="thumb">
                                                            <a href="#"><img src="admin/<?php echo $result['image'];?>" width="90" height="90" alt="National Fresh"></a>
                                                        </div>
                                                        <div class="left-info">
                                                            <div class="product-title"><a href="#" class="product-name"><?php echo $result['productname'];?></a></div>
                                                            <div class="price">
                                                                <ins><span class="price-amount"><span class="currencySymbol">£</span><?php echo $result['price'];?></span></ins>
                                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                            </div>
                                                            <div class="qty">
                                                                <label for="cart[id123][qty]">Qty:</label>
                                                                <input type="number" class="input-qty" name="cart[id123][qty]" id="cart[id123][qty]" value="<?php echo $result['quantity'];?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="action">
                                                            <a href="cart.php" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                             <a href="?delpro=<?php echo $result['cardid'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </li>

                                            <?php } }else{ ?>

                                               <h3 class="emptycart">card is empty !!please shop now</h3>  

                                             <?php }  ?>

                                            </ul>
                                            <p class="btn-control">
                                                <a href="cart.php" class="btn view-cart">view cart</a>
                                                <a href="payment.php" class="btn">checkout</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mobile-menu-toggle">
                                <a class="btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom hidden-sm hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="vertical-menu vertical-category-block">
                            <div class="block-title">
                                <span class="menu-icon">
                                    <span class="line-1"></span>
                                    <span class="line-2"></span>
                                    <span class="line-3"></span>
                                </span>
                                <span class="menu-title">All departments</span>
                                <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                            </div>
                            <div class="wrap-menu">
                                <style type="text/css" media="screen">
                                  .allcat li a{
                                    font-size: 18px;
                                  }   
                                </style>
                                <ul class="menu clone-main-menu allcat">


                                            <?php 
                                              
                                              $getcat = $cat->getAllcat();
                                              if ($getcat) {
                                                 
                                                 while ($result = $getcat->fetch_assoc()) {
                                
                                            ?>

                                             <li><a href="productbycat.php?catid=<?php echo $result['catid'];?>"><?php echo $result['catname'];?></a></li>

                                           <?php } } ?>
                                
                                  

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 padding-top-2px">
                        <div class="header-search-bar layout-01">
                            <form action="search-product.php" class="form-search" name="desktop-seacrh" method="get">
                                <input type="text" name="search" class="input-text" value="" placeholder="Search here...">
                                
                                <button type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
                            </form>
                        </div>
                        <div class="live-info">
                            <p class="telephone"><i class="fa fa-phone" aria-hidden="true"></i><b class="phone-number">(+900) 123 456 7891</b></p>
                            <p class="working-time">Mon-Fri: 8:30am-7:30pm; Sat-Sun: 9:30am-4:30pm</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>