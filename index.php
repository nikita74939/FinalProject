<!-- lagi kupake -->
<?php
include 'koneksi.php';
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
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

<style>
    .quicksand {
        font-family: 'Quicksand';
    }
</style>

<body>
    <!-- navbar-->
    <nav class="navbar navbar-expand-lg bg-none fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" alt="" class="img-fluid" width="30" height="24">
                Beauty Recipe
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"
                            style="font-family: 'Quicksand';">Home</a>
                    </li>
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>
                                <a class='nav-link quicksand' href='explore.php' style='font-family: 'Quicksand';'>Explore</a>
                                </li>
                                <li class='nav-item'>
                                    <a class='nav-link quicksand' href='uploud.php' style='font-family: 'Quicksand';'>Uploud Recipe</a>
                                </li>";
                    } else {
                        echo "<li class='nav-item'>
                                <a class='nav-link quicksand' href='#login' style='font-family: 'Quicksand';'>Explore</a>
                                </li>
                                <li class='nav-item'>
                                    <a class='nav-link quicksand' href='#login' style='font-family: 'Quicksand';'>Uploud Recipe</a>
                                </li>";
                    }
                    ?>
                </ul>
                <?php
                if (isset($_SESSION['username'])) {
                    $q = "SELECT * FROM users WHERE username = '$username'";
                    $query = mysqli_query($conn, $q);
                    if ($query) {
                        while ($data = mysqli_fetch_array($query)) {
                            echo "<span class='navbar-text icnn' id='sudahLogin'>
                                <a href='profil.php' class='me-3'>
                                    <img src='users/pict" . $data['id_pict'] . ".jpg' alt='' class='img-fluid align-top me-1 rounded-circle' width='40' height='20'>
                                </a>
                            </span>";
                        }
                    }
                } else {
                    echo "<span class='navbar-text icnn' id='belumLogin'>
                            <a href='#login' class='me-3'>
                                <img src='img/user.png' alt='' class='img-fluid align-top me-1' width='25' height='20'>
                            </a>
                        </span>";
                }
                ?>
            </div>
        </div>
    </nav>
    <!-- navbar end-->

    <!-- hero -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 d-flex align-items-center">
                    <div class="mx-3">
                        <h1>Glow Up<br><span style="font-size: 4rem; color:darkslategray;">Naturally</span></h1>
                        <h6 class="pt-2">Dive into DIY Beauty Recipes Made from Everyday Ingredients! Create Your Own,
                            Feel the Vibe, and Embrace Your Unique Glow!</h6>
                        <a href="#login" class="btn btn-outline-dark mt-3"
                            style="background-color: rgb(140, 186, 159);">Explore Now !</a>
                    </div>
                </div>
                <div class="col-6 text-end">
                    <img src="img/main_image.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <!-- hero end -->

    <!-- content -->
    <div class="content" style="text-align: center;">
        <div class="container mx-5">
            <div class="row mx-5">
                <div class="col-4">
                    <div class="card mx-3 pb-3" style="background-color: white">
                        <img src="img/satu.png" class="card-img-top pt-3" width="50%" alt="..."
                            style="padding-left:70px; padding-right:70px;">
                        <div class="card-body">
                            <h5 class="card-title">Step #1 Find Recipes</h5>
                            <hr>
                            <p class="card-text" style="font-family: 'Quicksand';">explore our collection of beauty
                                recipes crafted with natural ingredients and effective formulas. </p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mx-3 pb-3" style="background-color: white">
                        <img src="img/dua.png" class="card-img-top pt-3" width="50%" alt="..."
                            style="padding-left:70px; padding-right:70px;">
                        <div class="card-body">
                            <h5 class="card-title">Step #2 Make Your Own</h5>
                            <hr>
                            <p class="card-text" style="font-family: 'Quicksand';">customize each recipe to make it
                                uniquely yours!<br>
                            <p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mx-3 pb-3" style="background-color: white">
                        <img src="img/tiga.png" class="card-img-top pt-3" width="50%" alt="..."
                            style="padding-left:70px; padding-right:70px;">
                        <div class="card-body">
                            <h5 class="card-title">Step #3 Glow Up</h5>
                            <hr>
                            <p class="card-text" style="font-family: 'Quicksand';">get ready into your creation and
                                enjoy the glow!<br> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content end -->

    <!-- most populer -->
    <div class="populer p-5">
        <h1 class="py-5">Most Popular Recipe</h1>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div id="...." class="card border-secondary mx-2 my-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-5 pt-4">
                                    <img src="users/pict1.jpeg" alt=""
                                        style="width: 100%; height: 180px; object-fit: cover; object-position: center; border-radius:8px">
                                    <div class="container">
                                        <div class="row" style="position: relative; top: -50px; border: none;">
                                            <div class="col-6">
                                                <img src="users/pict1.jpeg" class="img-thumbnail rounded-circle mb-1"
                                                    alt="..." width="100px">
                                                <p style="font-size: 14px;">@cherrygirl</p>
                                            </div>
                                            <div class="col-6 text-end pt-5">
                                                <p style="font-size: 14px;" class="p-1">10 Nov</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-7 pt-4">
                                    <h5 class="card-title mt-2">🌙 Lunar Glow Mask 🌙</h5>
                                    <hr>
                                    <p class="card-text">Calling all moon babes! ✨ Get your glow on with this
                                        creamy,
                                        soothing mask. Perfect buat yang butuh calming ritual di malam hari 💫🌌
                                    </p>
                                    <div class="d-flex flex-wrap">
                                        <button class="btn btn-outline-warning me-3 mb-3">Face Mist</button>
                                        <button class="btn btn-outline-dark me-3 mb-3">Markisa</button>
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
                <div class="col-4 pb-5 ps-5 text-end">
                    <img src="img/popular.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <!-- most populer end -->

    <!-- login -->
    <div class="login p-5 mb-5 align-middle" id="login" style="display: block">
        <div class="card m-5">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-7 p-5 text-center">
                            <img src="img/login_girl.png" alt="" class="img-fluid" style="transform: scaleX(-1);"
                                width="70%">
                            <p>"Let's log in first to get things started!"</p>
                        </div>
                        <div class="col-5 p-4">
                            <h4 style="font-family: 'Quicksand'; font-weight: 400; text-align: center">Login to</h4>
                            <h2 style="text-align: center">Beauty Recipe</h2>

                            <form action="cek_login.php" method="post" class="mt-5 px-5">
                                <div class="my-2">
                                    <label for="" class="form-label text-start ms-1"
                                        style="font-family: 'Quicksand';">Username</label>
                                    <input type="text" class="form-control rounded-pill" name="username"
                                        id="usernameLogin" placeholder="Username" style="font-family: 'Quicksand';">
                                    <?php
                                    if (isset($_GET['pesan'])) {
                                        if ($_GET['pesan'] == "user_tidak_ditemukan") {
                                            echo "<div id='usernameHelp' class='form-text' style='font-family: 'Quicksand'; color: red;'>Username not found.</div>";
                                        } else {
                                            echo "<br>";
                                        }
                                    } else {
                                        echo "<br>";
                                    }
                                    ?>

                                </div>
                                <div class="my-3">
                                    <label for="" class="form-label ms-1"
                                        style="font-family: 'Quicksand';">Password</label>
                                    <input type="password" class="form-control rounded-pill" name="password"
                                        id="passwordLogin" placeholder="Password" style="font-family: 'Quicksand';">
                                    <?php
                                    if (isset($_GET['pesan'])) {
                                        if ($_GET['pesan'] == "user_tidak_ditemukan") {
                                            echo "<div id='usernameHelp' class='form-text' style='font-family: 'Quicksand'; color: red;'>Wrong password.</div>";
                                        } else {
                                            echo "<br>";
                                        }
                                    } else {
                                        echo "<br>";
                                    }
                                    ?>
                                </div>

                                <div style="text-align: center">
                                    <input type="submit" class="btn btn-outline-dark mt-3" value="LOGIN"
                                        style="background-color: rgb(140, 186, 159);">

                                </div>

                                <p class="pt-5" style="font-family: 'Quicksand'; font-weight: 400; font-size: 14px">
                                    Haven't an account? Register <a href="#regist" class="registLink">here</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login end -->

    <?php 
        $q = "SELECT * FROM users";
        $query = mysqli_query($conn, $q);
        if ($query) {
            $i =0;
            while ($data = mysqli_fetch_array($query)) { ?>
            <input type="hidden" class="cek-user" id="user<?php echo $i?>" value="<?php echo $data['username'] ?>">
            
    <?php $i++;}} ?>
    
    <!-- regist -->
    <div class="register my-5" id="regist" style="display: none">
        <div class="card m-5">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-7 p-5 text-center">
                            <img src="img/regist_girl.png" alt="" class="img-fluid" style="transform: scaleX(-1);"
                                width="60%">
                            <p class="pt-5 align-bottom"
                                style="font-family: 'Quicksand'; font-weight: 400; font-size: 14px">
                                Already have an account? Login <a href="#login" class="loginLink">here</a></p>
                        </div>
                        <div class="col-5 p-4">
                            <h2 style="text-align: center">Beauty Recipe</h2>

                            <form action="regist.php" method="post" class="mt-5 px-5" id="registrationForm">
                                <div class="my-2">
                                    <label for="" class="form-label text-start ms-1"
                                        style="font-family: 'Quicksand';">Username</label>
                                    <input type="text" class="form-control rounded-pill" name="username"
                                        id="usernameRegist" placeholder="Username" style="font-family: 'Quicksand';">
                                    <div id="usernameHelpR" class="form-text text-danger"
                                        style="font-family: 'Quicksand';">
                                        Username already used.
                                    </div>
                                </div>
                                <div class="my-4">
                                    <label for="" class="form-label ms-1"
                                        style="font-family: 'Quicksand';">Password</label>
                                    <input type="password" class="form-control rounded-pill" name="password"
                                        id="passwordRegist" placeholder="Password" style="font-family: 'Quicksand';">
                                    <div id="passwordHelpR" class="form-text text-danger"
                                        style="font-family: 'Quicksand';">
                                        Your password must be 8-20 characters long.
                                    </div>
                                </div>
                                <div class="my-4">
                                    <label for="" class="form-label ms-1" style="font-family: 'Quicksand';">Confirm
                                        Password</label>
                                    <input type="password" class="form-control rounded-pill" id="confirmPassword"
                                        placeholder="Confirm Password" style="font-family: 'Quicksand';">
                                    <div id="ConfirmPasswordHelpR" class="form-text text-danger"
                                        style="font-family: 'Quicksand';">
                                        Passwords do not match.
                                    </div>
                                </div>
                                <div style="text-align: center">
                                    <input type="submit" class="btn btn-outline-dark mt-3" value="Create an account"
                                        style="background-color: rgb(140, 186, 159);">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- regist end -->

    <footer class="px-4 pt-4">
        <div class="container">
            <h4 class="pt-3" style="font-family: 'Playfair Display'; font-weight: 400;">DIY Beauty Recipe Sharing
            </h4>
            <div class="row my-4 pb-5">
                <div class="col-4">
                    <h6 class="my-2">MENU</h6>
                    <p class="my-2" style="font-family: 'Quicksand';">Home</p>
                    <p class="my-2" style="font-family: 'Quicksand';">Explore</p>
                    <p class="my-2" style="font-family: 'Quicksand';">Uploud</p>
                </div>
                <div class="col-4">

                </div>
                <div class="col-4">

                </div>
            </div>
        </div>
        <div class="mt-5 p-2">
            halo
        </div>
    </footer>

    <!-- java script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.login').show();
            $('#regist').hide();

            if ($('#sudahLogin').length) {
                $('.login').hide();
                $('#regist').hide();
            }

            $(document).on('click', '.registLink', function (e) {
                e.preventDefault();
                $(".login").hide();
                $("#regist").show();
            });

            $(document).on('click', '.loginLink', function (e) {
                e.preventDefault();
                $(".login").show();
                $("#regist").hide();
            });

            $("#usernameHelpR").hide();
            $("#passwordHelpR").hide();
            $("#ConfirmPasswordHelpR").hide();
            
            $('#usernameRegist').on('input', function () {
                var username = $('#usernameRegist').val();
                let i = 0;
                let count = 0;

                while ($('#user' + i).val()) {
                    let userValue = $('#user' + i).val(); 
                    if (username === userValue) {
                        $('#usernameHelpR').show();
                        count++;
                    }
                    i++;
                }

                if (count === 0) {
                    $('#usernameHelpR').hide();
                }
            });


            $('#confirmPassword').on('click', function(){
                $('#confirmPassword').on('input', function(){
                    var pass  = $('#passwordRegist').val();
                    var cpass = $('#confirmPassword').val();
                    if (cpass != pass) {
                        $('#ConfirmPasswordHelpR').show();
                    } else {
                        $('#ConfirmPasswordHelpR').hide();
                    }
                })
            });

        
        });
    </script>
</body>

</html>