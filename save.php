
<?php
include 'koneksi.php';
session_start();

if (empty($_SESSION['username'])) {
    header("location:index.php?pesan=belum_login");
} else if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

$q = "SELECT * FROM users WHERE username = '$username'";
$query = mysqli_query($conn, $q);
if ($query) {
    while ($data = mysqli_fetch_array($query)) {
        $id_acc = $data['user_id'];
    }
}

$query = "SELECT * FROM recipes ORDER BY recipe_id desc";
$sql = mysqli_query($conn, $query);

$query2 = "SELECT * FROM recipes ";

if (isset($_GET['save'])) {
    $recipe_id = $_GET['save'];

    // Periksa apakah recipe_id ada di tabel recipes
    $query_check_recipe = "SELECT * FROM recipes WHERE recipe_id = '$recipe_id';";
    $result_recipe = mysqli_query($conn, $query_check_recipe);

    if (mysqli_num_rows($result_recipe) > 0) {
        // Periksa recipe_id udah favorites
        $query_check_favorites = "SELECT * FROM favorites WHERE recipe_id = '$recipe_id' AND user_id ='$id_acc';";
        $result_favorites = mysqli_query($conn, $query_check_favorites);

        if (mysqli_num_rows($result_favorites) == 0) {
            // Jika blm
            $query_insert_favorites = "INSERT INTO favorites (recipe_id, user_id) VALUES ('$recipe_id', '$id_acc');";
            if (mysqli_query($conn, $query_insert_favorites)) {
                echo "sukses";
            } 
        } else {
            $query_delete_favorites = "DELETE FROM favorites WHERE recipe_id = '$recipe_id' AND user_id = '$id_acc';";
            if (mysqli_query($conn, $query_delete_favorites)) {
                echo "sukses";
            } 
    } 
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
}


?>