<?php

    session_start();
    require "../../koneksi.php";

    if(isset($_SESSION["login"])) {
        header("location:../logout/");
    }
    
    if(isset($_POST["login"])){
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        $db_konek = mysqli_query($konek , "SELECT * FROM admin WHERE username = '$username' ");
        $assoc = mysqli_fetch_assoc($db_konek);

        $sesi = mysqli_num_rows($db_konek);
        
        if($sesi === 1) {
            if(password_verify($password, $assoc["password"])) {
                header("location:../");
                $_SESSION["login"] = true;
            }
            else {
                $error = "Username atau Password Salah !";
            }
        }
        else {
            $error = "Username atau Password Salah !";
        }
		
		// $passGet	=	"SELECT * FROM tb_password LIMIT 1";
		// $passVal	=	mysqli_query($koneksi,$passGet);
		// if(mysqli_num_rows($passVal)>0){
		// 	$passdt	=	mysqli_fetch_assoc($passVal);
		// 	$hashdt	=	$passdt["password"];
		// 	if (password_verify($pass, $hashdt)) {
		// 		$_SESSION["login"] = "yes";
		// 		header("Location:upload.php");
		// 	} else {
		// 		$_SESSION["pesan"]	=	"password salah";
		// 		header("Location:mini-log.php");
		// 	}
		// };
        
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
        <link rel="stylesheet" href="../../css/styles.css">
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-kesadanta position-fixed w-100 z-100">
                <div class="container px-5">
                    <a class="navbar-brand" href="../../news/">KESADANTA</a>
                </div>
            </nav>

            <section class="py-5 bg-gray min-vw-100 min-vh-100">
                <div class="container px-5">
                    <div class="text-center py-5">
                        <h1 class="fw-bolder">Login Admin</h1>
                        <p class="lead fw-normal text-muted mb-0">Silahkan Masukan Username dan Password</p>
                    </div>
                    <div class="container bg-kesadanta my-shadow rounded-3 px-3 py-3">
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-12">
                                <form id="form-login" action="" method="post">
                                    <div class="container d-flex flex-wrap justify-content-md-between">
                                        <div class="col-12 col-md-5">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="username" required="" name="username" autocomplete="off" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-5">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" required="" name="password" autocomplete="off" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="col-12 d-grid my-3">
                                            <button class="btn btn-lg btn-light" id="submitForm" type="submit" name="login">Login
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
