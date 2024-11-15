<?php
    include 'koneksi.php';

    $user_id = $_GET['edit'];
    
    $query_users = "SELECT * FROM users WHERE user_id = '$user_id';";
    $sql_users = mysqli_query($conn, $query_users);
    $result_users = mysqli_fetch_assoc($sql_users);

    $query_profil = "SELECT * FROM profil_pict WHERE id = '$user_id';";
    $sql_profil = mysqli_query($conn, $query_profil);
    $result_profil = mysqli_fetch_assoc($sql_profil);

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
    <p>Nama</p>
    <input value="<?php echo $result_users['nama']; ?>" type="text" name="nama" id="nama">
    <p>username</p>
    <input value="<?php echo $result_users['username']; ?>" type="text" name="username" id="username">
    <p>password</p>
    <input value="<?php echo $result_users['password']; ?>" type="password" name="password" id="password">
    <p>bio</p>
    <textarea name="bio" id="bio"><?php echo $result_users['bio']; ?></textarea>
    <button type="submit">ubah</button>
    </form>
</body>
</html>