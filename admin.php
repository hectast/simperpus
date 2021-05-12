<?php
// error_reporting(0);
include 'app/env.php';
include 'base_url.php';

if(isset($_GET['views_admin']) && $_GET['views_admin'] == 'beranda_admin'){
    $title = 'Beranda';
    $icon = 'fas fa-tv';
}else if(isset($_GET['views_admin']) && $_GET['views_admin'] == 'data_anggota'){
    $title = 'Data Anggota';
    $icon = 'fas fa-user';
}else if(isset($_GET['views_admin']) && $_GET['views_admin'] == 'data_kelas'){
    $title = 'Data Kelas';
    $icon = 'fas fa-clipboard';
}else if(isset($_GET['views_admin']) && $_GET['views_admin'] == 'blank_page'){
    $title = 'Blank Page';
    $icon = 'fas fa-file';
}else if(isset($_GET['views_admin']) && $_GET['views_admin'] == 'data_buku'){
    $title = 'Data Buku';
    $icon = 'fas fa-book';
}else if(isset($_GET['views_admin']) && $_GET['views_admin'] == 'data_mapel'){
    $title = 'Data Mata Pelajaran';
    $icon = 'fas fa-bookmark';
}else{
    $title = 'Beranda';
    $icon = 'fas fa-tv';
}




include 'views/layout/header.php';
include 'views/layout/navbar.php';
include 'views/layout/sidebar.php';





if(isset($_GET['views_admin']) && $_GET['views_admin'] == 'beranda_admin'){
    include 'views/pages/admin/beranda.php';
}else if(isset($_GET['views_admin']) && $_GET['views_admin'] == 'blank_page'){
    include 'views/pages/blankpage.php';
}else if(isset($_GET['views_admin']) && $_GET['views_admin'] == 'data_anggota'){
    include 'views/pages/admin/data_anggota.php';
}else if(isset($_GET['views_admin']) && $_GET['views_admin'] == 'data_kelas'){
    include 'views/pages/admin/data_kelas.php';
}else if(isset($_GET['views_admin']) && $_GET['views_admin'] == 'data_buku'){
    include 'views/pages/admin/data_buku.php';
}else if(isset($_GET['views_admin']) && $_GET['views_admin'] == 'data_mapel'){
    include 'views/pages/admin/data_mapel.php';
}else{
    include 'views/pages/admin/beranda.php';
}


include 'views/layout/footer.php';

?>