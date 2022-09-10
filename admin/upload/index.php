<?php

    session_start();

    if( !isset($_SESSION["login"])) {
        header("location:../login/");
    }

    require "../../koneksi.php";

    if( isset($_POST["upload"])  ) {

        $judul = htmlspecialchars($_POST["judul"]);
        $kelurahan = htmlspecialchars($_POST["kelurahan"]);
        $kecamatan = htmlspecialchars($_POST["kecamatan"]);
        $kota = htmlspecialchars($_POST["kota"]);
        $tanggal = date("l, d F Y");    
        $tema = htmlspecialchars($_POST["tema"]);
        $deskripi = htmlspecialchars($_POST["deskripsi"]);


        $gambar = [
            $fileName = $_FILES["gambar"]["name"],
            $fileSize = $_FILES["gambar"]["size"],
            $fileError = $_FILES["gambar"]["error"],
            $filePath = $_FILES["gambar"]["tmp_name"],
        ];
        $exten_wajib = ['jpg','jpeg','png'];
        $exten_gambar1 = explode('.',$fileName);
        $exten_gambar2 = strtolower(end($exten_gambar1));
        if(in_array($exten_gambar2,$exten_wajib)){
            if($fileSize < 5120000) {
                $nama_baru = uniqid();
                $nama_baru .= "^".$fileName;

                move_uploaded_file($filePath,'../../img/'.$nama_baru);

                $sqlku = "INSERT INTO berita VALUES ('','$judul','$kelurahan','$kecamatan','$kota','$tanggal','$tema','$nama_baru','$deskripi')";
                mysqli_query($konek,$sqlku);
                
                header('location:../more-news/');
            }
            else{
                $up = "Size Max 5mb !";
            }
        }
        else{
            $up = "Extensi wajib jpg, jpeg, atau png !";
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
                            <li class="nav-item"><a class="nav-link" href="./">Upload</a></li>
                            <li class="nav-item"><a class="nav-link" href="../logout/">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <section class="py-5 bg-light">
                <div class="container px-5">
                    <div class="text-center py-5">
                        <h1 class="fw-bolder">Upload</h1>
                    </div>
                    <div class="container bg-kesadanta rounded-2 shadow-lg px-3 pt-3">
                        <?php if(isset ($up)) : ?>
                        <div class="col-12 d-grid my-3">
                            <p class="text-warning text-center fs-5 fw-bolder" id="error"><?php echo $up;
                            ?></p>
                        </div>
                        <?php endif; ?>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-12">
                                <form id="form-mahasiswa" class="font-monospace" action="" method="post" enctype="multipart/form-data">
                                    <div class="container d-flex flex-wrap justify-content-md-between">
                                        <div class="col-12 col-md-5">
                                            <div class="mb-1">
                                                <label for="judul" class="form-label">Judul</label>
                                                <input type="text" class="form-control" id="judul" required="" autocomplete="off" name="judul" placeholder="Judul">
                                            </div>
                                            <div class="mb-1">
                                                <label for="kelurahan" class="form-label">Desa / Kelurahan</label>
                                                <input type="text" class="form-control" id="kelurahan" required="" autocomplete="off" name="kelurahan" placeholder="Desa / Kelurahan">
                                            </div>
                                            <div class="mb-1">
                                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                                <input type="text" class="form-control" id="kecamatan" required="" autocomplete="off" name="kecamatan" placeholder="Kecamatan">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-5">
                                            <div class="mb-1">
                                                <label for="kab/kota" class="form-label">Kabupaten / Kota</label>
                                                <input type="text" class="form-control" id="kab/kota" required="" autocomplete="off" name="kota" placeholder="Kabupaten / Kota">
                                            </div>
                                            <div class="mb-1">
                                                <label for="gambar" class="form-label">Gambar</label>
                                                <input type="file" class="form-control" id="gambar" required="" autocomplete="off" name="gambar"  placeholder="Pilih Gambar">
                                            </div>
                                            <div class="mb-1">
                                                <label for="tema" class="form-label">Tema</label>
                                                <select class="form-select"  required="" autocomplete="off" name="tema"  id="tema">
                                                    <option value="">Tema</option>
                                                    <option value="Berita">Berita</option>
                                                    <option value="Kegiatan">Kegiatan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-1 col-12">
                                            <label for="pesan" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="pesan" rows="1" required="" autocomplete="off" name="deskripsi" placeholder="Deskripsi Berita"></textarea>
                                        </div>
                                        <div class="col-12 d-grid my-3">
                                            <button class="btn btn-lg btn-light text-dark" id="submitForm" type="submit" name="upload">Kirim
                                            </button>
                                        </div>
                                
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <div> 
            </section>

        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
