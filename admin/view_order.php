<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>R. Maranan's Builder | Admin Portal</title>

  <?php include '_include_header.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php
$transaction_id = $_GET['id'];
$sqlTransaction = ' SELECT `id`, `transaction_id`, `user_id`, `address_id`, `total`, `mode_of_payment`, `status`, `date_created`, `date_finished`, `proof_of_payment` FROM `tbl_transaction` WHERE id ='.$transaction_id;

$execTransaction = $conn->query($sqlTransaction);
$transaction = $execTransaction->fetch_assoc();
?>


  <?php include '_sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Transaction</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Transaction</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

      <?php 
        $sqlUser = ' SELECT `id`, `firstname`, `lastname`, `contact_number`, `email`, `gender`, `birthdate`, `status`, `date_created`, `user_type`, `password` FROM `tbl_user` WHERE id = '.$transaction['user_id'].' ';
        $execUser = $conn->query($sqlUser);
        $user = $execUser->fetch_assoc();


        $sqlAddress = ' SELECT `id`, `user_id`, `house_number`, `barangay`, `citymun`, `province`, `region`, `zip_code`, `status`, `date_created` FROM `tbl_address` WHERE user_id = '.$transaction['user_id'].' AND status = 1 ';
        $execAddress = $conn->query($sqlAddress);
        

        ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <!-- <form action="../function php/edit_product.php?type=service&id=<?php echo $product_id; ?>" method="POST" enctype="multipart/form-data"> -->
            <section class="col-lg-12">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"> <a class="nav-link btn btn-warning text-white" href="transactions.php"><i class="fa fa-arrow-left"></i> Back</a> 
                  </h3>
                  <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                        <!-- <button type="submit" class="nav-link btn-success text-white">Update &nbsp;<i class="fa fa-check"></i></button> -->
                      </li>
                    </ul>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content p-0">

                    <div class="row">
                      <div class="col-md-3">
                        Transaction Number:
                        <h2 class="text-danger"><b><?php echo $transaction['transaction_id']; ?></b></h2>
                      </div>
                      <div class="col-md-3">
                        Transaction Date:
                        <h5 class="text-danger"><b><?php echo $transaction['date_created']; ?></b></h5>
                      </div>
                      <div class="col-md-2">
                        Mode of Payment
                        <h5 class="text-danger"><b><?php echo $transaction['mode_of_payment']; ?></b></h5>
                      </div>
                      <div class="col-md-2">
                        <center>
                        Proof of Payment
                        <h5 class="text-danger">
                          <b>
                            <!-- <?php echo $transaction['proof_of_payment']; ?> -->
                            <a class="btn btn-primary btn-sm" href="../images/proof/<?php echo $transaction['proof_of_payment']; ?>" target="_blank">View Proof <i class="fa fa-link"></i></a>
                          </b>
                        </h5>
                        </center>
                      </div>
                      <div class="col-md-2">
                        Status
                        <!-- <h5 class="text-danger"><b><?php echo $transaction['status']; ?></b></h5> -->
                        <form  action="../function php/update_transaction.php?id=<?php echo $transaction_id; ?>" method="POST" id="frmUpdateStatus">
                          <select name="order_status" id="order_status" class="form-control">
                            <option value="Pending" <?php if($transaction['status'] == "Pending") {echo "selected";} ?>>Pending</option>
                            <option value="In Progress" <?php if($transaction['status'] == "In Progress") {echo "selected";} ?>>In Progress</option>
                            <option value="Completed" <?php if($transaction['status'] == "Completed") {echo "selected";} ?>>Completed</option>
                          </select>

                            <?php if($transaction['status'] != "Completed") { ?>
                             <!-- <button type="submit" class="nav-link btn-success text-white my-3">Update &nbsp;<i class="fa fa-check"></i></button> -->
                             <button type="button" id="btnSubmitStatus" class="nav-link btn-success text-white my-3">Update &nbsp;<i class="fa fa-check"></i></button>
                           <?php } ?>

                         </form>
                      </div>
                    </div>

                    <hr><br>
                    <div class="row">
                      <div class="col-lg-6 col-12">
                            <h4>Personal Details</h4>
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
                                <div class="col-md-6">
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
                                </div>
                            </div>
                      </div>
                      <div class="col-lg-6 col-12">
                        <h4>Shipping Address</h4>
                        <iframe class="map" width="100%" height="300" frameborder="2" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?q=<?php echo $address['house_number']; ?> <?php echo $barangay['brgyDesc']; ?> <?php echo $citymun['citymunDesc']; ?> <?php echo $province['provDesc']; ?>&output=embed" style="border: 2px solid lightgrey;"></iframe>


                      </div>
                    </div>
                    <hr>

                    <div class="row">
                     <div class="col-md-12">
                       <h3>Your order</h3>
                      <div class="your-order-table table-responsive">
                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th class="cart-product-name">Option</th>
                                      <th class="cart-product-name">Product</th>
                                      <th class="cart-product-name">Quantity</th>
                                      <th class="cart-product-name">Price</th>
                                      <th class="cart-product-total">Total</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php 
                                  $total_cart_item_price = 0;
                                    $getCartItem = ' SELECT 
                                      a.id as cart_item_id,  
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
                                  <tr class="cart_item">
                                    
                                      <td class="cart-product-name">
                                        <?php echo $rowCartItem['cart_item_option']; ?>
                                      </td>
                                      <td class="cart-product-name">
                                       <?php echo $rowCartItem['cart_item_name']; ?>
                                      </td>

                                      <td class="cart-product-name">
                                        <?php echo $rowCartItem['cart_item_quantity']; ?>
                                      </td>
                                      <td class="cart-product-name">
                                        P<?php echo number_format($rowCartItem['cart_item_price'], 2); ?>
                                      </td>
                                      <td class="cart-product-total"><center><span class="amount">P<?php echo number_format($rowCartItem['cart_item_quantity'] * $rowCartItem['cart_item_price'], 2); ?></span></center>
                                      </td>
                                  </tr>
                                  <?php $total_cart_item_price = $total_cart_item_price + ($rowCartItem['cart_item_quantity'] * $rowCartItem['cart_item_price']); } ?>
                              </tbody>
                              <tfoot class="bg-dark">
                                  <tr class="cart-subtotal">
                                      <th colspan="3"><center>Cart Subtotal</center></th>
                                      <td colspan="2"><center><span class="amount">P<?php echo number_format($total_cart_item_price, 2); ?></span></center></td>
                                  </tr>
                                  <tr class="cart-subtotal">
                                      <th colspan="3"><center>Shipping Fee</center></th>
                                      <td colspan="2"><center><span class="amount">P200.00</span></center></td>
                                  </tr>
                                  <tr class="order-total">
                                      <th colspan="3"><center>Order Total</center></th>
                                      <td colspan="2"><strong><center><span>P<?php echo number_format($total_cart_item_price + 200, 2); ?></span></center></strong></td>
                                      <input type="hidden" name="total" value="<?php echo $rowCart['total_cart_item_price'] + 200; ?>">
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                     </div>
                    </div>

                    <hr>


                  </div>
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
              <!-- /.card -->
            </section>
          <!-- </form> -->
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <form action="../function php/add_option.php" method="POST">
    <!-- Modal -->
    <div class="modal fade" id="modalOptions" tabindex="-1" role="dialog" aria-labelledby="modalOptionsLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalOptionsLabel">Add New Option</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="product_id" value="<?php echo $_GET['id']; ?>">
            Item Option
            <input type="text" class="form-control" name="option_name" required="">
            Price
            <input type="number" class="form-control" name="price" required="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>
  </form>


  <form action="../function php/add_image.php" method="POST" enctype="multipart/form-data">
    <!-- Modal -->
    <div class="modal fade" id="modalImage" tabindex="-1" role="dialog" aria-labelledby="modalImageLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalImageLabel">Add New Image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="product_id" value="<?php echo $_GET['id']; ?>">
            <label for="" style="font-size: 14px;">Product Images <i style="color: #095099; font-size: 12px;">(You can add multiple images)</i></label>
            <input type="file" multiple="" name="product_image[]" id="product_image[]" required="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <?php include'_footer.php'; ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include'_include_footer.php'; ?>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


  $('#btnSubmitStatus').on('click', function(){

    Swal.fire({
      title: "Are you sure you want to update the status of this transaction?",
      icon: "question",
      showCancelButton: true,
      confirmButtonText: "Confirm",
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        $('#frmUpdateStatus').submit();
      } 
    });
  })

</script>
</body>
</html>
