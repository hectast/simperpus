

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
<h3>LAPORAN DATA PEMINJAMAN & PENGEMBALIAN BUKU</h3>
<h4>SMP NEGERI 1 SUWAWA</h4>
</div>
<table border="1" style="border-collapse:collapse; width:100%;" cellpadding="8">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Nama Peminjam</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Jatuh Tempo</th>
            <th>Tanggal Kembali</th>
            <th>Keterangan</th>
        </td>
    </thead>
    <tbody>
';
$nomor = 1;
$query_blm = $mysqli->query("SELECT * FROM transaksi WHERE tgl_kembali = '0'");
$query = $mysqli->query("SELECT * FROM transaksi JOIN buku ON transaksi.id_buku = buku.id_buku");
while($row = $query->fetch_object()){

if($row->tgl_kembali == 0){
    $tgl_kmbli = 'Blm Dikembalikan';
}else{
    $tgl_kmbli = tgl_indo($row->tgl_kembali);
}

if($row->denda == 0){
    $denda = '0';
}else{
    $denda = $row->denda;
}

if($row->nisn == '0'){
    $query_guru = $mysqli->query("SELECT * FROM guru WHERE nuptk ='$row->nuptk'");
    $row_guru = $query_guru->fetch_object();
    $nm = $row_guru->nama_lengkap;
}else if($row->nuptk =='0'){
    $query_anggota = $mysqli->query("SELECT * FROM anggota WHERE nisn ='$row->nisn'");
    $row_anggota = $query_anggota->fetch_object();
    $nm = $row_anggota->nama_lengkap;
}

$html .= '
    <tr>
        <td>'.$nomor++.'</td>
        <td>'.$row->judul_buku.'</td>
        <td>'.$nm.'</td>
        <td>'.tgl_indo($row->tgl_pinjam).'</td>
        <td>'.tgl_indo($row->tgl_jatuh_tempo).'</td>
        <td>'.$tgl_kmbli.'</td>
        <td>Rp. '.number_format($denda).'</td>
    </tr>
';
$ttl += $row->denda;

}
$html .= '
</tbody>
</table><br>
<div>Total Data : '.mysqli_num_rows($query).'</div>
<div>Buku Yang Belum Dikembalikan : '.mysqli_num_rows($query_blm).'</div>
<div>Total Denda : Rp. '.number_format($ttl,2).'</div>
';

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();