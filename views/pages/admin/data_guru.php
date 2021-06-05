<?php
include 'app/controller/admin/post_guru.php';
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
            if (isset($_SESSION['msg_simpan_guru'])) {
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fas fa-check fe-16 mr-2"></span> <?= flash('msg_simpan_guru'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php
            }
        ?>
        <?php
            if (isset($_SESSION['msg_hapus_guru'])) {
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fas fa-check fe-16 mr-2"></span> <?= flash('msg_hapus_guru'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php
            }
        ?>
        <?php
            if (isset($_SESSION['msg_edit_guru'])) {
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fas fa-check fe-16 mr-2"></span> <?= flash('msg_edit_guru'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php
            }
        ?>
        <!-- batas -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Perpustakaan</h4>
                                <h5 class="card-subtitle">Data Guru</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <!-- column -->
                            <div class="col-lg-12">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-plus-circle"></i> Tambah Data
                                </button>
                                <a href="cetak_guru" target="_blank" class="btn btn-success"><i class="fas fa-print"></i> Cetak</a>
                                <br><br>
                                <table class="table" id="datatable1">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>NUPTK</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php tampil_data_guru($mysqli) ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Input Anggota</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data"">
                                            <div class="form-group">
                                                <label for="">NUPTK</label>
                                                <input type="text" class="form-control" name="nuptk">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama_lengkap">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Jenis Kelamin</label><br>
                                                <div class="form-check">
                                                    <input type="radio" value="Laki Laki" class="form-check-input" id="customControlValidation1" name="jk" required>
                                                    <label class="form-check-label mb-0" for="customControlValidation1">Laki Laki</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" value="Perempuan" class="form-check-input" id="customControlValidation2" name="jk" required>
                                                    <label class="form-check-label mb-0" for="customControlValidation2">Perempuan</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat_lahir">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tanggal_lahir">
                                            </div>
                                            <div class="form-group">
                                                <label for="">No Hp</label>
                                                <input type="text" class="form-control" name="no_hp">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Foto</label>
                                                <input type="file" class="form-control" name="gambar">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Jabatan</label>
                                                <input type="text" class="form-control" name="jabatan">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Tahun Masuk</label>
                                                <input type="text" class="form-control" name="tahun_masuk">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="simpan_guru" class="btn btn-block btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- modal -->
                    </div>
                </div>
            </div>
        </div>
        <!-- batas -->
    </div>