<?php
    $hostname = "localhost";
    $user = 'root';
    $pass = '';
    $db = 'beautyrecipe';
    $conn = mysqli_connect($hostname, $user, $pass, $db);
    if($conn) {
        //echo "koneksi berhasil";
    }

    mysqli_select_db($conn, $db);
?>