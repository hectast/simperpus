<?php
include '../../env.php';
$nis = $_GET['id'];

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>
<html lang="en">

<head>
    <title>Kartu Anggota</title>
    <style>
        body{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background : url('1097.jpg') no-repeat;
            background-size: contain;
            
        }
        .display-data {
            font-size: 15px;
            border: 0px solid black;
            width: 100%;
          
            border-collapse: collapse;
        }

        .display-data th {
            padding: 8px;
        }

        .display-data th,
        .display-data td {
            border: 0px solid black;
            text-align: left;
            width: auto;
        }

        .display-header {
            margin-bottom: 1rem;
        }

        .display-header td {
            text-align: center;
        }

        h1{
            color: #00aeef;
            margin: 0px;
        }
        p{
            margin-top: 0;
        }
        
    
        .container{
            width: 50%;
        }
    </style>
</head>

<body>

    <div class="container">
    <h1>KARTU ANGGOTA PERPUSTAKAAN</h1>
    <p>SMP NEGERI 1 GORONTALO</p>
    <?php
    $query = $mysqli->query("SELECT * FROM anggota JOIN kelas ON anggota.id_kelas = kelas.id_kelas WHERE nisn ='$nis'");
    $r = $query->fetch_assoc();
    ?>
     <img src="../../../public/uploads/<?= $r['foto'] ?>" height="280" width="250"  alt="">
<br><br>
    <table width="100%" class="display-data">
       
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $r['nama_lengkap'] ?></td>
        </tr>
        <tr>
            <td>Tempat, Tgl Lahir</td>
            <td>:</td>
            <td><?= $r['tempat_lahir'].', '.tgl_indo($r['tgl_lahir']) ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><?= $r['jk'] ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><?= $r['nama_kelas'] ?></td>
        </tr>
        <tr>
            <td>Tahun Masuk</td>
            <td>:</td>
            <td><?= $r['thn_masuk'] ?></td>
        </tr>
        
        
    </table>
    </div>