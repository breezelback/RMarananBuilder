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
            <h1 class="m-0">Add Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
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
          <form action="../function php/add_product.php" method="POST" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" name="name" required="">
                      </div>
                      <div class="col-md-2">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="quantity" required="">
                      </div>
                      <div class="col-md-4">
                        <label for="">Product Description</label>
                        <textarea name="details" required="" cols="30" rows="2" class="form-control"></textarea>
                      </div>
                      <div class="col-md-3">
                        <label for="" style="font-size: 14px;">Product Images <i style="color: #095099; font-size: 12px;">(You can add multiple images)</i></label>
                        <input type="file" multiple="" name="product_image[]" id="product_image[]" required="">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <label for="">Product Category</label>
                        <select name="category" id="category" class="form-control">
                          <?php
                            $sqlCategory = ' SELECT `id`, `category`, `date_created` FROM `tbl_category` ';
                            $execCategory = $conn->query($sqlCategory);
                            while ($rowCategory = $execCategory->fetch_assoc()) { ?>

                              <option value="<?php echo $rowCategory['category']; ?>"><?php echo $rowCategory['category']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        
                        <!-- <div id="POItablediv">
                          <button class="btn btn-sm btn-primary float-sm-right my-2" type="button" onclick="insRow()">Add Row <i class="fa fa-plus"></i></button>
                          <table id="POITable" class="table table-bordered table-hover">
                            <thead class="bg-dark">
                              <th><center>#</center></th>
                              <th>Item Option</th>
                              <th>Price <i>(Php)</i></th>
                              <th><center>Delete</center></th>
                            </thead>
                            <tbody>
                              <tr>
                                  <td><center>1</center></td>
                                  <td><input class="form-control" type="text" name="option_name"/></td>
                                  <td><input class="form-control" type="number" name="price"/></td>
                                  <td>
                                    <center>
                                      <button class="btn btn-sm btn-danger" type="button" id="delPOIbutton" onclick="deleteRow(this)"><i class="fa fa-trash"></i></button>
                                    </center>
                                  </td>
                              </tr>
                            </tbody>
                          </table>
                        </div> -->

                        <!-- ----------------- -->
                        <div id="POItablediv">
                          <button class="btn btn-sm btn-primary float-sm-right my-2" type="button" onclick="insRow()">Add Row <i class="fa fa-plus"></i></button>
                          <table id="POITable" class="table table-bordered table-hover">
                              <tr class="bg-dark">
                                  <td>#</td>
                                  <td>Item Option</td>
                                  <td>Price</td>
                                  <td>Delete</td>
                              </tr>
                              <tr>
                                  <td>1</td>
                                  <td><input class="form-control" type="text" name="item_option[]"/></td>
                                  <td>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">₱</span>
                                      </div>
                                      <input class="form-control" type="number" name="price[]" required="" />
                                    </div>
                                  </td>
                                  <td>
                                    <input class="btn btn-danger" type="button" id="delPOIbutton" value="Delete" onclick="deleteRow(this)"/>
                                  </td>
                              </tr>
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


  function insRow()
  {
      var x=document.getElementById('POITable');
         // deep clone the targeted row
      var new_row = x.rows[1].cloneNode(true);
         // get the total number of rows
      var len = x.rows.length;
         // set the innerHTML of the first row 
      new_row.cells[0].innerHTML = len;

         // grab the input from the first cell and update its ID and value
      var inp1 = new_row.cells[1].getElementsByTagName('input')[0];
      inp1.id += len;
      inp1.value = '';

         // grab the input from the first cell and update its ID and value
      var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
      inp2.id += len;
      inp2.value = '';

         // append the new row to the table
      x.appendChild( new_row );
  }


  function deleteRow(row)
  {
      var i=row.parentNode.parentNode.rowIndex;
      var tableName = document.getElementById("POITable");
      var totalRowCount = tableName.rows.length; // 3
      if (totalRowCount >= 3) 
      {
        document.getElementById('POITable').deleteRow(i);
      }
      else
      {
        alert("Please insert atleast 1 Price");
      }
  }
</script>
</body>
</html>
