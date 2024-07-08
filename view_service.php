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
                                            <!-- <button class="btn btn-danger" id="btn_qty_minus"><i class="fa fa-minus"></i></button> -->
                                        </div>
                                        <div class="col-sm-3">
                                            <!-- <input type="number" class="form-control" name="order_qty" id="order_qty"  min="0" oninput="this.value = Math.abs(this.value)"> -->
                                            <input readonly="" value="1" type="number" class="form-control" name="order_qty" id="order_qty" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" name="itemConsumption" />

                                        </div>
                                        <div class="col-sm-2">
                                            <!-- <button class="btn btn-success" id="btn_qty_plus"><i class="fa fa-plus"></i></button> -->
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
                                    <?php 
                                    $sqlCount = ' SELECT COUNT(id) as totalReview FROM tbl_review WHERE item_id = '.$_GET['id'];
                                    $execCount = $conn->query($sqlCount);
                                    $resCount = $execCount->fetch_assoc();
                                     ?>
                                    <li><a data-toggle="tab" href="#reviews"><span>Reviews (<?php echo $resCount['totalReview']; ?>)</span></a></li>
                                </ul>
                            </div>
                            <div class="tab-content uren-tab_content">
                                <div id="reviews" class="tab-pane" role="tabpanel">
                                    <div class="tab-pane active" id="tab-review">
                                        <form class="form-horizontal" id="form-review">
                                            <div id="review">
                                                <table class="table table-striped table-bordered">
                                                    <tbody>
                                                        <?php 
                                                        $sqlReview = ' 
                                                        SELECT 
                                                            r.review AS review,
                                                            DATE_FORMAT(r.date_created, "%M %d, %Y") AS date_created,
                                                            r.reviewStar AS star,
                                                            u.firstname as firstname,
                                                            u.lastname as lastname

                                                        FROM tbl_review r
                                                        LEFT JOIN tbl_user u on u.id = r.user_id
                                                        WHERE r.item_id = '.$_GET['id']
                                                        ;
                                                        $execReview = $conn->query($sqlReview);
                                                         while($review = $execReview->fetch_assoc()){
                                                         ?>
                                                        <tr>
                                                            <td style="width: 50%;"><strong><?php echo $review['lastname'].' '.$review['firstname']; ?></strong></td>
                                                            <td class="text-right"><?php echo $review['date_created']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <p><?php echo $review['review']; ?></p>
                                                                <div class="rating-box">
                                                                    <ul>
                                                                        <?php if ($review['star'] == 1): ?>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                        <?php elseif ($review['star'] == 2): ?>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                        <li><i class="ion-android-star"></i></li>
                                                                        <?php elseif ($review['star'] == 3): ?>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                        <?php elseif ($review['star'] == 4): ?>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                        <?php elseif ($review['star'] == 5): ?>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                        
                                                                        <?php endif ?>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- <h2>Write a review</h2>
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
                                            </div> -->
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
                            $sqlRelatedProd = ' SELECT `id`, `name`, `details`, `quantity`, `status`, `date_created`, `category` FROM `tbl_product` WHERE type = "service" AND  category = "'.$product['category'].'" AND id != '.$product['id'];
                            $execRelatedProduct = $conn->query($sqlRelatedProd);
                            if ($execRelatedProduct->num_rows > 0) {
                                while ($rowRelatedProduct = $execRelatedProduct->fetch_assoc()) { ?>
                                    <div class="product-slide_item">
                                        <div class="inner-slide">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="view_service.php?id=<?php echo $rowRelatedProduct['id']; ?>">
                                                        <!-- <img class="primary-img" src="assets/images/product/medium-size/1-1.jpg" alt="Uren's Product Image">
                                                        <img class="secondary-img" src="assets/images/product/medium-size/1-2.jpg" alt="Uren's Product Image"> -->
                                                        <?php 
                                                            $sqlImage = ' SELECT `id`, `product_id`, `image` FROM `tbl_product_image` WHERE product_id = '.$rowRelatedProduct['id'];
                                                            $execImage1 = $conn->query($sqlImage);
                                                            $rowImg1 = $execImage1->fetch_assoc(); ?>
                                                        
                                                                    <img class="primary-img" src="images/products/<?php echo $rowImg1['image']; ?>" alt="Uren's Product Thumnail">
                                                                
                                                    </a>

                                                    <div class="sticker">
                                                        <span class="sticker"><?php echo $product['category']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-desc_info">
                                                        <!-- <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div> -->
                                                        <h6><a class="product-name" href="single-product.html"><?php echo $rowRelatedProduct['name']; ?></a></h6>
                                                        <div class="price-box">
                                                            <?php 
                                                                $sqlTotalOption = ' SELECT `id`, `product_id`, `option_name`, `price` FROM `tbl_item_options` WHERE product_id = '.$rowRelatedProduct['id'];
                                                                $execTotalOption = $conn->query($sqlTotalOption);
                                                                $rowTotalOption = $execTotalOption->fetch_assoc();
                                                                if ($execTotalOption->num_rows > 1 )
                                                                {
                                                                    $sqlSelectOptPrice = ' SELECT MIN(price) as minPrice, MAX(price) as maxPrice FROM `tbl_item_options` WHERE product_id = '.$rowRelatedProduct['id'];
                                                                    $execSelectOptPrice = $conn->query($sqlSelectOptPrice);
                                                                    $rowSelectOptPrice = $execSelectOptPrice->fetch_assoc();

                                                                    // $sqlSelectMaxOpt = ' SELECT MAX(price) as maxPrice FROM `tbl_item_options` WHERE product_id = '.$_GET['id'];
                                                                    // $execSelectMaxOpt = $conn->query($sqlSelectMaxOpt);
                                                                    // $rowSelectMaxOpt = $execSelectMaxOpt->fetch_assoc();

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
                            <?php } } ?>
                      
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