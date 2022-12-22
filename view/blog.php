<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../CSS/custom.css">
    <title>Shikifujin Hotel - BLOG</title>
    <?php require('../model/links.php') ?>
    <style>
        .card-img-top {
            width: 100%;
            height: 18vw;
            object-fit: cover;
        }
    </style>
</head>

<body class="bg-light">
    <?php
    require('header.php');
    include_once('../controller/koneksi.php');
    ?>

    <div class="container">
        <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Shikifujin Blog</h1>
                <p class="lead my-3">Silahkan berkunjung ke blog kami</p>
                <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
            </div>
        </div>
        <div id="show_blog"></div>
    </div>


    <?php
    require('footer.php');
    ?>


    <script>
        $(document).ready(function() {
            load_data();

            var page;

            function load_data(page) {
                $.ajax({
                    url: "../model/blogData.php",
                    method: "POST",
                    data: {
                        page: page
                    },
                    success: function(data) {
                        $('#show_blog').html(data);
                    }
                })
            }
            $(document).on('click', '.pagination_link', function() {
                page = $(this).attr("id");
                load_data(page);
            });

            $(document).on('click', '.pagination_back', function() {
                if (typeof page == "undefined") {
                    console.log("this is first page");
                } else {
                    var pa = eval(page);
                    back = eval(pa - 1);
                    console.log(back);
                    if (page != 0) {
                        load_data(back);
                    }
                }
            })

        });
    </script>

</body>

</html>