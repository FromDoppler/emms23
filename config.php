<?php
session_start();

$ALLOW_IPS = array('::1', '200.5.229.58', '200.5.253.210', '127.0.0.1', '172.18.0.1');
$ACCOUNT_DOPPLER = getenv("ACCOUNT_DOPPLER");
$API_KEY_DOPPLER = getenv("API_KEY_DOPPLER");
$ACCOUNT_RELAY = getenv("ACCOUNT_RELAY");
$API_KEY_RELAY = getenv("API_KEY_RELAY");
$GOOGLE_CLIENT_ID = getenv("GOOGLE_CLIENT_ID");
$GOOGLE_CLIENT_SECRET = getenv("GOOGLE_CLIENT_SECRET");
$ID_SPREADSHEET =  getenv("ID_SPREADSHEET");
$DB_NAME = getenv("MYSQL_DATABASE");
$DB_USER = getenv("MYSQL_USER");
$DB_PASSWORD = getenv("MYSQL_PASSWORD");
$DB_HOST = getenv("MYSQL_HOST");
$SECRET_REFRESH = getenv("SECRET_REFRESH");


if (!defined('VERSION')) define('VERSION', '1.0.0');
if (!defined('PRODUCTION')) define('PRODUCTION', false);
if (!defined('SECURITYHELPER_ENABLE')) define('SECURITYHELPER_ENABLE', false);
if (!defined('SITE_URL')) define('SITE_URL', 'http://localhost/');

#TWITTER

$CONSUMER_KEY = getenv('CONSUMER_KEY');
$CONSUMER_SECRET = getenv('CONSUMER_SECRET');
$OATH_TOKEN = getenv('OATH_TOKEN');
$OATH_TOKEN_SECRET = getenv('OATH_TOKEN_SECRET');
$BEARER_TOKEN = getenv('BEARER_TOKEN');

if (!defined('CONSUMER_KEY')) define('CONSUMER_KEY', $CONSUMER_KEY);
if (!defined('CONSUMER_SECRET')) define('CONSUMER_SECRET', $CONSUMER_SECRET);
if (!defined('OATH_TOKEN')) define('OATH_TOKEN', $OATH_TOKEN);
if (!defined('OATH_TOKEN_SECRET')) define('OATH_TOKEN_SECRET', $OATH_TOKEN_SECRET);
if (!defined('BEARER_TOKEN')) define('BEARER_TOKEN', $BEARER_TOKEN);
if (!defined('OAUTH_CALLBACK')) define('OAUTH_CALLBACK', SITE_URL . 'callback.php');
if (!defined('TWITTER_API_OK')) define('TWITTER_API_OK', true);
if (!defined('TWEETS_AMOUNT')) define('TWEETS_AMOUNT', 15);

// Caution with the next line!
if (!defined('CHANGE_TWITTER_API')) define('CHANGE_TWITTER_API', false);

if (!defined('CACHE_TIME')) define('CACHE_TIME', 60); // En segundos(60) (1 minuto)
if (!defined('CACHE_TIME_ID')) define('CACHE_TIME_ID', 1800); // En segundos(1800) (30 minutos)
if (!defined('CACHE_BACKUP_TIME')) define('CACHE_BACKUP_TIME', 3600); // En segundos (1 Hora)


#IPS WHITE LIST

if (!defined('ALLOW_IPS')) define('ALLOW_IPS', $ALLOW_IPS);

#API DOPPLER

if (!defined('ACCOUNT_DOPPLER')) define('ACCOUNT_DOPPLER', $ACCOUNT_DOPPLER);
if (!defined('API_KEY_DOPPLER')) define('API_KEY_DOPPLER', $API_KEY_DOPPLER);
if (!defined('LIST_LANDING')) define('LIST_LANDING', 28547158);

#API RELAY

if (!defined('ACCOUNT_RELAY')) define('ACCOUNT_RELAY', $ACCOUNT_RELAY);
if (!defined('API_KEY_RELAY')) define('API_KEY_RELAY', $API_KEY_RELAY);

if (!defined('SUBJECT_PRE')) define('SUBJECT_PRE', 'Agrega #EMMS2022 a tu calendario');
if (!defined('SUBJECT_DURING')) define('SUBJECT_DURING', '¡Te damos la bienvenida al #EMMS2022!');
if (!defined('SUBJECT_POST')) define('SUBJECT_POST', '¡Te damos la bienvenida al #EMMS2022!');

#GOOGLE SPREADSHEET
//https://docs.google.com/spreadsheets/d/1HpSLWrz5lLcUKFyVGGF7PQ2FJvsydTV0IMahZogbQt0/edit#gid=0

if (!defined('GOOGLE_CLIENT_ID')) define('GOOGLE_CLIENT_ID', $GOOGLE_CLIENT_ID);
if (!defined('GOOGLE_CLIENT_SECRET')) define('GOOGLE_CLIENT_SECRET', $GOOGLE_CLIENT_SECRET);
if (!defined('ID_SPREADSHEET')) define('ID_SPREADSHEET', $ID_SPREADSHEET);
if (!defined('GOOGLE_SPREAD_CALLBACK')) define('GOOGLE_SPREAD_CALLBACK', 'http://localhost/utils/spread/callback.php');

#DATABASE

if (!defined('DB_NAME')) define('DB_NAME', $DB_NAME);
if (!defined('DB_USER')) define('DB_USER', $DB_USER);
if (!defined('DB_PASSWORD')) define('DB_PASSWORD', $DB_PASSWORD);
if (!defined('DB_HOST')) define('DB_HOST', $DB_HOST);

#SERVER NODE SOCKET

if (!defined('URL_REFRESH')) define('URL_REFRESH', 'apisqa.fromdoppler.net');
if (!defined('PATH_REFRESH')) define('PATH_REFRESH', 'emms-socket');
if (!defined('SECRET_REFRESH')) define('SECRET_REFRESH', $SECRET_REFRESH);

#During Days System
$duringDaysArray = array(
    "d1" => array(
        "youtube" => "wHn1_QVoXGM",
        "twitch" => "duckvilleusa",
        "hashtag-chat" => "#EMMS2022 ",
        "hashtag-gral" => "EMMS2022",
        "banner-transition" => "placa-dia01-transition",
        "banner-nolive" => "placa-dia01-nolive"
    ),
    "d2" => array(
        "youtube" => "InSydaLSSlw",
        "twitch" => "hoothouselivestream",
        "hashtag-chat" => "#GOEMMS ",
        "hashtag-gral" => "GOEMMS",
        "banner-transition" => "placa-dia02-transition",
        "banner-nolive" => "placa-dia02-nolive"
    ),
    "d3" => array(
        "youtube" => "XDJPzMznAjU",
        "twitch" => "livekittytv",
        "hashtag-chat" => "#EMMSBYDOPPLER ",
        "hashtag-gral" => "EMMSBYDOPPLER",
        "banner-transition" => "placa-dia03-transition",
        "banner-nolive" => "placa-dia03-nolive"
    ),
);
