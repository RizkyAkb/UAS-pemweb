<?php

include("../controller/koneksi.php");

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
        $_SESSION['gagal_reset'] = "<div class='alert alert-danger' role='alert'>
    Kata sandi harus setidaknya 8 karakter dan harus mencakup setidaknya satu huruf besar, satu angka, dan satu karakter khusus.
  </div>";
        header("Location: ../view/forgot_password.php");
    }
    if ($confirm != $password) {
        $_SESSION['gagal_reset'] =
            "<div class='alert alert-danger' role='alert'>
    perulangan password tidak sesuai </div>";
        header("Location: ../view/forgot_password.php");
    } // UJI EMAIL

    elseif (isset($_POST['email'])) {
        $emaile = $_POST['email'];
        $query_email = mysqli_query($conn, "SELECT * FROM user_data WHERE user_email = '$emaile'");
        $cek_email = mysqli_num_rows($query_email);
        if ($cek_email == 0) {
            $_SESSION['gagal_reset'] =
                "<div class='alert alert-danger' role='alert'>
                    email tidak ditemukan</div>";
            header("Location: ../view/forgot_password.php");
        } // UJI PERTANYAAN DAN JAWABAN
        elseif (isset($_POST['pertanyaan']) || isset($_POST['jawaban'])) {
            $pertanyaan = $_POST['pertanyaan'];
            $jawaban = $_POST['jawaban'];
            $query_keamanan = mysqli_query($conn, "SELECT * FROM user_aut WHERE user_email = '$emaile' AND pertanyaan = '$pertanyaan' AND jawaban = '$jawaban'");
            $cek_hasil = mysqli_num_rows($query_keamanan);
            if ($cek_hasil > 0) {
                $pass = md5($password);
                $ganti_pass = mysqli_query($conn, "UPDATE user_data SET password = '$pass' WHERE user_email='$emaile' ");
                if ($ganti_pass) {
                    $_SESSION['berhasil_reset'] =
                        "<div class='alert alert-success' role='alert'>
                    berhasil ganti password</div>";
                    header("Location: ../view/forgot_password.php");
                }
            } else {
                $_SESSION['gagal_reset'] =
                    "<div class='alert alert-danger' role='alert'>
                gagal ganti password</div>";
                header("Location: ../view/forgot_password.php");
            }
        } else {
            $_SESSION['gagal_reset'] =
                "<div class='alert alert-danger' role='alert'>
                gagal ganti password</div>";
            header("Location: ../view/forgot_password.php");
        }
    }
}
