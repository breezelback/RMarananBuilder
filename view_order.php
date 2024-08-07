<!DOCTYPE html>
<html>


<head>

    <?php include 'includes/include_header.php'; ?>

</head>
<?php
$transaction_id = $_GET['id'];
$sqlTransaction = ' SELECT `id`, `transaction_id`, `user_id`, `address_id`, `total`, `mode_of_payment`, `status`, DATE_FORMAT(`date_created`, "%M %d, %Y") AS date_created, `date_finished`, `proof_of_payment`, `details` FROM `tbl_transaction` WHERE id ='.$transaction_id;

$execTransaction = $conn->query($sqlTransaction);
$transaction = $execTransaction->fetch_assoc();

$sqlUser = ' SELECT `id`, `firstname`, `lastname`, `contact_number`, `email`, `gender`, `birthdate`, `status`, `date_created`, `user_type`, `password` FROM `tbl_user` WHERE id = '.$transaction['user_id'].' ';
$execUser = $conn->query($sqlUser);
$user = $execUser->fetch_assoc();


$sqlAddress = ' SELECT `id`, `user_id`, `house_number`, `barangay`, `citymun`, `province`, `region`, `zip_code`, `status`, `date_created` FROM `tbl_address` WHERE user_id = '.$transaction['user_id'].' AND status = 1 ';
$execAddress = $conn->query($sqlAddress);


?>
<body class="template-color-1">

    <div class="main-wrapper">

        <!-- Begin Uren's Header Main Area -->
        <?php include 'includes/header.php'; ?>
        <!-- Uren's Header Main Area End Here -->

        <!-- Begin Uren's Breadcrumb Area -->
     <!--    <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>View Order</h2>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active">View Order</li>
                    </ul>
                </div>
            </div>
        </div> -->
        <!-- Uren's Breadcrumb Area End Here -->

        <!-- Begin Uren's Cart Area -->
        <div class="uren-cart-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="row">
                            <div class="col-md-2">
                                <h6 style="color: darkgrey;">Transaction Code</h6>
                                <h5 style="color: red;"><?php echo $transaction['transaction_id']; ?></h5>
                            </div>
                            <div class="col-md-3">
                                <h6 style="color: darkgrey;">Mode of Payment</h6>
                                <h5><?php echo $transaction['mode_of_payment']; ?></h5>
                                <?php if ($transaction['mode_of_payment'] == "Bank Transfer"){ ?>
                                    <a class="btn btn-primary btn-sm" href="images/proof/<?php echo $transaction['proof_of_payment']; ?>" target="_blank">View Payment Receipt</a>
                                <?php } ?>
                            </div>
                            <div class="col-md-2">
                                <h6 style="color: darkgrey;">Status</h6>
                                <h5><?php echo $transaction['status']; ?></h5>
                            </div>
                            <div class="col-md-2">
                                <h6 style="color: darkgrey;">Date</h6>
                                <h5><?php echo $transaction['date_created']; ?></h5>
                            </div>
                            <div class="col-md-3">
                                <h6 style="color: darkgrey;">Shipping Address</h6>
                        
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

                                <h5><?php echo $address['house_number']; ?> <?php echo $barangay['brgyDesc']; ?> <?php echo $citymun['citymunDesc']; ?> <?php echo $province['provDesc']; ?>, <?php echo $address['zip_code']; ?></h5>
                                   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6 style="color: darkgrey;">Order Details</h6>
                                <h5><?php echo $transaction['details']; ?></h5>
                            </div>
                        </div>
                        <br><hr>
                        
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name">Product</th>
                                            <th class="cart-product-name">Option</th>
                                            <th class="uren-product-price">Unit Price</th>
                                            <th class="uren-product-quantity">Quantity</th>
                                            <th class="uren-product-subtotal">Total</th>
                                            <?php if ($transaction['status'] == "Completed"): ?>
                                                <th>Write Review</th>
                                            <?php endif ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                          $total_cart_item_price = 0;
                                            $getCartItem = ' SELECT 
                                              a.id as cart_item_id,  
                                              a.product_id as product_id,
                                              a.quantity as cart_item_quantity,
                                              b.name as cart_item_name,
                                              c.option_name as cart_item_option,
                                              c.price as cart_item_price
                                              FROM transaction_item a
                                              LEFT JOIN tbl_product b ON b.id = a.product_id
                                              LEFT JOIN tbl_item_options c ON c.id =  a.price
                                              WHERE a.transaction_id = "'.$transaction['transaction_id'].'"
                                          ';
                                        $execCartItem = $conn->query($getCartItem);
                                        while($rowCartItem = $execCartItem->fetch_assoc()){ ?>

                                        <tr>
                                           <td><center><?php echo $rowCartItem['cart_item_name']; ?></center></td>
                                           <td><center><?php echo $rowCartItem['cart_item_option']; ?></center></td>
                                           <td><center>P<?php echo number_format($rowCartItem['cart_item_price'], 2); ?></center></td>
                                           <td><center><?php echo $rowCartItem['cart_item_quantity']; ?></center></td>
                                           <td><center>P<?php echo number_format(($rowCartItem['cart_item_price'] * $rowCartItem['cart_item_quantity']), 2); ?></center></td>

                                           <?php if ($transaction['status'] == "Completed"): ?>
                                                <td><button onclick="writeReview(<?php echo $_GET['id']; ?>, <?php echo $rowCartItem['product_id']; ?>);" class="btn btn-warning text-white"><i class="fa fa-star"></i></button></td>
                                            <?php endif ?>
                                        </tr>
                                        <?php $total_cart_item_price = $total_cart_item_price + ($rowCartItem['cart_item_quantity'] * $rowCartItem['cart_item_price']);  ?>
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
                                        <!-- <h2>Total Price</h2> -->
                                        <ul>
                                            <li>Subtotal <span>₱<?php echo number_format($total_cart_item_price, 2); ?></span></li>
                                            <li>Delivery Charge <span>₱200.00</span></li>
                                            <li>Total Price<span style="font-size: 20px; color: red; font-weight: bolder;">₱<?php echo number_format($total_cart_item_price + 200, 2); ?></span></li>
                                        </ul>
                                        <a href="profile.php">Back</a>
                                    </div>
                                </div>
                            </div>
                      
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Cart Area End Here -->

        <!-- Modal -->
        <form action="function php/write_review.php" method="POST">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Write Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input type="hidden" id="transaction_id" name="transaction_id">
                <input type="hidden" id="item_id" name="item_id">
                <textarea class="form-control" name="userReview" id="userReview" required=""></textarea>
                <br>
                Stars <i class="ion-android-star text-warning"></i><i class="ion-android-star text-warning"></i><i class="ion-android-star text-warning"></i><i class="ion-android-star text-warning"></i><i class="ion-android-star text-warning"></i>
                <select class="form-control" name="reviewStar" id="reviewStar" required="">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
        </div>
        </form>

        <!-- Begin Uren's Footer Area -->
        <?php include 'includes/footer.php'; ?>
        <!-- Uren's Footer Area End Here -->

    </div>

    <script>
        function writeReview(transaction_id, item_id){
            // alert(transaction_id);
            // alert(item_id);
            $('#transaction_id').val(transaction_id);
            $('#item_id').val(item_id);
            $('#myModal').modal('toggle');
        }
    </script>


  <?php include 'includes/include_footer.php'; ?>

</body>


</html>