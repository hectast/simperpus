<?php
//===================================================FUNCTION KELAS===================================================
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
                        <h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
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


function tampil_kelas($mysqli)
{
    $query = $mysqli->prepare("SELECT * FROM kelas");
    $query->execute();
    $result = $query->get_result();
    while ($row = $result->fetch_object()) {
    ?>
        <option value="<?= $row->id_kelas; ?>"><?= $row->nama_kelas; ?></option>
    <?php
    }
}
//===================================================FUNCTION KELAS===================================================

//===================================================FUNCTION ANGGOTA===================================================
function tampil_anggota($mysqli)
{
    $query = $mysqli->prepare('SELECT * FROM anggota');
    $query->execute();
    $result = $query->get_result();
    while ($row = $result->fetch_object()) {
    ?>
        <option value="<?= $row->nisn ?>"><?=$row->nisn ?> - <?= $row->nama_lengkap ?></option>
    <?php
    }
}
function  tampil_data_anggota($mysqli)
{
    $nomor = 1;
    $query = $mysqli->prepare('SELECT * FROM anggota JOIN kelas ON anggota.id_kelas = kelas.id_kelas');
    $query->execute();
    $result = $query->get_result();
    while ($row = $result->fetch_object()) {

    ?>
        <tr>
            <td><?= $nomor++ ?></td>
            <td><?= $row->nisn; ?></td>
            <td><?= $row->nama_lengkap ?></td>
            <td><?= $row->jk ?></td>
            <td><?= $row->nama_kelas; ?></td>
            <td>
                <form action="" method="post">
                    <input name="nisn" type="hidden" value="<?= $row->nisn; ?>">
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#bio<?= $row->nisn ?>"><i class="fas fa-id-card"></i></button>
                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $row->nisn ?>"><i class="fas fa-edit"></i></button>
                    <button type="submit" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')" name="hapus_anggota" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        <!-- modal -->

        <div class="modal fade" id="bio<?= $row->nisn ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Biodata Anggota</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-4">
                                <div>
                                    <img src="public/uploads/<?= $row->foto ?>" width="100%" height="350px" alt="">
                                </div>
                            </div>

                            <div class="col-8">
                                <div class="row p-3 bg-light">
                                    <div class="col-4">
                                        NISN
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-7">
                                        <?= $row->nisn; ?>
                                    </div>
                                </div>
                                <div class="row p-3">
                                    <div class="col-4">
                                        Nama Lengkap
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-7">
                                        <?= $row->nama_lengkap; ?>
                                    </div>
                                </div>
                                <div class="row p-3 bg-light">
                                    <div class="col-4">
                                        No Hp
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-7">
                                        <?= $row->no_hp; ?>
                                    </div>
                                </div>
                                <div class="row p-3 bg-light">
                                    <div class="col-4">
                                        Tempat - Tanggal Lahir
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-7">
                                        <?= $row->tempat_lahir; ?> - <?= tgl_indo($row->tgl_lahir); ?>
                                    </div>
                                </div>
                                <div class="row p-3">
                                    <div class="col-4">
                                        Jenis Kelamin
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-7">
                                        <?= $row->jk; ?>
                                    </div>
                                </div>
                                <div class="row p-3 bg-light">
                                    <div class="col-4">
                                        Kelas
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-7">
                                        <?= $row->nama_kelas; ?>
                                    </div>
                                </div>
                                <div class="row p-3">
                                    <div class="col-4">
                                        Tahun Masuk
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-7">
                                        <?= $row->thn_masuk; ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php include 'base_url.php'; ?>
                        <a href="<?= $base_url; ?>app/controller/cetak/cetak_kartu_anggota.php?id=<?= $row->nisn;?>" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit<?= $row->nisn ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Anggota</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="">NISN</label>
                                <input type="text" class="form-control" name="nisn" value="<?= $row->nisn ?>">
                                <input type="hidden" name="gambars" value="<?= $row->foto; ?>">
                                <input type="hidden" name="id" value="<?= $row->nisn; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="<?= $row->nama_lengkap ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <?php if ($row->jk == 'Laki Laki') : ?>
                                    <div class="form-check">
                                        <input type="radio" value="Laki Laki" class="form-check-input" id="customControlValidation1" name="jk" checked>
                                        <label class="form-check-label mb-0" for="customControlValidation1">Laki Laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" value="Perempuan" class="form-check-input" id="customControlValidation2" name="jk">
                                        <label class="form-check-label mb-0" for="customControlValidation2">Perempuan</label>
                                    </div>
                                <?php else : ?>
                                    <div class="form-check">
                                        <input type="radio" value="Laki Laki" class="form-check-input" id="customControlValidation1" name="jk" required>
                                        <label class="form-check-label mb-0" for="customControlValidation1">Laki Laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" value="Perempuan" class="form-check-input" id="customControlValidation2" name="jk" checked>
                                        <label class="form-check-label mb-0" for="customControlValidation2">Perempuan</label>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" value="<?= $row->tempat_lahir ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" value="<?= $row->tgl_lahir ?>">
                            </div>
                            <div class="form-group">
                                <label for="">No HP</label>
                                <input type="text" name="no_hp" class="form-control" value="<?= $row->no_hp ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select name="kelas" class="form-control">
                                    <option hidden value="<?= $row->id_kelas ?>"><?= $row->nama_kelas; ?></option>
                                    <?php tampil_kelas($mysqli); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Foto</label>
                                <input type="file" class="form-control" name="gambar">
                            </div>
                            <div class="form-group">
                                <label for="">Tahun Masuk</label>
                                <input type="text" name="tahun" class="form-control" value="<?= $row->thn_masuk ?>">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-primary" name="edit_anggota" type="submit"><i class="fas fa-save"></i> Simpan</button>
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

function simpan_anggota($nisn, $nm_lengkap,$no_hp, $jk, $tempat_lahir, $tanggal_lahir, $kelas, $tahun, $media, $encrypt_pass, $mysqli)
{
    $query = $mysqli->prepare("INSERT INTO anggota values ('$nisn','$nm_lengkap','$no_hp','$tempat_lahir','$tanggal_lahir','$jk','$kelas','$tahun','$media','$encrypt_pass')");
    $query->execute();
}

function edit_anggota($id, $nisn, $nama_lengkap, $jk, $tempat_lahir, $tgl, $no_hp, $kelas, $tahun, $gambar_baru, $mysqli)
{
    $query = $mysqli->prepare("UPDATE anggota SET nisn = '$nisn', nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl',jk = '$jk', id_kelas = '$kelas', thn_masuk = '$tahun', foto = '$gambar_baru', no_hp = '$no_hp' WHERE nisn = '$id'");
    $query->execute();
}

function hapus_anggota($nisn, $mysqli)
{
    $query = $mysqli->prepare("DELETE FROM anggota WHERE nisn = '$nisn'");
    $query->execute();
}


//===================================================FUNCTION ANGGOTA===================================================

// func data buku
function tampil_buku($mysqli)
{
    $query = $mysqli->prepare('SELECT * FROM buku WHERE jumlah_buku > 0');
    $query->execute();
    $result = $query->get_result();
    while ($row = $result->fetch_object()) {
    ?>
        <option value="<?= $row->id_buku ?>"><?= $row->judul_buku ?> - Stok : <?= $row->jumlah_buku ?></option>
    <?php
    }
}
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
            <td><?= $row->jumlah_buku; ?> <span class="text-primary" style="cursor: pointer;" data-toggle="modal" data-target="#tambahJumlahModal<?= $id ?>"><i class="fa fa-plus-circle m-t-5"></i></span></td>
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
                        <h5 class="modal-title" id="exampleModalLabel">Edit Buku</h5>
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
                                        <label>Kategori</label>
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
                                                    <input type='hidden' class='form-control' name='jenis_buku' value='{$rowKategK->id_mapel}' required readonly>
                                                    <input type='text' class='form-control' value='{$rowKategK->nama_mapel}' required readonly>
                                                ";
                                        } else if ($row->kategori_buku == 0 && !empty($row->jenis_buku)) {
                                            $queryKategK = $mysqli->prepare("SELECT * FROM mapel WHERE id_mapel='{$row->jenis_buku}'");
                                            $queryKategK->execute();
                                            $resultKategK = $queryKategK->get_result();
                                            $rowKategK = $resultKategK->fetch_object();
                                            echo "
                                                    <input type='hidden' class='form-control' name='jenis_buku' value='{$rowKategK->id_mapel}' required readonly>
                                                    <input type='text' class='form-control' value='{$rowKategK->nama_mapel}' required readonly>
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
            <!-- modal -->
            <div class="modal fade" id="tambahJumlahModal<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="tambahJumlahModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Jumlah Buku</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post">
                            <div class="modal-body">
                                <input type="hidden" name="token_edit_jumlah" value="<?= $token ?>">
                                <input type="hidden" name="id_buku" value="<?= $id ?>">
                                <div class="form-group">
                                    <label>Jumlah Buku Sebelumnya</label>
                                    <input type="number" class="form-control" name="jumlah_buku_sebelumnya" value="<?= $row->jumlah_buku ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tambah Jumlah Buku</label>
                                    <input type="number" class="form-control" name="jumlah_buku" placeholder="Masukkan Jumlah Buku" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" name="edit_jumlah_buku" class="btn btn-primary"><i class="fas fa-save"></i> Simpan </button>
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
    function edit_buku($id_buku, $kode_isbn, $judul_buku, $pengarang, $penerbit, $tahun_terbit, $kategori_buku, $jenis_buku, $jumlah_buku, $lokasi_buku, $mysqli)
    {
        $query = $mysqli->prepare("UPDATE buku SET kode_isbn='$kode_isbn', judul_buku='$judul_buku', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun_terbit',
                                            kategori_buku='$kategori_buku', jenis_buku='$jenis_buku', jumlah_buku='$jumlah_buku', lokasi_buku='$lokasi_buku' WHERE id_buku='$id_buku'");
        $query->execute();
    }


//function transaksi
function simpan_transaksi($nisn,$nuptk,$id_buku,$tgl_pinjam,$lama_hari,$jatuh_tempo,$mysqli){
    $query = $mysqli->prepare("INSERT INTO transaksi VALUES('','$id_buku','$nisn',$nuptk,'$tgl_pinjam','$lama_hari','$jatuh_tempo','','')");
    $query->execute();

    $q_update = $mysqli->query("SELECT * FROM buku WHERE id_buku = '$id_buku'");
    $row_buku = $q_update->fetch_assoc();
    $update = $mysqli->prepare("UPDATE buku SET jumlah_buku = '$row_buku[jumlah_buku]' - 1 WHERE id_buku = '$id_buku'");
    $update->execute();
    }
function kembali($id_buku, $id_transaksi, $tgl_kembali,$denda,$mysqli){
    $query = $mysqli->prepare("UPDATE transaksi SET tgl_kembali = '$tgl_kembali', denda = '$denda' WHERE id_transaksi = '$id_transaksi'");
    $query->execute();

    $q_update = $mysqli->query("SELECT * FROM buku WHERE id_buku = '$id_buku'");
    $row_buku = $q_update->fetch_assoc();
    $update = $mysqli->prepare("UPDATE buku SET jumlah_buku = '$row_buku[jumlah_buku]' + 1 WHERE id_buku = '$id_buku'");
    $update->execute();
}
function tampil_data_pinjam($mysqli){
    $nomor  =1;
    $query = $mysqli->prepare('SELECT * FROM transaksi JOIN buku ON transaksi.id_buku = buku.id_buku');
    $query->execute();
    $result = $query->get_result();
    while($row = $result->fetch_object()){
    ?>
        <tr>
            <td><?= $nomor++ ?></td>
            <td><?= $row->judul_buku; ?></td>
            <td>
                <?php 
                    if($row->nisn == '0'){
                        $query_guru = $mysqli->query("SELECT * FROM guru WHERE nuptk ='$row->nuptk'");
                        $row_guru = $query_guru->fetch_object();
                        echo $row_guru->nama_lengkap;
                    }else if($row->nuptk =='0'){
                        $query_anggota = $mysqli->query("SELECT * FROM anggota WHERE nisn ='$row->nisn'");
                        $row_anggota = $query_anggota->fetch_object();
                        echo $row_anggota->nama_lengkap;
                    }
                ?>
            </td>
            <td><?= tgl_indo($row->tgl_pinjam) ?></td>
            <td><?= tgl_indo($row->tgl_jatuh_tempo) ?></td>
            <td>
            <?php 
                if($row->tgl_kembali == 0){
                    echo '<div class="text-danger">Blm Dikembalikan</div>';
                }else{
                    echo tgl_indo($row->tgl_kembali);
                }
            ?>
            </td>
            <td>
            <?php
                 if($row->tgl_kembali == 0){
                    echo '<div class="badge badge-danger">Blm Dikembalikan</div>';
                }else{
                    echo '<div class="badge badge-success">Sdh Dikembalikan</div>';
                }
            ?>
            </td>
            <td>
            <?php
                 if($row->denda == 0){
                    echo '-';
                }else{
                    echo 'Denda Rp. '; echo number_format($row->denda);
                }
            ?>
            </td>
            <td>
            <?php if($row->tgl_kembali == 0): ?>
            <form action="" method="post">
                <input type="hidden" name="id_buku" value="<?= $row->id_buku ?>">
                <input type="hidden" name="id_transaksi" value="<?= $row->id_transaksi ?>">
                <input type="hidden" name="tgl_pinjam" value="<?= $row->tgl_pinjam ?>">
                <input type="hidden" name="lama" value="<?= $row->lama ?>">
                <button name="kembali" type="submit" class="btn btn-sm btn-success"><i class="fas fa-exchange-alt"></i> Kembalikan</button>
            </form>
            <?php else: ?>
                <div>-</div>
            <?php endif ?>                
            </td>
        </tr>
    <?php
    }
}
function edit_jumlah_buku($id_buku, $total_buku_sekarang, $mysqli)
{
    $query = $mysqli->prepare("UPDATE buku SET jumlah_buku='$total_buku_sekarang' WHERE id_buku='$id_buku'");
    $query->execute();
}
?>
