<?php
session_start();
if (!$_SESSION['admin_name']) {
    header('Location: ../../index.php?session=expired');
}
include('../../controller/koneksi.php');


// ACTION UNTUK EDIT ARTIKEL

function clean($string)
{
    return str_replace("'", '', $string);
}

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update']) || isset($_POST['draft_artikel'])) {
    $judul = $_GET['judul'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $title = clean($title);
    $content = $conn->real_escape_string($_POST['content']);
    $content = clean($content);

    if (isset($_FILES['thumbnail_artikel'])) {
        $my_image_name = $_FILES['thumbnail_artikel']['name'];
        $tmp_name = $_FILES['thumbnail_artikel']['tmp_name'];
        $error = $_FILES['thumbnail_artikel']['error'];

        if ($error === 0) {
            $img_ex = pathinfo($my_image_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "png", "jpeg");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../../../blog_thumbnail/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                if (isset($_POST['update'])) {
                    $query_sql = mysqli_query($conn, "UPDATE blog SET judul='$title',isi_artikel='$content',thumbnail_artikel='$new_img_name' WHERE judul='$judul'");
                } elseif (isset($_POST['draft_artikel'])) {
                    $query_sql = mysqli_query($conn, "UPDATE blog SET judul='$title',isi_artikel='$content',thumbnail_artikel='$new_img_name',status='DRAFT' WHERE judul='$judul'");
                }

                if ($query_sql) {
                    $_SESSION['sukses_edit'] = "<div class='alert alert-success' role='alert'>
                    Artikel Berhasil di Edit
                  </div>";
                    header("Location: ../edit_blog.php?judul=$title");
                } else {
                    $_SESSION['gagal_edit'] = "<div class='alert alert-danger' role='alert'>
                    Artikel Gagal di Edit </div>";
                    header("Location: ../edit_blog.php?judul=$judul");
                }
            } else {
                $_SESSION['gagal_edit'] = "<div class='alert alert-danger' role='alert'>
                tipe file thumbnail artikel tidak valid (png,jpg,jpeg)</div>";
                header("Location: ../edit_blog.php?judul=$judul");
            }
        }
    }

    if (empty($_POST['thumbnail_artikel'])) {
        if (isset($_POST['update'])) {
            $query_sql = mysqli_query($conn, "UPDATE blog SET judul='$title',isi_artikel='$content',status='ACTIVE' WHERE judul='$judul'");
        } elseif (isset($_POST['draft_artikel'])) {
            $query_sql = mysqli_query($conn, "UPDATE blog SET judul='$title',isi_artikel='$content',status='DRAFT' WHERE judul='$judul'");
        }

        if ($query_sql) {
            $_SESSION['sukses_edit'] = "<div class='alert alert-success' role='alert'>
            Artikel Berhasil di Edit
          </div>";
            header("Location: ../edit_blog.php?judul=$title");
        } else {
            $_SESSION['gagal_edit'] = "<div class='alert alert-danger' role='alert'>
            Artikel Gagal di Edit </div>";
            header("Location: ../edit_blog.php?judul=$judul");
        }
    }
}



// ACTION UNTUK DELETE/POST/DRAFT ARTIKEL

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'delete') {
        $judul = $_GET['judul'];
        $result = mysqli_query($conn, "UPDATE blog SET status='DELETED' WHERE judul='$judul'");
        if ($result) {
            header("Location: ../blog.php");
        }
    } elseif ($action == 'post') {
        $judul = $_GET['judul'];
        $select = mysqli_query($conn, "SELECT * FROM blog WHERE judul='$judul'");
        while ($data = mysqli_fetch_array($select)) {
            $date_post = $data['date_post'];
        }
        if ($date_post == '0000-00-00 00:00:00') {
            $currentDateTime = date('Y-m-d H:i:s');
            $result = mysqli_query($conn, "UPDATE blog SET status='ACTIVE' , date_post ='$currentDateTime' WHERE judul='$judul'");
            if ($result) {
                header("Location: ../blog.php");
            }
        } else {
            $result = mysqli_query($conn, "UPDATE blog SET status='ACTIVE' WHERE judul='$judul'");
            if ($result) {
                header("Location: ../blog.php");
            }
        }
    } elseif ($action == 'draft') {
        $judul = $_GET['judul'];
        $result = mysqli_query($conn, "UPDATE blog SET status='DRAFT' WHERE judul='$judul'");
        if ($result) {
            header("Location: ../blog.php");
        }
    }
}



// ACTION UNTUK CREATE ARTIKEL

if (isset($_POST['create_post']) || isset($_POST['create_draft_post'])) {
    $title = $conn->real_escape_string($_POST['judul_artikel']);
    $title = clean($title);
    $content = $conn->real_escape_string($_POST['content_artikel']);
    $content = clean($content);

    if (isset($_FILES['thumbnail_artikel'])) {
        $my_image_name = $_FILES['thumbnail_artikel']['name'];
        $tmp_name = $_FILES['thumbnail_artikel']['tmp_name'];
        $error = $_FILES['thumbnail_artikel']['error'];

        if ($error === 0) {
            $img_ex = pathinfo($my_image_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "png", "jpeg");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../../../blog_thumbnail/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                if (isset($_POST['create_post'])) {
                    $query_sql = mysqli_query($conn, "INSERT INTO blog (judul,isi_artikel,thumbnail_artikel,status) VALUES ('$title','$content','$new_img_name','ACTIVE')");
                } elseif (isset($_POST['create_draft_post'])) {
                    $query_sql = mysqli_query($conn, "INSERT INTO blog (judul,isi_artikel,thumbnail_artikel,status,date_post) VALUES ('$title','$content','$new_img_name','DRAFT','-')");
                }

                if ($query_sql) {
                    $_SESSION['sukses_buat_artikel'] = "<div class='alert alert-success' role='alert'>
                    Artikel Berhasil di Edit
                  </div>";
                    header("Location: ../blog.php");
                } else {
                    $_SESSION['gagal_buat_artikel'] = "<div class='alert alert-danger' role='alert'>
                    Artikel Gagal di Edit </div>";
                    header("Location: ../blog.php");
                }
            } else {
                $_SESSION['gagal_buat_artikel'] = "<div class='alert alert-danger' role='alert'>
                tipe file thumbnail artikel tidak valid (png,jpg,jpeg)</div>";
                header("Location: ../blog.php");
            }
        }
    }
}

// ACTION UNTUK MULTIPLE DELETE

if (isset($_POST['multiple_blog_delete'])) {
    $multiple_judul = $_POST['multiple_delete_judul'];
    foreach ($_POST['multiple_delete_judul'] as $extract_judul) {
        $delete_query = mysqli_query($conn, "UPDATE blog SET status = 'DELETED' WHERE judul = '$extract_judul' ");
    }
    header("Location: ../blog.php");
}
