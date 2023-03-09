<?php

function getIpAddress()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) { //check ip from share internet
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { // proxy pass ip
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    }
    list($ipaddress) = explode(',', $ipaddress);
    return $ipaddress;
}

function needSecurityServer() {
    $ip_server = $_SERVER['SERVER_ADDR'];
    $RESTRICTED_SERVERS = ['167.71.254.179'];
    if (in_array($ip_server, $RESTRICTED_SERVERS)) {
        return true;
    }
    return false;
}

function VPNMiddleware()
{
    $ALLOW_IPS = ['200.5.229.58'];
    if (needSecurityServer()) {
        $ip = getIpAddress();
        if (in_array($ip, $ALLOW_IPS))
            return true;
        else{
            header('Location: /');
            die();
        }
    } else {
        return true;
    }
}

VPNMiddleware();

$DB_HOST = 'db';
$DB_USER = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'EMMS23';

$con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME);
