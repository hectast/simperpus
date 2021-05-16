<?php
include 'app/env.php';
include 'base_url.php';

if (isset($_GET['views_user']) && $_GET['views_user'] == 'beranda') {
    $title = 'Beranda';
    $icon = 'mdi mdi-view-dashboard';
} else if (isset($_GET['views_user']) && $_GET['views_user'] == 'daftar_buku') {
    $title = 'Daftar Buku';
    $icon = 'mdi mdi-book';
} else if (isset($_GET['views_user']) && $_GET['views_user'] == 'daftar_peminjaman') {
    $title = 'Daftar Peminjaman';
    $icon = 'mdi mdi-book-open';
} else {
    $title = 'Beranda';
    $icon = 'mdi mdi-view-dashboard';
}

include 'views/layout/header.php';
include 'views/layout/navbar.php';
include 'views/layout/sidebar.php';

if (isset($_GET['views_user']) && $_GET['views_user'] == 'beranda') {
    include 'views/pages/user/beranda.php';
} else if (isset($_GET['views_user']) && $_GET['views_user'] == 'daftar_buku') {
    include 'views/pages/user/daftar_buku.php';
} else if (isset($_GET['views_user']) && $_GET['views_user'] == 'daftar_peminjaman') {
    include 'views/pages/user/daftar_peminjaman.php';
} else {
    include 'views/pages/user/beranda.php';
}

include 'views/layout/footer.php';
?>