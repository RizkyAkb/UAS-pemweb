<?php
require_once '../controller/koneksi.php';
$room_id = $_GET['room_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <?php include '../model/links.php' ?>

</head>

<body class="bg-light">

    <?php
    require('header.php');
    ?>

    <div class="container">
        <div class="row">

            <div class="col-12 my-4 mb-4 px-4">
                <h2 class="fw-bold">Shikifujin Room Reservation</h2>
                <div style="font-size: 14px;">
                    <a href="../index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="rooms.php" class="text-secondary text-decoration-none">ROOMS</a>
                    <span class="text-secondary"> > </span>
                    <a href="#" class="text-secondary text-decoration-none">BOOKING FORM</a>
                    <span class="text-secondary"> > </span>
                </div>
            </div>

            <?php
            $result = mysqli_query($conn, "SELECT * FROM room WHERE room_id = $room_id");
              while ($item = mysqli_fetch_array($result)) {
                $_SESSION['room']['price'] = $item['price'];
            ?>
            <div class="col-lg-6 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <img src="../images/rooms/<?= $item['room_photo'] ?>" class="img-fluid rounded mb-3">
                        <h5><?= $item['room_name'] ?></h5>
                        <h6>$ <?= $item['price'] ?> / Night</h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <form class="row g-3" action="../model/book.php" method="POST">
                            <h6 class="mb-3">BOOKING DETAILS</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="adult" class="form-label">
                                        Number of Adults
                                    </label>
                                    <input type="number" class="form-control" id="adult" name="adult" value="1" min="1"
                                        max="<?= $item['adult']?>" required>
                                </div>
                                <div class="col-md-6 mb-3" title="if there are any" data-bs-toggle="tooltip"
                                    data-bs-placement="top">
                                    <label for="kid" class="form-label">
                                        Number of Kids <span style="color: red;">*</span>
                                    </label>
                                    <input type="number" class="form-control" id="kid" name="kid" value="0" min="0"
                                        max="<?= $item['child']?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="checkIn" class="form-label">Check-in</label>
                                    <input type="date" class="form-control" id="checkIn" name="checkIn" value=""
                                        min="<?= date("Y-m-d") ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="checkOut" class="form-label">Check-out</label>
                                    <input type="date" class="form-control" id="checkOut" name="checkOut" value=""
                                        min="<?= date("Y-m-d")?>" required>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="request" class="form-label">Do you have special request?</label>
                                    <textarea class="form-control" name="request" id="request" rows="2"></textarea>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div id="pay_info">Please provide check-in and check-out date!</div>
                                </div>
                                <div class="col-12"> 
                                    <?php
                                        $subTotal = 0; 
                                        if (isset($_SESSION['subTotal'])) {
                                            $subTotal = $_SESSION['subTotal'];
                                        }
                                    ?>
                                    <input type="hidden" name="booking_date" value="<?= date('Y-m-d h:m:s') ?>">
                                    <input type="hidden" name="room_id" value="<?= $room_id ?>">
                                    <input type="hidden" name="price"  id= "price" value="">
                                    <?php
                                    if (!isset($_SESSION['user_id'])) {
                                        echo "<span class='d-inline-block w-100' tabindex='0' data-bs-toggle='tooltip' title='Please Login First' data-bs-placement='top'>";
                                        echo "<button class='btn w-100 btn-dark mb-1' disabled>Book</button>";
                                        echo "</span>";
                                    } else {
                                        echo "<button id='bookbtn' class='disabled btn btn-dark w-100 text-white custom-bg shadow-none mb-1'>Book</button>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php
    require('footer.php');
    ?>

    <script type="text/javascript">
    $(document).ready(function() {
        let payInfo = document.getElementById('pay_info');
        let bookbtn = document.getElementById('bookbtn');
        let price = document.getElementById('price');
        function dateCheck() {
            let checkIn = $('#checkIn').val();
            let checkOut = $('#checkOut').val();
            if (checkIn != '' && checkOut != '') {
                // AJAX Request
                $.ajax({
                    url: '../model/book_confirm.php',
                    type: 'POST',
                    data: {
                        check: '',
                        checkIn: checkIn,
                        checkOut: checkOut
                    },
                    success: function(response) {
                        let data = JSON.parse(response);

                        if (data.status == 'check_in_out_equal') {
                            payInfo.innerText = 'You cannot check-out on the same day!';
                        } else if (data.status == 'check_in_earlier') {
                            payInfo.innerText = 'Check-out date is earlier than check-in date!';
                        } else {
                            payInfo.innerHTML = 'No. of days : ' + data.days + '<br>Subtotal : $' + data.subTotal;
                            price.value = data.subTotal;
                            bookbtn.classList.replace('btn-dark', 'on');
                            bookbtn.classList.replace('disabled', 'on');
                        }
                    }
                });
            }
        };
        $('#checkIn').change(function() {
            dateCheck();
        });
        $('#checkOut').change(function() {
            dateCheck();
        });
    });
    </script>
</body>

</html>