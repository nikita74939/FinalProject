<?php
    include 'koneksi.php';
    session_start();

    if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        }

    $q = "SELECT * FROM users WHERE username = '$username'";
    $query = mysqli_query($conn, $q);
        if ($query) {
            while ($data = mysqli_fetch_array($query)) {
                $id = $data['user_id'];
            }
        }


    if (isset($_POST['aksiUp'])) {
        if ($_POST['aksiUp'] == "add") {
            //ambil variable
            $title = $_POST['title'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            $main_ingredient = $_POST['main_ingredient'];
            $ingredient = $_POST['ingredient'];
            $step = $_POST['step'];
            //memisah nama dan format dg '.'
            $split = explode('.', $_FILES['main_image']['name']);
            //ambil array ke 1
            $ekstensi = $split[count($split)-1];

            //memgginakan title.format utk menghindari nama file sama
            $main_image = $title.'.'.$ekstensi;

            //tempat simpan foto sebelum up database
            $dir = "img/";
            //ambil file temporary
            $tmpFile = $_FILES['main_image']['tmp_name'];
            //memindah dari temporary ke directory
            move_uploaded_file($tmpFile, $dir.$main_image);

            $currentDateTime = new DateTime();
            $time = $currentDateTime->format("Y-m-d H:i:s");

            //belum termasuk id user dan rating
            $query = "INSERT INTO recipes VALUES('', $id, '$title', '$category', '$description', '$ingredient', '$step', '$main_ingredient', '$main_image', '$time');";
            $sql = mysqli_query($conn, $query);

            header("location: explore.php");
        }
    }
?>