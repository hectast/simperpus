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
                                                <th>No</th>
                                                <th>Kode Buku</th>
                                                <th>Judul Buku</th>
                                                <th>Klasifikasi</th>
                                                <th>Kategori</th>
                                                <th>Pengarang</th>
                                                <th>Penerbit</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $nomor = 1;
                                                $query = $mysqli->prepare("SELECT * FROM buku JOIN klasifikasi ON buku.kode_klasifikasi = klasifikasi.kode_klasifikasi");
                                                $query->execute();
                                                $result = $query->get_result();
                                                while ($row = $result->fetch_object()) {
                                                ?>
                                                    <tr>
                                                        <td><?= $nomor; ?></td>
                                                        <td><?= $row->no_buku; ?></td>
                                                        <td><?= $row->judul_buku; ?></td>
                                                        <td><?= $row->kode_klasifikasi; ?> - <?= $row->klasifikasi; ?></td>
                                                        <td>
                                                            <?php if ($row->kategori_buku == 1) : ?>
                                                                Umum
                                                            <?php elseif ($row->kategori_buku == 0) : ?>
                                                                Paket
                                                            <?php else : ?>
                                                                -
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?= $row->pengarang; ?></td>
                                                        <td><?= $row->penerbit; ?></td>
                                                        <td><?= $row->jumlah_buku; ?></td>
                                                    </tr>
                                            <?php
                                                $nomor++;
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