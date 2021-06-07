<?php
include '../../env.php';

$error = '';
$success = '';
$nuptk = '';
$nama_lengkap = '';
$tempat_lahir = '';
$tgl_lahir = '';
$username = '';

if (empty($_POST['nuptk'])) {
    $error .= 'Unique guru tidak ditemukan !';
} else {
    $nuptk = $_POST['nuptk'];
}

if (empty($_POST['nama_lengkap'])) {
    $error .= 'Masukkan nama lengkap anda !';
} else {
    $nama_lengkap = $_POST['nama_lengkap'];
}

if (empty($_POST['tempat_lahir'])) {
    $error .= 'Masukkan tempat lahir anda !';
} else {
    $tempat_lahir = $_POST['tempat_lahir'];
}

if (empty($_POST['tgl_lahir'])) {
    $error .= 'Masukkan tanggal lahir anda !';
} else {
    $tgl_lahir = $_POST['tgl_lahir'];
}

if (empty($_POST['username'])) {
    $error .= 'Masukkan username anda !';
} else {
    $username = $_POST['username'];
}

if ($error == '') {
    $query = "UPDATE guru SET nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', username = '$username' WHERE nuptk = '$nuptk'";
    $statement = $mysqli->prepare($query);
    $statement->execute();
    $success = 'Data berhasil diperbarui.';
}

$output = array(
    'success'  => $success,
    'error'   => $error
);
echo json_encode($output);
