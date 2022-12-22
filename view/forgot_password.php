<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        form .error {
            color: #ff0000;
        }

        #gagal {
            display: none;
        }
    </style>
</head>

<?php

include_once("../controller/koneksi.php");

// ARRAY PERTANYAAN KEAMANAN

$pKeamanan = [
    "what is your favorite food ? ", "your pets name ? ", "your hobby ?", "your favorite movie title ? ", "your idol artist ?", "favorite football player ?", "last hug ?", "favorite anime ?"
];

$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';



?>

<body>
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center
          min-vh-100">
            <div class="col-12 col-md-8 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="mb-4">
                            <h5>Forgot Password?</h5>
                            <p class="mb-2">Enter your registered email address to reset the password
                            </p>
                        </div>
                        <form method="post" action="../model/reset_pass.php" name="reset-pass">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Enter Your Email" required="">
                            </div>
                            <div class="mb-3">
                                <label for="pertanyaan" class="form-label">Select a Question</label>
                                <select name="pertanyaan" class="form-select" id="ptny" required>
                                    <?php

                                    foreach ($pKeamanan as $item) {
                                        echo "<option value='$item'>$item</option>";
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInput" class="form-label">Answer</label>
                                <input name="jawaban" type="text" class="form-control" id="jawaban" required>
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label">New Password</label>
                                <input type="password" id="password" class="form-control" name="pass" placeholder="New Password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" id="confirm_password" class="form-control" name="repeat_pass" placeholder="Confirm Password" required>
                            </div>
                            <div class="mb-3 d-grid">
                                <input type="submit" class="btn btn-primary" value="Reset Password">
                            </div>
                            <span>Don't have an account? <a href="../index.php">sign in</a></span>
                            <?php
                            if (isset($_SESSION['gagal_reset'])) {
                                echo $_SESSION['gagal_reset'];
                                if (isset($_SESSION['berhasil_reset'])) {
                                    unset($_SESSION['berhasil_reset']);
                                }
                            } elseif (isset($_SESSION['berhasil_reset'])) {
                                echo $_SESSION['berhasil_reset'];
                            }

                            if ($pageWasRefreshed) {
                                if (isset($_SESSION['gagal_reset'])) {
                                    unset($_SESSION['gagal_reset']);
                                } elseif (isset($_SESSION['berhasil_reset'])) {
                                    unset($_SESSION['berhasil_reset']);
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script type="text/javascript">
        $(function() {
            $("form[name='reset-pass']").validate({
                // Specify validation rules
                rules: {
                    pertanyaan: "required",
                    jawaban: "required",
                    email: {
                        required: true,
                        // Specify that email should be validated
                        // by the built-in "email" rule
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    confirm_password: {
                        required: true,
                        minlength: 8
                    }
                },
                // Specify validation error messages
                messages: {
                    pertanyaan: "pilih pertanyaan keamanan",
                    jawaban: "jawab pertanyaan keamanan",
                    password: {
                        required: "Please provide a password",
                        minlength: "password minimal 8 karakter dengan kombinasi huruf besar , kecil dan karakter spesial",
                    },
                    confirm_password: {
                        required: "Please provide a password",
                        minlength: "password minimal 8 karakter dengan kombinasi huruf besar , kecil dan karakter spesial"
                    },
                    email: "masukkan email yang benar"
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>

</body>

</html>