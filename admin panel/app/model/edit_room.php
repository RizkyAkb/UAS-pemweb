<?php
include('../../controller/koneksi.php');

function clean($string)
{
    return str_replace("'", '', $string);
}

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $roomid = $_POST['room_id'];
    $room_name = $_POST['room_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $adult = $_POST['adult'];
    $child = $_POST['child'];
    $feature = $_POST['feature'];
    $description = $_POST['description'];
    $facilities = $_POST['facilities'];


    if (isset($_FILES['change_foto'])) {
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

                $query = mysqli_query($conn, "UPDATE room SET room_name='$room_name', price=$price, quantity=$quantity,adult=$adult,child=$child,feature='$feature',room_description='$description',facilities='$facilities',room_photo='$new_img_name' WHERE room_id = $roomid");

                // JIKA SQL BERHASIL MAKA LANGSUNG DIALIHKAN KE HALAMAN UTAMA UNTUK LOGIN
                if ($query) {
                    $_SESSION['sukses_ganti_data_user'] = "<div class='alert alert-success' role='alert'>
                    Berhasil mengganti data </div>";
                    header("Location: ../edit_room.php?room_id=$roomid");
                } else {
                    echo "<script>alert('Cant add this photo')</script>";
                    header("Location: ../edit_room.php?room_id=$roomid");
                }
            } else {
                echo "<script>alert('Cant add this photo')</script>";
                header("Location: ../edit_room.php?room_id=$roomid");
            }
        }               
    } else {
        $result = mysqli_query($conn, "UPDATE room SET room_name='$room_name', price=$price, quantity=$quantity,adult=$adult,child=$child,feature='$feature',room_description='$description',facilities='$facilities' WHERE room_id=$roomid");
        if ($result) {
            $_SESSION['sukses_ganti_data_user'] = "<div class='alert alert-success' role='alert'>
        Berhasil mengganti data </div>";
            header("Location: ../edit_room.php?room_id=$roomid");
        }
    }
}