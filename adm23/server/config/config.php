<?php
include_once $_SERVER['DOCUMENT_ROOT']."/config.php";
class Config {

    public static function getCon() {
        return mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }

    private static function getIpAddress()
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

    private static function needSecurityServer() {
        $ip_server = $_SERVER['SERVER_ADDR'];

        if (in_array($ip_server, ADMIN_RESTRICTED_SERVERS)) {
            return true;
        }
        return false;
    }

    public static function VPNMiddleware()
    {
        if (self::needSecurityServer()) {
            $ip = self::getIpAddress();
            if (in_array($ip, ADMIN_ALLOW_IPS))
                return true;
            else{
                header('Location: /');
                die();
            }
        } else {
            return true;
        }
    }
}
