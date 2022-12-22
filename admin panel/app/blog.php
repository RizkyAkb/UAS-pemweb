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
  <title>Blog</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <style>
    .delSelect {
      display: none;
    }
  </style>
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
              <a href="blog.php" class="nav-link active">
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
    <!-- FORM UNTUK MULTIPLE DELETE -->
    <form action="model/blog_action.php" method="post">
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="d-flex flex-row justify-content-between mb-3">
              <h1>Blog</h1>
              <button role="submit" name="multiple_blog_delete" class="btn btn-danger delSelect">Delete Selection Article</button>
              <a href="create_blog.php" role="button" class="btn btn-success createx">Create</a>
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
                  <div class="card-body table-responsive p-0" style="height: 600px;">

                    <table id="" class="table table-bordered table-head-fixed text-nowrap">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Title Blog</th>
                          <th>Post Date</th>
                          <th>Views</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM blog WHERE status = 'DRAFT' ORDER BY date_post DESC");
                        $no = 0;
                        while ($blog_data = mysqli_fetch_array($result)) {
                        ?>

                          <?php
                          echo "<tr>";
                          $no += 1;
                          echo "<td class='d-flex justify-content-around align-items-center cekBlog'> <input type='checkbox' name='multiple_delete_judul[]' value='$blog_data[judul]'>" . $no . "</td>";
                          echo "<td>" . $blog_data['judul'] . "</td>";
                          if ($blog_data['date_post'] == '0000-00-00 00:00:00') {
                            echo "<td>" . '-' . "</td>";
                          } else {
                            $tanggal_upload = date("d-m-Y", strtotime($blog_data['date_post']));
                            echo "<td>" . tanggal_indo($tanggal_upload, true) . "</td>";
                          }
                          echo "<td>" . '-' . "</td>";
                          echo "<td>" . $blog_data['status'] . "</td>";
                          echo "<td>
                        <a class='btn btn-info btn-sm btx inf' href='edit_blog.php?judul=$blog_data[judul]'>
                          <i class='fas fa-pencil-alt'>
                          </i>
                          Edit
                        </a>
                        <a class='btn btn-danger btn-sm btx dan' href='model/blog_action.php?judul=$blog_data[judul]&action=delete'>
                          <i class='fas fa-trash'>
                          </i>
                          Delete
                        </a>
                        <a class='btn btn-success btn-sm btx suc' href='model/blog_action.php?judul=$blog_data[judul]&action=post'>
                          <i class='fas fa-solid fa-folder-minus'></i>
                          Post
                        </a>
                      </td>'";
                          echo "</tr>"; ?>
                        <?php
                        }
                        ?>

                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM blog WHERE status = 'ACTIVE' ORDER BY date_post DESC");
                        while ($blog_data = mysqli_fetch_array($result)) {
                        ?>

                          <?php
                          echo "<tr>";
                          $no += 1;
                          echo "<td class='d-flex justify-content-around align-items-center cekBlog'> <input type='checkbox' name='multiple_delete_judul[]' value='$blog_data[judul]'>" . $no . "</td>";
                          echo "<td><a href='../../view/isi_blog.php?judul=$blog_data[judul]' target='_blank'>" . $blog_data['judul'] . "</a></td>";
                          $tanggal_upload = date("d-m-Y", strtotime($blog_data['date_post']));
                          echo "<td>" . tanggal_indo($tanggal_upload, true) . "</td>";
                          echo "<td>" . $blog_data['views'] . "</td>";
                          echo "<td>" . $blog_data['status'] . "</td>";
                          echo "<td>
                        <a class='btn btn-info btn-sm btx inf' href='edit_blog.php?judul=$blog_data[judul]'>
                          <i class='fas fa-pencil-alt'>
                          </i>
                          Edit
                        </a>
                        <a class='btn btn-danger btn-sm btx dan' href='model/blog_action.php?judul=$blog_data[judul]&action=delete'>
                          <i class='fas fa-trash'>
                          </i>
                          Delete
                        </a>
                        <a class='btn btn-warning btn-sm btx warn' href='model/blog_action.php?judul=$blog_data[judul]&action=draft'>
                          <i class='fas fa-solid fa-folder-minus'></i>
                          Draft
                        </a>
                      </td>'";
                          echo "</tr>"; ?>
                        <?php
                        }
                        ?>

                      </tbody>

                    </table>
    </form>
    <div class="d-flex flex-row-reverse m-3">
      <a href="chart/blog.php" role="button" class="btn btn-primary">Blog Advanced Dashboard</a>
    </div>
  </div>

  <!-- /.card-body -->
  </div>
  <?php

  if (isset($_SESSION['sukses_buat_artikel'])) {
    unset($_SESSION['gagal_buat_artikel']);
    echo $_SESSION['sukses_buat_artikel'];
  } elseif (isset($_SESSION['gagal_buat_artikel'])) {
    unset($_SESSION['sukses_buat_artikel']);
    echo $_SESSION['gagal_buat_artikel'];
  }

  $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

  if ($pageWasRefreshed) {
    if (isset($_SESSION['sukses_buat_artikel'])) {
      unset($_SESSION['sukses_buat_artikel']);
    } elseif (isset($_SESSION['gagal_buat_artikel'])) {
      unset($_SESSION['gagal_buat_artikel']);
    }
  }

  ?>
  <!-- /.card -->
  </div>
  </div>
  </div>
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="#">Shikifujin</a>.</strong>
    All rights reserved.
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
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('input[type="checkbox"]').click(function() {
        if ($(this).is(":checked")) {
          $(".delSelect").css('display', 'flex');
          $(".createx").css('display', 'none');
          $(".btx").css('cursor', 'default');
          $(".btx").css('background-color', 'grey');
          $(".btx").click(function(ev) {
            ev.preventDefault();
          });
        } else if ($(this).is(":not(:checked)")) {
          $(".btx").css('cursor', 'pointer');
          $(".delSelect").css('display', 'none');
          $(".createx").css('display', 'flex');
          $(".warn").css('background-color', '#ffc107');
          $(".dan").css('background-color', '#c82333');
          $(".inf").css('background-color', '#17a2b8');
          $(".suc").css('background-color', '#28a745');
          $(".btx").unbind("click");
        }
      });
    });
  </script>
</body>

</html>