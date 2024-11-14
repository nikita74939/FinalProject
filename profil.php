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
    <nav class="navbar navbar-expand-lg bg-none fixed-top" style="border-bottom: 1px solid black">
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
                    <li class="nav-item">
                        <a class="nav-link" href="explore.php" style="font-family: 'Quicksand';">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="uploud.php" style="font-family: 'Quicksand';">Uploud Recipe</a>
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

    <nav class="navbar navbar-expand-lg bg-white navbar-dark" > 
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Beauty Recipe
            </a>
        </div>
    </nav>
    <!-- navbar end-->

    <!-- profil -->
    <div class="page" id="profilDisplay" style="display: block">
        <div class="container m-0">
            <div class="row m-0">
                <div class="col-3-primary m-0">
                    <p>halo</p>
                </div>
                <div class="col-9">

                </div>
            </div>
        </div>
    </div>
    <!-- profil end -->

    <!-- edit profil -->
    <div class="page" id="profilEdit" style="display: none">

    </div>
    <!-- edit profil end -->
    
    <!-- favorit -->
    <div class="page" id="fav" style="display: none">

    </div>
    <!-- favorit end -->

    <!-- my recipes -->
    <div class="page" id="recipes" style="display: none">

    </div>
    <!-- my recipes end -->

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