<?php require_once '../../../app/env.php'; ?>
<div class="form-group mt-3" id="option_anggota">
    <label>Nama Siswa</label>
    <select class="form-control opt" name="nisn" style="width: 100%;">
        <option hidden>Pilih Peminjam</option>
        <?php
            $query = $mysqli->query("SELECT * FROM anggota");
            while($row = $query->fetch_assoc()){
                echo"
                    <option value='{$row['nisn']}'>{$row['nisn']} - {$row['nama_lengkap']}</option>
                ";
            }
        ?>
    </select>
</div>
<script src="../../../public/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../../../public/assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="../../../public/assets/libs/select2/dist/js/select2.min.js"></script>
<script>
$('.opt').select2();
</script>