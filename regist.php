<?php
    session_start();
    include 'koneksi.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $currentDateTime = new DateTime();
    $time = $currentDateTime->format("Y-m-d H:i:s");

    $query = "INSERT INTO users VALUES('', '$username', '', '$password', '', '$time', '1')";

    $sql = mysqli_query($conn, $query);

    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";

    $q = "SELECT * FROM users WHERE username = '$username'";
    $query = mysqli_query($conn, $q);
    if ($query) {
        while ($data = mysqli_fetch_array($query)) {
            $id = $data['user_id'];
        }
    }

    header("location: edit_profil.php?edit=$id");
    
