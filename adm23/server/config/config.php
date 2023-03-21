<?php
class Config {
    private const DB_HOST = 'db';
    private const DB_USER = 'root';
    private const DB_PASSWORD = '';
    private const DB_NAME = 'EMMS23';
    private const RESTRICTED_SERVERS = ['167.71.254.179','165.227.176.189'];
    private const ALLOW_IPS = ['200.5.229.58'];


    public static function getCon() {
        return mysqli_connect(self::DB_HOST, self::DB_USER, self::DB_PASSWORD, self::DB_NAME);
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

        if (in_array($ip_server, self::RESTRICTED_SERVERS)) {
            return true;
        }
        return false;
    }

    public static function VPNMiddleware()
    {
        if (self::needSecurityServer()) {
            $ip = self::getIpAddress();
            if (in_array($ip, self::ALLOW_IPS))
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
