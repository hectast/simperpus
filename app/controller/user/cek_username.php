<?php
include '../../env.php';

$unamenow= $_POST['unamenow'];
$username = $_POST['username'];

if (empty($username)) {
    $error .= "Username kosong";
}

$query = $mysqli->query("SELECT * FROM anggota WHERE username = '$username'");
$row = $query->fetch_assoc();
if (mysqli_num_rows($query) > 0 & $unamenow != $row['username']) {
    echo "tidak tersedia";
} else if (mysqli_num_rows($query) == 0 & $unamenow != $row['username']) {
    echo "tersedia";
}