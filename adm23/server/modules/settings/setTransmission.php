<?php
include_once '../../config/config.php';

header('Content-Type: application/json; charset=utf-8');

try {
    $config = new Config();
    $config->VPNMiddleware();
    $con = $config->getCon();

    $transmission = $_POST['transmission'];
    $sql_query = "UPDATE settings_phase SET transmission ='" . $transmission . "' where event='".$_POST['event']."' AND 1=1";
    $result_set = mysqli_query($con, $sql_query);
} catch (Exception $e) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    exit();
}
