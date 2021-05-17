<?php
    session_start();

    include 'app/env.php';
    if (isset($_SESSION['unique_user'])) {
        header('Location: beranda');
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
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
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
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-10" id="loginform" action="" method="POST">
                        <div class="row p-b-20">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-dark" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="nisn" class="form-control form-control-lg" placeholder="NISN" aria-label="Username" aria-describedby="basic-addon1" required="">
                                </div>
                                <div class="input-group mb-3">
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