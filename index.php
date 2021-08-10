<?php include 'inc/header.php';?>
    <!-- Page Contain -->
<?php include 'inc/slider.php';?>
            <!--Block 02: Banners-->
            <div class="banner-block sm-margin-bottom-76px xs-margin-top-80px sm-margin-top-60px">
                <div class="container">
                    <ul class="biolife-carousel nav-center-bold nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":3, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 2}},{"breakpoint":768, "settings":{ "slidesToShow": 2}}, {"breakpoint":500, "settings":{ "slidesToShow": 1}}]}'>
                        <li>
                            <div class="biolife-banner style-02 biolife-banner__style-02">
                                <div class="banner-contain">
                                    <div class="media">
                                        <a href="#" class="bn-link"><img src="assets/images/home-04/bn_style02-child.png" width="231" height="208" alt=""></a>
                                    </div>
                                    <div class="text-content">
                                        <span class="text1">Sumer Fruit</span>
                                        <b class="text2">100% Pure Natural Fruit Juice</b>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-banner style-03 biolife-banner__style-03">
                                <div class="banner-contain">
                                    <div class="media">
                                        <a href="#" class="bn-link"><img src="assets/images/home-04/bn_style03-child.png" width="218" height="205" alt=""></a>
                                    </div>
                                    <div class="text-content">
                                        <span class="text1">California</span>
                                        <b class="text2">Fresh Fruit</b>
                                        <span class="text3">Association</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-banner style-04 biolife-banner__style-04">
                                <div class="banner-contain">
                                    <div class="media">
                                        <a href="#" class="bn-link"><img src="assets/images/home-04/bn_style04-child.png" width="135" height="206" alt=""></a>
                                    </div>
                                    <div class="text-content">
                                        <span class="text1">Naturally fresh taste</span>
                                        <p class="text2">With <span>25% Off</span> All Teas</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-banner style-02 biolife-banner__style-02">
                                <div class="banner-contain">
                                    <div class="media">
                                        <a href="#" class="bn-link"><img src="assets/images/home-04/bn_style02-child.png" width="231" height="208" alt=""></a>
                                    </div>
                                    <div class="text-content">
                                        <span class="text1">Sumer Fruit</span>
                                        <b class="text2">100% Pure Natural Fruit Juice</b>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-banner style-03 biolife-banner__style-03">
                                <div class="banner-contain">
                                    <div class="media">
                                        <a href="#" class="bn-link"><img src="assets/images/home-04/bn_style03-child.png" width="218" height="205" alt=""></a>
                                    </div>
                                    <div class="text-content">
                                        <span class="text1">California</span>
                                        <b class="text2">Fresh Fruit</b>
                                        <span class="text3">Association</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-banner style-04 biolife-banner__style-04">
                                <div class="banner-contain">
                                    <div class="media">
                                        <a href="#" class="bn-link"><img src="assets/images/home-04/bn_style04-child.png" width="135" height="206" alt=""></a>
                                    </div>
                                    <div class="text-content">
                                        <span class="text1">Naturally fresh taste</span>
                                        <p class="text2">With <span>25% Off</span> All Teas</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!--Block 03: Categories-->
            <div class="wrap-category xs-margin-top-80px sm-margin-top-50px">
                <div class="container">
                    <div class="biolife-title-box style-02 xs-margin-bottom-33px">
                        <span class="subtitle">Hot Categories 2019</span>
                        <h3 class="main-title">Featured Categories</h3>
                        <p class="desc">Natural food is taken from the world's most modern farms with strict safety cycles</p>
                    </div>

                    <ul class="biolife-carousel nav-center-bold nav-none-on-mobile" data-slick='{"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 3}},{"breakpoint":768, "settings":{ "slidesToShow": 2}}, {"breakpoint":500, "settings":{ "slidesToShow": 1}}]}'>
                        
                       <?php 

                          $getcatbyid= $pd->getcatagoryproduct1();
                          if ($getcatbyid) {
                               while ($result = $getcatbyid->fetch_assoc()) {
                      
                       ?>

                        <li>
                            <div class="biolife-cat-box-item">
                                <div class="cat-thumb">
                                    <a href="detailse.php?proid=<?php echo $result['productid'];?>" class="cat-link">
                                        <img src="admin/<?php echo $result['image'];?>" width="277" height="185" alt="">
                                    </a>
                                </div>
                                <a class="cat-info" href="productbycat.php?catid=<?php echo $result['catid'];?>">
                                    <h4 class="cat-name"><?php echo $result['catname'];?></h4>
                                    <span class="cat-number">

                                             <?php 
                                            $query= "select * from tbl_product where catid='1' ";
                                            $msg = $db->select($query);
                                            if ($msg) {
                                                $count = mysqli_num_rows($msg);
                                                echo "($count"." items)";

                                            }else{
                                                echo "(0 items)";

                                            }



                                            ?>
                                          


                                   </span>
                                </a>
                            </div>
                        </li>

                         <?php } } ?>


                          <?php 
                          $getcatbyid= $pd->getcatagoryproduct2();
                          if ($getcatbyid) {
                               while ($result = $getcatbyid->fetch_assoc()) {
                      
                       ?>

                        <li>
                            <div class="biolife-cat-box-item">
                                <div class="cat-thumb">
                                    <a href="detailse.php?proid=<?php echo $result['productid'];?>" class="cat-link">
                                        <img src="admin/<?php echo $result['image'];?>" width="277" height="185" alt="">
                                    </a>
                                </div>
                                <a class="cat-info" href="productbycat.php?catid=<?php echo $result['catid'];?>">
                                    <h4 class="cat-name"><?php echo $result['catname'];?></h4>
                                    <span class="cat-number">  <?php 
                                            $query= "select * from tbl_product where catid='2' ";
                                            $msg = $db->select($query);
                                            if ($msg) {
                                                $count = mysqli_num_rows($msg);
                                                echo "($count"." items)";

                                            }else{
                                                echo "(0 items)";

                                            }



                                            ?></span>
                                </a>
                            </div>
                        </li>

                        <?php } } ?>

                          <?php 
                          $getcatbyid= $pd->getcatagoryproduct3();
                          if ($getcatbyid) {
                               while ($result = $getcatbyid->fetch_assoc()) {
                      
                       ?>

                        <li>
                            <div class="biolife-cat-box-item">
                                <div class="cat-thumb">
                                    <a href="detailse.php?proid=<?php echo $result['productid'];?>" class="cat-link">
                                        <img src="admin/<?php echo $result['image'];?>" width="277" height="185" alt="">
                                    </a>
                                </div>
                                <a class="cat-info" href="productbycat.php?catid=<?php echo $result['catid'];?>">
                                    <h4 class="cat-name"><?php echo $result['catname'];?></h4>
                                    <span class="cat-number">  <?php 
                                            $query= "select * from tbl_product where catid='3' ";
                                            $msg = $db->select($query);
                                            if ($msg) {
                                                $count = mysqli_num_rows($msg);
                                                echo "($count"." items)";

                                            }else{
                                                echo "(0 items)";

                                            }



                                            ?></span>
                                </a>
                            </div>
                        </li>

                        <?php } } ?>

                          <?php 
                          $getcatbyid= $pd->getcatagoryproduct4();
                          if ($getcatbyid) {
                               while ($result = $getcatbyid->fetch_assoc()) {
                      
                       ?>

                        <li>
                            <div class="biolife-cat-box-item">
                                <div class="cat-thumb">
                                    <a href="detailse.php?proid=<?php echo $result['productid'];?>" class="cat-link">
                                        <img src="admin/<?php echo $result['image'];?>" width="277" height="185" alt="">
                                    </a>
                                </div>
                                <a class="cat-info" href="productbycat.php?catid=<?php echo $result['catid'];?>">
                                    <h4 class="cat-name"><?php echo $result['catname'];?></h4>
                                    <span class="cat-number">  <?php 
                                            $query= "select * from tbl_product where catid='4' ";
                                            $msg = $db->select($query);
                                            if ($msg) {
                                                $count = mysqli_num_rows($msg);
                                                echo "($count"." items)";

                                            }else{
                                                echo "(0 items)";

                                            }



                                            ?></span>
                                </a>
                            </div>
                        </li>

                        <?php } } ?>
                        <li>
                            <div class="biolife-cat-box-item">
                                <div class="cat-thumb">
                                    <a href="#" class="cat-link">
                                        <img src="assets/images/home-04/cat-thumb01.jpg" width="277" height="185" alt="">
                                    </a>
                                </div>
                                <a class="cat-info" href="#">
                                    <h4 class="cat-name">Fresh Fruit</h4>
                                    <span class="cat-number">(20 items)</span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-cat-box-item">
                                <div class="cat-thumb">
                                    <a href="#" class="cat-link">
                                        <img src="assets/images/home-04/cat-thumb02.jpg" width="277" height="185" alt="">
                                    </a>
                                </div>
                                <a class="cat-info" href="#">
                                    <h4 class="cat-name">Drink Fruits</h4>
                                    <span class="cat-number">(220 items)</span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-cat-box-item">
                                <div class="cat-thumb">
                                    <a href="#" class="cat-link">
                                        <img src="assets/images/home-04/cat-thumb03.jpg" width="277" height="185" alt="">
                                    </a>
                                </div>
                                <a class="cat-info" href="#">
                                    <h4 class="cat-name">vegetables</h4>
                                    <span class="cat-number">(350 items)</span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-cat-box-item">
                                <div class="cat-thumb">
                                    <a href="#" class="cat-link">
                                        <img src="assets/images/home-04/cat-thumb04.jpg" width="277" height="185" alt="">
                                    </a>
                                </div>
                                <a class="cat-info" href="#">
                                    <h4 class="cat-name">Dried Fruits</h4>
                                    <span class="cat-number">(520 items)</span>
                                </a>
                            </div>
                        </li>
                    </ul>

                    <div class="biolife-service type01 biolife-service__type01 sm-margin-top-25px xs-margin-top-65px">
                        <ul class="services-list">
                            <li>
                                <div class="service-inner">
                                    <span class="number">1</span>
                                    <span class="biolife-icon icon-beer"></span>
                                    <a class="srv-name" href="#">full stamped product</a>
                                </div>
                            </li>
                            <li>
                                <div class="service-inner">
                                    <span class="number">2</span>
                                    <span class="biolife-icon icon-schedule"></span>
                                    <a class="srv-name" href="#">place and delivery on time</a>
                                </div>
                            </li>
                            <li>
                                <div class="service-inner">
                                    <span class="number">3</span>
                                    <span class="biolife-icon icon-car"></span>
                                    <a class="srv-name" href="#">Free shipping in the city</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--Block 04: Product Tabs-->
            <div class="product-tab z-index-20 sm-margin-top-80px xs-margin-top-20px">
                <div class="container">
                    <div class="biolife-title-box slim-item">
                        <span class="subtitle">All the best item for You</span>
                        <h3 class="main-title">All Products</h3>
                    </div>
                    <div class="biolife-tab biolife-tab-contain sm-margin-top-23px">
                        <div class="tab-head tab-head__sample-layout">
                            <ul class="tabs">
                                <li class="tab-element active">
                                    <a href="#tab01_1st" class="tab-link">Featured </a>
                                </li>
                                <li class="tab-element" >
                                    <a href="#tab01_2nd" class="tab-link">New Product</a>
                                </li>
                                <li class="tab-element" >
                                    <a href="#tab01_3rd" class="tab-link">On Sale</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div id="tab01_1st" class="tab-contain active">
                                <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":1 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "rows":2, "slidesMargin":15}}]}'>
                                     
                                         <?php 

                                            $getfpd = $pd->getfeatureproduct();

                                            if ($getfpd) {

                                                while ($result = $getfpd->fetch_assoc()) {
                                                    
                                        ?>

                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="detailse.php" class="link-to-product">
                                                    <img src="admin/<?php echo $result['image'];?>" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="detailse.php"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories"><?php echo $result['catname'];?></b>
                                                <h4 class="product-title"><a href="detailse.php?proid=<?php echo $result['productid'];?>" class="pr-name"><?php echo $result['productname'];?></a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span><?php echo $result['price'];?></span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="slide-down-box">
                                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                                    <div class="buttons">
                                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                        <a href="detailse.php?proid=<?php echo $result['productid'];?>" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                  <?php } } ?>
                            
                             
                                </ul>
                            </div>
                            <div id="tab01_2nd" class="tab-contain ">
                                <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":1 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "rows":2, "slidesMargin":15}}]}'>

                                      <?php 

                                            $getfpd = $pd->getnewproduct();

                                            if ($getfpd) {

                                                while ($result = $getfpd->fetch_assoc()) {
                                                    
                                        ?>

                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="detailse.php" class="link-to-product">
                                                    <img src="admin/<?php echo $result['image'];?>" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="detailse.php"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                
                                                <h4 class="product-title"><a href="detailse.php?proid=<?php echo $result['productid'];?>" class="pr-name"><?php echo $result['productname'];?></a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span><?php echo $result['price'];?></span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="slide-down-box">
                                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                                    <div class="buttons">
                                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                        <a href="detailse.php?proid=<?php echo $result['productid'];?>" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                  <?php } } ?>

                                </ul>
                            </div>
                            <div id="tab01_3rd" class="tab-contain ">
                                <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":1 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "rows":2, "slidesMargin":15}}]}'>
                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="assets/images/products/p-05.jpg" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Organic Hass Avocado, Large</a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="slide-down-box">
                                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                                    <div class="buttons">
                                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="assets/images/products/p-02.jpg" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Hot Chili Peppers Magnetic Salt</a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="slide-down-box">
                                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                                    <div class="buttons">
                                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="assets/images/products/p-01.jpg" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Organic Hass Avocado</a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="slide-down-box">
                                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                                    <div class="buttons">
                                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="assets/images/products/p-06.jpg" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Packham's Pears</a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="slide-down-box">
                                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                                    <div class="buttons">
                                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="assets/images/products/p-07.jpg" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">13 Healing Powers of Lemons</a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="slide-down-box">
                                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                                    <div class="buttons">
                                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="assets/images/products/p-18.jpg" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="slide-down-box">
                                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                                    <div class="buttons">
                                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="assets/images/products/p-20.jpg" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="slide-down-box">
                                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                                    <div class="buttons">
                                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="assets/images/products/p-22.jpg" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Cherry Tomato Seeds</a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="slide-down-box">
                                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                                    <div class="buttons">
                                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="assets/images/products/p-19.jpg" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Pumpkins Fairytale</a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="slide-down-box">
                                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                                    <div class="buttons">
                                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="assets/images/products/p-03.jpg" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Passover Cauliflower Kugel</a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="slide-down-box">
                                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                                    <div class="buttons">
                                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Block 05: Banner Promotion-->
            <div class="banner-promotion-04 xs-margin-top-50px sm-margin-top-49px">
                <div class="biolife-banner promotion4 biolife-banner__promotion4">
                    <div class="container">
                        <div class="banner-contain">
                            <div class="media">
                                <div class="img-moving position-1">
                                    <a href="#" class="banner-link"><img src="assets/images/home-04/bn_promotion-child01.png" width="711" height="507" alt="img msv"></a>
                                </div>
                                <div class="img-moving position-2">
                                    <img src="assets/images/home-04/bn_promotion-child02.png" width="155" height="145" alt="img msv">
                                </div>
                            </div>
                            <div class="text-content">
                                <b class="first-line">Special discount<br>for all fruit products</b>
                                <div class="biolife-countdown" data-datetime="2020/01/18 00:00:00"></div>
                                <p class="buttons">
                                    <a href="#" class="btn btn-bold green-btn">See Offer Now!</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Block 06: Advance-Box-->
          

            <!--Block 07: Brands-->
            

            <!--Block 08: Products-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-xs-12">
                        <div class="advance-product-box">
                            <div class="biolife-title-box bold-style biolife-title-box__bold-style mobile-tiny sm-margin-bottom-36px">
                                <h3 class="title">Top Rated Products</h3>
                            </div>
                            <ul class="products-list vertical-layout products-list__vertical-layout">

                                  <?php 

                                            $getfpd = $pd->getfeatureproduct();

                                            if ($getfpd) {

                                                while ($result = $getfpd->fetch_assoc()) {
                                                    
                                        ?>
                                <li class="product-item">
                                    <div class="contain-product contain-product__right-info-layout2">
                                        <div class="product-thumb">
                                            <a href="detailse.php?proid=<?php echo $result['productid'];?>" class="link-to-product">
                                                <img src="admin/<?php echo $result['image'];?>" alt="Vegetables" width="100" height="100" class="product-thumnail">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <h4 class="product-title"><a href="detailse.php?proid=<?php echo $result['productid'];?>" class="pr-name"><?php echo $result['productname'];?></a></h4>
                                            <div class="price ">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span><?php echo $result['price'];?></span></ins>
                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                            </div>
                                            <div class="rating">
                                                <p class="star-rating"><span class="width-80percent"></span></p>
                                                <span class="review-count">(05 Reviews)</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                 <?php } } ?>
                          
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xs-12">
                        <div class="advance-product-box">
                            <div class="biolife-title-box bold-style biolife-title-box__bold-style mobile-tiny">
                                <h3 class="title">Featured Products</h3>
                            </div>
                            <ul class="products-list vertical-layout products-list__vertical-layout">
                                      <?php 

                                            $getfpd = $pd->getnewproduct();

                                            if ($getfpd) {

                                                while ($result = $getfpd->fetch_assoc()) {
                                                    
                                        ?>
                                        <li class="product-item">
                                            <div class="contain-product contain-product__right-info-layout2">
                                                <div class="product-thumb">
                                                    <a href="detailse.php?proid=<?php echo $result['productid'];?>" class="link-to-product">
                                                        <img src="admin/<?php echo $result['image'];?>" alt="Vegetables" width="100" height="100" class="product-thumnail">
                                                    </a>
                                                </div>
                                                <div class="info">
                                                    <h4 class="product-title"><a href="detailse.php?proid=<?php echo $result['productid'];?>" class="pr-name"><?php echo $result['productname'];?></a></h4>
                                                    <div class="price ">
                                                        <ins><span class="price-amount"><span class="currencySymbol">£</span><?php echo $result['price'];?></span></ins>
                                                        <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                    </div>
                                                    <div class="rating">
                                                        <p class="star-rating"><span class="width-80percent"></span></p>
                                                        <span class="review-count">(05 Reviews)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                 <?php } } ?>
                          
                            </ul>
                        </div>
                    </div>
                    <style type="text/css" media="screen">
                     .advance-product-box {
                            padding-top: 50px;
                        }   
                    </style>
                    <div class="col-sm-6 col-md-4 col-xs-12 sm-margin-top-54px md-margin-top-0">
                        <div class="advance-product-box">
                            <div class="biolife-title-box bold-style biolife-title-box__bold-style mobile-tiny">
                                <h3 class="title">Bestseller Products</h3>
                            </div>
                            <ul class="products-list vertical-layout products-list__vertical-layout">
                                <li class="product-item">
                                    <div class="contain-product contain-product__right-info-layout2">
                                        <div class="product-thumb">
                                            <a href="#" class="link-to-product">
                                                <img src="assets/images/home-04/pr-100-07.jpg" alt="Vegetables" width="100" height="100" class="product-thumnail">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <h4 class="product-title"><a href="#" class="pr-name">Pumpkins Fairytale</a></h4>
                                            <div class="price ">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                            </div>
                                            <div class="rating">
                                                <p class="star-rating"><span class="width-80percent"></span></p>
                                                <span class="review-count">(05 Reviews)</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="product-item">
                                    <div class="contain-product contain-product__right-info-layout2">
                                        <div class="product-thumb">
                                            <a href="#" class="link-to-product">
                                                <img src="assets/images/home-04/pr-100-08.jpg" alt="Vegetables" width="100" height="100" class="product-thumnail">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <h4 class="product-title"><a href="#" class="pr-name">Pumpkins Fairytale</a></h4>
                                            <div class="price ">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                            </div>
                                            <div class="rating">
                                                <p class="star-rating"><span class="width-80percent"></span></p>
                                                <span class="review-count">(05 Reviews)</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="product-item">
                                    <div class="contain-product contain-product__right-info-layout2">
                                        <div class="product-thumb">
                                            <a href="#" class="link-to-product">
                                                <img src="assets/images/home-04/pr-100-09.jpg" alt="Vegetables" width="100" height="100" class="product-thumnail">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <h4 class="product-title"><a href="#" class="pr-name">Pumpkins Fairytale</a></h4>
                                            <div class="price ">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                            </div>
                                            <div class="rating">
                                                <p class="star-rating"><span class="width-80percent"></span></p>
                                                <span class="review-count">(05 Reviews)</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!--Block 09: Blog Posts-->
         <div class="brand-slide background-fafafa xs-margin-top-50px sm-margin-top-80px sm-margin-bottom-73px">
                <div class="container">
                    <ul class="biolife-carousel nav-center-bold nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3}},{"breakpoint":768, "settings":{ "slidesToShow": 2}},{"breakpoint": 550, "settings":{ "slidesToShow": 1}}]}'>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="assets/images/home-03/brd-01.jpg" width="214" height="163" alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="assets/images/home-03/brd-02.jpg" width="214" height="163" alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="assets/images/home-03/brd-03.jpg" width="153" height="163" alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="assets/images/home-03/brd-04.jpg" width="224" height="163" alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="assets/images/home-03/brd-01.jpg" width="214" height="163" alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="assets/images/home-03/brd-02.jpg" width="214" height="163" alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="assets/images/home-03/brd-03.jpg" width="153" height="163" alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="assets/images/home-03/brd-04.jpg" width="224" height="163" alt=""></figure>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </div>

    <!-- FOOTER -->
   <?php include 'inc/footer.php'?>