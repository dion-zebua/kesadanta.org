<?php

    require "../koneksi.php";

    $berita = query("SELECT * FROM berita ORDER BY id DESC LIMIT 0 , 1");
    $beritaList = query("SELECT * FROM berita ORDER BY id DESC LIMIT 1 , 3");
    if(!$berita) {
        $kosong = "Data tidak ada !";
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
                            <li class="nav-item"><a class="nav-link" href="./">News</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Galerry</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                    <li><a class="dropdown-item" href="../event/">Event</a></li>
                                    <li><a class="dropdown-item" href="../other/">Other</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../contact/">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <section class="py-5 bg-gray min-vh-100">
                <div class="container px-sm-5">
                    <div class="text-center py-5">
                        <h1 class="fw-bolder">News</h1>
                        <p class="lead fw-normal text-muted mb-0">Berita dan Kegiatan terbaru KESADANTA</p>
                    </div>
                    <?php if(isset($kosong)) {  echo '<div class="row gx-5 my-5 pt-1 mx-0 rounded-3 shadow-lg bg-light">
                                                        <div class="col-12">
                                                            <p class="text-center text-danger fw-bolder">' . $kosong . '</p>
                                                        </div>
                                                    </div>'; }
                    else { ?>
                    <?php foreach($berita as $brt) { ?>
                    <div class="text-end mb-2">
                        <a class="text-decoration-none" href="../more-news/">
                            More news
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="card border-0 my-shadow rounded-3 overflow-hidden">
                        <div class="card-body p-0">
                            <div class="row gx-0">
                                <div class="col-xl-5 d-flex flex-column justify-content-center">
                                    <div class="p-4 p-md-3">
                                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                                        <div class="h2 fw-bolder">
                                            <?php if(strlen($brt["judul"]) > 55 ) {
                                                for($i = 0; $i < 55; $i++) {
                                                    echo $brt["judul"][$i];
                                                } echo "...";
                                            }
                                            else {
                                                echo $brt["judul"];
                                            } ?>
                                        </div>
                                        <p>
                                            <?php if(strlen($brt["deskripsi"]) > 110 ) {
                                                for($i = 0; $i < 110; $i++) {
                                                    echo $brt["deskripsi"][$i];
                                                } echo " . . .";
                                            }
                                            else {
                                                echo $brt["deskripsi"];
                                            } ?>
                                        </p>
                                        <div class="small text-muted">Upload : <?= $brt["tanggal"]; ?></div>
                                        <a class="stretched-link text-decoration-none" href="../read-more/?berita=<?= $brt["id"];?>">
                                            Read more . .
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-7 align-items-xl-center d-flex rounded-3 shadow-lg">
                                    <img class="img-fluid" src="../img/<?php echo $brt["gambar"]; ?>" alt="<?php echo $brt["gambar"]; ?>" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </section>    

            <?php if(!isset($kosong)) { ?>
                <section class="py-5 bg-light">
                    <div class="container px-5">
                        <div class="row gx-5">
                            <div class="col-xl-8">
                                <h2 class="fw-bolder fs-5 mb-4">News</h2>
                            <!-- News item-->
                            <?php foreach($beritaList as $list) { ?>
                            <div class="mb-4">
                                <div class="small text-muted">Upload : <?= $list["tanggal"]; ?></div>
                                <a class="link-dark" href="read-more/?berita=<?= $list["id"];?>"><h3><?= $list["judul"]; ?></h3></a>
                            </div>
                            <?php } ?>
                            <div class="text-end mb-5 mb-xl-0">
                                <a class="text-decoration-none" href="../more-news/">
                                    More news . .
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php } ?>
                
        </main>
        
        <footer>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249.078994540474!2d98.32217469845426!3d2.737904803101967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x25c91030111b4341!2zMsKwNDQnMTYuNCJOIDk4wrAxOScyMC4zIkU!5e0!3m2!1sid!2sid!4v1658838106794!5m2!1sid!2sid" class="-mb-1"  frameborder="0" style="border:0; width: 100%; height: 300px;" allowfullscreen=""></iframe>
            <div class="px-5 bg-kesadanta py-4">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; CU KESADANTA</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="../">Home</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="../about/">About</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="../contact/">Contact</a>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
