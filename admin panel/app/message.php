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
  <title>Message</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

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
            if ($count_message > 0) {
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
              <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p> Dashboard </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="room.php" class="nav-link">
                <i class="nav-icon fas fa-duotone fa-bed"></i>
                <p>
                  Room
                </p>
              </a>
            </li>
            <li class="nav-item">
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
                  <a href="check_in.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Check In</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
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
              <a href="message.php" class="nav-link active">
                <i class="nav-icon fas fa-comments"></i>
                <p> Message </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link text-red">
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
      <section class="content-header">
        <div class="container-fluid">
          <div class="d-flex flex-row justify-content-between mb-3">
            <h1>Message</h1>
            <div class="btn-group" role="group" aria-label="Basic example">
              <a href="readed_message.php" type="button" class="btn btn-warning">Readed</a>
              <a href="model/message_action.php?action=readAll" type="button" class="btn btn-info">Read All</a>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                  <table id=" " class="table table-bordered table-head-fixed text-nowrap">

                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Post Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>

                      <?php
                      $no = 0;
                      $result = mysqli_query($conn, "SELECT user_data.user_id,user_data.nama,user_data.user_email,user_data.status,user_message.date_post,user_message.user_id,user_message.message,user_message.subject,user_message.status,user_message.message_id FROM user_message
                      JOIN user_data ON user_data.user_id = user_message.user_id 
                      WHERE user_message.status = 'UNREAD' AND user_data.status = 'ACTIVE' ORDER BY user_message.date_post DESC ");
                      while ($message_data = mysqli_fetch_array($result)) {
                      ?>
                        <?php
                        $no+=1;
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $message_data['nama'] . "</td>";
                        echo "<td>" . $message_data['user_email'] . "</td>";
                        echo "<td>" . $message_data['message'] . "</td>";
                        echo "<td>" . time_ago($message_data['date_post']) . "</td>";
                        echo "<td>
                        <a class='btn btn-info btn-sm' href='model/message_action.php?id=$message_data[message_id]&action=read'>
                          <i class='fas fa-eye'></i>
                          Read
                        </a>
                      </td>'";
                        echo "</tr>"; ?>
                      <?php
                      }

                      ?>
                    </tbody>

                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="#">Shikifujin</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
