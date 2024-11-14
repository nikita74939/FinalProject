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
    <h1>Upload Recipes</h1>
    <form action="proses_uploud.php" method="POST" enctype="multipart/form-data">
        <p class="label-input">Title</p>
        <input required type="text" name="title" id="title">
        <p class="label-input">Picture</p>
        <input required type="file" name="main_image" id="main_image" accept="image/*">
        <p class="label-input">Category</p>
        <select name="category" id="category">
            <option value="Face">Face</option>
            <option value="Body">Body</option>
            <option value="Hair">Hair</option>
        </select>
        <p class="label-input">Description</p>
        <textarea name="description" id="description"></textarea>
        <p class="label-input">Ingredients</p>
        <textarea name="ingredient" id="ingredient"></textarea>
        <p class="label-input">Step by step</p>
        <textarea name="step" id="step"></textarea>
        <br>
        <button class="submit-btn" type="submit" name="aksiUp" value="add">Upload Recipes</button>
    </form>
</body>
</html>