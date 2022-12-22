<?php
session_start();
if (!$_SESSION['admin_name']) {
    header('Location: ../../index.php?session=expired');
}
require_once("../../controller/koneksi.php");


$action = $_GET['action'];
if ($action == 'read') {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "UPDATE user_message SET status='READED' WHERE message_id=$id");
    if ($result) {
        header("Location: ../message.php");
    }
}

elseif ($action == 'delete'){
    $id = $_GET['id'];
    $result = mysqli_query($conn, "UPDATE user_message SET status='DELETED' WHERE message_id=$id");
    if ($result) {
        header("Location: ../message.php");
    }
}

elseif ($action == 'deleteAll'){
    $result = mysqli_query($conn, "UPDATE user_message SET status='DELETED' WHERE status= 'READED'");
    if ($result) {
        header("Location: ../message.php");
    }
}

elseif ($action == 'readAll'){
    $result = mysqli_query($conn, "UPDATE user_message SET status='READED' WHERE status= 'UNREAD'");
    if ($result) {
        header("Location: ../message.php");
    }
}
