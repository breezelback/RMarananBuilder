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
                    <h2>Checkout</h2>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->
        <?php 
        $sqlUser = ' SELECT `id`, `firstname`, `lastname`, `contact_number`, `email`, `gender`, `birthdate`, `status`, `date_created`, `user_type`, `password` FROM `tbl_user` WHERE id = '.$_SESSION['id'].' ';
        $execUser = $conn->query($sqlUser);
        $user = $execUser->fetch_assoc();


        $sqlAddress = ' SELECT `id`, `user_id`, `house_number`, `barangay`, `citymun`, `province`, `region`, `zip_code`, `status`, `date_created` FROM `tbl_address` WHERE user_id = '.$_SESSION['id'].' AND status = 1 ';
        $execAddress = $conn->query($sqlAddress);
        

        ?>
        <form action="function php/checkout.php" method="POST">
            <!-- Begin Uren's Checkout Area -->
            <div class="checkout-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <h3>Personal Details</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    Name:
                                    <input type="text" class="form-control" value="<?php echo $user['firstname'].' '.$user['lastname']; ?>" readonly="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    Contact Number:
                                    <input type="text" class="form-control" value="<?php echo $user['contact_number']; ?>" readonly="">
                                </div>
                                <div class="col-md-6">
                                    Email:
                                    <input type="text" class="form-control" value="<?php echo $user['email']; ?>" readonly="">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    Shipping Address: <a href="profile.php"><i class="text-primary">Change</i></a>
                                    <?php $address = $execAddress->fetch_assoc();
                                        $selectProvince = ' SELECT provDesc FROM refprovince WHERE provCode = "'.$address['province'].'" ';
                                        $execProvince = $conn->query($selectProvince);
                                        $province = $execProvince->fetch_assoc();

                                        $selectCityMun = ' SELECT citymunDesc FROM refcitymun WHERE citymunCode = "'.$address['citymun'].'" ';
                                        $execCityMun = $conn->query($selectCityMun);
                                        $citymun = $execCityMun->fetch_assoc();

                                        $selectBarangay = ' SELECT brgyDesc FROM refbrgy WHERE brgyCode = "'.$address['barangay'].'" ';
                                        $execBarangay = $conn->query($selectBarangay);
                                        $barangay = $execBarangay->fetch_assoc();

                                    ?>

                                    <textarea name="" id="" cols="30" rows="3" class="form-control" readonly=""><?php echo $address['house_number']; ?> <?php echo $barangay['brgyDesc']; ?> <?php echo $citymun['citymunDesc']; ?> <?php echo $province['provDesc']; ?>, <?php echo $address['zip_code']; ?></textarea>
                                    <input type="hidden" name="address_id" value="<?php echo $address['id']; ?> ">
                                    <br>
                                    <!-- <iframe class="map" width="100%" height="350" frameborder="1" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/?ie=UTF8&t=m&ll=13.2164639,74.995161&spn=0.003381,0.017231&z=16&output=embed"></iframe> -->

                                    <iframe class="map" width="100%" height="300" frameborder="2" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?q=<?php echo $address['house_number']; ?> <?php echo $barangay['brgyDesc']; ?> <?php echo $citymun['citymunDesc']; ?> <?php echo $province['provDesc']; ?>&output=embed"></iframe>


                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Product</th>
                                                <th class="cart-product-total">Total</th>
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
                                            <tr class="cart_item">
                                                <td class="cart-product-name"><b><?php echo $rowCartItem['cart_item_option']; ?></b> - <?php echo $rowCartItem['cart_item_name']; ?><strong class="product-quantity">
                                                × <?php echo $rowCartItem['cart_item_quantity']; ?></strong></td>
                                                <td class="cart-product-total"><center><span class="amount">P<?php echo number_format($rowCartItem['cart_item_quantity'] * $rowCartItem['cart_item_price'], 2); ?></span></center></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><center><span class="amount">P<?php echo number_format($rowCart['total_cart_item_price'], 2); ?></span></center></td>
                                            </tr>
                                            <tr class="cart-subtotal">
                                                <th>Shipping Fee</th>
                                                <td><center><span class="amount">P200.00</span></center></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><center><span class="amount text-danger">P<?php echo number_format($rowCart['total_cart_item_price'] + 200, 2); ?></span></center></strong></td>
                                                <input type="hidden" name="total" value="<?php echo $rowCart['total_cart_item_price'] + 200; ?>">
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    Payment Method


                                    <div class="payment-accordion">
                                       <!--  <div id="accordion">
                                            <div class="card">
                                                <div class="card-header" id="#payment-1">
                                                    <h5 class="panel-title">
                                                        <a href="javascript:void(0)" class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Cash on Delivery
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>Please prepare the exact amount once order has been delivered to your registered address.

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="#payment-2">
                                                    <h5 class="panel-title">
                                                        <a href="javascript:void(0)" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            Online Payment.
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>Please upload transaction receipt before checkout.

                                                            <input type="file" class="form-control">
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="#payment-3">
                                                    <h5 class="panel-title">
                                                        <a href="javascript:void(0)" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            PayPal
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>Make your payment directly into our bank account. Please use your Order
                                                            ID as the payment
                                                            reference. Your order won’t be shipped until the funds have cleared in
                                                            our account.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->

                                        <select name="mop" id="mop" class="form-control">
                                            <option value="Cash on Delivery">Cash on Delivery</option>
                                            <option value="Bank Transfer">Bank Transfer</option>
                                            <!-- <option value="Paypal">Paypal</option> -->
                                        </select>
                                        <div class="order-button-payment">
                                            <input value="Place order" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Uren's Checkout Area End Here -->
        </form>
        <!-- Begin Uren's Footer Area -->
        <?php include 'includes/footer.php'; ?>
        <!-- Uren's Footer Area End Here -->

    </div>

  <?php include 'includes/include_footer.php'; ?>

</body>


</html>