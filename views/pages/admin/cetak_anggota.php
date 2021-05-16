

<?php
// Require composer autoload
require_once  'public/vendor/autoload.php';
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
<div style="text-align:center;">
<h3>LAPORAN DATA ANGGOTA PERPUSTAKAAN</h3>
<h4>SMP NEGERI 1 SUWAWA</h4>
</div>
<table border="1" style="border-collapse:collapse; width:100%;" cellpadding="8">
    <thead>
        <tr>
            <th>No</th>
            <th>Nisn</th>
            <th>Nama Lengkap</th>
            <th>Tempat - Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Kelas</th>
            <th>Tahun Masuk</th>
        </td>
    </thead>
    <tbody>
';
$nomor = 1;
$query = $mysqli->query("SELECT * FROM anggota JOIN kelas ON anggota.id_kelas = kelas.id_kelas");
while($row = $query->fetch_object()){


$html .= '
    <tr>
        <td>'.$nomor++.'</td>
        <td>'.$row->nisn.'</td>
        <td>'.$row->nama_lengkap.'</td>
        <td>'.$row->tempat_lahir.' - '.tgl_indo($row->tgl_lahir).'</td>
        <td>'.$row->jk.'</td>
        <td>'.$row->nama_kelas.'</td>
        <td>'.$row->thn_masuk.'</td>
    </tr>
';


}
$html .= '
</tbody>
</table><br>
<div>Total Data : '.mysqli_num_rows($query).'
';

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();