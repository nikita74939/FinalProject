<?php
include 'koneksi.php';
session_start();

if (empty($_SESSION['username'])) {
    header("location:index.php?pesan=belum_login");
} else if (isset($_SESSION['username'])) {
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
    .uploader {
        text-align: center;
    }

    .drop-area {
        border: 1px dashed #ccc;
        padding: 20px;
        border-radius: 10px;
        background-color: #fff;
        cursor: pointer;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .drop-area:hover {
        background-color: #f0f0f0;
        border-color: #999;
    }

    .drop-area p {
        color: #666;
        margin: 0;
    }

    .preview-container {
        margin-top: 20px;
    }

    .preview-container img {
        max-width: 100%;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 10px;
    }
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
                            <li class="list-group-item" style="border: none;">
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

            <!-- right -->

            <div class="col-10" id="formUploud">
                <form action="proses_uploud.php" method="POST" enctype="multipart/form-data">
                    <div class="pt-4">
                        <h4 class="ps-3" style="font-family: 'Quicksand';"><i
                                class="fa-solid fa-chevron-left me-4 pb-2"></i>Uploud Recipe</h4>
                    </div>
                    <div class="row my-3">
                        <div class="col-6 p-5 pt-3">
                            <label for="" class="form-label">Title</label>
                            <input style="font-family: 'Quicksand';" required type="text" class="form-control"
                                name="title" id="title" placeholder="Your own recipe's title">

                            <label for="" class="form-label mt-4">Picture</label>
                            <div class="uploader">
                                <div id="drop-area" class="drop-area">
                                    <p style="font-family: 'Quicksand';">Drag & Drop your image here<br>or click to
                                        upload</p>
                                    <input type="file" id="file-input" name="main_image" accept="image/*" hidden>
                                </div>
                                <div id="preview-container" class="preview-container"></div>
                            </div>

                            <label for="" class="form-label mt-4">Category</label>
                            <select class="form-control" name="category" id="category"
                                style="font-family: 'Quicksand';">
                                <option value="Face Mask">Face Mask</option>
                                <option value="Face Scrub">Face Scrub</option>
                                <option value="Face Mist">Face Mist</option>
                                <option value="Lip Care">Lip Care</option>
                                <option value="Hair Care">Hair Care</option>
                                <option value="Other">Other</option>
                            </select>

                            <label for="" class="form-label mt-4">Main Ingredients</label>
                            <select class="form-control" name="main_ingredient" id="main_ingredient"
                                style="font-family: 'Quicksand';">
                                <option value="Honey">Honey</option>
                                <option value="Aloe Vera Gel">Aloe Vera Gel</option>
                                <option value="Coconut Oil">Coconut Oil</option>
                                <option value="Green Tea">Green Tea</option>
                                <option value="Yogurt">Yogurt</option>
                                <option value="Turmeric">Turmeric</option>
                                <option value="Oats">Oats</option>
                                <option value="Body">Other</option>
                            </select>
                        </div>
                        
                        <div class="col-6 p-5 pt-3">
                            <label for="" class="form-label">Deskripstion</label>
                            <textarea style="font-family: 'Quicksand'; min-height: 100px;" class="form-control"
                                name="description" id="description"
                                placeholder="Add description about your recipe"></textarea>

                            <label for="" class="form-label mt-4">Ingredients</label>
                            <div class="container p-0 m-0">
                                <div id="form-list-ingredient">
                                    <div class="form-row align-items-center">
                                        <div class="col-auto">
                                            <input style="font-family: 'Quicksand'" type="text"
                                                class="form-control mb-2" id="ingredient1" placeholder="Ingredient 1">
                                        </div>
                                    </div>
                                </div>
                                <button id="addButtonIngredient" class="btn btn-outline-secondary py-0">+</button>
                                <ul id="ingredientList" class="list-group mt-3" style="display: none"></ul>
                            </div>

                            <input type="hidden" name="ingredient" id="ingredient" style="display: none">

                            <label for="" class="form-label mt-4">Step by step</label>
                            <div class="container p-0 m-0">
                                <div id="form-list-step">
                                    <div class="form-row align-items-center">
                                        <div class="col-auto">
                                            <input style="font-family: 'Quicksand'" type="text"
                                                class="form-control mb-2" id="step1" placeholder="Step 1">
                                        </div>
                                    </div>
                                </div>
                                <button id="addButtonStep" class="btn btn-outline-secondary py-0">+</button>
                                <ul id="stepList" class="list-group mt-3" style="display: none"></ul>
                            </div>

                            <input type="hidden" name="step" id="step" style="display: none">

                            <div class="text-end my-5">
                                <button name="aksiUp" value="add" type="submit" class="btn btn-outline-dark me-5" id="btn-uploud"
                                    style="background-color: rgb(140, 186, 159)">Uploud</button>
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
        let x = 1;
        let y = 1;

        $('#addButtonIngredient').click(function (e) {
            e.preventDefault();
            x++;
            $('#form-list-ingredient').append(`
                <div class="form-row align-items-center mb-2">
                    <div class="col-auto">
                        <input style="font-family: 'Quicksand'" type="text" class="form-control mb-1" id="ingredient${x}" placeholder="Ingredient ${x}">
                    </div>
                </div>
            `);

            let newIngredientValue = $(`#ingredient${x-1}`).val();
            if (newIngredientValue) { 
                $('#ingredientList').append(`<li class="list-group-item">${newIngredientValue}</li>`);
            }
        });

        $('#addButtonStep').click(function (e) {
            e.preventDefault();
            y++;
            $('#form-list-step').append(`
                <div class="form-row align-items-center mb-2">
                    <div class="col-auto">
                        <input style="font-family: 'Quicksand'" type="text" class="form-control mb-1" id="step${y}" placeholder="Step ${y}">
                    </div>
                </div>
            `);
            let newStepValue = $(`#step${y}`).val();
            if (newStepValue) { 
                $('#stepList').append(`<li class="list-group-item">${newStepValue}</li>`);
            }
        });

        $(document).on('click', '#btn-uploud', function (e) {
            // Ambil nilai dari input terakhir untuk ingredients
            let newIngredientValue = $(`#ingredient${x}`).val();
            if (newIngredientValue) { 
                $('#ingredientList').append(`<li class="list-group-item">${newIngredientValue}</li>`);
            }

            // Ambil nilai dari input terakhir untuk steps
            let newStepValue = $(`#step${y}`).val();
            if (newStepValue) { 
                $('#stepList').append(`<li class="list-group-item">${newStepValue}</li>`);
            }

            // Simpan daftar ke input tersembunyi
            let ingredientHTML = $('#ingredientList'). html();
            $('#ingredient').val(`<ul>${ingredientHTML}</ul>`);

            let stepHTML = $('#stepList').html();
            $('#step').val(`<ol>${stepHTML}</ol>`);
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
