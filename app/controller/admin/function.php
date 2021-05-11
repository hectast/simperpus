<?php

function tampil_data_kelas($mysqli){
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
                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal<?=$id?>"><i class="fas fa-edit"></i></button>
                    <button type="submit" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')" name="hapus_kelas" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        <!-- modal -->
        <div class="modal fade" id="exampleModal<?=$id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input class="form-control" type="text" name="nama_kelas" value="<?= $row->nama_kelas?>">
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
function simpan_kelas($nama_kelas, $mysqli){
    $query = $mysqli->prepare("INSERT INTO kelas (nama_kelas) VALUES ('$nama_kelas')");
    $query->execute();
}
function hapus_kelas($id_kelas, $mysqli){
    $query = $mysqli->prepare("DELETE FROM kelas WHERE id_kelas = '$id_kelas'");
    $query->execute();
}
function edit_kelas($id_kelas,$nama_kelas,$mysqli){
    $query = $mysqli->prepare("UPDATE kelas SET nama_kelas = '$nama_kelas' WHERE id_kelas ='$id_kelas'");
    $query->execute();
}

?>