<?php require_once '../../../app/env.php'; ?>
<div class="form-group mt-3" id="kategKlasifikasi">
    <label>Jenis Buku</label>
    <select class="form-control" name="jenis_buku" style="width: 100%;">
        <option hidden>Pilih Jenis Buku</option>
        <?php
            $queryKategK = $mysqli->prepare("SELECT * FROM mapel WHERE klasifikasi=1");
            $queryKategK->execute();
            $resultKategK = $queryKategK->get_result();
            while($rowKategK = $resultKategK->fetch_object()){
                echo"
                    <option value='{$rowKategK->id_mapel}'>{$rowKategK->nama_mapel}</option>
                ";
            }
        ?>
    </select>
</div>