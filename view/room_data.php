<?php
require_once '../controller/koneksi.php';

$fAdult=0;
$fChild=0;
if ($_POST) {
$fAdult = $_POST['adult'];
$fChild = $_POST['child'];
}

$filterAdult = $fAdult;
$filterChild = $fChild;
$result = mysqli_query($conn, "SELECT * FROM room WHERE quantity > 0 AND adult >= $filterAdult AND child >= $filterChild ORDER BY room_id");
if (mysqli_num_rows($result) > 0) {
while ($item = mysqli_fetch_array($result)) {
?>
<div class="card mb-4 border-0 shadow">
    <div class="row g-0 p-3 align-items-center">
        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
            <img src="../images/rooms/<?= $item['room_photo'] ?>" class="img-fluid rounded">
        </div>
        <div class="col-md-5 px-lg-3 px-md-3 px-0">
            <h5 class="mb-3"><?= $item['room_name'] ?></h5>
            <div class="features mb-3">
                <h6 class="mb-1">Features</h6>
                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                    <?= $item['feature'] ?>
                </span>

            </div>
            <div class="facilities mb-3">
                <h6 class="mb-1">Facilities</h6>
                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                    <?= $item['facilities'] ?>
                </span>
            </div>
            <div class="guests">
                <h6 class="mb-1">Guests</h6>
                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                    Adult <?= $item['adult'] ?>
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                    Children <?= $item['child'] ?>
                </span>
            </div>
        </div>
        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
            <h6 class="mb-4">$ <?= $item['price'] ?> / Night</h6>
            <a href="book.php?room_id=<?= $item['room_id'] ?>"
                class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-sm w-100 btn-outline-dark shadow-none" data-id="<?= $item['room_id'] ?>">More details</button>
        </div>
    </div>
</div>
<?php
} 
} else {
    echo "Oops, we think it hides somewhere. Try another filter options.";
}
?>