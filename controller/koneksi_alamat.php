<?php

$host = "localhost";
$username = "shikifuj_shikifujin";
$password = "shikifujin1234";
$db = "shikifuj_indonesia";

$conn_alamat = mysqli_connect($host , $username , $password , $db);

if(!$conn_alamat){
    die("Koneksi gagal " . mysqli_connect_error());
}

?>