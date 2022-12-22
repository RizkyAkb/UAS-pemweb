<?php
include '../../controller/koneksi.php';

$roomid = $_GET['room_id'];
$query = mysqli_query($conn, "DELETE FROM room WHERE room_id = $roomid");

if ($query) {
    header('location:../room.php');
}
?>