<?php
$id = $_POST['kat'];

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
<h3>LAPORAN DATA PEMINJAMAN & PENGEMBALIAN BUKU</h3>
<h4>SMP NEGERI 1 SUWAWA</h4>
</div>
<table border="1" style="border-collapse:collapse; width:100%;" cellpadding="8">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode ISBN</th>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Klasifikasi</th>
            <th>Kategori</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Jumlah</th>
        </td>
    </thead>
    <tbody>
';
$nomor = 1;

$query = $mysqli->query("SELECT * FROM buku JOIN klasifikasi ON buku.kode_klasifikasi = klasifikasi.kode_klasifikasi WHERE kategori_buku ='$id'");
while($row = $query->fetch_object()){
if($row->kategori_buku == 1){
    $kate = 'Umum';
}else{
    $kate = 'Paket';
}

$html .= '
    <tr>
        <td>'.$nomor++.'</td>
        <td>'.$row->kode_isbn.'</td>
        <td>'.$row->no_buku.'</td>
        <td>'.$row->judul_buku.'</td>
        <td>'.$row->kode_klasifikasi.' - '.$row->klasifikasi.'</td>
        <td>'.$kate.'</td>
        <td>'.$row->pengarang.'</td>
        <td>'.$row->penerbit.'</td>
        <td>'.$row->tahun_terbit.'</td>
        <td>'.$row->jumlah_buku.'</td>       
    </tr>
';
}
$html .= '
</tbody>
</table><br>
<div>Total Data : '.mysqli_num_rows($query).'
';

$encryption = crypt("klasifikasi_umur", "heCTast");
$file = $encryption.'.pdf';

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output($file, 'I');


?>