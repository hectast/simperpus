<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center justify-content-between">
                <h4 class="page-title"><i class="<?= $icon ?>"></i> <?= $title ?></h4>
                <div class="search-box">
                    <a class="waves-effect waves-dark btn btn-sm btn-rounded btn-primary" href="javascript:void(0)"><i class="ti-search"></i> Cari Buku</a>
                    <div class="app-search position-absolute">
                        <input type="text" id="mySearchBuku" class="form-control" placeholder="Masukkan Judul/Pengarang/Penerbit/Jenis Buku"> <a class="srh-btn"><i class="ti-close"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" id="myBukuContent">
                <div class="row myBuku">
                    <?php
                    $stmt_buku = $mysqli->prepare("SELECT * FROM buku LIMIT 6");
                    $stmt_buku->execute();
                    $result_buku = $stmt_buku->get_result();
                    while ($row_buku = $result_buku->fetch_object()) {
                        echo "";
                    ?>
                        <div class="col-md-6 col-lg-4 col-xl-3 myBuku">
                            <div class="card card-custom bg-white border-white border-0">
                                <div class="card-custom-img" style="background-image: url(public/assets/images/background-library.jpg);background-position:bottom;"></div>
                                <div class="card-custom-avatar">
                                    <img class="img-thumbnail" src="public/assets/images/open-book.png" alt="Avatar" />
                                </div>
                                <div class="card-body" style="overflow-y: auto;">
                                    <h4 class="card-title"><?= $row_buku->judul_buku; ?></h4>
                                    <div class="border-bottom"></div>
                                    <p class="card-text mb-1 mt-2">
                                        <small><i class="fas fa-info-circle"></i> Informasi</small>
                                    </p>
                                    <p class="card-text text-muted mb-1"><small>Pengarang : <?= $row_buku->pengarang; ?></small></p>
                                    <p class="card-text text-muted mb-1"><small>Penerbit : <?= $row_buku->penerbit; ?></small></p>
                                    <p class="card-text text-muted mb-1"><small>Tahun Terbit : <?= $row_buku->tahun_terbit; ?></small></p>
                                    <p class="card-text text-muted mb-1">
                                        <small>Jenis Buku :
                                            <?php
                                            if ($row_buku->kategori_buku == 1 && !empty($row_buku->jenis_buku)) {
                                                $queryKategK = $mysqli->prepare("SELECT * FROM mapel WHERE id_mapel='{$row_buku->jenis_buku}' AND klasifikasi=1");
                                                $queryKategK->execute();
                                                $resultKategK = $queryKategK->get_result();
                                                $rowKategK = $resultKategK->fetch_object();
                                                echo "   
                                                    $rowKategK->nama_mapel
                                                ";
                                            } else if ($row_buku->kategori_buku == 0 && !empty($row_buku->jenis_buku)) {
                                                $queryKategK = $mysqli->prepare("SELECT * FROM mapel WHERE id_mapel='{$row_buku->jenis_buku}'");
                                                $queryKategK->execute();
                                                $resultKategK = $queryKategK->get_result();
                                                $rowKategK = $resultKategK->fetch_object();
                                                echo "
                                                    $rowKategK->nama_mapel     
                                                ";
                                            } else {
                                                echo "
                                                 -
                                                ";
                                            }
                                            ?>
                                        </small>
                                    </p>
                                </div>
                                <div class="card-footer" style="background: inherit; border-color: inherit;">
                                    <div class="d-flex w-100 justify-content-between">
                                        <small><i class="fas fa-tag"></i> <?= $row_buku->kategori_buku == 1 ? "Klasifikasi" : "Mata Pelajaran"; ?></small>
                                        <small><i class="fas fa-dot-circle"></i> <?= $row_buku->lokasi_buku; ?></small>
                                        <small>Stok Buku : <?= $row_buku->jumlah_buku; ?> </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        echo "";
                        $idBuku = $row_buku->id_buku;
                    }
                    ?>
                </div>
                <div class="row justify-content-center" id="removeRow">
                    <div class="col-md-5 col-lg-3">
                        <button class="btn btn-primary btn-block" id="btnMore" data-buku="<?= $idBuku; ?>">Lihat Lebih Banyak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>