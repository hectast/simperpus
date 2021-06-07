<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title"><i class="<?= $icon ?>"></i> <?= $title ?></h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
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
                                <div class="table-responsive">
                                    <table class="table table-hover" id="datatable_r">
                                        <thead class="thead-light">
                                            <tr>
                                                <th width='1px'>No</th>
                                                <th>Judul Buku</th>
                                                <th>Tgl. Pinjam</th>
                                                <th>Tgl. Jatuh Tempo</th>
                                                <th>Tgl. Kembali</th>
                                                <th>Status</th>
                                                <th>Ket</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $stmt_daftar_peminjaman = $mysqli->prepare("SELECT * FROM transaksi JOIN buku ON transaksi.id_buku = buku.id_buku JOIN guru ON transaksi.nuptk = guru.nuptk WHERE transaksi.nuptk='{$_SESSION['unique2_user']}'");
                                                $stmt_daftar_peminjaman->execute();
                                                $result_daftar_peminjaman = $stmt_daftar_peminjaman->get_result();
                                                $no = 1;
                                                while ($row_daftar_peminjaman = $result_daftar_peminjaman->fetch_object()) {
                                            ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $row_daftar_peminjaman->judul_buku; ?></td>
                                                    <td><?= tgl_indo($row_daftar_peminjaman->tgl_pinjam); ?></td>
                                                    <td><?= tgl_indo($row_daftar_peminjaman->tgl_jatuh_tempo); ?></td>
                                                    <td>
                                                        <?php 
                                                        if($row_daftar_peminjaman->tgl_kembali == 0){
                                                            echo '<div class="text-danger">Blm Dikembalikan</div>';
                                                        }else{
                                                            echo tgl_indo($row_daftar_peminjaman->tgl_kembali);
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if($row_daftar_peminjaman->tgl_kembali == 0){
                                                                echo '<div class="badge badge-danger">Blm Dikembalikan</div>';
                                                            }else{
                                                                echo '<div class="badge badge-success">Sdh Dikembalikan</div>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if($row_daftar_peminjaman->denda == 0){
                                                                echo '-';
                                                            }else{
                                                                echo 'Denda Rp. '; echo number_format($row_daftar_peminjaman->denda);
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php
                                                $no++;
                                                }
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
    </div>