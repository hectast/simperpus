<?php
include 'app/token.php';
if (isset($_POST['login'])) {
    if (empty($_POST['username']) && empty($_POST['password'])) {
    ?>
        <script>
            alert('Maaf masukkan Username dan Password terlebih dahulu !');
            document.location.href = 'login';
        </script>
    <?php
        return false;
    }

    $stmt_admin = $mysqli->prepare("SELECT id_admin, pass FROM admin WHERE username = ?");
    $stmt_anggota = $mysqli->prepare("SELECT nisn, nama_lengkap, pass FROM anggota WHERE username = ?");
    $stmt_guru = $mysqli->prepare("SELECT nuptk, nama_lengkap, pass FROM guru WHERE username = ?");

    if ($stmt_admin || $stmt_anggota) {
        $stmt_admin->bind_param('s', $_POST['username']);
        $stmt_admin->execute();
        $stmt_admin->store_result();

        $stmt_anggota->bind_param('s', $_POST['username']);
        $stmt_anggota->execute();
        $stmt_anggota->store_result();

        $stmt_guru->bind_param('s', $_POST['username']);
        $stmt_guru->execute();
        $stmt_guru->store_result();

        if ($stmt_admin->num_rows > 0) {
            $stmt_admin->bind_result($id_admin, $pass);
            $stmt_admin->fetch();
            if (password_verify($_POST['password'], $pass)) {
                session_regenerate_id();

                $token = getToken(10);
                $checkToken = "SELECT * FROM log WHERE nisnORuname='{$_POST['username']}'";
                $toCheckToken = $mysqli->prepare($checkToken);
                $toCheckToken->execute();
                $resultToken = $toCheckToken->get_result();
                $rowToken = mysqli_num_rows($resultToken);

                if ($rowToken > 0) {
                    $stmt_log = $mysqli->prepare("UPDATE log SET token='$token' WHERE nisnORuname='{$_POST['username']}'");
                    $stmt_log->execute();
                } else {
                    $stmt_log = $mysqli->prepare("INSERT INTO log (nisnORuname,token) VALUES ('{$_POST['username']}','$token')");
                    $stmt_log->execute();
                }

                $_SESSION['unique_user'] = $_POST['username'];
                $_SESSION['unique2_user'] = $id_admin;
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
            $stmt_anggota->bind_result($nisn, $nama, $pass);
            $stmt_anggota->fetch();
            if (password_verify($_POST['password'], $pass)) {
                session_regenerate_id();

                $token = getToken(10);
                $checkToken = "SELECT * FROM log WHERE nisnORuname='{$_POST['username']}'";
                $toCheckToken = $mysqli->prepare($checkToken);
                $toCheckToken->execute();
                $resultToken = $toCheckToken->get_result();
                $rowToken = mysqli_num_rows($resultToken);

                if ($rowToken > 0) {
                    $stmt_log = $mysqli->prepare("UPDATE log SET token='$token' WHERE nisnORuname='{$_POST['username']}'");
                    $stmt_log->execute();
                } else {
                    $stmt_log = $mysqli->prepare("INSERT INTO log (nisnORuname,token) VALUES ('{$_POST['username']}','$token')");
                    $stmt_log->execute();
                }

                $_SESSION['unique_user'] = $_POST['username'];
                $_SESSION['unique2_user'] = $nisn;
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
        } else if ($stmt_guru->num_rows > 0) {
            $stmt_guru->bind_result($nuptk, $nama, $pass);
            $stmt_guru->fetch();
            if (password_verify($_POST['password'], $pass)) {
                session_regenerate_id();

                $token = getToken(10);
                $checkToken = "SELECT * FROM log WHERE nisnORuname='{$_POST['username']}'";
                $toCheckToken = $mysqli->prepare($checkToken);
                $toCheckToken->execute();
                $resultToken = $toCheckToken->get_result();
                $rowToken = mysqli_num_rows($resultToken);

                if ($rowToken > 0) {
                    $stmt_log = $mysqli->prepare("UPDATE log SET token='$token' WHERE nisnORuname='{$_POST['username']}'");
                    $stmt_log->execute();
                } else {
                    $stmt_log = $mysqli->prepare("INSERT INTO log (nisnORuname,token) VALUES ('{$_POST['username']}','$token')");
                    $stmt_log->execute();
                }

                $_SESSION['unique_user'] = $_POST['username'];
                $_SESSION['unique2_user'] = $nuptk;
                $_SESSION['nama'] = $nama;
                $_SESSION['token'] = $token;
                $_SESSION['type_user'] = "guru";
                ?>
                <script>
                    document.location.href = 'beranda_guru';
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
                alert('Username yang anda masukkan salah !');
                document.location.href = 'login';
            </script>
            <?php
        }
        $stmt_admin->close();
        $stmt_anggota->close();
        $stmt_guru->close();
    }
}
?>