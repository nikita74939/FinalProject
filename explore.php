<!-- lagi ku kerjain -->
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
        $pict_id = $data['id_pict'];
    }
}

$query = "SELECT * FROM recipes";
$sql = mysqli_query($conn, $query);

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
                    <ul class="list-group list-group-flush my-4">
                        <a href="index.php" style="text-decoration: none; color: black">
                            <li class="list-group-item" style="border: none">
                                <h6>Home</h6>
                            </li>
                        </a>
                        <a href="explore.php" style="text-decoration: none; color: black">
                            <li class="list-group-item" style="border: none">
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

                    <div class="fixed-bottom">
                        <a href="logout.php" style="color: black">
                            <h6 class="ps-5 pb-3">Logout</h6>
                        </a>
                    </div>
                </div>
            </div>

            <!-- left end -->

            <!-- middle -->
            <!-- disini kutaruh while buat nampilin semua recipe tapi file img buat recipenya blm ada di folder jadi ga keluar gambarnya -->
            <div class="col-7">
                <!-- card -->
                <div class="container pt-4">
                    <div class="row text-center">
                        <div class="col-6" style="border-bottom: solid 1px black;">
                            <a href="#popularRecipe" id="popularButton"></a>
                            <p style="font-weight: 700; color: black; font-family: 'Quicksand'; font-size: 20px">Popular
                            </p>
                        </div>
                        <div class="col-6" style="border-bottom: none;">
                            <a href="#latestRecipe" id="latestButton"></a>
                            <p style="font-weight: 400; color: gray; font-family: 'Quicksand'; font-size: 20px">Latest
                            </p>
                        </div>
                        <hr>
                    </div>
                    <?php
                    while ($result = mysqli_fetch_assoc($sql)) {
                        ?>
                        <div class="row group-card">
                            <div class="card border-secondary mx-2 my-3 card-post">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-5 pt-4">
                                            <img src="img/<?php echo $result['main_image']; ?>" alt=""
                                                style="width: 100%; height: 180px; object-fit: cover; object-position: center; border-radius:8px">
                                            <div class="container">
                                                <div class="row" style="position: relative; top: -50px; border: none;">
                                                    <div class="col-6">
                                                        <img src="users/pict1.jpeg"
                                                            class="img-thumbnail rounded-circle mb-1" alt="..."
                                                            width="100px">
                                                        <p style="font-size: 14px;">@cherrygirl</p>
                                                    </div>
                                                    <div class="col-6 text-end pt-5">
                                                        <p style="font-size: 14px;" class="p-1">10 Nov</p>
                                                        <a href="save.php?save=<?php echo $result['recipe_id']; ?>"
                                                            class="">Favorites</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7 pt-4">
                                            <h5 class="card-title mt-2"><?php echo $result['title']; ?></h5>
                                            <hr>
                                            <p class="card-text"><?php echo $result['description']; ?></p>
                                            <div class="d-flex flex-wrap">
                                                <button class="btn btn-outline-warning me-3 mb-3 btn-cat"
                                                    value="<?php echo strtolower($result['category']); ?>">
                                                    <?php echo $result['category']; ?>
                                                </button>
                                                <button class="btn btn-outline-dark me-3 mb-3 btn-ing"
                                                    value="<?php echo strtolower($result['main_ingredient']); ?>">
                                                    <?php echo $result['main_ingredient']; ?>
                                                </button>
                                            </div>
                                            <div class="d-flex flex-column mt-3 text-end">
                                                <p style="font-family: 'Quicksand'; font-weight:600;">
                                                    <i class="fa-regular fa-star"></i> 4
                                                </p>
                                                <a href="fullrecipe.php#commentar"
                                                    style="font-family: 'Quicksand'; font-weight:600; text-decoration: none">
                                                    9 commentar
                                                </a>
                                            </div>
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


            <!-- middle end -->

            <!-- detail -->
            <div class="col-7" style="display: none">
                <div class="pt-4">
                    <h4 class="ps-3" style="font-family: 'Quicksand';"><i
                            class="fa-solid fa-chevron-left me-4 pb-2"></i>Recipe</h4>
                </div>
                <div id="...." class="card border-secondary m-2 my-3">
                    <div class="card-header">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    Face mist
                                </div>
                                <div class="col-6 text-end">
                                    bintang 4,5
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <img src="users/pict1.jpeg" alt=""
                            style="width: 100%; min-height: 240px; object-fit: cover; object-position: center;">
                        <h5 class="card-title mt-2">🌙 Lunar Glow Mask 🌙</h5>
                        <hr>
                        <p class="card-text">Calling all moon babes! ✨ Get your glow on with this creamy,
                            soothing mask. Perfect buat yang butuh calming ritual di malam hari 💫🌌</p>
                        <div class="container p-0 pt-3">
                            <div class="row">
                                <div class="col-6">
                                    <p class="text-secondary">Bahan utama: pisang</p>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="fullrecipe.php#commentar"
                                        style="font-family: 'Quicksand'; font-weight:600; text-decoration: none">9
                                        commentar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- right -->

            <div class="col-3 sticky-top" style="height: 100vh;">
                <div class="pt-4">
                    <h5 class="ps-3" style="font-family: 'Quicksand';">Filter by</h5>
                    <div class="mx-3 mt-4">
                        <h6>Categorie</h6>
                        <hr>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="font-family: 'Quicksand';" id="facemaskButton"
                                value="Face Mask">Face Mask
                            </li>
                            <li class="list-group-item" style="font-family: 'Quicksand';" id="facescrubButton">Face
                                Scrub</li>
                            <li class="list-group-item" style="font-family: 'Quicksand';" id="facemiskButton">Face Mist
                            </li>
                            <li class="list-group-item" style="font-family: 'Quicksand';" id="lipButton"
                                value="Lip Care">Lip Care</li>
                            <li class="list-group-item" style="font-family: 'Quicksand';" id="hairButton">Hair Care</li>
                        </ul>
                    </div>
                    <div class="mx-3 mt-4">
                        <h6>Main ingredient</h6>
                        <hr>
                        <div class="d-flex flex-wrap">
                            <button class="btn btn-outline-dark me-3 mb-3" id="honeyButton">Honey</button>
                            <button class="btn btn-outline-dark me-3 mb-3" id="aloeButton">Aloe Vera Gel</button>
                            <button class="btn btn-outline-dark me-3 mb-3" id="cocoOilButton">Coconut Oil</button>
                            <button class="btn btn-outline-dark me-3 mb-3" id="greenTeaButton">Green Tea</button>
                            <button class="btn btn-outline-dark me-3 mb-3" id="yogurtButton">Yogurt</button>
                            <button class="btn btn-outline-dark me-3 mb-3" id="turmericButton">Turmeric</button>
                            <button class="btn btn-outline-dark me-3 mb-3" id="honeyButton"
                                value="oatmeal">Oatmeal</button>
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

                    let showByCategory = !selectedCategory || category === selectedCategory;
                    let showByIngredient = !selectedIngredient || ingredient === selectedIngredient;

                    if (showByCategory && showByIngredient) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

        });
    </script>
</body>

</html>

<!--
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
    while ($result = mysqli_fetch_assoc($sql)) {
        ?>
        <img src="img/<?php echo $result['main_image']; ?>" alt="foto" style="width: 100px;" />
        <h3><?php echo $result['title']; ?></h3>
        <p><?php echo $result['description']; ?></p>
        <a href="fullrecipe.php?lihat=<?php echo $result['recipe_id']; ?>">full recipe</a>
        <br>
    <?php
    }
    ?>
</body>
</html>
    -->