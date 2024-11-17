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
        $id = $data['user_id'];
        $bio = $data['bio'];
        $nama = $data['nama'];
        $id_pict = $data['id_pict'];
    }
}

$q = "SELECT p.color FROM profil_pict p JOIN users u ON p.id = u.id_pict WHERE u.user_id = '$id'";
$query = mysqli_query($conn, $q);
if ($query) {
    while ($data = mysqli_fetch_array($query)) {
        $color = $data['color'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Recipe</title>

    <!-- style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container mx-3">
        <div class="row">

            <!-- left -->

            <div class="col-2 sticky-top" style="border-right: solid 1px rgb(221, 221, 221); height: 100vh;">
                <div class="pt-4">
                    <h5 class="ps-3">Beauty Recipe</h5>
                    <div class="d-flex flex-column" style="min-height: 90vh">
                        <!-- bagian menu -->
                        <div class="flex-grow-1">
                            <ul class="list-group list-group-flush my-4">
                                <a href="index.php" style="text-decoration: none; color: black">
                                    <li class="list-group-item" style="border: none">
                                        <h6>Home</h6>
                                    </li>
                                </a>
                                <a href="explore.php" style="text-decoration: none; color: black">
                                    <li class="list-group-item" style="border: none;">
                                        <h6>Explore</h6>
                                    </li>
                                </a>
                                <a href="uploud.php" style="text-decoration: none; color: black">
                                    <li class="list-group-item" style="border: none">
                                        <h6>Uploud</h6>
                                    </li>
                                </a>
                                <a href="profil.php" style="text-decoration: none; color: black">
                                    <li class="list-group-item" style="border: none;  color: rgb(140, 186, 159);">
                                        <h6 style="font-weight: 600">Profil</h6>
                                    </li>
                                </a>
                            </ul>
                        </div>

                        <!-- bagian logout -->
                        <div class="py-3 rounded-pill pb-2" style="background-color: rgb(140, 186, 159);">
                            <a href="logout.php" style="color: black; text-decoration: none;">
                                <h6 class="text-center">Logout</h6>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- left end -->

            <!-- right -->

            <div class="col-10" id="profilView">
                <div class="card mt-1" style="height: 200px; background-color: <?php echo $color ?>; border:none">
                    <div class="card-body">
                    </div>
                </div>

                <!-- info profil -->

                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <img src="users/pict<?php echo $id_pict ?>.jpg" class="img-thumbnail rounded-circle mx-5"
                                alt="..." width="200px" style="position: relative; top: -100px; border: none;">
                        </div>
                        <div class="col-9 text-end">
                            <a href="edit_profil.php?edit=<?php echo $id ?>"
                                class="p-2 px-3 mt-4 btn btn-dark rounded-pill">Edit Profil</a>
                        </div>
                    </div>
                    <div class="row pt-3" style="position: relative; top: -100px;">
                        <h6 style="font-size: 32px; font-weight: 700"><?php echo $nama; ?></h6>
                        <p style="font-size: 16px;">@<?php echo $username; ?></p>
                    </div>
                    <div class="row pt-1" style="position: relative; top: -100px;">
                        <p class="pb-4"><?php echo $bio; ?></p>
                        <hr>
                    </div>

                    <!-- info profil end -->

                    <!-- button -->

                    <div class="row text-center" style="position: relative; top: -100px;">
                        <div id="postButton" class="col-6" style="border-bottom: solid 1px black;">
                            <button id="postText" class="border-0 bg-white pb-3"
                                style="font-weight: 700; color: black">post</button>
                        </div>
                        <div id="savedButton" class="col-6" style="border-bottom: none;">
                            <button id="savedText" class="border-0 bg-white pb-3"
                                style="font-weight: 400; color: gray">saved</button>
                        </div>
                        <hr>
                    </div>

                    <div id="postRecipe" class="row pt-1 px-4" style="position: relative; top: -100px;">
                        <?php
                        $query = mysqli_query($conn, "select * from recipes where user_id ='$id'");

                        while ($data = mysqli_fetch_array($query)) {
                            $recipe_id = $data['recipe_id'];
                            $count = 0;
                            $rate = 0;

                            $query_rate = "SELECT * FROM ratings WHERE recipe_id = '$recipe_id';";
                            $sql_rate = mysqli_query($conn, $query_rate);
                            while ($result4 = mysqli_fetch_assoc($sql_rate)) {
                                $rating = $result4['rating'];
                                $rate += $rating;
                                $count++;
                            }

                            $jumlah = 0;

                            $query_coms = "SELECT * FROM comments WHERE recipe_id = '$recipe_id';";
                            $sql_coms = mysqli_query($conn, $query_coms);
                            while ($result4 = mysqli_fetch_assoc($sql_coms)) {
                                $jumlah++;
                            }
                            if ($count > 0) {
                                $ratings = $rate / $count;
                                $ratings = number_format($rating, 1);

                            }

                            ?>
                            <div class="col-md-6 col-sm-12">
                                <div class="card border-secondary m-2 my-3 card-post" id="<?php echo $data['recipe_id']; ?>"
                                    style="height: 560px">
                                    <div class="card-header">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-6">
                                                    <?php echo $data['category'] ?>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <?php
                                                    if ($count > 0) {
                                                        echo "<i class='fa-solid fa-star'></i> " . $ratings;
                                                    } else {
                                                        echo "not yet rated";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <img src="<?php echo $data['main_image'] ?>" alt=""
                                            style="width: 100%; height: 240px; object-fit: cover; object-position: center;">
                                        <div style="height: 120px">
                                            <h5 class="card-title mt-2"><?php echo $data['title'] ?></h5>
                                            <hr>
                                            <p class="card-text"><?php echo $data['description'] ?></p>
                                        </div>
                                        <div class="container p-0 pt-3">
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="text-secondary">Main ingredient:
                                                        <?php echo $data['main_ingredient'] ?>
                                                    </p>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <a href="fullrecipe.php?lihat=<?php echo $recipe_id; ?>#commentar"
                                                        style="font-family: 'Quicksand'; font-weight:600; text-decoration: none; color: black">
                                                        <?php if ($jumlah > 1) {
                                                            echo $jumlah . " comments";
                                                        } else {
                                                            echo $jumlah . " comment";
                                                        } ?>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row">
                                                <a class="btn btn-outline-dark me-2"
                                                    href="edit_recipe.php?edit=<?php echo $data['recipe_id'] ?>"
                                                    class="">Edit
                                                    Recipe</a>
                                                <a class="btn btn-outline-danger"
                                                    href="edit_recipe.php?hapus=<?php echo $data['recipe_id'] ?>"
                                                    class="">Delete</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </div>

                    <div id="savedRecipe" class="row pt-1 px-4" style="position: relative; top: -100px;">
                        <?php
                        $query = mysqli_query($conn, "select r.recipe_id, r.title, r.description, r.main_image, r.category, r.main_image, r.main_ingredient, r.created_at, u.user_id, u.username, u.id_pict from recipes r join favorites f on f.recipe_id = r.recipe_id join users u on r.user_id = u.user_id where f.user_id ='$id'");
                        while ($result = mysqli_fetch_array($query)) {
                            $recipe_id = $result['recipe_id'];
                            $count = 0;
                            $rate = 0;

                            $query_rate = "SELECT * FROM ratings WHERE recipe_id = '$recipe_id';";
                            $sql_rate = mysqli_query($conn, $query_rate);
                            while ($result4 = mysqli_fetch_assoc($sql_rate)) {
                                $rating = $result4['rating'];
                                $rate += $rating;
                                $count++;
                            }

                            $jumlah = 0;

                            $query_coms = "SELECT * FROM comments WHERE recipe_id = '$recipe_id';";
                            $sql_coms = mysqli_query($conn, $query_coms);
                            while ($result4 = mysqli_fetch_assoc($sql_coms)) {
                                $jumlah++;
                            }
                            if ($count > 0) {
                                $ratings = $rate / $count;
                                $ratings = number_format($rating, 1);

                            }
                            
                            $query_check_favorites = "SELECT * FROM favorites WHERE recipe_id = '$recipe_id' AND user_id ='$id';";
                            $result_favorites = mysqli_query($conn, $query_check_favorites);

                            ?>
                            <div class="col-12">
                                <!-- card -->
                                <div id="<?php echo $recipe_id ?>" class="card border-secondary mx-2 mt-3 mb-1 card-post"
                                    style="height: 320px">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-5 pt-4">
                                                <img src="img/<?php echo $result['main_image']; ?>" alt=""
                                                    style="width: 100%; height: 180px; object-fit: cover; object-position: center; border-radius:8px">
                                                <div class="container">
                                                    <div class="row" style="position: relative; top: -50px; border: none;">
                                                        <div class="col-6">
                                                            <img src="users/pict<?php echo $result['id_pict']; ?>.jpg"
                                                                class="img-thumbnail rounded-circle mb-1" alt="..."
                                                                width="100px">
                                                            <p style="font-size: 14px;">@<?php echo $result['username']; ?>
                                                            </p>
                                                        </div>
                                                        <div class="col-6 text-end pt-5">
                                                            <p style="font-size: 14px;" class="p-1">
                                                                <?php echo $result['created_at'] ?>
                                                            </p>

                                                            <a style="font-size: 24px; color: rgb(140, 186, 159);"
                                                                href="save.php?save=<?php echo $result['recipe_id']; ?>"
                                                                class=""><i class="<?php echo (mysqli_num_rows($result_favorites) == 0) ? "fa-regular" : "fa-solid";?> fa-bookmark me-2"></i></a>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-7 pt-4">
                                                <h5 class="card-title mt-2"><?php echo $result['title']; ?></h5>
                                                <hr>
                                                <p class="card-text"><?php echo $result['description']; ?>
                                                </p>
                                                <div class="d-flex flex-wrap">
                                                    <button
                                                        class="btn btn-outline-warning me-3 mb-3"><?php echo $result['category']; ?></button>
                                                    <button
                                                        class="btn btn-outline-dark me-3 mb-3"><?php echo $result['main_ingredient']; ?></button>
                                                </div>
                                                <div class="d-flex flex-column mt-3 text-end">
                                                    <p style="font-family: 'Quicksand'; font-weight:600;">
                                                        <?php
                                                        if ($count > 0) {
                                                            echo "<i class='fa-solid fa-star'></i> " . $ratings;
                                                        } else {
                                                            echo "not yet rated";
                                                        }
                                                        ?>
                                                    </p>
                                                    <a href="fullrecipe.php?lihat=<?php echo $recipe_id; ?>#commentar"
                                                        style="font-family: 'Quicksand'; font-weight:600; text-decoration: none; color: black">
                                                        <?php if ($jumlah > 1) {
                                                            echo $jumlah . " comments";
                                                        } else {
                                                            echo $jumlah . " comment";
                                                        } ?>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>

                <!-- right end -->
            </div>
        </div>

        <!-- java script-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#postRecipe').show();
                $('#savedRecipe').hide();

                $('#postButton').click(function () {
                    $(this).css('border-bottom', 'solid 1px black');
                    $('#savedButton').css('border-bottom', 'none');
                    $('#postRecipe').show();
                    $('#savedRecipe').hide();

                    $('#savedText').css({ 'font-weight': '400', 'color': 'gray' });
                    $('#postText').css({ 'font-weight': '700', 'color': 'black' });
                });

                $('#savedButton').click(function () {
                    $('#postButton').css('border-bottom', 'none');
                    $(this).css('border-bottom', 'solid 1px black')
                    $('#postRecipe').hide();
                    $('#savedRecipe').show();

                    $('#postText').css({ 'font-weight': '400', 'color': 'gray' });
                    $('#savedText').css({ 'font-weight': '700', 'color': 'black' });
                });


                let selectedCategory = null;
                let selectedIngredient = null;

                // Handle category click
                $(".list-group-item").click(function () {
                    $(".list-group-item").removeClass("active");
                    if (selectedCategory === $(this).attr("id")) {
                        selectedCategory = null; // Deselect if clicked again
                    } else {
                        selectedCategory = $(this).attr("id");
                        $(this).addClass("active");
                    }
                    filterResults();
                });

                // Handle ingredient click
                $(".btn-outline-dark").click(function () {
                    $(".btn-outline-dark").removeClass("active");
                    if (selectedIngredient === $(this).attr("id")) {
                        selectedIngredient = null; // Deselect if clicked again
                    } else {
                        selectedIngredient = $(this).attr("id");
                        $(this).addClass("active");
                    }
                    filterResults();
                });

                // Filter results based on selectedCategory and selectedIngredient
                function filterResults() {
                    $(".card-post").each(function () {
                        let category = $(this).find(".btn-cat").val();
                        let ingredient = $(this).find(".btn-ing").val();

                        let showByCategory = !selectedCategory || category == selectedCategory;
                        let showByIngredient = !selectedIngredient || ingredient == selectedIngredient;

                        if (showByCategory && showByIngredient) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                }

                $('.card-post').click(function () {
                    let recipe = $(this).attr("id");
                    window.location.href = `fullrecipe.php?lihat=${recipe}`;  // Menggunakan template literal
                });

            });
        </script>
</body>

</html>