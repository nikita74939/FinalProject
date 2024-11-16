<?php
    include 'koneksi.php';

    $recipe_id = $_GET['edit'];

    $query_recipe = "SELECT * FROM recipes WHERE recipe_id = '$recipe_id';";
    $sql_recipe = mysqli_query($conn, $query_recipe);
    $result_recipe = mysqli_fetch_assoc($sql_recipe);

    if (isset($_POST['aksiEdit']) && $_POST['aksiEdit'] == "edit") {
        $title = $_POST['title'];
        $category = $_POST['category'];
        $main_ingredient = $_POST['main_ingredient'];
        $description = $_POST['description'];
        $ingredient = $_POST['ingredient'];
        $step = $_POST['step'];

        $main_image = $result_recipe['main_image']; // Default gambar lama
        if (!empty($_FILES['main_image']['name'])) {
            $target_dir = "img/";
            $main_image = $target_dir . basename($_FILES['main_image']['name']);
            if (!move_uploaded_file($_FILES['main_image']['tmp_name'], $main_image)) {
                die("Error uploading file.");
            }
        }
        
    
        $query_edit_recipe = "UPDATE recipes SET title='$title', category='$category', main_ingredient='$main_ingredient', description='$description', ingredient='$ingredient', step='$step', main_image='$main_image' WHERE recipe_id = '$recipe_id';";
        $sql_edit_recipe = mysqli_query($conn, $query_edit_recipe);
    
        if($sql_edit_recipe) {
            header("location: profil.php");
            exit();
        } else {
            die("Error updating recipe: " . mysqli_error($conn));
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Recipe</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="recipe_id" value="<?php echo $recipe_id; ?>">
        <p>title</p>
        <input required type="text" name="title" id="title" value="<?php echo $result_recipe['title']; ?>">
        <p>picture</p>
        <input type="file" name="main_image" id="main_image" accept="img/*" >
        <p>category</p>
        <select required name="category" id="category">
            <option <?php if($result_recipe['category'] == "Face") {echo "selected";} ?> value="Face">Face</option>
            <option <?php if($result_recipe['category'] == "Body") {echo "selected";} ?> value="Body">Body</option>
            <option <?php if($result_recipe['category'] == "Hair") {echo "selected";} ?> value="Hair">Hair</option>
        </select>
        <p>main ingredient</p>
        <input required type="text" name="main_ingredient" id="main_ingredient" value="<?php echo $result_recipe['main_ingredient']; ?>">
        <p>description</p>
        <textarea required name="description" id="description"><?php echo $result_recipe['description']; ?></textarea>
        <p>ingredients</p>
        <textarea required name="ingredient" id="ingredient"><?php echo $result_recipe['ingredient']; ?></textarea>
        <p>step by step</p>
        <textarea required name="step" id="step"><?php echo $result_recipe['step']; ?></textarea>
        <button name="aksiEdit" value="edit">Simpan perubahan</button>
    </form>
</body>
</html>