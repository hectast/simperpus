<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ===================    =========================================== -->
                <?php if (isset($_GET['views_admin'])) : ?>
                    <a class="navbar-brand" href="beranda_admin">
                    <?php else : ?>
                        <a class="navbar-brand" href="beranda">
                        <?php endif; ?>
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="public/assets/images/logo-icon.png" alt="homepage" class="light-logo" />

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <!-- <img src="public/assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            <h4 class="light-logo mt-2">SIMPERPUS</h4>

                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <!-- <img src="public/assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                        </a>
                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Toggle which is visible on mobile only -->
                        <!-- ============================================================== -->
                        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto">
                    <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    <!-- ============================================================== -->
                    <!-- create new -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->

                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">
                    <!-- ============================================================== -->
                    <!-- Comment -->
                    <!-- ============================================================== -->


                    <li class="nav-item dropdown">
                        <?php if (isset($_GET['views_admin'])) : ?>
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="public/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
                                <span class="text-light ml-1">Administrator</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <!-- <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Pengaturan Akun</a> -->
                                <a class="dropdown-item" href="app/aksi_logout.php" onclick="return confirm('Yakin ingin keluar dari akun ini ?')"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        <?php else : ?>
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="public/uploads/<?= $row_data->foto; ?>" alt="user" class="rounded-circle" height="35" width="35" style="object-fit:cover;">
                                <span class="text-light ml-1"><?= $row_data->nama_lengkap; ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#modalUbahPassword"><i class="mdi mdi-account-key m-r-5 m-l-5"></i> Ubah Password</a>
                                <a class="dropdown-item" href="app/aksi_logout.php" onclick="return confirm('Yakin ingin keluar dari akun ini ?')"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        <?php endif; ?>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>

    <?php if (isset($_GET['views_user'])) : ?>
    <!-- Modal -->
    <div class="modal fade" id="modalUbahPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="formUbahPassword">
                    <input type="hidden" id="nisn" value="<?= $row_data->nisn; ?>">
                    <div class="modal-body" >
                        <div id="contentBody">

                        </div>
                        <div class="form-group">
                            <label for="">Password Sekarang</label>
                            <input type="password" id="pass_now" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password Baru</label>
                            <input type="password" id="new_pass" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Konfirmasi Password Baru</label>
                            <input type="password" id="confirm_new_pass" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" id="ubahPassword" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>