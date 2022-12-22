<?php
require_once '../controller/koneksi.php';

$rating = $_POST['rating'];
$review = $_POST['review'];
$booking_id = $_POST['booking_id'];

$query = mysqli_query($conn, "INSERT INTO user_rating VALUES (NULL, $booking_id,$rating,'$review')");
if ($query) {
    $update = mysqli_query($conn, "UPDATE booking_room SET status = 'Reviewed' WHERE booking_id = $booking_id");
    header('location:../view/transaction.php');
}
?>