<?php
session_start();

if ($_SESSION) {
        
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <title>Shikifujin Hotel - ROOMS</title>
    <?php require('../model/links.php') ?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $("#data").load("room_data.php");
        $(".filter").on("keypress", function(e) {
            if (e.keyCode == 13) {
                var adult = $("#fAdult").val();
                var child = $("#fChild").val();
                $.ajax({
                    type: 'POST',
                    url: "room_data.php",
                    data: {
                        adult: adult,
                        child: child
                    },
                    success: function(hasil) {
                        $('#data').html(hasil);
                    }
                });
                return false; // prevent the button click from happening
            }
        });

    });
    </script>
</head>

<body class="bg-light">
    <?php
    require('header.php');
    ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">OUR ROOMS</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
                <nav class="navbar navbar-expand-lg bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">FILTERS</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">CHECK AVAILABILITY</h5>
                                <label class="form-label">Check-In</label>
                                <input type="date" class="form-control shadow-none mb-3">
                            </div>
                            <!-- <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">FACILITIES</h5>
                                <div class="mb-2">
                                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" form="f1">Facility one</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" form="f2">Facility two</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" form="f3">Facility three</label>
                                </div>
                            </div> -->
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">GUESTS</h5>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <label class="form-label">Adults</label>
                                        <input type="number" name="fAdult" id="fAdult"
                                            class="filter form-control shadow-none" value="0" required>
                                    </div>
                                    <div>
                                        <label class="form-label">Children</label>
                                        <input type="number" name="fChild" id="fChild"
                                            class="filter form-control shadow-none" value="0" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div id="data" class="col-lg-9 col-md-12 px-4">
            </div>

        </div>
        <?php
        require('footer.php');
        ?>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
        var exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var roomid = button.getAttribute('data-id')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            $.ajax({
                url: 'room_modal.php',
                type: 'post',
                data: {
                    roomid: roomid
                },
                success: function(response) {
                    // Add response in Modal body
                    $('.modal-content').html(response);
                    // Display Modal
                    $('#exampleModal').modal({
                        show: true
                    });
                }
            });
        })
        </script>

</body>

</html>