<?php
    include 'app/env.php';

    $kdklsf = "100";
    $nbk = "0001";

        $query = $mysqli->query("SELECT * FROM test WHERE kode_klasifikasi='$kdklsf' AND no_buku='$nbk'");
    
        if (mysqli_num_rows($query) > 0) {
            $no_buku = $nbk;
            echo $no_buku;
        } else {
            $query2 = $mysqli->query("SELECT * FROM test WHERE kode_klasifikasi='$kdklsf'");
            if (mysqli_num_rows($query2) == 0) {
                $cek_no_buku = $kdklsf."0";
                
                $urutan = (int) substr($cek_no_buku, 1, 3);
                $urutan++;
                
                $kode_klasifikasi = $kdklsf;
                $potong_kode = substr($kode_klasifikasi, 0, -2);
                
                $no_buku = $potong_kode . sprintf("%03s", $urutan);
                echo $no_buku;
            } else {
                $query3 = $mysqli->query("SELECT max(no_buku) AS kode_terbesar, kode_klasifikasi FROM test WHERE kode_klasifikasi='$kdklsf'");
                $row3 = $query3->fetch_assoc();
        
                $cek_no_buku = $row3['kode_terbesar'];
        
                $urutan = (int) substr($cek_no_buku, 1, 3);
                $urutan++;
            
                $kode_klasifikasi = $row3['kode_klasifikasi'];
                $potong_kode = substr($kode_klasifikasi, 0, -2);
                
                $no_buku = $potong_kode . sprintf("%03s", $urutan);
                echo $no_buku;
            }
        }
