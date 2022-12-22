<?php
include('../../controller/koneksi.php');

function clean($string)
{
    return str_replace("'",'',$string);
}

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $name = clean($name);
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $ttl = $_POST['ttl'];
    $alamat = $_POST['alamat'];
    $alamat = clean($alamat);
    $result = mysqli_query($conn, "UPDATE user_data SET nama='$name',user_email='$email',phone_number='$phone' ,alamat='$alamat',tanggal_lahir='$ttl' WHERE user_id=$id");
    if ($result) {
        $_SESSION['sukses_ganti_data_user'] = "<div class='alert alert-success' role='alert'>
        Berhasil mengganti data </div>";
        header("Location: ../edit_user.php?id=$id");
    }
}

if (isset($_POST['delete_image'])) {
    $id = $_GET['id'];
    $default_image_profile = 'default_profile.png';
    $delete_image = mysqli_query($conn, "UPDATE user_data SET photo_profile='$default_image_profile' WHERE user_id = $id");
    if ($delete_image) {
        $_SESSION['sukses_ganti_data_user'] = "<div class='alert alert-success' role='alert'>
        Berhasil mengganti data </div>";
        header("Location: ../edit_user.php?id=$id");
    }
}
