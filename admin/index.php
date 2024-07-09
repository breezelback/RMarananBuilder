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
    $yearQry = '';
    $yearVal = '';
    if (isset($_GET['searchYear'])) 
    {
      if ($_GET['searchYear'] != "All") {
        $yearQry = 'AND YEAR(date_finished) = '.$_GET['searchYear'];
        $yearVal = $_GET['searchYear'];
      }
    }
  ?>

  <?php include '_sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sales Dashboard <b class="text-danger"><?php echo $yearVal; ?></b></h1>
            <form action="" method="GET">
              <div class="row">
                <div class="col-sm-3">
                  <select class="form-control" name="searchYear" id="searchYear">
                    <option value="All" selected="" disabled="">Select Year</option>
                    <option value="All" <?php if($yearVal == "All"){echo 'selected';}?>>All</option>
                    <option value="2023" <?php if($yearVal == "2023"){echo 'selected';}?>>2023</option>
                    <option value="2024" <?php if($yearVal == "2024"){echo 'selected';}?>>2024</option>
                    <option value="2025" <?php if($yearVal == "2025"){echo 'selected';}?>>2025</option>
                  </select>
                </div>
                <div class="col-sm-3">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                  <a class="btn btn-warning text-white" href="index.php" class=""><i class="fa fa-sync"></i></a>
                </div>
              </div>
            </form>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sales Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php 

    $sqlSales = ' SELECT SUM(total) as totalSales FROM tbl_transaction WHERE status = "Completed" '.$yearQry;
    $execSales = $conn->query($sqlSales);
    $totalSales = $execSales->fetch_assoc();

    $sqlCompletedOrders = ' SELECT COUNT(id) as completedOrders FROM tbl_transaction WHERE status = "Completed" '.$yearQry;
    $execCompletedOrders = $conn->query($sqlCompletedOrders);
    $completedOrders = $execCompletedOrders->fetch_assoc();

    $sqlPendingOrders = ' SELECT COUNT(id) as pendingOrders FROM tbl_transaction WHERE status = "Pending" ';
    $execPendingOrders = $conn->query($sqlPendingOrders);
    $pendingOrders = $execPendingOrders->fetch_assoc();

    $sqlUsers = ' SELECT COUNT(id) as totalUsers FROM tbl_user ';
    $execUsers = $conn->query($sqlUsers);
    $totalUsers = $execUsers->fetch_assoc();


    // CHART DATA


    $sqlStudentCount1 = ' SELECT SUM(total) as totalSale FROM tbl_transaction WHERE status = "Completed" AND MONTH(date_finished) = 1 '.$yearQry;
    $execStudent1 = $conn->query($sqlStudentCount1);
    $jan = $execStudent1->fetch_assoc();

    $sqlStudentCount2 = ' SELECT SUM(total) as totalSale FROM tbl_transaction WHERE status = "Completed" AND MONTH(date_finished) = 2 '.$yearQry;
    $execStudent2 = $conn->query($sqlStudentCount2);
    $feb = $execStudent2->fetch_assoc();

    $sqlStudentCount3 = ' SELECT SUM(total) as totalSale FROM tbl_transaction WHERE status = "Completed" AND MONTH(date_finished) = 3 '.$yearQry;
    $execStudent3 = $conn->query($sqlStudentCount3);
    $mar = $execStudent3->fetch_assoc();

    $sqlStudentCount4 = ' SELECT SUM(total) as totalSale FROM tbl_transaction WHERE status = "Completed" AND MONTH(date_finished) = 4 '.$yearQry;
    $execStudent4 = $conn->query($sqlStudentCount4);
    $apr = $execStudent4->fetch_assoc();

    $sqlStudentCount5 = ' SELECT SUM(total) as totalSale FROM tbl_transaction WHERE status = "Completed" AND MONTH(date_finished) = 5 '.$yearQry;
    $execStudent5 = $conn->query($sqlStudentCount5);
    $may = $execStudent5->fetch_assoc();

    $sqlStudentCount6 = ' SELECT SUM(total) as totalSale FROM tbl_transaction WHERE status = "Completed" AND MONTH(date_finished) = 6 '.$yearQry;
    $execStudent6 = $conn->query($sqlStudentCount6);
    $jun = $execStudent6->fetch_assoc();

    $sqlStudentCount7 = ' SELECT SUM(total) as totalSale FROM tbl_transaction WHERE status = "Completed" AND MONTH(date_finished) = 7 '.$yearQry;
    $execStudent7 = $conn->query($sqlStudentCount7);
    $jul = $execStudent7->fetch_assoc();

    $sqlStudentCount8 = ' SELECT SUM(total) as totalSale FROM tbl_transaction WHERE status = "Completed" AND MONTH(date_finished) = 8 '.$yearQry;
    $execStudent8 = $conn->query($sqlStudentCount8);
    $aug = $execStudent8->fetch_assoc();

    $sqlStudentCount9 = ' SELECT SUM(total) as totalSale FROM tbl_transaction WHERE status = "Completed" AND MONTH(date_finished) = 9 '.$yearQry;
    $execStudent9 = $conn->query($sqlStudentCount9);
    $sep = $execStudent9->fetch_assoc();

    $sqlStudentCount10 = ' SELECT SUM(total) as totalSale FROM tbl_transaction WHERE status = "Completed" AND MONTH(date_finished) = 10 '.$yearQry;
    $execStudent10 = $conn->query($sqlStudentCount10);
    $oct = $execStudent10->fetch_assoc();

    $sqlStudentCount11 = ' SELECT SUM(total) as totalSale FROM tbl_transaction WHERE status = "Completed" AND MONTH(date_finished) = 11 '.$yearQry;
    $execStudent11 = $conn->query($sqlStudentCount11);
    $nov = $execStudent11->fetch_assoc();

    $sqlStudentCount12 = ' SELECT SUM(total) as totalSale FROM tbl_transaction WHERE status = "Completed" AND MONTH(date_finished) = 12 '.$yearQry;
    $execStudent12 = $conn->query($sqlStudentCount12);
    $dec = $execStudent12->fetch_assoc();





     ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>₱<?php echo $totalSales['totalSales']; ?></h3>

                <p>Total Sales</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="sales.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $completedOrders['completedOrders']; ?></h3>

                <p>Completed Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="transactions.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $pendingOrders['pendingOrders']; ?></h3>

                <p>Pending Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="transactions.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $totalUsers['totalUsers']; ?></h3>

                <p>Total Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Monthly Sales
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <!-- <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a> -->
                    </li>
                    <li class="nav-item">
                      <!-- <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a> -->
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="monthly_sales_chart" height="300" style="height: 300px;"></canvas>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>


          <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header bg-success">
                <h3 class="card-title">
                  <i class="fas fa-undo mr-1"></i>
                  Recently Transaction Items
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <!-- <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a> -->
                    </li>
                    <li class="nav-item">
                      <!-- <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a> -->
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">

                  <?php 
                  $counter = 1;
                  $sqlRecent = ' SELECT ti.id, ti.quantity, ti.price, DATE_FORMAT(ti.date_created, "%m /%d/%y") AS date_created, p.name FROM transaction_item ti LEFT JOIN tbl_product p ON p.id = ti.product_id ORDER BY ti.date_created DESC LIMIT 5 ';
                  $execRecent = $conn->query($sqlRecent);
                  ?>
                  
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>DATE</th>
                      <th>ITEM</th>
                      <th>QUANTITY</th>
                      <th>PRICE</th>
                      <th>TOTAL</th>
                    </tr>
                    </thead>
                    <tbody>
                     <?php while($recentItem = $execRecent->fetch_assoc()){ ?>
                        <tr>
                          <td><?php echo $counter; ?></td>
                          <td style="font-size:13px;"><?php echo $recentItem['date_created']; ?></td>
                          <td><?php echo $recentItem['name']; ?></td>
                          <td>P<?php echo number_format($recentItem['price'], 2); ?></td>
                          <td><?php echo $recentItem['quantity']; ?></td>
                          <td>P<?php echo number_format($recentItem['price'] * $recentItem['quantity'], 2); ?></td>
                        </tr>
                     <?php } ?>
                    </tbody>  

                  </table>

                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>

          <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header bg-warning">
                <h3 class="card-title">
                  <i class="fas fa-undo mr-1"></i>
                  Recent User Transactions
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <!-- <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a> -->
                    </li>
                    <li class="nav-item">
                      <!-- <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a> -->
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">

                  <?php 
                  $counter = 1;
                  $sqlRecentUser = ' SELECT t.id, t.total, DATE_FORMAT(t.date_created, "%m /%d/%y") AS date_created, u.firstname, u.lastname FROM tbl_transaction t LEFT JOIN tbl_user u ON u.id = t.user_id WHERE t.status = "Completed" ORDER BY id DESC LIMIT 5 ';
                  $execRecentUser = $conn->query($sqlRecentUser);
                  ?>
                  
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>FIRSTNAME</th>
                      <th>LASTNAME</th>
                      <th>TOTAL</th>
                      <th>DATE</th>
                    </tr>
                    </thead>
                    <tbody>
                     <?php while($recentUser = $execRecentUser->fetch_assoc()){ ?>
                        <tr>
                          <td><?php echo $counter; ?></td>
                          <td><?php echo $recentUser['firstname']; ?></td>
                          <td><?php echo $recentUser['lastname']; ?></td>
                          <td>P<?php echo number_format($recentUser['total'], 2); ?></td>
                          <td><?php echo $recentUser['date_created']; ?></td>
                        </tr>
                     <?php } ?>
                    </tbody>  

                  </table>

                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>



          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-12 connectedSortable" style="display: none;">

            <!-- Map card -->
            <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Visitors
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
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
  'use strict'

  /* Chart.js Charts */
  // Sales chart
  var salesChartCanvas = document.getElementById('monthly_sales_chart').getContext('2d')
  // $('#revenue-chart').get(0).getContext('2d');

  var salesChartData = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    datasets: [
      {
        label: 'Total Sales',
        backgroundColor: 'rgba(66, 145, 201, 0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: [<?php echo $jan['totalSale']; ?>, <?php echo $feb['totalSale']; ?>, <?php echo $mar['totalSale']; ?>, <?php echo $apr['totalSale']; ?>, <?php echo $may['totalSale']; ?>, <?php echo $jun['totalSale']; ?>, <?php echo $jul['totalSale']; ?>, <?php echo $aug['totalSale']; ?>, <?php echo $sep['totalSale']; ?>, <?php echo $oct['totalSale']; ?>, <?php echo $nov['totalSale']; ?>, <?php echo $dec['totalSale']; ?>]
      },
      // {
      //   label: 'Services',
      //   backgroundColor: 'rgba(196, 237, 245, 1)',
      //   borderColor: 'rgba(210, 214, 222, 1)',
      //   pointRadius: false,
      //   pointColor: 'rgba(210, 214, 222, 1)',
      //   pointStrokeColor: '#c1c7d1',
      //   pointHighlightFill: '#fff',
      //   pointHighlightStroke: 'rgba(220,220,220,1)',
      //   data: [<?php echo $jan['totalSale']; ?>, <?php echo $feb['totalSale']; ?>, <?php echo $mar['totalSale']; ?>, <?php echo $apr['totalSale']; ?>, <?php echo $may['totalSale']; ?>, <?php echo $jun['totalSale']; ?>, <?php echo $jul['totalSale']; ?>, <?php echo $aug['totalSale']; ?>, <?php echo $sep['totalSale']; ?>, <?php echo $oct['totalSale']; ?>, <?php echo $nov['totalSale']; ?>, <?php echo $dec['totalSale']; ?>]
      // }
    ]
  }

  var salesChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: true
        }
      }],
      yAxes: [{
        gridLines: {
          display: true

        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart(salesChartCanvas, { // lgtm[js/unused-local-variable]
    type: 'bar',
    data: salesChartData,
    options: salesChartOptions
  })




  // -------------------------------
  // Donut Chart
  var pieChartCanvas = $('#sales-chart-canvas').get(0).getContext('2d')
  var pieData = {
    labels: [
      'Instore Sales',
      'Download Sales',
      'Mail-Order Sales'
    ],
    datasets: [
      {
        data: [30, 12, 20],
        backgroundColor: ['#f56954', '#00a65a', '#f39c12']
      }
    ]
  }
  var pieOptions = {
    legend: {
      display: false
    },
    maintainAspectRatio: false,
    responsive: true
  }
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  // eslint-disable-next-line no-unused-vars
  var pieChart = new Chart(pieChartCanvas, { // lgtm[js/unused-local-variable]
    type: 'doughnut',
    data: pieData,
    options: pieOptions
  })

  // Sales graph chart
  var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d')
  // $('#revenue-chart').get(0).getContext('2d');

  var salesGraphChartData = {
    labels: ['2011 Q1', '2011 Q2', '2011 Q3', '2011 Q4', '2012 Q1', '2012 Q2', '2012 Q3', '2012 Q4', '2013 Q1', '2013 Q2'],
    datasets: [
      {
        label: 'Digital Goods',
        fill: false,
        borderWidth: 2,
        lineTension: 0,
        spanGaps: true,
        borderColor: '#efefef',
        pointRadius: 3,
        pointHoverRadius: 7,
        pointColor: '#efefef',
        pointBackgroundColor: '#efefef',
        data: [2666, 2778, 4912, 3767, 6810, 5670, 4820, 15073, 10687, 8432]
      }
    ]
  }

  var salesGraphChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        ticks: {
          fontColor: '#efefef'
        },
        gridLines: {
          display: false,
          color: '#efefef',
          drawBorder: false
        }
      }],
      yAxes: [{
        ticks: {
          stepSize: 5000,
          fontColor: '#efefef'
        },
        gridLines: {
          display: true,
          color: '#efefef',
          drawBorder: false
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var salesGraphChart = new Chart(salesGraphChartCanvas, { // lgtm[js/unused-local-variable]
    type: 'line',
    data: salesGraphChartData,
    options: salesGraphChartOptions
  })
})

</script>



</body>
</html>
