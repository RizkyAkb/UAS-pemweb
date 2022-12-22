<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>PROFILE</title>
    <?php require('../model/links.php');
    include_once('../controller/koneksi.php');
    $id = $_GET['id']; ?>
    <?php
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../index.php");
    }

    // ARRAY PERTANYAAN KEAMANAN

    $pKeamanan = [
        "what is your favorite food ? ", "your pets name ? ", "your hobby ?", "your favorite movie title ? ", "your idol artist ?", "favorite football player ?", "last hug ?", "favorite anime ?"
    ];

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $checking = mysqli_query($conn, "SELECT * FROM user_data WHERE user_id = '$user_id'");
        while ($check = mysqli_fetch_array($checking)) {
            $cek = $check['user_email'];
        }
        $cekP = mysqli_query($conn, "SELECT * FROM user_aut WHERE user_email='$cek'");
        if (mysqli_num_rows($cekP) == 0) {
            echo "<div id='pertanyaan'></div>";
        }
    }
    ?>

    <style>
        .pkem {
            display: none;
        }
    </style>

</head>

<body class="bg-light">

    <?php
    require('header.php');
    $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
    ?>

    <div class="container">
        <div class="row">

            <div class="col-12 my-5 mb-4 px-4">
                <h2 class="fw-bold">PROFILE</h2>
                <div style="font-size: 14px;">
                    <a href="../index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="#" class="text-secondary text-decoration-none">PROFILE</a>
                </div>
            </div>

            <?php

            $result = mysqli_query($conn, "SELECT * FROM user_data WHERE user_id=$id");

            while ($item = mysqli_fetch_array($result)) {
                $email = $item['user_email'];
                $nama = $item['nama'];
                $phone = $item['phone_number'];
                $photo = $item['photo_profile'];
                $alamat = $item['alamat'];
                $Pecah = explode("-", $alamat);
                $ttl = $item['tanggal_lahir'];
                //Menampilkan otomatis menggunakan for
                for ($i = 0; $i < count($Pecah); $i++) {
                    $Pecah[$i];
                }
                //Menampilkan secara manual dengan mengakses indexnya
                $provinsi = $Pecah[0];
                $kota = $Pecah[1];
                $kecamatan = $Pecah[2];
                $kelurahan = $Pecah[3];
            }
            ?>

            <div class="col-12 mb-5 px-4">
                <div class="bg-white p-3 p-md-4 rounded shadow-sm">
                    <form method="post" action="../model/change_profile.php?id=<?= $id ?>">
                        <h5 class="mb-3 fw-bold">Basic Information</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="change_name" class="form-control shadow-none" value="<?= $nama ?>" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="number" name="change_phone" class="form-control shadow-none" value="<?= $phone ?>" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Date of birth</label>
                                <input type="date" name="change_date" class="form-control shadow-none" value="<?= $ttl ?>">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Provinsi</label>
                                <input type="text" name="change_prov" class="form-control shadow-none" value="<?= $provinsi ?>" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Kabupaten</label>
                                <input type="text" name="change_kab" class="form-control shadow-none" value="<?= $kota ?>" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Kecamatan</label>
                                <input type="text" name="change_kec" class="form-control shadow-none" value="<?= $kecamatan ?>" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Kelurahan</label>
                                <input type="text" name="change_kel" class="form-control shadow-none" value="<?= $kelurahan ?>" required>
                            </div>
                        </div>
                        <input name="update" role="button" type="submit" class="btn text-white custom-bg shadow-none" value="Save Changes">
                    </form>
                </div>
                <?php

                if (isset($_SESSION['sukses_ganti_data_user'])) {
                    echo $_SESSION['sukses_ganti_data_user'];
                }

                if ($pageWasRefreshed) {
                    if (isset($_SESSION['sukses_ganti_data_user'])) {
                        unset($_SESSION['sukses_ganti_data_user']);
                    }
                }
                ?>
            </div>

            <div class="col-md-4 mb-5 px-4">
                <div class="bg-white p-3 p-md-4 rounded shadow-sm">
                    <form method="post" action="../model/change_profile.php?id=<?= $id ?>" enctype="multipart/form-data">
                        <h5 class="mb-3 fw-bold">Picture</h5>
                        <img <?php echo "src = '../profile/" . $photo . "'";  ?> class="rounded-circle img-fluid mb-3">

                        <label class="form-label">New Picture</label>
                        <input name="change_photo_profile" type="file" class="mb-4 form-control shadow-none" required>

                        <input name="upload_image" role="button" type="submit" class="btn text-white custom-bg shadow-none" value="Save Changes">
                    </form>
                </div>
                <?php
                if (isset($_SESSION['gagal_ganti_photo'])) {
                    echo $_SESSION['gagal_ganti_photo'];
                    if (isset($_SESSION['sukses_ganti_photo'])) {
                        unset($_SESSION['sukses_ganti_photo']);
                    }
                } elseif (isset($_SESSION['sukses_ganti_photo'])) {
                    echo $_SESSION['sukses_ganti_photo'];
                }

                if ($pageWasRefreshed) {
                    if (isset($_SESSION['gagal_ganti_photo'])) {
                        unset($_SESSION['gagal_ganti_photo']);
                    } elseif (isset($_SESSION['sukses_ganti_photo'])) {
                        unset($_SESSION['sukses_ganti_photo']);
                    }
                }
                ?>
            </div>


            <div class="col-md-8 mb-5 px-4">
                <div class="bg-white p-3 p-md-4 rounded shadow-sm">
                    <form method="post" action="../model/change_profile.php?id=<?= $id ?>">
                        <h5 class="mb-3 fw-bold">Change Password</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">New Password</label>
                                <input name="new_password" type="password" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Confirm Password</label>
                                <input name="repeat_password" type="password" class="form-control shadow-none" required>
                            </div>
                        </div>
                        <input name='change_password' type="submit" class="btn text-white custom-bg shadow-none" value="Save Changes">
                    </form>
                </div>
                <?php
                if (isset($_SESSION['gagal_ganti_password'])) {
                    echo $_SESSION['gagal_ganti_password'];
                    if (isset($_SESSION['sukses_ganti_password'])) {
                        unset($_SESSION['sukses_ganti_password']);
                    }
                } elseif (isset($_SESSION['sukses_ganti_password'])) {
                    echo $_SESSION['sukses_ganti_password'];
                }

                if ($pageWasRefreshed) {
                    if (isset($_SESSION['gagal_ganti_password'])) {
                        unset($_SESSION['gagal_ganti_password']);
                    } elseif (isset($_SESSION['sukses_ganti_password'])) {
                        unset($_SESSION['sukses_ganti_password']);
                    }
                }
                ?>
                <div class="bg-white p-3 p-md-4 mt-4 rounded shadow-sm pkem">
                    <form method="post" action="" class="form-pertanyaan">
                        <h5 class="mb-3 fw-bold">Add Security Question</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="pertanyaan" class="form-label">Select a Question</label>
                                <select name="pertanyaan" class="form-select" id="ptny" required>
                                    <?php

                                    foreach ($pKeamanan as $item) {
                                        echo "<option value='$item'>$item</option>";
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="exampleInput" class="form-label">Answer</label>
                                <input type="hidden" name="user_email" value="<?= $email ?>">
                                <input name="jawaban" type="text" class="form-control" id="jawaban" required>
                            </div>
                        </div>
                        <input id="input-pkem" type="button" class="btn text-white custom-bg shadow-none" value="Submit" onclick="subPer()">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="suksesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="suksesModalLabel" aria-hidden="true">
        <div class="modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <h1><i class="bi bi-check-circle"></i></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require('footer.php');
    ?>

    <script type="text/javascript">
        function subPer() {
            if ($("#jawaban").val() != "") {
                var data = $('.form-pertanyaan').serialize();
                console.log(data);
                $.ajax({
                    type: 'POST',
                    url: "../model/change_profile.php",
                    data: data,
                    success: function() {
                        console.log("success");
                        $(".pkem").hide(1000);
                        $("#suksesModal").modal("show");
                        $("#suksesModal").delay(1000).fadeOut(500);
                        $(".fade").delay(1200).fadeOut(500);
                        $("body").css("overflow","auto");
                    }
                });
            }
        }

        $(document).ready(function() {
            if ($("#pertanyaan").length != 0) {
                $(".pkem").css("display", "block");
            }
        });
    </script>

</body>

</html>