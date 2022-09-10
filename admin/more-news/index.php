<?php

    session_start();

    if( !isset($_SESSION["login"])) {
        header("location:../login/");
    }

    require "../../koneksi.php";

    
    $search = "";
    $sql_search = "";
    $order = "Latest";
    $sql_order = "ORDER BY id DESC";
    
    $id = 1;
    
    // terlama
    if( isset($_POST["oldest"])  ) {
        $sql_order = " ORDER BY id ASC";
        $order = "Oldest";
    }

    // terbaru
    if( isset($_POST["latest"])  ) {
        $sql_order = "ORDER BY id DESC";
        $order = "Latest";
    }
    
    // search
    if(isset($_POST["search"])) {
        $search = htmlspecialchars($_POST["dataSearch"]);
        $sql_search = "WHERE judul LIKE '%$search%' ";
    }
    
    $beritaList = query("SELECT * FROM berita $sql_search $sql_order ");

    // error jika kosong

    if(!$beritaList) {
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
        <link rel="icon" type="image/x-icon" href="../../img/Logo Koperasi Jasa Pesada PEREMPUAN Tangguh.jpeg" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="../../css/styles.css" rel="stylesheet" />
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
                            <li class="nav-item"><a class="nav-link" href="../upload/">Upload</a></li>
                            <li class="nav-item"><a class="nav-link" href="../logout/">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>


            <section class="py-5 bg-light min-vh-100">
                <div class="container px-5">
                    <div class="text-center py-5">
                        <h1 class="fw-bolder">News</h1>
                        <p class="lead fw-normal text-muted mb-0">Berita dan Kegiatan terbaru KESADANTA</p>
                    </div>
                    <form class="d-flex gap-3 col-12 col-sm-8 col-md-6 col-lg-6" role="search" action="" method="post">
                        <input class="form-control" type="search" name="dataSearch" placeholder="Search" autocomplete="off" >
                        <button class="btn btn-outline-dark" name="search" type="search">Search</button>
                        <a class="text-decoration-none " href="../admin/upload/"><button class="btn btn-outline-dark fw-bolder" name="tambah" type="search">+</button></a>
                    </form>
                    <form action="" class="d-flex my-3 gap-3 col-12 col-sm-8 col-md-6 col-lg-6" method="post">
                        <li class="nav-item dropdown list-unstyled col-12">
                            <a class="text-decoration-none  active text-muted bg-light col-12 form-control d-flex justify-content-between" href="#" role="button"  data-bs-toggle="dropdown" aria-expanded="false">
                                Order By <?php echo $order?>  
                                    <span class="dropdown-toggle"></span>
                            </a>
                            <ul class="dropdown-menu w-100">
                                <li><button class="d-flex justify-content-start border-0 bg-body w-100" type="submit" name="oldest">Oldest</button></li>
                                <li><button class="d-flex justify-content-start border-0 bg-body w-100" type="submit" name="latest">Latest</button></li>
                            </ul>
                        </li>
                    </form>
                    <div class="row gx-5 my-5 pt-1 mx-0 rounded-3 shadow-lg ">
                        <div class="col-12"> 
                            <?php if(isset($kosong)) {  echo "<p class=\"text-center text-danger fw-bolder\">" . $kosong . "</p>"; } ?> 
                            <?php foreach($beritaList as $list) { ?>
                            <div class="mt-1">
                                <div class="small text-muted">Upload : <?= $list["tanggal"]; ?></div>
                                <a class="link-dark" href="../read-more/?berita=<?= $list["id"];?>"><h3><?= $list["judul"]; ?></h3></a>
                                <form action="" method="post" class="mt-0 mb-4 col-12">
                                    <a class="p-1 text-decoration-none rounded-1 btn btn-outline-danger" href="../delete/?berita=<?= $list['id'] ?>">Delete</a>
                                    <a class="p-1 text-decoration-none rounded-1 btn btn-outline-warning" href="../update/?berita=<?= $list['id'] ?>">Update</a>
                                </form>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
                
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
