<?php
require_once("../controller/koneksi.php");
// session_start();
$room_id = $_POST['room_id'];
    // if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $adult = $_POST['adult'];
        $kid = $_POST['kid'];
        $checkIn = $_POST['checkIn'];
        $checkOut = $_POST['checkOut'];
        $price = $_POST['price'];
        $bookingDate = $_POST['booking_date'];

        if ($checkIn > $checkOut) {
            echo "<script>
                    alert('Check-in date can't exceed check-out date');
                    window.location.href='../view/book.php?room_id=' + $room_id;
                    </script>";
        } else {
            $booking = mysqli_query($conn, "INSERT INTO booking_room(user_id,room_id,adult,kid,check_in,check_out, total_price, booking_date) VALUES ($userId, '$room_id',$adult,$kid,'$checkIn','$checkOut', $price, '$bookingDate')");
            $updateRoom = mysqli_query($conn, "UPDATE room SET quantity = quantity - 1 WHERE room_id = '$room_id'");

            if ($booking) {
                echo "<script>
                    alert('Reservation Success');
                    window.location.href='../view/transaction.php';
                    </script>";
            }
        }
    // } else {
    //     // harusnya muncul peringatan anda belum login
    //     // echo "Please Login First"; 
    //     echo "<script>alert('Check In date cant greater than check out date')</script>";
    //     header('location:../view/book.php?room_id='.$room_id);
    // }