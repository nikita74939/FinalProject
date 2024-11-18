<?php
    include 'koneksi.php';
    session_start();

    if(empty($_SESSION['username'])) {
        header("location:index.php?pesan=belum_login");
    } else if (isset($_SESSION['username'])) {
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
            $recipe_id = $_POST['recipe_id'];
            $title = $_POST['title'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            $ingredient = $_POST['ingredient'];
            $main_ingredient = $_POST['main_ingredient'];
            $step = $_POST['step'];
            

            $currentDateTime = new DateTime();
            $time = $currentDateTime->format("Y-m-d H:i:s");

            //belum termasuk id user dan rating
            $query = "UPDATE recipes 
          SET title = '$title',
              category = '$category',
              description = '$description',
              ingredient = '$ingredient',
              step = '$step',
              main_ingredient = '$main_ingredient',
              created_at = '$time'
          WHERE recipe_id = '$recipe_id';";
            $sql = mysqli_query($conn, $query);

            header("location: explore.php?pesan=update");
        }
    }
?>