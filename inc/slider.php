    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">

            <!--Block 01: Vertical Menu And Main Slide-->
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 hidden-sm hidden-xs">
                        <div class="biolife-vertical-menu none-box-shadow  ">
                            <div class="vertical-menu vertical-category-block always ">
                            
                         
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12">
                        <div class="main-slide block-slider nav-change type02">
                            <ul class="biolife-carousel" data-slick='{"arrows": true, "dots": false, "slidesMargin": 0, "slidesToShow": 1, "infinite": true, "speed": 800}' >
                                <?php 
                                    $i = 0;
                                    $getslider = $us->getallslider();
                                     if ($getslider) {
                                       while ($result = $getslider->fetch_assoc()) {
                                     $z=0;
                                     $i++;

                                  ?>
                                 <li>
                                    <div class="slide-contain slider-opt04__layout<?php echo $i;?> ">
                                        <div class="media">
                                            <?php if($result['image']){ ?>

                                            <style>
                                             .slider-opt04__layout<?php echo $i;?> .media {
                                                z-index: 10;
                                                background-image: url("admin/<?php echo $result['image'];?>");
                                                background-repeat: no-repeat;
                                                background-size: cover;
                                                height: 420px;
                                               }   
                                            </style>

                                            <?php } ?>
                                        </div>
                                        <div class="text-content1">
                                           
                                            <h4 class="second-line"><?php echo $result['titleone'];?></h3>
                                            <h3 class="second-line"><?php echo $result['titletwo'];?></h3>
                                       
                                             <h4 class="second-line"><?php echo $result['titlethree'];?></h3>

                                            <p class="buttons">
                                                <a href="#" class="btn btn-bold">Shop now</a>
                                                <a href="#" class="btn btn-thin">View lookbook</a>
                                            </p>
                                        </div>
                                    </div>
                                </li>

                              <?php } } ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

