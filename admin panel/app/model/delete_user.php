<?php
session_start();
if (!$_SESSION['admin_name']) {
  header('Location: ../../index.php?session=expired');
}
require_once("../../controller/koneksi.php");

// ACTION UNTUK DELETE USER TUNGGAL

if (!isset($_POST['multiple_user_delete'])) {
  $id = $_GET['id'];
  $result = mysqli_query($conn, "UPDATE user_data SET status='DELETED' WHERE user_id=$id");
  if ($result) {
    header("Location: ../all_user.php");
  }
}

// ACTION UNTUK MULTIPLE DELETE

if (isset($_POST['multiple_user_delete'])) {
  $multiple_user = $_POST['multiple_user_select'];
  foreach ($_POST['multiple_user_select'] as $extract_id_user) {
    $delete_query = mysqli_query($conn, "UPDATE user_data SET status = 'DELETED' WHERE user_id = $extract_id_user ");
  }
  header("Location: ../all_user.php");
}
