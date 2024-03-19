<!DOCTYPE html>
<html>


<head>

    <?php include 'includes/include_header.php'; ?>
    <?php 
    //keyword query
    $qryKeyword = '';
    $qrySearch = '';

    if (isset($_GET['keyword'])) 
    {
        $qryKeyword = ' AND category LIKE "'.$_GET['keyword'].'" ';
    }

    if (isset($_GET['qrySearch'])) 
    {
        $qrySearch = ' AND name LIKE "%'.$_GET['qrySearch'].'%" ';
    }

    $sqlProduct = ' SELECT `id`, `name`, `details`, `quantity`, `status`, `date_created`, `category` FROM `tbl_product` WHERE id != "" '.$qryKeyword.' '.$qrySearch.' AND type = "service" ';
    $execProduct = $conn->query($sqlProduct);
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
                    <h2>Shop</h2>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Shop</li>
                    </ul>
                </div>
            </div>
        </div> -->
        <!-- Uren's Breadcrumb Area End Here -->

        <!-- Begin Uren's Shop Left Sidebar Area -->
        <div class="shop-content_wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-5 order-2 order-lg-1 order-md-1">
                        <div class="uren-sidebar-catagories_area">
                            <div class="category-module uren-sidebar_categories">
                                <div class="category-module_heading">
                                    <h5>Categories</h5>
                                </div>
                                <div class="module-body">
                                    <ul class="module-list_item">
                                        <?php 
                                        $sqlCategory = ' SELECT `id`, `category`, `date_created` FROM `tbl_category` ORDER BY category ASC ';
                                        $execCat = $conn->query($sqlCategory);
                                        while ($rowCat = $execCat->fetch_assoc()) { 
                                            $sqlCountCat = ' SELECT COUNT(id) AS ttlCat FROM tbl_product WHERE category = "'.$rowCat['category'].'" AND type = "service" ';
                                            $execSqlCountCat = $conn->query($sqlCountCat);
                                            $rowCountCat = $execSqlCountCat->fetch_assoc();
                                        ?>
                                        <li>
                                            <a href="shop.php?keyword=<?php echo $rowCat['category']; ?>"><?php echo $rowCat['category']; ?> <span>(<?php echo $rowCountCat['ttlCat']; ?>)</span></a>
                                        </li>

                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                      <!--   <div class="sidebar-banner_area">
                            <div class="banner-item img-hover_effect">
                                <a href="javascript:void(0)">
                                    <img src="images/s3.jpg" alt="Uren's Shop Banner Image">
                                </a>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-lg-9 col-md-7 order-1 order-lg-2 order-md-2">
                        <div class="shop-toolbar">
                            <div class="product-view-mode">
                                <a class="grid-1" data-target="gridview-1" data-toggle="tooltip" data-placement="top" title="1">1</a>
                                <a class="grid-2" data-target="gridview-2" data-toggle="tooltip" data-placement="top" title="2">2</a>
                                <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="3">3</a>
                                <a class="grid-4" data-target="gridview-4" data-toggle="tooltip" data-placement="top" title="4">4</a>
                                <a class="grid-5" data-target="gridview-5" data-toggle="tooltip" data-placement="top" title="5">5</a>
                                <!-- <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top" title="List"><i class="fa fa-th-list"></i></a> -->
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
                                    </select>
                                </div>
                                <!-- <div class="product-showing">
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
                            while ($rowProduct = $execProduct->fetch_assoc()) { 
                                $sqlProdImg = ' SELECT `id`, `product_id`, `image` FROM `tbl_product_image` WHERE product_id = '.$rowProduct['id'].' LIMIT 1 ';
                                $execProdImg = $conn->query($sqlProdImg);
                                $rowProdImg = $execProdImg->fetch_assoc();
                                ?>
                                <div class="col-lg-4">
                                    <div class="product-slide_item">
                                        <div class="inner-slide">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="view_service.php?id=<?php echo $rowProduct['id']; ?>">
                                                        <img class="primary-img" src="images/products/<?php echo $rowProdImg['image']; ?>" alt="Uren's Product Image">
                                                        <img class="secondary-img" src="images/products/<?php echo $rowProdImg['image']; ?>" alt="Uren's Product Image">
                                                    </a>
                                                    <div class="sticker">
                                                        <span class="sticker">New</span>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul>
                                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="view_service.php?id=<?php echo $rowProduct['id']; ?>" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-android-open"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-desc_info">
                                                        <div class="rating-box">
                                                           
                                                        </div>
                                                        <h6><a class="product-name" href="single-product.html"><?php echo $rowProduct['name']; ?></a></h6>
                                                        <div class="price-box">
                                                              <?php 
                                                                $sqlTotalOption = ' SELECT `id`, `product_id`, `option_name`, `price` FROM `tbl_item_options` WHERE product_id = '.$rowProduct['id'];
                                                                $execTotalOption = $conn->query($sqlTotalOption);
                                                                $rowTotalOption = $execTotalOption->fetch_assoc();
                                                                if ($execTotalOption->num_rows > 1 )
                                                                {
                                                                    $sqlSelectOptPrice = ' SELECT MIN(price) as minPrice, MAX(price) as maxPrice FROM `tbl_item_options` WHERE product_id = '.$rowProduct['id'];
                                                                    $execSelectOptPrice = $conn->query($sqlSelectOptPrice);
                                                                    $rowSelectOptPrice = $execSelectOptPrice->fetch_assoc();

                                                                    // $sqlSelectMaxOpt = ' SELECT MAX(price) as maxPrice FROM `tbl_item_options` WHERE product_id = '.$_GET['id'];
                                                                    // $execSelectMaxOpt = $conn->query($sqlSelectMaxOpt);
                                                                    // $rowSelectMaxOpt = $execSelectMaxOpt->fetch_assoc();

                                                                    echo '<span class="new-price">₱'.$rowSelectOptPrice['minPrice'].' - ₱'.$rowSelectOptPrice['maxPrice'].'</span>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<span class="new-price">P200.00</span>';
                                                                }
                                                                ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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