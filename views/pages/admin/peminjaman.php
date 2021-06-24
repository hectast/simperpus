<?php
include 'app/controller/admin/post.php';
?>
<style>
table{
    font-size: 12px;
}
</style>
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
            if (isset($_SESSION['msg_simpan_pinjam'])) {
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fas fa-check fe-16 mr-2"></span> <?= flash('msg_simpan_pinjam'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php
            }
        ?>
          <?php
            if (isset($_SESSION['msg_kembali'])) {
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fas fa-check fe-16 mr-2"></span> <?= flash('msg_kembali'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php
            }
        ?>
        <?php
            if (isset($_SESSION['msg_hapus_transaksi'])) {
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fas fa-check fe-16 mr-2"></span> <?= flash('msg_hapus_transaksi'); ?>
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
                                <h5 class="card-subtitle"><?= $title ?></h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12">

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-plus-circle"></i> Tambah Peminjaman
                                </button>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal">
                                    <i class="fas fa-print"></i> Cetak
                                </button>
                                <!-- <a href="cetak_transaksi" class="btn btn-success" target="_blank"><i class="fas fa-print"></i> Cetak</a> -->
                                <br><br>
                                <div class="table-responsive">
                                <table class="table table-hover" id="datatable_r">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width='1px'>No</th>
                                            <th>Judul Buku</th>
                                            <th>Peminjam</th>
                                            <th>Tgl. Pinjam</th>
                                            <th>Tgl. Jatuh Tempo</th>
                                            <th>Tgl. Kembali</th>
                                            <th>Status</th>
                                            <th>Ket</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php tampil_data_pinjam($mysqli); 
                                        ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- batas -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">input Peminjaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group" id="optionP">
                                    <label for="">Peminjam / Anggota</label>
                                    <select class="form-control opsi_modal" id="option_peminjam" style="width:100%;">
                                        <option hidden>-Pilih Peminjam / Anggota-</option>
                                        <option value="1">Siswa</option>
                                        <option value="2">Guru</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Judul Buku</label>
                                    <select name="id_buku" class="form-control opsi_modal2" style="width:100%">
                                        <option>-Pilih Buku-</option>
                                        <?php tampil_buku($mysqli) ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Lama Pinjam / Hari</label>
                                    <div class="input-group mb-3">                                
                                        <input name="lama_hari" type="number" class="form-control" max="3" min="1" oninvalid="this.setCustomValidity('Maksimal 3 Hari')">
                                        <div class="input-group-append">
                                            <span class="input-group-text">/  Hari</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <button name="tambah_transaksi" class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cetak Data Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="cetak_transaksi" method="post" target="_BLANK">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Filter Cetak</label>
                            <select name="filter_data" class="form-control">
                                <option value="" hidden>-Pilih Filter Cetak-</option>
                                <option value="1">Cetak Peminjaman Buku</option>
                                <option value="2">Cetak Pengembalian Buku</option>
                                <option value="3">Cetak Keseluruhan</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="cetak_filter" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>