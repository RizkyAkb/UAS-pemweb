<?php 
    include_once('../controller/koneksi.php');
    $id = $_SESSION['user_id']; 
    $booking_id = $_GET['booking_id'];
    ?>
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
    <title>Payment</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <?php require('../model/links.php'); ?>
</head>

<body class="bg-light">

    <?php
    require('header.php');
    $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
    ?>

    <div class="container">
        <div class="row">

            <div class="col-12 my-5 mb-4 px-4">
                <h2 class="fw-bold">PAYMENT DETAIL</h2>
                <div style="font-size: 14px;">
                    <a href="../index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="#" class="text-secondary text-decoration-none">Payment</a>
                </div>
            </div>

            <div class="col-12 mb-5 px-4">
                <div class="bg-white p-3 p-md-4 rounded shadow-sm">
                    <table id="tabel-data" width="100%">
                        <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Room</th>
                                <th>Check-In</th>
                                <th>Check-Out</th>
                                <th>Total Payment</th>
                                <th>Payment Method</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $result = mysqli_query($conn, "SELECT * FROM booking_room LEFT JOIN room ON booking_room.room_id = room.room_id WHERE user_id = $id AND booking_id = $booking_id");
                                while ($item = mysqli_fetch_array($result)) {
                                ?>
                            
                                <tr>
                                    <td><?= $item['booking_id'] ?></td>
                                    <td><?= $item['room_name'] ?></td>
                                    <td><?= $item['check_in'] ?></td>
                                    <td><?= $item['check_out'] ?></td>
                                    <td>$ <?= $item['total_price'] ?></td>
                                    <form action="../model/payment.php" method="POST">
                                    <td><select class="form-select" id="payment" name="payment" required>
                                            <option selected disabled value="">Choose...</option>
                                            <option value="Check">Check</option>
                                            <option value="Paypall">Paypall</option>
                                            <option value="Credit Card">Credit Card</option>
                                        </select></td>
                                    <td>
                                        <input type="hidden" name="booking_id" value="<?= $item['booking_id'] ?>">
                                        <input type="hidden" name="pay_date" value="<?= date('Y-m-d h:m:s') ?>">
                                        <button class="btn btn-success my-2">Pay</button>
                                        <a href='../model/cancel_booking.php?booking_id=<?= $item['booking_id'] ?>' class='confirm btn btn-danger ms-1'>Cancel</a>
                                    </td>
                                </tr>
                            </form>
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
            paging: false,
            searching: false,
            info: false
        });

        // Delete 
         // Delete 
         $('.confirm').on('click', function() {
            return confirm('Are you sure want to cancel this transaction?');
        });
           
    });
    </script>

</body>

</html>