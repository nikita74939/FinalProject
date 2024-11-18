<?php
include 'koneksi.php';
session_start();

$username = $_SESSION['username'] ?? null;

if ($username) {
    $q = "SELECT id_pict FROM users WHERE username = '$username'";
    $query = mysqli_query($conn, $q);
    if ($query) {
        $data = mysqli_fetch_array($query);
        $id_pict = $data['id_pict'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Recipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400..900&family=Poppins:wght@100..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .quicksand {
            font-family: 'Quicksand';
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-none fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand ps-3" href="#">
                Beauty Recipe
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php" style="font-family: 'Quicksand';">Home</a>
                    </li>
                    <?php
                    if ($username) {
                        echo "<li class='nav-item'><a class='nav-link quicksand' href='explore.php'>Explore</a></li>
                              <li class='nav-item'><a class='nav-link quicksand' href='uploud.php'>Uploud Recipe</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link quicksand' href='#login'>Explore</a></li>
                              <li class='nav-item'><a class='nav-link quicksand' href='#login'>Uploud Recipe</a></li>";
                    }
                    ?>
                </ul>
                <span class='navbar-text icnn' id='<?= $username ? "sudahLogin" : "belumLogin" ?>'>
                    <a href='<?= $username ? "profil.php" : "#login" ?>' class='me-3'>
                        <img src='<?= $username ? "users/pict" . $id_pict . ".jpg" : "img/user.png" ?>' alt='' class='img-fluid align-top me-1<?= $username ? " rounded-circle" : "" ?>' width='<?= $username ? "40" : "25" ?>' height='20'>
                    </a>
                </span>
            </div>
        </div>
    </nav>

    <div class="hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 d-flex align-items-center">
                    <div class="mx-3">
                        <h1>Glow Up, Babe!</h1>
                        <h6 class="pt-2">Why spend $$$ when your kitchen’s got the real tea? Whip up your own skincare potions, feel the slay, and serve that natural glow EVERYWHERE. Your skin, your vibe, your rules. PERIOD.</h6>
                        <a href="#login" class="btn btn-outline-dark mt-3" style="background-color: rgb(140, 186, 159);">Explore Now !</a>
                    </div>
                </div>
                <div class="col-6 text-end">
                    <img src="img/main_image.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <div class="content" style="text-align: center;">
        <div class="container mx-5">
            <div class="row mx-5">
                <div class="col-4">
                    <div class="card mx-3 pb-3" style="background-color: white">
                        <img src="img/satu.png" class="card-img-top pt-3" width="50%" alt="..." style="padding-left:70px; padding-right:70px;">
                        <div class="card-body">
                            <h5 class="card-title">#1 Being confused</h5>
                            <hr>
                            <p class="card-text" style="font-family: 'Quicksand';">"okay, so… what do i do first? these ingredients look cool, but like, how do i even start? is this gonna work for my skin? help pls."</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mx-3 pb-3" style="background-color: white">
                        <img src="img/dua.png" class="card-img-top pt-3" width="50%" alt="..." style="padding-left:70px; padding-right:70px;">
                        <div class="card-body">
                            <h5 class="card-title">#2 Happy</h5>
                            <hr>
                            <p class="card-text" style="font-family: 'Quicksand';">"omg i just tried my first diy recipe, and it’s SO FUN!! my skin feels soft already, and i didn’t even spend much. love this vibe 💕."</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mx-3 pb-3" style="background-color: white">
                        <img src="img/tiga.png" class="card-img-top pt-3" width="50%" alt="..." style="padding-left:70px; padding-right:70px;">
                        <div class="card-body">
                            <h5 class="card-title">#3 Excited</h5>
                            <hr>
                            <p class="card-text" style="font-family: 'Quicksand';">"guys, LISTEN!! i legit made a face mask, and my skin is glowing like never before. i’m OBSESSED. bye overpriced skincare, i’m a kitchen chemist now!!" </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="populer p-5">
        <h1 class="py-5">Most Popular Recipe</h1>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="card border-secondary mx-2 my-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-5 pt-4">
                                    <img src="img/🌙 Lunar Glow Mask 🌙.jpg" alt="" style="width: 100%; height: 180px; object-fit: cover; object-position: center; border-radius:8px">
                                    <div class="container">
                                        <div class="row" style="position: relative; top: -50px; border: none;">
                                            <div class="col-6">
                                                <img src="users/pict2.jpg" class="img-thumbnail rounded-circle mb-1" alt="..." width="100px">
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
                                    <p class="card-text">Calling all moon babes! ✨ Get your glow on with this creamy, soothing mask. Perfect for a calming ritual at night 💫🌌</p>
                                    <div class="d-flex flex-wrap">
                                        <button class="btn btn-outline-warning me-3 mb-3">Face Mask</button>
                                        <button class="btn btn-outline-dark me-3 mb-3">Banana</button>
                                    </div>
                                    <div class="d-flex flex-column mt-3 text-end">
                                        <p style="font-family: 'Quicksand'; font-weight:600;">
                                            <i class="fa-solid fa-star"></i> 4.9
                                        </p>
                                        <a href="fullrecipe.php#commentar" style="font-family: 'Quicksand'; font-weight:600; text-decoration: none; color: black">99 comments</a>
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

    <?php 
        $q = "SELECT * FROM users";
        $query = mysqli_query($conn, $q);
        if ($query) {
            $i = 0;
            while ($data = mysqli_fetch_array($query)) { ?>
                <input type="hidden" class="cek-user" id="user<?php echo $i ?>" value="<?php echo $data['username'] ?>">
                <input type="hidden" class="cek-user" id="pass<?php echo $i ?>" value="<?php echo $data['password'] ?>">
    <?php $i++; }} ?>

    <div class="login p-5 mb-5 align-middle" id="login" style="display: block">
        <div class="card m-5">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-7 p-5 text-center">
                            <img src="img/login_girl.png" alt="" class="img-fluid" style="transform: scaleX(-1);" width="70%">
                            <p>"Welcome back, girl!"</p>
                        </div>
                        <div class="col-5 p-4">
                            <h4 style="font-family: 'Quicksand'; font-weight: 400; text-align: center">Login to</h4>
                            <h2 style="text-align: center">Beauty Recipe</h2>

                            <form action="cek_login.php" method="post" class="mt-5 px-5">
                                <div class="my-2">
                                    <label for="" class="form-label text-start ms-1" style="font-family: 'Quicksand';">Username</label>
                                    <input type="text" class="form-control rounded-pill " name="username" id="usernameLogin" placeholder="Username" style="font-family: 'Quicksand';">
                                    <div id='usernameHelp' class='form-text' style="font-family:'Quicksand'; color: red;">Username not found.</div>
                                </div>
                                <div class="my-3">
                                    <label for="" class="form-label ms-1" style="font-family: 'Quicksand';">Password</label>
                                    <input type="password" class="form-control rounded-pill" name="password" id="passwordLogin" placeholder="Password" style="font-family: 'Quicksand';">
                                    <div id='passwordHelp' class='form-text' style="font-family: 'Quicksand'; color: red;">Wrong password.</div>
                                </div>
                                <div style="text-align: center">
                                    <input type="submit" class="btn btn-outline-dark mt-3" value="LOGIN" id="loginButton" style="background-color: rgb(140, 186, 159);">
                                </div>
                                <p class="pt-5" style="font-family: 'Quicksand'; font-weight: 400; font-size: 14px">Haven't an account? Register <a href="#regist" class="registLink">here</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="register my-5" id="regist" style="display: none">
        <div class="card m-5">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-7 p-5 text-center">
                            <img src="img/regist_girl.png" alt="" class="img-fluid" style="transform: scaleX(-1);" width="60%">
                            <p>"So excited you’re joining us—"</p>
                            <p class="pt-5 align-bottom" style="font-family: 'Quicksand'; font-weight: 400; font-size: 14px">Already have an account? Login <a href="#login" class="loginLink">here</a></p>
                        </div>
                        <div class="col-5 p-4">
                            <h2 style="text-align: center">Beauty Recipe</h2>
                            <form action="regist.php" method="post" class="mt-5 px-5" id="registrationForm">
                                <div class="my-2">
                                    <label for="" class="form-label text-start ms-1" style="font-family: 'Quicksand';">Username</label>
                                    <input type="text" class="form-control rounded-pill" name="username" id="usernameRegist" placeholder="Username" style="font-family: 'Quicksand';">
                                    <div id="usernameHelpR" class="form-text text-danger" style="font-family: 'Quicksand';">Username already used.</div>
                                </div>
                                <div class="my-4">
                                    <label for="" class="form-label ms-1" style="font-family: 'Quicksand';">Password</label>
                                    <input type="password" class="form-control rounded-pill" name="password" id="passwordRegist" placeholder="Password" style="font-family: 'Quicksand';">
                                    <div id="passwordHelpR" class="form-text text-danger" style="font-family: 'Quicksand';">Your password must be 8-20 characters long.</div>
                                </div>
                                <div class="my-4">
                                    <label for="" class="form-label ms-1" style="font-family: 'Quicksand';">Confirm Password</label>
                                    <input type="password" class="form-control rounded-pill" id="confirmPassword" placeholder="Confirm Password" style="font-family: 'Quicksand';">
                                    <div id="ConfirmPasswordHelpR" class="form-text text-danger" style="font-family: 'Quicksand';">Password does not match.</div>
                                </div>
                                <div style="text-align: center">
                                    <input type="submit" class="btn btn-outline-dark mt-3" value="Create an account" style="background-color: rgb(140, 186, 159);">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="px-4 pt-4">
        <div class="container">
            <h4 class="pt-3 " style="font-family: 'Playfair Display'; font-weight: 400;">DIY Beauty Recipe Sharing</h4>
            <div class="row my-4 pb-5">
                <div class="col-4">
                    <h6 class="my-2">MENU</h6>
                    <p class="my-2" style="font-family: 'Quicksand';">Home</p>
                    <p class="my-2" style="font-family: 'Quicksand';">Explore</p>
                    <p class="my-2" style="font-family: 'Quicksand';">Uploud</p>
                </div>
                <div class="col-4"></div>
                <div class="col-4"></div>
            </div>
        </div>
        <div class="mt-5 p-2">halo</div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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

            $("#usernameHelp").text('');
            $("#passwordHelp").text('');

            $('#loginButton').on('click', function (e) {
                let go = false;
                var username = $('#usernameLogin').val();
                let i = 0;
                let count = 0;

                while ($('#user' + i).val()) {
                    let userValue = $('#user' + i).val();
                    if (username === userValue) {
                        var password = $('#passwordLogin').val();
                        let passValue = $('#pass' + i).val();

                        if (password === passValue) {
                            $('#passwordHelp').text('');
                            go = true;
                            break;
                        } else {
                            $('#passwordHelp').text('Wrong password.');
                        }
                        count++;
                    }
                    i++;
                }

                if (count === 0) {
                    $('#usernameHelp').text('Username not found.');
                } else {
                    $('#usernameHelp').text('');
                }

                if (!go) {
                    e.preventDefault();
                }
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

            $('#passwordRegist').on('input', function () {
                var password = $('#passwordRegist').val();
                var errorMessage = '';

                if (password.length < 8 || password.length > 20) {
                    errorMessage = 'Password must be 8-20 characters long.';
                } else if (!/[A-Z]/.test(password)) {
                    errorMessage = 'Password must contain at least one uppercase letter.';
                } else if (!/[a-z]/.test(password)) {
                    errorMessage = 'Password must contain at least one lowercase letter.';
                } else if (!/\d/.test(password)) {
                    errorMessage = 'Password must contain at least one number.';
                } else if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                    errorMessage = 'Password must contain at least one special character.';
                }

                if (errorMessage !== '') {
                    $('#passwordHelpR').text(errorMessage).show();
                } else {
                    $('#passwordHelpR').hide();
                }
            });

            $('#confirmPassword').on('input', function () {
                var pass = $('#passwordRegist').val();
                var cpass = $('#confirmPassword').val();
                if (cpass !== pass) {
                    $('#ConfirmPasswordHelpR').show();
                } else {
                    $('#ConfirmPasswordHelpR').hide();
                }
            });
        });
    </script>
</body>

</html>