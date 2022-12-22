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
    <title>Review</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <?php require('../model/links.php'); ?>
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
                <h2 class="fw-bold">REVIEW AND RATING</h2>
                <div style="font-size: 14px;">
                    <a href="../index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="#" class="text-secondary text-decoration-none">REVIEW</a>
                </div>
            </div>


            <?php
            $booking_id = $_GET['booking_id'];
            $result = mysqli_query($conn, "SELECT * FROM booking_room b LEFT JOIN room r ON b.room_id = r.room_id WHERE booking_id = $booking_id");
            while ($item = mysqli_fetch_array($result)) {
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
            <?php } ?>

            <div class="col-lg-6 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <div class="col-lg-12 col-md-12 px-4">
                            <div class="card mb-4 border-0 shadow-sm rounded-3">
                                <div class="card-body">
                                    <form class="row g-3" action="../model/review.php" method="POST">
                                        <h6 class="mb-3">Review and Rating</h6>
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <label for="review" class="form-label">Review</label>
                                                <textarea class="form-control" name="review" id="review" rows="2"
                                                    required></textarea>
                                            </div>
                                            <div class="col-md-7 mb-3">
                                                <label for="adult" class="form-label">
                                                    Rating
                                                </label>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-grey btn-sm rateButton"
                                                        aria-label="Left Align">
                                                        <span class="fa fa-star"></span>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-default btn-grey btn-sm rateButton"
                                                        aria-label="Left Align">
                                                        <span class="fa fa-star"></span>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-default btn-grey btn-sm rateButton"
                                                        aria-label="Left Align">
                                                        <span class="fa fa-star"></span>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-default btn-grey btn-sm rateButton"
                                                        aria-label="Left Align">
                                                        <span class="fa fa-star"></span>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-default btn-grey btn-sm rateButton"
                                                        aria-label="Left Align">
                                                        <span class="fa fa-star"></span>
                                                    </button>
                                                    <input type="hidden" class="form-control" id="rating" name="rating"
                                                        value="1">
                                                    <input type="hidden" class="form-control" name="booking_id"
                                                        value="<?= $booking_id ?>">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
        $(".rateButton").click(function() {
            if ($(this).hasClass('btn-grey')) {
                $(this).removeClass('btn-grey btn-default').addClass(
                    'btn-warning star-selected checked');
                $(this).prevAll('.rateButton').removeClass('btn-grey btn-default').addClass(
                    'btn-warning star-selected checked');
                $(this).nextAll('.rateButton').removeClass('btn-warning star-selected checked')
                    .addClass('btn-grey btn-default');
            } else {
                $(this).nextAll('.rateButton').removeClass('btn-warning star-selected checked')
                    .addClass('btn-grey btn-default');
            }
            $("#rating").val($('.star-selected').length);
        });
    });
    </script>

</body>

</html>