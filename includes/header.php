<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>R. Maranan's Builder and Construction Supply</title>
<meta name="robots" content="noindex, follow" />
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

<header class="header-main_area bg--sapphire">
    <div class="header-middle_area" style="padding: 0px;">
        <div class="container-fluid">
            <div class="row">
                <div class="custom-logo_col col-12">
                    <div class="header-logo_area">
                        <a href="index.php">
                            <span style="font-family: fantasy; font-size: 32px; color: white;"><img src="images/LOGO1.jpg" width="60" style="border: 1px solid white;"> R. MARANAN'S BUILDER</span>
                        </a>    
                    </div>
                </div>
                <div class="custom-cart_col col-12">
                    <div class="header-right_area" style="margin-top: 17px;">
                        <ul>
                            <li class="mobile-menu_wrap d-flex d-lg-none">
                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                    <i class="ion-navicon"></i>
                                </a>
                            </li>

                            <?php if (!empty($_SESSION)): ?>
                                <li class="minicart-wrap">
                                    <a href="#miniCart" class="minicart-btn toolbar-btn">
                                        <div class="minicart-count_area">
                                            <span class="item-count">3</span>
                                            <i class="ion-bag"></i>
                                        </div>
                                        <div class="minicart-front_text">
                                            <span>Cart:</span>
                                            <span class="total-price">462.4</span>
                                        </div>
                                    </a>
                                </li>
                            <?php else: ?>
                                <li class="minicart-wrap">
                                    <a href="login.php" class="minicart-btn">
                                        <div class="minicart-count_area">
                                            <span class="item-count">0</span>
                                            <i class="ion-bag"></i>
                                        </div>
                                        <div class="minicart-front_text">
                                            <span>Cart:</span>
                                            <span class="total-price">0</span>
                                        </div>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <li class="contact-us_wrap">
                                <a href="tel://+63929752520"><i class="ion-android-call"></i>0929 752 5204</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-top_area d-lg-block d-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-7 col-lg-8">
                    <div class="main-menu_area position-relative">
                        <nav class="main-nav">
                            <ul>
                                <!-- <li class="dropdown-holder active"><a href="index.php">Home</a></li> -->
                                <li class=""><a href="index.php">Home</a></li>
                                <li class=""><a href="shop.php">Shop</a></li>
                                <li class=""><a href="services.php">Services</a></li>
                                <li class=""><a href="about.php">About Us</a></li>
                                <li class=""><a href="contact.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-4">
                    <div class="ht-right_area">
                        <div class="ht-menu">
                            <ul>
                                <?php if (!empty($_SESSION)): ?>
                                    <li><a href="profile.php">My Account<i class="fa fa-chevron-down"></i></a>
                                        <ul class="ht-dropdown ht-my_account">
                                            <li class="active"><a href="cart.php">Cart</a></li>
                                            <li class="active"><a href="function php/logout.php">Logout</a></li>
                                        </ul>
                                    </li>
                                <?php else: ?>
                                    <li><a href="">My Account<i class="fa fa-chevron-down"></i></a>
                                        <ul class="ht-dropdown ht-my_account">
                                            <li><a href="register.php">Register</a></li>
                                            <li class="active"><a href="login.php">Login</a></li>
                                        </ul>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle_area">
        <div class="container-fluid">
            <div class="row">
                <div class="custom-category_col col-12">
                    <div class="category-menu category-menu-hidden">
                        <div class="category-heading">
                            <h2 class="categories-toggle">
                                <span>Product Categories</span>
                                <!-- <span>Department</span> -->
                            </h2>
                        </div>
                        <div id="cate-toggle" class="category-menu-list">
                            <ul>
                                <?php
                                $sqlCat = ' SELECT `id`, `category`, `date_created` FROM `tbl_category` ORDER BY category ASC ';
                                $execCat = $conn->query($sqlCat);
                                while ($rowCat = $execCat->fetch_assoc()) { ?>
                                <li class="right-menu"><a href="shop.php?keyword=<?php echo $rowCat['category']; ?>"><?php echo $rowCat['category']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="custom-search_col col-12">
                    <div class="hm-form_area">
                        <form action="#" class="hm-searchbox">
                            <input type="text" placeholder="Enter your search key ...">
                            <button class="header-search_btn" type="submit"><i
                                class="ion-ios-search-strong"><span>Search</span></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-minicart_wrapper" id="miniCart">
        <div class="offcanvas-menu-inner">
            <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
            <div class="minicart-content">
                <div class="minicart-heading">
                    <h4>Shopping Cart</h4>
                </div>
                <ul class="minicart-list">
                    <li class="minicart-product">
                        <a class="product-item_remove" href="javascript:void(0)"><i
                            class="ion-android-close"></i></a>
                        <div class="product-item_img">
                            <img src="images/wrench.jpg" alt="Uren's Product Image">
                        </div>
                        <div class="product-item_content">
                            <a class="product-item_title" href="shop.php">Wrench</a>
                            <span class="product-item_quantity">1 x P200.00</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="minicart-item_total">
                <span>Subtotal</span>
                <span class="ammount">P200.00</span>
            </div>
            <div class="minicart-btn_area">
                <a href="cart.php" class="uren-btn uren-btn_dark uren-btn_fullwidth">Minicart</a>
            </div>
            <div class="minicart-btn_area">
                <a href="checkout.php" class="uren-btn uren-btn_dark uren-btn_fullwidth">Checkout</a>
            </div>
        </div>
    </div>
    <div class="mobile-menu_wrapper" id="mobileMenu">
        <div class="offcanvas-menu-inner">
            <div class="container">
                <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                <div class="offcanvas-inner_search">
                    <form action="#" class="inner-searchbox">
                        <input type="text" placeholder="Search for item...">
                        <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
                <nav class="offcanvas-navigation">
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children active"><a href="index.html"><span
                                class="mm-text">Home</span></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="index.html">
                                        <span class="mm-text">Home One</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index-2.html">
                                        <span class="mm-text">Home Two</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index-3.html">
                                        <span class="mm-text">Home Three</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="shop-left-sidebar.html">
                                <span class="mm-text">Shop</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="menu-item-has-children">
                                    <a href="shop-left-sidebar.html">
                                        <span class="mm-text">Grid View</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="shop-grid-fullwidth.html">
                                                <span class="mm-text">Column Three</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-4-column.html">
                                                <span class="mm-text">Column Four</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-left-sidebar.html">
                                                <span class="mm-text">Left Sidebar</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-right-sidebar.html">
                                                <span class="mm-text">Right Sidebar</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="shop-list-left-sidebar.html">
                                        <span class="mm-text">Shop List</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="shop-list-fullwidth.html">
                                                <span class="mm-text">Full Width</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-list-left-sidebar.html">
                                                <span class="mm-text">Left Sidebar</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-list-right-sidebar.html">
                                                <span class="mm-text">Right Sidebar</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="single-product-gallery-left.html">
                                        <span class="mm-text">Single Product Style</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="single-product-gallery-left.html">
                                                <span class="mm-text">Gallery Left</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-gallery-right.html">
                                                <span class="mm-text">Gallery Right</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-tab-style-left.html">
                                                <span class="mm-text">Tab Style Left</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-tab-style-right.html">
                                                <span class="mm-text">Tab Style Right</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-sticky-left.html">
                                                <span class="mm-text">Sticky Left</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-sticky-right.html">
                                                <span class="mm-text">Sticky Right</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="single-product.html">
                                        <span class="mm-text">Single Product Type</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="single-product.html">
                                                <span class="mm-text">Single Product</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-sale.html">
                                                <span class="mm-text">Single Product Sale</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-group.html">
                                                <span class="mm-text">Single Product Group</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-variable.html">
                                                <span class="mm-text">Single Product Variable</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-affiliate.html">
                                                <span class="mm-text">Single Product Affiliate</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-slider.html">
                                                <span class="mm-text">Single Product Slider</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="blog-left-sidebar.html">
                                <span class="mm-text">Blog</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="menu-item-has-children has-children">
                                    <a href="blog-left-sidebar.html">
                                        <span class="mm-text">Grid View</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="blog-2-column.html">
                                                <span class="mm-text">Column Two</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-3-column.html">
                                                <span class="mm-text">Column Three</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-left-sidebar.html">
                                                <span class="mm-text">Left Sidebar</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-right-sidebar.html">
                                                <span class="mm-text">Right Sidebar</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children has-children">
                                    <a href="blog-list-left-sidebar.html">
                                        <span class="mm-text">List View</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="blog-list-fullwidth.html">
                                                <span class="mm-text">List Fullwidth</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-list-left-sidebar.html">
                                                <span class="mm-text">List Left Sidebar</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-list-right-sidebar.html">
                                                <span class="mm-text">List Right Sidebar</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children has-children">
                                    <a href="blog-details-left-sidebar.html">
                                        <span class="mm-text">Blog Details</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="blog-details-left-sidebar.html">
                                                <span class="mm-text">Left Sidebar</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-details-right-sidebar.html">
                                                <span class="mm-text">Right Sidebar</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children has-children">
                                    <a href="blog-gallery-format.html">
                                        <span class="mm-text">Blog Format</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="blog-gallery-format.html">
                                                <span class="mm-text">Gallery Format</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-audio-format.html">
                                                <span class="mm-text">Audio Format</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-video-format.html">
                                                <span class="mm-text">Video Format</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="index.html">
                                <span class="mm-text">Pages</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="my-account.html">
                                        <span class="mm-text">My Account</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="login-register.html">
                                        <span class="mm-text">Login | Register</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="wishlist.html">
                                        <span class="mm-text">Wishlist</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="cart.html">
                                        <span class="mm-text">Cart</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="checkout.html">
                                        <span class="mm-text">Checkout</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="compare.html">
                                        <span class="mm-text">Compare</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="faq.html">
                                        <span class="mm-text">FAQ</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="404.html">
                                        <span class="mm-text">Error 404</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <nav class="offcanvas-navigation user-setting_area">
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children active"><a href="javascript:void(0)"><span
                                class="mm-text">User
                                Setting</span></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="my-account.html">
                                        <span class="mm-text">My Account</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="login-register.html">
                                        <span class="mm-text">Login | Register</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="javascript:void(0)"><span
                                class="mm-text">Currency</span></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">EUR €</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">USD $</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="javascript:void(0)"><span
                                class="mm-text">Language</span></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">English</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">Français</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">Romanian</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">Japanese</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    </header>