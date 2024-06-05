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
$product_id = $_GET['id'];
$sqlProduct = ' SELECT `id`, `name`, `details`, `quantity`, `status`, `date_created`, `category` FROM `tbl_product` WHERE id ='.$product_id;

$execProduct = $conn->query($sqlProduct);
$product = $execProduct->fetch_assoc();
?>


  <?php include '_sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Product</li>
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
          <form action="../function php/edit_product.php?type=product&id=<?php echo $product_id; ?>" method="POST" enctype="multipart/form-data">
            <section class="col-lg-12">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"> <a class="nav-link btn btn-warning text-white" href="products.php"><i class="fa fa-arrow-left"></i> Back</a> 
                  </h3>
                  <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                        <button type="submit" class="nav-link btn-success text-white">Save &nbsp;<i class="fa fa-check"></i></button>
                      </li>
                    </ul>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content p-0">
                    <div class="row">
                      <div class="col-md-3">
                        <label for="">Product Name</label>
                        <input type="text" class="form-control" name="name" required="" value="<?php echo $product['name']; ?>">
                      </div>
                      <div class="col-md-2">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="quantity" required="" value="<?php echo $product['quantity']; ?>">
                      </div>
                      <div class="col-md-4">
                        <label for="">Product Description</label>
                        <textarea name="details" required="" cols="30" rows="2" class="form-control"><?php echo $product['details']; ?></textarea>
                      </div>
                      <div class="col-md-3">
                        <label for="">Product Category</label>
                        <!-- <label for="" style="font-size: 14px;">Product Images <i style="color: #095099; font-size: 12px;">(You can add multiple images)</i></label> -->
                        <!-- <input type="file" multiple="" name="product_image[]" id="product_image[]" required=""> -->
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         <select name="category" id="category" class="form-control">
                          <?php
                            $sqlCategory = ' SELECT `id`, `category`, `date_created` FROM `tbl_category` ';
                            $execCategory = $conn->query($sqlCategory);
                            while ($rowCategory = $execCategory->fetch_assoc()) { ?>

                              <option value="<?php echo $rowCategory['category']; ?>" <?php if($rowCategory['category'] == $product['category']) {echo "selected";} ?>><?php echo $rowCategory['category']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

            <!--         <div class="row">
                      <div class="col-md-3">
                        <label for="">Product Category</label>
                        <select name="category" id="category" class="form-control">
                          <?php
                            $sqlCategory = ' SELECT `id`, `category`, `date_created` FROM `tbl_category` ';
                            $execCategory = $conn->query($sqlCategory);
                            while ($rowCategory = $execCategory->fetch_assoc()) { ?>

                              <option value="<?php echo $rowCategory['category']; ?>" <?php if($rowCategory['category'] == $product['category']) {echo "selected";} ?>><?php echo $rowCategory['category']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div> -->
                    <hr><br>

                    <div class="row">
                      <div class="col-md-12">

                        <?php
                        $counter = 1;
                        $sqlOption = ' SELECT `id`, `product_id`, `option_name`, `price` FROM `tbl_item_options` WHERE product_id ='.$product_id;

                        $execOption = $conn->query($sqlOption);
                        ?>

                        
                        <div id="POItablediv">
                          <button class="btn btn-sm btn-primary float-sm-right my-2" type="button" data-toggle="modal" data-target="#modalOptions">Add Row <i class="fa fa-plus"></i></button>
                          <table id="POITable" class="table table-bordered table-hover table-sm">
                              <tr class="bg-dark">
                                  <td><center>#</center></td>
                                  <td><center>Item Option</center></td>
                                  <td><center>Price</center></td>
                                  <td><center>Delete</center></td>
                              </tr>
                              <?php 
                                while ($option = $execOption->fetch_assoc()) {?>
                                <tr>
                                    <td><center><?php echo $counter; ?></center></td>
                                    <td><center><?php echo $option['option_name']; ?></center></td>
                                    <td><center><?php echo $option['price']; ?></center></td>
                                    <td><center>
                                      <button class="btn btn-danger btn-xs" type="button" onclick="deleteOption(<?php echo $option['id']; ?>)"/> Delete </button>
                                    </center></td>
                                </tr>

                              <?php $counter++; } ?>
                          </table>
                        </div>
                        <!-- ----------------- -->
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-12">

                        <?php
                        $counter = 1;
                        $sqlImg = ' SELECT `id`, `product_id`, `image` FROM `tbl_product_image` WHERE product_id ='.$product_id;

                        $execImg = $conn->query($sqlImg);
                        ?>

                        
                        <div id="POItablediv">  
                          <button class="btn btn-sm btn-primary float-sm-right my-2" type="button" data-toggle="modal" data-target="#modalImage">Add Row <i class="fa fa-plus"></i></button>
                          <table id="POITable" class="table table-bordered table-hover table-sm">
                              <tr class="bg-dark">
                                  <td><center>#</center></td>
                                  <td><center>Item Picture</center></td>
                                  <td><center>Delete</center></td>
                              </tr>
                              <?php 
                                while ($image = $execImg->fetch_assoc()) {?>
                                <tr>
                                    <td><center><?php echo $counter; ?></center></td>
                                    <td><center><img width="50" src="../images/products/<?php echo $image['image']; ?>" alt=""></center></td>
                                    <td><center>
                                      <button class="btn btn-danger btn-xs" type="button" onclick="deleteImg(<?php echo $image['id']; ?>)"/> Delete </button>
                                    </center></td>
                                </tr>

                              <?php $counter++; } ?>
                          </table>
                        </div>
                        <!-- ----------------- -->
                      </div>
                    </div>

                  </div>
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
              <!-- /.card -->
            </section>
          </form>
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


  function deleteImg(id)
  {
      Swal.fire({
        title: "Do you want to delete this image?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Confirm",
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          window.location = '../function php/delete_image.php?productId='+<?php echo $product_id; ?>+'&id='+id;
        } 
      });
  }


  function deleteOption(id)
  {
      Swal.fire({
        title: "Do you want to delete this option?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Confirm",
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          window.location = '../function php/delete_option.php?productId='+<?php echo $product_id; ?>+'&id='+id;
        } 
      });
  }


</script>
</body>
</html>
