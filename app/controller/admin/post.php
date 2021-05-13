<?php
include 'app/controller/admin/function.php';
include 'app/flash_message.php';
include 'app/file_upload.php';

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
if(isset($_POST['simpan_anggota'])){
    $nisn = $_POST['nisn'];
    $nm_lengkap = $_POST['nama_lengkap'];
    $jk = $_POST['jk'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $kelas = $_POST['kelas'];
    $tahun = $_POST['tahun_masuk'];
    $media = upload_gambar();
        if(!$media) {
            return false;
        }

    simpan_anggota($nisn,$nm_lengkap,$jk,$tempat_lahir,$tanggal_lahir,$kelas,$tahun,$media,$mysqli);
    flash('msg_simpan_anggota','Data Anggota Berhasil Disimpan');
}

if(isset($_POST['edit_anggota'])){
    $id = $_POST['id'];
    $nisn = $_POST['nisn'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jk = $_POST['jk'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl = $_POST['tgl_lahir'];
    $kelas = $_POST['kelas'];
    $tahun = $_POST['tahun'];
    $gambar_sebelumnya = $_POST['gambars'];
    if ($_FILES['gambar']['error'] === 4) {   
        $gambar_baru = $gambar_sebelumnya;
    } else {
        $gambar_baru = upload_gambar();
        unlink("public/uploads/$gambar_sebelumnya");
    }
   
    edit_anggota($id,$nisn,$nama_lengkap,$jk,$tempat_lahir,$tgl,$kelas,$tahun,$gambar_baru,$mysqli);
    flash('msg_edit_anggota','Data Anggota Berhasil Diedit');
}

if(isset($_POST['hapus_anggota'])){
    $nisn = $_POST['nisn'];
    hapus_anggota($nisn,$mysqli);
    flash('msg_hapus_anggota','Data Berhasil Dihapus');
}   



?>