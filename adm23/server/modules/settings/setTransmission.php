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

    $mem_var = new Memcached();
    $mem_var->addServer(MEMCACHED_SERVER, 11211);
    $sql = "SELECT * from settings_phase WHERE event='" . $_POST['event'] . "' AND 1=1";
    $result_set = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $fetched_row[] = $row;
    }
    $mem_var->set("settings_phase_". $_POST['event'], $fetched_row[0][0], CACHE_TIME);
} catch (Exception $e) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    exit();
}
