<?php
require "../controller/koneksi.php";

$roomId = $_POST['roomid'];
$modalRoom = mysqli_query($conn, "SELECT * FROM room WHERE room_id = $roomId");
while ($item = mysqli_fetch_array($modalRoom)) {
?>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"><?= $item['room_name'] ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="card mb-4 border-0 shadow">
        <div class="row g-0 p-3 align-items-center">
            <div class="col-md-12 mb-3">
                <img src="../images/rooms/1.jpg" class="img-fluid rounded">
            </div>
            <div class="col-md-12 px-lg-3 px-md-3 px-0">
                <h6 class="mb-3">$ <?= $item['price'] ?> / Night</h6>
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
                <div class="guests mb-3">
                    <h6 class="mb-1">Guests</h6>
                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                        Adult <?= $item['adult'] ?>
                    </span>
                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                        Children <?= $item['child'] ?>
                    </span>
                </div>
                <div class="description mb-3">
                    <h6 class="mb-1">Description</h6>
                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                        <?= $item['room_description'] ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="book.php?room_id=<?= $item['room_id'] ?>"
                class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
        </div>
    </div>
    <?php } ?>
</div>