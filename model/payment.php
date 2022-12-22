<?php
require_once("../controller/koneksi.php");

$booking_id = $_POST['booking_id'];
$paymentMethod = $_POST['payment'];
$date = $_POST['pay_date'];

$pay = mysqli_query($conn, "INSERT INTO payment(booking_id,payment_method,payment_date) VALUES ($booking_id, '$paymentMethod', '$date')");
$updateStatus = mysqli_query($conn, "UPDATE booking_room SET status = 'Booking success' WHERE booking_id = $booking_id");

if ($pay) {
    echo "
        <script>
            alert('Payment Success');
            window.location.href='../view/transaction.php';
        </script>";
} else {
    echo "
        <script>
            alert('Payment failed, please try again!');
            window.location.href='../view/transaction.php';
        </script>";
}

    // } else {
    //     // harusnya muncul peringatan anda belum login
    //     // echo "Anda belum login"; 
    //     echo "<script>alert('Check In date cant greater than check out date')</script>";
    //     header('location:../view/book.php?room_id='.$room_id);
    // }