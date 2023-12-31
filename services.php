<!DOCTYPE html>
<html>


<head>

    <?php include 'includes/include_header.php'; ?>
    <?php 

    $sqlServices = ' SELECT `id`, `service_image`, `title`, `details`, `service_price`, `status`, `date_created` FROM `tbl_services` ';
    $execServices = $conn->query($sqlServices);
    ?>

</head>

<body class="template-color-1">

    <div class="main-wrapper">

        <!-- Begin Uren's Header Main Area -->
        <?php include 'includes/header.php'; ?>
        <!-- Uren's Header Main Area End Here -->

        <!-- Begin Uren's Breadcrumb Area -->
       <!--  <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Services</h2>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Services</li>
                    </ul>
                </div>
            </div>
        </div> -->
        <!-- Uren's Breadcrumb Area End Here -->

        <!-- Begin Uren's Shop Left Sidebar Area -->
        <div class="shop-content_wrapper">
            <div class="container-fluid">
                <div class="row">
                   <!--  <div class="col-lg-3 col-md-5 order-2 order-lg-1 order-md-1">
                        <div class="uren-sidebar-catagories_area">
                            <div class="category-module uren-sidebar_categories">
                                <div class="category-module_heading">
                                    <h5>Categories</h5>
                                </div>
                                <div class="module-body">
                                    <ul class="module-list_item">
                                        <li>
                                            <a href="javascript:void(0)">Sample Category <span>(7)</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-banner_area">
                            <div class="banner-item img-hover_effect">
                                <a href="javascript:void(0)">
                                    <img src="images/s3.jpg" alt="Uren's Shop Banner Image">
                                </a>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-lg-12 col-md-7 order-1 order-lg-2 order-md-2">
                        <div class="shop-toolbar">
                            <div class="product-view-mode">
                                <a class="grid-1" data-target="gridview-1" data-toggle="tooltip" data-placement="top" title="1">1</a>
                                <a class="grid-2" data-target="gridview-2" data-toggle="tooltip" data-placement="top" title="2">2</a>
                                <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="3">3</a>
                                <a class="grid-4" data-target="gridview-4" data-toggle="tooltip" data-placement="top" title="4">4</a>
                                <a class="grid-5" data-target="gridview-5" data-toggle="tooltip" data-placement="top" title="5">5</a>
                                <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top" title="List"><i class="fa fa-th-list"></i></a>
                            </div>
                            <div class="product-item-selection_area">
                                <div class="product-short">
                                    <label class="select-label">Short By:</label>
                                    <select class="myniceselect nice-select">
                                        <option value="1">Default</option>
                                        <option value="2">Name, A to Z</option>
                                        <option value="3">Name, Z to A</option>
                                        <option value="4">Price, low to high</option>
                                        <option value="5">Price, high to low</option>
                                        <option value="5">Rating (Highest)</option>
                                        <option value="5">Rating (Lowest)</option>
                                        <option value="5">Model (A - Z)</option>
                                        <option value="5">Model (Z - A)</option>
                                    </select>
                                </div>
                              <!--   <div class="product-showing">
                                    <label class="select-label">Show:</label>
                                    <select class="myniceselect short-select nice-select">
                                        <option value="1">15</option>
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                    </select>
                                </div> -->
                            </div>
                        </div>
                        <div class="shop-product-wrap grid gridview-3 img-hover-effect_area row">
                            <?php 
                            while ($rowService = $execServices->fetch_assoc()) { 
                                
                                ?>
                                <div class="col-lg-4">
                                    <div class="product-slide_item">
                                        <div class="inner-slide">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="javascript:void(0)">
                                                        <img class="primary-img" src="images/services/<?php echo $rowService['service_image']; ?>" alt="Uren's Product Image">
                                                        <img class="secondary-img" src="images/services/<?php echo $rowService['service_image']; ?>" alt="Uren's Product Image">
                                                    </a>
                                                    <!-- <div class="sticker">
                                                        <span class="sticker">New</span>
                                                    </div> -->
                                                    <div class="add-actions">
                                                <!--         <ul>
                                                            <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                                                                class="ion-bag"></i></a>
                                                            </li>
                                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-android-open"></i></a></li>
                                                        </ul> -->
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-desc_info">
                                                        <div class="rating-box">
                                                           
                                                        </div>
                                                        <h6><a class="product-name" href="#"><?php echo $rowService['title']; ?></a></h6>
                                                        <div class="price-box">
                                                            <span class="new-price">₱<?php echo number_format($rowService['service_price']); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="list-slide_item">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="single-product.html">
                                                    <img class="primary-img" src="assets/images/product/large-size/1.jpg" alt="Uren's Product Image">
                                                    <img class="secondary-img" src="assets/images/product/large-size/2.jpg" alt="Uren's Product Image">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-desc_info">
                                                    <div class="rating-box">
                                                        <ul>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li class="silver-color"><i class="ion-android-star"></i>
                                                            </li>
                                                            <li class="silver-color"><i class="ion-android-star"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <h6><a class="product-name" href="single-product.html">Veniam officiis
                                                            voluptates</a></h6>
                                                    <div class="price-box">
                                                        <span class="new-price">$122.00</span>
                                                    </div>
                                                    <div class="product-short_desc">
                                                        <p>The invention relates to an electromechanical brake booster with an
                                                            electric motor and a helical gearing. The brake booster is used for
                                                            coupling an auxiliary force via a driver into a piston rod. The
                                                            invention proposes connecting a spindle of the helical gearing
                                                            elastically via a spring element to the piston rod such that, in the
                                                            event of rapid actuation of the brake, the helical gearing and a rotor
                                                            of the electric motor do not have to be accelerated entirely muscle
                                                            power. The muscle power required for actuating a brake is reduced as a
                                                            result in the event of a rapid actuation of the brake.</p>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul>
                                                        <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                        </li>
                                                        <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                            class="ion-android-favorite-outline"></i></a>
                                                        </li>
                                                        <li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                            class="ion-android-options"></i></a>
                                                        </li>
                                                        <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                            class="ion-android-open"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            <?php } ?>
                        </div>
                    <!--     <div class="row">
                            <div class="col-lg-12">
                                <div class="uren-paginatoin-area">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="uren-pagination-box primary-color">
                                                <li class="active"><a href="javascript:void(0)">1</a></li>
                                                <li><a href="javascript:void(0)">2</a></li>
                                                <li><a href="javascript:void(0)">3</a></li>
                                                <li><a href="javascript:void(0)">4</a></li>
                                                <li><a href="javascript:void(0)">5</a></li>
                                                <li><a class="Next" href="javascript:void(0)">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Shop Left Sidebar Area End Here -->

        <!-- Begin Uren's Footer Area -->
        <?php include 'includes/footer.php'; ?>
        <!-- Uren's Footer Area End Here -->

    </div>

  <?php include 'includes/include_footer.php'; ?>

</body>


</html>