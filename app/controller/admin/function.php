<?php

function tampil_data_kelas($mysqli)
{
    $nomor = 1;
    $query = $mysqli->prepare("SELECT * FROM kelas");
    $query->execute();
    $result = $query->get_result();
    while ($row = $result->fetch_object()) {
        $id = $row->id_kelas;
        $tkn = 'hectast2k21';
        $token = md5("$tkn:$id");
        echo "";
?>
        <tr>
            <td><?= $nomor++ ?></td>
            <td><?= $row->nama_kelas; ?></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="token_hapus" value="<?= $token ?>">
                    <input type="hidden" name="id_kelas" value="<?= $id ?>">
                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal<?= $id ?>"><i class="fas fa-edit"></i></button>
                    <button type="submit" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')" name="hapus_kelas" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        <!-- modal -->
        <div class="modal fade" id="exampleModal<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Nama Kelas</label>
                                <input type="hidden" name="token_edit" value="<?= $token ?>">
                                <input type="hidden" name="id_kelas" value="<?= $id ?>">
                                <input class="form-control" type="text" name="nama_kelas" value="<?= $row->nama_kelas ?>">
                            </div>
                            <div class="form-group">
                                <button name="edit_kelas" class="btn btn-block btn-primary"><i class="fas fa-save"></i> Simpan </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
    <?php
    }
}
function simpan_kelas($nama_kelas, $mysqli)
{
    $query = $mysqli->prepare("INSERT INTO kelas (nama_kelas) VALUES ('$nama_kelas')");
    $query->execute();
}
function hapus_kelas($id_kelas, $mysqli)
{
    $query = $mysqli->prepare("DELETE FROM kelas WHERE id_kelas = '$id_kelas'");
    $query->execute();
}
function edit_kelas($id_kelas, $nama_kelas, $mysqli)
{
    $query = $mysqli->prepare("UPDATE kelas SET nama_kelas = '$nama_kelas' WHERE id_kelas ='$id_kelas'");
    $query->execute();
}

// func data mapel
function tampil_data_mapel($mysqli)
{
    $nomor = 1;
    $query = $mysqli->prepare("SELECT * FROM mapel");
    $query->execute();
    $result = $query->get_result();
    while ($row = $result->fetch_object()) {
        $id = $row->id_mapel;
        $tkn = 'hectast2k21';
        $token = md5("$tkn:$id");
    ?>
        <tr>
            <td><?= $nomor; ?></td>
            <td><?= $row->nama_mapel; ?></td>
            <td><?= $row->klasifikasi == 1 ? "<i class='fas fa-check text-success'></i>" : "-" ?></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="token_hapus" value="<?= $token ?>">
                    <input type="hidden" name="id_mapel" value="<?= $id ?>">
                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal<?= $id ?>"><i class="fas fa-edit"></i></button>
                    <button type="submit" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')" name="hapus_mapel" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        <!-- modal -->
        <div class="modal fade" id="exampleModal<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Mata Pelajaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Nama Mata Pelajaran</label>
                                <input type="hidden" name="token_edit" value="<?= $token ?>">
                                <input type="hidden" name="id_mapel" value="<?= $id ?>">
                                <input class="form-control" type="text" name="nama_mapel" value="<?= $row->nama_mapel ?>">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <?php
                                    if ($row->klasifikasi == 1) {
                                        echo "
                                            <input type='checkbox' class='custom-control-input' name='klasifikasi' id='customControlAutosizing$nomor' value='1' checked>
                                            <label class='custom-control-label' for='customControlAutosizing$nomor'>Klasifikasi</label>
                                        ";
                                    } else {
                                        echo "
                                            <input type='checkbox' class='custom-control-input' name='klasifikasi' id='customControlAutosizing$nomor' value='1'>
                                            <label class='custom-control-label' for='customControlAutosizing$nomor'>Klasifikasi</label>
                                        ";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="edit_mapel" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal -->
    <?php
        $nomor++;
    }
}
function simpan_mapel($nama_mapel, $klasifikasi, $mysqli)
{
    $query = $mysqli->prepare("INSERT INTO mapel (nama_mapel, klasifikasi) VALUES ('$nama_mapel', '$klasifikasi')");
    $query->execute();
}
function hapus_mapel($id_mapel, $mysqli)
{
    $query = $mysqli->prepare("DELETE FROM mapel WHERE id_mapel='$id_mapel'");
    $query->execute();
}
function edit_mapel($id_mapel, $nama_mapel, $klasifikasi, $mysqli)
{
    $query = $mysqli->prepare("UPDATE mapel SET nama_mapel='$nama_mapel',klasifikasi='$klasifikasi' WHERE id_mapel='$id_mapel'");
    $query->execute();
}

// func data buku
function tampil_data_buku($mysqli)
{
    $nomor = 1;
    $query = $mysqli->prepare("SELECT * FROM buku");
    $query->execute();
    $result = $query->get_result();
    while ($row = $result->fetch_object()) {
        $id = $row->id_buku;
        $tkn = 'hectast2k21';
        $token = md5("$tkn:$id");
    ?>
        <tr>
            <td><?= $nomor; ?></td>
            <td><?= $row->judul_buku; ?></td>
            <td><?= $row->pengarang; ?></td>
            <td><?= $row->penerbit; ?></td>
            <td><?= $row->jumlah_buku; ?></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="token_hapus" value="<?= $token ?>">
                    <input type="hidden" name="id_buku" value="<?= $id ?>">
                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal<?= $id ?>"><i class="fas fa-edit"></i></button>
                    <button type="submit" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')" name="hapus_buku" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        <!-- modal -->
        <div class="modal fade" id="exampleModal<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Mata Pelajaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="nomor_jenis_buku" value="<?= $nomor; ?>">
                            <input type="hidden" name="token_edit" value="<?= $token ?>">
                            <input type="hidden" name="id_buku" value="<?= $id ?>">
                            <div class="form-group">
                                <label>Kode ISBN</label>
                                <input type="text" class="form-control" name="kode_isbn" placeholder="Masukkan Kode ISBN" value="<?= $row->kode_isbn ?>" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Judul Buku</label>
                                        <input type="text" class="form-control" name="judul_buku" placeholder="Masukkan Judul Buku" value="<?= $row->judul_buku ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pengarang</label>
                                        <input type="text" class="form-control" name="pengarang" placeholder="Masukkan Pengarang" value="<?= $row->pengarang ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Penerbit</label>
                                        <input type="text" class="form-control" name="penerbit" placeholder="Masukkan Penerbit" value="<?= $row->penerbit ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tahun Terbit</label>
                                        <input type="number" class="form-control" name="tahun_terbit" placeholder="Masukkan Tahun Terbit" value="<?= $row->tahun_terbit ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row" class="showKJ">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label>Penerbit</label>
                                        <input type="text" class="form-control" name="kategori_buku" value="<?= $row->kategori_buku == 1 ? "Klasifikasi" : "Mata Pelajaran"; ?>" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Buku</label>
                                            <?php
                                            if ($row->kategori_buku == 1 && !empty($row->jenis_buku)) {
                                                $queryKategK = $mysqli->prepare("SELECT * FROM mapel WHERE id_mapel='{$row->jenis_buku}' AND klasifikasi=1");
                                                $queryKategK->execute();
                                                $resultKategK = $queryKategK->get_result();
                                                $rowKategK = $resultKategK->fetch_object();     
                                                echo "
                                                    <input type='text' class='form-control' name='jenis_buku' value='{$rowKategK->nama_mapel}' required readonly>
                                                ";
                                            } else if ($row->kategori_buku == 0 && !empty($row->jenis_buku)) {
                                                $queryKategK = $mysqli->prepare("SELECT * FROM mapel WHERE id_mapel='{$row->jenis_buku}'");
                                                $queryKategK->execute();
                                                $resultKategK = $queryKategK->get_result();
                                                $rowKategK = $resultKategK->fetch_object();     
                                                echo "
                                                    <input type='text' class='form-control' name='jenis_buku' value='{$rowKategK->nama_mapel}' required readonly>
                                                ";
                                            } else {
                                                echo "
                                                    <input type='text' class='form-control' name='jenis_buku' value='-' required readonly>
                                                ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jumlah Buku</label>
                                        <input type="number" class="form-control" name="jumlah_buku" placeholder="Masukkan Jumlah Buku" value="<?= $row->jumlah_buku ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Lokasi Buku</label>
                                        <select class="form-control" name="lokasi_buku" style="width: 100%;">
                                            <option hidden>Pilih Lokasi Buku</option>
                                            <?php
                                            if ($row->lokasi_buku == "Rak 1") {
                                                echo "
                                                    <option value='Rak 1' selected>Rak 1</option>
                                                    <option value='Rak 2'>Rak 2</option>
                                                    <option value='Rak 3'>Rak 3</option>
                                                ";
                                            } else if ($row->lokasi_buku == "Rak 2") {
                                                echo "
                                                    <option value='Rak 1'>Rak 1</option>
                                                    <option value='Rak 2' selected>Rak 2</option>
                                                    <option value='Rak 3'>Rak 3</option>
                                                ";
                                            } else if ($row->lokasi_buku == "Rak 3") {
                                                echo "
                                                    <option value='Rak 1'>Rak 1</option>
                                                    <option value='Rak 2'>Rak 2</option>
                                                    <option value='Rak 3' selected>Rak 3</option>
                                                ";
                                            } else {
                                                echo "
                                                    <option value='Rak 1'>Rak 1</option>
                                                    <option value='Rak 2'>Rak 2</option>
                                                    <option value='Rak 3'>Rak 3</option>
                                                ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="edit_buku" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal -->
<?php
        $nomor++;
    }
}
function simpan_buku($kode_isbn, $judul_buku, $pengarang, $penerbit, $tahun_terbit, $kategori_buku, $jenis_buku, $jumlah_buku, $lokasi_buku, $tanggal_input, $mysqli)
{
    $query = $mysqli->prepare("INSERT INTO buku (kode_isbn, judul_buku, pengarang, penerbit, tahun_terbit, kategori_buku, jenis_buku, jumlah_buku, lokasi_buku, tanggal_input) 
                                VALUES ('$kode_isbn', '$judul_buku', '$pengarang', '$penerbit', '$tahun_terbit', '$kategori_buku', '$jenis_buku', '$jumlah_buku', '$lokasi_buku', '$tanggal_input')");
    $query->execute();
}
function hapus_buku($id_buku, $mysqli)
{
    $query = $mysqli->prepare("DELETE FROM buku WHERE id_buku='$id_buku'");
    $query->execute();
}
function edit_buku($id_buku, $kode_isbn, $judul_buku, $pengarang, $penerbit, $tahun_terbit, $kategori_buku, $jenis_buku, $jumlah_buku, $lokasi_buku, $mysqli){
    $query = $mysqli->prepare("UPDATE buku SET kode_isbn='$kode_isbn', judul_buku='$judul_buku', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun_terbit',
                                kategori_buku='$kategori_buku', jenis_buku='$jenis_buku', jumlah_buku='$jumlah_buku', lokasi_buku='$lokasi_buku' WHERE id_buku='$id_buku'");
    $query->execute();
}
?>