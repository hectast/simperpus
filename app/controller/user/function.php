<?php
include '../../env.php';
$idBuku = '';
$stmtBuku = $mysqli->prepare("SELECT * FROM buku WHERE id_buku > " . $_POST['last_idBuku'] . " LIMIT 6");
$stmtBuku->execute();
$resultBuku = $stmtBuku->get_result();
if ($resultBuku->num_rows > 0) {
?>
    <div class="row myBuku">
        <?php
        while ($rowBuku = $resultBuku->fetch_object()) {
            $idBuku = $rowBuku->id_buku;
        ?>
            <div class="col-md-6 col-lg-4 col-xl-3 myBuku">
                <div class="card card-custom bg-white border-white border-0">
                    <div class="card-custom-img" style="background-image: url(public/assets/images/background-library.jpg);background-position:bottom;"></div>
                    <div class="card-custom-avatar">
                        <img class="img-thumbnail" src="public/assets/images/open-book.png" alt="Avatar" />
                    </div>
                    <div class="card-body" style="overflow-y: auto;">
                        <h4 class="card-title"><?= $rowBuku->judul_buku ?></h4>
                        <div class="border-bottom"></div>
                        <p class="card-text mb-1 mt-2">
                            <small><i class="fas fa-info-circle"></i> Informasi</small>
                        </p>
                        <p class="card-text text-muted mb-1"><small>Pengarang : <?= $rowBuku->pengarang ?></small></p>
                        <p class="card-text text-muted mb-1"><small>Penerbit : <?= $rowBuku->penerbit ?></small></p>
                        <p class="card-text text-muted mb-1"><small>Tahun Terbit : <?= $rowBuku->tahun_terbit ?></small></p>
                        <p class="card-text text-muted mb-1">
                            <small>Jenis Buku :
                                <?php
                                if ($rowBuku->kategori_buku == 1 && !empty($rowBuku->jenis_buku)) {
                                    $queryKategK = $mysqli->prepare("SELECT * FROM mapel WHERE id_mapel='{$rowBuku->jenis_buku}' AND klasifikasi=1");
                                    $queryKategK->execute();
                                    $resultKategK = $queryKategK->get_result();
                                    $rowKategK = $resultKategK->fetch_object();
                                    echo "   
                                                    $rowKategK->nama_mapel
                                                ";
                                } else if ($rowBuku->kategori_buku == 0 && !empty($rowBuku->jenis_buku)) {
                                    $queryKategK = $mysqli->prepare("SELECT * FROM mapel WHERE id_mapel='{$rowBuku->jenis_buku}'");
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
                            <small><i class="fas fa-tag"></i> <?= $rowBuku->kategori_buku == 1 ? "Klasifikasi" : "Mata Pelajaran"; ?></small>
                            <small><i class="fas fa-dot-circle"></i> <?= $rowBuku->lokasi_buku ?></small>
                            <small>Stok Buku : <?= $rowBuku->jumlah_buku ?></small>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="row justify-content-center" id="removeRow">
        <div class="col-md-2">
            <button class="btn btn-primary btn-block" id="btnMore" data-buku="<?= $idBuku ?>">Lihat Lebih Banyak</button>
        </div>
    </div>
<?php
}
?>