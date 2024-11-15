<?php
session_start();
$query = new mysqli('localhost', 'root', '', 'beautyrecipe');

$username = $_POST['username'];
$password = $_POST['password'];

$user_check = mysqli_query($query, "SELECT * FROM users WHERE username='$username'")
    or die(mysqli_error($query));

if (mysqli_num_rows($user_check) > 0) {
    $user_data = mysqli_fetch_assoc($user_check);
    if ($user_data['password'] == $password) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location:explore.php?pesan=udah_login");
    } else {
        header("location:index.php#login?pesan=password_salah");
    }
} else {
    header("location:index.php#login?pesan=user_tidak_ditemukan");
}
