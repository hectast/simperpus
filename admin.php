<?php
// error_reporting(0);
include 'app/env.php';
include 'base_url.php';

if($_GET['views_admin'] == 'beranda_admin'){
    $title = 'Beranda';
    $icon = 'fas fa-tv';
} else if($_GET['views_admin'] == 'data_anggota'){
    $title = 'Data Anggota';
    $icon = 'fas fa-user';
} else if($_GET['views_admin'] == 'data_kelas'){
    $title = 'Data Kelas';
    $icon = 'fas fa-clipboard';
} else if($_GET['views_admin'] == 'blank_page'){
    $title = 'Blank Page';
    $icon = 'fas fa-file';
}




include 'views/layout/header.php';
include 'views/layout/navbar.php';
include 'views/layout/sidebar.php';





if($_GET['views_admin'] == 'beranda_admin'){
    include 'views/pages/admin/beranda.php';
}else if($_GET['views_admin'] == 'blank_page'){
    include 'views/pages/blankpage.php';
}else if($_GET['views_admin'] == 'data_anggota'){
    include 'views/pages/admin/data_anggota.php';
}else if($_GET['views_admin'] == 'data_kelas'){
    include 'views/pages/admin/data_kelas.php';
}else{
    include 'views/pages/admin/beranda.php';
}


include 'views/layout/footer.php';

?>