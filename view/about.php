<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../CSS/custom.css">
    <title>Shikifujin Hotel - About Us</title>
    <?php require('../model/links.php') ?>
    <style>
        .box {
            border-top-color: var(--teal) !important;
        }
    </style>
</head>

<body class="bg-light">

    <?php
    require('header.php');
    ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">ABOUT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
             Established in 2022 by Ma'ruf Amin, Shikifujin Hotels & Reserves began its <br>roots in Cape Town and continues to expand throughout Asian and beyond. 
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
                <h3 class="mb-3">Our Story</h3>
                <p align="justify">
                    Initially established as the Ambassador Group in 2021, Shikifujin boasts a heritage of over 50 years of successful hotel-management. Over time, we have perfected the tradition of applying excellence to all of our endeavours and daily operations. Our extensive experience in managing prestigious and distinctive properties is matched by our determination to help owners realise their worth. This is made possible by a highly focused, motivated and skilled executive team, led by industry visionary, CEO and founder, Ma'ruf Amin.
                </p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="../images/about/amin.png" class="w-100">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-l=md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="../images/about/hotel.svg" width="70px">
                    <h4 class="mt-3">100+ <br> ROOMS</h4>
                </div>
            </div>
            <div class="col-lg-3 col-l=md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="../images/about/customers.svg" width="70px">
                    <h4 class="mt-3">200+ <br> CUSTOMERS</h4>
                </div>
            </div>
            <div class="col-lg-3 col-l=md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="../images/about/rating.svg" width="70px">
                    <h4 class="mt-3">150+ <br> REVIEWS</h4>
                </div>
            </div>
            <div class="col-lg-3 col-l=md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="../images/about/staff.svg" width="70px">
                    <h4 class="mt-3">200+ <br> STAFF</h4>
                </div>
            </div>
        </div>
    </div>

    <h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>

    <div class="container px-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="../images/about/nabil.png" class="w-100">
                    <h5 class="mt-2">Nabil Makarim</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="../images/about/reza.png" class="w-100">
                    <h5 class="mt-2">Reza Muhammad</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="../images/about/dimas.png" class="w-100">
                    <h5 class="mt-2">Dimas Rama</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="../images/about/hakiki.png" class="w-100">
                    <h5 class="mt-2">Hakiki Al Qorni</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="../images/about/putra.png" class="w-100">
                    <h5 class="mt-2">Rizky Akbar</h5>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <?php
    require('footer.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            spaceBetween: 40,
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });
    </script>

</body>

</html>