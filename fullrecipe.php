<!-- lagi digarap!!!! -->

<?php
include 'koneksi.php';
session_start();

if (empty($_SESSION['username'])) {
    header("location:index.php?pesan=belum_login");
} else if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

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
    $jumlah ++;
}

$ratings = $rate / $count;
$ratings = number_format($rating, 1);
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

<style>
</style>

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

                    <div class="row fixed-bottom ps-2">
                        <div class="col-2 pt-3" style="background-color: rgb(140, 186, 159);">
                            <a href="logout.php" style="color: black" class="mt-2">
                                <h6 class="ps-5 pb-3">Logout</h6>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            <!-- left end -->

            <!-- detail -->
            <?php
            while ($result = mysqli_fetch_assoc($sql)) {
                $recipe_id = $result['recipe_id'];
                $user_id = $result['user_id'];

                $query_profil = "SELECT * FROM users WHERE user_id = '$user_id';";
                $sql_profil = mysqli_query($conn, $query_profil);
                while ($result2 = mysqli_fetch_assoc($sql_profil)) {
                    $id_pict = $result2['id_pict'];
                    $usernamee = $result2['username'];
                    $nama = $result2['nama'];
                }
                
                $myrate = NULL;
                $query_myrate = "SELECT * FROM ratings r join users u on u.user_id = r.user_id WHERE u.username = '$username' and r.recipe_id = '$recipe_id';";
                $sql_myrate = mysqli_query($conn, $query_myrate);
                while ($result9 = mysqli_fetch_assoc($sql_myrate)) {
                    $myrate = $result9['rating'];
                }
                ?>
                <div class="col-7">
                    <div class="pt-4">
                        <h4 class="ps-3" style="font-family: 'Quicksand';"><i
                                class="fa-solid fa-chevron-left me-4 pb-2 back-icon"></i>Recipe</h4>
                    </div>
                    <div id="...." class="card border-secondary m-2 my-3 pb-5 pe-1">
                        <div class="card-header">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <?php echo $result['category']; ?>
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
                            <div class="row">
                                <div class="col-7">
                                    <img src="<?php echo $result['main_image']; ?>" alt=""
                                        style="width: 100%; height: 240px; object-fit: cover; object-position: center;">
                                </div>
                                <div class="col-5">
                                    <div class="row">
                                        <div class="col-5">
                                            <img src="users/pict<?php echo $id_pict ?>.jpg"
                                                class="img-thumbnail rounded-circle mb-1" alt="..." width="100px">
                                        </div>
                                        <div class="col-7 pt-3">
                                            <h6 style="font-size: 20px; font-weight: 600"><?php echo $nama; ?></h6>
                                            <p class="text-nowrap" style="font-size: 14px;">@c<?php echo $usernamee ?>l</p>
                                        </div>

                                    </div>
                                    <div class="card mt-3" style="border: none">
                                        <div class="row mt-0 mb-0 me-1 text-center">
                                            <p class="">Rate this!</p>

                                        </div>

                                        <div class="row text-center mx-5 mb-3 justify-content-center">
                                            <button class="col-2 rate-button bg-white" data-rate="1">
                                                <i class="<?php if($myrate >= 1)  { echo "fa-solid"; } else { echo "fa-regular"; } ?> fa-star bg-white"
                                                    style="display: inline-flex; border:none"></i>
                                            </button>
                                            <!-- Bintang 2 -->
                                            <button class="col-2 rate-button bg-white" data-rate="2">
                                                <i class="<?php if($myrate >= 2)  { echo "fa-solid"; } else { echo "fa-regular"; } ?> fa-star" style="display: inline-flex; border:none"></i>
                                            </button>
                                            <!-- Bintang 3 -->
                                            <button class="col-2 rate-button bg-white" data-rate="3">
                                                <i class="<?php if($myrate >= 3)  { echo "fa-solid"; } else { echo "fa-regular"; } ?> fa-star" style="display: inline-flex; border:none"></i>
                                            </button>
                                            <!-- Bintang 4 -->
                                            <button class="col-2 rate-button bg-white" data-rate="4">
                                                <i class="<?php if($myrate >= 4)  { echo "fa-solid"; } else { echo "fa-regular"; } ?> fa-star" style="display: inline-flex; border:none"></i>
                                            </button>
                                            <!-- Bintang 5 -->
                                            
                                            <button class="col-2 rate-button bg-white" data-rate="5">
                                                <i class="<?php if($myrate >= 5)  { echo "fa-solid"; } else { echo "fa-regular"; } ?> fa-star" style="display: inline-flex; border:none"></i>
                                            </button>
                                            
                                            
                                        </div>
                                        <?php if(!($myrate))  { ?>
                                        <button class="btn btn-outline-dark"
                                        style="font-family: 'Quicksand'; font-weight: 600; background-color: rgb(140, 186, 159);">Send
                                        <i class="fa-regular fa-paper-plane"></i></button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title mt-2"><?php echo $result['title']; ?></h5>
                            <hr>
                            <p class="card-text"><?php echo $result['description']; ?></p>
                            <p class="text-secondary">Bahan utama: <?php echo $result['main_ingredient']; ?></p>
                            <hr>
                            <?php echo $result['ingredient']; ?>
                            <hr>
                            <?php echo $result['step']; ?>
                            <div class="container p-0 pt-3">
                                <div class="row">
                                    <div class="col-6">
                                    </div>
                                    <div class="col-6 text-end">
                                        <a href="fullrecipe.php#commentar"
                                            style="font-family: 'Quicksand'; font-weight:600; text-decoration: none; color: black"><?php echo $jumlah ?>
                                            commentar</a>
                                    </div>
                                </div>
                            </div>

                            <div class="mx-3 mt-4 comments">
                                <form action="" method="POST">
                                    <div class="row">
                                        <div class="col-10">
                                            <input name="comment_text" id="comment_text" type="text"
                                                placeholder="Add comment..." class="form-control"
                                                style="font-family: 'Quicksand'; font-weight:600;">
                                        </div>
                                        <div class="col-1">
                                            <button type="submit" name="aksiComment" value="add"
                                                class="btn btn-outline-dark"
                                                style="font-family: 'Quicksand'; font-weight: 600; background-color: rgb(140, 186, 159);">add</button>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                while ($result_comment = mysqli_fetch_assoc($sql_comment)) {
                                    $query_pc = "SELECT * FROM users WHERE username = '$username';";
                                    $sql_pc = mysqli_query($conn, $query_pc);
                                    while ($result5 = mysqli_fetch_assoc($sql_pc)) {
                                        $pict = $result5['id_pict'];
                                        $nama = $result5['nama'];
                                    }
                                    ?>
                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-2 text-nowrap">
                                                    <img src="users/pict<?php echo $pict ?>.jpg"
                                                        class="img-thumbnail rounded-circle mb-1" alt="..." width="50px" style="border:none">
                                                </div>
                                                <div class="col-6" style="position: relative; left: -50px">
                                                    <p style="font-family: 'Quicksand'; font-size: 14px; font-weight: 500;"><?php echo $nama ?></p>
                                                    <p style="font-size: 12px; position: relative; top: -15px">@<?php echo $username ?></p>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <p style="font-family: 'Quicksand'; font-size: 12px"><?php echo $result_comment['created_at']; ?></h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <p><?php echo $result_comment['comment_text']; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
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
        $(".back-icon").on("click", function () {
            window.history.back();
        });
    });
    </script>
</body>

</html>
