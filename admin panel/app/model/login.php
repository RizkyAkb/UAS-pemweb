<?php

include('../../controller/koneksi.php');
function clean($string)
{
  return str_replace("'", '', $string);
}

$username = $conn->real_escape_string($_POST['username']);
$username = clean($username);
$password = $conn->real_escape_string($_POST['password']);
$password = clean($password);
$pass = md5($password);

$query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$pass'");

if (mysqli_num_rows($query) == 1) {
  $user = mysqli_fetch_array($query);
  $_SESSION['admin_name'] = $user['nama'];
  header('Location: ../index.php');
} else {
  $_SESSION['login_gagal'] = "<div class='alert alert-danger' role='alert'>
  username / password anda salah </div>";
  header('Location: ../../index.php');
}
