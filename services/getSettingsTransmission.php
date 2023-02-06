<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/GeoIp.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/SecurityHelper.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/DB.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/services/functions.php');


try {
    $ip = GeoIp::getIp();
    SecurityHelper::init($ip, SECURITYHELPER_ENABLE);
    SecurityHelper::isSubmitValid(ALLOW_IPS);
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $transmission = $db->getSettingsTransmission()[0];
    $db->close();
    echo json_encode($transmission);
} catch (Exception $e) {
    processError("getSettingsTransmission", $e->getMessage(), []);
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    exit();
}
