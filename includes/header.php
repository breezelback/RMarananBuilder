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

                            <?php if (!empty($_SESSION['id'])): ?>

                            <?php
                            $getCart = ' SELECT 
                                            COUNT(a.id) as cart_item_count,  
                                            SUM(c.price * a.quantity) as total_cart_item_price
                                        FROM tbl_cart a
                                        LEFT JOIN tbl_item_options c ON c.id =  a.price
                                        WHERE a.user_id = '.$_SESSION['id'].'
                            ';
                            $execCart = $conn->query($getCart);
                            $rowCart = $execCart->fetch_assoc();

                            ?>



                                <li class="minicart-wrap">
                                    <a href="#miniCart" class="minicart-btn toolbar-btn">
                                        <div class="minicart-count_area">
                                            <span class="item-count"><?php echo $rowCart['cart_item_count']; ?></span>
                                            <i class="ion-bag"></i>
                                        </div>
                                        <div class="minicart-front_text">
                                            <span>Cart:</span>
                                            <span class="total-price">₱<?php echo $rowCart['total_cart_item_price']; ?></span>
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
                <div class="col-xl-4 col-lg-4"></div>
                <div class="col-xl-6 col-lg-6">
                    <!-- <div class="main-menu_area position-relative"> -->
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
                <div class="col-xl-2 col-lg-2">
                    <div class="ht-right_area">
                        <div class="ht-menu">
                            <ul>
                                <?php if (!empty($_SESSION['id'])): ?>
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
                                <li class="right-menu"><a href="shop.php?category=<?php echo $rowCat['category']; ?>"><?php echo $rowCat['category']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="custom-search_col col-12">
                    <div class="hm-form_area">
                        <form action="shop.php" class="hm-searchbox" method="GET" name="frmSearch">
                            <input type="text" name="qrySearch" placeholder="Enter your search key ...">
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
                      <?php if (!empty($_SESSION['id'])): ?>
                        <?php
                            $getCartItem = ' SELECT 
                                a.id as cart_item_id,  
                                a.quantity as cart_item_quantity,
                                b.name as cart_item_name,
                                c.option_name as cart_item_option,
                                c.price as cart_item_price
                                -- d.image as cart_item_image
                                FROM tbl_cart a
                                LEFT JOIN tbl_product b ON b.id = a.product_id
                                LEFT JOIN tbl_item_options c ON c.id =  a.price
                                -- LEFT JOIN tbl_product_image d ON d.product_id = a.product_id
                                WHERE a.user_id = '.$_SESSION['id'].'
                            ';
                            $execCartItem = $conn->query($getCartItem);
                            while($rowCartItem = $execCartItem->fetch_assoc()){

                        ?>

                            <li class="minicart-product">
                              <!--   <a class="product-item_remove" href="javascript:void(0)"><i
                                    class="ion-android-close"></i></a>
                                <div class="product-item_img">
                                    <img src="images/products/<?php echo $rowCartItem['cart_item_image']; ?>" alt="Uren's Product Image">
                                </div> -->
                                 <a class="product-item_remove" href="function php/remove_cart_item.php?id=<?php echo $rowCartItem['cart_item_id']; ?>"><i
                                    class="ion-android-close"></i></a>
                                <div class="product-item_img" style="background-color: grey; color: white;">
                                   <center><?php echo $rowCartItem['cart_item_option']; ?></center>
                                </div>
                                <div class="product-item_content">
                                    <a class="product-item_title" href="shop.php"><b><?php echo $rowCartItem['cart_item_name']; ?></b></a>
                                    <span class="product-item_quantity"><?php echo $rowCartItem['cart_item_quantity']; ?> x P<?php echo $rowCartItem['cart_item_price']; ?>.00</span>
                                </div>
                            </li>

                        <?php } ?>
                    <?php endif ?>
               

                </ul>
            </div>
            <div class="minicart-item_total">
                <span>Subtotal</span>
                <span class="ammount">P<?php echo $rowCart['total_cart_item_price']; ?>.00</span>
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
                  <!--   <form action="#" class="inner-searchbox">
                        <input type="text" placeholder="Search for item...">
                        <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                    </form> -->
                     <form action="shop.php" class="hm-searchbox" method="GET" name="frmSearch">
                        <input type="text" name="qrySearch" placeholder="Enter your search key ...">
                        <button class="header-search_btn" type="submit"><i
                            class="ion-ios-search-strong"><span>Search</span></i></button>
                    </form>
                </div>
                <nav class="offcanvas-navigation">
                    <ul class="mobile-menu">
                        
                        <li class=""><a href="index.php">Home</a></li>
                        <li class=""><a href="shop.php">Shop</a></li>
                        <li class=""><a href="services.php">Services</a></li>
                        <li class=""><a href="about.php">About Us</a></li>
                        <li class=""><a href="contact.php">Contact</a></li>
                       
                    </ul>
                </nav>
                <!-- <nav class="offcanvas-navigation user-setting_area">
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
                </nav> -->
            </div>
        </div>
    </div>
    </header>