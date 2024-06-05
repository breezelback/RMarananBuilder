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
            <h1 class="m-0">Account Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Account Settings</li>
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
                      <!-- <button class="nav-link btn-success text-white" data-toggle="modal" data-target="#modal_add_subject">Update Profile &nbsp;<i class="fa fa-sync"></i></button> -->
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  
                  <?php 
                    $sql = ' SELECT `id`, `firstname`, `lastname`, `contact_number`, `email`, `gender`, `birthdate`, `status`, `date_created`, `user_type`, `password` FROM `tbl_user` WHERE id = '.$_SESSION['id'];
                    $exec = $conn->query($sql);
                    $user = $exec->fetch_assoc();
                  ?>

                  <form action="../function php/update_profile_admin.php" method="POST">

                    <div class="row my-4">
                      <div class="col-md-3">
                        Firstname
                        <input type="text" class="form-control" name="firstname" value="<?php echo $user['firstname']; ?>">
                      </div>
                      <div class="col-md-3">
                        Lastname
                        <input type="text" class="form-control" name="lastname" value="<?php echo $user['lastname']; ?>">
                      </div>
                      <div class="col-md-3">
                        Contact Number
                        <input type="text" class="form-control" name="contact_number" value="<?php echo $user['contact_number']; ?>">
                      </div>
                      <div class="col-md-3">
                        Email
                        <input type="text" class="form-control" name="email" value="<?php echo $user['email']; ?>">
                      </div>
                    </div>

                    <div class="row my-4">
                      <div class="col-md-3">
                        Gender
                        <select class="form-control" name="gender" id="gender">
                          <option <?php if ($user['gender'] == "Male"){echo "selected";} ?> value="Male">Male</option>
                          <option <?php if ($user['gender'] == "Female"){echo "selected";} ?> value="Female">Female</option>
                        </select>
                      </div>
                      <div class="col-md-3">
                        Birthday
                        <input type="date" class="form-control" name="birthdate" value="<?php echo $user['birthdate']; ?>">
                      </div>
                      <div class="col-md-3">
                        Password <span style="font-size: 12px; float: right;"><input type="checkbox" onclick="showpass()"> Show Password</span>
                        <input type="password" class="form-control" name="password" id="password" value="<?php echo $user['password']; ?>">
                      </div>
                      <div class="col-md-3">
                        Confirm Password
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="<?php echo $user['password']; ?>">
                      </div>
                    </div>
                    <div class="row my-4">
                      <div class="col-md-12">
                        <center>
                          <button class="btn btn-success text-white" type="submit">Update Profile &nbsp;<i class="fa fa-sync"></i></button>
                        </center>
                      </div>
                    </div>

                  </form>

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
    function showpass() {
    var x = document.getElementById("password");
    var y = document.getElementById("confirm_password");
    if (x.type === "password") {
      x.type = "text";
      y.type = "text";
    } else {
      x.type = "password";
      y.type = "password";
    }
  }
</script>
</body>
</html>
