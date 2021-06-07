<?php
// Require composer autoload
require_once '../../env.php';
require_once '../../../public/vendor/autoload.php';
// Create an instance of the class:
function tgl_indo($tanggal){
	$bulan = array (
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
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'orientation' => 'L'
]);

$html = '
<style>
.head {
    margin-bottom: 6rem;
}

.nama {
    text-decoration: underline;
    font-weight: bold;
    margin-bottom: 0.5rem;
}
</style>
<div style="text-align:center;">
<h3>LAPORAN DATA NON BUKU</h3>
<h4>SMP NEGERI 1 SUWAWA</h4>
</div>
<table border="1" style="border-collapse:collapse; width:100%;" cellpadding="8">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal Masuk</th>
            <th>Jumlah</th>
        </td>
    </thead>
    <tbody>
';
$nomor = 1;

$query = $mysqli->query("SELECT * FROM non_buku");
while($row = $query->fetch_object()){

$html .= '
    <tr>
        <td>'.$nomor++.'</td>
        <td>'.$row->nama.'</td>
        <td>'.tgl_indo($row->tanggal_masuk).'</td>
        <td>'.$row->jumlah.'</td>   
    </tr>
';
}
$html .= '
</tbody>
</table><br>
<div>Total Data : '.mysqli_num_rows($query).'</div>
<div style="width: 100%;text-align: center;margin-top: 5rem;">
    <div style="width: 50%;float: left;">
        <p class="head"><b>Kepala Perpus SMP Negeri 1 Suwawa</b></p>
        <p class="nama">Wiwin S. Maksud, S.Pd</p>
        <span class="nip">NIP. 198001022007012027</span>
    </div>
    <div style="width: 50%;float: left;">
        <p class="head"><b>Kepala SMP Negeri 1 Suwawa</b></p>
        <p class="nama">Pitria Deu, S.Pd, M.Si</p>
        <span class="nip">NIP. 197310261999032008</span>
    </div>
</div>
';

$encryption = crypt("data_non_buku", "heCTast");
$file = $encryption.'.pdf';

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output($file, 'I');
