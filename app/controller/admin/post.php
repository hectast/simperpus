<?php
include 'app/controller/admin/function.php';
include 'app/flash_message.php';

if(isset($_POST['simpan_kelas'])){
   $nama_kelas = $_POST['nama_kelas'];
   simpan_kelas($nama_kelas,$mysqli);
   flash('msg_simpan_kelas','Data Berhasil Disimpan');
}
if(isset($_POST['hapus_kelas'])){
    $token_hapus = $_POST['token_hapus'];
    $id_kelas = $_POST['id_kelas'];
    $tkn = 'hectast2k21';
    $token = md5("$tkn:$id_kelas");

    if ($token_hapus === $token) {
        hapus_kelas($id_kelas,$mysqli);
        flash('msg_hapus_kelas','Data Berhasil Dihapus');
    }
}
if(isset($_POST['edit_kelas'])){
    $token_edit = $_POST['token_edit'];
    $id_kelas = $_POST['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];
    $tkn = 'hectast2k21';
    $token = md5("$tkn:$id_kelas");
    if ($token_edit === $token) {
        edit_kelas($id_kelas,$nama_kelas,$mysqli);
        flash('msg_edit_kelas','Data Berhasil Diedit');
    }
}


?>