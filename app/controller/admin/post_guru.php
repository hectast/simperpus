<?php
include 'app/controller/admin/function_guru.php';
include 'app/flash_message.php';
include 'app/file_upload.php';

if (isset($_POST['simpan_guru'])) {
    $nuptk = $_POST['nuptk'];
    $nm_lengkap = $_POST['nama_lengkap'];
    $jk = $_POST['jk'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jabatan = $_POST['jabatan'];
    $tahun = $_POST['tahun_masuk'];
    $no_hp = $_POST['no_hp'];
    $pass = $nuptk;
    $username = $nuptk;
    $encrypt_pass = password_hash($pass, PASSWORD_DEFAULT);
    $media = upload_gambar();
    if (!$media) {
        return false;
    }

    simpan_guru($nuptk, $nm_lengkap, $no_hp, $jk, $tempat_lahir, $tanggal_lahir, $jabatan, $tahun, $media, $encrypt_pass, $username, $mysqli);
    flash('msg_simpan_guru', 'Data Guru Berhasil Disimpan');
}

if (isset($_POST['edit_guru'])) {
    $id = $_POST['id'];
    $nuptk = $_POST['nuptk'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jk = $_POST['jk'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl = $_POST['tgl_lahir'];
    $no_hp = $_POST['no_hp'];
    $jabatan = $_POST['jabatan'];
    $tahun = $_POST['tahun'];
    $gambar_sebelumnya = $_POST['gambars'];
    if ($_FILES['gambar']['error'] === 4) {
        $gambar_baru = $gambar_sebelumnya;
    } else {
        $gambar_baru = upload_gambar();
        unlink("public/uploads/$gambar_sebelumnya");
    }

    edit_guru($id, $nuptk, $nama_lengkap, $jk, $tempat_lahir, $tgl, $no_hp, $jabatan, $tahun, $gambar_baru, $mysqli);
    flash('msg_edit_guru', 'Data Guru Berhasil Diedit');
}

if (isset($_POST['hapus_guru'])) {
    $nuptk = $_POST['id'];
    hapus_guru($nuptk, $mysqli);
    flash('msg_hapus_guru', 'Data Berhasil Dihapus');
}
