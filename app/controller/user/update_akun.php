<?php
include '../../env.php';

$error = '';
$success = '';
$nisn = '';
$nama_lengkap = '';
$tempat_lahir = '';
$tgl_lahir = '';
$username = '';

if (empty($_POST['nisn'])) {
    $error .= 'Unique user tidak ditemukan !';
} else {
    $nisn = $_POST['nisn'];
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
    $query = "UPDATE anggota SET nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', username = '$username' WHERE nisn = '$nisn'";
    $statement = $mysqli->prepare($query);
    $statement->execute();
    $success = 'Data berhasil diperbarui.';
}

$output = array(
    'success'  => $success,
    'error'   => $error
);
echo json_encode($output);
