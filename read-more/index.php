<?php

    require "../koneksi.php";

    $id = $_GET["berita"];
    if (!isset($id)) {
        header("location:../news");
    }
    $berita = query("SELECT * FROM berita WHERE id = $id");
    if(!$berita){
        header("location:../news");
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
        <link rel="icon" type="image/x-icon" href="../img/Logo Koperasi Jasa Pesada PEREMPUAN Tangguh.jpeg" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-kesadanta position-fixed w-100 z-100">
                <div class="container px-5">
                    <a class="navbar-brand" href="../">KESADANTA</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="../">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="../about/">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="../news/">News</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Galerry</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                    <li><a class="dropdown-item" href="../event/">Event</a></li>
                                    <li><a class="dropdown-item" href="../other">Other</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../contact/">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="text-end mb-2">
                        <a class="text-decoration-none" href="javascript:history.go(-1)">
                            <i class="bi bi-arrow-left"></i>
                             . . Back
                        </a>
                    </div>
                    <div class="row gx-5">
                        <div class="col-lg-3">
                            <div class="d-flex align-items-center mt-lg-2 mt-xl-0 mb-4">
                                <img class="img-fluid rounded-circle" src="../img/Logo Koperasi Jasa Pesada PEREMPUAN Tangguh.jpeg" width="50px" height="50px" alt="...">
                                <div class="ms-3">
                                    <div class="fw-bold">KESADANTA</div>
                                    <div class="text-muted"><?= $berita[0]["kel"]; ?>, <?= $berita[0]["kec"]; ?>, <?= $berita[0]["kota"]; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
 
                            <article>
                                
                                <header class="mb-4">                                  
                                    <h1 class="fw-bolder mb-1"><?= $berita[0]["judul"]; ?></h1>
                                    <div class="text-muted fst-italic mb-2">Upload : <?= $berita[0]["tanggal"]; ?></div>
                                    <a class="badge bg-kesadanta text-decoration-none link-light"><?= $berita[0]["tema"]; ?></a>
                                </header>
                                <figure class="mb-4"><img class="img-fluid rounded-3 my-shadow" src="../img/<?= $berita[0]["gambar"]; ?>" alt="..."></figure>
     
                                <section class="mb-5">
                                    <p class="fs-5 mb-4"><?= $berita[0]["deskripsi"]; ?></p>
                                 </section>
                            </article>
                        </div>
                    </div>
                </div>
            </section>
                
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
