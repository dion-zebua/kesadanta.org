<?php

    session_start();
    require "../../koneksi.php";

    if(!isset($_SESSION["login"])) {
        header("location:../login/");
    }

    if(isset($_POST["logout"])){
        $_SESSION = [];
        session_unset();
        session_destroy();
        header("location:../login/");
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
        <link rel="icon" type="image/x-icon" href="../../img/Logo Koperasi Jasa Pesada PEREMPUAN Tangguh.jpeg Koperasi Jasa Pesada PEREMPUAN Tangguh.jpeg" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="stylesheet" href="../../css/styles.css">
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-kesadanta position-fixed w-100 z-100">
                <div class="container px-5">
                    <a class="navbar-brand" href="../../news/">KESADANTA</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="../">News</a></li>
                            <li class="nav-item"><a class="nav-link" href="../upload">Upload</a></li>
                            <li class="nav-item"><a class="nav-link" href="../logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <section class="py-5 bg-gray vw-100 vh-100">
                <div class="container px-5">
                    <div class="text-center py-5">
                        <h1 class="fw-bolder">Logout Admin</h1>
                    </div>
                    <div class="container bg-kesadanta my-shadow my-shadow rounded-3 px-3 py-3">
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-12">
                                <form id="form-login" class="d-flex flex-column align-items-center col-12" action="" method="post">
                                        <div class="col-12 col-sm-6 col-xl-2 d-grid my-3">
                                            <button class="btn btn-lg  btn-light p-0 py-1 m-0" id="submitForm" type="submit" name="logout">Logout
                                            </button>
                                        </div>
                                        <a href="../change-password/" class="font-monospace fs-5 text-dark">Ganti Password</a>
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
