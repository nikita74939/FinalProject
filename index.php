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
</head>

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
                        <a class="nav-link active" aria-current="page" href="#"
                            style="font-family: 'Quicksand';">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-family: 'Quicksand';">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-family: 'Quicksand';">Uploud Recipe</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <a href="#login" class="me-3">
                        <img src="img/user.png" alt="" class="img-fluid align-top me-1" width="25" height="20"
                            style="font-family: 'Quicksand';">
                    </a>
                </span>
            </div>
        </div>
    </nav>
    <!-- navbar end-->

    <!-- hero -->
    <div class="hero">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="mx-3">
                        <h1>Glow Up<br><span style="font-size: 4rem; color:darkslategray;">Naturally</span></h1>
                        <h6 class="pt-2">Dive into DIY Beauty Recipes Made from Everyday Ingredients! Create Your Own,
                            Feel the Vibe, and Embrace Your Unique Glow!</h6>
                        <a href="" class="btn btn-outline-dark mt-3"
                            style="background-color: rgb(140, 186, 159);">Explore Now !</a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="m-5">

                    </div>
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
                    <div class="card mx-3" style="border: none; background-color: white">
                        <img src="img/satu.png" class="card-img-top pt-3" width="50%" alt="..."
                            style="padding-left:70px; padding-right:70px;">
                        <div class="card-body">
                            <h5 class="card-title">DIY Recipe</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mx-3" style="border: none; background-color: white">
                        <img src="img/dua.png" class="card-img-top pt-3" width="50%" alt="..."
                            style="padding-left:70px; padding-right:70px;">
                        <div class="card-body">
                            <h5 class="card-title">Share Recipe</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mx-3" style="border: none; background-color: white">
                        <img src="img/tiga.png" class="card-img-top pt-3" width="50%" alt="..."
                            style="padding-left:70px; padding-right:70px;">
                        <div class="card-body">
                            <h5 class="card-title">Save Recipe</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
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
                    <div class="card-group d-block">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="..." class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to
                                            additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class=" row g-0">
                                <div class="col-md-4">
                                    <img src="..." class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural
                                            lead-in to
                                            additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">

                </div>
            </div>
        </div>
    </div>
    <!-- most populer end -->

    <!-- login -->
    <div class="login p-5 mb-5" id="login" style="display: block">
        <div class="card m-5">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-7 p-5">

                        </div>
                        <div class="col-5 p-4">
                            <h4 style="font-family: 'Quicksand'; font-weight: 400; text-align: center">Login to</h4>
                            <h2 style="text-align: center">Beauty Recipe</h2>

                            <form action="cek_login.php" method="post" class="mt-4 px-5">
                                <div class="my-2">
                                    <label for="" class="form-label text-start ms-1"
                                        style="font-family: 'Quicksand';">Username</label>
                                    <input type="text" class="form-control rounded-pill" name="username" id="usernameLogin" placeholder="Username" style="font-family: 'Quicksand';">
                                    <div id="usernameHelp" class="form-text" style="font-family: 'Quicksand';">
                                        Username not found.
                                    </div>
                                </div>
                                <div class="my-3">
                                    <label for="" class="form-label ms-1"
                                        style="font-family: 'Quicksand';">Password</label>
                                    <input type="password" class="form-control rounded-pill"  name="password" id="passwordLogin" placeholder="Password" style="font-family: 'Quicksand';">
                                    <div id="passwordHelp" class="form-text" style="font-family: 'Quicksand';">
                                        Wrong Password.
                                    </div>
                                </div>

                                <div style="text-align: center">
                                    <input type="submit" class="btn btn-outline-dark mt-3" value="LOGIN"
                                        style="background-color: rgb(140, 186, 159);">

                                </div>
                                
                                <p class="pt-5" style="font-family: 'Quicksand'; font-weight: 400; font-size: 14px">Haven't an account? Register <a href="#regist" id="regist">here</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login end -->

    <!-- regist -->
    <div class="register my-5" id="regist" style="display: block">
        <div class="card m-5">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-7 p-5">

                        </div>
                        <div class="col-5 p-4">
                            <h2 style="text-align: center">Beauty Recipe</h2>

                            <form action="regist.php" method="post" class="mt-4 px-5" >
                                <div class="my-2" >
                                    <label for="" class="form-label text-start ms-1"
                                        style="font-family: 'Quicksand';">Username</label>
                                    <input type="text" class="form-control rounded-pill" name="username" id="usernameRegist" placeholder="Username" style="font-family: 'Quicksand';">
                                    <div id="usernameHelpR" class="form-text" style="font-family: 'Quicksand';">
                                        Username already used.
                                    </div>

                                </div>
                                <div class="my-4">
                                    <label for="" class="form-label ms-1"
                                        style="font-family: 'Quicksand';">Password</label>
                                    <input type="password" class="form-control rounded-pill" name="password" id="passwordRegist" placeholder="Password" style="font-family: 'Quicksand';">
                                    <div id="passwordHelpR" class="form-text" style="font-family: 'Quicksand';">
                                        Your password must be 8-20 characters long.
                                    </div>
                                </div>

                                <div class="my-4">
                                    <label for="" class="form-label ms-1" style="font-family: 'Quicksand';">Confirm
                                        Password</label>
                                    <input type="password" class="form-control rounded-pill" id="confirmPassword" placeholder="Confirm Password" style="font-family: 'Quicksand';">
                                    <div id="ConfirmPasswordHelpR" class="form-text" style="font-family: 'Quicksand';">
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
            <h4 class="pt-3" style="font-family: 'Playfair Display'; font-weight: 400;">DIY Beauty Recipe Sharing</h4>
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
    <script src="js/scriptIndex.js"></script>
</body>

</html>