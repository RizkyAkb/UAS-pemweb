<?php
include '../../controller/koneksi.php';

$rating_id = $_GET['rating_id'];

$query = mysqli_query($conn, "DELETE FROM user_rating WHERE rating_id = $rating_id");
if ($query) {
    header('location:../rating.php');
}
?>