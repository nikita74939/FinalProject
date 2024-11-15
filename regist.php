<?php
include "koneksi.php";
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username_regist'];
    $password = $_POST['password_regist'];

    $query = mysqli_query($konek, "INSERT INTO user VALUES ('', '$username', '$password')")
             or die(mysqli_error($konek));
    

    unset($_POST['username_regist'], $_POST['password_regist']);

    if($query) {
        echo "<div style='color:#198754'>Akun anda berhasil terdaftar. Silahkan login.</div>";
    }
}