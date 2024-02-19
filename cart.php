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

        <!-- Begin Uren's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Cart</h2>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->

        <!-- Begin Uren's Cart Area -->
        <div class="uren-cart-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="javascript:void(0)">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="uren-product-remove">remove</th>
                                            <!-- <th class="uren-product-thumbnail">images</th> -->
                                            <th class="cart-product-name">Product</th>
                                            <th class="cart-product-name">Option</th>
                                            <th class="uren-product-price">Unit Price</th>
                                            <th class="uren-product-quantity">Quantity</th>
                                            <th class="uren-product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                        while($rowCartItem = $execCartItem->fetch_assoc()){ ?>

                                        <tr>
                                            <td class="uren-product-remove"><a href="function php/remove_cart_item.php?id=<?php echo $rowCartItem['cart_item_id']; ?>"><i class="fa fa-trash"
                                                title="Remove"></i></a></td>
                                            <!-- <td class="uren-product-thumbnail"><img src="images/wrench.jpg" width="200"></td> -->
                                            <td class="uren-product-name"><a href="javascript:void(0)"><?php echo $rowCartItem['cart_item_name']; ?></a></td>
                                            <td class="uren-product-name"><a href="javascript:void(0)"><?php echo $rowCartItem['cart_item_option']; ?></a></td>
                                            <td class="uren-product-price"><span class="amount">P<?php echo number_format($rowCartItem['cart_item_price'], 2); ?></span></td>
                                            <td class="quantity"><span class="amount"><?php echo $rowCartItem['cart_item_quantity']; ?></span></td>
                                           <!--  <td class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="1" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </td> -->
                                            <td class="product-subtotal"><span class="amount">P<?php echo number_format($rowCartItem['cart_item_quantity'] * $rowCartItem['cart_item_price'], 2); ?></span></td>
                                        </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- <div class="row">
                                <div class="col-12">
                                    <div class="coupon-all">
                                        <div class="coupon">
                                            <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                            <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                        </div>
                                        <div class="coupon2">
                                            <input class="button" name="update_cart" value="Update cart" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Cart total</h2>
                                        <ul>
                                            <!-- <li>Subtotal <span>₱<?php echo $rowCart['total_cart_item_price']; ?></span></li> -->
                                            <li>Total <span style="font-size: 20px; color: red; font-weight: bolder;">₱<?php echo number_format($rowCart['total_cart_item_price'], 2); ?></span></li>
                                        </ul>
                                        <a href="checkout.php">Proceed to checkout</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Cart Area End Here -->

        <!-- Begin Uren's Footer Area -->
        <?php include 'includes/footer.php'; ?>
        <!-- Uren's Footer Area End Here -->

    </div>

  <?php include 'includes/include_footer.php'; ?>

</body>


</html>