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


// post data mapel
if(isset($_POST['simpan_mapel'])){
    $nama_mapel = $_POST['nama_mapel'];
    $klasifikasi = isset($_POST['klasifikasi']) ? $_POST['klasifikasi'] : 0;
    simpan_mapel($nama_mapel, $klasifikasi, $mysqli);
    flash('msg_simpan_mapel','Data Berhasil Disimpan');
}
if(isset($_POST['hapus_mapel'])){
    $token_hapus = $_POST['token_hapus'];
    $id_mapel = $_POST['id_mapel'];
    $tkn = 'hectast2k21';
    $token = md5("$tkn:$id_mapel");

    if ($token_hapus === $token) {
        hapus_mapel($id_mapel,$mysqli);
        flash('msg_hapus_mapel','Data Berhasil Dihapus');
    }
}
if(isset($_POST['edit_mapel'])){
    $token_edit = $_POST['token_edit'];
    $id_mapel = $_POST['id_mapel'];
    $nama_mapel = $_POST['nama_mapel'];
    $klasifikasi = isset($_POST['klasifikasi']) ? $_POST['klasifikasi'] : 0;

    $tkn = 'hectast2k21';
    $token = md5("$tkn:$id_mapel");
    if ($token_edit === $token) {
        edit_mapel($id_mapel, $nama_mapel, $klasifikasi, $mysqli);
        flash('msg_edit_mapel','Data Berhasil Diedit');
    }
}

// post data buku
if(isset($_POST['simpan_buku'])){
    $kode_isbn = $_POST['kode_isbn'];
    $judul_buku = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori_buku = $_POST['kategori_buku'];
    $jenis_buku = $_POST['jenis_buku'];
    $jumlah_buku = $_POST['jumlah_buku'];
    $lokasi_buku = $_POST['lokasi_buku'];
    $tanggal_input = date("Y-m-d H:i:s");

    simpan_buku($kode_isbn, $judul_buku, $pengarang, $penerbit, $tahun_terbit, $kategori_buku, $jenis_buku, $jumlah_buku, $lokasi_buku, $tanggal_input, $mysqli);
    flash('msg_simpan_buku','Data Berhasil Disimpan');
}
if(isset($_POST['hapus_buku'])){
    $token_hapus = $_POST['token_hapus'];
    $id_buku = $_POST['id_buku'];
    $tkn = 'hectast2k21';
    $token = md5("$tkn:$id_buku");

    if ($token_hapus === $token) {
        hapus_buku($id_buku,$mysqli);
        flash('msg_hapus_buku','Data Berhasil Dihapus');
    }
}
if (isset($_POST['edit_buku'])) {
    // $nomor_jenis_buku = $_POST['nomor_jenis_buku'];
    $token_edit = $_POST['token_edit'];
    $id_buku = $_POST['id_buku'];
    $kode_isbn = $_POST['kode_isbn'];
    $judul_buku = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori_buku = $_POST['kategori_buku'];
    // $jenis_buku = $_POST['jenis_buku'.$nomor_jenis_buku];
    $jenis_buku = $_POST['jenis_buku'];
    $jumlah_buku = $_POST['jumlah_buku'];
    $lokasi_buku = $_POST['lokasi_buku'];
    $tkn = 'hectast2k21';
    $token = md5("$tkn:$id_buku");

    // var_dump($jenis_buku);

    // if ($token_edit === $token) {
    //     edit_buku($id_buku, $kode_isbn, $judul_buku, $pengarang, $penerbit, $tahun_terbit, $kategori_buku, $jenis_buku, $jumlah_buku, $lokasi_buku, $mysqli);
    //     flash('msg_edit_buku','Data Berhasil Diedit');
    // }
}

?>