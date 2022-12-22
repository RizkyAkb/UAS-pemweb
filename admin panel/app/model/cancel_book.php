<?php
include '../../controller/koneksi.php';

$booking_id = $_GET['booking_id'];

$query = mysqli_query($conn, "UPDATE booking_room SET status = 'Cancelled' WHERE booking_id = $booking_id");
if ($query) {
    header('location:../cancelled_booking.php');
}
?>