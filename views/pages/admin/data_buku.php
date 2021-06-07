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
        if (isset($_SESSION['msg_simpan_buku'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_simpan_buku'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>
        <?php
        if (isset($_SESSION['msg_hapus_buku'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_hapus_buku'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>
        <?php
        if (isset($_SESSION['msg_edit_buku'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_edit_buku'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>
        <?php
        if (isset($_SESSION['msg_edit_jumlah_buku'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_edit_jumlah_buku'); ?>
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
                            <!-- column -->
                            <div class="col-lg-12">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInputBuku">
                                    <i class="fas fa-plus-circle"></i> Tambah Data
                                </button>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal">
                                    <i class="fas fa-print"></i> Cetak
                                </button>
                                <br><br>
                                <table class="table" id="datatable1">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Buku</th>
                                            <th>Judul Buku</th>
                                            <th>Klasifikasi</th>
                                            <th>Kategori</th>
                                            <th>Pengarang</th>
                                            <th>Penerbit</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php tampil_data_buku($mysqli); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- batas -->

        <!-- batas -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Perpustakaan</h4>
                                <h5 class="card-subtitle">History Buku</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <!-- column -->
                            <div class="col-lg-12">
                                <table class="table" id="datatable2">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Buku</th>
                                            <th>Judul Buku</th>
                                            <th>Klasifikasi</th>
                                            <th>Jumlah</th>
                                            <th>Waktu Input</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php tampil_history_buku($mysqli); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- batas -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalInputBuku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kode ISBN</label>
                                    <input type="text" class="form-control" name="kode_isbn" placeholder="Masukkan Kode ISBN" required>
                                </div>
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input type="text" class="form-control" name="judul_buku" placeholder="Masukkan Judul Buku" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select name="kategori" class="form-control">
                                        <option value="" hidden>-Pilih Kategori-</option>
                                        <option value="1">Umum</option>
                                        <option value="0">Paket</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Klasifikasi</label>
                                    <select name="klasifikasi" class="form-control">
                                        <option value="" hidden>-Pilih Klasifikasi-</option>
                                        <?php
                                        $sql_klasif = $mysqli->query("SELECT * FROM klasifikasi");
                                        while ($row_klasif = $sql_klasif->fetch_assoc()) {
                                            echo "
                                                    <option value='$row_klasif[kode_klasifikasi]'>$row_klasif[klasifikasi]</option>
                                                ";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah_buku" placeholder="Masukkan Jumlah Buku" required>
                                </div>
                                <div class="form-group">
                                    <label>Harga Satuan</label>
                                    <input type="number" class="form-control" name="harga_satuan" placeholder="Masukkan Harga Satuan" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pengarang</label>
                                    <input type="text" class="form-control" name="pengarang" placeholder="Masukkan Pengarang" required>
                                </div>
                                <div class="form-group">
                                    <label>Penerbit</label>
                                    <input type="text" class="form-control" name="penerbit" placeholder="Masukkan Penerbit" required>
                                </div>
                                <div class="form-group">
                                    <label>Tempat Terbit</label>
                                    <input type="text" class="form-control" name="tempat_terbit" placeholder="Masukkan Tempat Terbit" required>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Terbit</label>
                                    <input type="text" class="yearpicker form-control" name="tahun_terbit" placeholder="Masukkan Tahun Terbit" required>
                                </div>
                                <div class="form-group">
                                    <label>Jilid Edisi</label>
                                    <input type="text" class="form-control" name="jilid_edisi" placeholder="Masukkan Jilid Edisi" required>
                                </div>
                                <div class="form-group">
                                    <label>Sumber Dana</label>
                                    <input type="text" class="form-control" name="sumber_dana" placeholder="Masukkan Sumber Dana" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="simpan_buku" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>
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
                <form action="cetak_buku" method="post" target="_BLANK">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Pilih Kategori</label>
                            <select name="kat" class="form-control">
                                <option value="" hidden>-Pilih Kategori-</option>
                                <option value="1">Umum</option>
                                <option value="0">Paket</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="simpan_buku" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>