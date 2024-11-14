<?php
    include 'koneksi.php';

    $recipe_id = $_GET['lihat'];

    if (isset($_POST['aksiComment'])) {
        if ($_POST['aksiComment'] == "add") {
            $comment_text = $_POST['comment_text'];

            $query = "INSERT INTO comments VALUES(NULL, '$recipe_id', NULL, '$comment_text', NULL);";
            $sql = mysqli_query($conn, $query);

            header("location: fullrecipe.php?lihat=$recipe_id");
        }
    }

    $query = "SELECT * FROM recipes WHERE recipe_id = '$recipe_id';";
    $sql = mysqli_query($conn, $query);

        

    $query_comment = "SELECT * FROM comments WHERE recipe_id = '$recipe_id';";
    $sql_comment = mysqli_query($conn, $query_comment);

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
    <div class="comments">
        <form action="" method="POST">
            <input name="comment_text" id="comment_text" type="text" placeholder="Add comment...">
            <button type="submit" name="aksiComment" value="add">add</button>
        </form>
        <?php
            while($result_comment = mysqli_fetch_assoc($sql_comment)) {
        ?>
            <h5>user belum dibikin</h5>
            <p><?php echo $result_comment['created_at']; ?></p>
            <p><?php echo $result_comment['comment_text']; ?></p>
        <?php
            }
        ?>
    </div>
</body>
</html>