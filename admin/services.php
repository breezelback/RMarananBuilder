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
            <h1 class="m-0">Services</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Services</li>
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
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <button class="nav-link btn-success text-white" data-toggle="modal" data-target="#modal_add_subject">Add New Service &nbsp;<i class="fa fa-plus"></i></button>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <!-- <th>#</th> -->
                      <th>NAME</th>
                      <th>DETAILS</th>
                      <th>PRICE (PESO)</th>
                      <th><center>ACTION</center></th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $sql = ' SELECT `id`, `service_image`, `title`, `details`, `service_price`, `status`, `date_created` FROM `tbl_services` ';
                        $exec = $conn->query($sql);
                        while ($row = $exec->fetch_assoc()) {
                         
                      ?>
                        <tr style="font-size: 14px;">
                          <!-- <td>1</td> -->
                          <td><?php echo $row['title']; ?></td>
                          <td><?php echo $row['details']; ?></td>
                          <td>₱<?php echo $row['service_price']; ?></td>
                          <td>
                            <center>
                              <div class="btn-group">
                                <a href="edit_user.php" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="../function_php/delete_user.php" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>

                                <a href="view_teacher.php" class="btn btn-warning btn-sm text-white"><i class="fa fa-cog"></i></a>
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



<!-- Modal -->
<form action="../function php/add_new_service.php" method="POST" enctype="multipart/form-data">
  <div class="modal fade" id="modal_add_subject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Service</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="name-l" style="color: grey;">Service Image</i></label>
          <input type="file" class="form-control" name="service_image" id="service_image" placeholder="">
          <label for="name-l" style="color: grey;">Title</i></label>
          <input type="text" class="form-control" name="title" id="title" placeholder="">
          <label for="name-l" style="color: grey;">Details</i></label>
          <textarea name="details" id="details" cols="30" rows="4" class="form-control"></textarea>
          <label for="name-l" style="color: grey;">Price</i></label>
          <input type="number" class="form-control" name="service_price" id="service_price" placeholder="">
        </div>
        <div class="modal-footer">  
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
</form>


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
