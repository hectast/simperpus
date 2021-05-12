<?php
include 'app/controller/admin/post.php';
?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title"><i class="<?= $icon ?>"></i> <?= $title ?></h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    <?php
            if (isset($_SESSION['msg_simpan_kelas'])) {
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_simpan_kelas'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php
            }
        ?>
        <?php
            if (isset($_SESSION['msg_hapus_kelas'])) {
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_hapus_kelas'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php
            }
        ?>
          <?php
            if (isset($_SESSION['msg_edit_kelas'])) {
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_edit_kelas'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php
            }
        ?>
    
        <!-- batas -->
        <div class="row">    
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Perpustakaan</h4>
                                <h5 class="card-subtitle"><?= $title ?></h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <!-- column -->
                            <div class="col-lg-12">
                                <table class="table" id="datatable1">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php tampil_data_kelas($mysqli); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Perpustakaan</h4>
                                <h5 class="card-subtitle">Input Kelas </h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <!-- column -->
                            <div class="col-lg-12">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="kelas">Nama Kelas</label>
                                        <input type="text" autocomplete="off" name="nama_kelas" class="form-control">
                                    </div>
                                    <div>
                                        <button type="submit" name="simpan_kelas" class="btn btn-block btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <!-- batas -->
    </div>