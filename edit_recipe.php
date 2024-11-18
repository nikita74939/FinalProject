<?php
include 'koneksi.php';
session_start();

if (empty($_SESSION['username'])) {
    header("location:index.php?pesan=belum_login");
} else if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

$recipe_id = $_GET['edit'];

$query_recipe = "SELECT * FROM recipes WHERE recipe_id = '$recipe_id';";
$sql_recipe = mysqli_query($conn, $query_recipe);
$result_recipe = mysqli_fetch_assoc($sql_recipe);


if (isset($_GET['hapus'])) {
    $recipe_id = $_GET['hapus'];

    $query = "SELECT * FROM recipes WHERE recipe_id = '$recipe_id';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);

    unlink("img/" . $result['main_image']);

    $query_hapus = "DELETE FROM recipes WHERE recipe_id = '$recipe_id';";
    $sql_hapus = mysqli_query($conn, $query_hapus);

    if ($sql_hapus) {
        header("location: profil.php");
    } else {
        die("Error hapus recipe: " . mysqli_error($conn));
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
                                    <li class="list-group-item" style="border: none; ">
                                        <h6>Explore</h6>
                                    </li>
                                </a>
                                <a href="uploud.php" style="text-decoration: none; color: black">
                                    <li class="list-group-item" style="border: none; color: rgb(140, 186, 159);">
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

            <!-- right -->

            <div class="col-10" id="formUploud">
                <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
                    <div class="pt-4">
                        <h4 class="ps-3" style="font-family: 'Quicksand';"><i
                                class="fa-solid fa-chevron-left me-4 pb-2 back-icon"></i>Uploud Recipe</h4>
                    </div>
                    <div class="row my-3">
                        <div class="col-6 p-5 pt-3">
                            <input type="hidden" name="recipe_id" value="<?php echo $recipe_id; ?>">
                            <label for="" class="form-label">Title</label>
                            <input style="font-family: 'Quicksand';" required type="text" class="form-control"
                                name="title" id="title" placeholder="Your own recipe's title"
                                value="<?php echo $result_recipe['title'] ?>">

                            <label for="" class="form-label mt-4">Picture (can't edit)</label>
                            <img src="img/<?php echo $result_recipe['main_image'] ?>" alt="" class="img-fluid"
                                width="80%">
                            <br>

                            <label for="" class="form-label mt-4">Category</label>
                            <select class="form-control" name="category" id="category"
                                style="font-family: 'Quicksand';">
                                <option <?php if ($result_recipe['category'] == "Face Mask") {
                                    echo "selected";
                                } ?>
                                    value="Face Mask">Face Mask</option>
                                <option <?php if ($result_recipe['category'] == "Face Scrub") {
                                    echo "selected";
                                } ?>
                                    value="Face Scrub">Face Scrub</option>
                                <option <?php if ($result_recipe['category'] == "Face Mist") {
                                    echo "selected";
                                } ?>
                                    value="Face Mist">Face Mist</option>
                                <option <?php if ($result_recipe['category'] == "Lip Care") {
                                    echo "selected";
                                } ?>
                                    value="Lip Care">Lip Care</option>
                                <option <?php if ($result_recipe['category'] == "Hair Care") {
                                    echo "selected";
                                } ?>
                                    value="Hair Care">Hair Care</option>
                                <option value="Other">Other</option>
                            </select>

                            <label for="" class="form-label mt-4">Main Ingredients</label>
                            <select class="form-control" name="main_ingredient" id="main_ingredient"
                                style="font-family: 'Quicksand';">
                                <option <?php if ($result_recipe['category'] == "Honey") {
                                    echo "selected";
                                } ?>
                                    value="Honey">Honey</option>
                                <option <?php if ($result_recipe['category'] == "Banana") {
                                    echo "selected";
                                } ?>
                                    value="Banana">Banana</option>
                                <option <?php if ($result_recipe['category'] == "Coconut Oil") {
                                    echo "selected";
                                } ?>
                                    value="Coconut Oil">Coconut Oil</option>
                                <option <?php if ($result_recipe['category'] == "Green Tea") {
                                    echo "selected";
                                } ?>
                                    value="Green Tea">Green Tea</option>
                                <option <?php if ($result_recipe['category'] == "Yogurt") {
                                    echo "selected";
                                } ?>
                                    value="Yogurt">Yogurt</option>
                                <option <?php if ($result_recipe['category'] == "Turmeric") {
                                    echo "selected";
                                } ?>
                                    value="Turmeric">Turmeric</option>
                                <option <?php if ($result_recipe['category'] == "Oats") {
                                    echo "selected";
                                } ?>   value="Oats">
                                    Oats</option>
                                <option <?php if ($result_recipe['category'] == "Other") {
                                    echo "selected";
                                } ?>
                                    value="Other">Other</option>
                            </select>
                        </div>

                        <div class="col-6 p-5 pt-3">
                            <label for="" class="form-label">Deskripstion</label>
                            <textarea style="font-family: 'Quicksand'; min-height: 100px;" class="form-control"
                                name="description" id="description"
                                placeholder="Add description about your recipe"><?php echo $result_recipe['description']; ?></textarea>

                            <div class="for-edit" style="display: none">
                                <?php echo $result_recipe['ingredient']; ?>
                                <?php echo $result_recipe['step']; ?>
                            </div>

                            <label for="" class="form-label mt-4">Ingredients</label>
                            <div class="container p-0 m-0">
                                <div id="form-list-ingredient">

                                </div>
                                <button id="addButtonIngredient" class="btn btn-outline-secondary py-0">+</button>
                                <ul id="ingredientList" class="list-group mt-3" style="display: none"></ul>
                            </div>

                            <input type="hidden" name="ingredient" id="ingredient" style="display: none">

                            <label for="" class="form-label mt-4">Step by step</label>
                            <div class="container p-0 m-0">
                                <div id="form-list-step">

                                </div>
                                <button id="addButtonStep" class="btn btn-outline-secondary py-0">+</button>
                                <ul id="stepList" class="list-group mt-3" style="display: none"></ul>
                            </div>

                            <input type="hidden" name="step" id="step" style="display: none">

                            <div class="text-end my-5">
                                <button name="aksiUp" value="add" type="submit" class="btn btn-outline-dark me-5"
                                    id="btn-uploud" style="background-color: rgb(140, 186, 159)">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
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

                let x = 1; // inisialisasi variabel untuk bahan
    let y = 1; // inisialisasi variabel untuk langkah

    // proses data dari ul (ingredients)
    $('.for-edit ul').each(function () {
        $(this).find('li').each(function () {
            let list = $(this).text();
            if (list) {
                $('#form-list-ingredient').append(`
                    <div class="form-row align-items-center mb-2">
                        <div class="col-auto">
                            <input style="font-family: 'Quicksand'" type="text" class="form-control mb-1" id="ingredient${x}" value="${list}" placeholder="ingredient ${x}">
                        </div>
                    </div>
                `);
                x++;
            }
        });
    });

    // proses data dari ol (steps)
    $('.for-edit ol').each(function () {
        $(this).find('li').each(function () {
            let list = $(this).text();
            if (list) {
                $('#form-list-step').append(`
                    <div class="form-row align-items-center mb-2">
                        <div class="col-auto">
                            <input style="font-family: 'Quicksand'" type="text" class="form-control mb-1" id="step${y}" value="${list}" placeholder="step ${y}">
                        </div>
                    </div>
                `);
                y++;
            }
        });
    });

    // tambah bahan baru
    $('#addButtonIngredient').click(function (e) {
        e.preventDefault();
        x++;
        $('#form-list-ingredient').append(`
            <div class="form-row align-items-center mb-2">
                <div class="col-auto">
                    <input style="font-family: 'Quicksand'" type="text" class="form-control mb-1" id="ingredient${x}" placeholder="Ingredient ${x-1}">
                </div>
            </div>
        `);
    });

    // tambah langkah baru
    $('#addButtonStep').click(function (e) {
        e.preventDefault();
        y++;
        $('#form-list-step').append(`
            <div class="form-row align-items-center mb-2">
                <div class="col-auto">
                    <input style="font-family: 'Quicksand'" type="text" class="form-control mb-1" id="step${y}" placeholder="Step ${y-1}">
                </div>
            </div>
        `);
    });

    // simpan data bahan dan langkah ke hidden input
    $(document).on('click', '#btn-uploud', function (e) {

        // proses ingredients
        let ingredientHTML = '';
        for (let i = 1; i <= x; i++) {
            let ingredientValue = $(`#ingredient${i}`).val();
            if (ingredientValue) {
                ingredientHTML += `<li>${ingredientValue}</li>`;
            }
        }
        $('#ingredient').val(`<ul>${ingredientHTML}</ul>`);

        // proses steps
        let stepHTML = '';
        for (let i = 1; i <= y; i++) {
            let stepValue = $(`#step${i}`).val();
            if (stepValue) {
                stepHTML += `<li>${stepValue}</li>`;
            }
        }
        $('#step').val(`<ol>${stepHTML}</ol>`);

        console.log($('#ingredient').val());
        console.log($('#step').val());
    });
        });
    </script>
    <script>
        const dropArea = document.getElementById("drop-area");
        const fileInput = document.getElementById("file-input");
        const previewContainer = document.getElementById("preview-container");

        // Handle drag & drop
        dropArea.addEventListener("dragover", (event) => {
            event.preventDefault();
            dropArea.classList.add("active");
        });

        dropArea.addEventListener("dragleave", () => {
            dropArea.classList.remove("active");
        });

        dropArea.addEventListener("drop", (event) => {
            event.preventDefault();
            dropArea.classList.remove("active");

            const files = event.dataTransfer.files;
            if (files.length > 0) {
                handleFile(files[0]);
            }
        });

        // Open file dialog on click
        dropArea.addEventListener("click", () => {
            fileInput.click();
        });

        fileInput.addEventListener("change", () => {
            const file = fileInput.files[0];
            if (file) {
                handleFile(file);
            }
        });

        // Handle file upload
        function handleFile(file) {
            if (file.type.startsWith("image/")) {
                const reader = new FileReader();
                reader.onload = () => {
                    const img = document.createElement("img");
                    img.src = reader.result;
                    previewContainer.innerHTML = ""; // Clear previous preview
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            } else {
                alert("Please upload an image file.");
            }
        }
    </script>
</body>

</html>