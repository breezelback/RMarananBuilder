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
                                            <th class="uren-product-thumbnail">images</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="uren-product-price">Unit Price</th>
                                            <th class="uren-product-quantity">Quantity</th>
                                            <th class="uren-product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="uren-product-remove"><a href="javascript:void(0)"><i class="fa fa-trash"
                                                title="Remove"></i></a></td>
                                            <td class="uren-product-thumbnail"><img src="images/wrench.jpg" width="200"></td>
                                            <td class="uren-product-name"><a href="javascript:void(0)">Wrench</a></td>
                                            <td class="uren-product-price"><span class="amount">P200.00</span></td>
                                            <td class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="1" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><span class="amount">P200.00</span></td>
                                        </tr>
                                        <tr>
                                            <td class="uren-product-remove"><a href="javascript:void(0)"><i class="fa fa-trash"
                                                title="Remove"></i></a></td>
                                            <td class="uren-product-thumbnail"><img src="images/wrench.jpg" width="200"></td>
                                            <td class="uren-product-name"><a href="javascript:void(0)">Wrench</a></td>
                                            <td class="uren-product-price"><span class="amount">P200.00</span></td>
                                            <td class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="1" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><span class="amount">P200.00</span></td>
                                        </tr>
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
                                        <h2>Cart totals</h2>
                                        <ul>
                                            <li>Subtotal <span>P400.00</span></li>
                                            <li>Total <span>P400.00</span></li>
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