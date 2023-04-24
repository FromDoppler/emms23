<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/ErrorLog.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/DB.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');



function processError($functionName, $descriptionError, $data)
{
    ErrorLog::log($functionName, $descriptionError, $data);
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $date = date("Y-m-d h:i:s A");
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $db->insertLogErrors($date, $functionName, addslashes($descriptionError), addslashes(json_encode($data)));
    $db->close();
}

function processPhaseToShow($event)
{
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $phases = $db->getCurrentPhase($event)[0];
    $transmission = $db->getSettingsTransmission()[0];
    $phaseToShow =  array_search(1, $phases);
    return array('phaseToShow' => $phaseToShow, 'problemsTransmission' => $transmission['problems'], 'isTransmissionYoutube' => $transmission['youtube']);
}
