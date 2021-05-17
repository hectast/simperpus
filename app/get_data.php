<?php
    if (isset($_SESSION['unique_user']) && $_SESSION['type_user'] == "anggota") {
        $stmt_data = $mysqli->prepare("SELECT * FROM anggota WHERE nisn='{$_SESSION['unique_user']}'");
        $stmt_data->execute();
        $result_data = $stmt_data->get_result();
        $row_data = $result_data->fetch_object();
        
        $stmt_transaksi = $mysqli->prepare("SELECT * FROM transaksi WHERE nisn='{$_SESSION['unique_user']}'");
        $stmt_transaksi->execute();
        $result_transaksi = $stmt_transaksi->get_result();
        $row_transaksi = $result_transaksi->fetch_object();

        $stmt_transaksi2 = $mysqli->prepare("SELECT * FROM transaksi WHERE tgl_kembali='0' AND nisn='{$_SESSION['unique_user']}'");
        $stmt_transaksi2->execute();
        $result_transaksi2 = $stmt_transaksi2->get_result();
        $row_transaksi2 = $result_transaksi2->fetch_object();


        
        $stmt_transaksi->close();
        $stmt_data->close();
        $stmt_transaksi2->close();

    }
?>