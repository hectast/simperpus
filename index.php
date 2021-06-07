<?php
session_start();

include 'app/env.php';
if (isset($_SESSION['unique_user']) && $_SESSION['type_user'] == "admin") {
?>
    <script>
        alert('Anda tidak mempunyai akses ke halaman ini!');
        window.location.href = 'beranda_admin';
    </script>
<?php
    return false;
} else if (isset($_SESSION['unique_user']) && $_SESSION['type_user'] == "anggota") {
?>
    <script>
        alert('Anda tidak mempunyai akses ke halaman ini!');
        window.location.href = 'beranda';
    </script>
<?php
    return false;
} else if (isset($_SESSION['unique_user']) && $_SESSION['type_user'] == "guru") {
?>
    <script>
        alert('Anda tidak mempunyai akses ke halaman ini!');
        window.location.href = 'beranda_guru';
    </script>
<?php
    return false;
}
include 'app/aksi_login.php'
?>
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="public/assets/images/favicon.png">
    <title>Login - SIMPERPUS</title>
    <!-- Custom CSS -->
    <link href="public/dist/css/style.min.css" rel="stylesheet">

    <style>
        .back-img {
            background-image: url('public/assets/images/library.jpg');
            background-position: center;
            background-size: cover;
        }

        .back-color {
            background-color: rgba(52, 58, 64, 0.5) !important;
        }

        .bg-transparan {
            background-color: rgba(52, 58, 64, 0.9) !important;
            transition: .8s all ;
        }

        .bg-transparan:hover {
            background-color: rgba(52, 58, 64, 1) !important;
        }
    </style>
</head>

<body>
    <div class="main-wrapper back-img">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center back-color">
            <div class="auth-box bg-transparan border-secondary">
                <div class="text-center">
                    <img src="public/assets/images/reading.png" alt="logo" class="img-fluid" width="25%">
                    <!-- <img src="public/assets/images/tutwuri.png" alt="logo" class="img-fluid" width="25%"> -->
                </div>
                <div id="loginform">
                    <div class="text-center p-t-10 p-b-10">
                        <span class="db">
                            <h2 class="text-light">
                                <span class="text-success">S</span>
                                <span class="text-warning">I</span>
                                <span class="text-danger">M</span>
                                PERPUS
                            </h2>
                        </span>
                        <h4 class="text-light">SMP NEGERI 1 SUWAWA</h4>
                        <small>
                            <p class="text-light">
                                Nomor Perpustakaan <u>7503031B1014356</u><br>
                                Jl. Suwawa no. 56, desa tingkohubu, kec. Suwawa, Kab. Bone Bolango, Provinsi Gorontalo
                            </p>
                        </small>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal" id="loginform" action="" method="POST">
                        <div class="row p-b-20">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-dark" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required="">
                                </div>
                                <div class="input-group mb-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-dark" id="basic-addon2"><i class="ti-key"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-success btn-block" name="login" type="submit">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="public/assets/libs/jquery/dist/jquery.min.js"></script>

    <script src="public/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="public/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $(".preloader").fadeOut();
    </script>
</body>

</html>