<?php

    session_start();

    if( !isset($_SESSION["login"])) {
        header("location:../login/");
    }

    require "../../koneksi.php";

    
    // CEK apakah id = 1 ada?
    $sqlku = "SELECT * FROM admin WHERE id = 1";
    $query = mysqli_query($konek,$sqlku);
    $admin = mysqli_fetch_assoc($query);
    
    if(isset($_POST["change"])) {
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);
        $encrypt = password_hash($password , PASSWORD_DEFAULT);
        

        // CEK apakah id = 1 ada 1 baris
        if(mysqli_num_rows($query) > 0 && mysqli_num_rows($query) < 2 ) {
            $change = mysqli_query($konek , "UPDATE admin SET username = '$username' , password = '$encrypt' WHERE id = 1 ");
            $_SESSION = [];
            session_unset();
            session_destroy();
            header("location:../login/");
        }
        else {
            $error = "Tidak ada perubahan !";
        }


    }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>KESADANTA</title>
        <link rel="icon" type="image/x-icon" href="../../img/Logo Koperasi Jasa Pesada PEREMPUAN Tangguh.jpeg" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="../../css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-kesadanta position-fixed w-100 z-100">
                <div class="container px-5">
                    <a class="navbar-brand" href="../">KESADANTA</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="../">News</a></li>
                            <li class="nav-item"><a class="nav-link" href="../upload/">Upload</a></li>
                            <li class="nav-item"><a class="nav-link" href="../logout/">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <section class="py-5 bg-gray vw-100 vh-100">
                <div class="container px-5">
                    <div class="text-center py-5">
                        <h1 class="fw-bolder">Change Username or Passowrd</h1>
                    </div>
                    <div class="container bg-kesadanta my-shadow rounded-3 px-3 py-3">
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-12">
                                <form id="form-login" action="" method="post">
                                    <div class="container d-flex flex-wrap justify-content-md-between">
                                        <div class="col-12 col-md-5">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="username" value="<?= $admin["username"];?>" name="username" autocomplete="off" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-5">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" value="<?= $admin["password"];?>" name="password" autocomplete="off" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="col-12 d-grid my-3">
                                            <button class="btn btn-lg btn-light" id="submitForm" type="submit" name="change">Change
                                            </button>
                                        </div>
                                        <?php if(isset($error)) { ?>
                                            <div class="text-center w-100">
                                                <p class="font-monospace text-danger fw-bolder"><?php echo $error; ?></p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
