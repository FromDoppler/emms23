<?php
include_once 'config.php';
include_once '../utils/GeoIp.php';
$ip = GeoIp::getIp();
isIPAllow($ip, $ALLOW_IPS);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex, nofollow">
    <title>ABMs EMMS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css" type="text/css" />

    </script>
</head>

<body>
    <center>

        <div id="container">
            <div>
                <h2>Settings</h2>
                <br />
                <a href="settings.php?token=<?= $_GET['token'] ?>">Settings</a>
            </div>

            <br />
            <h2>Listados Entidades Administrables por ABM</h2>
            <br />
            <a href="aliados_pro/index.php?token=<?= $_GET['token'] ?>"> ABM Listado Aliados Pro</a>
            <br />
            <br />
            <a href="aliados_starter/index.php?token=<?= $_GET['token'] ?>"> ABM Listado Aliados Starter</a>
            <br />
            <br />
            <a href="aliados_media_partner/index.php?token=<?= $_GET['token'] ?>"> ABM Listado Aliados Media Partner</a>
            <br />
            <br />
            <a href="speakers/index.php?token=<?= $_GET['token'] ?>"> ABM Listado Speakers</a>





        </div>
</body>

</html>
