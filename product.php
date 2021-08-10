<?php include'inc/header.php';?>
  <!--Block 04: Product Tabs-->
            <div class="product-tab z-index-20 sm-margin-top-80px xs-margin-top-20px">
                <div class="container">
                    <div class="biolife-title-box slim-item">
                        <span class="subtitle">All the best item for You</span>
                        <h3 class="main-title">ALL PRODUCT </h3>
                    </div>

                                        <?php

                                        $per_page = 8;
                                        if (isset($_GET["page"])) {
                                            $page= $_GET["page"];

                                        }else{
                                            $page=1;
                                        }

                                        $start_from=($page-1) * $per_page;

                                        ?>


                                       <?php 

                                           $query= "select   tbl_product.*, tbl_catagory.catname

                                                    from tbl_product 
                                                    inner join tbl_catagory
                                                    on tbl_product.catid = tbl_catagory.catid

                                                    limit $start_from, $per_page";

                                            $getfpd =$db->select($query);
                                             if ($getfpd) {

                                                while ($result = $getfpd->fetch_assoc()) {
                                                    
                                        ?>

                                        <div class="contain-product layout-default produc-itm">
                                            <div class="product-thumb">
                                                <a href="detailse.php" class="link-to-product">
                                                    <img src="admin/<?php echo $result['image'];?>" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="detailse.php"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                
                                                <h4 class="product-title"><a href="detailse.php?proid=<?php echo $result['productid'];?>" class="pr-name"><?php echo $result['productname'];?></a></h4>
                                                 <ins><span class="product-title">Category: <?php echo $result['catname'];?></span></ins><br>
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
                               

                                      <?php }  ?>
                        
                                <?php

                                $query="select * from tbl_product ";
                                $result= $db->select($query);
                                $total_row= mysqli_num_rows($result);
                                $total_page= ceil($total_row/$per_page);

                                echo "<span class='pagination'><a href='product.php?page=1'>".'First Page'."</a>";

                                    for ($i=1; $i <=$total_page ; $i++) { 

                                    echo "<a href='product.php?page=".$i."'>".$i."</a>";

                                    };

                                echo "<a href='product.php?page=$total_page'>".'Last Page'."</a></span>";

                                ?>


                            <?php } else { header("Location:404.php"); } ?>
                
                  
                </div>
            </div>
            
                         
                           
             

<?php include'inc/footer.php';?>