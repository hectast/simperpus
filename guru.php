<?php
session_start();

include 'app/env.php';
include 'app/session.php';
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
} else if (isset($_SESSION['unique_user']) && $_SESSION['type_user'] == "admin") {
?>
    <script>
        alert('Anda tidak mempunyai akses ke halaman ini!');
        window.location.href = 'beranda_admin';
    </script>
<?php
    return false;
}
include 'app/get_data.php';
include 'base_url.php';

if (isset($_GET['views_guru']) && $_GET['views_guru'] == 'beranda_guru') {
    $title = 'Beranda';
    $icon = 'mdi mdi-view-dashboard';
} else if (isset($_GET['views_guru']) && $_GET['views_guru'] == 'daftar_buku_guru') {
    $title = 'Daftar Buku';
    $icon = 'mdi mdi-book';
} else if (isset($_GET['views_guru']) && $_GET['views_guru'] == 'daftar_peminjaman_guru') {
    $title = 'Daftar Peminjaman';
    $icon = 'mdi mdi-book-open';
} else {
    $title = 'Beranda';
    $icon = 'mdi mdi-view-dashboard';
}

include 'views/layout/header.php';
include 'views/layout/navbar.php';
include 'views/layout/sidebar.php';

if (isset($_GET['views_guru']) && $_GET['views_guru'] == 'beranda_guru') {
    include 'views/pages/guru/beranda.php';
} else if (isset($_GET['views_guru']) && $_GET['views_guru'] == 'daftar_buku_guru') {
    include 'views/pages/guru/daftar_buku.php';
} else if (isset($_GET['views_guru']) && $_GET['views_guru'] == 'daftar_peminjaman_guru') {
    include 'views/pages/guru/daftar_peminjaman.php';
} else {
    include 'views/pages/guru/beranda.php';
}

include 'views/layout/footer.php';
?>