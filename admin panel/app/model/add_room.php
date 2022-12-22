<?php
include('../../controller/koneksi.php');

if (isset($_POST['add'])) {
    $room_name = $_POST['room_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $adult = $_POST['adult'];
    $child = $_POST['child'];
    $feature = $_POST['feature'];
    $description = $_POST['description'];
    $facilities = $_POST['facilities'];


    $my_image_name = $_FILES['change_photo']['name'];
    $tmp_name = $_FILES['change_photo']['tmp_name'];
    $error = $_FILES['change_photo']['error'];

    if ($error === 0) {
        $img_ex = pathinfo($my_image_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "png", "jpeg");

        if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
            $img_upload_path = '../../../images/rooms/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            $query = mysqli_query($conn, "INSERT INTO room VALUES (NULL, '$room_name', $quantity, $adult, $child, $price, '$feature', '$facilities', '$description', '$new_img_name')");

            // JIKA SQL BERHASIL MAKA LANGSUNG DIALIHKAN KE HALAMAN UTAMA UNTUK LOGIN
            if ($query) {
                echo "<script>alert('Success adding room')</script>";
                header("Location: ../room.php");
            } else {
                echo "<script>alert('Cant add this photo')</script>";
            }
        } else {
            echo "<script>alert('Cant add this photo')</script>";
            header("Location: ../room.php");
        }
    }
}
