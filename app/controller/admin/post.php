<?php
include 'app/controller/admin/function.php';
include 'app/flash_message.php';
include 'app/file_upload.php';

if (isset($_POST['simpan_kelas'])) {
    $nama_kelas = $_POST['nama_kelas'];
    simpan_kelas($nama_kelas, $mysqli);
    flash('msg_simpan_kelas', 'Data Berhasil Disimpan');
}
if (isset($_POST['hapus_kelas'])) {
    $token_hapus = $_POST['token_hapus'];
    $id_kelas = $_POST['id_kelas'];
    $tkn = 'hectast2k21';
    $token = md5("$tkn:$id_kelas");

    if ($token_hapus === $token) {
        hapus_kelas($id_kelas, $mysqli);
        flash('msg_hapus_kelas', 'Data Berhasil Dihapus');
    }
}
if (isset($_POST['edit_kelas'])) {
    $token_edit = $_POST['token_edit'];
    $id_kelas = $_POST['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];
    $tkn = 'hectast2k21';
    $token = md5("$tkn:$id_kelas");
    if ($token_edit === $token) {
        edit_kelas($id_kelas, $nama_kelas, $mysqli);
        flash('msg_edit_kelas', 'Data Berhasil Diedit');
    }
}
if (isset($_POST['simpan_anggota'])) {
    $nisn = $_POST['nisn'];
    $nm_lengkap = $_POST['nama_lengkap'];
    $jk = $_POST['jk'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $kelas = $_POST['kelas'];
    $tahun = $_POST['tahun_masuk'];
    $no_hp = $_POST['no_hp'];
    $pass = $nisn;
    $encrypt_pass = password_hash($pass, PASSWORD_DEFAULT);
    $media = upload_gambar();
    if (!$media) {
        return false;
    }

    simpan_anggota($nisn, $nm_lengkap,$no_hp, $jk, $tempat_lahir, $tanggal_lahir, $kelas, $tahun, $media, $encrypt_pass, $mysqli);
    flash('msg_simpan_anggota', 'Data Anggota Berhasil Disimpan');
}

if (isset($_POST['edit_anggota'])) {
    $id = $_POST['id'];
    $nisn = $_POST['nisn'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jk = $_POST['jk'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $no_hp = $_POST['no_hp'];
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

    edit_anggota($id, $nisn, $nama_lengkap, $jk, $tempat_lahir, $tgl,$no_hp, $kelas, $tahun, $gambar_baru, $mysqli);
    flash('msg_edit_anggota', 'Data Anggota Berhasil Diedit');
}

if (isset($_POST['hapus_anggota'])) {
    $nisn = $_POST['nisn'];
    hapus_anggota($nisn, $mysqli);
    flash('msg_hapus_anggota', 'Data Berhasil Dihapus');
}

// post data buku
if (isset($_POST['simpan_buku'])) {
    $kode_isbn = $_POST['kode_isbn'];
    $judul_buku = $_POST['judul_buku'];
    $kategori = $_POST['kategori'];
    $klasifikasi = $_POST['klasifikasi'];
    $jumlah_buku = $_POST['jumlah_buku'];
    $harga_satuan = $_POST['harga_satuan'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tempat_terbit = $_POST['tempat_terbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $jilid_edisi = $_POST['jilid_edisi'];
    $sumber_dana = $_POST['sumber_dana'];
    $tanggal_input = date("Y-m-d H:i:s");

    $query = $mysqli->query("SELECT * FROM buku WHERE kode_klasifikasi='$klasifikasi'");
    
    if (mysqli_num_rows($query) == 0) {
        $cek_no_buku = $klasifikasi."0";
        
        $urutan = (int) substr($cek_no_buku, 1, 3);
        $urutan++;
        
        $kode_klasifikasi = $klasifikasi;
        $potong_kode = substr($kode_klasifikasi, 0, -2);
        
        $no_buku = $potong_kode . sprintf("%03s", $urutan);
        // echo $no_buku;
    } else {
        $query2 = $mysqli->query("SELECT max(no_buku) AS kode_terbesar, kode_klasifikasi FROM buku WHERE kode_klasifikasi='$klasifikasi'");
        $row2 = $query2->fetch_assoc();

        $cek_no_buku = $row2['kode_terbesar'];

        $urutan = (int) substr($cek_no_buku, 1, 3);
        $urutan++;
    
        $kode_klasifikasi = $row2['kode_klasifikasi'];
        $potong_kode = substr($kode_klasifikasi, 0, -2);
        
        $no_buku = $potong_kode . sprintf("%03s", $urutan);
        // echo $no_buku;
    }

    simpan_buku($kode_isbn, $judul_buku, $kategori, $klasifikasi, $jumlah_buku, $harga_satuan, $pengarang, $penerbit, $tempat_terbit, $tahun_terbit, $jilid_edisi, $sumber_dana, $tanggal_input, $no_buku, $mysqli);
    flash('msg_simpan_buku', 'Data Berhasil Disimpan');
}
if (isset($_POST['hapus_buku'])) {
    $token_hapus = $_POST['token_hapus'];
    $id_buku = $_POST['id_buku'];
    $tkn = 'hectast2k21';
    $token = md5("$tkn:$id_buku");

    if ($token_hapus === $token) {
        hapus_buku($id_buku, $mysqli);
        flash('msg_hapus_buku', 'Data Berhasil Dihapus');
    }
}
if (isset($_POST['edit_buku'])) {
    // $nomor_jenis_buku = $_POST['nomor_jenis_buku'];
    $token_edit = $_POST['token_edit'];
    $id_buku = $_POST['id_buku'];
    $nbk = $_POST['no_buku'];
    $kode_isbn = $_POST['kode_isbn'];
    $judul_buku = $_POST['judul_buku'];
    $kategori = $_POST['kategori'];
    $klasifikasi = $_POST['klasifikasi'];
    $jumlah_buku = $_POST['jumlah_buku'];
    $harga_satuan = $_POST['harga_satuan'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tempat_terbit = $_POST['tempat_terbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $jilid_edisi = $_POST['jilid_edisi'];
    $sumber_dana = $_POST['sumber_dana'];

    $cek_kode = $mysqli->query("SELECT * FROM buku WHERE kode_klasifikasi='$klasifikasi' AND no_buku='$nbk'");

    if (mysqli_num_rows($cek_kode) == 0) {
        $query = $mysqli->query("SELECT * FROM buku WHERE kode_klasifikasi='$klasifikasi'");
    
        if (mysqli_num_rows($query) == 0) {
            $cek_no_buku = $klasifikasi."0";
            
            $urutan = (int) substr($cek_no_buku, 1, 3);
            $urutan++;
            
            $kode_klasifikasi = $klasifikasi;
            $potong_kode = substr($kode_klasifikasi, 0, -2);
            
            $no_buku = $potong_kode . sprintf("%03s", $urutan);
            // echo $no_buku;
        } else {
            $query2 = $mysqli->query("SELECT max(no_buku) AS kode_terbesar, kode_klasifikasi FROM buku WHERE kode_klasifikasi='$klasifikasi' ");
            $row2 = $query2->fetch_assoc();
    
            $cek_no_buku = $row2['kode_terbesar'];
    
            $urutan = (int) substr($cek_no_buku, 1, 3);
            $urutan++;
        
            $kode_klasifikasi = $row2['kode_klasifikasi'];
            $potong_kode = substr($kode_klasifikasi, 0, -2);
            
            $no_buku = $potong_kode . sprintf("%03s", $urutan);
            // echo $no_buku;
        }
    } else {
        $no_buku = $nbk;
    }

    $tkn = 'hectast2k21';
    $token = md5("$tkn:$id_buku");

    // var_dump($jenis_buku);

    if ($token_edit === $token) {
        edit_buku($id_buku, $kode_isbn, $judul_buku, $kategori, $klasifikasi, $jumlah_buku, $harga_satuan, $pengarang, $penerbit, $tempat_terbit, $tahun_terbit, $jilid_edisi, $sumber_dana, $no_buku, $mysqli);

        flash('msg_edit_buku','Data Berhasil Diedit');
    }
}
if (isset($_POST['edit_jumlah_buku'])) {
    $token_edit_jumlah = $_POST['token_edit_jumlah'];
    $id_buku = $_POST['id_buku'];
    $jumlah_buku_sebelumnya = $_POST['jumlah_buku_sebelumnya'];
    $jumlah_buku = $_POST['jumlah_buku'];
    $total_buku_sekarang = $jumlah_buku_sebelumnya+$jumlah_buku;
    $tkn = 'hectast2k21';
    $token = md5("$tkn:$id_buku");

    // var_dump($jenis_buku);

    if ($token_edit_jumlah === $token) {
        edit_jumlah_buku($id_buku, $total_buku_sekarang, $mysqli);
        flash('msg_edit_jumlah_buku','Data Berhasil Diedit');
    }
}

if (isset($_POST['tambah_transaksi'])) {
    $nisn = isset($_POST['nisn']) ? $_POST['nisn'] : '0';
    $nuptk = isset($_POST['nuptk']) ? $_POST['nuptk'] : '0';
    $id_buku = $_POST['id_buku'];
    $lama_hari = $_POST['lama_hari'];
    $tgl_pinjam = date('Y-m-d');
    $tgl_jth = strtotime("+" . $lama_hari . "day", strtotime($tgl_pinjam));
    $jatuh_tempo = date('Y-m-d', $tgl_jth);

    simpan_transaksi($nisn,$nuptk, $id_buku, $tgl_pinjam, $lama_hari, $jatuh_tempo, $mysqli);
    flash('msg_simpan_pinjam', 'Data Peminjaman Berhasil Disimpan');
}
if (isset($_POST['kembali'])) {
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $id_transaksi = $_POST['id_transaksi'];
    $lama = $_POST['lama'];
    date_default_timezone_set('Asia/Jakarta');

    $tgl_kembali = date('Y-m-d');
    $awal = date_create($tgl_pinjam);
    $akhir = date_create($tgl_kembali);

 
    $diff  = date_diff($awal, $akhir);


    $selisih = $diff->days;
    echo $selisih;

    if ($selisih > $lama) {
        $terlambat = $selisih - $lama;
        $denda = $terlambat*1000;
    }else{
        $denda = 0;
    }
    kembali($id_buku, $id_transaksi, $tgl_kembali,$denda,$mysqli);
    flash('msg_kembali','Buku Berhasil Dikembalikan');

}
