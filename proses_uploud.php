<?php
    include 'koneksi.php';

    if (isset($_POST['aksiUp'])) {
        if ($_POST['aksiUp'] == "add") {
            //ambil variable
            $title = $_POST['title'];
            $category = $_POST['category'];
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
            $tmpFile = $files['main_image']['tmp_name'];
            //memindah dari temporary ke directory
            move_uploaded_file($tmp_file, $dir.$main_image);

            $query = "INSERT INTO "
        }
    }
?>