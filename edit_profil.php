<?php
include 'koneksi.php';
session_start();

$user_id = $_GET['edit'];

$query_users = "SELECT * FROM users WHERE user_id = '$user_id';";
$sql_users = mysqli_query($conn, $query_users);
$result_users = mysqli_fetch_assoc($sql_users);

$query_profil = "SELECT * FROM profil_pict WHERE id = '$user_id';";
$sql_profil = mysqli_query($conn, $query_profil);
$result_profil = mysqli_fetch_assoc($sql_profil);

if (isset($_POST['aksiProfil']) && $_POST['aksiProfil'] == "edit") {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $bio = $_POST['bio'];
    $id_pict = $_POST['id_pict'];

    if (empty($id_pict)) {
        $id_pict = $result_users['id_pict'];  //gunakan nilai lama jk tdk diperbarui
    }

    $query_edit_users = "UPDATE users SET nama='$nama', username='$username', bio='$bio', id_pict='$id_pict' WHERE user_id = '$user_id';";
    $sql_edit_users = mysqli_query($conn, $query_edit_users);

    header("location: profil.php");
    exit();
}

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
    .checkmark {
    display: none;
    position: absolute;
    top: 0;
    right: 0;
    color: black;
    font-size: 50px;
}
</style>

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
                                    <li class="list-group-item" style="border: none;">
                                        <h6>Explore</h6>
                                    </li>
                                </a>
                                <a href="uploud.php" style="text-decoration: none; color: black">
                                    <li class="list-group-item" style="border: none">
                                        <h6>Upload</h6>
                                    </li>
                                </a>
                                <a href="profil.php" style="text-decoration: none; color: black">
                                    <li class="list-group-item" style="border: none; color: rgb(140, 186, 159);">
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

            <div class="col-10">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="pt-4">
                        <h4 class="ps-3" style="font-family: 'Quicksand';"><i
                                class="fa-solid fa-chevron-left me-4 pb-2 back-icon"></i>Edit Profile</h4>
                        <?php if(isset($_GET['pesan'])): ?>
                        <div class="row m-3 mx-4 text-center">
                            <p style="color: rgb(150, 190, 159)">Let's complete your account!</p>
                        </div>
                        <?php endif; ?>
                        <div class="row my-3">
                            <div class="col-4 pe-5 pt-3 text-center">
                                <img src="users/pict<?php echo $result_users['id_pict']; ?>.jpg" id="profilPict"
                                    class="img-thumbnail rounded-circle mx-5" alt="Profile Picture"
                                    style="position: relative;">
                                <label for="" class="form-label m-3 mt-5 ms-0">Choose your profile's pict</label>
                                <div class="row">
                                    <?php
                                    $q = "SELECT * FROM profil_pict";
                                    $query = mysqli_query($conn, $q);
                                    if ($query) {
                                        while ($data = mysqli_fetch_array($query)) {
                                            $id = $data['id'];
                                            $url = $data['url']; ?>
                                            <div class="col-4">
                                                <div class="position-relative">
                                                    <img src="<?php echo $url; ?>" id="<?php echo $id; ?>"
                                                        class="option-pict img-thumbnail rounded-circle mx-5 mb-3"
                                                        alt="Option Picture" style="position: relative;"
                                                        val="<?php echo $id; ?>">
                                                    <span class="checkmark" id="checkmark-<?php echo $id; ?>"
                                                        style="display: none; position: absolute; top: 0; right: 0; color: green; font-size: 20px;">✔</span>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-8 p-5 pt-3 ">
                                    <input type="hidden" class="form-control" name="id_pict" id="id_pict" value="<?php echo $result_users['id_pict']; ?>">

                                    <label for="" class="form-label">Nickname</label>
                                    <input style="font-family: 'Quicksand';" required type="text" class="form-control" name="nama" id="nama" value="<?php echo $result_users['nama']; ?>">

                                    <label for="" class="form-label mt-4">Username</label>
                                    <input style="font-family: 'Quicksand';" required type="text" class="form-control" name="username" id="username" value="<?php echo $result_users['username']; ?>">

                                    <label for="" class="form-label mt-4">Bio</label>
                                    <textarea style="font-family: 'Quicksand'; min-height: 100px;" required type="text"  class="form-control" name="bio" id="bio"><?php echo $result_users['bio']; ?></textarea>

                                    <div class="text-end my-5">
                                    <button type="submit" class="btn btn-outline-dark" id="btn-edit" style="background-color: rgb(140, 186, 159)" name="aksiProfil" value="edit">Save Change</button>
                            </div>

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
            $('.option-pict').click(function () {            
                var url = $(this).attr('src');
                $('#profilPict').attr('src', url);

                $('[id^="checkmark-"]').hide();
                var selectedId = $(this).attr('id');
                $('#checkmark-' + selectedId).show();

                var selectedId = $(this).attr('id');
                $('#checkmark-' + selectedId).show();
                $('#id_pict').val(selectedId);
            });

            $(".back-icon").on("click", function () {
                window.history.back();
            });
        });
    </script>
</body>

</html>