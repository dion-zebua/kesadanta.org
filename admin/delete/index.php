<?php

    session_start();

    if( !isset($_SESSION["login"])) {
        header("location:../login/");
    }

    require "../../koneksi.php"; 

    $id = $_GET["berita"];
    if (!isset($id)) {
        header("location:../");
    }
    $berita = query("SELECT * FROM berita WHERE id = $id");
    if (!$berita) {
        header("location:../");
    }
    
    if( isset($_POST["delete"])  ) {
        
        
        $sqlku = "DELETE FROM berita WHERE id = $id";
        mysqli_query($konek,$sqlku);
        if(mysqli_affected_rows($konek) > 0) {
            header("Location:../more-news/");
        }
        else {
            $error = "Gagal Hapus !";
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


            <section class="py-5 bg-light vw-100 min-vh-100">
                <div class="container px-5">
                    <div class="text-center py-5">
                        <h1 class="fw-bolder">News</h1>
                        <p class="lead fw-normal text-muted mb-0">Berita dan Kegiatan terbaru KESADANTA</p>
                    </div>
                    <div class="row gx-5 p-3 bg-kesadanta mx-0 rounded-3 shadow-lg">
                        <div class="col-12"> 
                            <form action="" method="post" class="text-center">
                                <button class="btn btn-outline-light" id="submitForm" type="submit" name="delete">
                                    Delete
                                </button>
                                <?php if(isset($error)) { ?>
                                <div class="col-12 d-grid my-3">
                                    <p class="text-danger text-center fs-5 fw-bolder" id="error"><?php echo $error;?></p>
                                </div>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
                
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
