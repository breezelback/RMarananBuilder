<?php // require('../function_php/conn.php'); ?>
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


  <?php include '_sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Transactions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Transactions</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-users"></i>
                  Information
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th><center>TRANSACTION #</center></th>
                      <th>NAME</th>
                      <!-- <th>ADDRESS</th> -->
                      <th>DATE</th>
                      <th>MODE OF PAYMENT</th>
                      <th>STATUS</th>
                      <th>TOTAL PRICE</th>
                      <th><center>ACTION</center></th>
                    </tr>
                    </thead>
                    <tbody>

                      <?php

                        $selectOrders = ' SELECT `id`, `transaction_id`, `user_id`, `address_id`, `total`, `mode_of_payment`, `status`, date_format(`date_created`, "%M %d, %Y") AS date_created, `date_finished` FROM `tbl_transaction` ';
                        $execOrders = $conn->query($selectOrders);
                        while ($orders = $execOrders->fetch_assoc()) {

                          $selectUser = ' SELECT `id`, `firstname`, `lastname`, `contact_number`, `email`, `gender`, `birthdate`, `status`, `date_created`, `user_type`, `password` FROM `tbl_user` WHERE id = '.$orders['user_id'].' ';
                          $execUser = $conn->query($selectUser);
                          $users = $execUser->fetch_assoc();
                          
                        ?>

                        <tr style="font-size: 14px;">
                          <td><center><span class="bg-danger text-bold" style="padding: 4px; border-radius: 5px;"><?php echo $orders['transaction_id']; ?></span></center></td>
                          <td><?php echo $users['firstname']; ?> <?php echo $users['lastname']; ?></td>
                          <!-- <td>421 Lipa City Batangas</td> -->
                          <td><?php echo $orders['date_created']; ?></td>
                          <td><?php echo $orders['mode_of_payment']; ?></td>
                          <td><?php echo $orders['status']; ?></td>
                          <td>P<?php echo number_format($orders['total'], 2); ?></td>
                          <td>
                            <center>
                              <div class="btn-group">
                                <a href="view_order.php?id=<?php echo $orders['id']; ?>" class="btn btn-warning btn-sm text-white"><i class="fa fa-external-link-alt"></i></a>
                              </div>
                            </center>
                          </td>
                        </tr>

                        
                        <?php } ?>

             
            

                    </tbody>  

                  </table>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
</script>
</body>
</html>
