<?php
    include '../../env.php';

        $error = '';
        $success = '';
        $id_adminPassword = '';
        $pass_now = '';
        $new_pass = '';
        $confirm_new_pass = '';

        if (empty($_POST['id_adminPassword'])) {
            $error .= 'Unique admin tidak ditemukan !';
        } else {
            $id_adminPassword = $_POST['id_adminPassword'];
        }

        $stmt_data = $mysqli->prepare("SELECT * FROM admin WHERE id_admin='$id_adminPassword'");
        $stmt_data->execute();
        $result_data = $stmt_data->get_result();
        $row_data = $result_data->fetch_object();

        if (empty($_POST['pass_now'])) {
            $error .= 'Masukkan Password Sekarang !';
        } else {
            $pass_now = $_POST['pass_now']; 

            if (!password_verify($pass_now, $row_data->pass)) {
                $error .= 'Password Sekarang yang anda masukkan tidak sesuai !';
            } else {
                if (empty($_POST['new_pass'])) {
                    $error .= 'Masukkan Password Baru ! ';
                } else {
                    $new_pass = $_POST['new_pass'];

                    if (empty($_POST['confirm_new_pass'])) {
                        $error .= 'Masukkan Konfirmasi Password Baru !';
                    } else {
                        $confirm_new_pass = $_POST['confirm_new_pass'];

                        if ($confirm_new_pass != $new_pass) {
                            $error .= 'Konfirmasi Password Baru salah !';
                        }
        
                        if ($error == '') {
                            $encrypt_pass = password_hash($confirm_new_pass, PASSWORD_DEFAULT);
                
                            $query = "UPDATE admin SET pass = '$encrypt_pass' WHERE id_admin = '$id_adminPassword'";
                            $statement = $mysqli->prepare($query);
                            $statement->execute();
                            $success = 'Password berhasil diubah.';
                        }
                    }
                }
            }
        }

        $output = array(
            'success'  => $success,
            'error'   => $error
        );
        echo json_encode($output);
?>