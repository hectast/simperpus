<?php
include '../../env.php';

$error = '';
$success = '';
$id_admin = '';
$nama = '';
$username = '';

if (empty($_POST['id_admin'])) {
    $error .= 'Unique Admin tidak ditemukan !';
} else {
    $id_admin = $_POST['id_admin'];
}

if (empty($_POST['nama'])) {
    $error .= 'Masukkan nama anda !';
} else {
    $nama = $_POST['nama'];
}

if (empty($_POST['username'])) {
    $error .= 'Masukkan username anda !';
} else {
    $username = $_POST['username'];
}

if ($error == '') {
    $query = "UPDATE admin SET nama = '$nama', username = '$username' WHERE id_admin = '$id_admin'";
    $statement = $mysqli->prepare($query);
    $statement->execute();
    $success = 'Data berhasil diperbarui.';
}

$output = array(
    'success'  => $success,
    'error'   => $error
);
echo json_encode($output);
