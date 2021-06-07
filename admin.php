<?php
session_start();
// error_reporting(0);
include 'app/env.php';
include 'app/session.php';
$base_url = 'https://localhost/simperpus/';

if (!isset($_SESSION['unique_user'])) {
?>
    <script>
        alert('Anda harus login untuk mengakses halaman ini!');
        window.location.href = 'login';
    </script>
<?php
    return false;
}

if (isset($_SESSION['unique_user']) && $_SESSION['type_user'] == "anggota") {
?>
    <script>
        alert('Anda tidak mempunyai akses ke halaman ini!');
        window.location.href = 'beranda';
    </script>
<?php
    return false;
} else if (isset($_SESSION['unique_user']) && $_SESSION['type_user'] == "guru") {
?>
    <script>
        alert('Anda tidak mempunyai akses ke halaman ini!');
        window.location.href = 'beranda_guru';
    </script>
<?php
    return false;
}

include 'app/get_data.php';

if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'cetak_anggota') {
    include 'views/pages/admin/cetak_anggota.php';
} else if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'cetak_buku') {
    include 'views/pages/admin/cetak_buku.php';
} else if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'cetak_transaksi') {
    include 'views/pages/admin/cetak_transaksi.php';
} else if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'cetak_guru') {
    include 'views/pages/admin/cetak_guru.php';
} else {


    if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'beranda_admin') {
        $title = 'Beranda';
        $icon = 'mdi mdi-view-dashboard';
    } else if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'data_anggota') {
        $title = 'Data Anggota';
        $icon = 'fas fa-users';
    } else if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'data_guru') {
        $title = 'Data Guru';
        $icon = 'fas fa-user';
    } else if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'data_kelas') {
        $title = 'Data Kelas';
        $icon = 'fas fa-clipboard';
    } else if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'blank_page') {
        $title = 'Blank Page';
        $icon = 'fas fa-file';
    } else if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'data_buku') {
        $title = 'Data Buku';
        $icon = 'fas fa-book';
    } else if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'data_non_buku') {
        $title = 'Data Non Buku';
        $icon = 'fas fa-box';
    } else if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'peminjaman') {
        $title = 'Peminjaman';
        $icon = 'fas fa-address-book';
    } else {
        $title = 'Beranda';
        $icon = 'mdi mdi-view-dashboard';
    }


    include 'views/layout/header.php';
    include 'views/layout/navbar.php';
    include 'views/layout/sidebar.php';





    if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'beranda_admin') {
        include 'views/pages/admin/beranda.php';
    } else if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'blank_page') {
        include 'views/pages/blankpage.php';
    } else if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'data_anggota') {
        include 'views/pages/admin/data_anggota.php';
    } else if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'data_guru') {
        include 'views/pages/admin/data_guru.php';
    } else if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'data_kelas') {
        include 'views/pages/admin/data_kelas.php';
    } else if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'data_buku') {
        include 'views/pages/admin/data_buku.php';
    } else if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'data_non_buku') {
        include 'views/pages/admin/data_non_buku.php';
    } else if (isset($_GET['views_admin']) && $_GET['views_admin'] == 'peminjaman') {
        include 'views/pages/admin/peminjaman.php';
    } else {
        include 'views/pages/admin/beranda.php';
    }


    include 'views/layout/footer.php';
}

?>