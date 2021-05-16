<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>SIMPERPUS - <?= isset($title) ? $title : "Administator" ?></title>
    <!-- Custom CSS -->
    <link href="public/assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link href="public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" href="public/dist/css/icons/font-awesome/css/fontawesome.css">
    <link rel="stylesheet" href="public/dist/css/yearpicker.css">
    <link rel="stylesheet" href="public/assets/libs/select2/dist/css/select2.min.css">
    <!-- Custom CSS -->
    <link href="public/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <?php if (isset($_GET['views_user'])) : ?>
        <style>
            .card-custom {
                overflow: hidden;
                min-height: 450px;
                box-shadow: 0 0 15px rgba(10, 10, 10, 0.1);
            }

            .card-custom-img {
                height: 200px;
                min-height: 200px;
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
                border-color: inherit;
            }

            /* First border-left-width setting is a fallback */
            .card-custom-img::after {
                position: absolute;
                content: '';
                top: 161px;
                left: 0;
                width: 0;
                height: 0;
                border-style: solid;
                border-top-width: 40px;
                border-right-width: 0;
                border-bottom-width: 0;
                border-left-width: 545px;
                border-left-width: calc(575px - 5vw);
                border-top-color: transparent;
                border-right-color: transparent;
                border-bottom-color: transparent;
                border-left-color: inherit;
            }

            .card-custom-avatar img {
                border-radius: 50%;
                box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
                position: absolute;
                top: 100px;
                left: 1.25rem;
                width: 100px;
                height: 100px;
            }
        </style>
    <?php endif; ?>
</head>

<body>
    <?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
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

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
    ?>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->