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
                <div class="pt-5">
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
                        <a href="#activity" style="text-decoration: none; color: black">
                            <li class="list-group-item" style="border: none">
                                <h6>Activity</h6>
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

            <!-- right -->

            <div class="col-10" id="profilView">
                <div class="card mt-1" style="height: 200px; background-color: indianred; border:none">
                    <div class="card-body">
                    </div>
                </div>

                <!-- info profil -->

                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <img src="users/pict1.jpeg" class="img-thumbnail rounded-circle mx-5" alt="..."
                                width="200px" style="position: relative; top: -100px; border: none;">
                        </div>
                        <div class="col-9 text-end">
                            <a href="edit_profil.php" class="p-2 px-3 mt-4 btn btn-dark rounded-pill">Edit Profil</a>
                        </div>
                    </div>
                    <div class="row pt-3" style="position: relative; top: -100px;">
                        <h6 style="font-size: 32px; font-weight: 700">nami</h6>
                        <p style="font-size: 16px;">@cherrygirl</p>
                    </div>
                    <div class="row pt-1" style="position: relative; top: -100px;">
                        <p class="pb-4">casting spells for dewy skin 🌙✨ | plant-based potions, homemade magic | your
                            skin’s BFF</p>
                        <hr>
                    </div>

                    <!-- info profil end -->

                    <!-- button -->

                    <div class="row text-center" style="position: relative; top: -100px;">
                        <div class="col-6" style="border-bottom: solid 1px black;">
                            <a href="#postRecipe" id="postButton"></a>
                            <p style="font-weight: 700; color: black">post</p>
                        </div>
                        <div class="col-6" style="border-bottom: none;">
                            <a href="#savedRecipe" id="savedButton"></a>
                            <p style="font-weight: 400; color: gray">saved</p>
                        </div>
                        <hr>
                    </div>

                    <div id="postRecipe" class="row pt-1 px-4" style="position: relative; top: -100px; display: block">
                        <div class="col-6">
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
                                        style="width: 100%; height: 240px; object-fit: cover; object-position: center;">
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
                    </div>

                    <div id="savedRecipe" class="row pt-1 px-4" style="position: relative; top: -100px; display: none">
                        <div class="col-6">
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
                                        style="width: 100%; height: 240px; object-fit: cover; object-position: center;">
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
                    </div>
                    <div class="row">
                        <footer class="px-4 pt-4" style="background-color: white">
                            <div class="container">
                                <h4 class="pt-3" style="font-family: 'Playfair Display'; font-weight: 400;">DIY Beauty
                                    Recipe Sharing</h4>
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
    <script src="js/scriptIndex.js"></script>
</body>

</html>