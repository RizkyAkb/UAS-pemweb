<?php

include("../controller/koneksi.php");
include("../controller/koneksi_alamat.php");

// VALIDASI TANGGAL LAHIR
if (isset($_POST["submit"])) {

    if (isset($_POST["tanggal_lahir"])) {
        $tgl = $_POST["tanggal_lahir"];
        $tgl = strtotime($tgl);
        $now = date_create()->format('Y-m-d');
        $now = strtotime($now);
        if ($now <= $tgl) {
            $_SESSION['gagal'] = "<div class='alert alert-danger' role='alert'>
        tanggal lahir tidak valid
      </div>";
            header("Location: ../index.php");
        }
    }


    // VALIDASI PASSWORD DENGAN KARAKTER SPESIAL , HURUF BESAR KECIL , DAN ANGKA

    if (isset($_POST["pass"])) {
        $password = $_POST["pass"];
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
    }

    if (isset($_POST["repeat_pass"])) {
        $confirm = $_POST["repeat_pass"];
    }

    if (isset($password)) {
        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $_SESSION['gagal'] = "<div class='alert alert-danger' role='alert'>
        Kata sandi harus setidaknya 8 karakter dan harus mencakup setidaknya satu huruf besar, satu angka, dan satu karakter khusus.
      </div>";
            header("Location: ../index.php");
        }
        if ($confirm != $password) {
            $_SESSION['gagal'] =
                "<div class='alert alert-danger' role='alert'>
        perulangan password tidak sesuai </div>";
            header("Location: ../index.php");
        }
    }

    if (isset($_POST['user_email'])) {
        $emaile = $_POST['user_email'];
        $query_email = mysqli_query($conn, "SELECT * FROM user_data WHERE user_email = '$emaile'");
        $cek_email = mysqli_num_rows($query_email);
        if ($cek_email > 0) {
            $_SESSION['gagal'] =
                "<div class='alert alert-danger' role='alert'>
    email sudah terdaftar , gunakan email yang lain</div>";
            header("Location: ../index.php");
        }
    }

    // UJI APAKAH INPUT MEMENUHI SYARAT
    $check_user = $_POST["user_country"];
    if ($check_user == "") {
        $prov = $_POST['provinsi'];
    }else{
        $prov = '';
    }

    if ($now <= $tgl || !$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8 || $confirm != $password || $prov == 'zonk') {
        $_SESSION['gagal'] = "<div class='alert alert-danger' role='alert'>
    pendaftaran gagal </div>";
        header("Location: ../index.php");
    }
    // MEMASUKKAN INPUT USER KE DATABASE
    else {

        $passwordex = $_POST["pass"];
        // MEMBUAT ENKRIPSI PASSWORD DENGAN MD5
        $pass = md5($passwordex);
        // 
        // CHECK USER DARI INDONESIA ATAU LUAR NEGERI
        $check_user = $_POST["user_country"];
        if ($check_user == "") {
            $country = "INDONESIA";
            $prov = $_POST['provinsi'];
            if ($prov == 'zonk') {
                $_SESSION['gagal'] = "<div class='alert alert-danger' role='alert'>
    pendaftaran gagal </div>";
                header("Location: ../index.php");
            } else {
                $query = mysqli_query($conn_alamat, "SELECT * FROM provinces WHERE id ='$prov'") or die('Query Gagal');
                while ($data = mysqli_fetch_array($query)) {
                    $provinsi = $data['name'];
                }
                $kot = $_POST['kota'];
                $query = mysqli_query($conn_alamat, "SELECT * FROM regencies WHERE id ='$kot'") or die('Query Gagal');
                while ($data = mysqli_fetch_array($query)) {
                    $kota = $data['name'];
                }
                $kec = $_POST['kecamatan'];
                $query = mysqli_query($conn_alamat, "SELECT * FROM districts WHERE id ='$kec'") or die('Query Gagal');
                while ($data = mysqli_fetch_array($query)) {
                    $kecamatan = $data['name'];
                }
                $kel = $_POST['kelurahan'];
                $query = mysqli_query($conn_alamat, "SELECT * FROM villages WHERE id ='$kel'") or die('Query Gagal');
                while ($data = mysqli_fetch_array($query)) {
                    $kelurahan = $data['name'];
                }
            }
        } elseif ($check_user == 'international_user') {
            $country = $_POST['country'];
            $provinsi = $_POST['provinces'];
            $kota = $_POST['regencies'];
            $kecamatan = $_POST['districts'];
            $kelurahan = $_POST['villages'];
        }
        // 
        $alamat = "$provinsi-$kota-$kecamatan-$kelurahan";
        $nama = $_POST["name"];
        $nomor_telp = $_POST["phone"];
        $email = $_POST["user_email"];
        $tgl_lahir = $_POST["tanggal_lahir"];

        // UPLOAD FOTO PROFIL KE FOLDER PROFILE

        if (isset($_FILES['foto_profile'])) {
            $my_image_name = $_FILES['foto_profile']['name'];
            $tmp_name = $_FILES['foto_profile']['tmp_name'];
            $error = $_FILES['foto_profile']['error'];

            if ($error === 0) {
                $img_ex = pathinfo($my_image_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array("jpg", "png", "jpeg");

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = '../profile/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    $query_sql = "INSERT INTO user_data (user_email, password, nama ,phone_number ,photo_profile,alamat,tanggal_lahir,negara) 
                    VALUES ('$email', '$pass','$nama','$nomor_telp','$new_img_name','$alamat','$tgl_lahir','$country')";

                    // JIKA SQL BERHASIL MAKA LANGSUNG DIALIHKAN KE HALAMAN UTAMA UNTUK LOGIN

                    if ($conn->query($query_sql) === TRUE) {
                        $_SESSION['sukses'] = "<div class='alert alert-success' role='alert'>
                        pendaftaran akun sukses
                      </div>";
                        header("Location: ../index.php");
                    } else {
                        $_SESSION['gagal'] = "<div class='alert alert-danger' role='alert'>
                        pendaftaran gagal </div>";
                        header("Location: ../index.php");
                    }
                } else {
                    $_SESSION['gagal'] = "<div class='alert alert-danger' role='alert'>
                    tipe file foto profil tidak valid (png,jpg,jpeg)</div>";
                    header("Location: ../index.php");
                }
            }
        }
        if (empty($_POST['foto_profile'])) {
            $default_photo_profile = 'default_profile.png';
            $query_sql = "INSERT INTO user_data (user_email, password, nama ,phone_number ,photo_profile,alamat,tanggal_lahir,negara) 
            VALUES ('$email', '$pass','$nama','$nomor_telp','$default_photo_profile','$alamat','$tgl_lahir','$country')";

            // JIKA SQL BERHASIL MAKA LANGSUNG DIALIHKAN KE HALAMAN UTAMA UNTUK LOGIN

            if ($conn->query($query_sql) === TRUE) {
                $_SESSION['sukses'] = "<div class='alert alert-success' role='alert'>
                pendaftaran akun sukses
              </div>";
                header("Location: ../index.php");
            } else {
                $_SESSION['gagal'] = "<div class='alert alert-danger' role='alert'>
                pendaftaran gagal </div>";
                header("Location: ../index.php");
            }
        }
    }
}
