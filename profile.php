<!DOCTYPE html>
<html>


<head>

    <?php include 'includes/include_header.php'; ?>
    <?php 
        $selectUser = 'SELECT `id`, `firstname`, `lastname`, `contact_number`, `email`, `gender`, `birthdate`, `status`, `date_created`, `user_type`, `password` FROM `tbl_user` WHERE id = '.$_SESSION['id'];
        $execUser = $conn->query($selectUser);
        $user = $execUser->fetch_assoc();
    ?>

</head>

<body class="template-color-1">

    <div class="main-wrapper">

        <!-- Begin Uren's Header Main Area -->
        <?php include 'includes/header.php'; ?>
        <!-- Uren's Header Main Area End Here -->

        <!-- Begin Uren's Page Content Area -->
        <main class="page-content">
            <!-- Begin Uren's Account Page Area -->
            <div class="account-page-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="account-dashboard-tab" data-toggle="tab" href="#account-dashboard" role="tab" aria-controls="account-dashboard" aria-selected="true">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders" role="tab" aria-controls="account-orders" aria-selected="false">Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-address-tab" data-toggle="tab" href="#account-address" role="tab" aria-controls="account-address" aria-selected="false">Addresses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-details-tab" data-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">Account Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-logout-tab" href="function php/logout.php" role="tab" aria-selected="false">Logout</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                                <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
                                    <div class="myaccount-dashboard">
                                        <p>Hello <b> <?php echo $user['firstname'].' '.$user['lastname']; ?> </b> (not <?php echo $user['firstname'].' '.$user['lastname']; ?>? <a href="login.php">Sign
                                                out</a>)</p>
                                        <p>From your account dashboard you can view your recent orders, manage your shipping and
                                            billing addresses and <a href="javascript:void(0)">edit your password and account details</a>.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">
                                    <div class="myaccount-orders">
                                        <h4 class="small-title">MY ORDERS</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <tbody>
                                                    <tr>
                                                        <th>ORDER</th>
                                                        <th>DATE</th>
                                                        <th>MODE OF PAYMENT</th>
                                                        <th>STATUS</th>
                                                        <th>TOTAL</th>
                                                        <th></th>
                                                    </tr>

                                                    <?php

                                                    $selectOrders = ' SELECT `id`, `transaction_id`, `user_id`, `address_id`, `total`, `mode_of_payment`, `status`, date_format(`date_created`, "%M %d, %Y") AS date_created, `date_finished` FROM `tbl_transaction` WHERE user_id = '.$_SESSION['id'].' ';
                                                    $execOrders = $conn->query($selectOrders);
                                                    while ($orders = $execOrders->fetch_assoc()) {
                                                    ?>


                                                    <tr>
                                                        <td><a class="account-order-id" href="javascript:void(0)"><?php echo $orders['transaction_id']; ?></a></td>
                                                        <td><?php echo $orders['date_created']; ?></td>
                                                        <td><?php echo $orders['mode_of_payment']; ?></td>
                                                        <td><?php echo $orders['status']; ?></td>
                                                        <td>P<?php echo number_format($orders['total'], 2); ?></td>
                                                        <td><a href="view_order.php?id=<?php echo $orders['id']; ?>" class="uren-btn uren-btn_dark uren-btn_sm"><span>View</span></a>
                                                        </td>
                                                    </tr>
                                                    
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-address" role="tabpanel" aria-labelledby="account-address-tab">
                                    <div class="myaccount-address">
                                        <p>The following addresses will be used on the checkout page by default.</p>
                                        <button class="btn btn-primary my-1" data-toggle="modal" data-target="#exampleModal">Add New Address</button>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <tbody>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>ADDRESS</th>
                                                        <th>STATUS</th>
                                                        <th><center>ACTION</center></th>
                                                    </tr>
                                                    <tr>
                                                    </tr>
                                                    <?php 
                                                    $counter = 1;
                                                    $selectAddress = '
                                                        SELECT
                                                            a.id as address_id, 
                                                            a.zip_code,
                                                            a.house_number AS house_number,
                                                            a.status AS status,
                                                            b.ProvDesc AS province,
                                                            c.citymunDesc AS citymun,
                                                            d.brgyDesc AS barangay
                                                        FROM
                                                            tbl_address a
                                                        LEFT JOIN refprovince b ON
                                                            b.provCode = a.province
                                                        LEFT JOIN refcitymun c ON
                                                            c.citymunCode = a.citymun
                                                        LEFT JOIN refbrgy d ON
                                                            d.brgyCode = a.barangay
                                                        WHERE
                                                            a.user_id = '.$_SESSION['id'].'
                                                    ';
                                                    $execAddress = $conn->query($selectAddress);
                                                    while ($address = $execAddress->fetch_assoc()) {
                                                        
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $counter; ?></td>
                                                        <td> <?php echo $address['house_number'].' '.$address['barangay'].' '.$address['citymun'].' '.$address['province'].' '.$address['zip_code']; ?> </td>
                                                        <td>
                                                            <?php if ($address['status'] == 1): ?>
                                                                Active
                                                            <?php else: ?>
                                                                Inactive
                                                            <?php endif ?>
                                                        </td>
                                                        <td>
                                                            <center>
                                                                <?php if ($address['status'] == 0): ?>
                                                                    <a href="function php/setactive.php?id=<?php echo $address['address_id']; ?>" class="btn btn-success text-white">Set Active</a>
                                                                    <a href="function php/delete_address.php?id=<?php echo $address['address_id']; ?>"  class="btn btn-danger text-white">Delete</a>
                                                                <?php else: ?>
                                                                    <button class="btn btn-danger text-white" disabled="">Delete</button>
                                                                <?php endif ?>
                                                            </center>
                                                        </td>
                                                    </tr>

                                                    <?php $counter++; } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
                                    <div class="myaccount-details">
                                        <form action="function php/update_profile.php" class="uren-form" method="POST">
                                            <div class="uren-form-inner">
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-firstname">First Name*</label>
                                                    <input type="text" name="firstname" value="<?php echo $user['firstname']; ?>">
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-lastname">Last Name*</label>
                                                    <input type="text" name="lastname" value="<?php echo $user['lastname']; ?>">
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-email">Email</label>
                                                    <input style="background-color: #f3f3f3;" type="email" id="account-details-email" readonly="" value="<?php echo $user['email']; ?>">
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-contact_number">Contact Number</label>
                                                    <input type="contact_number" name="contact_number" value="<?php echo $user['contact_number']; ?>">
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-gender">Gender</label>
                                                    <select name="gender" id="gender" class="form-control">
                                                        <option value="Male" <?php if($user['gender'] == "Male") {echo "selected";} ?>>Male</option>
                                                        <option value="Female" <?php if($user['gender'] == "Female") {echo "selected";} ?>>Female</option>
                                                    </select>
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-birthdate">Birthdate</label>
                                                    <input type="date" name="birthdate" value="<?php echo $user['birthdate']; ?>">
                                                </div>
                                            
                                                <div class="single-input">
                                                    <label for="account-details-newpass">New Password (leave blank to leave
                                                        unchanged)</label>
                                                    <input type="password" name="newpass">
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-confpass">Confirm New Password</label>
                                                    <input type="password" name="confpass">
                                                </div>
                                                <div class="single-input">
                                                    <button class="uren-btn uren-btn_dark" type="submit"><span>SAVE
                                                    CHANGES</span></button>
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
            <!-- Uren's Account Page Area End Here -->
        </main>
        <!-- Uren's Page Content Area End Here -->

        <!-- Begin Uren's Footer Area -->
        <?php include 'includes/footer.php'; ?>
        <!-- Uren's Footer Area End Here -->


        <form action="function php/insert_address.php" method="POST">
        <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">

                    <div class="row">
                        <div class="col-sm-4">
                            <label>Province</label>
                            <select class="form-control" name="province" id="province" required="">
                                <?php 
                                    $selectProvince = ' SELECT `id`, `psgcCode`, `provDesc`, `regCode`, `provCode` FROM `refprovince` ORDER BY provDesc ASC '; 
                                    $execProvince = $conn->query($selectProvince);
                                    while ($province = $execProvince->fetch_assoc()) { ?>

                                    <option value="<?php echo $province['provCode']; ?>"><?php echo $province['provDesc']; ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>City / Municipality</label>
                            <select class="form-control" name="city" id="city" required="">
                             </select>
                        </div>
                        <div class="col-sm-4">
                            <label>Barangay</label>
                            <select class="form-control" name="barangay" id="barangay" required=""></select>
                        </div>
                        <div class="col-sm-8">
                            <label>House No. / Purok</label>
                            <input class="form-control" type="text" placeholder="House No. / Purok" name="house_number" required="">
                        </div>
                        <div class="col-sm-4">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" placeholder="ZIP Code" name="zip_code" required="">
                        </div>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
        </form>

    </div>

  <?php include 'includes/include_footer.php'; ?>
   <script>
    
        $('#province').on('change', function(){
            $('#barangay').empty();
            let province_val = $(this).val();
            // alert(province_val);

           $.ajax({  
                url:"function php/fetch_citymun.php?prov_id="+province_val, 
                method:"POST",  
                contentType:false,
                cache:false,
                processData:false,

                beforeSend:function() {
                }, 

                success:function(data){  
                // alert(data);
                $('#city').empty();
                // $('#section')
                //   .append($("<option></option>")
                //   .attr("value", "")
                //   .text("All")); 

                if (data != '') 
                {
                  var jsArray = JSON.parse(data);
                  $.each(jsArray, function(key, value) {   
                    $('#city')
                    .append($("<option></option>")
                    .attr("value", key)
                    .text(value)); 
                  });
                }
                }

            });  
        });

    
        $('#city').on('change', function(){
            let city_val = $(this).val();
            // alert(city_val);

           $.ajax({  
                url:"function php/fetch_barangay.php?city_id="+city_val, 
                method:"POST",  
                contentType:false,
                cache:false,
                processData:false,

                beforeSend:function() {
                }, 

                success:function(data){  
                // alert(data);
                $('#barangay').empty();
                // $('#section')
                //   .append($("<option></option>")
                //   .attr("value", "")
                //   .text("All")); 

                if (data != '') 
                {
                  var jsArray = JSON.parse(data);
                  $.each(jsArray, function(key, value) {   
                    $('#barangay')
                    .append($("<option></option>")
                    .attr("value", key)
                    .text(value)); 
                  });
                }
                }

            });  
        });
    </script>
   
</body>


</html>