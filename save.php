<?php
    session_start();
    include 'koneksi.php';

    // Pastikan user sudah login
    if (empty($_SESSION['username'])) {
        header("location:index.php?pesan=belum_login");
        exit();
    }

    // Ambil user_id dari session
    $username = $_SESSION['username'];
    $query_user = "SELECT user_id FROM users WHERE username = '$username'";
    $result_user = mysqli_query($conn, $query_user);

    if ($result_user && mysqli_num_rows($result_user) > 0) {
        $user_data = mysqli_fetch_assoc($result_user);
        $user_id = $user_data['user_id'];
    } else {
        // Jika data user tidak ditemukan
        header("location:index.php?pesan=error_user");
        exit();
    }

    if (isset($_GET['save'])) {
        $recipe_id = $_GET['save'];

        // Periksa apakah recipe_id ada di tabel recipes
        $query_check_recipe = "SELECT * FROM recipes WHERE recipe_id = '$recipe_id';";
        $result_recipe = mysqli_query($conn, $query_check_recipe);

        if (mysqli_num_rows($result_recipe) > 0) {
            // Periksa recipe_id udah favorites
            $query_check_favorites = "SELECT * FROM favorites WHERE recipe_id = '$recipe_id';";
            $result_favorites = mysqli_query($conn, $query_check_favorites);

            if (mysqli_num_rows($result_favorites) == 0) {
                // Jika blm
                $query_insert_favorites = "INSERT INTO favorites (recipe_id, user_id) VALUES ('$recipe_id', '$user_id');";
                if (mysqli_query($conn, $query_insert_favorites)) {
                    $_SESSION['message'] = 'success';
                } else {
                    $_SESSION['message'] = 'error';
                }
            } else {
                $_SESSION['message'] = 'exists';
            }
        } else {
            $_SESSION['message'] = 'not_found';
        }
        header("location: explore.php");
        exit();
    }


    if (isset($_GET['aksi']) && $_GET['aksi'] == 'delete' && isset($_GET['recipe_id'])) {
        $recipe_id = $_GET['recipe_id'];

        // Periksa apakah recipe_id ada di tabel favorites
        $query_check_favorites = "SELECT * FROM favorites WHERE recipe_id = '$recipe_id';";
        $result_favorites = mysqli_query($conn, $query_check_favorites);

        if (mysqli_num_rows($result_favorites) > 0) {
            // Jika ada, hapus dari tabel favorites
            $query_delete = "DELETE FROM favorites WHERE recipe_id = '$recipe_id';";
            if (mysqli_query($conn, $query_delete)) {
                echo "Resep berhasil dihapus dari favorit.";
            } else {
                echo "Gagal menghapus resep: " . mysqli_error($conn);
            }
        } else {
            echo "Resep tidak ditemukan di daftar favorit.";
        }
    }


    $query_favorites = "SELECT favorites.*, recipes.recipe_id,recipes.title, recipes.description, recipes.main_image, recipes.main_ingredient, recipes.category
        FROM favorites
        JOIN recipes ON favorites.recipe_id = recipes.recipe_id;";
    $result_favorites = mysqli_query($conn, $query_favorites);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <?php
        // Periksa apakah ada data dalam tabel favorites
        if (mysqli_num_rows($result_favorites) > 0) {
            // Loop untuk menampilkan setiap resep favorit
            while ($result = mysqli_fetch_assoc($result_favorites)) {
    ?>
                <div class='recipe-card'>
                    <img src='<?php $result['main_image'] ?>' alt='Recipe Image'>
                    <h3><?php echo $result['title'] ?></h3>
                    <p><?php echo $result['description'] ?></p>
                    <p><?php echo $result['category'] ?></p>
                    <p><?php echo $result['main_ingredient'] ?></p>
                    <a href="save.php?aksi=delete&recipe_id=<?php echo $result['recipe_id']; ?>" 
                    class="" 
                    onclick="return confirm('Apakah Anda yakin ingin menghapus resep ini dari favorit?');">
                    Hapus
                    </a>
                </div>
    <?php
            }
        } else {
            echo "<p>Tidak ada resep favorit yang disimpan.</p>";
        }
    ?>
    </div>
</body>
</html>