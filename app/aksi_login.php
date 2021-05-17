<?php
include 'app/token.php';
if (isset($_POST['login'])) {
    if (empty($_POST['nisn']) && empty($_POST['password'])) {
    ?>
        <script>
            alert('Maaf masukkan NISN dan Password terlebih dahulu !');
            document.location.href = 'login';
        </script>
    <?php
        return false;
    }

    $stmt_admin = $mysqli->prepare("SELECT nama, pass FROM admin WHERE username = ?");
    $stmt_anggota = $mysqli->prepare("SELECT nama_lengkap, pass FROM anggota WHERE nisn = ?");

    if ($stmt_admin || $stmt_anggota) {
        $stmt_admin->bind_param('s', $_POST['nisn']);
        $stmt_admin->execute();
        $stmt_admin->store_result();

        $stmt_anggota->bind_param('s', $_POST['nisn']);
        $stmt_anggota->execute();
        $stmt_anggota->store_result();

        if ($stmt_admin->num_rows > 0) {
            $stmt_admin->bind_result($nama, $pass);
            $stmt_admin->fetch();
            if (password_verify($_POST['password'], $pass)) {
                session_regenerate_id();

                $token = getToken(10);
                $checkToken = "SELECT * FROM log WHERE nisnORuname='{$_POST['nisn']}'";
                $toCheckToken = $mysqli->prepare($checkToken);
                $toCheckToken->execute();
                $resultToken = $toCheckToken->get_result();
                $rowToken = mysqli_num_rows($resultToken);

                if ($rowToken > 0) {
                    $stmt_log = $mysqli->prepare("UPDATE log SET token='$token' WHERE nisnORuname='{$_POST['nisn']}'");
                    $stmt_log->execute();
                } else {
                    $stmt_log = $mysqli->prepare("INSERT INTO log (nisnORuname,token) VALUES ('{$_POST['nisn']}','$token')");
                    $stmt_log->execute();
                }

                $_SESSION['unique_user'] = $_POST['nisn'];
                $_SESSION['nama'] = $nama;
                $_SESSION['token'] = $token;
                $_SESSION['type_user'] = "admin";
                ?>
                <script>
                    document.location.href = 'beranda_admin';
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert('Password yang anda masukkan salah !');
                    document.location.href = 'login';
                </script>
                <?php
            }
        } else if ($stmt_anggota->num_rows > 0) {
            $stmt_anggota->bind_result($nama, $pass);
            $stmt_anggota->fetch();
            if (password_verify($_POST['password'], $pass)) {
                session_regenerate_id();

                $token = getToken(10);
                $checkToken = "SELECT * FROM log WHERE nisnORuname='{$_POST['nisn']}'";
                $toCheckToken = $mysqli->prepare($checkToken);
                $toCheckToken->execute();
                $resultToken = $toCheckToken->get_result();
                $rowToken = mysqli_num_rows($resultToken);

                if ($rowToken > 0) {
                    $stmt_log = $mysqli->prepare("UPDATE log SET token='$token' WHERE nisnORuname='{$_POST['nisn']}'");
                    $stmt_log->execute();
                } else {
                    $stmt_log = $mysqli->prepare("INSERT INTO log (nisnORuname,token) VALUES ('{$_POST['nisn']}','$token')");
                    $stmt_log->execute();
                }

                $_SESSION['unique_user'] = $_POST['nisn'];
                $_SESSION['nama'] = $nama;
                $_SESSION['token'] = $token;
                $_SESSION['type_user'] = "anggota";
                ?>
                <script>
                    document.location.href = 'beranda';
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert('Password yang anda masukkan salah !');
                    document.location.href = 'login';
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert('NISN yang anda masukkan salah !');
                document.location.href = 'login';
            </script>
            <?php
        }
        $stmt_admin->close();
        $stmt_anggota->close();
    }
}
?>