<?php
session_start();
if (!$_SESSION['admin_name']) {
    header('Location: ../../index.php?session=expired');
}
include_once("../../controller/koneksi.php");
include_once("../model/function.php");

// UMUR USER CHART TIPE BAR

$remaja = array();
$dewasa_muda = array();
$dewasa = array();
$lansia = array();

function umur($tanggal_lahir)
{

    $tgl_lahir = date('Y-m-d', strtotime($tanggal_lahir));
    $birthDate = new \DateTime($tgl_lahir);
    $today = new \DateTime("today");
    if ($birthDate > $today) {
        return "0 tahun 0 bulan 0 hari";
    }
    $y = $today->diff($birthDate)->y;
    return $y;
}

$cariUmur = mysqli_query($conn, "SELECT tanggal_lahir FROM user_data");
while ($umur = mysqli_fetch_array($cariUmur)) {
    $umur_user = umur($umur['tanggal_lahir']);
    if ($umur_user < 15) {
        array_push($remaja, $umur_user);
    } elseif ($umur_user < 25 && $umur_user >= 15) {
        array_push($dewasa_muda, $umur_user);
    } elseif ($umur_user < 40 && $umur_user >= 25) {
        array_push($dewasa, $umur_user);
    } elseif ($umur_user >= 40) {
        array_push($lansia, $umur_user);
    }
}
$jumRemaja = count($remaja);
$jumDewMuda = count($dewasa_muda);
$jumDew = count($dewasa);
$jumLan = count($lansia);
?>

<?php

// LOKASI USER TIPE DOUGHNUT

$user_indo = mysqli_query($conn, "SELECT * FROM user_data WHERE negara = 'INDONESIA'");
$total_user_indo = mysqli_num_rows($user_indo);
$user_luar =  mysqli_query($conn, "SELECT * FROM user_data WHERE negara != 'INDONESIA' AND negara != ''");
$total_user_luar = mysqli_num_rows($user_luar);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Advanced Dashboard User</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <script type="text/javascript" src="Chart.js"></script>
    <style>
        .chart-container {
            width: 70%;
            height: 80%;
            margin: 0 auto;
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
                                <a href="../message.php" class="dropdown-item">
                                    <div class="media">
                                        <img src="profile/<?= $message_data['photo_profile'] ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
                        <a href="../message.php" class="dropdown-item dropdown-footer">See All Messages</a>
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
                        <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
                            <a href="../index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p> Dashboard </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../room.php" class="nav-link">
                                <i class="nav-icon fas fa-duotone fa-bed"></i>
                                <p>
                                    Room
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
                                    <a href=" " class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>New Bookings</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href=" " class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Cancelled Bookings</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href=" " class="nav-link">
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
                                    <a href="../all_user.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Users</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../rating.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Review & Ratings</p>
                                    </a>
                                </li>
                            </ul>
                        <li class="nav-item">
                            <a href="../blog.php" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p> Blog </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" " class="nav-link">
                                <i class="nav-icon fas fa-comments"></i>
                                <p> Message </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../model/log_out.php" class="nav-link text-red">
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
                        <h1>Advanced User Dashboard</h1>
                        <a role="button" class="btn btn-warning" href="../all_user.php">Back</a>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="chart-container">
                                        <canvas id="umurUser"></canvas>
                                    </div>
                                    <hr class="m-5">
                                    <div class="chart-container">
                                        <canvas id="lokasiUser"></canvas>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
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
    <script>
        var ctx = document.getElementById("umurUser").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["10-15", "15-25", "25-40", "40-60"],
                datasets: [{
                    label: 'User',
                    data: [<?= $jumRemaja ?>, <?= $jumDewMuda ?>, <?= $jumDew ?>, <?= $jumLan ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    position: "top",
                    text: "Umur User",
                    fontSize: 25,
                    fontColor: "#111"
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontSize: 15
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontSize: 15
                        }
                    }]
                }
            },
        })
    </script>
    <script>
        var chartUser = document.getElementById("lokasiUser").getContext('2d');
        var userChart = new Chart(chartUser, {
            type: 'pie',
            data: {
                labels: ["Lokal", "Mancanegara"],
                datasets: [{
                    label: 'User',
                    data: [<?= $total_user_indo ?>, <?= $total_user_luar ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    position: "top",
                    text: "Lokasi User",
                    fontSize: 25,
                    fontColor: "#111"
                },
            },
        })
    </script>
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & ../plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
</body>

</html>