<?php
date_default_timezone_set("Asia/Jakarta");
$file = 'index.php';
if (is_file($file)) {
  $loc = 'view/';
}

if (isset($loc)) {
  include("controller/koneksi.php");
  include("controller/koneksi_alamat.php");
} else {
  include("../controller/koneksi.php");
  include("../controller/koneksi_alamat.php");
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $hidden_login = "style='display: none;'";
    if (isset($loc)) {
        $notif = mysqli_query($conn, "SELECT * FROM booking_room WHERE user_id = $user_id AND status != 'Success' AND status != 'Reviewed' AND status != 'Using room' AND status != 'Cancelled' ");
        $count_notif = mysqli_num_rows($notif);
        if ($count_notif > 0) {
            $show_notif = "<span class='mt-2 ms-0 position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style='font-size:10px'>$count_notif</span>";
            $waiting_payment = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM booking_room WHERE user_id = $user_id AND status = 'Waiting for payment'"));
            if ($waiting_payment > 0) {
                $show_waiting_payment = "<span class='mt-2 ms-0 position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style='font-size:10px'>$waiting_payment</span>";
            } else {
                $show_waiting_payment = "";
            }
            $processed = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM booking_room WHERE user_id = $user_id AND status = 'Booking success'"));
            if ($processed > 0) {
                $show_processed = "<span class='mt-2 ms-0 position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style='font-size:10px'>$processed</span>";
            } else {
                $show_processed = "";
            }
            $checkin = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM booking_room WHERE user_id = $user_id AND status = 'Waiting user check-in'"));
            if ($checkin > 0) {
                $show_checkin = "<span class='mt-2 ms-0 position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style='font-size:10px'>$checkin</span>";
            } else {
                $show_checkin = "";
            }
            $cancelling = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM booking_room WHERE user_id = $user_id AND status = 'Request cancel'"));
            if ($cancelling > 0) {
                $show_cancelling = "<span class='mt-2 ms-0 position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style='font-size:10px'>$cancelling</span>";
            } else {
                $show_cancelling = "";
            }
            
        } else {
            $show_notif = "";
            $show_waiting_payment = "";
            $show_processed = "";
            $show_checkin = "";
            $show_cancelling = "";
        }
        $show_profile = "
    <div class='btn-group dropdown'>
    <div class='dropdown'>
    <button class='btn btn-lg pe-0' type='button' id='notification' data-bs-toggle='dropdown' aria-expanded='false'>
        <i class='bi bi-bell-fill'></i>
        $show_notif
    </button>
    <ul id='notification' class='dropdown-menu dropdown-menu-lg-end m-0 p-0' style='width: 22rem;'>
        <div class='card'>
            <div class='card-header'>
                <a class='text-decoration-none link-dark' href='view/transaction.php?id=$user_id'>Transaction</a>
            </div>
            <ul class='list-group list-group-flush'>
              <div class='row justify-content-center'>
                  <div class='p-0 m-2 col-2 text-center '><a href='view/transaction.php?id=$user_id' class='text-decoration-none link-dark position-relative'><i class='bi bi-clock'></i><br><span style='font-size: 12px;'>Waiting Payment</span>$show_waiting_payment</a></div>
                  <div class='p-0 m-2 col-2 text-center'><a href='view/transaction.php?id=$user_id' class='text-decoration-none link-dark position-relative'><i class='bi bi-arrow-repeat'></i><br><span style='font-size: 12px;'>Processed</span>$show_processed</a></div>
                  <div class='p-0 m-2 col-2 text-center'><a href='view/transaction.php?id=$user_id' class='text-decoration-none link-dark position-relative'><i class='bi bi-calendar-check'></i><br><span style='font-size: 12px;'>Check-In</span>$show_checkin</a></div>
                  <div class='p-0 m-2 col-2 text-center'><a href='view/transaction.php?id=$user_id' class='text-decoration-none link-dark position-relative'><i class='bi bi-x-circle'></i><br><span style='font-size: 12px;'>Canceling</span>$show_cancelling</a></div>
              </div>
            </ul>
        </div>
    </ul>
    </div>
    <button class='btn btn-lg' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
        <i class='bi bi-person-circle'></i>
    </button>
    <ul class='dropdown-menu dropdown-menu-lg-end'>
        <li><a class='dropdown-item' href='view/profile.php?id=$user_id'><i class='bi bi-gear'></i> Settings</a></li>
        <li><a class='dropdown-item' href='view/transaction.php?id=$user_id'><i class='bi bi-bag'></i>
                Transaction</a></li>
        <li data-toggle='modal' data-target='#sign_out_modal'><a class='dropdown-item' href=' model/sign_out.php'><i class='bi bi-box-arrow-in-left'></i> Sign Out</a></li>
    </ul>
</div>";
    } else {
        $notif = mysqli_query($conn, "SELECT * FROM booking_room WHERE user_id = $user_id AND status != 'Success' AND status != 'Reviewed' AND status != 'Using room' AND status != 'Cancelled' ");
        $count_notif = mysqli_num_rows($notif);
        if ($count_notif > 0) {
            $show_notif = "<span class='mt-2 ms-0 position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style='font-size:10px'>$count_notif</span>";
            $waiting_payment = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM booking_room WHERE user_id = $user_id AND status = 'Waiting for payment'"));
            if ($waiting_payment > 0) {
                $show_waiting_payment = "<span class='mt-2 ms-0 position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style='font-size:10px'>$waiting_payment</span>";
            } else {
                $show_waiting_payment = "";
            }
            $processed = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM booking_room WHERE user_id = $user_id AND status = 'Booking success'"));
            if ($processed > 0) {
                $show_processed = "<span class='mt-2 ms-0 position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style='font-size:10px'>$processed</span>";
            } else {
                $show_processed = "";
            }
            $checkin = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM booking_room WHERE user_id = $user_id AND status = 'Waiting user check-in'"));
            if ($checkin > 0) {
                $show_checkin = "<span class='mt-2 ms-0 position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style='font-size:10px'>$checkin</span>";
            } else {
                $show_checkin = "";
            }
            $cancelling = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM booking_room WHERE user_id = $user_id AND status = 'Request cancel'"));
            if ($cancelling > 0) {
                $show_cancelling = "<span class='mt-2 ms-0 position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' style='font-size:10px'>$cancelling</span>";
            } else {
                $show_cancelling = "";
            }
            
        } else {
            $show_notif = "";
            $show_waiting_payment = "";
            $show_processed = "";
            $show_checkin = "";
            $show_cancelling = "";
        }
        $show_profile = "
<div class='btn-group dropdown '>
    <div class='dropdown'>
    <button class='btn btn-lg pe-0' type='button' id='notification' data-bs-toggle='dropdown' aria-expanded='false'>
        <i class='bi bi-bell-fill'></i>
        $show_notif
  </span>
    </button>
    <ul id='notification' class='dropdown-menu dropdown-menu-lg-end m-0 p-0' style='width: 22rem;'>
        <div class='card'>
            <div class='card-header'>
                <a class='text-decoration-none link-dark' href='../view/transaction.php?id=$user_id'>Transaction</a>
            </div>
            <ul class='list-group list-group-flush'>
              <div class='row justify-content-center'>
              <div class='p-0 m-2 col-2 text-center '><a href='../view/transaction.php?id=$user_id' class='text-decoration-none link-dark position-relative'><i class='bi bi-clock'></i><br><span style='font-size: 12px;'>Waiting Payment</span>$show_waiting_payment</a></div>
              <div class='p-0 m-2 col-2 text-center'><a href='../view/transaction.php?id=$user_id' class='text-decoration-none link-dark position-relative'><i class='bi bi-arrow-repeat'></i><br><span style='font-size: 12px;'>Processed</span>$show_processed</a></div>
              <div class='p-0 m-2 col-2 text-center'><a href='../view/transaction.php?id=$user_id' class='text-decoration-none link-dark position-relative'><i class='bi bi-calendar-check'></i><br><span style='font-size: 12px;'>Check-In</span>$show_checkin</a></div>
              <div class='p-0 m-2 col-2 text-center'><a href='../view/transaction.php?id=$user_id' class='text-decoration-none link-dark position-relative'><i class='bi bi-x-circle'></i><br><span style='font-size: 12px;'>Canceling</span>$show_cancelling</a></div>
              </div>
            </ul>
        </div>
    </ul>
    </div>
    <button class='btn btn-lg' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
        <i class='bi bi-person-circle'></i>
    </button>
    <ul class='dropdown-menu dropdown-menu-lg-end'>
        <li><a class='dropdown-item' href='../view/profile.php?id=$user_id'><i class='bi bi-gear'></i> Settings</a></li>
        <li><a class='dropdown-item' href='../view/transaction.php?id=$user_id'><i class='bi bi-bag'></i>
                Transaction</a></li>
        <li data-toggle='modal' data-target='#sign_out_modal'><a class='dropdown-item' href=' ../model/sign_out.php'><i class='bi bi-box-arrow-in-left'></i> Sign Out</a></li>
    </ul>
</div>";
    }
}
?>
<nav class="navbar navbar-expand-lg bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font " href="">Shikifujin Hotel</a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link me-2 <?= (is_file('index.php')) ? 'active' : ''; ?>" aria-current="page" href=" <?php if (isset($loc)) {
                                                                                    echo 'index.php';
                                                                                } else {
                                                                                    echo '../index.php';
                                                                                }; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 <?= (is_file('rooms.php')) ? 'active' : ''; ?>" aria-current="page" href=" <?php if (isset($loc)) {
                                                        echo 'view/rooms.php';
                                                    } else {
                                                        echo 'rooms.php';
                                                    } ?>">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 <?= (is_file('facilities.php')) ? 'active' : ''; ?>" aria-current="page" href=" <?php if (isset($loc)) {
                                                        echo 'view/facilities.php';
                                                    } else {
                                                        echo 'facilities.php';
                                                    } ?>">Facilities</a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link me-2 <?= (is_file('blog.php')) ? 'active' : ''; ?>" aria-current="page" href=" <?php if (isset($loc)) {
                                                        echo 'view/blog.php';
                                                    } else {
                                                        echo 'blog.php';
                                                    } ?>">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 <?= (is_file('contact.php')) ? 'active' : ''; ?>" aria-current="page" href=" <?php if (isset($loc)) {
                                                        echo 'view/contact.php';
                                                    } else {
                                                        echo 'contact.php';
                                                    } ?>">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (is_file('about.php')) ? 'active' : ''; ?>" aria-current="page" href=" <?php if (isset($loc)) {
                                                    echo 'view/about.php';
                                                } else {
                                                    echo 'about.php';
                                                } ?>">About</a>
                </li>
            </ul>
            <div class="d-flex">
                <?php
                if (isset($show_profile)) {
                    echo $show_profile;
                }
                ?>
                <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal" <?php
                                                                                                                                                if (isset($hidden_login)) {
                                                                                                                                                    echo $hidden_login;
                                                                                                                                                } ?>>
                    Login
                </button>
                <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registrasiModal" <?php
                                                                                                                                        if (isset($hidden_login)) {
                                                                                                                                            echo $hidden_login;
                                                                                                                                        } ?>>
                    Register
                </button>
            </div>
        </div>
    </div>
</nav>

<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action=" <?php if (isset($loc)) {
                                      echo 'model/login.php';
                                    } else {
                                      echo '../model/login.php';
                                    } ?>">
        <div class="modal-header">
          <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-person-circle fs-3 me-3"></i>User Login
          </h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Email address</label>
            <input value="<?php if (isset($_COOKIE["email"])) {
                            echo $_COOKIE["email"];
                          } ?>" type="email" name="email" class="form-control shadow-none log">
          </div>
          <div class="mb-4">
            <label class="form-label">Password</label>
            <input value="<?php if (isset($_COOKIE["password"])) {
                            echo $_COOKIE["password"];
                          } ?>" type="password" name="password" class="form-control shadow-none log">
          </div>
          <div class="d-flex align-items-center justify-content-end">
            <p><input type="checkbox" name="remember" class="log"> Remember me </p>
          </div>
          <div class="d-flex align-items-center justify-content-between mb-2">
            <input type="submit" name="submit" class="btn btn-dark shadow-none log" value="LOGIN">
            <a href="<?php if (isset($loc)) {
                        echo 'view/forgot_password.php';
                      } else {
                        echo 'forgot_password.php';
                      } ?>" class="text-secondary text-decoration-none">Forgot Password?</a>
          </div>
          <?php
          if (isset($_SESSION['percobaan_gagal'])) {
            if ($_SESSION['percobaan_gagal'] > 2) {
              echo "<div class='d-flex align-items-center justify-content-center' id='tunggu'></div>";
              if (!isset($_SESSION['expire'])) {
                $timeleft = 10;
                $_SESSION['expire'] = time() + $timeleft;
              }
            }
          }
          $now = time();
          if (isset($_SESSION['expire'])) {
            if ($now > $_SESSION['expire']) {
              unset($_SESSION['percobaan_gagal']);
            }
          }
          ?>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="registrasiModal" <?php
                                              if (isset($hidden_login)) {
                                                echo $hidden_login;
                                              } ?> data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action=" <?php if (isset($loc)) {
                        echo 'model/register.php';
                      } else {
                        echo '../model/register.php';
                      } ?>" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-person-lines-fill fs-3 me-3"></i>
            User Registration
          </h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
            Note: Your details must match with your ID (Aadhaar card, passport, driving license, etc)
            that will be required during check-in.
          </span>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="user_email" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Phone Number</label>
                <input type="number" name="phone" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Date of birth</label>
                <input type="date" name="tanggal_lahir" class="form-control shadow-none" required>
              </div>
              <div class="col-md-12 p-0 mb-3">
                <label class="form-label">Address</label>
                <!-- CHECK ASAL USER -->
                <input type="checkbox" name="user_country" class="countrye" value="local_user">
                <label class="form-label">not form indonesia ?</label>
                <!-- USER INTERNATIONAL -->
                <div class="d-flex justify-content-around inter">
                  <div class="col-md-5 ps-0 mb-2 inter">
                    <label class="form-label">Country</label>
                    <input type="text" name="country" class="form-control shadow-none international">
                  </div>
                  <div class="col-md-5 ps-0 mb-2 inter">
                    <input type="hidden" name="no" class="form-control shadow-none">
                  </div>
                </div>
                <div class="d-flex justify-content-around inter">
                  <div class="col-md-5 ps-0 mb-2 inter">
                    <label class="form-label">Province</label>
                    <input type="text" name="provinces" class="form-control shadow-none international">
                  </div>
                  <div class="col-md-5 ps-0 mb-2 inter">
                    <label class="form-label">Regencies</label>
                    <input type="text" name="regencies" class="form-control shadow-none international">
                  </div>
                </div>
                <div class="d-flex justify-content-around inter">
                  <div class="col-md-5 ps-0 mb-2 inter">
                    <label class="form-label">District</label>
                    <input type="text" name="districts" class="form-control shadow-none international">
                  </div>
                  <div class="col-md-5 ps-0 mb-2 inter">
                    <label class="form-label">Village</label>
                    <input type="text" name="villages" class="form-control shadow-none international">
                  </div>
                </div>
                <!--  -->

                <!-- USER LOKAL -->
                <div class="d-flex justify-content-around indo">
                  <div class="col-md-5 p-0 mb-2 indo">
                    <label class="form-label">Provinsi</label>
                    <?php
                    $query1 = mysqli_query($conn_alamat, "SELECT * FROM provinces ORDER BY name ASC");
                    ?>
                    <select name="provinsi" id="provinsi" class="form-control local" onchange="getProvinsi()" required>
                      <option value="zonk">--Pilih Provinsi--</option>
                      <?php
                      $user = mysqli_query($conn_alamat, "SELECT * FROM provinces ORDER BY name ASC");
                      foreach ($user as $provinsi)
                        echo
                        '<option value="' . $provinsi['id'] . '">' . $provinsi['name'] . '</option>';
                      ?>
                    </select>
                  </div>
                  <div class="col-md-5 p-0 mb-2 indo">
                    <label class="form-label">Kota</label>
                    <select class="form-control local" name="kota" id="kota" onchange="getKota()" required>
                      <option>--Pilih Kota/Kabupaten--</option>
                    </select>
                  </div>
                </div>

                <div class="d-flex justify-content-around indo">
                  <div class="col-md-5 p-0 mb-2 indo">
                    <label class="form-label">Kecamatan</label>
                    <select class="form-control local" name="kecamatan" id="kecamatan" onchange="getKecamatan()" required>
                      <option>--Pilih Kecamatan</option>
                    </select>
                  </div>

                  <div class="col-md-5 p-0 mb-2 indo">
                    <label class="form-label">Kelurahan</label>
                    <select class="form-control local" name="kelurahan" id="kelurahan" required>
                      <option>--Pilih Kelurahan</option>
                    </select>
                  </div>
                </div>
                <!-- -->
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="pass" class="form-control shadow-none" required>
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Your password must be 8-20 charcters long, contains letter and number, special characters,
                  and must not contain spaces and emoji
                </small>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="repeat_pass" class="form-control shadow-none" required>
              </div>
              <div class="col-md-12 p-0 mb-3">
                <label class="form-label">Picture</label>
                <input type="file" name="foto_profile" class="form-control shadow-none">
              </div>
            </div>
          </div>
          <div class="text-center my-1">
            <input type="submit" name="submit" class="btn btn-dark shadow-none" value="REGISTER">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function getProvinsi() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      document.getElementById("kota").innerHTML = this.responseText;
      getKota();
    }
    var id = document.getElementById("provinsi").value
    <?php if (isset($loc)) {
      echo "xhttp.open('POST', 'model/data_alamat.php?jenis=kota');";
    } else {
      echo "xhttp.open('POST', '../model/data_alamat.php?jenis=kota');";
    } ?>;
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id_provinsi=" + id);
  }

  function getKota() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      document.getElementById("kecamatan").innerHTML = this.responseText;
      getKecamatan();
    }
    var id = document.getElementById("kota").value
    <?php if (isset($loc)) {
      echo "xhttp.open('POST', 'model/data_alamat.php?jenis=kecamatan');";
    } else {
      echo "xhttp.open('POST', '../model/data_alamat.php?jenis=kecamatan');";
    } ?>
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id_kota=" + id);
  }

  function getKecamatan() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      document.getElementById("kelurahan").innerHTML = this.responseText;
    }
    var id = document.getElementById("kecamatan").value
    <?php if (isset($loc)) {
      echo "xhttp.open('POST', 'model/data_alamat.php?jenis=kelurahan');";
    } else {
      echo "xhttp.open('POST', '../model/data_alamat.php?jenis=kelurahan');";
    } ?>
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id_kecamatan=" + id);
  }

  $(document).ready(function() {
    $('input[type="checkbox"]').click(function() {
      if ($(this).is(":checked")) {
        $(".countrye").val("international_user");
        console.log("Checkbox is checked.");
        $('.international').attr('required', true);
        $('.indo').attr('required', false);
        $('.indo').fadeOut();
        $(".inter").css('display', 'inline');
      } else if ($(this).is(":not(:checked)")) {
        console.log("Checkbox is unchecked.");
        $(".countrye").val("local_user");
        $('.indo').attr('required', true);
        $('.international').attr('required', false);
        $(".indo").fadeIn();
        $('.inter').css('display', 'none');
      }
    });

    // COUNTDOWN TUNGGU UNTUK GAGAL LOGIN
    if ($("#tunggu").length != 0) {
      $(".log").prop('disabled', true);
      var timeleft = 15;
      var downloadTimer = setInterval(function() {
        if (timeleft <= 0) {
          clearInterval(downloadTimer);
          $("#tunggu").text("");
          $(".log").prop('disabled', false);
        } else {
          $("#tunggu").text("gagal berulang kali -- tunggu " + timeleft + " detik");
          $("#tunggu").css("color", "red");
        }
        timeleft -= 1;
      }, 1000);
    }

  });
</script>