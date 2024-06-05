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
            <h1 class="m-0">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
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
                      <a href="add_product.php" class="nav-link btn-success text-white">Add New Product &nbsp;<i class="fa fa-plus"></i></a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>NAME</th>
                      <th>DETAILS</th>
                      <!-- <th>PRICE (PESO)</th> -->
                      <th>QUANTITY</th>
                      <th>CATEGORY</th>
                      <th><center>ACTION</center></th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $counter = 1;
                        $sqlProduct = ' SELECT `id`, `name`, `details`, `quantity`, `status`, `date_created`, `category` FROM `tbl_product` WHERE type = "product" ';
                        $execProduct = $conn->query($sqlProduct);
                        while ($rowProduct = $execProduct->fetch_assoc()) { ?>
                        <tr style="font-size: 14px;">
                          <td><?php echo $counter; ?></td>
                          <td><?php echo $rowProduct['name']; ?></td>
                          <td><?php echo $rowProduct['details']; ?></td>
                          <!-- <td>P200.00</td> -->
                          <td><?php echo $rowProduct['quantity']; ?></td>
                          <td><?php echo $rowProduct['category']; ?></td>
                          <td>
                            <center>
                              <div class="btn-group">
                                <a href="edit_product.php?id=<?php echo $rowProduct['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <button class="btn btn-danger btn-sm" onclick="delete_product(<?php echo $rowProduct['id']; ?>)"><i class="fa fa-trash"></i></button>

                                <!-- <a href="view_teacher.php" class="btn btn-warning btn-sm text-white"><i class="fa fa-cog"></i></a> -->
                              </div>
                            </center>
                          </td>
                        </tr>
                      <?php $counter++; } ?>

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





    function delete_product(id)
    {
      Swal.fire({
        title: "Do you want to delete this product?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Confirm",
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          window.location = '../function php/delete_product.php?type=product&id='+id;
        } 
      });
    }
</script>
</body>
</html>
