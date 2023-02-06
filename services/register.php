<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/GeoIp.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/SecurityHelper.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/Doppler.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/Validator.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/DB.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/SpreadSheetGoogle.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/Relay.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/services/functions.php');

date_default_timezone_set('America/Argentina/Buenos_Aires');




function isSubmitValid($ip)
{
    try {
        SecurityHelper::init($ip, SECURITYHELPER_ENABLE);
        SecurityHelper::isSubmitValid(ALLOW_IPS);
    } catch (Exception $e) {
        processError("isSubmitValid", $e->getMessage(), ['ip' => $ip]);
        exit('submits');
    }
}

function setDataRequest($ip, $countryGeo)
{
    $_POST = json_decode(file_get_contents('php://input'), true);
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $firstname = isset($_POST['name']) ? $_POST['name'] : null;
    $lastname = isset($_POST['lastname']) ? $_POST['lastname']    : null;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
    $privacy     = isset($_POST['acceptPolicies']) ? $_POST['acceptPolicies']     : false;
    $promotions = isset($_POST['acceptPromotions']) ? $_POST['acceptPromotions'] : false;
    $country     = isset($_POST['country']) ? $_POST['country'] : null;
    $industry     = isset($_POST['industry']) ? $_POST['industry'] : null;
    $company     = isset($_POST['company']) ? $_POST['company'] : null;
    $source_utm = isset($_POST['utm_source']) ? $_POST['utm_source'] : null;
    $medium_utm = isset($_POST['utm_medium']) ? $_POST['utm_medium'] : null;
    $campaign_utm = isset($_POST['utm_campaign']) ? $_POST['utm_campaign']    : null;
    $content_utm = isset($_POST['utm_content']) ? $_POST['utm_content'] : null;
    $term_utm = isset($_POST['utm_term']) ? $_POST['utm_term'] : null;
    $origin = isset($_POST['origin']) ? $_POST['origin'] : null;
    $phase = getCurrentPhase();
    $user = array(
        'register' => date("Y-m-d h:i:s A"),
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'privacy' => $privacy,
        'promotions' => $promotions,
        'phone' => $phone,
        'country' =>  $country,
        'industry' =>  $industry,
        'company' =>  $company,
        'ip' => $ip,
        'country_ip' => $countryGeo,
        'source_utm' => $source_utm,
        'medium_utm' => $medium_utm,
        'campaign_utm' => $campaign_utm,
        'content_utm' => $content_utm,
        'term_utm' => $term_utm,
        'origin' => $origin,
        'form_id' => $phase,
        'list' => LIST_LANDING,
        'subject' => getSubjectEmail($phase)
    );
    try {

        Validator::validateRequired('firstname', $firstname);
        Validator::validateEmail($email);
        Validator::validateBool('privacy', $privacy);
        Validator::validateBool('promotions', $promotions);
        Validator::validateRequired('industry', $industry);
        return $user;
    } catch (Exception $e) {
        processError("setDataRequest (Captura datos)", $e->getMessage(), ['user' => $user]);

    }
}

function getSubjectEmail($phase)
{
    $subject = "";
    if ($phase === 'pre') {
        $subject = SUBJECT_PRE;
    } elseif ($phase === 'during') {
        $subject = SUBJECT_DURING;
    } else {
        $subject = SUBJECT_POST;
    }
    return $subject;
}

function getCurrentPhase()
{
    try {
        $ip = GeoIp::getIp();
        $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $phases = $db->getCurrentPhase()[0];
        $simulator = $db->getSimulator()[0];
        $enabled = array_shift($simulator);
        $phaseToShow =  ($enabled && in_array($ip, ALLOW_IPS)) ? array_search(1, $simulator) : array_search(1, $phases);
        $db->close();
        return $phaseToShow;
    } catch (Exception $e) {
        processError("getCurrentPhase", $e->getMessage(), []);
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        exit();
    }
}

function saveSubscriptionDoppler($user)
{

    try {
        Doppler::init(ACCOUNT_DOPPLER, API_KEY_DOPPLER);
        Doppler::subscriber($user);
    } catch (Exception $e) {
        processError("saveSubscriptionDoppler (Almacena en Lista)", $e->getMessage(), ['user' => $user]);
    }
}
function saveSubscriptionDopplerTable($user)
{

    try {
        $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $db->insertSubscriptionDoppler($user);
        $db->saveRegistered($user);
        $db->close();
    } catch (Exception $e) {
        processError("saveSubscriptionDopplerTable (Guarda en la BD subscriptions_doppler and registered)", $e->getMessage(), ['user' => $user]);
    }
}

function saveSubscriptionSpreadSheet($user)
{
    try {
        $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        SpreadSheetGoogle::write(ID_SPREADSHEET, $user, $db);
        $db->close();
    } catch (Exception $e) {
        processError("saveSubscriptionSpreadSheet (Guarda en SpreadSheet)", $e->getMessage(), ['user' => $user]);
    }
}

function sendEmail($user, $subject)
{
    try {
        Relay::init(ACCOUNT_RELAY, API_KEY_RELAY);
        Relay::sendEmailRegister($user, $subject);
    } catch (Exception $e) {
        processError("sendEmail (Envia mail por Relay)", $e->getMessage(), ['user' => $user, 'subject' => $subject]);
    }
}

function getIp()
{
    try {
        $ip = GeoIp::getIp();
        return $ip;
    } catch (Exception $e) {
        processError("getIp (Obtiene la IP)", $e->getMessage(), []);
    }
}

function getCountryName()
{
    try {
        $countryGeo = GeoIp::getCountryName();
        return $countryGeo;
    } catch (Exception $e) {
        processError("getCountryName (Obtiene el nombre del pais por geoIp de Cloudflare)", $e->getMessage(), []);
    }
}


//MAIN
$ip = getIp();
$countryGeo = getCountryName();
isSubmitValid($ip);
$user = setDataRequest($ip, $countryGeo);
saveSubscriptionDoppler($user);
saveSubscriptionDopplerTable($user);
saveSubscriptionSpreadSheet($user);
sendEmail($user, $user['subject']);
