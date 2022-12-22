<?php
session_start();
if (!$_SESSION['admin_name']) {
  header('Location: ../index.php?session=expired');
}
include_once("../controller/koneksi.php");
include_once("model/function.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

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
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <?php
        $unread_message = mysqli_query($conn, "SELECT * FROM user_message WHERE status = 'UNREAD'");
        if ($unread_message) {
          $count_message = mysqli_num_rows($unread_message);
        }
        ?>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <?php
            if (isset($count_message))
              if ($count_message > 0) {
                echo "<span class='badge badge-danger navbar-badge'>$count_message</span>";
              }
            ?>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <?php
            $result = mysqli_query($conn, "SELECT user_data.user_id,user_data.photo_profile,user_data.nama,user_data.user_email,user_data.status,user_message.date_post,user_message.user_id,user_message.message,user_message.subject,user_message.status,user_message.message_id FROM user_message
            JOIN user_data ON user_data.user_id = user_message.user_id 
            WHERE user_message.status = 'UNREAD' AND user_data.status = 'ACTIVE' ORDER BY user_message.date_post DESC LIMIT 3 ");
            while ($message_data = mysqli_fetch_array($result)) {
            ?>
              <div class="dropdown-divider"></div>
              <a href="message.php" class="dropdown-item">
                <div class="media">
                  <img src="../../profile/<?= $message_data['photo_profile'] ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      <?= $message_data['nama'] ?>
                      <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm"><?= $message_data['subject'] ?></p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?= time_ago($message_data['date_post']) ?></p>
                  </div>
                </div>
              </a>
            <?php
            }
            ?>
            <a href="message.php" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <div class="brand-link">
        <div class="span12 text-center font-weight-bold">
          §hikifujin
        </div>
      </div>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['admin_name']; ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="index.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p> Dashboard </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="room.php" class="nav-link">
                <i class="nav-icon fas fa-duotone fa-bed"></i>
                <p>
                  Rooms
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-duotone fa-book"></i>
                <p>
                  Booking
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="new_booking.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>New Bookings</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cancelled_booking.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cancelled Bookings</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="check-in.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Check In</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-plus"></i>
                <p>
                  User
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="all_user.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Users</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="rating.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Review & Ratings</p>
                  </a>
                </li>
              </ul>
            <li class="nav-item">
              <a href="blog.php" class="nav-link">
                <i class="nav-icon fas fa-file-alt"></i>
                <p> Blog </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="message.php" class="nav-link">
                <i class="nav-icon fas fa-comments"></i>
                <p> Message </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="model/log_out.php" class="nav-link text-red">
                <i class="nav-icon fas fa-power-off"></i>
                <p>
                  Log Out
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">

            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <?php
                  $total_checkin = mysqli_query($conn, "SELECT * FROM booking_room WHERE status = 'Waiting user check-in'");
                  if ($total_checkin) {
                    $count_checkin = mysqli_num_rows($total_checkin);
                  }
                  ?>
                  <h3><?= $count_checkin ?></h3>
                  <p>Check In</p>
                </div>
                <div class="icon">
                  <i class="ion ion-log-in"></i>
                </div>
                <a href="check_in.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <?php
                  $total_success = mysqli_query($conn, "SELECT * FROM booking_room WHERE status = 'Success' OR status ='Reviewed'");
                  if ($total_success) {
                    $count_success = mysqli_num_rows($total_success);
                  }
                  ?>
                  <h3><?= $count_success ?></h3>
                  <p>Success Book</p>
                </div>
                <div class="icon">
                  <i class="ion ion-log-out"></i>
                </div>
                <a href="new_booking.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <?php
                  $total_booking = mysqli_query($conn, "SELECT * FROM booking_room WHERE status = 'Waiting for payment' OR status ='Booking success'");
                  if ($total_booking) {
                    $count_booking = mysqli_num_rows($total_booking);
                  }
                  ?>
                  <h3><?= $count_booking ?></h3>
                  <p>New Bookings</p>
                </div>
                <div class="icon">
                  <i class="ion ion-clipboard"></i>
                </div>
                <a href="new_booking.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <?php
                  $total_cancel = mysqli_query($conn, "SELECT * FROM booking_room WHERE status = 'Cancelled'");
                  if ($total_cancel) {
                    $count_cancel = mysqli_num_rows($total_cancel);
                  }
                  ?>
                  <h3><?= $count_cancel ?></h3>
                  <p>Cancelled Bookings</p>
                </div>
                <div class="icon">
                  <i class="ion ion-close-round"></i>
                </div>
                <a href="cancelled_booking.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <?php
                  $total_user = mysqli_query($conn, "SELECT * FROM user_data WHERE status = 'ACTIVE'");
                  if ($total_user) {
                    $count_user = mysqli_num_rows($total_user);
                  }
                  ?>

                  <h3><?= $count_user ?></h3>
                  <p>Total User</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
                <a href="all_user.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <?php
                  $active_article = mysqli_query($conn, "SELECT * FROM blog WHERE status = 'ACTIVE'");
                  if ($active_article) {
                    $count_article = mysqli_num_rows($active_article);
                  }
                  ?>

                  <h3><?= $count_article ?></h3>
                  <p>Artikel Blog</p>
                </div>
                <div class="icon">
                  <i class="ion ion-document-text"></i>
                </div>
                <a href="blog.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">

                  <h3><?= $count_message ?></h3>
                  <p>Pesan Belum Terbaca</p>
                </div>
                <div class="icon">
                  <i class="ion ion-email"></i>
                </div>
                <a href="message.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>


          </div>
        </div>
      </section>
      <!-- /.Main content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="#">Shikifujin</a>.</strong>
      All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark"></aside>
    <!-- /.control-sidebar -->

  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>

</body>

</html>