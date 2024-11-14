<?php
    include 'koneksi.php';

    if (isset($_GET['lihat'])) {
        $recipe_id = $_GET['lihat'];

        $query = "SELECT * FROM recipes WHERE recipe_id = '$recipe_id';";
        $sql = mysqli_query($conn, $query);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="explore.php">Explore recipes</a></li>
            <li><a href="uploud.php">Upload Recipes</a></li>
        </ul>
        <a href="profil.php">Profile</a>
    </nav>
    <h1>explore recipes</h1>
    <?php
        while($result = mysqli_fetch_assoc($sql)) {
    ?>
        <h3><?php echo $result['title']; ?></h3>
        <img src="img/<?php echo $result['main_image']; ?>" alt="foto" style="width: 100px;" />
        <p>buat profile tapi blom ku selesaiin</p>
        <p>buat rating</p>
        <p><?php echo $result['description']; ?></p>
        <h4>Ingredients</h4>
        <p><?php echo $result['ingredient']; ?></p>
        <h4>Step by step</h4>
        <p><?php echo $result['step']; ?></p>
    <?php
        }
    ?>
</body>
</html>