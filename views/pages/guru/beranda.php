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
            <!-- Column -->
            <div class="col-md-6 col-lg-4">
                <div class="card card-hover">
                    <div class="box bg-success text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-book-open-variant"></i></h1>
                        <h4 class="text-white"><?= $result_transaksi->num_rows; ?></h4>
                        <h6 class="text-white">Peminjaman</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card card-hover">
                    <div class="box bg-warning text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-library-books"></i></h1>
                        <h4 class="text-white"><?= $result_transaksi2->num_rows; ?></h4>
                        <h6 class="text-white">Buku Yang Belum Dikembalikan</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-clock-alert"></i></h1>
                        <h4 class="text-white">Rp. <?php 
                        $query = $mysqli->query("SELECT sum(denda) AS val_sum FROM transaksi WHERE nuptk = '$row_data->nuptk'");
                        while($row = $query->fetch_assoc()){
                            echo number_format($row['val_sum']);        
                        }
                        ?></h4>
                        <h6 class="text-white">Denda</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- batas -->
    </div>