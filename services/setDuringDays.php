<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/GeoIp.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/SecurityHelper.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/DB.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/services/functions.php');

try {
    $_POST = json_decode(file_get_contents('php://input'), true);
    $ip = GeoIp::getIp();
    SecurityHelper::init($ip, SECURITYHELPER_ENABLE);
    SecurityHelper::isSubmitValid(ALLOW_IPS);
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $db->updateDuringDays($_POST['day'], $_POST['live']);
    $db->close();
} catch (Exception $e) {
    processError("setDuringDays", $e->getMessage(), ['POST' => $_POST]);
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    exit();
}
