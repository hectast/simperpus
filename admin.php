<?php
include 'app/env.php';
include 'base_url.php';

if($_GET['views_admin'] == 'beranda_admin'){
    $title = 'Beranda';
    $icon = 'fas fa-tv';
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
}else{
    include 'views/pages/admin/beranda.php';
}


include 'views/layout/footer.php';

?>