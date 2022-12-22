<?php
ob_start();

/* nama server kita */
$servername = "localhost";

/* nama database kita */
$database = "shikifuj_hotel_shikifujin";

/* nama user yang terdaftar pada database (default: root) */
$username = "shikifuj_shikifujin";

/* password yang terdaftar pada database (default : "") */
$password = "shikifujin1234";

// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

// mengecek koneksi
if (!$conn) {
    die("Maaf koneksi anda gagal : " . mysqli_connect_error());
}
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
