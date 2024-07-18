
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item">
        <button class="nav-link bg-danger btn-sm" role="button" onclick="logout();">
          Logout <i class="fas fa-power-off"></i>
        </button>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../images/LOGO1.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="font-size: 17px;">R. Maranan's Builder</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="images/user_image.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <?php if ($_SESSION['user_type'] == 'admin'){ ?>
          <a href="#" class="d-block">Administrator</a>
           <?php } else { ?>
          <a href="#" class="d-block">Admin Staff</a>
           <?php } ?>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          <?php if ($_SESSION['user_type'] == 'admin'){ ?>
            
          <li class="nav-item">
            <!-- <a href="index.php" class="nav-link active"> -->
            <a href="index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Sales Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="products.php" class="nav-link">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p>
                Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="services.php" class="nav-link">
              <i class="nav-icon fa fa-project-diagram"></i>
              <p>
                Services
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="transactions.php" class="nav-link">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                <!-- Transactions -->
                Orders
              </p>
            </a>
          </li>
       <!--    <li class="nav-item">
            <a href="sales.php" class="nav-link">
              <i class="nav-icon fa fa-search-dollar"></i>
              <p>
                Sales
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="users.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="categories.php" class="nav-link">
              <i class="nav-icon fa fa-bars"></i>
              <p>
                Product Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="update_profile.php" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Account Settings
              </p>
            </a>
          </li>

          <?php } else { ?>

          <li class="nav-item">
            <a href="transactions.php" class="nav-link">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                Transactions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="products.php" class="nav-link">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p>
                Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="services.php" class="nav-link">
              <i class="nav-icon fa fa-project-diagram"></i>
              <p>
                Services
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="categories.php" class="nav-link">
              <i class="nav-icon fa fa-bars"></i>
              <p>
                Product Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="update_profile.php" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Account Settings
              </p>
            </a>
          </li>
          <?php } ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<script>
  function logout()
  {
    if (confirm('Are you sure you want to logout?')) {
      // Save it!
      window.location = '../function php/logout.php';
    } else {
      // Do nothing!
    }
  }
</script>
