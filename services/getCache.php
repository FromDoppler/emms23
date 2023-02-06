<?php

header("Access-Control-Allow-Origin: https://goemms.com ");

require_once('./twitterController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/functions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/GeoIp.php');

$mem_var = new Memcached();
$mem_var->addServer("127.0.0.1", 11211);
$cachedTweets = $mem_var->get("tweets");

$ip = GeoIp::getIp();
$responseD = processPhaseToShow($ip);
$dayDuring  = $responseD['day'];

$hashtag = $duringDaysArray['d' . $dayDuring]['hashtag-gral'];
$twitterController = new twitterController($hashtag);

$json = file_get_contents('php://input');
$data = json_decode($json);

// Preguntamos por el metodo que llega en el POST
// if ($data->method === 'getAllTweets') {
// Verificamos si existe un cache guardado
if ($cachedTweets) {
    echo $cachedTweets;
} else {
    // Si no existe verificamos si tenemos un id guardado
    if ($mem_var->get("latestId")) {
        // Si tenemos id, buscamos los tweets nuevos a partir de ese ultimo id
        $tweetResponse = $twitterController->getAllTweetsByNewestedId($mem_var->get("latestId"));
    } else {
        // Sin id pedimos los ultimos 30 tweets nuevos
        $tweetResponse = $twitterController->getAllTweets();
    }

    // Transformamos la respuesta de los tweets a JSON
    $tweetObj = json_decode($tweetResponse);

    // Verificamos que la respuesta no este vacia
    if ($tweetResponse && isset($tweetObj->meta->newest_id)) {

        $tweetAmount = $tweetObj->meta->result_count;
        $tweets->allTweets = $tweetObj->data;
        $latestId = $tweetObj->meta->newest_id;
        $tweets->latestId = $latestId;
    }

    // Verificamos que la cantidad de datos en la respuesta sea igual a 30
    if ($tweets->latestId && intval($tweetAmount) === TWEETS_AMOUNT) {

        //Respuesta de nuevos tweets
        $mem_var->set("tweets", $tweetResponse, CACHE_TIME);
        $mem_var->set("cacheDateTweets",  date("Y-m-d h:i:s A"), CACHE_TIME);

        //Backup de tweets con mayor tiempo de vencimiento
        $mem_var->set("tweetBackup", $tweetResponse, CACHE_BACKUP_TIME);
        $mem_var->set("tweetBackupDate",  date("Y-m-d h:i:s A"), CACHE_TIME_ID);

        //Guardamos el id del ultimo tweet del ultimo request
        $mem_var->set("latestId",  $tweets->latestId, CACHE_TIME_ID);
        $mem_var->set("cacheDateId",  date("Y-m-d h:i:s A"), CACHE_TIME_ID);
        echo $tweetResponse;
    } else {
        // Al no tener un nuevo request de tweets, mandamos el backup
        // para los nuevos usuarios que entran por primera vez

        $mem_var->set("tweets", $mem_var->get("tweetBackup"), CACHE_TIME);
        $mem_var->set("cacheDateTweets",  date("Y-m-d h:i:s A"), CACHE_TIME);


        echo $mem_var->get("tweetBackup");
    }
}
// }
