<?php
    include 'koneksi.php';

    $query = "SELECT * FROM recipes";
    $sql = mysqli_query($conn, $query);
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
        <img src="img/<?php echo $result['main_image']; ?>" alt="foto" style="width: 100px;" />
        <h3><?php echo $result['title']; ?></h3>
        <p><?php echo $result['description']; ?></p>
    <?php
        }
    ?>
</body>
</html>