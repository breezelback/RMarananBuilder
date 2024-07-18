<!DOCTYPE html>
<html>


<head>

    <?php include 'includes/include_header.php'; ?>

</head>

<body class="template-color-1">

    <div class="main-wrapper">


        <!-- Begin Uren's Header Main Area -->
        <?php include 'includes/header.php'; ?>
        <!-- Uren's Header Main Area End Here -->

        <!-- Begin Popular Search Area -->
      <!--   <div class="popular-search_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="popular-search">
                            <label>Popular Search:</label>
                            <a href="javascript:void(0)">Brakes & Rotors,</a>
                            <a href="javascript:void(0)">Lighting,</a>
                            <a href="javascript:void(0)">Perfomance,</a>
                            <a href="javascript:void(0)">Wheels & Tires</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Popular Search Area End Here -->

        <div class="uren-slider_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-slider slider-navigation_style-2">
                            <!-- Begin Single Slide Area -->
                            <div class="single-slide animation-style-01 bg-1">
                                <div class="slider-content" style="color: black;">
                                    <span>Crafting Dreams into Reality</span>
                                    <h3>R. Maranan's Builder</h3>
                                    <h4>Where Construction Meets Imagination!</h4>
                                    <div class="uren-btn-ps_left slide-btn">
                                        <a class="uren-btn" href="services.php">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Slide Area End Here -->
                            <!-- Begin Single Slide Area -->
                            <div class="single-slide animation-style-02 bg-2">
                                <div class="slider-content slider-content-2">
                                    <span class="primary-text_color">Empowering Your Builds</span>
                                    <h3>Anything!</h3>
                                    <h4>Discover Top-Quality Construction Supplies at R. Maranan's Builder</h4>
                                    <div class="uren-btn-ps_left slide-btn">
                                        <a class="uren-btn" href="shop.php">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Begin Uren's Shipping Area -->
        <div class="uren-shipping_area">
            <div class="container-fluid">
                <div class="shipping-nav">
                    <div class="row no-gutters">
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-paperplane-outline"></i>
                                </div>
                                <div class="shipping-content">
                                    <h6>Free Shipping</h6>
                                    <p>Free shipping on all nearby area</p>
                                </div>
                            </div>
                        </div>
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-help-outline"></i>
                                </div>
                                <div class="shipping-content">
                                    <h6>Support 24/7</h6>
                                    <p>Contact us 24 hours a day</p>
                                </div>
                            </div>
                        </div>
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-refresh-empty"></i>
                                </div>
                                <div class="shipping-content">
                                    <h6>100% Money Back</h6>
                                    <p>You have 30 days to Return</p>
                                </div>
                            </div>
                        </div>
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-undo-outline"></i>
                                </div>
                                <div class="shipping-content">
                                    <h6>90 Days Return</h6>
                                    <p>If goods have problems</p>
                                </div>
                            </div>
                        </div>
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-locked-outline"></i>
                                </div>
                                <div class="shipping-content last-child">
                                    <h6>Payment Secure</h6>
                                    <p>We ensure secure payment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Shipping Area End Here -->

        <!-- Begin Featured Categories Area -->
        <div class="featured-categories_area">
            <div class="container-fluid">
                <div class="section-title_area">
                    <!-- <span>Top Featured Collections</span> -->
                    <h3>Featured Services</h3>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="featured-categories_slider uren-slick-slider slider-navigation_style-1" data-slick-options='{
                        "slidesToShow": 4,
                        "spaceBetween": 30,
                        "arrows" : true
                       }' data-slick-responsive='[
                                             {"breakpoint":1599, "settings": {"slidesToShow": 3}},
                                             {"breakpoint":1200, "settings": {"slidesToShow": 2}},
                                             {"breakpoint":768, "settings": {"slidesToShow": 1}}
                                         ]'>

                            <?php
                            $sqlProduct = ' SELECT `id`, `name`, `details`, `quantity`, `status`, `date_created`, `category`, `type` FROM `tbl_product` WHERE type = "service" ORDER BY id DESC LIMIT 5 ';
                            $execProduct = $conn->query($sqlProduct);
                            while ($products = $execProduct->fetch_assoc()) {

                                $sqlProdImage = 'SELECT `id`, `product_id`, `image` FROM `tbl_product_image` WHERE product_id = '.$products['id'];
                                $execProdImg = $conn->query($sqlProdImage);
                                $productImage = $execProdImg->fetch_assoc();
                            ?>
                            <div class="slide-item">
                                <div class="slide-inner">
                                    <div class="slide-image_area">
                                        <a href="view_service.php?id=<?php echo $products['id']; ?>">
                                            <img class="m-1" src="images/products/<?php echo $productImage['image']; ?>" alt="Uren's Featured Categories" height="80">
                                        </a>
                                    </div>
                                    <div class="slide-content_area">
                                        <h3><a href="view_service.php?id=<?php echo $products['id']; ?>"><?php echo $products['name']; ?></a></h3>
                                        <!-- <span>(8 Products)</span> -->
                                        <ul class="product-item">
                                            <li>
                                                <?php echo $products['details']; ?>
                                            </li>
                                        </ul>
                                        <div class="uren-btn-ps_left">
                                            <a class="uren-btn" href="view_service.php?id=<?php echo $products['id']; ?>">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featured Categories Area End Here -->
        
        <!-- Begin Uren's Product Area -->
        <div class="uren-product_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title_area">
                            <!-- <span>Top New On This Week</span> -->
                            <h3>New Arrival Products</h3>
                        </div>
                        <div class="product-slider uren-slick-slider slider-navigation_style-1 img-hover-effect_area" data-slick-options='{
                        "slidesToShow": 6,
                        "arrows" : true
                        }' data-slick-responsive='[
                                                {"breakpoint":1501, "settings": {"slidesToShow": 4}},
                                                {"breakpoint":1200, "settings": {"slidesToShow": 3}},
                                                {"breakpoint":992, "settings": {"slidesToShow": 2}},
                                                {"breakpoint":767, "settings": {"slidesToShow": 1}},
                                                {"breakpoint":480, "settings": {"slidesToShow": 1}}
                                            ]'>

                            <?php
                            $sqlProduct = ' SELECT `id`, `name`, `details`, `quantity`, `status`, `date_created`, `category`, `type` FROM `tbl_product` WHERE type = "product" ORDER BY id DESC LIMIT 5 ';
                            $execProduct = $conn->query($sqlProduct);
                            while ($products = $execProduct->fetch_assoc()) {

                                $sqlProdImage = 'SELECT `id`, `product_id`, `image` FROM `tbl_product_image` WHERE product_id = '.$products['id'];
                                $execProdImg = $conn->query($sqlProdImage);
                                $productImage = $execProdImg->fetch_assoc();
                            ?>
                            <div class="product-slide_item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="view_product.php?id=<?php echo $products['id']; ?>">
                                                <img class="primary-img" src="images/products/<?php echo $productImage['image']; ?>" alt="Uren's Product Image" height="270">
                                                <img class="secondary-img" src="images/products/<?php echo $productImage['image']; ?>" alt="Uren's Product Image" height="270">
                                            </a>
                                            <div class="sticker">
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="add-actions">
                                                <ul>
                                                    <li><a class="uren-add_cart" href="view_product.php?id=<?php echo $products['id']; ?>" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                    </li>
                                                  <!--   <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                            class="ion-android-open"></i></a></li> -->
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <h6 class="mt-2"><a class="product-name" href="view_product.php?id=<?php echo $products['id']; ?>"><?php echo $products['name']; ?></a></h6>
                                                <div class="price-box">
                                                    <?php 
                                                        $sqlTotalOption = ' SELECT `id`, `product_id`, `option_name`, `price` FROM `tbl_item_options` WHERE product_id = '.$products['id'];
                                                        $execTotalOption = $conn->query($sqlTotalOption);
                                                        $rowTotalOption = $execTotalOption->fetch_assoc();
                                                        if ($execTotalOption->num_rows > 1 )
                                                        {
                                                            $sqlSelectOptPrice = ' SELECT MIN(price) as minPrice, MAX(price) as maxPrice FROM `tbl_item_options` WHERE product_id = '.$products['id'];
                                                            $execSelectOptPrice = $conn->query($sqlSelectOptPrice);
                                                            $rowSelectOptPrice = $execSelectOptPrice->fetch_assoc();
                                                            echo '<span class="new-price">₱'.$rowSelectOptPrice['minPrice'].' - ₱'.$rowSelectOptPrice['maxPrice'].'</span>';
                                                        }
                                                        else
                                                        {
                                                            echo '<span class="new-price">P'.$rowTotalOption['price'].'</span>';
                                                        }
                                                    ?> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Product Area End Here -->

        <!-- Begin Uren's Banner Three Area -->
       <!--  <div class="uren-banner_area uren-banner_area-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-item img-hover_effect">
                            <div class="banner-img"></div>
                            <div class="banner-content">
                                <span class="contact-info"><i class="ion-android-call"></i> +123 321 345</span>
                                <h4>Anytime & Anywhere </h4>
                                <h3>You are.</h3>
                                <p>Est erat faucibus purus, eget viverra nulla sem vitae
                                    Quisque id sodales libero...</p>
                                <a href="javascript:void(0)" class="read-more">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Uren's Banner Three Area End Here -->
        <br>
        <!-- Begin Uren's Blog Area -->
        <!-- <div class="uren-blog_area bg--white_smoke">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title_area">
                            <span>Our Recent Posts</span>
                            <h3>From Our Blogs</h3>
                        </div>
                        <div class="blog-slider uren-slick-slider slider-navigation_style-1" data-slick-options='{
                        "slidesToShow": 4,
                        "spaceBetween": 30,
                        "arrows" : true
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 3}},
                            {"breakpoint":992, "settings": {"slidesToShow": 2}},
                            {"breakpoint":768, "settings": {"slidesToShow": 2}},
                            {"breakpoint":576, "settings": {"slidesToShow": 1}}
                        ]'>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="blog-img img-hover_effect">
                                        <a href="blog-details-left-sidebar.html">
                                            <img src="assets/images/blog/large-size/1.jpg" alt="Uren's Blog Image">
                                        </a>
                                        <span class="post-date">12-09-19</span>
                                    </div>
                                    <div class="blog-content">
                                        <h3><a href="blog-details-left-sidebar.html">Quaerat eligendi dolores autem omnis sed</a></h3>
                                        <p>Maiores accusamus unde nulla quaerat deserunt, beatae molestias blanditiis aut recusandae saepe, quis, culpa voluptatum?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="blog-img img-hover_effect">
                                        <a href="blog-details-left-sidebar.html">
                                            <img src="assets/images/blog/large-size/2.jpg" alt="Uren's Blog Image">
                                        </a>
                                        <span class="post-date">15-09-19</span>
                                    </div>
                                    <div class="blog-content">
                                        <h3><a href="blog-details-left-sidebar.html">Nulla voluptatum maiores dolorem nobis</a></h3>
                                        <p>Maiores accusamus unde nulla quaerat deserunt, beatae molestias blanditiis aut recusandae saepe, quis, culpa voluptatum?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="blog-img img-hover_effect">
                                        <a href="blog-details-left-sidebar.html">
                                            <img src="assets/images/blog/large-size/3.jpg" alt="Uren's Blog Image">
                                        </a>
                                        <span class="post-date">19-09-19</span>
                                    </div>
                                    <div class="blog-content">
                                        <h3><a href="blog-details-left-sidebar.html">Laudantium minus excepturi expedita dolore</a></h3>
                                        <p>Maiores accusamus unde nulla quaerat deserunt, beatae molestias blanditiis aut recusandae saepe, quis, culpa voluptatum?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="blog-img img-hover_effect">
                                        <a href="blog-details-left-sidebar.html">
                                            <img src="assets/images/blog/large-size/4.jpg" alt="Uren's Blog Image">
                                        </a>
                                        <span class="post-date">16-09-19</span>
                                    </div>
                                    <div class="blog-content">
                                        <h3><a href="blog-details-left-sidebar.html">Aliquam nihil dolorem beatae totam tempora</a></h3>
                                        <p>Maiores accusamus unde nulla quaerat deserunt, beatae molestias blanditiis aut recusandae saepe, quis, culpa voluptatum?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="blog-img img-hover_effect">
                                        <a href="blog-details-left-sidebar.html">
                                            <img src="assets/images/blog/large-size/5.jpg" alt="Uren's Blog Image">
                                        </a>
                                        <span class="post-date">20-09-19</span>
                                    </div>
                                    <div class="blog-content">
                                        <h3><a href="blog-details-left-sidebar.html">Reprehenderit illum iusto sit asperiores</a></h3>
                                        <p>Maiores accusamus unde nulla quaerat deserunt, beatae molestias blanditiis aut recusandae saepe, quis, culpa voluptatum?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="blog-img img-hover_effect">
                                        <a href="blog-details-left-sidebar.html">
                                            <img src="assets/images/blog/large-size/6.jpg" alt="Uren's Blog Image">
                                        </a>
                                        <span class="post-date">25-09-19</span>
                                    </div>
                                    <div class="blog-content">
                                        <h3><a href="blog-details-left-sidebar.html">Corrupti, dolore tempore totam voluptate</a></h3>
                                        <p>Maiores accusamus unde nulla quaerat deserunt, beatae molestias blanditiis aut recusandae saepe, quis, culpa voluptatum?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Uren's Blog Area End Here -->

        <!-- Begin Uren's Footer Area -->
        <?php include 'includes/footer.php'; ?>
        <!-- Uren's Footer Area End Here -->

    </div>

  <?php include 'includes/include_footer.php'; ?>

</body>

</html>