<?php
    if (isset($_SESSION['unique_user']) && $_SESSION['type_user'] == "anggota") {
        $stmt_data = $mysqli->prepare("SELECT * FROM anggota WHERE nisn='{$_SESSION['unique_user']}'");
        $stmt_data->execute();
        $result_data = $stmt_data->get_result();
        $row_data = $result_data->fetch_object();
        $stmt_data->close();
    }
?>