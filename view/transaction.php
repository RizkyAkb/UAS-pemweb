<?php
include_once('../controller/koneksi.php');
$id = $_SESSION['user_id']; ?>
<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <?php require('../model/links.php'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .checked {
        color: orange;
    }
    </style>
</head>

<body class="bg-light">

    <?php
    require('header.php');
    $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
    ?>

    <div class="container">
        <div class="row">

            <div class="col-12 my-5 mb-4 px-4">
                <h2 class="fw-bold">TRANSACTION LIST</h2>
                <div style="font-size: 14px;">
                    <a href="../index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="#" class="text-secondary text-decoration-none">TRANSACTION</a>
                </div>
            </div>

            <div class="col-12 mb-5 px-4">
                <div class="bg-white p-3 p-md-4 rounded shadow-sm">
                    <table id="tabel-data" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Room</th>
                                <th>Check-In</th>
                                <th>Check-Out</th>
                                <th>Booking Date</th>
                                <th>Status</th>
                                <th>---</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $result = mysqli_query($conn, "SELECT * FROM booking_room LEFT JOIN room ON booking_room.room_id = room.room_id WHERE user_id = $id ORDER BY booking_id DESC");
                            while ($item = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $item['room_name'] ?></td>
                                <td><?= $item['check_in'] ?></td>
                                <td><?= $item['check_out'] ?></td>
                                <td><?= $item['booking_date'] ?></td>
                                <td><?= $item['status'] ?></td>
                                <td>
                                    <?php
                                        if ($item['status'] == 'Waiting for payment') {
                                            echo "<a class='btn btn-warning my-2' href='payment.php?booking_id=" . $item['booking_id'] . "'>Pay</a>";
                                            echo "<a href='../model/cancel_booking.php?booking_id=".$item['booking_id']."' class='btn btn-danger ms-1 confirm'>Cancel</a>";
                                        } elseif ($item['status'] == 'Booking success') {
                                            $booking_id = $item['booking_id'];
                                            if (strtotime($item['check_in']) <= strtotime(date('Y-m-d'))) {
                                                mysqli_query($conn, "UPDATE booking_room SET status='Waiting user check-in' WHERE booking_id=$booking_id");
                                            }
                                            echo "<span class='d-inline-block' tabindex='0' data-bs-toggle='tooltip' title='Wait until check in date for click this button' data-bs-placement='top'>";
                                            echo "<button class='btn btn-dark my-2' disabled>Check In</button>";
                                            echo "</span>";
                                            echo "<a href='../model/cancel_booking.php?booking_id=".$item['booking_id']."' class='btn btn-danger ms-1 confirm'>Cancel</a>";
                                        } elseif ($item['status'] == 'Waiting user check-in') {
                                            echo "<form action='' method='post'>";
                                            echo "<button type='submit' class='btn btn-success my-2'>Check In</button>";
                                            echo "<input type='hidden' name='booking_id' value='" . $item['booking_id'] . "'>";
                                            if (isset($_POST['booking_id'])) {
                                                $booking_id = $_POST['booking_id'];
                                                mysqli_query($conn, "UPDATE booking_room SET status='Check-in' WHERE booking_id = $booking_id");
                                            }
                                            echo "</form>";
                                        } elseif ($item['status'] == 'Using room') {
                                            echo "Enjoy your room :)";
                                        } elseif ($item['status'] == 'Success') {
                                            echo "<a class='btn btn-warning my-2' href='review.php?booking_id=" . $item['booking_id'] . "'>Review</a>";
                                            $room_id = $item['room_id'];                                            
                                        } elseif ($item['status'] == 'Reviewed') {
                                            $booking_id = $item['booking_id'];
                                            $query = mysqli_query($conn, "SELECT * FROM user_rating WHERE booking_id = $booking_id");
                                            while ($item = mysqli_fetch_array($query)) {
                                                for ($i = 1; $i < $item['rating']; $i++) {
                                                    echo "<span class='fa fa-star checked'></span>";
                                                }
                                            }
                                        }
                                        ?>

                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php
    require('footer.php');
    ?>


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#tabel-data').DataTable({
            searching: false,
            info: false
        });

        // Delete 
        $('.confirm').on('click', function() {
            return confirm('Are you sure want to cancel this transaction?');
        });
    });
    </script>

</body>

</html>