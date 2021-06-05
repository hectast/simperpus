<?php

function simpan_guru($nuptk, $nm_lengkap, $no_hp, $jk, $tempat_lahir, $tanggal_lahir, $jabatan, $tahun, $media, $encrypt_pass, $mysqli)
{
    $query = $mysqli->prepare("INSERT INTO guru values ('$nuptk','$nm_lengkap','$no_hp','$tempat_lahir','$tanggal_lahir','$jk','$jabatan','$tahun','$media','$encrypt_pass')");
    $query->execute();
}

function edit_guru($id, $nuptk, $nama_lengkap, $jk, $tempat_lahir, $tgl,$no_hp, $jabatan, $tahun, $gambar_baru, $mysqli){
    $query = $mysqli->prepare("UPDATE guru SET nuptk = '$nuptk', nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl',jk = '$jk', jabatan = '$jabatan', thn_masuk = '$tahun', foto = '$gambar_baru', no_hp = '$no_hp' WHERE nuptk = '$id'");
    $query->execute();
}

function hapus_guru($nuptk, $mysqli)
{
    $query = $mysqli->prepare("DELETE FROM guru WHERE nuptk = '$nuptk'");
    $query->execute();
}

function tampil_data_guru($mysqli)
{
    $nomor = 1;
    $query = $mysqli->query("SELECT * FROM guru");
    while ($r = $query->fetch_assoc()) {
?>

        <tr>
            <td><?= $nomor++; ?></td>
            <td><?= $r['nuptk'] ?></td>
            <td><?= $r['nama_lengkap'] ?></td>
            <td><?= $r['jk'] ?></td>
            <td><?= $r['jabatan'] ?></td>
            <td>
                <form action="" method="post">
                    <input name="id" type="hidden" value="<?= $r['nuptk']; ?>">
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#bio<?= $r['nuptk'] ?>"><i class="fas fa-id-card"></i></button>
                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $r['nuptk'] ?>"><i class="fas fa-edit"></i></button>
                    <button type="submit" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')" name="hapus_guru" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        

          <div class="modal fade" id="bio<?= $r['nuptk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <img src="public/uploads/<?= $r['foto'] ?>" width="100%" height="350px" alt="">
                                </div>
                            </div>

                            <div class="col-8">
                                <div class="row p-3 bg-light">
                                    <div class="col-4">
                                        NUPTK
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-7">
                                        <?= $r['nuptk']; ?>
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
                                        <?= $r['nama_lengkap'] ?>
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
                                        <?= $r['no_hp'] ?>
                                    </div>
                                </div>
                                <div class="row p-3">
                                    <div class="col-4">
                                        Tempat - Tanggal Lahir
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-7">
                                        <?= $r['tempat_lahir']; ?> - <?= tgl_indo($r['tgl_lahir']); ?>
                                    </div>
                                </div>
                                <div class="row p-3 bg-light">
                                    <div class="col-4">
                                        Jenis Kelamin
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-7">
                                        <?= $r['jk'] ?>
                                    </div>
                                </div>
                                <div class="row p-3">
                                    <div class="col-4">
                                        Jabatan
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-7">
                                        <?= $r['jabatan']; ?>
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
                                        <?= $r['thn_masuk']; ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php include 'base_url.php'; ?>
                        <a href="<?= $base_url; ?>app/controller/cetak/cetak_kartu_guru.php?id=<?= $r['nuptk'];?>" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
                    </div>
                </div>
            </div>
          </div>

          <div class="modal fade" id="edit<?= $r['nuptk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Guru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="">NUPTK</label>
                                <input type="text" class="form-control" name="nuptk" value="<?= $r['nuptk'] ?>">
                                <input type="hidden" name="gambars" value="<?= $r['foto']; ?>">
                                <input type="hidden" name="id" value="<?= $r['nuptk']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="<?= $r['nama_lengkap'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <?php if ($r['jk'] == 'Laki Laki') : ?>
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
                                <input type="text" name="tempat_lahir" class="form-control" value="<?= $r['tempat_lahir'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" value="<?= $r['tgl_lahir'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">No HP</label>
                                <input type="text" name="no_hp" class="form-control" value="<?= $r['no_hp'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" value="<?= $r['jabatan'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Foto</label>
                                <input type="file" class="form-control" name="gambar">
                            </div>
                            <div class="form-group">
                                <label for="">Tahun Masuk</label>
                                <input type="text" name="tahun" class="form-control" value="<?= $r['thn_masuk'] ?>">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-primary" name="edit_guru" type="submit"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}

?>