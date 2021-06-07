<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title"><i class="<?= $icon ?>"></i> <?= $title ?></h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- batas -->
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <a href="data_buku" class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-book"></i></h1>
                        <h4 class="text-white">
                            <?php
                            $query1 = $mysqli->query("SELECT sum(jumlah_buku) AS total_buku FROM buku");
                            $row1 = $query1->fetch_assoc();
                            echo $row1['total_buku'];
                            ?>
                        </h4>
                        <h6 class="text-white">Buku</h6>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="data_anggota" class="card card-hover">
                    <div class="box bg-success text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-account"></i></h1>
                        <h4 class="text-white">
                            <?php
                            $query2 = $mysqli->query("SELECT * FROM anggota");
                            echo mysqli_num_rows($query2);
                            ?>
                        </h4>
                        <h6 class="text-white">Anggota</h6>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="data_guru" class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-account"></i></h1>
                        <h4 class="text-white">
                        <?php
                            $query5 = $mysqli->query("SELECT * FROM guru");
                            echo mysqli_num_rows($query5);
                            ?>
                        </h4>
                        <h6 class="text-white">Guru</h6>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-4">
                <div class="card card-hover">
                    <div class="box bg-warning text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-book-open-variant"></i></h1>
                        <h4 class="text-white">
                            <?php $query3 = $mysqli->query("SELECT * FROM transaksi");
                            echo mysqli_num_rows($query3); ?>
                        </h4>
                        <h6 class="text-white">Peminjaman</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4">
                <a class="card card-hover">
                    <div class="box bg-primary text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-library-books"></i></h1>
                        <h4 class="text-white">
                            <?php $query4 = $mysqli->query("SELECT * FROM transaksi WHERE tgl_kembali ='0'");
                            echo mysqli_num_rows($query4); ?>
                        </h4>
                        <h6 class="text-white">Buku Yang Belum Dikembalikan</h6>
                    </div>
                </a>
            </div>

            <!-- Column -->
            <div class="col-md-6 col-lg-4">
                <div class="card card-hover">
                    <div class="box bg-secondary text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-clock-alert"></i></h1>
                        <h4 class="text-white">
                            Rp. <?php
                                $query = $mysqli->query("SELECT sum(denda) AS val_sum FROM transaksi");
                                while ($row = $query->fetch_assoc()) {
                                    echo number_format($row['val_sum']);
                                }
                                ?>
                        </h4>
                        <h6 class="text-white">Denda</h6>
                    </div>
                </div>
            </div>
        </div>

        <!-- batas -->
    </div>