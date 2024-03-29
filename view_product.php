<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>

    <?php include 'includes/include_header.php'; ?>
    <?php 
    // print_r($_SESSION);
    $sqlProduct = ' SELECT `id`, `name`, `details`, `quantity`, `status`, `date_created`, `category` FROM `tbl_product` WHERE id = '.$_GET['id'];
    $execProduct = $conn->query($sqlProduct);
    $product = $execProduct->fetch_assoc();

    $sqlOption = ' SELECT `id`, `product_id`, `option_name`, `price` FROM `tbl_item_options` WHERE product_id = '.$_GET['id'];
    $execOption = $conn->query($sqlOption);

    $sqlImage = ' SELECT `id`, `product_id`, `image` FROM `tbl_product_image` WHERE product_id = '.$_GET['id'];
    $execImage = $conn->query($sqlImage);
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
                    <h2>Single Product Type</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Single Product</li>
                    </ul>
                </div>
            </div>
        </div> -->
        <!-- Uren's Breadcrumb Area End Here -->

        <!-- Begin Uren's Single Product Area -->
        <div class="sp-area">
            <div class="container-fluid">
                <div class="sp-nav">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="sp-img_area">
                                <div class="sp-img_slider slick-img-slider uren-slick-slider" data-slick-options='{
                                "slidesToShow": 1,
                                "arrows": false,
                                "fade": true,
                                "draggable": false,
                                "swipe": false,
                                "asNavFor": ".sp-img_slider-nav"
                                }'>
                                    <!-- <div class="single-slide red zoom">
                                        <img src="assets/images/product/large-size/1.jpg" alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide orange zoom">
                                        <img src="assets/images/product/large-size/2.jpg" alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide brown zoom">
                                        <img src="assets/images/product/large-size/3.jpg" alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide umber zoom">
                                        <img src="assets/images/product/large-size/4.jpg" alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide black zoom">
                                        <img src="assets/images/product/large-size/5.jpg" alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide green zoom">
                                        <img src="assets/images/product/large-size/6.jpg" alt="Uren's Product Image">
                                    </div> -->
                                    <?php while($rowImg = $execImage->fetch_assoc()){ ?>

                                        <div class="single-slide green zoom">
                                            <img src="images/products/<?php echo $rowImg['image']; ?>" alt="Uren's Product Image">
                                        </div>

                                    <?php } ?>

                                </div>
                                <div class="sp-img_slider-nav slick-slider-nav uren-slick-slider slider-navigation_style-3" data-slick-options='{
                                "asNavFor": ".sp-img_slider",
                                "focusOnSelect": true,
                                "arrows" : true,
                                "spaceBetween": 30
                                }' data-slick-responsive='[
                                        {"breakpoint":1501, "settings": {"slidesToShow": 3}},
                                        {"breakpoint":992, "settings": {"slidesToShow": 4}},
                                        {"breakpoint":768, "settings": {"slidesToShow": 3}},
                                        {"breakpoint":575, "settings": {"slidesToShow": 2}}
                                    ]'>

                                    <?php 
                                    $sqlImage = ' SELECT `id`, `product_id`, `image` FROM `tbl_product_image` WHERE product_id = '.$_GET['id'];
                                    $execImage1 = $conn->query($sqlImage);
                                    while($rowImg1 = $execImage1->fetch_assoc()){ ?>
                                        <div class="single-slide red">
                                            <img src="images/products/<?php echo $rowImg1['image']; ?>" alt="Uren's Product Thumnail">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="sp-content">
                                <div class="sp-heading">
                                    <h5><?php echo $product['name']; ?></h5>
                                    <?php 
                                    $sqlTotalOption = ' SELECT `id`, `product_id`, `option_name`, `price` FROM `tbl_item_options` WHERE product_id = '.$_GET['id'];
                                    $execTotalOption = $conn->query($sqlTotalOption);
                                    $rowTotalOption = $execTotalOption->fetch_assoc();
                                    if ($execTotalOption->num_rows > 1 )
                                    {
                                        $sqlSelectOptPrice = ' SELECT MIN(price) as minPrice, MAX(price) as maxPrice FROM `tbl_item_options` WHERE product_id = '.$_GET['id'];
                                        $execSelectOptPrice = $conn->query($sqlSelectOptPrice);
                                        $rowSelectOptPrice = $execSelectOptPrice->fetch_assoc();

                                        // $sqlSelectMaxOpt = ' SELECT MAX(price) as maxPrice FROM `tbl_item_options` WHERE product_id = '.$_GET['id'];
                                        // $execSelectMaxOpt = $conn->query($sqlSelectMaxOpt);
                                        // $rowSelectMaxOpt = $execSelectMaxOpt->fetch_assoc();

                                        echo '<h2 id="optionPriceVal" style="color: #af9123;">₱'.$rowSelectOptPrice['minPrice'].' - ₱'.$rowSelectOptPrice['maxPrice'].'</h2>';
                                    }
                                    else
                                    {
                                        echo '<h2 style="color: #af9123;">'.$rowTotalOption['price'].'</h2>';
                                    }
                                    ?>
                                    
                                </div>
                                <!-- <div class="rating-box">
                                    <ul>
                                        <li><i class="ion-android-star"></i></li>
                                        <li><i class="ion-android-star"></i></li>
                                        <li><i class="ion-android-star"></i></li>
                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                    </ul>
                                </div> -->
                                <div class="sp-essential_stuff">
                                    <ul>
                                        Details: <li><?php echo $product['details']; ?></li>
                                        Availability: <li>In Stock</li>
                                        Stock: <li><span><?php echo $product['quantity']; ?></span></li>
                                    </ul>
                                </div>
                                <?php if ($execOption->num_rows > 1): ?>
                                    <div class="product-size_box">
                                        <span>Option</span>
                                        <select class="myniceselect nice-select" id="selectProductOption">
                                            <option value="" selected="" disabled="">-Select Option-</option>
                                            <?php while($rowOption = $execOption->fetch_assoc()){ ?>
                                                <option value="<?php echo $rowOption['id']; ?>"><?php echo $rowOption['option_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                <?php else: ?>
                                     <select id="selectProductOption" style="display: none !important;">
                                            <option value="" selected="" disabled="">-Select Option-</option>
                                            <?php while($rowOption = $execOption->fetch_assoc()){ ?>
                                                <option value="<?php echo $rowOption['id']; ?>" selected><?php echo $rowOption['option_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                <?php endif ?>
                                <div class="product-size_box">
                                    <span>Quantity</span>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <button class="btn btn-danger" id="btn_qty_minus"><i class="fa fa-minus"></i></button>
                                        </div>
                                        <div class="col-sm-3">
                                            <!-- <input type="number" class="form-control" name="order_qty" id="order_qty"  min="0" oninput="this.value = Math.abs(this.value)"> -->
                                            <input type="number" class="form-control" name="order_qty" id="order_qty" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" name="itemConsumption" />

                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-success" id="btn_qty_plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- <h2 style="color: #af9123;" id="optionPriceVal"></h2> -->
                                <div class="qty-btn_area">
                                    <ul>
                                        <!-- <li><a class="qty-cart_btn" href="cart.html">Add To Cart</a></li> -->
                                        <?php if (empty($_SESSION['id'])): ?>
                                            <li><a class="qty-cart_btn" href="login.php">Add To Cart</a></li>
                                        <?php else: ?>
                                            <li><a onclick="add_item(<?php echo $_SESSION['id']; ?>, <?php echo $product['id']; ?>, <?php echo $product['quantity']; ?>);" class="qty-cart_btn" >Add To Cart</a></li>
                                        <?php endif ?>
                                      <!--   <li><a class="qty-wishlist_btn" href="wishlist.html" data-toggle="tooltip" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                        </li>
                                        <li><a class="qty-compare_btn" href="compare.html" data-toggle="tooltip" title="Compare This Product"><i class="ion-ios-shuffle-strong"></i></a></li> -->
                                    </ul>
                                </div>
                                <div class="uren-tag-line">
                                    <h6>Category:</h6>
                                    &nbsp;<b><?php echo $product['category']; ?></b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Single Product Area End Here -->

        <!-- Begin Uren's Single Product Tab Area -->
        <div class="sp-product-tab_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sp-product-tab_nav">
                            <div class="product-tab">
                                <ul class="nav product-menu">
                                    <!-- <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a>
                                    </li>
                                    <li><a data-toggle="tab" href="#specification"><span>Specification</span></a></li> -->
                                    <li><a data-toggle="tab" href="#reviews"><span>Reviews (1)</span></a></li>
                                </ul>
                            </div>
                            <div class="tab-content uren-tab_content">
                               <!--  <div id="description" class="tab-pane active show" role="tabpanel">
                                    <div class="product-description">
                                        <ul>
                                            <li>
                                                <strong>Ullam aliquam</strong>
                                                <span>Voluptatum, minus? Optio molestias voluptates aspernatur laborum ratione minima, natus eaque nemo rem quisquam, suscipit architecto saepe. Debitis omnis labore laborum consectetur, quas, esse voluptates minus aliquam modi nesciunt earum! Vero rerum molestiae corporis libero repellat doloremque quae sapiente ratione maiores qui aliquam, sunt obcaecati! Iure nisi doloremque numquam delectus.</span>
                                            </li>
                                            <li>
                                                <strong>Enim tempore</strong>
                                                <span>Molestias amet quibusdam eligendi exercitationem alias labore tenetur quaerat veniam similique aspernatur eveniet, suscipit corrupti itaque dolore deleniti nobis, rerum reprehenderit recusandae. Eligendi beatae asperiores nisi distinctio doloribus voluptatibus voluptas repellendus tempore unde velit temporibus atque maiores aliquid deserunt aspernatur amet, soluta fugit magni saepe fugiat vel sunt voluptate vitae</span>
                                            </li>
                                            <li>
                                                <strong>Laudantium suscipit</strong>
                                                <span>Odit repudiandae maxime, ducimus necessitatibus error fugiat nihil eum dolorem animi voluptates sunt, rem quod reprehenderit expedita, nostrum sit accusantium ut delectus. Voluptates at ipsam, eligendi labore dignissimos consectetur reprehenderit id error excepturi illo velit ratione nisi nam saepe quod! Reiciendis eos, velit fugiat voluptates accusamus nesciunt dicta ratione mollitia, asperiores error aliquam! Reprehenderit provident, omnis blanditiis fugit, accusamus deserunt illum unde, voluptatum consequuntur illo officiis labore doloremque quidem aperiam! Fuga, expedita? Laboriosam eum, tempore vitae libero voluptate omnis ducimus doloremque hic quibusdam reiciendis ab itaque aperiam maiores laudantium esse, consequuntur quos labore modi quasi recusandae distinctio iusto optio officia tempora.</span>
                                            </li>
                                            <li>
                                                <strong>Molestiae veritatis officia</strong>
                                                <span>Illum fuga esse tenetur inventore, in voluptatibus saepe iste quia cupiditate, explicabo blanditiis accusantium ut. Eaque nostrum, quisquam doloribus asperiores tempore autem. Ea perspiciatis vitae reiciendis maxime similique vel, id ratione blanditiis ullam officiis odio sunt nam quos atque accusantium ad! Repellendus, magni aliquid. Iure asperiores veniam eum unde dignissimos reprehenderit ut atque velit, harum labore nam expedita, pariatur excepturi consectetur animi optio mollitia ad a natus eaque aut assumenda inventore dolor obcaecati! Enim ab tempore nulla iusto consequuntur quod sit voluptatibus adipisci earum fuga, explicabo amet, provident, molestiae optio. Ducimus ex necessitatibus assumenda, nisi excepturi ut aspernatur est eius dignissimos pariatur unde ipsum sunt quaerat.</span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div id="specification" class="tab-pane" role="tabpanel">
                                    <table class="table table-bordered specification-inner_stuff">
                                        <tbody>
                                            <tr>
                                                <td colspan="2"><strong>Memory</strong></td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td>test 1</td>
                                                <td>8gb</td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td colspan="2"><strong>Processor</strong></td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td>No. of Cores</td>
                                                <td>1</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> -->
                                <div id="reviews" class="tab-pane" role="tabpanel">
                                    <div class="tab-pane active" id="tab-review">
                                        <form class="form-horizontal" id="form-review">
                                            <div id="review">
                                                <table class="table table-striped table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 50%;"><strong>Customer</strong></td>
                                                            <td class="text-right">15/09/20</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <p>Good product! Thank you very much</p>
                                                                <div class="rating-box">
                                                                    <ul>
                                                                        <li><i class="ion-android-star"></i></li>
                                                                        <li><i class="ion-android-star"></i></li>
                                                                        <li><i class="ion-android-star"></i></li>
                                                                        <li><i class="ion-android-star"></i></li>
                                                                        <li><i class="ion-android-star"></i></li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <h2>Write a review</h2>
                                            <div class="form-group required">
                                                <div class="col-sm-12 p-0">
                                                    <label>Your Email <span class="required">*</span></label>
                                                    <input class="review-input" type="email" name="con_email" id="con_email" required>
                                                </div>
                                            </div>
                                            <div class="form-group required second-child">
                                                <div class="col-sm-12 p-0">
                                                    <label class="control-label">Share your opinion</label>
                                                    <textarea class="review-textarea" name="con_message" id="con_message"></textarea>
                                                    <div class="help-block"><span class="text-danger">Note:</span> HTML is not
                                                        translated!</div>
                                                </div>
                                            </div>
                                            <div class="form-group last-child required">
                                                <div class="col-sm-12 p-0">
                                                    <div class="your-opinion">
                                                        <label>Your Rating</label>
                                                        <span>
                                                    <select class="star-rating">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </span>
                                                    </div>
                                                </div>
                                                <div class="uren-btn-ps_right">
                                                    <button class="uren-btn-2">Continue</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Single Product Tab Area End Here -->

        <!-- Begin Uren's Product Area -->
        <div class="uren-product_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title_area">
                            <span></span>
                            <h3>Related Products</h3>
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
                            $sqlRelatedProd = ' SELECT `id`, `name`, `details`, `quantity`, `status`, `date_created`, `category` FROM `tbl_product` WHERE category = "'.$product['category'].'" ';
                            $execRelatedProduct = $conn->query($sqlRelatedProd);
                            if ($execRelatedProduct->num_rows > 0) {
                                while ($rowRelatedProduct = $execRelatedProduct->fetch_assoc()) { ?>
                                    <div class="product-slide_item">
                                        <div class="inner-slide">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.html">
                                                        <img class="primary-img" src="assets/images/product/medium-size/1-1.jpg" alt="Uren's Product Image">
                                                        <img class="secondary-img" src="assets/images/product/medium-size/1-2.jpg" alt="Uren's Product Image">
                                                    </a>
                                                    <div class="sticker">
                                                        <span class="sticker">New</span>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-desc_info">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h6><a class="product-name" href="single-product.html"><?php echo $rowRelatedProduct['name']; ?></a></h6>
                                                        <div class="price-box">
                                                            <span class="new-price">$122.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php } } ?>
                      
                            <!-- <div class="product-slide_item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img" src="assets/images/product/medium-size/2-1.jpg" alt="Uren's Product Image">
                                                <img class="secondary-img" src="assets/images/product/medium-size/2-2.jpg" alt="Uren's Product Image">
                                            </a>
                                            <div class="sticker-area-2">
                                                <span class="sticker-2">-20%</span>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="add-actions">
                                                <ul>
                                                    <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                    </li>
                                                    <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                    </li>
                                                    <li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                            class="ion-android-options"></i></a>
                                                    </li>
                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                            class="ion-android-open"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>
                                                <h6><a class="product-name" href="single-product.html">Corporis sed excepturi</a></h6>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2">$194.00</span>
                                                    <span class="old-price">$241.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-slide_item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img" src="assets/images/product/medium-size/3-1.jpg" alt="Uren's Product Image">
                                                <img class="secondary-img" src="assets/images/product/medium-size/3-2.jpg" alt="Uren's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                            <div class="add-actions">
                                                <ul>
                                                    <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                    </li>
                                                    <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                    </li>
                                                    <li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                            class="ion-android-options"></i></a>
                                                    </li>
                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                            class="ion-android-open"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>
                                                <h6><a class="product-name" href="single-product.html">Quidem iusto sapiente</a></h6>
                                                <div class="price-box">
                                                    <span class="new-price">$175.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-slide_item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img" src="assets/images/product/medium-size/4-1.jpg" alt="Uren's Product Image">
                                                <img class="secondary-img" src="assets/images/product/medium-size/4-2.jpg" alt="Uren's Product Image">
                                            </a>
                                            <div class="sticker-area-2">
                                                <span class="sticker-2">-5%</span>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="add-actions">
                                                <ul>
                                                    <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                    </li>
                                                    <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                    </li>
                                                    <li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                            class="ion-android-options"></i></a>
                                                    </li>
                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                            class="ion-android-open"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>
                                                <h6><a class="product-name" href="single-product.html">Ullam excepturi nesciunt</a></h6>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2">$145.00</span>
                                                    <span class="old-price">$190.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-slide_item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img" src="assets/images/product/medium-size/5-1.jpg" alt="Uren's Product Image">
                                                <img class="secondary-img" src="assets/images/product/medium-size/5-2.jpg" alt="Uren's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                            <div class="add-actions">
                                                <ul>
                                                    <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                    </li>
                                                    <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                    </li>
                                                    <li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                            class="ion-android-options"></i></a>
                                                    </li>
                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                            class="ion-android-open"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>
                                                <h6><a class="product-name" href="single-product.html">Minus ipsam rerum</a></h6>
                                                <div class="price-box">
                                                    <span class="new-price">$130.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-slide_item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img" src="assets/images/product/medium-size/6-1.jpg" alt="Uren's Product Image">
                                                <img class="secondary-img" src="assets/images/product/medium-size/6-2.jpg" alt="Uren's Product Image">
                                            </a>
                                            <div class="sticker-area-2">
                                                <span class="sticker-2">-15%</span>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="add-actions">
                                                <ul>
                                                    <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                    </li>
                                                    <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                    </li>
                                                    <li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                            class="ion-android-options"></i></a>
                                                    </li>
                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                            class="ion-android-open"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>
                                                <h6><a class="product-name" href="single-product.html">Labore aliquid eos</a></h6>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2">$240.00</span>
                                                    <span class="old-price">$320.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-slide_item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img" src="assets/images/product/medium-size/7-1.jpg" alt="Uren's Product Image">
                                                <img class="secondary-img" src="assets/images/product/medium-size/7-2.jpg" alt="Uren's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                            <div class="add-actions">
                                                <ul>
                                                    <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                    </li>
                                                    <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                    </li>
                                                    <li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                            class="ion-android-options"></i></a>
                                                    </li>
                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                            class="ion-android-open"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>
                                                <h6><a class="product-name" href="single-product.html">Enim nobis numquam</a></h6>
                                                <div class="price-box">
                                                    <span class="new-price">$190.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-slide_item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img" src="assets/images/product/medium-size/8-1.jpg" alt="Uren's Product Image">
                                                <img class="secondary-img" src="assets/images/product/medium-size/1-2.jpg" alt="Uren's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                            <div class="add-actions">
                                                <ul>
                                                    <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                    </li>
                                                    <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                    </li>
                                                    <li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                            class="ion-android-options"></i></a>
                                                    </li>
                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                            class="ion-android-open"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>
                                                <h6><a class="product-name" href="single-product.html">Dolorem voluptates aut</a></h6>
                                                <div class="price-box">
                                                    <span class="new-price">$250.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Product Area End Here -->
        <br>
        <!-- Begin Uren's Footer Area -->
        <?php include 'includes/footer.php'; ?>
        <!-- Uren's Footer Area End Here -->
    </div>

  <?php include 'includes/include_footer.php'; ?>

  <script>
    
    $('#selectProductOption').on('change', function(){
        let variant_id = $(this).val();
        $.ajax({  
            url:"function php/get_variant_price.php?variant_id="+variant_id, 
            method:"POST",  
            contentType:false,
            cache:false,
            processData:false,

            beforeSend:function() {
            }, 

            success:function(data){  
                // alert(data);
                $('#optionPriceVal').text('₱'+data);
            }

        });  
    });
    // optionPriceVal


    function add_item(user_id, product_id, product_qty)
    {
        let order_qty = $('#order_qty').val();
        let selectProductOption = $('#selectProductOption').val();
       
        if (selectProductOption == null)
        {
            iziToast.show({ title: 'Warning!', message: 'Please select item variant.',theme: 'light',position: 'bottomRight',color: 'red'});
        }
        else if (order_qty < 1) 
        {
            iziToast.show({ title: 'Warning!', message: 'Please add item quantity.',theme: 'light',position: 'bottomRight',color: 'red'});
        }
        else if (order_qty > product_qty) 
        {
            iziToast.show({ title: 'Warning!', message: 'Selected quantity is greater than the stock quantity.',theme: 'light',position: 'bottomRight',color: 'red'});
        }
        else
        {
            Swal.fire({
              title: "Are you sure?",
              text: "Add Item to your cart.",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Yes"
            }).then((result) => {
              if (result.isConfirmed) {

                $.ajax({  
                    url:"function php/insert_cart_item.php?user_id="+user_id+"&product_id="+product_id+"&order_qty="+order_qty+"&selectProductOption="+selectProductOption, 
                    method:"POST",  
                    contentType:false,
                    cache:false,
                    processData:false,

                    beforeSend:function() {
                    }, 

                    success:function(data){  
                        // alert(data);
                        window.location.reload();
                    }

                });  


                 // iziToast.show({ title: 'Success!', message: 'Item successfully added to card.',theme: 'light',position: 'bottomRight',color: 'green'});
              }
            });
           
        }
        
    }

    $('#btn_qty_plus').on('click', function(){
        // $('#order_qty').val($('#order_qty').val() + 1);
        document.getElementById("order_qty").stepUp(1);
    });

    $('#btn_qty_minus').on('click', function(){
        if ($('#order_qty').val() > 0) 
        {
            document.getElementById("order_qty").stepDown(1);
        }
    });

  </script>

</body>


</html>