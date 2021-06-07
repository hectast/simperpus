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
                        <b class="logo-icon p-l-10">
                            <img src="public/assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <span class="logo-text">
                            <h4 class="light-logo mt-2">SIMPERPUS</h4>
                        </span>
                    </a>
                <?php elseif (isset($_GET['views_user'])) : ?>
                    <a class="navbar-brand" href="beranda">
                        <b class="logo-icon p-l-10">
                            <img src="public/assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <span class="logo-text">
                            <h4 class="light-logo mt-2">SIMPERPUS</h4>
                        </span>
                    </a>
                <?php elseif (isset($_GET['views_guru'])) : ?>
                    <a class="navbar-brand" href="beranda_guru">
                        <b class="logo-icon p-l-10">
                            <img src="public/assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <span class="logo-text">
                            <h4 class="light-logo mt-2">SIMPERPUS</h4>
                        </span>
                    </a>
                <?php endif; ?>
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
                                <span class="text-light ml-1"><?= $row_data->nama; ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#modalPengaturanAkun"><i class="ti-settings m-r-5 m-l-5"></i> Pengaturan Akun</a>
                                <a class="dropdown-item" href="app/aksi_logout.php" onclick="return confirm('Yakin ingin keluar dari akun ini ?')"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        <?php elseif (isset($_GET['views_user'])) : ?>
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="public/uploads/<?= $row_data->foto; ?>" alt="user" class="rounded-circle" height="35" width="35" style="object-fit:cover;">
                                <span class="text-light ml-1"><?= $row_data->nama_lengkap; ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#modalPengaturanAkun"><i class="ti-settings m-r-5 m-l-5"></i> Pengaturan Akun</a>
                                <a class="dropdown-item" href="app/aksi_logout.php" onclick="return confirm('Yakin ingin keluar dari akun ini ?')"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        <?php elseif (isset($_GET['views_guru'])) : ?>
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="public/uploads/<?= $row_data->foto; ?>" alt="user" class="rounded-circle" height="35" width="35" style="object-fit:cover;">
                                <span class="text-light ml-1"><?= $row_data->nama_lengkap; ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#modalPengaturanAkun"><i class="ti-settings m-r-5 m-l-5"></i> Pengaturan Akun</a>
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
        <div class="modal fade" id="modalPengaturanAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="ti-settings m-r-5"></i> Pengaturan Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="contentBody">

                        </div>
                        <div class="row justify-content-center align-items-center mb-3">
                            <img class="rounded-circle" width="180" height="180" style="object-fit:cover;" src="public/uploads/<?= $row_data->foto; ?>" alt="user" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= $row_data->nama_lengkap; ?>">
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <h3><?= $row_data->nama_lengkap; ?></h3>
                        </div>
                        <div class="row justify-content-center align-items-center" style="margin-top: -0.5rem;">
                            <span class="text-muted"><?= $row_data->nisn; ?></span>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="post" id="formUbahAkun">
                                    <input type="hidden" id="nisn" value="<?= $row_data->nisn; ?>">
                                    <div class="form-group">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" id="nama_lengkap" class="form-control" value="<?= $row_data->nama_lengkap; ?>" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Tempat Lahir</label>
                                                <input type="text" id="tempat_lahir" class="form-control" value="<?= $row_data->tempat_lahir; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Tanggal Lahir</label>
                                                <input type="date" id="tgl_lahir" class="form-control" value="<?= $row_data->tgl_lahir; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="frmuname">
                                        <label for="">Username <span id="textctrl"></span></label>
                                        <input type="text" id="username" class="form-control" value="<?= $row_data->username; ?>" required>

                                    </div>
                                    <button type="submit" id="ubahAkun" value="forData" class="btn btn-primary"><i class="fas fa-save"></i> Update Data</button>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <form method="post" id="formUbahPasswordAkun">
                                    <input type="hidden" id="nisn_pass" value="<?= $row_data->nisn; ?>">
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
                                    <button type="submit" id="ubahPasswordAkun" value="forPassword" class="btn btn-primary"><i class="fas fa-save"></i> Update Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <!-- <button type="submit" id="ubahAkun" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button> -->
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['views_guru'])) : ?>
        <!-- Modal -->
        <div class="modal fade" id="modalPengaturanAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="ti-settings m-r-5"></i> Pengaturan Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="contentBody">

                        </div>
                        <div class="row justify-content-center align-items-center mb-3">
                            <img class="rounded-circle" width="180" height="180" style="object-fit:cover;" src="public/uploads/<?= $row_data->foto; ?>" alt="user" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= $row_data->nama_lengkap; ?>">
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <h3><?= $row_data->nama_lengkap; ?></h3>
                        </div>
                        <div class="row justify-content-center align-items-center" style="margin-top: -0.5rem;">
                            <span class="text-muted"><?= $row_data->nuptk; ?></span>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="post" id="formUbahAkun">
                                    <input type="hidden" id="nuptk" value="<?= $row_data->nuptk; ?>">
                                    <div class="form-group">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" id="nama_lengkap" class="form-control" value="<?= $row_data->nama_lengkap; ?>" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Tempat Lahir</label>
                                                <input type="text" id="tempat_lahir" class="form-control" value="<?= $row_data->tempat_lahir; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Tanggal Lahir</label>
                                                <input type="date" id="tgl_lahir" class="form-control" value="<?= $row_data->tgl_lahir; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="frmuname">
                                        <label for="">Username <span id="textctrl"></span></label>
                                        <input type="text" id="username" class="form-control" value="<?= $row_data->username; ?>" required>

                                    </div>
                                    <button type="submit" id="ubahAkun" value="forData" class="btn btn-primary"><i class="fas fa-save"></i> Update Data</button>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <form method="post" id="formUbahPasswordAkun">
                                    <input type="hidden" id="nuptk_pass" value="<?= $row_data->nuptk; ?>">
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
                                    <button type="submit" id="ubahPasswordAkunGuru" value="forPassword" class="btn btn-primary"><i class="fas fa-save"></i> Update Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <!-- <button type="submit" id="ubahAkun" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button> -->
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['views_admin'])) : ?>
        <!-- Modal -->
        <div class="modal fade" id="modalPengaturanAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="ti-settings m-r-5"></i> Pengaturan Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="contentBody">

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="post" id="formUbahAkun">
                                    <input type="hidden" id="id_admin" value="<?= $row_data->id_admin; ?>">
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" id="nama" class="form-control" value="<?= $row_data->nama; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" id="username" class="form-control" value="<?= $row_data->username; ?>" required>
                                    </div>
                                    <button type="submit" id="ubahAkun" value="forData" class="btn btn-primary"><i class="fas fa-save"></i> Update Data</button>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <form method="post" id="formUbahPasswordAkun">
                                    <input type="hidden" id="id_adminPassword" value="<?= $row_data->id_admin; ?>">
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
                                    <button type="submit" id="ubahPasswordAkun" value="forPassword" class="btn btn-primary"><i class="fas fa-save"></i> Update Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <!-- <button type="submit" id="ubahAkun" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button> -->
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>