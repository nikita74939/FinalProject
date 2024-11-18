<!-- kurang: rate, com, filter -->
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
        $pict_id = $data['id_pict'];
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
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
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
                                    <li class="list-group-item" style="border: none; color: rgb(140, 186, 159);">
                                        <h6>Explore</h6>
                                    </li>
                                </a>
                                <a href="uploud.php" style="text-decoration: none; color: black">
                                    <li class="list-group-item" style="border: none">
                                        <h6>Uploud</h6>
                                    </li>
                                </a>
                                <a href="profil.php" style="text-decoration: none; color: black">
                                    <li class="list-group-item" style="border: none">
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


            <div class="col-7">
                <!-- card -->
                <div class="container pt-4">
                    <div class="row text-center">
                        <div class="col-12" style="border-bottom: solid 1px black;">
                            <a href="#popularRecipe" id="popularButton"></a>
                            <p style="font-weight: 600; color: black; font-family: 'Quicksand'; font-size: 20px">DIY
                                Recipes
                            </p>
                        </div>
                        <hr>
                        <?php if (isset($_GET['pesan'])) {
                            if (($_GET['pesan']) == "udah_login") { ?>
                                <div class="row m-3 mx-4 text-center">
                                <p style="color: black;">"Welcome back <span style="font-style: italic;">@<?php echo $username; ?></span>. Ready to explore some magic?"</p>
                                </div>
                            <?php } else {?>
                                <div class="row m-3 mx-4 text-center">
                                    <p style="color: black">"Yay! Recipe uploaded successfully, ready to be tried!"</p>
                                </div>
                        <?php }} ?>

                    </div>
                    <div class="row group-card">
                        <?php
                        while ($result = mysqli_fetch_assoc($sql)) {
                            $recipe_id = $result['recipe_id'];
                            $id = $result['user_id'];
                            $query_profil = "SELECT * FROM users WHERE user_id = '$id'";
                            $sql_profil = mysqli_query($conn, $query_profil);
                            while ($result2 = mysqli_fetch_assoc($sql_profil)) {
                                $id_pict = $result2['id_pict'];
                                $username = $result2['username'];
                            }

                            $count = 0;
                            $rate = 0;

                            $query_rate = "SELECT * FROM ratings WHERE recipe_id = '$recipe_id';";
                            $sql_rate = mysqli_query($conn, $query_rate);
                            while ($result4 = mysqli_fetch_assoc($sql_rate)) {
                                $rating = $result4['rating'];
                                $rate += $rating;
                                $count++;
                            }

                            if ($count > 0) {
                                $ratings = $rate / $count;
                                $ratings = number_format($ratings, 1);
                            }

                            $jumlah = 0;

                            $query_coms = "SELECT * FROM comments WHERE recipe_id = '$recipe_id';";
                            $sql_coms = mysqli_query($conn, $query_coms);
                            while ($result5 = mysqli_fetch_assoc($sql_coms)) {
                                $jumlah++;
                            }

                            $query_check_favorites = "SELECT * FROM favorites WHERE recipe_id = '$recipe_id' AND user_id ='$id_acc';";
                            $result_favorites = mysqli_query($conn, $query_check_favorites);

                            ?>

                            <div class="card border-secondary mx-2 my-3 card-post" id="<?php echo $result['recipe_id']; ?>">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-5 pt-4">
                                            <img src="img/<?php echo $result['main_image']; ?>" alt=""
                                                style="width: 100%; height: 180px; object-fit: cover; object-position: center; border-radius:8px">
                                            <div class="container">
                                                <div class="row" style="position: relative; top: -50px; border: none;">
                                                    <div class="col-6">
                                                        <img src="users/pict<?php echo $id_pict ?>.jpg"
                                                            class="img-thumbnail rounded-circle mb-1" alt="..."
                                                            width="100px">
                                                        <p class="text-nowrap" style="font-size: 14px;">
                                                            @c<?php echo $username ?>l</p>
                                                    </div>
                                                    <div class="col-6 text-end pt-5">
                                                        <p style="font-size: 14px;" class="p-1">
                                                            <?php echo $result['created_at'] ?>
                                                        </p>
                                                        <a style="font-size: 24px; color: rgb(140, 186, 159);"
                                                            href="explore.php?save=<?php echo $result['recipe_id']; ?>&user_id=<?php echo $pict_id; ?>"
                                                            class=""><i
                                                                class="<?php echo (mysqli_num_rows($result_favorites) == 0) ? "fa-regular" : "fa-solid"; ?> fa-bookmark"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7 pt-4" >
                                            <h5 class="card-title mt-2"><?php echo $result['title']; ?></h5>
                                            <hr>
                                            <p class="card-text" style="min-height: 60px"><?php echo $result['description']; ?></p>
                                            <div class="d-flex flex-wrap">
                                                <button class="btn btn-outline-warning me-3 mb-3 btn-cat"
                                                    value="<?php echo $result['category']; ?>">
                                                    <?php echo $result['category']; ?>
                                                </button>
                                                <button class="btn btn-outline-dark me-3 mb-3 btn-ing"
                                                    value="<?php echo $result['main_ingredient']; ?>">
                                                    <?php echo $result['main_ingredient']; ?>
                                                </button>
                                            </div>
                                            <div class="d-flex flex-column mt-3 text-end">
                                                <p style="font-family: 'Quicksand'; font-weight:500;">
                                                    <?php
                                                    if ($count > 0) {
                                                        echo "<i class='fa-solid fa-star'></i> " . $ratings;
                                                    } else {
                                                        echo "not yet rated";
                                                    }
                                                    ?>
                                                </p>
                                                <a href="fullrecipe.php?lihat=<?php echo $recipe_id; ?>#commentar"
                                                    style="font-family: 'Quicksand'; font-weight:500; color: black; text-decoration: none">
                                                    <?php
                                                    if ($jumlah > 1) {
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
                            <?php
                        }
                        ?>
                    </div>

                </div>
            </div>

            <!-- middle end -->

            <!-- right -->

            <div class="col-3 sticky-top" style="height: 100vh;">
                <div class="pt-4">
                    <h5 class="ps-3" style="font-family: 'Quicksand';">Filter by</h5>
                    <div class="mx-3 mt-4">
                        <h6>Categorie</h6>
                        <hr>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="font-family: 'Quicksand';" id="facemaskButton"
                                value="Face Mask">Face Mask</li>
                            <li class="list-group-item" style="font-family: 'Quicksand';" id="facescrubButton"
                                value="Face Scrub">Face Scrub</li>
                            <li class="list-group-item" style="font-family: 'Quicksand';" id="facemistButton"
                                value="Face Mist">Face Mist</li>
                            <li class="list-group-item" style="font-family: 'Quicksand';" id="lipButton"
                                value="Lip Care">Lip Care</li>
                            <li class="list-group-item" style="font-family: 'Quicksand';" id="hairButton"
                                value="Hair Care">Hair Care</li>
                        </ul>

                    </div>
                    <div class="mx-3 mt-4">
                        <h6>Main ingredient</h6>
                        <hr>
                        <div class="d-flex flex-wrap">
                            <button class="btn btn-outline-dark me-3 mb-3" id="honeyButton" value="Honey">Honey</button>
                            <button class="btn btn-outline-dark me-3 mb-3" id="aloeButton" value="Aloe Vera Gel">Aloe
                                Vera Gel</button>
                            <button class="btn btn-outline-dark me-3 mb-3" id="cocoOilButton"
                                value="Coconut Oil">Coconut Oil</button>
                            <button class="btn btn-outline-dark me-3 mb-3" id="greenTeaButton" value="Green Tea">Green
                                Tea</button>
                            <button class="btn btn-outline-dark me-3 mb-3" id="yogurtButton"
                                value="Yogurt">Yogurt</button>
                            <button class="btn btn-outline-dark me-3 mb-3" id="turmericButton"
                                value="Turmeric">Turmeric</button>
                            <button class="btn btn-outline-dark me-3 mb-3" id="oatmealButton"
                                value="Oatmeal">Oatmeal</button>
                        </div>
                    </div>
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

            // simpan posisi scroll di localStorage
            window.addEventListener("beforeunload", function () {
                localStorage.setItem("scrollPosition", window.scrollY);
            });

            // kembalikan posisi scroll setelah halaman dimuat
            window.addEventListener("load", function () {
                const scrollPosition = localStorage.getItem("scrollPosition");
                if (scrollPosition) {
                    window.scrollTo(0, parseInt(scrollPosition, 10));
                }
            });


        });
    </script>
</body>

</html>