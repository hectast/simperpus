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
function tampil_data_anggota($mysqli)
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
                            <div class="col-5">
                                <div>
                                    <img src="public/uploads/<?= $row->foto ?>" width="100%" height="350px" alt="">
                                </div>
                            </div>

                            <div class="col-7">
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

function simpan_anggota($nisn, $nm_lengkap, $jk, $tempat_lahir, $tanggal_lahir, $kelas, $tahun, $media, $mysqli)
{
    $query = $mysqli->prepare("INSERT INTO anggota values ('$nisn','$nm_lengkap','$tempat_lahir','$tanggal_lahir','$jk','$kelas','$tahun','$media')");
    $query->execute();
}

function edit_anggota($id, $nisn, $nama_lengkap, $jk, $tempat_lahir, $tgl, $kelas, $tahun, $gambar_baru, $mysqli)
{
    $query = $mysqli->prepare("UPDATE anggota SET nisn = '$nisn', nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl',jk = '$jk', id_kelas = '$kelas', thn_masuk = '$tahun', foto = '$gambar_baru' WHERE nisn = '$id'");
    $query->execute();
}

function hapus_anggota($nisn, $mysqli)
{
    $query = $mysqli->prepare("DELETE FROM anggota WHERE nisn = '$nisn'");
    $query->execute();
}


//===================================================FUNCTION ANGGOTA===================================================
?>