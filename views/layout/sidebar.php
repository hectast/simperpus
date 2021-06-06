<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <?php if (isset($_GET['views_admin'])) : ?>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="beranda_admin" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Beranda</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Master Data </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="data_kelas" class="sidebar-link"><i class="fas fa-clipboard"></i><span class="hide-menu"> Data Kelas </span></a></li>
                        <li class="sidebar-item"><a href="data_anggota" class="sidebar-link"><i class="fas fa-users"></i><span class="hide-menu"> Data Anggota </span></a></li>
                        <li class="sidebar-item"><a href="data_guru" class="sidebar-link"><i class="fas fa-user"></i><span class="hide-menu"> Data Guru </span></a></li>
                        <li class="sidebar-item"><a href="data_buku" class="sidebar-link"><i class="fas fa-book"></i><span class="hide-menu"> Data Buku </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="peminjaman" aria-expanded="false"><i class="fas fa-address-book"></i><span class="hide-menu">Peminjaman</span></a></li>
                <?php else : ?>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="beranda" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Beranda</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="daftar_buku" aria-expanded="false"><i class="mdi mdi-book"></i><span class="hide-menu">Daftar Buku</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="daftar_peminjaman" aria-expanded="false"><i class="mdi mdi-book-open"></i><span class="hide-menu">Daftar Peminjaman</span></a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
