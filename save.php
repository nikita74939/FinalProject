<?php
include 'koneksi.php'; // File koneksi ke database

// Ambil data dari URL
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
            $query_insert_favorites = "INSERT INTO favorites (recipe_id) VALUES ('$recipe_id');";
            if (mysqli_query($conn, $query_insert_favorites)) {
                echo "Recipe berhasil disimpan ke favorit!";
            } else {
                echo "Gagal menyimpan ke favorit: " . mysqli_error($conn);
            }
        } else {
            echo "Recipe sudah ada di daftar favorit!";
        }
    } else {
        echo "Recipe tidak ditemukan!";
    }
} else {
    echo "ID recipe tidak diberikan.";
}
?>
